<?php 

require('../lib-common.php');

if (!in_array('calendar', $_PLUGINS)) {
    echo COM_refresh($_CONF['site_url'] . '/index.php');
    exit;
}

if (COM_isAnonUser() &&
    (($_CONF['loginrequired'] == 1) || ($_CA_CONF['calendarloginrequired'] == 1))) {
    $display .= COM_siteHeader('menu', $LANG_CAL_1[41]);
    $display .= SEC_loginRequiredForm();
    $display .= COM_siteFooter();
    COM_output($display);
    exit;
}

/* Security check to ensure user even belongs on this page */
$plugin_path = $_CONF['path'] . 'plugins/socnet/';

	
if (!SEC_hasRights('socnet.groupadmin')) {
	if($_POST['terms']=='on') { 
		$invites = ($_POST['invites']=='on')? 1:0;
		$profile = ($_POST['profile']=='on')? 1:0;
		$private = ($_POST['private']=='on')? 1:0;
		$sql = "INSERT INTO {$_TABLES['group_assignments']} (`ug_main_grp_id`, `ug_uid`) VALUES (
		(SELECT grp_id FROM {$_TABLES['groups']} WHERE `grp_name`='Social Networking Plugin Admin'),
		 {$_USER['uid']})";
		DB_query($sql,1);
		$sql="INSERT INTO {$_TABLES['users_socnetinfo']}(`uid`,`private`,`acceptinvites`,`show_profile`) 
		VALUES({$_USER['uid']},$private,$invites,$profile)";
		DB_query($sql,1);
		echo COM_refresh($_CONF['site_url'] . '/socnet/index.php');
	}
	else {
	    $display .= COM_siteHeader('menu', $SOCNET_User[3])
	             . COM_showMessageText($SOCNET_User[3], $MESSAGE[30]);
	    $socnetreg = new Template($plugin_path . 'templates/');
	    $socnetreg->set_file(array('registration' => 'registration.thtml'));
	    $socnetreg->set_var('xhtml', XHTML);
	    $socnetreg->set_var('site_url', $_CONF['site_url']);
	    $socnetreg->set_var('layout_url', $_CONF['layout_url']);
	    $socnetreg->set_var('group_listing_url', $group_listing_url);
	    $socnetreg->set_var('phpself', $_CONF['site_url'] . '/socnet/index.php');
	    $socnetreg->set_var('lang_save', $LANG_ADMIN['save']);
	    $socnetreg->set_var('lang_cancel', $LANG_ADMIN['cancel']);
	    $socnetreg->set_var('gltoken_name', CSRF_TOKEN);
	    $socnetreg->set_var('gltoken', SEC_createToken());
	    $socnetreg->parse('output', 'registration');
	    $display .= $socnetreg->finish($socnetreg->get_var('output'))
	             
	             . COM_siteFooter();
	    COM_accessLog("User {$_USER['username']} tried to illegally access the group administration screen.");
	    COM_output($display);
	    exit;
	}
} 


require'../admin/group.php';
require('../../plugins/socnet/language/english.php');

$mode = '';
if (isset($_REQUEST['mode'])) {
    $mode = $_REQUEST['mode'];
}
	if (($mode == $LANG_ADMIN['delete']) && !empty ($LANG_ADMIN['delete'])) {
    $grp_id = COM_applyFilter ($_REQUEST['grp_id'], true);
    if (!isset ($grp_id) || empty ($grp_id) || ($grp_id == 0)) {
        COM_errorLog ('Attempted to delete group grp_id=' . $grp_id);
        $display .= COM_refresh ($_CONF['site_url'] . '/group.php');
    } elseif (SEC_checkToken()) {
        $display .= soc_deleteGroup ($grp_id);
    } else {
        COM_accessLog("User {$_USER['username']} tried to illegally delete group $grp_id and failed CSRF checks.");
        echo COM_refresh($_CONF['site_url'] . '/index.php');
    }
} elseif (($mode == $LANG_ADMIN['save']) && !empty($LANG_ADMIN['save']) && SEC_checkToken()) {
    $grp_gl_core = COM_applyFilter($_POST['grp_gl_core'], true);
    $grp_default = 0;
    if (isset($_POST['chk_grpdefault'])) {
        $grp_default = 1;
    }
    $grp_applydefault = 0;
    if (isset($_POST['chk_applydefault'])) {
        $grp_applydefault = 1;
    }
    $chk_grpadmin = '';
    if (isset($_POST['chk_grpadmin'])) {
        $chk_grpadmin = COM_applyFilter($_POST['chk_grpadmin']);
    }
    $features = array();
    if (isset($_POST['features'])) {
        $features = $_POST['features'];
    }
    $groups = array();
    if (isset($_POST['groups'])) {
        $groups = $_POST['groups'];
    }
    $display .= soc_savegroup(COM_applyFilter($_POST['grp_id'], true),
                          COM_applyFilter($_POST['grp_name']),
                          $_POST['grp_descr'], $chk_grpadmin, $grp_gl_core,
                          $grp_default, $grp_applydefault, $features, $groups);
} elseif (($mode == 'savegroupusers') && SEC_checkToken()) {
    $grp_id = COM_applyFilter($_REQUEST['grp_id'], true);
    $display .= soc_savegroupusers($grp_id, $_POST['groupmembers']);
} elseif ($mode == 'edit') {
    $grp_id = 0;
    if (isset ($_REQUEST['grp_id'])) {
        $grp_id = COM_applyFilter ($_REQUEST['grp_id'], true);
    }
    $display .= COM_siteHeader ('menu', $LANG_ACCESS['groupeditor']);
    $display .= soc_editgroup ($grp_id);
    $display .= COM_siteFooter ();
} elseif ($mode == 'listusers') {
    $grp_id = COM_applyFilter ($_REQUEST['grp_id'], true);
    $display .= COM_siteHeader ('menu', $LANG_ACCESS['groupmembers']);
    $display .= soc_listusers ($grp_id);
    $display .= COM_siteFooter ();
} elseif ($mode == 'editusers') {
    $grp_id = COM_applyFilter ($_REQUEST['grp_id'], true);
    $display .= COM_siteHeader ('menu', $LANG_ACCESS['usergroupadmin']);
    $display .= soc_editusers ($grp_id);
} elseif($mode== 'sendRequestList') {
	$grp_id = COM_applyFilter ($_REQUEST['grp_id'], true);
	$display .= COM_siteHeader ('menu', $LANG_ACCESS['usergroupadmin']);
	$display .= sendGroupJoinlList($grp_id);
	$display .= COM_siteFooter ();
} elseif($mode== 'sendRequest') {
	$grp_id = COM_applyFilter ($_REQUEST['grp_id'], true);
	$display .= COM_siteHeader ('menu', $LANG_ACCESS['usergroupadmin']);
	$display .= sendGroupJoinRequest($grp_id);
	$display .= COM_siteFooter ();
} 
 else { // 'cancel' or no mode at all
    $show_all_groups = false;
    if (isset($_POST['q'])) {
        // check $_POST only, as $_GET['chk_showall'] may also be set
        if (isset($_POST['chk_showall']) && ($_POST['chk_showall'] == 1)) {
            $show_all_groups = true;
        }
    } elseif (isset($_REQUEST['chk_showall']) &&
            ($_REQUEST['chk_showall'] == 1)) {
        $show_all_groups = true;
    }
    $display .= COM_siteHeader('menu', $SOCNET_User[2]);
    $display .= COM_showMessageFromParameter();
    $display .= soc_listgroups($show_all_groups);
    $display .= COM_siteFooter();
}
COM_output($display);
?>