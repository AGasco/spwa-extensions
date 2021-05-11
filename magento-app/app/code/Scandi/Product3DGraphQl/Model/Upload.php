<?php declare(strict_types=1);

namespace Scandi\Product3DGraphQl\Model;

use Exception;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\MediaStorage\Model\File\UploaderFactory;
use Scandi\Product3DGraphQl\Helper\ModelUrls;

class Upload
{

    /** @var UploaderFactory */
    protected $uploaderFactory;

    /** @var ScopeConfigInterface */
    protected $scopeConfig;

    /** @var ModelUrls */
    protected $modelUrls;

    /** @var string[] */
    protected $allowedExtensions;

    /**
     * Upload constructor.
     * @param UploaderFactory $uploaderFactory
     * @param ScopeConfigInterface $scopeConfig
     * @param ModelUrls $modelUrls
     * @param string[] $allowedExtensions
     */
    public function __construct(
        UploaderFactory $uploaderFactory,
        ScopeConfigInterface $scopeConfig,
        ModelUrls $modelUrls,
        array $allowedExtensions = ['glb']
    ) {
        $this->uploaderFactory = $uploaderFactory;
        $this->scopeConfig = $scopeConfig;
        $this->modelUrls = $modelUrls;
        $this->allowedExtensions = $allowedExtensions;
    }


    /**
     * @param $file
     * @return array
     * @throws Exception
     */
    public function uploadFile($file)
    {
        $uploader = $this->uploaderFactory->create(['fileId' => $file]);
        $uploader->setAllowedExtensions($this->allowedExtensions)
            ->setAllowRenameFiles(true)
            ->setFilesDispersion(true)
            ->setAllowCreateFolders(true);

        return $uploader->save($this->modelUrls->getUploadPath());
    }
}
