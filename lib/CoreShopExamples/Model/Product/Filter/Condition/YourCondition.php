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

namespace CoreShopExamples\Model\Product\Filter\Condition;

use CoreShop\IndexService\Condition;
use CoreShop\Model\Product\Filter;
use CoreShop\Model\Product\Listing;

/**
 * Class YourCondition
 * @package CoreShopExamples\Model\Product\Filter\Condition
 */
class YourCondition extends Filter\Condition\AbstractCondition
{
    /**
     * @var string
     */
    public static $type = 'yourCondition';

    /**
     * render HTML for filter.
     *
     * @param Filter  $filter
     * @param Listing $list
     * @param $currentFilter
     *
     * @return mixed
     */
    public function render(Filter $filter, Listing $list, $currentFilter)
    {
        $script = $this->getViewScript($filter, $list, $currentFilter);

        return $this->getView()->partial($script, [
            'label' => $this->getLabel(),
            'fieldname' => $this->getField(),
            'quantityUnit' => $this->getQuantityUnit()
        ]);
    }

    /**
     * add Condition to Product List.
     *
     * @param Filter  $filter
     * @param Listing $list
     * @param $currentFilter
     * @param $params
     * @param bool $isPrecondition
     *
     * @return array $currentFilter
     */
    public function addCondition(Filter $filter, Listing $list, $currentFilter, $params, $isPrecondition = false)
    {
        //Add your Conditions to $list here

        return $currentFilter;
    }
}
