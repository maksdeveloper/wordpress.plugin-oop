<?php
/**
 * Created by PhpStorm.
 * User: ADMIN
 * Date: 01.04.2018
 * Time: 21:40
 */

namespace Inc\Base;


class BaseController
{

    public $plugin_path;
    public $plugin_url;
    public $plugin;

    public function __construct()
    {

        $this->plugin_path = plugin_dir_path( self::dirname_r( __FILE__, 2 ) );
        $this->plugin_url = plugin_dir_url( self::dirname_r( __FILE__, 2 ) );
        $this->plugin = plugin_basename( self::dirname_r( __FILE__, 3 ) ). '/smi-codevery-new.php';

    }


    public function dirname_r($path, $count=1){
        if ($count > 1){
            return dirname(self::dirname_r($path, --$count));
        }else{
            return dirname($path);
        }
    }

}

