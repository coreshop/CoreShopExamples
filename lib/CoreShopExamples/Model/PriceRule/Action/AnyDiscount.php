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
 * @copyright  Copyright (c) 2015-2017 Dominik Pfaffenbauer (https://www.pfaffenbauer.at)
 * @license    https://www.coreshop.org/license     GNU General Public License version 3 (GPLv3)
 */

namespace CoreShopExamples\Model\PriceRule\Action;

use CoreShop\Model\Cart;
use CoreShop\Model\PriceRule\Action\AbstractAction;
use CoreShop\Model\Product;

/**
 * Class CartPrice
 * @package CoreShopExamples\Model\PriceRule\Action
 */
class AnyDiscount extends AbstractAction
{
    /**
     * @var string
     */
    public static $type = 'anyDiscount';

    /**
     * Apply Rule to Cart.
     *
     * @param Cart $cart
     *
     * @return bool
     */
    public function applyRule(Cart $cart)
    {
        //You can do some Cart operations here, like adding an gift product
        return true;
    }

    /**
     * Remove Rule from Cart.
     *
     * @param Cart $cart
     *
     * @return bool
     */
    public function unApplyRule(Cart $cart)
    {
        //You can do some Cart operations here, like removing an gift product
        return true;
    }

    /**
     * Calculate discount.
     *
     * @param Cart $cart
     * @param boolean $withTax
     *
     * @return int
     */
    public function getDiscountCart(Cart $cart, $withTax = true)
    {
        //Applies 10% discount on the cart
        return $subTotalTe = $cart->getSubtotal(false) * 0.1;
    }

    /**
     * Calculate discount.
     *
     * @param float   $basePrice
     * @param Product $product
     *
     * @return float
     */
    public function getDiscountProduct($basePrice, Product $product)
    {
        //Applies 10% discount on the product
        return $basePrice * 0.1;
    }
}
