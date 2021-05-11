<?php declare(strict_types=1);

namespace Scandi\Product3DGraphQl\Observer\Product;

use Magento\Backend\App\Action\Context;
use Magento\Catalog\Api\Data\ProductInterface;
use Magento\Framework\Event\Observer as EventObserver;
use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Registry;
use Scandi\Product3DGraphQl\Api\Data\Model3DInterface;
use Scandi\Product3DGraphQl\Api\Data\Model3DInterfaceFactory;
use Scandi\Product3DGraphQl\Api\Model3DRepositoryInterface;
use Scandi\Product3DGraphQl\Model\Upload;

class Save implements ObserverInterface
{
    /** @var Registry */
    protected $registry;

    /** @var Upload */
    protected $upload;

    /** @var Context */
    protected $context;

    /** @var Model3DRepositoryInterface */
    protected $modelRepository;

    /** @var Model3DInterfaceFactory */
    protected $modelFactory;

    /**
     * Save constructor.
     * @param Registry $registry
     * @param Upload $upload
     * @param Context $context
     * @param Model3DRepositoryInterface $modelRepository
     * @param Model3DInterfaceFactory $modelFactory
     */
    public function __construct(Registry $registry, Upload $upload, Context $context, Model3DRepositoryInterface $modelRepository, Model3DInterfaceFactory $modelFactory)
    {
        $this->registry = $registry;
        $this->upload = $upload;
        $this->context = $context;
        $this->modelRepository = $modelRepository;
        $this->modelFactory = $modelFactory;
    }

    public function execute(EventObserver $observer)
    {
        $product = $this->registry->registry('product');
        $post = $observer->getDataObject();

        $this->processModelDeletion($post);

        $models = $this->context->getRequest()->getFiles('models', -1);
        if ($models != '-1') {
            $this->addModels($models, $product);
        }
    }

    protected function processModelDeletion($post)
    {
        if (isset($post['remove_model'])) {
            foreach ($post['remove_model'] as $id => $keep) {
                if ($keep === "0") {
                    $this->modelRepository->delete(
                        $this->modelRepository->getById($id)
                    );
                }
            }
        }
    }

    protected function addModels($models, ProductInterface $product)
    {
        foreach ($models as $model) {
            if ($model['tmp_name'] === '') {
                continue;
            }

            $uploadedFile = $this->upload->uploadFile($model);

            /** @var Model3DInterface $newModel */
            $newModel = $this->modelFactory->create();

            $newModel->setFile($uploadedFile['name']);
            $newModel->setUrl($uploadedFile['file']);
            $newModel->setProductId($product->getId());

            $this->modelRepository->save($newModel);
        }
    }
}
