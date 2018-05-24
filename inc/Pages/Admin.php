<?php

/**
 * @package  SmiPlugin
 */

namespace Inc\Pages;

use \Inc\Base\BaseController;
use \Inc\Api\SettingsApi;
use \Inc\Api\Callbacks\AdminCallbacks;

class Admin extends BaseController
{
    public $settings;

    public $callbacks;

    public $pages = array();

    public $subpages = array();


    public function register()
    {

        $this->settings = new SettingsApi();

        $this->callbacks = new AdminCallbacks();

        $this->setPages();

        $this->setSubPages();

        $this->setSettings();

        $this->setSections();

        $this->setFields();

        $this->settings->addPages( $this->pages )->withSubPage( 'My Dashboard' )->addSubPages( $this->subpages )->register();
    }

    public function setPages()
    {

        $this->pages = array(
            array(
                'page_title' => 'SmiCodevery Plugin',
                'menu_title' => 'Smi Codevery Menu',
                'capability' => 'manage_options',
                'menu_slug' => 'smicodevery_plugin',
                'callback' => array( $this->callbacks, 'adminDashboard' ),
                'icon_url' => 'dashicons-store',
                'position' => 110
            )
        );

    }

    public function setSubPages()
    {
        $this->subpages = array(
            array(
                'parent_slug' => 'smicodevery_plugin',
                'page_title' => 'Custom Post Types',
                'menu_title' => 'CPT',
                'capability' => 'manage_options',
                'menu_slug' => 'smicodevery_cpt',
                'callback' => array( $this->callbacks, 'adminCpt' )
            ),
            array(
                'parent_slug' => 'smicodevery_plugin',
                'page_title' => 'Custom Taxonomies',
                'menu_title' => 'Taxonomies',
                'capability' => 'manage_options',
                'menu_slug' => 'smicodevery_taxonomies',
                'callback' => array( $this->callbacks, 'adminTaxonomy' )
            ),
            array(
                'parent_slug' => 'smicodevery_plugin',
                'page_title' => 'Custom Widgets',
                'menu_title' => 'Widgets',
                'capability' => 'manage_options',
                'menu_slug' => 'smicodevery_widgets',
                'callback' => array( $this->callbacks, 'adminWidget' )
            )
        );

    }


    public function setSettings()
    {
        $args = array(

            array(
                'option_group' => 'smicodevery_options_group',
                'option_name' => 'text_example',
                'callback' => array( $this->callbacks, 'smiOptionsGroup')
            ),	array(
                'option_group' => 'smicodevery_options_group',
                'option_name' => 'smicodevery_first_name'
            )

        );

        $this->settings->setSettings( $args );

    }
    public function setSections()
    {
        $args = array(
            array(
                'id' => 'smicodevery_admin_index',
                'title' => 'Settings',
                'callback' => array( $this->callbacks, 'smiAdminSection' ),
                'page' => 'smicodevery_plugin'
            )
        );
        $this->settings->setSections( $args );
    }
    public function setFields()
    {
        $args = array(
            array(
                'id' => 'text_example',
                'title' => 'Text Example',
                'callback' => array( $this->callbacks, 'smiTextExample' ),
                'page' => 'smicodevery_plugin',
                'section' => 'smicodevery_admin_index',
                'args' => array(
                    'label_for' => 'text_example',
                    'class' => 'example-class'
                )
            ),
            array(
                'id' => 'smicodevery_first_name',
                'title' => 'First Name',
                'callback' => array( $this->callbacks, 'smiFirstName' ),
                'page' => 'smicodevery_plugin',
                'section' => 'smicodevery_admin_index',
                'args' => array(
                    'label_for' => 'smicodevery_first_name',
                    'class' => 'example-class'
                )
            )
        );
        $this->settings->setFields( $args );
    }
}