<?php

/* Reminder: always indent with 4 spaces (no tabs). */
// +---------------------------------------------------------------------------+
// | socnet Plugin 1.0                                                     |
// +---------------------------------------------------------------------------+
// | install_defaults.php                                                      |
// |                                                                           |
// | Initial Installation Defaults used when loading the online configuration  |
// | records. These settings are only used during the initial installation     |
// | and not referenced any more once the plugin is installed.                 |
// +---------------------------------------------------------------------------+
// | Copyright (C) 2009 by the following authors:                              |
// |                                                                           |
// | Authors: Randy Kolenko        - rkolenko@gmail.com              		   |
// |          Stanislav Palatnik   - spalanikk@gmail.com                       |
// +---------------------------------------------------------------------------+
// |                                                                           |
// | This program is free software; you can redistribute it and/or             |
// | modify it under the terms of the GNU General Public License               |
// | as published by the Free Software Foundation; either version 2            |
// | of the License, or (at your option) any later version.                    |
// |                                                                           |
// | This program is distributed in the hope that it will be useful,           |
// | but WITHOUT ANY WARRANTY; without even the implied warranty of            |
// | MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the             |
// | GNU General Public License for more details.                              |
// |                                                                           |
// | You should have received a copy of the GNU General Public License         |
// | along with this program; if not, write to the Free Software Foundation,   |
// | Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.           |
// |                                                                           |
// +---------------------------------------------------------------------------+

/**
* Install data and defaults for the socnet plugin configuration
*
* @package socnet
*/

if (strpos(strtolower($_SERVER['PHP_SELF']), 'install_defaults.php') !== FALSE) {
    die('This file can not be used on its own!');
}

/**
* socnet default settings
*
* Initial Installation Defaults used when loading the online configuration
* records.  These settings are only used during the initial installation
* and not referenced any more once the plugin is installed
*/

/**
* Initialize Socnet plugin configuration
*
* Creates the database entries for the configuation if they don't already
* exist.
*
* @return   boolean     TRUE: success; FALSE: an error occurred
*/
function plugin_initconfig_socnet()
{
    global $_CONF;
   
    $soc = config::get_instance();
    if (!$soc->group_exists('socnet')) {
    	$soc->add('sg_main', NULL, 'subgroup', 0, 0, NULL, 0, true, 'socnet');
        $soc->add('fs_main', NULL, 'fieldset', 0, 0, NULL, 0, true, 'socnet');
        $soc->add('socnetloginrequired', 0,
                'select', 0, 0, 0, 0, true, 'socnet');
        $soc->add('displayallmembers', 0,
                'select', 0, 0, 0, 10, true, 'socnet');
        $soc->add('addadmintoallgroups', 0,
                'select', 0, 0, 0, 10, true, 'socnet');
    }
    
    return TRUE; 
}

?>
