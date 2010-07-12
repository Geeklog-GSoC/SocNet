<?php 

/* Load the tables into the plugin */
$_TABLES['users_socnetinfo']= $_DB_table_prefix . 'users_socnetinfo';

/* Load the language file */ 
$plugin_path = $_CONF['path'] . 'plugins/socnet/';
$langfile = $plugin_path . 'language/' . $_CONF['language'] . '.php';

if (file_exists($langfile)) {
    require($langfile);
} else {
    require($plugin_path . 'language/english.php');
}

/*
* Check and see if we need to load the plugin configuration
*/
if (!isset($socnet_config['socnetloginrequired'])) {
    require_once $_CONF['path_system'] . 'classes/config.class.php';

    $socnet_config = config::get_instance();
    $_SOC_CONF = $socnet_config->get_config('socnet');
}

/* Geeklog Plugin API implemenetations */

//Some functions are in the core

/* Uninstall the socnet plugin */

function plugin_autouninstall_socnet () {
    $out = array();
    $pi_display_name = 'Social Networking Plugin';
    $pi_admin        = $pi_display_name . ' Admin';
    
    // Unregister the plugin with Geeklog
    $out = array (
        /* give the name of the tables, without $_TABLES[] */
        'tables' => array('users_socnetinfo'),
        /* give the full name of the group, as in the db */
        'groups' => array($pi_admin),
        /* give the full name of the feature, as in the db */
        'features' => array('socnet.groupadmin'),
        /* give the full name of the block, including 'phpblock_', etc */
        'php_blocks' => array(),
        /* give all vars with their name */
        'vars'=> array()
    );

    return $out;
}

/**
* returns the administrative option for this plugin
*
*/
function plugin_getadminoption_socnet()
{
    global $_CONF, $_TABLES, $LANG_CAL_1;
/*
    if (SEC_hasRights ('calendar.edit')) {
        $result = DB_query ("SELECT COUNT(*) AS cnt FROM {$_TABLES['events']}" . COM_getPermSQL ());
        $A = DB_fetchArray ($result);
        $total_events = $A['cnt'];

        return array ($LANG_CAL_1[16],
                      $_CONF['site_admin_url'] . '/plugins/socnet/index.php',
                      $total_events);
    }
    */
    
    return array ('Socnet',
                      $_CONF['site_url'] . '/socnet/index.php',
                      '');
}

/**
* returns the user option for this plugin
*
*/
function plugin_getuseroption_socnet()
{
    global $_CONF;
    $url = $_CONF['site_url'] . '/socnet/index.php?mode=view';
    return array ('SocNet Groups', $url, '');
}

/*
 * Returns true or false whether the user is the group admin
 * 
 *  Note:
 *  
 * The ID param cannot work both ways. Either both params are ID's, or both are names. 
 * @param    int/string   $uid       User ID or name to get information for. If empty current user.
 * @param    int/string   $gid       The group we are looking at. Could be passed in as ID or name
 * @param    bool         $id        Whether we are passing in the parameters as ID's or names. True if ID's
 * @return	 bool		             Returns whether the user is the group admin
 */
function isGroupAdmin($uid, $gid,$id) {
	global $_TABLES;
	if($id) {
		$sql = "SELECT grp_owner from {$_TABLES['groups']} WHERE grp_id=$gid AND grp_owner=$uid";
	}
	else { //get the ID's, then make sql string
	
		$sql = "SELECT grp_owner from {$_TABLES['groups']} WHERE grp_id=(SELECT grp_id FROM {$_TABLES['groups']} WHERE grp_name='$gid') AND grp_owner=(SELECT uid FROM {$_TABLES['users']}
		WHERE username='$uid')";
	}
	
	$result = DB_query($sql,1);
	
	$nrows = DB_numRows($result);
    
	return ($nrows==1);
}

/*
 * Returns the ID of the group admin. Returns -1 if there is no admin.
 * 
 * @param	 int		$gid       The group that you want to fetch the admin from
 * 
 * return    int                     Returns the group admin. Returns -1 if there is no admin
 */
function getGroupAdmin($gid) {
	global $_TABLES;
	$sql="SELECT grp_owner FROM {$_TABLES['groups']} WHERE grp_id=$gid";
	$result = DB_query($sql,1);
	
	$data = DB_fetchArray($result);
	
	return $data[0];
}

//modified savegroupusers from group.php to support Socnet

/**
* Save changes from the form to add/remove users to/from groups
*
* @param    int     $groupid        id of the group being changed
* @param    string  $groupmembers   list of group members
* @param    int     $grp_owner      id of the new group owner
* @return   string                  HTML redirect
*
*/
function soc_savegroupusers($groupid, $groupmembers, $grp_owner=-1)
{
    global $_CONF, $_TABLES;
	$grp_owner_valid=true;
    $retval = '';
	$curr_owner = DB_getItem($_TABLES['groups'], 'grp_owner', "grp_id=$groupid");
    $updateUsers = explode("|", $groupmembers);
    $updateCount = count($updateUsers);
    if ($updateCount > 0) {

        // Retrieve all existing users in group so we can determine if changes
        // are needed
        $activeUsers = array();
        $query = DB_query("SELECT ug_uid FROM {$_TABLES['group_assignments']} WHERE ug_main_grp_id = $groupid");
        if (DB_numRows($query) > 0) {
            while ($A = DB_fetchArray($query, false)) {
                array_push($activeUsers, $A['ug_uid']);
            }
            $deleteGroupUsers = array_diff($activeUsers, $updateUsers);
            $addGroupUsers = array_diff($updateUsers, $activeUsers);
            if (is_array($deleteGroupUsers) AND count($deleteGroupUsers) > 0) {
                foreach ($deleteGroupUsers as $uid) {
                    $uid = COM_applyFilter($uid, true);
                    if($grp_owner!=-1) {
                    	if($grp_owner==$uid)
                    		$grp_owner_valid=false;
                    }
                    else if($curr_owner!=0) {
                    	if($curr_owner==$uid)
                    		$grp_owner_valid=false;
                    }
                    else
                    	$grp_owner_valid=false;
                    if($grp_owner_valid)
                    	DB_query("DELETE FROM {$_TABLES['group_assignments']} WHERE ug_main_grp_id = $groupid AND ug_uid = $uid");
                }
            }
            if (is_array($addGroupUsers) AND count($addGroupUsers) > 0 AND $grp_owner_valid) {
                foreach ($addGroupUsers as $uid) {
                    $uid = COM_applyFilter($uid, true);
                    DB_query("INSERT INTO {$_TABLES['group_assignments']} (ug_main_grp_id, ug_uid) VALUES ('$groupid', $uid)");
                }
            }

        } else {
        

            // No users, no group owner
            if($grp_owner==-1)
            	$grp_owner_valid=false;
	        if($grp_owner_valid) {
	            for ($i = 0; $i < $updateCount; $i++) {
	                $updateUsers[$i] = COM_applyFilter($updateUsers[$i], true);
	                DB_query("INSERT INTO {$_TABLES['group_assignments']} (ug_main_grp_id, ug_uid) VALUES ('$groupid', '$updateUsers[$i]')");
	            }
	
	      	}
        }

    }
    
    if($grp_owner>0)
    {
    	$sql="UPDATE {$_TABLES['groups']} SET grp_owner=$grp_owner WHERE grp_id=$groupid";
    	$query = DB_query($sql);
    }

    if (isset($_REQUEST['chk_showall']) && ($_REQUEST['chk_showall'] == 1)) {
        $retval = COM_refresh($_CONF['site_url'] . '/socnet/index.php?msg=49&chk_showall=1');
    } else {
        return COM_refresh ($_CONF['site_url'] . '/socnet/index.php?msg=49');
    }

    return $retval;
}

/**
 * Modified from group.php to support socnet
* Save a group to the database
*
* @param    string  $grp_id         ID of group to save
* @param    string  $grp_name       Group Name
* @param    string  $grp_descr      Description of group
* @param    boolean $grp_admin      Flag that indicates this is an admin use group
* @param    boolean $grp_gl_core    Flag that indicates if this is a core Geeklog group
* @param    boolean $grp_default    Flag that indicates if this is a default group
* @param    boolean $grp_applydefault  Flag that indicates whether to apply a change in $grp_default to all existing user accounts
* @param    array   $features       Features the group has access to
* @param    array   $groups         Groups this group will belong to
* @return   string                  HTML refresh or error message
*
*/
function soc_savegroup($grp_id, $grp_name, $grp_descr, $grp_admin, $grp_gl_core, $grp_default, $grp_applydefault, $features, $groups)
{
    global $_CONF, $_TABLES, $_USER, $LANG_ACCESS, $_GROUP_VERBOSE;

    $retval = '';
    if (!empty($grp_name) && !empty($grp_descr)) {
        $GroupAdminGroups = SEC_getUserGroups();
        if (!empty ($grp_id) &&
            ($grp_id > 0) &&
            !in_array ($grp_id, $GroupAdminGroups) &&
            !SEC_groupIsRemoteUserAndHaveAccess($grp_id, $GroupAdminGroups)) {
            COM_accessLog ("User {$_USER['username']} tried to edit group '$grp_name' ($grp_id) with insufficient privileges.");

            return COM_refresh ($_CONF['site_url'] . '/socnet/index.php');
        }

        if ($grp_gl_core == 1 AND !is_array ($features)) {
            COM_errorLog ("Sorry, no valid features were passed to this core group ($grp_id) and saving could cause problem...bailing.");

            return COM_refresh ($_CONF['site_url'] . '/socnet/index.php');
        }

        // group names have to be unique, so check if this one exists already
        $g_id = SEC_getGroupIdFromName($grp_name);
        if ($g_id > 0) {
            if (empty($grp_id) || ($grp_id != $g_id)) {
                // there already is a group with that name - complain
                $retval .= COM_siteHeader ('menu', $LANG_ACCESS['groupeditor']);
                $retval .= COM_startBlock ($LANG_ACCESS['groupexists'], '',
                           COM_getBlockTemplate ('_msg_block', 'header'));
                $retval .= $LANG_ACCESS['groupexistsmsg'];
                $retval .= COM_endBlock (COM_getBlockTemplate ('_msg_block', 'footer'));
                $retval .= soc_editgroup ($grp_id);
                $retval .= COM_siteFooter ();

                return $retval;
            }
        }

        $grp_descr = COM_stripslashes($grp_descr);
        $grp_descr = addslashes($grp_descr);

        $grp_applydefault_add = true;
        if (empty($grp_id)) {
            DB_save($_TABLES['groups'],
                    'grp_name,grp_descr,grp_gl_core,grp_default,grp_owner',
                    "'$grp_name','$grp_descr',$grp_gl_core,$grp_default,'{$_USER['uid']}'");
            $grp_id = SEC_getGroupIdFromName($grp_name,$_USER['uid']);
            $new_group = true;
        } else {
            if ($grp_applydefault == 1) {
                // check if $grp_default changed
                $old_default = DB_getItem($_TABLES['groups'], 'grp_default',
                                          "grp_id = $grp_id");
                if ($old_default == $grp_default) {
                    // no change required
                    $grp_applydefault = 0;
                } elseif ($old_default == 1) {
                    $grp_applydefault_add = false;
                }
            }

            DB_save($_TABLES['groups'],
                    'grp_id,grp_name,grp_descr,grp_gl_core,grp_default,grp_owner',
                    "$grp_id,'$grp_name','$grp_descr',$grp_gl_core,$grp_default,{$_USER['uid']}");
            $new_group = false;
        }
		DB_query("INSERT INTO {$_TABLES['group_assignments']} (ug_main_grp_id, ug_uid) VALUES ('$grp_id', '{$_USER['uid']}')");
        if (empty($grp_id) || ($grp_id < 1)) {
            // "this shouldn't happen"
            COM_errorLog("Internal error: invalid group id");
            $retval .= COM_siteHeader('menu', $LANG_ACCESS['groupeditor']);
            $retval .= COM_showMessage(95);
            $retval .= COM_siteFooter();

            return $retval;
        }

        // Use the field grp_gl_core to indicate if this non-core GL Group
        // is an Admin related group
        if (($grp_gl_core != 1) AND ($grp_id > 1)) {
            if ($grp_admin == 1) {
                DB_query("UPDATE {$_TABLES['groups']} SET grp_gl_core=2 WHERE grp_id=$grp_id");
            } else {
                DB_query("UPDATE {$_TABLES['groups']} SET grp_gl_core=0 WHERE grp_id=$grp_id");
            }
        }

        // now save the features
        DB_delete($_TABLES['access'], 'acc_grp_id', $grp_id);
        $num_features = count($features);
        if (SEC_inGroup('Root')) {
            foreach ($features as $f) {
                DB_query ("INSERT INTO {$_TABLES['access']} (acc_ft_id,acc_grp_id) VALUES ($f,$grp_id)");
            }
        } else {
            $GroupAdminFeatures = SEC_getUserPermissions();
            $availableFeatures = explode(',', $GroupAdminFeatures);
            foreach ($features as $f) {
                if (in_array($f, $availableFeatures)) {
                    DB_query("INSERT INTO {$_TABLES['access']} (acc_ft_id,acc_grp_id) VALUES ($f,$grp_id)");
                }
            }
        }
        if ($_GROUP_VERBOSE) {
            COM_errorLog('groups = ' . $groups);
            COM_errorLog("deleting all group_assignments for group $grp_id/$grp_name",1);
        }

        DB_delete($_TABLES['group_assignments'], 'ug_grp_id', $grp_id);
        if (! empty($groups)) {
            foreach ($groups as $g) {
                if (in_array($g, $GroupAdminGroups)) {
                    if ($_GROUP_VERBOSE) {
                        COM_errorLog("adding group_assignment $g for $grp_name",1);
                    }
                    $sql = "INSERT INTO {$_TABLES['group_assignments']} (ug_main_grp_id, ug_grp_id) VALUES ($g,$grp_id)";
                    DB_query($sql);
                }
            }
        }

        // Make sure Root group belongs to any new group
        if (DB_getItem ($_TABLES['group_assignments'], 'COUNT(*)',
                "ug_main_grp_id = $grp_id AND ug_grp_id = 1") == 0) {
            DB_query("INSERT INTO {$_TABLES['group_assignments']} (ug_main_grp_id, ug_grp_id) VALUES ($grp_id, 1)");
        }

        // make sure this Group Admin belongs to the new group
        if (!SEC_inGroup ('Root')) {
            if (DB_count ($_TABLES['group_assignments'], 'ug_uid',
            "(ug_uid = {$_USER['uid']}) AND (ug_main_grp_id = $grp_id)") == 0) {
                DB_query ("INSERT INTO {$_TABLES['group_assignments']} (ug_main_grp_id, ug_uid) VALUES ($grp_id,{$_USER['uid']})");
            }
        }

        if ($grp_applydefault == 1) {
            applydefaultgroup($grp_id, $grp_applydefault_add);
        }

        if ($new_group) {
            PLG_groupChanged($grp_id, 'new');
        } else {
            PLG_groupChanged($grp_id, 'edit');
        }
        if (isset($_REQUEST['chk_showall']) && ($_REQUEST['chk_showall'] == 1)) {
            return COM_refresh($_CONF['site_url'] . '/socnet/index.php?msg=49&chk_showall=1');
        } else {
            return COM_refresh($_CONF['site_url'] . '/socnet/index.php?msg=49');
        }
    } else {
        $retval .= COM_siteHeader ('menu', $LANG_ACCESS['groupeditor']);
        $retval .= COM_startBlock ($LANG_ACCESS['missingfields'], '',
                           COM_getBlockTemplate ('_msg_block', 'header'));
        $retval .= $LANG_ACCESS['missingfieldsmsg'];
        $retval .= COM_endBlock (COM_getBlockTemplate ('_msg_block', 'footer'));
        $retval .= soc_editgroup ($grp_id);
        $retval .= COM_siteFooter ();

        return $retval;
    }
}

/**
* Display a list of all users in a given group.
*
* @param   int      $grp_id     group id
* @return  string               HTML for user listing
*
*/
function soc_listusers ($grp_id)
{
    global $_CONF, $_TABLES, $LANG28, $LANG_ACCESS, $LANG_ADMIN, $_IMAGE_TYPE;
    require_once $_CONF['path_system'] . 'lib-admin.php';

    $retval = '';
    $grp_owner = DB_getItem($_TABLES['groups'], 'grp_owner', "grp_id=$grp_id");
    $thisUsersGroups = SEC_getUserGroups ();
    if (!empty ($grp_id) &&
        ($grp_id > 0) &&
        !in_array ($grp_id, $thisUsersGroups) &&
        !SEC_groupIsRemoteUserAndHaveAccess( $grp_id, $thisUsersGroups) &&
            !SEC_hasRights('group.useradmin') && $grp_owner > 0) {
        $retval .= COM_startBlock ($LANG_ACCESS['usergroupadmin'], '',
                           COM_getBlockTemplate ('_msg_block', 'header'));
        $retval .= $LANG_ACCESS['cantlistgroup'];
        $retval .= COM_endBlock (COM_getBlockTemplate ('_msg_block', 'footer'));

        return $retval;
    }

    if ($_CONF['lastlogin']) {
        $login_text = $LANG28[41];
        $login_field = 'lastlogin';
    } else {
        $login_text = $LANG28[40];
        $login_field = 'regdate';
    }

    $header_arr = array (
        array('text' => $LANG_ADMIN['edit'], 'field' => 'edit', 'sort' => false),
        array('text' => $LANG28[37], 'field' => 'uid', 'sort' => true),
        array('text' => $LANG28[3], 'field' => 'username', 'sort' => true),
        array('text' => $LANG28[4], 'field' => 'fullname', 'sort' => true),
        array('text' => $login_text, 'field' => $login_field, 'sort' => true),
        array('text' => $LANG28[7], 'field' => 'email', 'sort' => true)
    );

    $defsort_arr = array ('field'     => 'username',
                          'direction' => 'asc'
    );

    $form_url = $_CONF['site_url'] . '/socnet/index.php?mode=listusers&amp;grp_id='.$grp_id;
    if (isset($_REQUEST['chk_showall']) && ($_REQUEST['chk_showall'] == 1)) {
        $form_url .= '&amp;chk_showall=1';
    }

    $groupname = SEC_getGroupName($grp_id);
    $headline = sprintf ($LANG_ACCESS['usersingroup'], $groupname);

    $url = $_CONF['site_url'] . '/socnet/index.php';
    if (isset($_REQUEST['chk_showall']) && ($_REQUEST['chk_showall'] == 1)) {
        $url .= '?chk_showall=1';
    }
    $menu_arr = array (
                    array('url'  => $url,
                          'text' => $LANG28[38]));
    if ($grp_owner > 0 && isset($_CONF['allow_user_groups']) && $_CONF['allow_user_groups'] > 0) {
        $menu_arr[] = array('url' => $_CONF['site_url'] .  '/socnet/index.php?mode=usergroups&uid=' . $grp_owner,
                            'text' => $LANG28[91]);
    }

    $retval .= COM_startBlock($headline, '',
                              COM_getBlockTemplate('_admin_block', 'header'));

    $retval .= ADMIN_createMenu(
        $menu_arr,
        '&nbsp;',
        $_CONF['layout_url'] . '/images/icons/group.' . $_IMAGE_TYPE
    );

    $text_arr = array (
        'has_extras' => true,
        'form_url'   => $form_url,
        'help_url'   => ''
    );

    $join_userinfo = '';
    $select_userinfo = '';
    if ($_CONF['lastlogin']) {
        $join_userinfo = "LEFT JOIN {$_TABLES['userinfo']} ON {$_TABLES['users']}.uid={$_TABLES['userinfo']}.uid ";
        $select_userinfo = ",lastlogin ";
    }

    $groups = getGroupList ($grp_id);
    $groupList = implode (',', $groups);

    $sql = "SELECT DISTINCT {$_TABLES['users']}.uid,username,fullname,email,photo,regdate$select_userinfo "
          ."FROM {$_TABLES['group_assignments']},{$_TABLES['users']} $join_userinfo "
          ."WHERE {$_TABLES['users']}.uid > 1 "
          ."AND {$_TABLES['users']}.uid = {$_TABLES['group_assignments']}.ug_uid "
          ."AND ({$_TABLES['group_assignments']}.ug_main_grp_id IN ({$groupList}))";

    $query_arr = array ('table' => 'users',
                        'sql' => $sql,
                        'query_fields' => array('username', 'email', 'fullname'),
                        'default_filter' => "AND {$_TABLES['users']}.uid > 1"
    );

    $retval .= ADMIN_list('user', 'ADMIN_getListField_users', $header_arr,
                          $text_arr, $query_arr, $defsort_arr);
    $retval .= COM_endBlock(COM_getBlockTemplate('_admin_block', 'footer'));

    return $retval;
}

/**
* Display a list of groups the user is a Socnet admin to
*
* @param    boolean     $show_all_groups    include admin groups if true
* @return   string                          HTML of the group list
*
*/
function soc_listgroups($show_all_groups = false)
{
    global $_CONF, $_TABLES, $LANG_ADMIN, $LANG_ACCESS, $LANG28, $_IMAGE_TYPE, $SOCNET_User, $_USER;

    require_once $_CONF['path_system'] . 'lib-admin.php';

    $retval = '';

    $header_arr = array(      // display 'text' and use table field 'field'
        array('text' => $LANG_ADMIN['edit'], 'field' => 'edit', 'sort' => false),
        array('text' => $LANG_ACCESS['groupname'], 'field' => 'grp_name', 'sort' => true),
        array('text' => $LANG_ACCESS['description'], 'field' => 'grp_descr', 'sort' => true),
        array('text' => $LANG28[88], 'field' => 'grp_default', 'sort' => true),
        array('text' => $LANG_ACCESS['listusers'], 'field' => 'list', 'sort' => false),
        array('text' => $LANG_ACCESS['sendrequest'], 'field' => 'request', 'sort' => false)
    );

    $defsort_arr = array('field' => 'grp_name', 'direction' => 'asc');

    $form_url = $_CONF['site_url'] . '/socnet/index.php';
    $edit_url = $_CONF['site_url'] . '/socnet/index.php?mode=edit';
    if ($show_all_groups) {
        $form_url .= '?chk_showall=1';
        $edit_url .= '&amp;chk_showall=1';
    }

    $menu_arr = array ( array('url' => $_CONF['site_url'] . '/socnet/index.php?mode=edit',
                              'text' => $SOCNET_User['create_new']) );



    $retval .= COM_startBlock($LANG_ACCESS['groupmanager'], '',
                              COM_getBlockTemplate('_admin_block', 'header'));

    $retval .= ADMIN_createMenu(
        $menu_arr,
        $SOCNET_User['newgroupmsg'],
        $_CONF['layout_url'] . '/images/icons/group.' . $_IMAGE_TYPE
    );

    $text_arr = array(
        'has_extras' => true,
        'form_url'   => $form_url
    );

    $filter = '<span style="padding-right:20px;">';

    $checked ='';
    if ($show_all_groups) {
        $checked = ' checked="checked"';
    }



    $filter .= '<label for="chk_showall"><input id="chk_showall" type="checkbox" name="chk_showall" value="1" checked="checked"' . XHTML . '>';
    $query_arr = array(
        'table' => 'groups',
        'sql' => "SELECT * FROM {$_TABLES['groups']} WHERE grp_owner = {$_USER['uid']}",
        'query_fields' => array('grp_name', 'grp_descr'));


   $retval .= ADMIN_list('socnet', 'ADMIN_getListField_socnet', $header_arr,
                         $text_arr, $query_arr, $defsort_arr, $filter);
    $retval .= COM_endBlock(COM_getBlockTemplate('_admin_block', 'footer'));

    return $retval;
}

/**
* Shows the group editor form
*
* @param    string      $grp_id     ID of group to edit
* @return   string      HTML for group editor
*
*/
function soc_editgroup($grp_id = '')
{
    global $_TABLES, $_CONF, $_USER, $LANG_ACCESS, $LANG_ADMIN, $MESSAGE,
           $LANG28, $_GROUP_VERBOSE, $plugin_path, $_USER;

    require_once $_CONF['path_system'] . 'lib-admin.php';

    $retval = '';

    $thisUsersGroups = SEC_getUserGroups();
    if (! empty($grp_id) &&
        ($grp_id > 0) &&
        !in_array($grp_id, $thisUsersGroups) &&
        !SEC_groupIsRemoteUserAndHaveAccess($grp_id, $thisUsersGroups)) {
        $retval .= COM_startBlock($LANG_ACCESS['groupeditor'], '',
                           COM_getBlockTemplate('_msg_block', 'header'));
        if (!SEC_inGroup('Root') && (SEC_getGroupName($grp_id) == 'Root')) {
            $retval .= $LANG_ACCESS['canteditroot'];
            COM_accessLog("User {$_USER['username']} tried to edit the Root group with insufficient privileges.");
        } else {
            $retval .= $LANG_ACCESS['canteditgroup'];
        }
        $retval .= COM_endBlock(COM_getBlockTemplate('_msg_block', 'footer'));

        return $retval;
    }

    $group_templates = new Template($plugin_path . 'templates/');
    $group_templates->set_file('editor', 'groupeditor.thtml');
    $group_templates->set_var('xhtml', XHTML);
    $group_templates->set_var('site_url', $_CONF['site_url']);
    $group_templates->set_var('layout_url', $_CONF['layout_url']);

    $group_templates->set_var('lang_save', $LANG_ADMIN['save']);
    $group_templates->set_var('lang_cancel', $LANG_ADMIN['cancel']);
    $group_templates->set_var('lang_admingroup', $LANG28[49]);
    $group_templates->set_var('lang_admingrp_msg', $LANG28[50]);
    $group_templates->set_var('lang_defaultgroup', $LANG28[88]);
    $group_templates->set_var('lang_defaultgrp_msg', $LANG28[89]);
    $group_templates->set_var('lang_applydefault_msg', $LANG28[90]);
    $group_templates->set_var('lang_groupname', $LANG_ACCESS['groupname']);
    $group_templates->set_var('lang_description', $LANG_ACCESS['description']);
    $group_templates->set_var('lang_securitygroups',
                              $LANG_ACCESS['securitygroups']);
    $group_templates->set_var('lang_rights', $LANG_ACCESS['rights']);

    $showall = 0;
    if (isset($_REQUEST['chk_showall']) && ($_REQUEST['chk_showall'] == 1)) {
        $showall = 1;
    }
    $group_templates->set_var('show_all', $showall);

    if (! empty($grp_id)) {
        $result = DB_query("SELECT grp_id,grp_name,grp_descr,grp_gl_core,grp_default,grp_owner FROM {$_TABLES['groups']} WHERE grp_id ='$grp_id'");
        $A = DB_fetchArray($result);
        if ($A['grp_gl_core'] > 0) {
            $group_templates->set_var('chk_adminuse', 'checked="checked"');
        }
        if ($A['grp_default'] != 0) {
            $group_templates->set_var('chk_defaultuse', 'checked="checked"');
        }
    } else {
        // new group, so it's obviously not a core group
        $A['grp_gl_core'] = 0;
        $A['grp_default'] = 0;
        $A['grp_owner'] = $_USER['uid'];
    }

    $token = SEC_createToken();
    $retval .= COM_startBlock($LANG_ACCESS['groupeditor'], '',
                              COM_getBlockTemplate('_admin_block', 'header'));
    $retval .= SEC_getTokenExpiryNotice($token);

    if (! empty($grp_id)) {
        // Groups tied to Geeklog's functionality shouldn't be deleted
        if ($A['grp_gl_core'] != 1) {
            $delbutton = '<input type="submit" value="' . $LANG_ADMIN['delete']
                       . '" name="mode"%s' . XHTML . '>';
            $jsconfirm = ' onclick="return confirm(\'' . $MESSAGE[76] . '\');"';
            $group_templates->set_var('delete_option',
                                      sprintf($delbutton, $jsconfirm));
            $group_templates->set_var('delete_option_no_confirmation',
                                      sprintf($delbutton, ''));
            $group_templates->set_var('group_core', 0);
        } else {
            $group_templates->set_var('group_core', 1);
        }
        $group_templates->set_var('group_id', $A['grp_id']);
    } else {
        $group_templates->set_var('group_core', 0);
    }

    if ($A['grp_owner'] > 0) {
        $group_templates->set_var('group_owner', $A['grp_owner']);
        $group_templates->set_var('hide_owneroption', '');
        $group_templates->set_var('lang_groupowner', $LANG_ACCESS['groupowner']);
        $group_templates->set_var('group_owner_name', COM_getDisplayName($A['grp_owner']));
    } else {
        $group_templates->set_var('group_owner', 0);
        $group_templates->set_var('hide_owneroption',
                                  ' style="display:none;"');
    }

    if ($A['grp_owner'] > 0) {
        $group_templates->set_var('group_owner', $A['grp_owner']);
        $group_templates->set_var('hide_owneroption', '');
        $group_templates->set_var('lang_groupowner', $LANG_ACCESS['groupowner']);
        $group_templates->set_var('group_owner_name', COM_getDisplayName($A['grp_owner']));
    } else {
        $group_templates->set_var('group_owner', 0);
        $group_templates->set_var('hide_owneroption',
                                  ' style="display:none;"');
    }

    if ($A['grp_gl_core'] != 1) {
        $group_templates->set_var('groupname_inputtype', 'text');
        $group_templates->set_var('groupname_static', '');
    } else {
        $group_templates->set_var('groupname_inputtype', 'hidden');
        $group_templates->set_var('groupname_static', $A['grp_name']);
    }
    if (isset($A['grp_name'])) {
        $group_templates->set_var('group_name', htmlspecialchars($A['grp_name']));
        switch ($A['grp_name']) {
        case 'All Users':
        case 'Logged-in Users':
        case 'Remote Users':
            $group_templates->set_var('hide_defaultoption',
                                      ' style="display:none;"');
            break;

        default:
            $group_templates->set_var('hide_defaultoption', '');
            break;
        }

    } else {
        $group_templates->set_var('group_name', '');
    }

    if (isset($A['grp_descr'])) {
        $group_templates->set_var('group_description', htmlspecialchars($A['grp_descr']));
    } else {
        $group_templates->set_var('group_description', '');
    }

    $selected = '';
    if (! empty($grp_id)) {
        $tmp = DB_query("SELECT ug_main_grp_id FROM {$_TABLES['group_assignments']} WHERE ug_grp_id = $grp_id");
        $num_groups = DB_numRows($tmp);
        for ($x = 0; $x < $num_groups; $x++) {
            $G = DB_fetchArray($tmp);
            if ($x > 0) {
                $selected .= ' ' . $G['ug_main_grp_id'];
            } else {
                $selected .= $G['ug_main_grp_id'];
            }
        }
    }

    $groupoptions = '';
    if ($A['grp_gl_core'] == 1) {
        $group_templates->set_var('lang_securitygroupmsg',
                                  $LANG_ACCESS['coregroupmsg']);
        $group_templates->set_var('hide_adminoption',
                                  ' style="display:none;"');

        $count = 0;
        if (! empty($selected)) {
            $inclause = str_replace(' ', ',', $selected);
            $result = DB_query("SELECT COUNT(*) AS count FROM {$_TABLES['groups']} WHERE grp_id <> $grp_id AND grp_id IN ($inclause)");
            list($count) = DB_fetchArray($result);
        }
        if ($count == 0) {
            // this group doesn't belong to anything...give a friendly message
            $groupoptions = '<p class="pluginRow1">'
                          . $LANG_ACCESS['nogroupsforcoregroup'] . '</p>';
        }
    } else {
        $group_templates->set_var('lang_securitygroupmsg',
                                  $LANG_ACCESS['groupmsg']);
        $group_templates->set_var('hide_adminoption', '');
    }
    if ($_GROUP_VERBOSE) {
        COM_errorLog("SELECTED: $selected");
    }

    if (empty($groupoptions)) {
        $whereGroups = "(grp_owner = {$_USER['uid']})";

        $header_arr = array(
                        array('text' => $LANG28[86], 'field' => ($A['grp_gl_core'] == 1 ? 'disabled-checkbox' : 'checkbox'), 'sort' => false),
                        array('text' => $LANG_ACCESS['groupname'], 'field' => 'grp_name', 'sort' => true),
                        array('text' => $LANG_ACCESS['description'], 'field' => 'grp_descr', 'sort' => true)
        );

        $defsort_arr = array('field' => 'grp_name', 'direction' => 'asc');

        $form_url = $_CONF['site_url']
                  . '/socnet/index.php?mode=edit&amp;grp_id=' . $grp_id;
        $text_arr = array('has_menu' => false,
                          'title' => '', 'instructions' => '',
                          'icon' => '', 'form_url' => $form_url,
                          'inline' => true);

        if ($A['grp_gl_core'] == 1) {
            $inclause = str_replace(' ', ',', $selected);
            $sql = "SELECT grp_id, grp_name, grp_descr FROM {$_TABLES['groups']} WHERE grp_id <> $grp_id AND grp_id IN ($inclause)";
        } else {
            $xsql = '';
            if (! empty($grp_id)) {
                $xsql = " AND (grp_id <> $grp_id)";
            }
            $sql = "SELECT grp_id, grp_name, grp_descr FROM {$_TABLES['groups']} WHERE grp_owner={$_USER['uid']}";
        }
        $query_arr = array('table' => 'groups',
                           'sql' => $sql,
                           'query_fields' => array('grp_name'),
                           'default_filter' => '',
                           'query' => '',
                           'query_limit' => 0);

        $groupoptions = ADMIN_list('groups', 'ADMIN_getListField_groups',
                                   $header_arr, $text_arr, $query_arr,
                                   $defsort_arr, '', explode(' ', $selected));
    }
    $group_templates->set_var('group_options', $groupoptions);

    if ($A['grp_gl_core'] == 1) {
        $group_templates->set_var('lang_rightsmsg', $LANG_ACCESS['corerightsdescr']);
    } else {
        $group_templates->set_var('lang_rightsmsg', $LANG_ACCESS['rightsdescr']);
    }

    $group_templates->set_var('rights_options',
                              printrights($grp_id, $A['grp_gl_core'] || ($A['grp_owner'] > 0)));
    $group_templates->set_var('gltoken_name', CSRF_TOKEN);
    $group_templates->set_var('gltoken', $token);
    $group_templates->parse('output','editor');
    $retval .= $group_templates->finish($group_templates->get_var('output'));
    $retval .= COM_endBlock(COM_getBlockTemplate('_admin_block', 'footer'));

    return $retval;
}

/**
* Allow easy addition/removal of users to/from a group
*
* @param    int     $group  Group ID
* @return   string          HTML form
*
*/
function soc_editusers($group)
{
    global $_CONF, $_TABLES, $_USER, $LANG_ACCESS, $LANG_ADMIN, $LANG28,
           $_IMAGE_TYPE, $plugin_path,$SOCNET_User;

    require_once $_CONF['path_system'] . 'lib-admin.php';

    $retval = '';

    $grp_name = SEC_getGroupName($group);

    $thisUsersGroups = SEC_getUserGroups();
    if ((!empty($group) && ($group > 0) &&
                !in_array($group, $thisUsersGroups) &&
                !SEC_groupIsRemoteUserAndHaveAccess($group, $thisUsersGroups))
            || (($grp_name == 'All Users') ||
                ($grp_name == 'Logged-in Users'))) {
        $retval .= COM_startBlock($LANG_ACCESS['usergroupadmin'], '',
                                  COM_getBlockTemplate('_msg_block', 'header'));
        if (!SEC_inGroup('Root') && ($grp_name == 'Root')) {
            $retval .= $LANG_ACCESS['canteditroot'];
            COM_accessLog("User {$_USER['username']} tried to edit the Root group with insufficient privileges.");
        } else {
            $retval .= $LANG_ACCESS['canteditgroup'];
        }
        $retval .= COM_endBlock(COM_getBlockTemplate('_msg_block', 'footer'));

        return $retval;
    }

    $group_listing_url = $_CONF['site_url'] . '/socnet/index.php';
    $showall = 0;
    if (isset($_REQUEST['chk_showall']) && ($_REQUEST['chk_showall'] == 1)) {
        $group_listing_url .= '?chk_showall=1';
        $showall = 1;
    }

    $menu_arr = array(
                    array('url'  => $group_listing_url,
                          'text' => $SOCNET_User['viewallgroups'])
                );

    $retval .= COM_startBlock($LANG_ACCESS['usergroupadmin'] . " - $grp_name",
                        '', COM_getBlockTemplate('_admin_block', 'header'));

    $retval .= ADMIN_createMenu($menu_arr, $LANG_ACCESS['editgroupmsg'],
                $_CONF['layout_url'] . '/images/icons/group.' . $_IMAGE_TYPE);

    $groupmembers = new Template($plugin_path . 'templates/');
    $groupmembers->set_file(array('groupmembers' => 'groupmembers.thtml'));
    $groupmembers->set_var('xhtml', XHTML);
    $groupmembers->set_var('plugin_url', $plugin_path);
    $groupmembers->set_var('site_url', $_CONF['site_url']);
    $groupmembers->set_var('site_admin_url', $_CONF['site_admin_url']);
    $groupmembers->set_var('layout_url', $_CONF['layout_url']);
    $groupmembers->set_var('group_listing_url', $group_listing_url);
    $groupmembers->set_var('phpself', $_CONF['site_url'] . '/socnet/index.php');
    $groupmembers->set_var('lang_adminhome', $LANG_ACCESS['adminhome']);
    $groupmembers->set_var('lang_instructions', $LANG_ACCESS['editgroupmsg']);
    $groupmembers->set_var('LANG_sitemembers',$LANG_ACCESS['availmembers']);
    $groupmembers->set_var('LANG_grpmembers',$LANG_ACCESS['groupmembers']);
    $groupmembers->set_var('group_list', grp_selectUsers($group));
    $groupmembers->set_var('LANG_remove',$LANG_ACCESS['remove']);
    $groupmembers->set_var('lang_save', $LANG_ADMIN['save']);
    $groupmembers->set_var('lang_cancel', $LANG_ADMIN['cancel']);
    $groupmembers->set_var('lang_grouplist', $LANG28[38]);
    $groupmembers->set_var('show_all', $showall);
    $groupmembers->set_var('group_id',$group);
    $groupmembers->set_var('gltoken_name', CSRF_TOKEN);
    $groupmembers->set_var('gltoken', SEC_createToken());
    $groupmembers->parse('output', 'groupmembers');
    $retval .= $groupmembers->finish($groupmembers->get_var('output'));

    $retval .= COM_endBlock(COM_getBlockTemplate('_admin_block', 'footer'));

    return $retval;
}
/*Show the group request form
 * 
 */
function sendGroupJoinlList($grp_id) {
	global $plugin_path;
	
	$groupmembers = new Template($plugin_path . 'templates/');
    $groupmembers->set_file(array('grouprequest' => 'groupRequestForm.thtml'));
    $groupmembers->set_var('group_id',$grp_id);
    $groupmembers->set_var('gltoken_name', CSRF_TOKEN);
    $groupmembers->set_var('group_list', grp_selectUsers($grp_id));
    $groupmembers->set_var('gltoken', SEC_createToken());
    $groupmembers->parse('output', 'grouprequest');
    $retval .= $groupmembers->finish($groupmembers->get_var('output'));

    $retval .= COM_endBlock(COM_getBlockTemplate('_admin_block', 'footer'));
    return $retval;
}

/**
* Delete a group, modified from group.php to be used by regular users to delete their groups
*
* @param    int     $grp_id     id of group to delete
* @return   string              HTML redirect
*
*/
function soc_deleteGroup ($grp_id)
{
    global $_CONF, $_TABLES, $_USER;

    if (!SEC_inGroup ('Root') && (SEC_getGroupName($grp_id) == 'Root')) {
        COM_accessLog ("User {$_USER['username']} tried to delete the Root group with insufficient privileges.");

        return COM_refresh ($_CONF['site_url'] . '/group.php');
    }
    
	if (!hasPermission($_USER['uid'], $grp_id, 'delete')) {
        COM_accessLog ("User {$_USER['username']} tried to delete the Root group with insufficient privileges.");
        return COM_refresh ($_CONF['site_url'] . '/group.php');
    }

    $GroupAdminGroups = SEC_getUserGroups ();
    if (!in_array ($grp_id, $GroupAdminGroups) && !SEC_groupIsRemoteUserAndHaveAccess($grp_id, $GroupAdminGroups)) {
        COM_accessLog ("User {$_USER['username']} tried to delete group $grp_id with insufficient privileges.");

        return COM_refresh ($_CONF['site_url'] . '/group.php');
    }

    DB_delete ($_TABLES['access'], 'acc_grp_id', $grp_id);
    DB_delete ($_TABLES['group_assignments'], 'ug_grp_id', $grp_id);
    DB_delete ($_TABLES['group_assignments'], 'ug_main_grp_id', $grp_id);
    DB_delete ($_TABLES['groups'], 'grp_id', $grp_id);

    PLG_groupChanged ($grp_id, 'delete');
    if (isset($_REQUEST['chk_showall']) && ($_REQUEST['chk_showall'] == 1)) {
        return COM_refresh($_CONF['site_url'] . '/socnet/index.php?msg=50&chk_showall=1');
    } else {
        return COM_refresh($_CONF['site_url'] . '/socnet/index.php?msg=50');
    }
}

/*
 * Edit the user privacy settings
 * $perm['enabled'] tells whether or not the user wants to use socnet at all
 * $perm['private'] tells whether the user wants to keep himself hidden from socnet, but not removed
 * $perm['invites'] tells whether the user accepts new group invites
 * $perm['profile'] tells whether the user wants his soc info on this profile shown
 * 
 * @param    int		$uid 	  The user id
 * @param    int		$gid	  The group id
 * @param	 array		$perm	  The array of permissions
 */							       
function editPrivacy($uid,$gid,$perm) {
	global $_TABLES;
	$sql="UPDATE {$_TABLES['users_socnetinfo']}, SET enabled = {$perm['enabled']},
		private = {$perm['private']}, acceptinvites = {$perm['accept']}, show_profile
		 = {$perm['profile']};";
	DB_query($sql);
}

/* Sends an email to the user to join the group, requested by the group admin 
 * 
 * @param   int    $uid  The User id
 * @param   int    $gid  The group id
 * $param   string $message Custom email message. Default is givin if empty
 */
function sendGroupJoinRequest($uid, $gid, $message='') {
	global $_CONF, $_TABLES;
	/* check if user's privacy allows you to request group join */
	
	/*generate the url */
	
	$subject ="{$_CONF['site_name']} group invitation."; 
	$groupname = DB_getItem($_TABLES['groups'], 'grp_name', "grp_id=$gid");
	$email = DB_getItem($_TABLES['users'], 'email', "uid=$uid");
	if($message=='') {
		$message = "Group $groupname has requested you join thier group.";
	}
	$message .= "\nTo accept this invitation, please <a href='$url'>click here</a>";
	//mail($email,$subject,$message);
}

/* Sends a group join request to the group admin
 * 
 * @param    int 	$uid  		 The User id
 * @param    int 	$gid   	 	 The Group id
 * @param    string $message     A custom message to the group admin
 */
function sendUserJoinRequest($uid,$gid,$message='') {
	global $_CONF, $_TABLES;
	/*generate the url */
	$url='';
	$result = DB_query("SELECT grp_name, grp_owner FROM {$_TABLES['groups']} WHERE grp_id=$gid");
	$A = DB_fetchArray($result, false);
	list($groupname,$grp_owner) = $A;
	$username = DB_getItem($_TABLES['users'], 'username', "uid=$uid");
	$subject = "$username has sent a request to join your group $groupname";
	$grp_email = DB_getItem($_TABLES['users'], 'email', "uid=$grp_owner");
	if($message=='') {
			$message = "User $username has requested to join your group, $groupname.";
		}
	$message .= "\nTo accept this join request, please <a href='$url'>click here</a>";
	//mail($grp_email,$subject,$message); use geeklog way of sending email
}

/*Abstraction permission checker for Socnet
 * calls SEC_getUserPermissions, sometimes
 * @ param  int 	$uid          The user ID
 * @ param int 		$gid		  The group ID
 * @ param string	$feature	  The feature that the user wants access to
 */
function hasPermission($uid,$gid,$feature) {
	global $_TABLES;
	if(empty($gid) || empty($feature)) {
		COM_accessLog("Invalid use of hasPermission. Failing gracefully");
		return false;
	}	
	if($feature=='delete') { 
		$sql="SELECT grp_owner FROM {$_TABLES['groups']} WHERE grp_id='$gid' AND grp_owner
		='$uid'";
		$result = DB_query ($sql);
        $num = DB_numRows($result);
		return ($num==1);
	}
	/* call SEC_getUserPermissions and see */
} 

/**	 Hooks **/

/**
* Callback function when an item was saved
*
* @param    string  $id     (unused) ID of item being saved
* @param    string  $type   type of item ('article', 'staticpages', ...)
* @param    string  $old_id (unused) previous ID of item, if != $id
* @return   void
* @see      PLG_itemSaved
*
*/
function plugin_itemsaved_socnet($id, $type, $old_id)
{
    global $_TABLES;

}

/**
* A user is about to be deleted. Update ownership of any events owned
* by that user or delete them.
*
* @param   uid   int   User id of deleted user
*
*/
function plugin_user_delete_socnet ($uid) {
    global $_TABLES;
	
	$sql="DELETE FROM {$_TABLES['users_socnetinfo']} WHERE `uid`=$uid";
	DB_query($sql);
	//now delete him from socnet groups
}

function plugin_user_create_socnet($uid){
	global $_TABLES;

	$sql="INSERT INTO {$_TABLES['users_socnetinfo']}(`uid`) VALUES($uid)";
	DB_query($sql);
};
?>
