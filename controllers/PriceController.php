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

/**
 * Example Controller to show how prices could be fetched via API
 *
 * Class CoreShopExamples_PriceController
 */
class CoreShopExamples_PriceController extends \Pimcore\Controller\Action\Frontend {

    public function preDispatch()
    {
        parent::preDispatch();

        if(\Zend_Registry::isRegistered("Zend_Locale")) {
            $locale = \Zend_Registry::get("Zend_Locale");
        } else {
            $locale = new \Zend_Locale($this->getParam("lang", "en"));
            \Zend_Registry::set("Zend_Locale", $locale);
        }

        $this->view->language = (string) $locale;
        $this->language = (string) $locale;
    }

    public function getPriceAction() {
        $idProduct = $this->getParam("id");
        $withTax = $this->getParam("withTax", "true") === "true";

        $product = \CoreShop\Model\Product::getById($idProduct);

        if($product instanceof \CoreShop\Model\Product) {
            $this->_helper->json(array("success" => true, "price" => $product->getRetailPrice() - 10));
        }

        $this->_helper->json(array("success" => false));
    }
}