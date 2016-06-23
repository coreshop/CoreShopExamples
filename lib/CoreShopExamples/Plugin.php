<?php

namespace CoreShopExamples;

use CoreShop\Model\Product\PriceRule;
use Pimcore\API\Plugin as PluginLib;

class Plugin extends PluginLib\AbstractPlugin implements PluginLib\PluginInterface
{
    public function init()
    {
        parent::init();

        PriceRule::addAction("apiPrice");
    }

    public static function install()
    {
        return true;
    }
    
    public static function uninstall()
    {
        return true;
    }

    public static function isInstalled()
    {
        return true;
    }
}
