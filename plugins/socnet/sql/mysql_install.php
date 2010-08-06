<?php 
$_SQL[] = "
	CREATE TABLE {$_TABLES['users_socnetinfo']} (
	 uid INT NOT NULL auto_increment,
	 enabled TINYINT NOT NULL DEFAULT  '1',
	 private TINYINT NOT NULL DEFAULT  '1',
	 acceptinvites TINYINT NOT NULL DEFAULT  '1',
	 show_profile TINYINT NOT NULL DEFAULT  '1',
	PRIMARY KEY (uid)
) ENGINE = MYISAM ;";

$_SQL[] = "
	CREATE TABLE {$_TABLES['request_codes']} (
	 uid INT NOT NULL auto_increment,
	 sid varchar(64) NOT NULL,
	 gid INT NOT NULL,
	 created TIMESTAMP NOT NULL DEFAULT NOW(),
	PRIMARY KEY (sid), KEY(uid)
) ENGINE = MYISAM ;";

$_SQL[] = "
	CREATE TABLE {$_TABLES['socnet_perm']} (
	 id INT NOT NULL auto_increment,
	 pi_type varchar(64) NOT NULL,
	 perm_arr varchar(128) NOT NULL,
	 cont_id INT NOT NULL,
	 grp_id INT NOT NULL,
	PRIMARY KEY (id)
) ENGINE = MYISAM ;";

?>