<?php

class soc_perm {

   function __construct() {
		$uid=0;
		$cont_id=0;
		$groups = array();
		$user_groups = array();
	}
	
	function set_uid($uid) {
		$this->uid = $uid;
	}
	
	function set_content_id($cont_id) {
		$this->cont_id = $cont_id;
	}
	
	/*
	 * Takes a comma seperated list of group ID's and sets it in the class
	 * @param		String		Comma seperated list of groups
	 */
	function set_groups($grps) {
		$this->groups = explode(',',$grps);
	}
	
	/*
	 * Secure the plugin content for Socnet groups
	 * @param 	String 			Name of the plugin(as in the plugins install file) i.e. pi_name
	 * @param	String			Array of permissions that this group has for this content
	 * @param   Int				The primary key, used for editing a current permission
	 */
	function soc_set_security($pi_type, $perm_arr,$pkey='') {
		global $_TABLES;
		/* check that this plugin exists */
		$sql="SELECT pi_name FROM {$_TABLES['plugins']} WHERE pi_name = '$pi_type'";
		$result = DB_query($sql);
		
		if(DB_numRows($result)==1) {
			if($this->uid!=0) {
				$sql="SELECT ug_main_grp_id FROM {$_TABLES['group_assignments']} WHERE ug_uid='{$this->uid}'";
				$result = DB_query($sql);
				while($group = DB_fetchArray($result)) {
					$this->user_groups[] = $group['ug_main_grp_id'];
				}
			}
			if($this->uid!=0 && (count($this->groups)!=0)) { //check that the groups passed in to check foro the user match up to his real groups
				$match = array_intersect($this->groups, $this->user_groups);
				echo 'iiiii';
				if(count($match)==0) {
					COM_errorLog('The user does not belong to any of the groups specified.');
					return '';
				}
				else {
					$this->groups = $match;
				}
			}
			print_r($this->groups);
			foreach($this->groups as $grp_id) {
				if($pkey=='') {
					$sql="INSERT INTO {$_TABLES['socnet_perm']}(pi_type,perm_arr,cont_id,grp_id) VALUES
					 ('$pi_type','$perm_arr','{$this->cont_id}','$grp_id');";
					DB_query($sql);
				}
				else 
					DB_save($_TABLES['socnet_perm'],"uid,pi_type,perm_arr,cont_id,grp_id","'$pkey','$pi_type','$perm_arr','{$this->cont_id}','$grp_id'");
			}
		}
		else {
			/* log an error */
			echo(COM_refresh($_CONF['site_url'] . '/index.php'));
		}
	}
	
	/*
	 * Get the permissions for the current user
	 * @param 	 String			Plugin name(pi name)
	 * @param	 Int			User ID
	 * @array    Array          Associative array of options - grp_id, cont_id and uid
	 * 							grp_id: comma seperated list! - limit the permissions just to this group
	 * 						    cont_id: limit the permissions just to this content ID
	 * 							uid: limit the permissions just for this user
	 * @return   String 		Comma seperated string of permissions
	 */
	function soc_get_security($pi_name) {
		global $_TABLES;
		/* check optional parameters */
		if($this->uid==0 && count($this->groups)==0){
			COM_errorLog('No options specified');
			return '';
		}
		if($this->uid!=0) {
			$sql="SELECT ug_main_grp_id FROM {$_TABLES['group_assignments']} WHERE ug_uid='$this->uid'";
			$result = DB_query($sql);
			while($group = DB_fetchArray($result)) {
				$this->user_groups[] = $group['ug_main_grp_id'];
			}
		}
		
		if($this->uid!=0 && (count($this->groups)!=0)) { //check that the groups passed in to check foro the user match up to his real groups
			$match = array_intersect($this->groups, $this->user_groups);
			if(count($match)==0) {
				COM_errorLog('The user does not belong to any of the groups specified.');
				return '';
			}
			else 
				$this->groups = $match;
		}
		elseif($this->uid!=0 && (count($this->groups))==0) {
			$this->groups = $this->user_groups;
		}
		/* build the query string */
		$sql="SELECT perm_arr FROM {$_TABLES['socnet_perm']} WHERE ";
		if($this->cont_id!=0)
			$sql .="cont_id={$this->cont_id} AND ";
		if (count($this->groups)>0) {
			$sql .='(';
			foreach($this->groups as $gid) {
				$sql .="grp_id='$gid' OR ";
			}
			$sql .='1=2)';
		}
		$result = DB_query($sql);
		$A = DB_fetchArray($result);
		return $A['perm_arr'];
	}
	
	/*
	 * Displays the permission form that users can set for securing the socnet content
	 * @param 			Int			Allow the user to add permissions for this content to his other socnet groups
	 * @param			String 		Path to custom form
	 * @param			String 		Custom template filename
	 *
	function soc_perm_form($allow_more=1, $custom_path='', $custom_file='') {
		global $plugin_path;
		if($custom_path=='')
			$permform = new Template($plugin_path . 'templates/');
		else 
			$permform = new Template($custom_path);
		if($custom_file=='')
	    	$permform->set_file(array('permissionform' => 'groupRequestForm.thtml'));
	    else 
	    	$permform->set_file(array('permissionform' => $custom_file));
	    $permform->set_var('allow_more',$allow_more);
	    $permform->set_var('', CSRF_TOKEN);
	    $permform->set_var('gltoken_name', CSRF_TOKEN);
	    $permform->set_var('gltoken', SEC_createToken());
	    $permform->parse('output', 'permissionform');
	    $retval .= $permform->finish($permform->get_var('output'));
	    $retval .= COM_endBlock(COM_getBlockTemplate('_admin_block', 'footer'));
	    return $retval;
	} */
};
?>