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

namespace CoreShopExamples\Model\Carrier\ShippingRule\Action;

use CoreShop\Model\Cart;
use CoreShop\Model;

/**
 * Class AnyPrice
 * @package CoreShopExamples\Model\Carrier\ShippingRule\Action
 */
class AnyPrice extends Model\Carrier\ShippingRule\Action\AbstractAction
{
    /**
     * @var string
     */
    public static $type = 'anyPrice';

    /**
     * get price for shipping
     *
     * @param Cart $cart
     * @param Model\User\Address $address
     *
     * @return float|boolean $price
     */
    public function getPrice(\CoreShop\Model\Carrier $carrier, \CoreShop\Model\Cart $cart, \CoreShop\Model\User\Address $address)
    {
        return 100;
    }
}
