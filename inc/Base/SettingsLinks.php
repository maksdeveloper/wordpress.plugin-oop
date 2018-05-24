<?php
/**
 * Created by PhpStorm.
 * User: ADMIN
 * Date: 31.03.2018
 * Time: 20:00
 */

namespace Inc\Base;

use \Inc\Base\BaseController;

class SettingsLinks extends BaseController
{


    public function register()
    {
        add_filter( "plugin_action_links_$this->plugin", array( $this, "settingsLink") );

    }

    public function settingsLink( $links )
    {

        $settingsLink = '<a href="admin.php?page=smi_plugin">Settings</a>';
        array_push( $links, $settingsLink );
        return $links;
    }




}