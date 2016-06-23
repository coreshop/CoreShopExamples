CoreShopExamples
================

This Repo contains some examples on how to override CoreShop Default behaviour

# Custom Price Rules
Sometimes you will need some custom price rules for your customers. Its quite simple to implement them.

You will need following files

## Action

```
YourPlugin/lib/CoreShop/PriceRule/Action/YourCustomPriceRuleAction.php
YourPlugin/static/js/coreshop/pricerule/actions/yourCustomPriceRuleAction.js
```

you will need to tell CoreShop that there is a new price rule action

```
public function init()
{
    parent::init();

    CoreShop\Model\Product\PriceRule::addAction("yourCustomPriceRuleAction"); //For Product Price Rules
    CoreShop\Model\Product\SpecificPrice::addAction("yourCustomPriceRuleAction"); //For Specific Price Rules
    CoreShop\Model\Cart\PriceRule::addAction("yourCustomPriceRuleAction"); //For Cart Price Rules
}

```

## Condition

```
YourPlugin/lib/CoreShop/PriceRule/Condition/YourCustomPriceRuleCondition.php
YourPlugin/static/js/coreshop/pricerule/conditions/yourCustomPriceRuleCondition.js
```

you will need to tell CoreShop that there is a new price rule action

```
public function init()
{
    parent::init();

    CoreShop\Model\Product\PriceRule::addCondition("yourCustomPriceRuleCondition"); //For Product Price Rules
    CoreShop\Model\Product\SpecificPrice::addCondition("yourCustomPriceRuleCondition"); //For Specific Price Rules
    CoreShop\Model\Cart\PriceRule::addCondition("yourCustomPriceRuleCondition"); //For Cart Price Rules
}

```

## Example - Action

within this repo, you will find an example on howto use Price-Rules to gather prices from an api.

 - JS: [https://github.com/coreshop/CoreShopExamples/blob/master/static/js/coreshop/pricerule/actions/apiPrice.js](https://github.com/coreshop/CoreShopExamples/blob/master/static/js/coreshop/pricerule/actions/apiPrice.js)
 - PHP: [https://github.com/coreshop/CoreShopExamples/blob/master/lib/CoreShop/Model/PriceRule/Action/ApiPrice.php](https://github.com/coreshop/CoreShopExamples/blob/master/lib/CoreShop/Model/PriceRule/Action/ApiPrice.php)
 - Example Price Controller: [https://github.com/coreshop/CoreShopExamples/blob/master/controllers/PriceController.php](https://github.com/coreshop/CoreShopExamples/blob/master/controllers/PriceController.php)