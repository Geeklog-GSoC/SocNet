<?php 

$_SQL[] = "
	CREATE TABLE {$_TABLES['users_socnetinfo']} (
	 uid INT NOT NULL,
	 enabled SMALLINT NOT NULL DEFAULT  '1',
	 private SMALLINT NOT NULL DEFAULT  '1',
	 acceptinvites SMALLINT NOT NULL DEFAULT  '1',
	 show_profile SMALLINT NOT NULL DEFAULT  '1',
	PRIMARY KEY (uid)
);"

?>