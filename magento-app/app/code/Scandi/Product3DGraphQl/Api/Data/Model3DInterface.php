<?php declare(strict_types=1);

namespace Scandi\Product3DGraphQl\Api\Data;

use Magento\Framework\Api\ExtensibleDataInterface;

interface Model3DInterface extends ExtensibleDataInterface
{
    /**
     * @return mixed
     */
    public function getId();

    /**
     * @param $id
     * @return void
     */
    public function setId($id);

    /**
     * @return mixed
     */
    public function getProductId();

    /**
     * @param $id
     * @return void
     */
    public function setProductId($id);

    /**
     * @return string
     */
    public function getUrl(): string;

    /**
     * @param $url
     * @return void
     */
    public function setUrl($url);

    /**
     * @return string
     */
    public function getFile(): string;

    /**
     * @param $file
     * @return void
     */
    public function setFile($file);

    public function getResourceUrl(): string;
}
