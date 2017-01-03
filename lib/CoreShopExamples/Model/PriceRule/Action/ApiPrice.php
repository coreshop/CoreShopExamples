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

namespace CoreShopExamples\Model\PriceRule\Action;

use CoreShop\Model\Cart;
use CoreShop\Model\PriceRule\Action\AbstractAction;
use CoreShop\Model\Product;
use Pimcore\Cache;

/**
 * Class ApiPrice
 * @package CoreShopExamples\Model\PriceRule\Action
 */
class ApiPrice extends AbstractAction
{
    /**
     * @var string
     */
    public static $type = 'apiPrice';

    /**
     * @var double|boolean
     */
    protected $price = null;

    /**
     * Apply Rule to Cart.
     *
     * @param Cart $cart
     *
     * @return bool
     */
    public function applyRule(Cart $cart)
    {
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
        return 0;
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
        return 0;
    }

    /**
     * get new price for product.
     *
     * @param Product $product
     *
     * @return float|boolean $price
     */
    public function getPrice(Product $product)
    {
        if(is_null($this->price)) {
            if(!$this->price = Cache::load("custom_price_" . $product->getId())) {
                 $this->price = $this->getPriceForProduct($product);

                Cache::save($this->price, "custom_price_" . $product->getId(), array(Product::getPriceCacheTag($product), 3600));
            }
        }

        return $this->price;
    }

    /**
     * Call API to get Price
     *
     * @param Product $product
     *
     * @return double|boolean
     */
    protected static function getPriceForProduct(Product $product) {
        $url = \Pimcore\Tool::getHostUrl() . '/plugin/CoreShopExamples/price/get-price?id=' . $product->getId() . "&withTax=true";
        $client = new \Zend_Http_Client($url, array(
            'timeout' => 30
        ));

        $response = $client->request();

        try {
            $result = \Zend_Json::decode($response->getBody());

            if($result['success']) {
                return $result['price'];
            }
        }
        catch(\Exception $ex) {

        }

        return false;
    }
}
