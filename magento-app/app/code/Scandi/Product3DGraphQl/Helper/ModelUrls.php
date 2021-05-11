<?php declare(strict_types=1);


namespace Scandi\Product3DGraphQl\Helper;


use Magento\Framework\App\Filesystem\DirectoryList;
use Magento\Framework\Filesystem;
use Magento\Framework\UrlInterface;

class ModelUrls
{
    const  UPLOAD_DIRECTORY = 'scandi/product_3d_models/';

    /** @var Filesystem */
    protected $fileSystem;

    /** @var UrlInterface */
    private $url;

    /**
     * ModelUrls constructor.
     * @param Filesystem $fileSystem
     * @param UrlInterface $url
     */
    public function __construct(Filesystem $fileSystem, UrlInterface $url)
    {
        $this->fileSystem = $fileSystem;
        $this->url = $url;
    }

    public function getUploadPath()
    {
        return $this->fileSystem->getDirectoryWrite(DirectoryList::MEDIA)
            ->getAbsolutePath(self::UPLOAD_DIRECTORY);
    }

    public function getUrlForModelFile(string $file)
    {
        return sprintf(
            "%s%s",
            $this->getBaseUrl(),
            ltrim($file, '/')
        );
    }

    public function getBaseUrl()
    {
        return sprintf(
            '%s/%s',
            rtrim($this->url->getBaseUrl(['_type' => UrlInterface::URL_TYPE_MEDIA]), '/'),
            self::UPLOAD_DIRECTORY
        );
    }
}
