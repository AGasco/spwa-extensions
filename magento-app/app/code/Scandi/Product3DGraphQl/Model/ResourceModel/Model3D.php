<?php declare(strict_types = 1);

namespace Scandi\Product3DGraphQl\Model\ResourceModel;

use \Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Model3D extends AbstractDb
{
    const TABLE = 'scandi_product_3d_model';

    const FIELD_ID = "id";
    const FIELD_PRODUCT_ID = "product_id";
    const FIELD_URL = "url";
    const FIELD_FILE = "file";

    /**
     * Initialize resource
     *
     * @return void
     */
    public function _construct()
    {
        $this->_init(self::TABLE, self::FIELD_ID);
    }
}

