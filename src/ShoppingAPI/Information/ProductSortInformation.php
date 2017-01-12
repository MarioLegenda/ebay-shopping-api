<?php

namespace ShoppingAPI\Information;

use FindingAPI\Core\Information\InformationInterface;

class ProductSortInformation implements InformationInterface
{
    const CUSTOM_CODE = 'CustomCode';
    const ITEM_COUNT = 'ItemCount';
    const POPULARITY = 'Popularity';
    const RATING = 'Rating';
    const REVIEW_COUNT = 'ReviewCount';
    const TITLE = 'Title';
    /**
     * @var array $currencies
     */
    private $productSorts = array(
        'CustomCode',
        'ItemCount',
        'Popularity',
        'Rating',
        'ReviewCount',
        'Title',
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
     * @param string $currency
     * @return mixed
     */
    public function has(string $currency) : bool
    {
        return in_array($currency, $this->productSorts) !== false;
    }
    /**
     * @param $currency
     * @return InformationInterface
     */
    public function add(string $currency) : InformationInterface
    {
        if ($this->has($currency)) {
            return null;
        }

        $this->productSorts[] = $currency;

        return self::$instance;
    }
    /**
     * @param string $entry
     * @return bool
     */
    public function remove(string $entry): bool
    {
        $position = array_search($entry, $this->productSorts);

        if (array_key_exists($position, $this->productSorts)) {
            unset($this->productSorts[$position]);

            return true;
        }

        return false;
    }
    /**
     * @return array
     */
    public function getAll() : array
    {
        return $this->productSorts;
    }
}