<?php
/**
 * CoreShop.
 *
 * LICENSE
 *
 * This source file is subject to the GNU General Public License version 3 (GPLv3)
 * For the full copyright and license information, please view the LICENSE.md and gpl-3.0.txt
 * files that are distributed with this source code.
 *
 * @copyright  Copyright (c) 2015-2016 Dominik Pfaffenbauer (http://www.pfaffenbauer.at)
 * @license    http://www.coreshop.org/license     GNU General Public License version 3 (GPLv3)
 */

namespace CoreShopExamples;

use CoreShop\Model\Carrier\ShippingRule;
use CoreShop\Model\Product\PriceRule;
use Pimcore\API\Plugin as PluginLib;

/**
 * Class Plugin
 * @package CoreShopExamples
 */
class Plugin extends PluginLib\AbstractPlugin implements PluginLib\PluginInterface
{
    public function init()
    {
        parent::init();

        PriceRule::addAction("apiPrice");

        ShippingRule::addAction("anyPrice");
        ShippingRule::addCondition("random");
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
