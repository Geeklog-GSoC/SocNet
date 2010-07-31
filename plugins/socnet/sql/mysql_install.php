<?php 
$_SQL[] = "
	CREATE TABLE {$_TABLES['users_socnetinfo']} (
	 uid INT NOT NULL,
	 enabled TINYINT NOT NULL DEFAULT  '1',
	 private TINYINT NOT NULL DEFAULT  '1',
	 acceptinvites TINYINT NOT NULL DEFAULT  '1',
	 show_profile TINYINT NOT NULL DEFAULT  '1',
	PRIMARY KEY (uid)
) ENGINE = MYISAM ;";

$_SQL[] = "
	CREATE TABLE {$_TABLES['request_codes']} (
	 uid INT NOT NULL,
	 sid varchar(64) NOT NULL,
	 gid INT NOT NULL,
	 created TIMESTAMP NOT NULL DEFAULT NOW(),
	PRIMARY KEY (sid)
) ENGINE = MYISAM ;";

?>