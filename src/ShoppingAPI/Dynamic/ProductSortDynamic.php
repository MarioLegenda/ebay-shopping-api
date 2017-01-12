<?php

namespace ShoppingAPI\Dynamic;

use SDKBuilder\Dynamic\AbstractDynamic;
use ShoppingAPI\Information\ProductSortInformation;

class ProductSortDynamic extends AbstractDynamic
{
    /**
     * @return bool
     */
    public function validateDynamic(): bool
    {
        if (count($this->dynamicValue) !== 1) {
            $this->exceptionMessages[] = 'Invalid dynamic \''.$this->name.'\'. This dynamic can only contain there values: '.implode(', ', ProductSortInformation::instance()->getAll());

            return false;
        }

        if (!ProductSortInformation::instance()->has($this->dynamicValue[0])) {
            $this->exceptionMessages[] = 'Invalid dynamic \''.$this->name.'\'';

            return false;
        }

        return true;
    }
    /**
     * @param int $counter
     * @return string
     */
    public function urlify(int $counter): string
    {
        return 'ProductSort='.$this->dynamicValue[0].'&';
    }
}