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

/*
 * Returns true or false whether the user is the group admin
 * 
 *  Note:
 *  
 * The ID param cannot work both ways. Either both params are ID's, or both are names. 
 * @param    int/string   $uid       User ID or name to get information for. If empty current user.
 * @param    int/string   $gid       The group we are looking at. Could be passed in as ID or name
 * @param    bool         $id        Whether we are passing in the parameters as ID's or names. True if ID's
 * @return	bool		             Returns whether the user is the group admin
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
	if ($_SEC_VERBOSE) {
        COM_errorLog("got $nrows rows",1);
    }
    
	return ($nrows==1);

}
?>
