<?php
/* Reminder: always indent with 4 spaces (no tabs). */
// +-------------------------------------------------------------------------+
// | Geeklog 1.3                                                             |
// +-------------------------------------------------------------------------+
// | navbar.class.php                                                        |
// |                                                                         |
// | class to create and display a CSS based Navbar for site navigation      |
// +-------------------------------------------------------------------------+
// | Copyright (C) 2004 by Consult4Hire Inc.                                 |
// |                                                                         |
// | Author:                                                                 |
// | Blaine Lang                 -    blaine@portalparts.com                 |
// +-------------------------------------------------------------------------+
// |                                                                         |
// | This program is free software; you can redistribute it and/or           |
// | modify it under the terms of the GNU General Public License             |
// | as published by the Free Software Foundation; either version 2          |
// | of the License, or (at your option) any later version.                  |
// |                                                                         |
// | This program is distributed in the hope that it will be useful,         |
// | but WITHOUT ANY WARRANTY; without even the implied warranty of          |
// | MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.                    |
// | See the GNU General Public License for more details.                    |
// |                                                                         |
// | You should have received a copy of the GNU General Public License       |
// | along with this program; if not, write to the Free Software Foundation, |
// | Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.         |
// |                                                                         |
// +-------------------------------------------------------------------------+
//

/**
* This class will allow you to setup and generate a CSS Tab Menu
* Version 1.0 June 4, 2005
*
* @author       Blaine Lang <blaine@portalparts.com>
*
*/

/* Example Use 
    include ($_CONF['path_system'] . 'classes/navbar.class.php');

    $menuitems = array (
        'Site Links' => $_CONF['site_url'] .'/links.php',
        'My Calendar'=> $_CONF['site_url'] .'/calendar.php',
        'Polls'      => $_CONF['site_url'] .'/pollbooth.php'
    );

    $navbar = new navbar;
    $navbar->set_menuitems($menuitems);

    // Add a menuitem if user has access
    if (SEC_inGroup('Root')) {
        $navbar->add_menuitem('Admin Home',$_CONF['site_admin_url'] . '/moderation.php');
    }

    // Add a Menuiem which activates a Javascript function when the onClick event is triggered
    $navbar->add_menuitem('On click test','alert("This works");',true);

    // Add a new Menuitem which may or may not have a URL to redirect to but also triggers an onClick JS function
    $navbar->add_menuitem('Search Engine','http://www.google.com');
    // Pass in the label to attach the onClick function to
    $navbar->set_onclick('Search Engine','return confirm("Do you want to leave this site?");');

    // Set the current selected tab
    $navbar->set_selected('My Calendar');
    echo $navbar->generate();

*/


class navbar  {

    // Private Properties
    /**
    * @access private
    */
    var $_menuitems;      // Array
    /**
    * @access private
    */
    var $_selected = '';      // string
    /**
    * @access private
    */
    var $_parms = '';      // string
    /**
    * @access private
    */
    var $_onclick;      // Array


    /**
    * Constructor
    *
    */
    function navbar()
    {
    }

    function set_menuitems($menuitems)
    {
       $this->_menuitems = $menuitems;
    }

    function add_menuitem($label,$link,$onclick=false)
    {
        if ($onclick) {
            $this->_menuitems[$label] = '#';
            $this->set_onClick($label, $link);
        } else {
            $this->_menuitems[$label] = $link;
        }
    }


    function set_selected($selected)
    {
        $this->_selected = $selected;
    }

    function set_defaultparms($parms)
    {
        $this->_parms = $parms;
    }

    function set_onClick($item, $option)
    {
        $this->_onclick[$item] = $option;
    }

    function generate() {
        global $_CONF;
        $navtemplate = new Template($_CONF['path_layout'] . 'navbar');
        $navtemplate->set_file (array (
            'navbar'       => 'navbar.thtml',
            'menuitem'     => 'menuitem.thtml',
            ));

        if ($this->_parms != '') {
            $navtemplate->set_var( 'parms',  $this->_parms);
        }

        for ($i=1; $i <= count($this->_menuitems); $i++)  {
            $label = key($this->_menuitems);
            $linkurl = current($this->_menuitems);
            if ( is_array($this->_onclick) AND array_key_exists($label,$this->_onclick) ) {
                $onclick = " onClick='{$this->_onclick[$label]}'";
                $navtemplate->set_var( 'onclick', $onclick);
                $navtemplate->set_var( 'link', ($linkurl == '') ? '#' : $linkurl);
            } else {
                $navtemplate->set_var( 'onclick', '');
                $navtemplate->set_var( 'link', $linkurl);
            }
            if ($label == $this->_selected) {
                $navtemplate->set_var( 'cssactive', ' id="active"');
                $navtemplate->set_var( 'csscurrent',' id="current"');
            } else {
                $navtemplate->set_var( 'cssactive', '');
                $navtemplate->set_var( 'csscurrent','');
            }
            $navtemplate->set_var( 'label',  $label);
            $navtemplate->parse( 'menuitems', 'menuitem', true );
            next($this->_menuitems);
        }
        $navtemplate->parse ('output', 'navbar');
        $retval = $navtemplate->finish($navtemplate->get_var('output'));
        return $retval;
    }

}

?>