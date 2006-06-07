<?php

/* Reminder: always indent with 4 spaces (no tabs). */
// +---------------------------------------------------------------------------+
// | Geeklog 1.4                                                               |
// +---------------------------------------------------------------------------+
// | index.php                                                                 |
// |                                                                           |
// | Geeklog event administration page.                                        |
// +---------------------------------------------------------------------------+
// | Copyright (C) 2000-2006 by the following authors:                         |
// |                                                                           |
// | Authors: Tony Bibbs        - tony AT tonybibbs DOT com                    |
// |          Mark Limburg      - mlimburg AT users DOT sourceforge DOT net    |
// |          Jason Whittenburg - jwhitten AT securitygeeks DOT com            |
// |          Dirk Haun         - dirk AT haun-online DOT de                   |
// +---------------------------------------------------------------------------+
// |                                                                           |
// | This program is free software; you can redistribute it and/or             |
// | modify it under the terms of the GNU General Public License               |
// | as published by the Free Software Foundation; either version 2            |
// | of the License, or (at your option) any later version.                    |
// |                                                                           |
// | This program is distributed in the hope that it will be useful,           |
// | but WITHOUT ANY WARRANTY; without even the implied warranty of            |
// | MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the             |
// | GNU General Public License for more details.                              |
// |                                                                           |
// | You should have received a copy of the GNU General Public License         |
// | along with this program; if not, write to the Free Software Foundation,   |
// | Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.           |
// |                                                                           |
// +---------------------------------------------------------------------------+
//
// $Id: index.php,v 1.16 2006/06/07 03:14:14 ospiess Exp $

require_once ('../../../lib-common.php');
require_once ('../../auth.inc.php');

// Uncomment the line below if you need to debug the HTTP variables being passed
// to the script.  This will sometimes cause errors but it will allow you to see
// the data being passed in a POST operation
// COM_debug($_POST);

$display = '';

// Ensure user even has the rights to access this page
if (!SEC_hasRights('calendar.edit')) {
    $display .= COM_siteHeader('menu');
    $display .= COM_startBlock ($MESSAGE[30], '',
                                COM_getBlockTemplate ('_msg_block', 'header'));
    $display .= $MESSAGE[35];
    $display .= COM_endBlock (COM_getBlockTemplate ('_msg_block', 'footer'));
    $display .= COM_siteFooter();

    // Log attempt to error.log
    COM_accessLog("User {$_USER['username']} tried to illegally access the event administration screen.");

    echo $display;

    exit;
}


/**
* Shows event editor
*
* @param    string  $mode   Indicates if this is a submission or a regular entry
* @param    array   $A      array holding the event's details
* @param    string  $msg    an optional error message to display
* @return   string          HTML for event editor or error message
*
*/
function CALENDAR_editEvent ($mode, $A, $msg = '')
{
    global $_CONF, $_GROUPS, $_TABLES, $_USER, $_CA_CONF, $LANG_CAL_1,
           $LANG_CAL_ADMIN, $LANG10, $LANG12, $LANG22, $LANG_ACCESS,
           $LANG_ADMIN, $MESSAGE;

    $retval = '';

    if (!empty ($msg)) {
        $retval .= COM_startBlock ($LANG22[2], '',
                        COM_getBlockTemplate ('_msg_block', 'header'));
        $retval .= $msg;
        $retval .= COM_endBlock (COM_getBlockTemplate ('_msg_block', 'footer'));
    }

    $event_templates = new Template($_CONF['path'] . 'plugins/calendar/templates/admin');
    $event_templates->set_file('editor','eventeditor.thtml');
    $event_templates->set_var('site_url', $_CONF['site_url']);
    $event_templates->set_var('site_admin_url', $_CONF['site_admin_url']);
    $event_templates->set_var('layout_url',$_CONF['layout_url']);
    $event_templates->set_var('lang_allowed_html', COM_allowedHTML());
    $event_templates->set_var('lang_postmode', $LANG_CAL_ADMIN[3]);

    if ($mode <> 'editsubmission' AND !empty($A['eid'])) {
        // Get what level of access user has to this object
        $access = SEC_hasAccess($A['owner_id'],$A['group_id'],$A['perm_owner'],$A['perm_group'],$A['perm_members'],$A['perm_anon']);
        if ($access == 0 OR $access == 2) {
            // Uh, oh!  User doesn't have access to this object
            $retval .= COM_startBlock ($LANG_ACCESS['accessdenied'], '',
                               COM_getBlockTemplate ('_msg_block', 'header'));
            $retval .= $LANG_CAL_ADMIN[17];
            $retval .= COM_endBlock (COM_getBlockTemplate ('_msg_block', 'footer'));
            COM_accessLog("User {$_USER['username']} tried to illegally submit or edit event $eid.");
            return $retval;
        }
    } else {
        $A['owner_id'] = $_USER['uid'];
        if (isset ($_GROUPS['Event Admin'])) {
            $A['group_id'] = $_GROUPS['Calendar Admin'];
        } else {
            $A['group_id'] = SEC_getFeatureGroup ('calendar.edit');
        }
        SEC_setDefaultPermissions ($A, $_CA_CONF['default_permissions']);
        $access = 3;
    }

    if ($mode == 'editsubmission') {
        $event_templates->set_var('post_options', COM_optionList($_TABLES['postmodes'],'code,name','plaintext'));
    } else {
        if (!isset ($A['postmode'])) {
            $A['postmode'] = $_CONF['postmode'];
        }
        $event_templates->set_var('post_options', COM_optionList($_TABLES['postmodes'],'code,name',$A['postmode']));
    }

    $retval .= COM_startBlock($LANG_CAL_ADMIN[1], '',
                              COM_getBlockTemplate ('_admin_block', 'header'));

    if (!empty($A['eid'])) {
        $delbutton = '<input type="submit" value="' . $LANG_ADMIN['delete']
                   . '" name="mode"%s>';
        $jsconfirm = ' onclick="return confirm(\'' . $MESSAGE[76] . '\');"';
        $event_templates->set_var ('delete_option',
                                   sprintf ($delbutton, $jsconfirm));
        $event_templates->set_var ('delete_option_no_confirmation',
                                   sprintf ($delbutton, ''));
    } else { // new event
        $A['eid'] = COM_makesid ();
        $A['title'] = '';
        $A['description'] = '';
        $A['url'] = '';
        $A['hits'] = 0;

        // in case a start date/time has been passed from the calendar,
        // pick it up for the end date/time
        if (empty ($A['dateend'])) {
            $A['dateend'] = $A['datestart'];
        }
        if (empty ($A['timeend'])) {
            $A['timeend'] = $A['timestart'];
        }
        $A['event_type'] = '';
        $A['location'] = '';
        $A['address1'] = '';
        $A['address2'] = '';
        $A['city'] = '';
        $A['state'] = '';
        $A['zipcode'] = '';
        $A['allday'] = 0;
    }

    $event_templates->set_var('event_id', $A['eid']);
    $event_templates->set_var('lang_eventtitle', $LANG_ADMIN['title']);
    $A['title'] = str_replace('{','&#123;',$A['title']);
    $A['title'] = str_replace('}','&#125;',$A['title']);
    $A['title'] = str_replace('"','&quot;',$A['title']);
    $event_templates->set_var('event_title', stripslashes ($A['title']));
    $types = explode(',', $_CA_CONF['event_types']);
    asort ($types);
    $catdd = '';
    for ($i = 1; $i <= count($types); $i++) {
        $catdd .= '<option value="' . current($types) . '"';
        if ($A['event_type'] == current($types)) {
            $catdd .= ' selected="selected"';
        }
        $catdd .= '>' . current($types) . '</option>';
        next($types);
    }
    $event_templates->set_var('lang_eventtype', $LANG_CAL_1[37]);
    $event_templates->set_var('lang_editeventtypes', $LANG12[50]);
    $event_templates->set_var('type_options', $catdd);
    $event_templates->set_var('lang_eventurl', $LANG_CAL_ADMIN[4]);
    $event_templates->set_var('max_url_length', 255);
    $event_templates->set_var('event_url', $A['url']);
    $event_templates->set_var('lang_includehttp', $LANG_CAL_ADMIN[9]);
    $event_templates->set_var('lang_eventstartdate', $LANG_CAL_ADMIN[5]);
    //$event_templates->set_var('event_startdate', $A['datestart']);
    $event_templates->set_var('lang_starttime', $LANG_CAL_1[30]);

    // Combine date/time for easier manipulation
    $A['datestart'] = trim ($A['datestart'] . ' ' . $A['timestart']);
    if (empty ($A['datestart'])) {
        $start_stamp = time ();
    } else {
        $start_stamp = strtotime ($A['datestart']);
    }   
    $A['dateend'] = trim ($A['dateend'] . ' ' . $A['timeend']);
    if (empty ($A['dateend'])) {
        $end_stamp = time ();
    } else {
        $end_stamp = strtotime ($A['dateend']);
    }
    $start_month = date('m', $start_stamp);
    $start_day = date('d', $start_stamp);
    $start_year = date('Y', $start_stamp);
    $end_month = date('m', $end_stamp);
    $end_day = date('d', $end_stamp);
    $end_year = date('Y', $end_stamp);

    $start_hour = date('H', $start_stamp);
    $start_minute = date('i', $start_stamp);
    if ($start_hour >= 12) {
        $event_templates->set_var ('startam_selected', '');
        $event_templates->set_var ('startpm_selected', 'selected="selected"');
    } else {
        $event_templates->set_var ('startam_selected', 'selected="selected"');
        $event_templates->set_var ('startpm_selected', '');
    }
    if ($start_hour > 12) {
        $start_hour = $start_hour - 12;
    } else if ($start_hour == 0) {
        $start_hour = 12;
    }

    $end_hour = date('H', $end_stamp);
    $end_minute = date('i', $end_stamp);
    if ($end_hour >= 12) {
        $event_templates->set_var ('endam_selected', '');
        $event_templates->set_var ('endpm_selected', 'selected="selected"');
    } else {
        $event_templates->set_var ('endam_selected', 'selected="selected"');
        $event_templates->set_var ('endpm_selected', '');
    }
    if ($end_hour > 12) {
        $end_hour = $end_hour - 12;
    } else if ($end_hour == 0) {
        $end_hour = 12;
    }

    $month_options = COM_getMonthFormOptions ($start_month);
    $event_templates->set_var ('startmonth_options', $month_options);

    $month_options = COM_getMonthFormOptions ($end_month);
    $event_templates->set_var ('endmonth_options', $month_options);

    $day_options = COM_getDayFormOptions ($start_day);
    $event_templates->set_var ('startday_options', $day_options);

    $day_options = COM_getDayFormOptions ($end_day);
    $event_templates->set_var ('endday_options', $day_options);

    $year_options = COM_getYearFormOptions ($start_year);
    $event_templates->set_var ('startyear_options', $year_options);

    $year_options = COM_getYearFormOptions ($end_year);
    $event_templates->set_var ('endyear_options', $year_options);

    $hour_options = COM_getHourFormOptions ($start_hour);
    $event_templates->set_var ('starthour_options', $hour_options);

    $hour_options = COM_getHourFormOptions ($end_hour);
    $event_templates->set_var ('endhour_options', $hour_options);

    // Set minute for start time
    switch ($start_minute) {
    case '00':
        $event_templates->set_var('startminuteoption1_selected', 'selected="selected"');
        break;
    case '15':
        $event_templates->set_var('startminuteoption2_selected', 'selected="selected"');
        break;
    case '30':
        $event_templates->set_var('startminuteoption3_selected', 'selected="selected"');
        break;
    case '45':
        $event_templates->set_var('startminuteoption4_selected', 'selected="selected"');
        break;
    }

    // Set minute for end time
    switch ($end_minute) {
    case '00':
        $event_templates->set_var('endminuteoption1_selected', 'selected="selected"');
        break;
    case '15':
        $event_templates->set_var('endminuteoption2_selected', 'selected="selected"');
        break;
    case '30':
        $event_templates->set_var('endminuteoption3_selected', 'selected="selected"');
        break;
    case '45':
        $event_templates->set_var('endminuteoption4_selected', 'selected="selected"');
        break;
    }

    $event_templates->set_var('lang_enddate', $LANG12[13]);
    $event_templates->set_var('lang_eventenddate', $LANG_CAL_ADMIN[6]);
    $event_templates->set_var('event_enddate', $A['dateend']);
    $event_templates->set_var('hour_options', $hour_options);
    $event_templates->set_var('lang_enddate', $LANG12[13]);
    $event_templates->set_var('lang_endtime', $LANG_CAL_1[29]);
    $event_templates->set_var('lang_alldayevent', $LANG_CAL_1[31]);
    if ($A['allday'] == 1) {
        $event_templates->set_var('allday_checked', 'checked="checked"');
    }
    $event_templates->set_var('lang_location',$LANG12[51]);
    $event_templates->set_var('event_location', stripslashes ($A['location']));
    $event_templates->set_var('lang_addressline1',$LANG12[44]);
    $event_templates->set_var('event_address1', stripslashes ($A['address1']));
    $event_templates->set_var('lang_addressline2',$LANG12[45]);
    $event_templates->set_var('event_address2', stripslashes ($A['address2']));
    $event_templates->set_var('lang_city',$LANG12[46]);
    $event_templates->set_var('event_city', stripslashes ($A['city']));
    $event_templates->set_var('lang_state',$LANG12[47]);
    $event_templates->set_var('state_options', CALENDAR_stateList($A['state']));
    $event_templates->set_var('lang_zipcode',$LANG12[48]);
    $event_templates->set_var('event_zipcode', $A['zipcode']);
    $event_templates->set_var('lang_eventlocation', $LANG_CAL_ADMIN[7]);
    $event_templates->set_var('event_location', stripslashes ($A['location']));
    $event_templates->set_var('lang_eventdescription', $LANG_CAL_ADMIN[8]);
    $event_templates->set_var('event_description', stripslashes ($A['description']));
    $event_templates->set_var('lang_hits', $LANG10[30]);
    $event_templates->set_var('hits', COM_numberFormat ($A['hits']));
    $event_templates->set_var('lang_save', $LANG_CAL_ADMIN[20]);
    $event_templates->set_var('lang_cancel', $LANG_CAL_ADMIN[21]);

    // user access info
    $event_templates->set_var('lang_accessrights',$LANG_ACCESS['accessrights']);
    $event_templates->set_var('lang_owner', $LANG_ACCESS['owner']);
    $ownername = COM_getDisplayName ($A['owner_id']);
    $event_templates->set_var('owner_username', DB_getItem($_TABLES['users'],
                              'username', "uid = {$A['owner_id']}"));
    $event_templates->set_var('owner_name', $ownername);
    $event_templates->set_var('owner', $ownername);
    $event_templates->set_var('owner_id', $A['owner_id']);
    $event_templates->set_var('lang_group', $LANG_ACCESS['group']);

    $groupdd = '';
    $usergroups = SEC_getUserGroups();
    if ($access == 3) {
        $groupdd .= '<select name="group_id">';
        for ($i = 0; $i < count($usergroups); $i++) {
            $groupdd .= '<option value="' . $usergroups[key($usergroups)] . '"';
            if ($A['group_id'] == $usergroups[key($usergroups)]) {
                $groupdd .= ' selected="selected"';
            }
            $groupdd .= '>' . key($usergroups) . '</option>';
            next($usergroups);
        }
        $groupdd.= '</select>';
    } else {
        // they can't set the group then
        $groupdd .= DB_getItem($_TABLES['groups'],'grp_name',"grp_id = {$A['group_id']}");
        $groupdd .= '<input type="hidden" name="group_id" value="' . $A['group_id'] . '">';
    }
    $event_templates->set_var('group_dropdown', $groupdd);
    $event_templates->set_var('lang_permissions', $LANG_ACCESS['permissions']);
    $event_templates->set_var('lang_permissionskey', $LANG_ACCESS['permissionskey']);
    $event_templates->set_var('permissions_editor', SEC_getPermissionsHTML($A['perm_owner'],$A['perm_group'],$A['perm_members'],$A['perm_anon']));
    $event_templates->parse('output', 'editor');
    $retval .= $event_templates->finish($event_templates->get_var('output'));
    $retval .= COM_endBlock (COM_getBlockTemplate ('_admin_block', 'footer'));

    return $retval;
}

/**
* Saves an event to the database
*
* @param    string  $eid            Event ID
* @param    string  $title          Event Title
* @param    string  $url            URL for the event
* @param    string  $datestart      Date the event begins on
* @param    string  $dateend        Date the event ends on
* @param    string  $location       Where the event will be held at
* @param    string  $description    Description about the event
* @param    string  $postmode       Is this HTML or plain text?
* @param    string  $owner_id       ID of owner
* @param    string  $group_id       ID of group event belongs to
* @param    string  $perm_owner     Permissions the owner has on event
* @param    string  $perm_group     Permissions the groups has on the event
* @param    string  $perm_members   Permisssions members have on the event
* @param    string  $perm_anon      Permissions anonymous users have
* @return   string                  HTML redirect or error message
*
*/
function CALENDAR_saveEvent ($eid, $title, $event_type, $url, $allday,
                             $start_month, $start_day, $start_year, $start_hour,
                             $start_minute, $start_ampm, $end_month, $end_day,
                             $end_year, $end_hour, $end_minute, $end_ampm,
                             $location, $address1, $address2, $city, $state,
                             $zipcode, $description, $postmode, $owner_id,
                             $group_id, $perm_owner, $perm_group, $perm_members,
                             $perm_anon, $mode)
{
    global $_CONF, $_TABLES, $_USER, $LANG22, $MESSAGE;

    $retval = '';

    // Convert array values to numeric permission values
    list($perm_owner,
        $perm_group,
        $perm_members,
        $perm_anon) = SEC_getPermissionValues($perm_owner,
                                              $perm_group,
                                              $perm_members,
                                              $perm_anon);

    $access = 0;
    if (DB_count ($_TABLES['events'], 'eid', $eid) > 0) {
        $result = DB_query ("SELECT owner_id,group_id,perm_owner,perm_group,"
                           ."perm_members,perm_anon FROM {$_TABLES['events']} "
                           ."WHERE eid = '{$eid}'");
        $A = DB_fetchArray ($result);
        $access = SEC_hasAccess ($A['owner_id'], $A['group_id'],
                $A['perm_owner'], $A['perm_group'], $A['perm_members'],
                $A['perm_anon']);
    } else {
        $access = SEC_hasAccess ($owner_id, $group_id, $perm_owner, $perm_group,
                $perm_members, $perm_anon);
    }
    if (($access < 3) || !SEC_inGroup ($group_id)) {
        $retval .= COM_siteHeader('menu');
        $retval .= COM_startBlock ($MESSAGE[30], '',
                            COM_getBlockTemplate ('_msg_block', 'header'));
        $retval .= $MESSAGE[31];
        $retval .= COM_endBlock (COM_getBlockTemplate ('_msg_block', 'footer'));
        $retval .= COM_siteFooter();
        COM_accessLog ("User {$_USER['username']} tried to illegally submit or edit event $eid.");
        return $retval;
    }

    if ($allday == 'on') {
        $allday = 1;
    } else {
        $allday = 0;
    }

    // Make sure start date is before end date
    if (checkdate ($start_month, $start_day, $start_year)) {
        $datestart = $start_year . '-' . $start_month . '-' . $start_day;
        $timestart = $start_hour . ':' . $start_minute . ':00';
    } else {
        $retval .= COM_siteHeader ('menu');
        $retval .= COM_startBlock ($LANG22[2], '',
                            COM_getBlockTemplate ('_msg_block', 'header'));
        $retval .= $LANG22[23];
        $retval .= COM_endBlock (COM_getBlockTemplate ('_msg_block', 'footer'));
        $retval .= COM_siteFooter ();

        return $retval;
    }
    if (checkdate ($end_month, $end_day, $end_year)) {
        $dateend = $end_year . '-' . $end_month . '-' . $end_day;
        $timeend = $end_hour . ':' . $end_minute . ':00';
    } else {
        $retval .= COM_siteHeader ('menu');
        $retval .= COM_startBlock ($LANG22[2], '',
                            COM_getBlockTemplate ('_msg_block', 'header'));
        $retval .= $LANG22[24];
        $retval .= COM_endBlock (COM_getBlockTemplate ('_msg_block', 'footer'));
        $retval .= COM_siteFooter ();

        return $retval;
    }
    if ($allday == 0) {
        if ($dateend < $datestart) {
            $retval .= COM_siteHeader ('menu');
            $retval .= COM_startBlock ($LANG22[2], '',
                                COM_getBlockTemplate ('_msg_block', 'header'));
            $retval .= $LANG22[25];
            $retval .= COM_endBlock (COM_getBlockTemplate ('_msg_block', 'footer'));
            $retval .= COM_siteFooter ();

            return $retval;
        }
    } else {
        if ($dateend < $datestart) {
            // Force end date to be same as start date
            $dateend = $datestart;
        }
    }

    // clean 'em up
    if ($postmode == 'html') {
        $description = COM_checkHTML (COM_checkWords ($description));
    } else {
        $description = htmlspecialchars (COM_checkWords ($description));
    }
    $description = addslashes ($description);
    $title = addslashes (COM_checkHTML (COM_checkWords ($title)));
    $location = addslashes (COM_checkHTML (COM_checkWords ($location)));
    $address1 = addslashes (COM_checkHTML (COM_checkWords ($address1)));
    $address2 = addslashes (COM_checkHTML (COM_checkWords ($address2)));
    $city = addslashes (COM_checkHTML (COM_checkWords ($city)));
    $zipcode =  addslashes (COM_checkHTML (COM_checkWords ($zipcode)));
    if ($allday == 0) {
        // Add 12 to make time on 24 hour clock if needed
        if ($start_ampm == 'pm' AND $start_hour <> 12) {
            $start_hour = $start_hour + 12;
        }
        // If 12AM set hour to 00
        if ($start_ampm == 'am' AND $start_hour == 12) {
            $start_hour = '00';
        }
        // Add 12 to make time on 24 hour clock if needed
        if ($end_ampm == 'pm' AND $end_hour <> 12) {
           $end_hour = $end_hour + 12;
        }
        // If 12AM set hour to 00
        if ($end_ampm == 'am' AND $end_hour == 12) {
            $end_hour = '00';
        }
        $timestart = $start_hour . ':' . $start_minute . ':00';
        $timeend = $end_hour . ':' . $end_minute . ':00';
    }

    if (!empty ($eid) AND !empty ($description) AND !empty ($title)) {
        DB_delete ($_TABLES['eventsubmission'], 'eid', $eid);

        DB_save($_TABLES['events'],
               'eid,title,event_type,url,allday,datestart,dateend,timestart,'
               .'timeend,location,address1,address2,city,state,zipcode,description,'
               .'postmode,owner_id,group_id,perm_owner,perm_group,perm_members,'
               .'perm_anon',
               "$eid,'$title','$event_type','$url',$allday,'$datestart',"
               ."'$dateend','$timestart','$timeend','$location','$address1',"
               ."'$address2','$city','$state','$zipcode','$description','$postmode',"
               ."$owner_id,$group_id,$perm_owner,$perm_group,$perm_members,$perm_anon");
        if (DB_count ($_TABLES['personal_events'], 'eid', $eid) > 0) {
            $result = DB_query ("SELECT uid FROM {$_TABLES['personal_events']} "
                               ."WHERE eid = '{$eid}'");
            $numrows = DB_numRows ($result);
            for ($i = 1; $i <= $numrows; $i++) {
                $P = DB_fetchArray ($result);
                DB_save ($_TABLES['personal_events'],
                        'eid,title,event_type,datestart,dateend,address1,address2,'
                       .'city,state,zipcode,allday,url,description,postmode,'
                       .'group_id,owner_id,perm_owner,perm_group,perm_members,'
                       .'perm_anon,uid,location,timestart,timeend',
                        "$eid,'$title','$event_type','$datestart','$dateend',"
                       ."'$address1','$address2','$city','$state','$zipcode',"
                       ."$allday,'$url','$description','$postmode',$group_id,"
                       ."$owner_id,$perm_owner,$perm_group,$perm_members,"
                       ."$perm_anon,{$P['uid']},'$location','$timestart','$timeend'");
            }
        }
        COM_rdfUpToDateCheck ('geeklog', 'calendar', $eid);

        return COM_refresh ($_CONF['site_admin_url']
                           .'/plugins/calendar/index.php?msg=17');
    } else {
        $retval .= COM_siteHeader ('menu');
        $retval .= COM_startBlock ($LANG22[2], '',
                            COM_getBlockTemplate ('_msg_block', 'header'));
        $retval .= $LANG22[10];
        $retval .= COM_endBlock (COM_getBlockTemplate ('_msg_block', 'footer'));
        $retval .= COM_siteFooter ();

        return $retval;
    }
}


// MAIN
$mode = '';
if (isset($_REQUEST['mode'])) {
    $mode = $_REQUEST['mode'];
}

if (($mode == $LANG_ADMIN['delete']) && !empty ($LANG_ADMIN['delete'])) {
    $eid = COM_applyFilter ($_REQUEST['eid']);
    if (!isset ($eid) || empty ($eid) || ($eid == 0)) {
        COM_errorLog ('Attempted to delete event eid=\''
                      . $eid . "'");
        $display .= COM_refresh ($_CONF['site_admin_url'] . '/plugins/calendar/index.php');
    } else {
        $display .= CALENDAR_deleteEvent ($eid);
    }
} else if (($mode == $LANG_CAL_ADMIN[20]) && !empty ($LANG_CAL_ADMIN[20])) { // save
    $display .= CALENDAR_saveEvent (COM_applyFilter ($_POST['eid']),
            $_POST['title'], $_POST['event_type'],
            $_POST['url'], $_POST['allday'],
            $_POST['start_month'], $_POST['start_day'],
            $_POST['start_year'], $_POST['start_hour'],
            $_POST['start_minute'], $_POST['start_ampm'],
            $_POST['end_month'], $_POST['end_day'],
            $_POST['end_year'], $_POST['end_hour'],
            $_POST['end_minute'], $_POST['end_ampm'],
            $_POST['location'], $_POST['address1'],
            $_POST['address2'], $_POST['city'],
            $_POST['state'], $_POST['zipcode'],
            $_POST['description'], $_POST['postmode'] ,
            $_POST['owner_id'], $_POST['group_id'],
            $_POST['perm_owner'], $_POST['perm_group'],
            $_POST['perm_members'], $_POST['perm_anon'], $mode);
} else if ($mode == 'editsubmission') {
    $id = COM_applyFilter ($_REQUEST['id']);
    $result = DB_query ("SELECT * FROM {$_TABLES['eventsubmission']} WHERE eid ='$id'");
    $A = DB_fetchArray ($result);
    $display .= COM_siteHeader ('menu');
    $display .= CALENDAR_editEvent ($mode, $A);
    $display .= COM_siteFooter ();
} else if ($mode == 'clone') {
    $eid = COM_applyFilter ($_REQUEST['eid']);
    $result = DB_query ("SELECT * FROM {$_TABLES['events']} WHERE eid ='$eid'");
    $A = DB_fetchArray ($result);
    $A['eid'] = COM_makesid ();
    $A['owner_id'] = $_USER['uid'];
    $display .= COM_siteHeader ('menu');
    $display .= CALENDAR_editEvent ($mode, $A);
    $display .= COM_siteFooter ();
} else if ($mode == 'edit') {
    $eid = '';
    if (isset ($_REQUEST['eid'])) {
        $eid = COM_applyFilter ($_REQUEST['eid']);
    }
    if (empty ($eid)) {
        $A = array ();
        $A['datestart'] = '';
        $A['timestart'] = '';
        if (isset ($_REQUEST['datestart'])) {
            $A['datestart'] = COM_applyFilter ($_REQUEST['datestart']);
        }
        if (isset ($_REQUEST['timestart'])) {
            $A['timestart'] = COM_applyFilter ($_REQUEST['timestart']);
        }
    } else {
        $result = DB_query ("SELECT * FROM {$_TABLES['events']} WHERE eid ='$eid'");
        $A = DB_fetchArray ($result);
    }
    $display .= COM_siteHeader ('menu', $LANG_CAL_ADMIN[1]);
    $display .= CALENDAR_editEvent ($mode, $A);
    $display .= COM_siteFooter ();
} else { // 'cancel' or no mode at all
    $display .= COM_siteHeader ('menu', $LANG_CAL_ADMIN[11]);
    if (isset ($_REQUEST['msg'])) {
        $display .= COM_showMessage (COM_applyFilter ($_REQUEST['msg'],
                                                      true), 'calendar');
    }
    $display .= CALENDAR_listevents();
    $display .= COM_siteFooter ();
}

echo $display;

?>
