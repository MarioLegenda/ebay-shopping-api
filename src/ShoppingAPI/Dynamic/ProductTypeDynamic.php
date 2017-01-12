<?php

namespace ShoppingAPI\Dynamic;

use SDKBuilder\Dynamic\AbstractDynamic;

class ProductTypeDynamic extends AbstractDynamic
{
    /**
     * @return bool
     */
    public function validateDynamic(): bool
    {
        $validProductTypes = array('ISBN', 'EAN', 'MPN', 'Reference', 'UPC');

        if (count($this->dynamicValue) !== 2) {
            $this->exceptionMessages[] = 'ProductID is an dynamic an should receive an array with two entries, ProductID.type and ProductID.value';

            return false;
        }

        $dynamicValue = $this->dynamicValue[0];

        if (in_array($dynamicValue, $validProductTypes) === false) {
            $this->exceptionMessages[] = 'Invalid ProductID. Valid ProductID\'s are '.implode(', ', $validProductTypes);

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
        return 'ProductID.type='.$this->dynamicValue[0].'&ProductID.value='.$this->dynamicValue[1].'&';
    }
}