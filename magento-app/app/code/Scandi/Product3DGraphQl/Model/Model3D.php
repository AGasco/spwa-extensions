<?php declare(strict_types=1);

namespace Scandi\Product3DGraphQl\Model;

use Magento\Framework\Data\Collection\AbstractDb;
use Magento\Framework\Model\AbstractModel;
use Magento\Framework\Model\Context;
use Magento\Framework\Model\ResourceModel\AbstractResource;
use Magento\Framework\Registry;
use Scandi\Product3DGraphQl\Api\Data\Model3DInterface;
use Scandi\Product3DGraphQl\Helper\ModelUrls;

class Model3D extends AbstractModel implements Model3DInterface
{
    const PRODUCT_ID = 'product_id';
    const URL = 'url';
    const FILE = 'file';

    /** @var ModelUrls */
    protected $modelUrls;

    /**
     * Model3D constructor.
     * @param Context $context
     * @param Registry $registry
     * @param ModelUrls $modelUrls
     * @param AbstractResource|null $resource
     * @param AbstractDb|null $resourceCollection
     */
    public function __construct(
        Context $context,
        Registry $registry,
        ModelUrls $modelUrls,
        AbstractResource $resource = null,
        AbstractDb $resourceCollection = null
    ) {
        parent::__construct(
            $context,
            $registry,
            $resource,
            $resourceCollection
        );
        $this->modelUrls = $modelUrls;
    }

    /**
     * Initialize resource model
     * @return void
     */
    public function _construct()
    {
        $this->_init('Scandi\Product3DGraphQl\Model\ResourceModel\Model3D');
    }

    /**
     * @return mixed
     */
    public function getProductId()
    {
        return $this->_getData(self::PRODUCT_ID);
    }

    /**
     * @param $id
     * @return void
     */
    public function setProductId($id)
    {
        $this->setData(self::PRODUCT_ID, $id);
    }

    /**
     * @param $url
     * @return void
     */
    public function setUrl($url)
    {
        $this->setData(self::URL, $url);
    }

    /**
     * @return string
     */
    public function getFile(): string
    {
        return $this->_getData(self::FILE);
    }

    /**
     * @param $file
     * @return void
     */
    public function setFile($file)
    {
        $this->setData(self::FILE, $file);
    }

    public function getResourceUrl(): string
    {
        return $this->modelUrls->getUrlForModelFile($this->getUrl());
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->_getData(self::URL);
    }
}

