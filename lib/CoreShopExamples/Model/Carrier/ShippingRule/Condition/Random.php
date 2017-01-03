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

namespace CoreShopExamples\Model\Carrier\ShippingRule\Condition;

use CoreShop\Model;
use CoreShop\Model\Carrier\ShippingRule as CarrierShippingRule;

/**
 * Class Random
 * @package CoreShopExamples\Model\Carrier\ShippingRule\Condition
 */
class Random extends CarrierShippingRule\Condition\AbstractCondition
{
    /**
     * @var string
     */
    public static $type = 'random';

    /**
     * Check if Cart is Valid for Condition.
     *
     * @param Model\Cart $cart
     * @param Model\User\Address $address;
     * @param CarrierShippingRule $shippingRule
     *
     * @return mixed
     */
    public function checkCondition(\CoreShop\Model\Carrier $carrier, \CoreShop\Model\Cart $cart, \CoreShop\Model\User\Address $address, CarrierShippingRule $shippingRule) {
        return (bool)random_int(0, 1);
    }
}
