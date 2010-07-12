<?php
###############################################################################
# english.php
#
# This is the English language file for the Geeklog Socnet plugin
#
# Copyright (C) 2001 Tony Bibbs
# tony AT tonybibbs DOT com
# Copyright (C) 2005 Trinity Bays
# trinity93 AT gmail DOT com
#
# This program is free software; you can redistribute it and/or
# modify it under the terms of the GNU General Public License
# as published by the Free Software Foundation; either version 2
# of the License, or (at your option) any later version.
#
# This program is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
# GNU General Public License for more details.
#
# You should have received a copy of the GNU General Public License
# along with this program; if not, write to the Free Software
# Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
#
###############################################################################

global $LANG32;

###############################################################################
# Array Format:
# $LANGXX[YY]:  $LANG - variable name
#               XX    - file id number
#               YY    - phrase id number
###############################################################################

# index.php
$SOCNET_User = array(
	1 => 'Welcome to the Socnet Groups Manager',
    2 => 'Geeklog Social Networking Group Manager.',
    3 => 'You are not registerd as a Socnet Group Manager. Please fill out this form to receive Socnet Access.',
    'newgroupmsg' => 'To modify or delete a group, click on that group\'s edit icon below. To create a new group,
     click on "Create New" above.',
    'create_new'  =>  'Create a new group',
    'delete'  =>  'Delete a group',
    'viewallgroups' =>  'Show All Socnet Groups');
    
$LANG_confignames['socnet'] = array(
    'socnetloginrequired' => 'Socnet Login Required?',
    'displayallmembers' => 'Display All Members During Admin Group Request',
    'addadmintoallgroups' => 'Add Site Admin To All SocNet Groups?'
);

$LANG_configsubgroups['socnet'] = array(
'sg_main' => 'Main Settings'
);

$LANG_fs['socnet'] = array(
    'fs_main' => 'General Calendar Settings',
);

// Note: entries 0, 1, 6, 9, 12 are the same as in $LANG_configselects['Core']
$LANG_configselects['socnet'] = array(
    0 => array('True' => 1, 'False' => 0),
    1 => array('True' => 1, 'False' => 0),
    2 => array('True' => 1, 'False' => 0)
);
?>