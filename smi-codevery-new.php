<?php
/*
Plugin Name: smi-codevery-new
Plugin URI: http://smi.wordpress.codevery.com
Description: This is my first attempt on writing a custom Plugin
Version: 1.0.0
Author: SMI
Author URI: maksym-smi
License: GPLv2 or later
Text Domain: smi-codevery-plugin
*/

/**
* @package  SmiPlugin
*/

defined( 'ABSPATH' ) or die( 'Hey, what are you doing here? You silly human!' );

if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) {
    require_once dirname( __FILE__ ) . '/vendor/autoload.php' ;
}


use Inc\Base\Activate;
use Inc\Base\Deactivate;

function activate_smi_codevery_plugin()
{
    Activate::activate();
}

register_activation_hook( __FILE__, 'activate_smi_codevery_plugin' );

function deactivate_smi_codevery_plugin()
{
    Deactivate::deactivate();
}


register_deactivation_hook( __FILE__, 'deactivate_smi_codevery_plugin' );

if ( class_exists( 'Inc\\Init' ) ){
    Inc\Init::register_services();
}