<?php

/* Reminder: always indent with 4 spaces (no tabs). */
// +---------------------------------------------------------------------------+
// | Links Plugin 1.0                                                          |
// +---------------------------------------------------------------------------+
// | index.php                                                                 |
// |                                                                           |
// | This is the main page for the Geeklog Links Plugin                        |
// +---------------------------------------------------------------------------+
// | Copyright (C) 2000-2006 by the following authors:                         |
// |                                                                           |
// | Authors: Tony Bibbs        - tony AT tonybibbs DOT com                    |
// |          Mark Limburg      - mlimburg AT users DOT sourceforge DOT net    |
// |          Jason Whittenburg - jwhitten AT securitygeeks DOT com            |
// |          Tom Willett       - tomw AT pigstye DOT net                      |
// |          Trinity Bays      - trinity AT steubentech DOT com               |
// |          Dirk Haun         - dirk AT haun-online DOT de                   |
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
//
/** 
 * This is the links page   
 * 
 * @package Links
 * @subpackage public_html
 * @filesource
 * @version 1.0
 * @since GL 1.4.0
 * @copyright Copyright &copy; 2005-2006
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License 
 * @author Tony Bibbs <tony AT tonybibbs DOT com>
 * @author Mark Limburg <mlimburg AT users DOT sourceforge DOT net>
 * @author Jason Whittenburg <jwhitten AT securitygeeks DOT com>
 * @author Tom Willett <tomw AT pigstye DOT net>
 * @author Trinity Bays <trinity AT steubentech DOT com>
 * @author Dirk Haun <dirk AT haun-online DOT de>
 * 
 */
// $Id: index.php,v 1.22 2007/08/28 07:34:25 ospiess Exp $

require_once ('../lib-common.php');

/**
* Prepare a link item for rendering
*
* @param    array   $A          link details
* @param    ref     $template   reference of the links template
*
*/
function prepare_link_item ($A, &$template)
{
    global $_CONF, $LANG_ADMIN, $_IMAGE_TYPE;

    $url = COM_buildUrl ($_CONF['site_url']
                 . '/links/portal.php?what=link&amp;item=' . $A['lid']);
    $template->set_var ('link_url', $url);
    $template->set_var ('link_actual_url', $A['url']);
    $template->set_var ('link_name', stripslashes ($A['title']));
    $template->set_var ('link_hits', COM_numberFormat ($A['hits']));
    $template->set_var ('link_description',
                        nl2br (stripslashes ($A['description'])));

    if ((SEC_hasAccess ($A['owner_id'], $A['group_id'], $A['perm_owner'],
            $A['perm_group'], $A['perm_members'], $A['perm_anon']) == 3) &&
            SEC_hasRights ('links.edit')) {
        $editurl = $_CONF['site_admin_url']
                 . '/plugins/links/index.php?mode=edit&amp;lid=' . $A['lid'];
        $template->set_var ('link_edit', '<a href="' . $editurl . '">'
                 . $LANG_ADMIN['edit'] . '</a>');
        $template->set_var ('edit_icon', '<a href="' . $editurl . '"><img src="'
                 . $_CONF['layout_url'] . '/images/edit.' . $_IMAGE_TYPE
                 . '" alt="' . $LANG_ADMIN['edit'] . '" title="'
                 . $LANG_ADMIN['edit'] . '" border="0"></a>');
    } else {
        $template->set_var ('link_edit', '');
        $template->set_var ('edit_icon', '');
    }
}


// MAIN

$display = '';
$root = 'site';

if (empty ($_USER['username']) &&
    (($_CONF['loginrequired'] == 1) || ($_LI_CONF['linksloginrequired'] == 1))) {
    $display .= COM_siteHeader ('menu', $LANG_LINKS[114]);
    $display .= COM_startBlock ($LANG_LOGIN[1], '',
                                COM_getBlockTemplate ('_msg_block', 'header'));
    $login = new Template ($_CONF['path_layout'] . 'submit');
    $login->set_file (array ('login' => 'submitloginrequired.thtml'));
    $login->set_var ('login_message', $LANG_LOGIN[2]);
    $login->set_var ('site_url', $_CONF['site_url']);
    $login->set_var ('lang_login', $LANG_LOGIN[3]);
    $login->set_var ('lang_newuser', $LANG_LOGIN[4]);
    $login->parse ('output', 'login');
    $display .= $login->finish ($login->get_var ('output'));
    $display .= COM_endBlock (COM_getBlockTemplate ('_msg_block', 'footer'));
} else {
    $cid = '';
    if (isset ($_REQUEST['cid'])) {
        $cid = strip_tags (COM_stripslashes ($_REQUEST['cid']));
    }
    $page = 0;
    if (isset ($_GET['page'])) {
        $page = COM_applyFilter ($_GET['page'], true);
    }
    if ($page == 0) {
        $page = 1;
    }

    if (empty ($cid)) {
        // No category so set to root
        $cid = $root;
        if ($page > 1) {
            $page_title = sprintf ($LANG_LINKS[114] . ' (%d)', $page);
        } else {
            $page_title = $LANG_LINKS[114];
        }
    } else {
        if ($page > 1) {
            $page_title = sprintf ($LANG_LINKS[114] . ': %s (%d)', $cid, $page);
        } else {
            $page_title = sprintf ($LANG_LINKS[114] . ': %s', $cid);
        }
    }

    // Check has access to this category
    if ($cid <> $root) {
        $result = DB_query("SELECT owner_id,group_id,perm_owner,perm_group,perm_members,perm_anon FROM {$_TABLES['linkcategories']} WHERE cid='{$cid}'");
        $A = DB_fetchArray($result);
        if (SEC_hasAccess ($A['owner_id'], $A['group_id'], $A['perm_owner'], $A['perm_group'], $A['perm_members'], $A['perm_anon']) < 2) {
            $display .= COM_siteHeader ('menu', $page_title);
            $display .= COM_showMessage (5, 'links');
            $display .= COM_siteFooter ();
            echo $display;
            exit;
        }
    }



    $display .= COM_siteHeader ('menu', $page_title);


    $linklist = new Template ($_CONF['path'] . 'plugins/links/templates/');
    $linklist->set_file (array ('linklist' => 'links.thtml',
                                'catlinks' => 'categorylinks.thtml',
                                'link'     => 'linkdetails.thtml',
                                'catnav'   => 'categorynavigation.thtml',
                                'catrow'   => 'categoryrow.thtml',
                                'catcol'   => 'categorycol.thtml',
                                'actcol'   => 'categoryactivecol.thtml',
                                'pagenav'  => 'pagenavigation.thtml'));
    $linklist->set_var ('blockheader',COM_startBlock($LANG_LINKS[114]));
    $linklist->set_var ('layout_url',$_CONF['layout_url']);

    // Create breadcrumb trail
    $linklist->set_var('breadcrumbs', links_breadcrumbs ($root,$cid));

    // Set dropdown for category jump
    $linklist->set_var ('lang_go', $LANG_LINKS[117]);
    $linklist->set_var('link_dropdown', links_select_box(2));

    if ($_LI_CONF['linkcols'] > 0) {

        // Show categories
        $sql = "SELECT cid,pid,category,description FROM {$_TABLES['linkcategories']} WHERE pid='{$cid}'";
        // check if we are using the multilanguage hack
        if ($_LI_CONF['enable_multilingual_links']) {
            $sql .= COM_getLangSQL('cid','AND');
        }
        $sql .= COM_getPermSQL('AND') . " ORDER BY category";
        $result = DB_query($sql);
        $nrows  = DB_numRows ($result);
        if ($nrows > 0) {
            $linklist->set_var ('lang_categories', $LANG_LINKS[118]);
            for ($i = 1; $i <= $nrows; $i++) {
                $C = DB_fetchArray ($result);

                // Get number of child links user can see in this category
                $result1 = DB_query ("SELECT COUNT(*) AS count FROM {$_TABLES['links']} WHERE cid='{$C['cid']}'" . COM_getPermSQL ('AND'));
                $D = DB_fetchArray ($result1);

                // Get number of child categories user can see in this category
                $result2 = DB_query ("SELECT COUNT(*) AS count FROM {$_TABLES['linkcategories']} WHERE pid='{$C['cid']}'" . COM_getPermSQL ('AND'));
                $E = DB_fetchArray($result2);

                // Format numbers for display
                $display_count = '';
                // don't show zeroes
                if ($E['count']>0) {
                    $display_count = COM_numberFormat ($E['count']);
                }
                if (($E['count']>0) && ($D['count']>0)) {
                    $display_count .= ', ';
                }
                if ($D['count']>0) {
                    $display_count .= COM_numberFormat ($D['count']);
                }
                // add brackets if child items exist
                if ($display_count<>'') {
                    $display_count = '('.$display_count.')';
                }

                $linklist->set_var ('category_name', $C['category']);
                if ($_LI_CONF['show_category_descriptions']) {
                    $linklist->set_var ('category_description', $C['description']);
                } else {
                    $linklist->set_var ('category_description', '');
                }
                $linklist->set_var ('category_link', $_CONF['site_url'] .
                    '/links/index.php?cid=' . urlencode ($C['cid']));
                $linklist->set_var ('category_count', $display_count);
                $linklist->set_var ('width', floor (100 / $_LI_CONF['linkcols']));
                if (!empty ($cid) && ($cid == $C['cid'])) {
                    $linklist->parse ('category_col', 'actcol', true);
                } else {
                    $linklist->parse ('category_col', 'catcol', true);
                }
                if ($i % $_LI_CONF['linkcols'] == 0) {
                    $linklist->parse ('category_row', 'catrow', true);
                    $linklist->set_var ('category_col', '');
                }
            }
            if ($nrows % $_LI_CONF['linkcols'] != 0) {
                $linklist->parse ('category_row', 'catrow', true);
            }
            $linklist->parse ('category_navigation', 'catnav', true);
        } else {
            $linklist->set_var ('category_navigation', '');
        }
    } else {
        $linklist->set_var ('category_navigation', '');
    }

    $linklist->set_var ('site_url', $_CONF['site_url']);
    $linklist->set_var ('cid', $cid);
    $linklist->set_var ('lang_addalink', $LANG_LINKS[116]);

    // Build SQL for links
    $sql = 'SELECT lid,cid,url,description,title,hits,owner_id,group_id,perm_owner,perm_group,perm_members,perm_anon';
    $from_where = " FROM {$_TABLES['links']}";
    if ($_LI_CONF['linkcols'] > 0) {
        if (!empty ($cid)) {
            $from_where .= " WHERE cid='" . addslashes ($cid) . "'";
        } else {
            $from_where .= " WHERE cid=''";
        }
        $from_where .= COM_getPermSQL ('AND');
    } else {
        $from_where .= COM_getPermSQL ();
    }
    $order = ' ORDER BY cid ASC,title';
    $limit = '';
    if ($_LI_CONF['linksperpage'] > 0) {
        if ($page < 1) {
            $start = 0;
        } else {
            $start = ($page - 1) * $_LI_CONF['linksperpage'];
        }
        $limit = ' LIMIT ' . $start . ',' . $_LI_CONF['linksperpage'];
    }
    $result = DB_query ($sql . $from_where . $order . $limit);
    $nrows = DB_numRows ($result);

    // No links
    if ($nrows == 0) {
        if (($page <= 1) && $_LI_CONF['show_top10']) {
            $result = DB_query ("SELECT lid,url,title,description,hits,owner_id,group_id,perm_owner,perm_group,perm_members,perm_anon FROM {$_TABLES['links']} WHERE (hits > 0)" . COM_getPermSQL ('AND') . " ORDER BY hits DESC LIMIT 10");
            $nrows  = DB_numRows ($result);
            if ($nrows > 0) {
                $linklist->set_var ('link_details', '');
                $linklist->set_var ('link_category', $LANG_LINKS_STATS['stats_headline']);
                for ($i = 0; $i < $nrows; $i++) {
                    $A = DB_fetchArray ($result);
                    prepare_link_item ($A, $linklist);
                    $linklist->parse ('link_details', 'link', true);
                }
                $linklist->parse ('category_links', 'catlinks', true);
            }
        }
        $linklist->set_var ('page_navigation', '');
    // Have links, so build the page
    } else {
        // Get current category name
        $currentcategory=DB_GetItem($_TABLES['linkcategories'], "category","cid='{$cid}'");
        $linklist->set_var ('link_category', $currentcategory);
        $linklist->set_var ('link_details', '');

        for ($i = 0; $i < $nrows; $i++) {
            $A = DB_fetchArray ($result);
            prepare_link_item ($A, $linklist);
            $linklist->parse ('link_details', 'link', true);
        }
        $linklist->parse ('category_links', 'catlinks', true);

        // Google paging
        $result = DB_query ('SELECT COUNT(*) AS count ' . $from_where);
        list($numlinks) = DB_fetchArray ($result);
        $pages = 0;
        if ($_LI_CONF['linksperpage'] > 0) {
            $pages = (int) ($numlinks / $_LI_CONF['linksperpage']);
            if (($numlinks % $_LI_CONF['linksperpage']) > 0 ) {
                $pages++;
            }
        }
        if ($pages > 0) {
            if (($_LI_CONF['linkcols'] > 0) && isset ($currentcategory)) {
                $catlink = '?category=' . urlencode ($currentcategory);
            } else {
                $catlink = '';
            }
            $linklist->set_var ('page_navigation',
                    COM_printPageNavigation ($_CONF['site_url']
                        . '/links/index.php' .  $catlink, $page, $pages));
        } else {
            $linklist->set_var ('page_navigation', '');
        }
    }
    $linklist->set_var ('blockfooter',COM_endBlock());
    $linklist->parse ('output', 'linklist');
    $display .= $linklist->finish ($linklist->get_var ('output'));
}


$display .= COM_siteFooter ();

echo $display;

?>
