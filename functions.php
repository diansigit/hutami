<?php
/**
 * Hutami functions 
 *
 * @package Hutami Theme
 * @subpackage Hutami
 * @since Hutami 1.0
 */

require_once( TEMPLATEPATH.'/base/theme.php' );
require_once( TEMPLATEPATH.'/base/config.php' );

$theme = new Theme();
$theme->init( $theme_config );

