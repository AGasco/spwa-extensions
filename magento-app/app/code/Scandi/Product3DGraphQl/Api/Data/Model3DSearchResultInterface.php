<?php declare(strict_types=1);

namespace Scandi\Product3DGraphQl\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

interface Model3DSearchResultInterface extends SearchResultsInterface
{
    /**
     * @return Model3DInterface[]
     */
    public function getItems();

    /**
     * @param Model3DInterface[] $items
     * @return void
     */
    public function setItems(array $items);
}
