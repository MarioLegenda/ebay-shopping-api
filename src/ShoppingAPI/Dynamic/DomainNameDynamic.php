<?php

namespace ShoppingAPI\Dynamic;

use SDKBuilder\Dynamic\AbstractDynamic;

class DomainNameDynamic extends AbstractDynamic
{
    /**
     * @return bool
     */
    public function validateDynamic(): bool
    {
        if (empty($this->dynamicValue)) {
            $this->exceptionMessages[] = 'Dynamic value cannot be empty for dynamic with name \''.$this->name.'\'';

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
        if (count($this->dynamicValue) === 1) {
            return 'DomainName='.$this->dynamicValue[0].'&';
        }

        if (count($this->dynamicValue) > 1) {
            return 'DomainName(0)='.implode(',', $this->dynamicValue).'&';
        }
    }
}