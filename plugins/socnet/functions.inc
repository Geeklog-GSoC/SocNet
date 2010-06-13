<?php 

//Some functions are in the core

function plugin_autouninstall_socnet ()
{
    $out = array();
    
    // Unregister the plugin with Geeklog
    $out = array (
        /* give the name of the tables, without $_TABLES[] */
        'tables' => array(),
        /* give the full name of the group, as in the db */
        'groups' => array(),
        /* give the full name of the feature, as in the db */
        'features' => array(),
        /* give the full name of the block, including 'phpblock_', etc */
        'php_blocks' => array(),
        /* give all vars with their name */
        'vars'=> array()
    );

    return $out;
}

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
                      $_CONF['site_admin_url'] . '/plugins/socnet/index.php',
                      '');
}

/**
* returns the user option for this plugin
*
*/
function plugin_getuseroption_socnet()
{
    global $_CONF;
    $url = $_CONF['site_url'] . '/socnet/index.php?mode=personal';
    return array ('SocNet Groups', $url, '');
}


/**
* A user is about to be deleted. Update ownership of any events owned
* by that user or delete them.
*
* @param   uid   int   User id of deleted user
*
*/
function plugin_user_delete_socnet ($uid)
{
    global $_TABLES;

    DB_delete ($_TABLES['personal_events'], 'owner_id', $uid);

    if ($_CA_CONF['delete_event'] == 1) {
        // delete the events
        DB_delete ($_TABLES['events'], 'owner_id', $uid);

    } else {
        // assign ownership to a user from the Root group
        $rootgroup = SEC_getGroupIdFromName('Root');
        $result = DB_query ("SELECT DISTINCT ug_uid FROM {$_TABLES['group_assignments']} WHERE ug_main_grp_id = $rootgroup ORDER BY ug_uid LIMIT 1");
        list($rootuser) = DB_fetchArray ($result);
        DB_query ("UPDATE {$_TABLES['events']} SET owner_id = $rootuser WHERE owner_id = $uid");
    }
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
        $retval = COM_refresh($_CONF['site_admin_url'] . '/socnet/socgroups.php?msg=49&chk_showall=1');
    } else {
        $retval = COM_refresh($_CONF['site_admin_url'] . '/socnet/socgroups.php?msg=49');
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

            return COM_refresh ($_CONF['site_admin_url'] . '/group.php');
        }

        if ($grp_gl_core == 1 AND !is_array ($features)) {
            COM_errorLog ("Sorry, no valid features were passed to this core group ($grp_id) and saving could cause problem...bailing.");

            return COM_refresh ($_CONF['site_admin_url'] . '/group.php');
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
                $retval .= editgroup ($grp_id);
                $retval .= COM_siteFooter ();

                return $retval;
            }
        }

        $grp_descr = COM_stripslashes($grp_descr);
        $grp_descr = addslashes($grp_descr);

        $grp_applydefault_add = true;
        if (empty($grp_id)) {
            DB_save($_TABLES['groups'],
                    'grp_name,grp_descr,grp_gl_core,grp_default',
                    "'$grp_name','$grp_descr',$grp_gl_core,$grp_default");
            $grp_id = SEC_getGroupIdFromName($grp_name);
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
                    'grp_id,grp_name,grp_descr,grp_gl_core,grp_default',
                    "$grp_id,'$grp_name','$grp_descr',$grp_gl_core,$grp_default");
            $new_group = false;
        }

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
            return COM_refresh($_CONF['site_admin_url'] . '/group.php?msg=49&chk_showall=1');
        } else {
            return COM_refresh($_CONF['site_admin_url'] . '/group.php?msg=49');
        }
    } else {
        $retval .= COM_siteHeader ('menu', $LANG_ACCESS['groupeditor']);
        $retval .= COM_startBlock ($LANG_ACCESS['missingfields'], '',
                           COM_getBlockTemplate ('_msg_block', 'header'));
        $retval .= $LANG_ACCESS['missingfieldsmsg'];
        $retval .= COM_endBlock (COM_getBlockTemplate ('_msg_block', 'footer'));
        $retval .= editgroup ($grp_id);
        $retval .= COM_siteFooter ();

        return $retval;
    }
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

        return COM_refresh ($_CONF['site_admin_url'] . '/group.php');
    }

    $GroupAdminGroups = SEC_getUserGroups ();
    if (!in_array ($grp_id, $GroupAdminGroups) && !SEC_groupIsRemoteUserAndHaveAccess($grp_id, $GroupAdminGroups)) {
        COM_accessLog ("User {$_USER['username']} tried to delete group $grp_id with insufficient privileges.");

        return COM_refresh ($_CONF['site_admin_url'] . '/group.php');
    }

    DB_delete ($_TABLES['access'], 'acc_grp_id', $grp_id);
    DB_delete ($_TABLES['group_assignments'], 'ug_grp_id', $grp_id);
    DB_delete ($_TABLES['group_assignments'], 'ug_main_grp_id', $grp_id);
    DB_delete ($_TABLES['groups'], 'grp_id', $grp_id);

    PLG_groupChanged ($grp_id, 'delete');
    if (isset($_REQUEST['chk_showall']) && ($_REQUEST['chk_showall'] == 1)) {
        return COM_refresh($_CONF['site_admin_url'] . '/group.php?msg=50&chk_showall=1');
    } else {
        return COM_refresh($_CONF['site_admin_url'] . '/group.php?msg=50');
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

/* Sends an email to the user to join the group, requested by the admin 
 * 
 * @param   int    $uid  The User id
 * @param   int    $gid  The group id
 * $param   string $message Custom email message. Default is givin if empty
 */
function sendGroupJoinRequest($uid, $gid, $message='') {
	global $_CONF, $_TABLES;
	/*generate the url */
	$url='';
	$subject ="{$_CONF['site_name']} group invitation."; 
	$group = DB_getItem($_TABLES['groups'], 'grp_name', "grp_id=$gid");
	$email = DB_getItem($_TABLES['users'], 'email', "uid=$uid");
	if(strlen($message)==0) {
		$message = "Group $group has requested you join thier group.";
	}
	$message .= "\nTo accept this invitation, please <a href='$url'>click here</a>";
	//mail($email,$subject,$message); use geeklog way of sending mail
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

/*
 * 
 */
function hasPermission($user,$gid,$feature) {
//calls SEC_getUserPermissions
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

function plugin_user_delete_socnet(){};

function plugin_user_create_socnet(){};
?>
