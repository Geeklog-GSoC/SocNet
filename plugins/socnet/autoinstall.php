<?php

/* Reminder: always indent with 4 spaces (no tabs). */
// +---------------------------------------------------------------------------+
// | socnet Plugin 1.0                                                     |
// +---------------------------------------------------------------------------+
// | autoinstall.php                                                           |
// |                                                                           |
// | This file provides helper functions for the automatic plugin install.     |
// +---------------------------------------------------------------------------+
// | Copyright (C) 2010 by the following authors:                              |
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
* Autoinstall API functions for the socnet plugin
*
* @package socnet
*/

/**
* Plugin autoinstall function
*
* @param    string  $pi_name    Plugin name
* @return   array               Plugin information
*
*/
function plugin_autoinstall_socnet($pi_name)
{
    $pi_name         = 'socnet';
    $pi_display_name = 'Social Networking Plugin';
    $pi_admin        = $pi_display_name . ' Admin';

    $info = array(
        'pi_name'         => $pi_name,
        'pi_display_name' => $pi_display_name,
        'pi_version'      => '1.0.0',
        'pi_gl_version'   => '1.7.0',
        'pi_homepage'     => 'http://www.geeklog.net/',
    );
    
    $groups = array(
        $pi_admin => 'Has full access to ' . $pi_display_name . ' features',
        $pi_display_name.' User' => 'Is a member of ' . $pi_display_name
    );
    
    $features = array(
        $pi_name . '.groupadmin'  => 'Socnet Group Admin',
        $pi_name . '.user'  => 'Owns/uses a Socnet Group'
    );
    
    $tables = array(
        'soc_usersocnetinfo',
    	'soc_accesscodes',
    	'soc_permissions'
    );
    
    $mappings = array(
        $pi_name . '.groupadmin'    => array($pi_admin),
        $pi_name . '.user' 				=> array($pi_display_name.' User')
    );

    $inst_parms = array(
        'info'      => $info,
        'groups'    => $groups,
  	    'features'  => $features,
    	'mappings'	=>$mappings,
    	'tables'	=> $tables
    );

    return $inst_parms;
}

/**
* Load plugin configuration from database
*
* @param    string  $pi_name    Plugin name
* @return   boolean             TRUE on success, otherwise FALSE
* @see      plugin_initconfig_xmlsitemap
*
*/
function plugin_load_configuration_socnet($pi_name)
{
    global $_CONF;
    
    $base_path = $_CONF['path'] . 'plugins/' . $pi_name . '/';
    
    require_once $_CONF['path_system'] . 'classes/config.class.php';
    require_once $base_path . 'install_defaults.php';
    
    return plugin_initconfig_socnet();
}

/**
* Check if the plugin is compatible with this Geeklog version
*
* @param    string  $pi_name    Plugin name
* @return   boolean             TRUE: plugin compatible; FALSE: not compatible
*
*/
function plugin_compatible_with_this_version_socnet($pi_name)
{
    global $_CONF, $_DB_dbms;
    return true;

    // check if we support the DBMS the site is running on
    $dbFile = $_CONF['path'] . 'plugins/' . $pi_name . '/sql/'
            . $_DB_dbms . '_install.php';
   	 if (! file_exists($dbFile)) {
        return false;
    	}
    	
	$dbFile = $_CONF['path'] . 'system/databases/'
            . 'pgsql.class.php';
   	 if (! file_exists($dbFile)) {
   	 	//1.7 marks the release of PostgresSQL support. Core changes required
   	 	//for thus plugin require 1.7
        return false;
    	} 
    
	if (!function_exists('SEC_createToken')) {
	        return false;
	    }

    return true;
}

/**
* Perform post-install operations
*
* @param    string  $pi_name    Plugin name
* @return   boolean             TRUE: plugin compatible; FALSE: not compatible
*/
function plugin_postinstall_socnet($pi_name)
{
	global $_TABLES;
	$_TABLES[] = 'soc_usersocnetinfo';
	$_TABLES[] = 'soc_accesscodes';
    return true;
}

?>
