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
 * @copyright  Copyright (c) 2015-2016 Dominik Pfaffenbauer (https://www.pfaffenbauer.at)
 * @license    https://www.coreshop.org/license     GNU General Public License version 3 (GPLv3)
 */

namespace CoreShopExamples;

use CoreShop\Composite\Dispatcher;
use CoreShopExamples\Model\Carrier\ShippingRule\Action\AnyPrice;
use CoreShopExamples\Model\Carrier\ShippingRule\Condition\Random;
use CoreShopExamples\Model\PriceRule\Action\AnyDiscount;
use CoreShopExamples\Model\PriceRule\Action\ApiPrice;
use CoreShopExamples\Model\PriceRule\Condition\AnyCondition;
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

        /*
         * Before 1.2:
         *
         * PriceRule::addAction("apiPrice");
         *
         * ShippingRule::addAction("anyPrice");
         * SippingRule::addCondition("random");
        */

        \CoreShop\Model\Product\PriceRule::getActionDispatcher()->addType(AnyDiscount::class);
        \CoreShop\Model\Product\SpecificPrice::getActionDispatcher()->addType(AnyDiscount::class);
        \CoreShop\Model\Cart\PriceRule::getActionDispatcher()->addType(AnyDiscount::class);

        \CoreShop\Model\Product\PriceRule::getConditionDispatcher()->addType(AnyCondition::class);
        \CoreShop\Model\Product\SpecificPrice::getConditionDispatcher()->addType(AnyCondition::class);
        \CoreShop\Model\Cart\PriceRule::getConditionDispatcher()->addType(AnyCondition::class);

        \CoreShop\Model\Carrier\ShippingRule::getActionDispatcher()->addType(AnyPrice::class);
        \CoreShop\Model\Carrier\ShippingRule::getConditionDispatcher()->addType(Random::class);

        \Pimcore::getEventManager()->attach('coreshop.rules.productPriceRule.condition.init', function(\Zend_EventManager_Event $e) {
            $target = $e->getTarget();

            if($target instanceof Dispatcher) {
                $target->addType(AnyCondition::class);
            }
        });
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
