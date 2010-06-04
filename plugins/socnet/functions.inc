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
function savegroupusers($groupid, $groupmembers, $grp_owner=-1)
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
function sendJoinRequest($uid, $gid, $message='') {
	global $_CONF, $_TABLES;
	/*generate the url */
	
	$subject ="{$_CONF['site_name']} group invitation."; 
	$group = DB_getItem($_TABLES['groups'], 'grp_name', "grp_id=$gid");
	$email = DB_getItem($_TABLES['users'], 'email', "uid=$uid");
	if(strlen($message)==0) {
		$message = "Group $group has requested you join thier group.";
	}
	$message .= "\nTo accept this invitation, please <a href='$url'>click here</a>";
	mail($email,$subject,$message);
}
?>
