<?php 

$_SQL[] = "
	CREATE TABLE {$_TABLES['soc_usersocnetinfo']} (
	 uid SERIAL,
	 enabled SMALLINT NOT NULL DEFAULT  '1',
	 private SMALLINT NOT NULL DEFAULT  '1',
	 acceptinvites SMALLINT NOT NULL DEFAULT  '1',
	 show_profile SMALLINT NOT NULL DEFAULT  '1',
	PRIMARY KEY (uid)
);";

$_SQL[] = "
	CREATE TABLE {$_TABLES['soc_accesscodes']} (
	 uid SERIAL,
	 sid varchar(64) NOT NULL,
	 gid INT NOT NULL,
	 created TIMESTAMP NOT NULL DEFAULT NOW(),
	PRIMARY KEY (sid)
);";

$_SQL[] = "
	CREATE TABLE {$_TABLES['soc_permissions']} (
	 id SERIAL,
	 pi_type varchar(64) NOT NULL,
	 perm_arr varchar(128) NOT NULL,
	 cont_id INT NOT NULL,
	 grp_id INT NOT NULL,
	PRIMARY KEY (id)
);";
?>