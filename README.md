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

Your Action needs to implement CoreShop\Model\PriceRule\Action\AbstractAction

```
namespace CoreShop\Model\PriceRule\Action;

class YourCustomPriceRuleAction extends AbstractAction
{
    public $type = 'yourCustomPriceRuleAction';

    public function applyRule(Cart $cart);

    public function unApplyRule(Cart $cart)M

    public function getDiscountCart(Cart $cart);

    public function getDiscountProduct($basePrice, Product $product);

    public function getPrice(Product $product);
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

Your Condition needs to implement

```
namespace CoreShop\Model\PriceRule\Condition;

class YourCustomPriceRuleCondition extends AbstractCondition
{
    public $type = 'yourCustomPriceRuleCondition';

    public function checkConditionCart(Cart $cart, PriceRule $priceRule, $throwException = false);

    public function checkConditionProduct(Model\Product $product, Model\Product\AbstractProductPriceRule $priceRule);
}

```

## Example - Action

within this repo, you will find an example on howto use Price-Rules to gather prices from an api.

 - JS: [https://github.com/coreshop/CoreShopExamples/blob/master/static/js/coreshop/pricerule/actions/apiPrice.js](https://github.com/coreshop/CoreShopExamples/blob/master/static/js/coreshop/pricerule/actions/apiPrice.js)
 - PHP: [https://github.com/coreshop/CoreShopExamples/blob/master/lib/CoreShop/Model/PriceRule/Action/ApiPrice.php](https://github.com/coreshop/CoreShopExamples/blob/master/lib/CoreShop/Model/PriceRule/Action/ApiPrice.php)
 - Example Price Controller: [https://github.com/coreshop/CoreShopExamples/blob/master/controllers/PriceController.php](https://github.com/coreshop/CoreShopExamples/blob/master/controllers/PriceController.php)