<?php 

require_once('../../../lib-common.php');

//check for security


$display = COM_siteHeader();
$T = new Template($_CONF['path'] . 'plugins/socnet/templates');
$T->set_file('page', 'admin.thtml');
$T->set_var('header', $LANG_PL00['plugin']);
$T->set_var('site_url',$_CONF['site_url']);
$T->set_var('plugin','socnet');
// your code goes here
$T->parse('output','page');
$display .= $T->finish($T->get_var('output'));
$display .= COM_siteFooter();

echo $display;
?>