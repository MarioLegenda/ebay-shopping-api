<?php

namespace ShoppingAPI\Information;

use FindingAPI\Core\Information\InformationInterface;

class SortOrderInformation implements InformationInterface
{
    const ASCENDING = 'Ascending';
    const DESCENDING = 'Descending';
    const CUSTOM_CODE = 'CustomCode';
    /**
     * @var array $sortOrder
     */
    private $sortOrder = array(
        'Ascending',
        'Descending',
        'CustomCode',
    );
    /**
     * @var ProductSortInformation $instance
     */
    private static $instance;
    /**
     * @return ProductSortInformation
     */
    public static function instance()
    {
        self::$instance = (self::$instance instanceof self) ? self::$instance : new self();

        return self::$instance;
    }
    /**
     * @param string $entry
     * @return mixed
     */
    public function has(string $entry) : bool
    {
        return in_array($entry, $this->sortOrder) !== false;
    }
    /**
     * @param $entry
     * @return InformationInterface
     */
    public function add(string $entry) : InformationInterface
    {
        if ($this->has($entry)) {
            return null;
        }

        $this->sortOrder[] = $entry;

        return self::$instance;
    }
    /**
     * @param string $entry
     * @return bool
     */
    public function remove(string $entry): bool
    {
        $position = array_search($entry, $this->sortOrder);

        if (array_key_exists($position, $this->sortOrder)) {
            unset($this->sortOrder[$position]);

            return true;
        }

        return false;
    }
    /**
     * @return array
     */
    public function getAll() : array
    {
        return $this->sortOrder;
    }
}