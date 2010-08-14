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

soc_is_registered(); //check if the user is in the socnet database


require_once('../admin/group.php');

$mode = '';
if (isset($_REQUEST['mode'])) {
    $mode = $_REQUEST['mode'];
}
else 
	$mode='view';
	switch($mode) {
		case  $LANG_ADMIN['delete']:
				if(!empty ($LANG_ADMIN['delete']))
				{
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
				}
				break;
		case $LANG_ADMIN['save']:
				if(!empty($LANG_ADMIN['save']) && SEC_checkToken()) {
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
				}
				break;
		case "savegroupusers":
			 	if(SEC_checkToken()) {
					$grp_id = COM_applyFilter($_REQUEST['grp_id'], true);
   					 $display .= soc_savegroupusers($grp_id, $_REQUEST['groupmembers']);
			 	}
			 	break;
		case "edit":
					 $grp_id = 0;
				    if (isset ($_REQUEST['grp_id'])) {
				        $grp_id = COM_applyFilter ($_REQUEST['grp_id'], true);
				    }
				    $display .= COM_siteHeader ('menu', $LANG_ACCESS['groupeditor']);
				    $display .= soc_editgroup ($grp_id);
				    $display .= COM_siteFooter ();
					break;
		case "listusers":
					$grp_id = COM_applyFilter ($_REQUEST['grp_id'], true);
				    $display .= COM_siteHeader ('menu', $LANG_ACCESS['groupmembers']);
				    $display .= soc_listusers ($grp_id);
				    $display .= COM_siteFooter ();
				    break;
		case "editusers":
					$grp_id = COM_applyFilter ($_REQUEST['grp_id'], true);
				    $display .= COM_siteHeader ('menu', $LANG_ACCESS['usergroupadmin']);
				    $display .= soc_editusers ($grp_id);
				    break;
		case "sendRequestList":
					$grp_id = COM_applyFilter ($_REQUEST['grp_id'], true);
					$display .= COM_siteHeader ('menu', $LANG_ACCESS['usergroupadmin']);
					$display .= sendGroupJoinlList($grp_id);
					$display .= COM_siteFooter ();
					break;
		case "sendUserJoinList":
					$display .= COM_siteHeader ('menu', $LANG_ACCESS['usergroupadmin']);
					$display .= COM_showMessageFromParameter();
					$display .= sendUserJoinlList();
					$display .= COM_siteFooter ();
					break;
		case "sendGroupRequest":
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
					break;
		case "completeGroupRequest":
					$hash = COM_applyFilter ($_REQUEST['hash'], false);
 					completeGroupRequest($hash);
 					break;
		case "sendUserJoinRequest":
					$grp_name = COM_applyFilter ($_REQUEST['groupname'], false);
				 	$gid = DB_getItem($_TABLES['groups'], 'grp_id', "grp_name='$grp_name'");
				 	if($gid<5) { //the entered group does not exist, go back
				 		echo COM_refresh ($_CONF['site_url'] . '/socnet/index.php?msg=402&mode=sendUserJoinList');
				 	}
				 	$message = COM_applyFilter ($_REQUEST['message'], false);
				 	$uid = $_USER['uid'];
				 	sendUserJoinRequest($uid,$gid,$message);
				 	break;
		case "completeUserRequest":
					$hash = COM_applyFilter ($_REQUEST['hash'], false);
 					completeUserRequest($hash);
 					break;
		case "test":
					$perm = new soc_perm();
				 	$perm->set_uid(3);
				 	$perm->set_content_id(5);
				 	$perm->set_groups('1,2,13'); //user 3 is in groups 2, 13, but not 1
				 	//$perm->soc_set_security('socnet', 'edit,read,deface');
				 	echo $perm->soc_get_security('socnet');
				 	break;
		default:
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
					    break;
	}
COM_output($display);
?>