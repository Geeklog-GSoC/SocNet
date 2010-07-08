<?php 
$_SQL[] = "
	CREATE TABLE {$_TABLES['users_socnetinfo']} (
	 uid INT NOT NULL,
	 enabled TINYINT NOT NULL DEFAULT  '1',
	 private TINYINT NOT NULL DEFAULT  '1',
	 acceptinvites TINYINT NOT NULL DEFAULT  '1',
	 show_profile TINYINT NOT NULL DEFAULT  '1',
	PRIMARY KEY (uid)
) ENGINE = MYISAM ;"

?>