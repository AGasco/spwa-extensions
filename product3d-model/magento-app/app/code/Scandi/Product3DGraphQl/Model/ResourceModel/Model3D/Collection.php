<?php declare(strict_types=1);

namespace Scandi\Product3DGraphQl\Model\ResourceModel\Model3D;

use \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Scandi\Product3DGraphQl\Model\Model3D as Model3DModel;
use Scandi\Product3DGraphQl\Model\ResourceModel\Model3D as Model3DResource;

class Collection extends AbstractCollection
{
    /**
     * Initialize resource collection
     *
     * @return void
     */
    public function _construct()
    {
        $this->_init(
            Model3DModel::class,
            Model3DResource::class
        );
    }

    public function addProductFilter($productId)
    {
        $this->addFilter(Model3DResource::FIELD_PRODUCT_ID, $productId);
    }
}
