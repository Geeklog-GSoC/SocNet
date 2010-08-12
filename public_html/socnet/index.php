<?php 

require('../lib-common.php');

if (!in_array('socnet', $_PLUGINS)) {
    echo COM_refresh($_CONF['site_url'] . '/index.php');
    exit;
}

if (COM_isAnonUser() &&
    (($_CONF['loginrequired'] == 1) || ($_SOC_CONF['calendarloginrequired'] == 1))) {
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
		DB_query($sql);
		$sql="INSERT INTO {$_TABLES['soc_usersocnetinfo']}(`uid`,`private`,`acceptinvites`,`show_profile`) 
		VALUES({$_USER['uid']},$private,$invites,$profile)";
		DB_query($sql);
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


require_once('../admin/group.php');

$mode = '';
if (isset($_REQUEST['mode'])) {
    $mode = $_REQUEST['mode'];
}
else 
	$mode='view';
	
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
}	
 elseif($mode== 'sendUserJoinList') {
	$display .= COM_siteHeader ('menu', $LANG_ACCESS['usergroupadmin']);
	$display .= COM_showMessageFromParameter();
	$display .= sendUserJoinlList();
	$display .= COM_siteFooter ();
} elseif($mode== 'sendGroupRequest') {
	$grp_id = COM_applyFilter ($_REQUEST['grp_id'], true);
	$type = COM_applyFilter ($_REQUEST['type'], false);
	$uid_arr = array();
	if($type=='inputform') {
		$username = COM_applyFilter ($_REQUEST['username'], false);
		/* check to see if the user exists */
		$sql="SELECT uid FROM {$_TABLES['users']} WHERE username='$username'";
		$result = DB_query($sql);
		if(DB_numRows($result)==1) {
			$A = DB_fetchArray($result);
			$uid = $A['uid'];
			$uid_arr[] = $uid;
		}
	}
	else {
		$uids = $_POST['usernames'];
		foreach($uids as $uid) {
			$uid = COM_applyFilter ($uid, true);
			$uid_arr[] = $uid;
		}
	}
	$display .= COM_siteHeader ('menu', $LANG_ACCESS['usergroupadmin']);
	$display .= sendGroupJoinRequest($uid_arr,$grp_id);
	$display .= COM_siteFooter ();
}
 elseif($mode=='completeGroupRequest') {
 	$hash = COM_applyFilter ($_REQUEST['hash'], false);
 	completeGroupRequest($hash);
 }
 elseif($mode=='sendUserJoinRequest') {
 	$grp_name = COM_applyFilter ($_REQUEST['groupname'], false);
 	$gid = DB_getItem($_TABLES['groups'], 'grp_id', "grp_name='$grp_name'");
 	if($gid<5) { //the entered group does not exist, go back
 		echo COM_refresh ($_CONF['site_url'] . '/socnet/index.php?msg=402&mode=sendUserJoinList');
 	}
 	$message = COM_applyFilter ($_REQUEST['message'], false);
 	$uid = $_USER['uid'];
 	sendUserJoinRequest($uid,$gid,$message);
 }
 elseif($mode=='completeUserRequest') {
 	$hash = COM_applyFilter ($_REQUEST['hash'], false);
 	completeUserRequest($hash);
 }
 elseif($mode=='test') {
 	$perm = new soc_perm();
 	$perm->set_uid(3);
 	$perm->set_content_id(5);
 	$perm->set_groups('1,2,13'); //user 3 is in groups 2, 13, but not 1
 	//$perm->soc_set_security('socnet', 'edit,read,deface');
 	echo $perm->soc_get_security('socnet');
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