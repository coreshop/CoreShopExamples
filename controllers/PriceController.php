<?php

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