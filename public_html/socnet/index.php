<?php 

require('../lib-common.php');

/* Security check to ensure user even belongs on this page */
require '../admin/auth.inc.php';

require'../admin/group.php';

$mode = '';
if (isset($_REQUEST['mode'])) {
    $mode = $_REQUEST['mode'];
}

if (($mode == $LANG_ADMIN['delete']) && !empty ($LANG_ADMIN['delete'])) {
    $grp_id = COM_applyFilter ($_REQUEST['grp_id'], true);
    if (!isset ($grp_id) || empty ($grp_id) || ($grp_id == 0)) {
        COM_errorLog ('Attempted to delete group grp_id=' . $grp_id);
        $display .= COM_refresh ($_CONF['site_admin_url'] . '/group.php');
    } elseif (SEC_checkToken()) {
        $display .= soc_deleteGroup ($grp_id);
    } else {
        COM_accessLog("User {$_USER['username']} tried to illegally delete group $grp_id and failed CSRF checks.");
        echo COM_refresh($_CONF['site_admin_url'] . '/index.php');
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
    $display .= editgroup ($grp_id);
    $display .= COM_siteFooter ();
} elseif ($mode == 'listusers') {
    $grp_id = COM_applyFilter ($_REQUEST['grp_id'], true);
    $display .= COM_siteHeader ('menu', $LANG_ACCESS['groupmembers']);
    $display .= listusers ($grp_id);
    $display .= COM_siteFooter ();
} elseif ($mode == 'editusers') {
    $grp_id = COM_applyFilter ($_REQUEST['grp_id'], true);
    $display .= COM_siteHeader ('menu', $LANG_ACCESS['usergroupadmin']);
    $display .= editusers ($grp_id);
    $display .= COM_siteFooter ();
} elseif ($mode == 'usergroups') {
    $uid = COM_applyFilter ($_REQUEST['uid'], true);
    $display .= COM_siteHeader ('menu', $LANG28[91]);
    $display .= listgroupsbyuser($uid);
    $display .= COM_siteFooter ();
} elseif ($mode == 'usergroups') {
    $uid = COM_applyFilter ($_REQUEST['uid'], true);
    $display .= COM_siteHeader ('menu', $LANG28[91]);
    $display .= listgroupsbyuser($uid);
    $display .= COM_siteFooter ();
} else { // 'cancel' or no mode at all
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
    $display .= COM_siteHeader('menu', $LANG28[38]);
    $display .= COM_showMessageFromParameter();
    $display .= listgroups($show_all_groups);
    $display .= COM_siteFooter();
}

COM_output($display);

?>