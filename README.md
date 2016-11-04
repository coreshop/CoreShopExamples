CoreShopExamples
================

This Repo contains some examples on how to override CoreShop Default behaviour

# Custom Price Rules
Sometimes you will need some custom price rules for your customers. Its quite simple to implement them.

## Action

```
YourPlugin/lib/CoreShop/PriceRule/Action/YourCustomPriceRuleAction.php
YourPlugin/static/js/coreshop/pricerule/actions/yourCustomPriceRuleAction.js
```

you will need to tell CoreShop that there is a new price rule action

```php
public function init()
{
    parent::init();

    CoreShop\Model\Product\PriceRule::addAction("yourCustomPriceRuleAction"); //For Product Price Rules
    CoreShop\Model\Product\SpecificPrice::addAction("yourCustomPriceRuleAction"); //For Specific Price Rules
    CoreShop\Model\Cart\PriceRule::addAction("yourCustomPriceRuleAction"); //For Cart Price Rules
}

```

Your Action needs to implement CoreShop\Model\PriceRule\Action\AbstractAction

```php
namespace CoreShop\Model\PriceRule\Action;

class YourCustomPriceRuleAction extends AbstractAction
{
    public $type = 'yourCustomPriceRuleAction';

    public function applyRule(Cart $cart);

    public function unApplyRule(Cart $cart);

    public function getDiscountCart(Cart $cart, $withTax = true);

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

```php
public function init()
{
    parent::init();

    CoreShop\Model\Product\PriceRule::addCondition("yourCustomPriceRuleCondition"); //For Product Price Rules
    CoreShop\Model\Product\SpecificPrice::addCondition("yourCustomPriceRuleCondition"); //For Specific Price Rules
    CoreShop\Model\Cart\PriceRule::addCondition("yourCustomPriceRuleCondition"); //For Cart Price Rules
}

```

Your Condition needs to implement

```php
namespace CoreShop\Model\PriceRule\Condition;

class YourCustomPriceRuleCondition extends AbstractCondition
{
    public $type = 'yourCustomPriceRuleCondition';

    public function checkConditionCart(Cart $cart, PriceRule $priceRule, $throwException = false);

    public function checkConditionProduct(Model\Product $product, Model\Product\AbstractProductPriceRule $priceRule);
}

```

### Example - Action

within this repo, you will find an example on howto use Price-Rules to gather prices from an api.

 - JS: [https://github.com/coreshop/CoreShopExamples/blob/master/static/js/coreshop/pricerule/actions/apiPrice.js](https://github.com/coreshop/CoreShopExamples/blob/master/static/js/coreshop/pricerule/actions/apiPrice.js)
 - PHP: [https://github.com/coreshop/CoreShopExamples/blob/master/lib/CoreShop/Model/PriceRule/Action/ApiPrice.php](https://github.com/coreshop/CoreShopExamples/blob/master/lib/CoreShop/Model/PriceRule/Action/ApiPrice.php)
 - Example Price Controller: [https://github.com/coreshop/CoreShopExamples/blob/master/controllers/PriceController.php](https://github.com/coreshop/CoreShopExamples/blob/master/controllers/PriceController.php)

# Custom Shipping Rule
Shipping is a very difficult topic. To probably rule them all, CoreShop uses Shipping Rules. In this example, I will show you how to create custom conditions/actions.


## Action

```
YourPlugin/lib/CoreShop/Model/Carrier/ShippingRule/Action/YourCustomShippingRuleAction.php
YourPlugin/static/js/coreshop/carrier/shippingRule/actions/yourCustomShippingRuleAction.js
```

you will need to tell CoreShop that there is a new shipping rule action

```php
public function init()
{
 parent::init();

 CoreShop\Model\Carrier\ShippingRule::addAction("YourCustomShippingRuleAction");
}

```

Your Action needs to implement CoreShop\Model\Carrier\ShippingRule\Action\AbstractAction

```php
namespace CoreShop\Model\Carrier\ShippingRule\Action\AbstractAction;

class YourCustomShippingRuleAction extends AbstractAction
{
 public $type = 'yourCustomShippingRuleAction';

  public function getPriceModification(Cart $cart, Model\User\Address $address, $price); //Use this to modify the price

  public function getPrice(Cart $cart, Model\User\Address $address); //use this to get the price
}

```

## Condition

```
YourPlugin/lib/CoreShop/Carrier/ShippingRule/Condition/YourCustomShippingRuleCondition.php
YourPlugin/static/js/coreshop/carrier/shippingrule/conditions/yourCustomShippingRuleCondition.js
```

you will need to tell CoreShop that there is a new shipping rule condition

```php
public function init()
{
 parent::init();

 CoreShop\Model\Carrier\ShippingRule::addCondition("yourCustomShippingRuleCondition");
}

```

Your Condition needs to implement

```php
namespace CoreShop\Model\Carrier\ShippingRule\Condition;

class YourCustomShippingRuleCondition extends AbstractCondition
{
 public $type = 'yourCustomShippingRuleCondition';

 public function checkCondition(Model\Cart $cart, Model\User\Address $address, ShippingRule $shippingRule);
}

```