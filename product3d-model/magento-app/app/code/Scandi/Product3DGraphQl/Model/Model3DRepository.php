<?php declare(strict_types=1);

namespace Scandi\Product3DGraphQl\Model;

use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Exception\AlreadyExistsException;
use Scandi\Product3DGraphQl\Api\Data\Model3DInterface;
use Scandi\Product3DGraphQl\Api\Data\Model3DSearchResultInterface;
use Scandi\Product3DGraphQl\Api\Data\Model3DSearchResultInterfaceFactory;
use Scandi\Product3DGraphQl\Api\Model3DRepositoryInterface;
use Scandi\Product3DGraphQl\Model\ResourceModel\Model3D as Model3DResource;
use Scandi\Product3DGraphQl\Model\ResourceModel\Model3D\CollectionFactory as Model3DCollectionFactory;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;

class Model3DRepository implements Model3DRepositoryInterface
{
    /** @var Model3DResource */
    protected $model3dResource;

    /** @var Model3DFactory */
    protected $modelFactory;

    /** @var Model3DCollectionFactory */
    protected $collectionFactory;

    /** @var CollectionProcessorInterface */
    protected $collectionProcessor;

    /** @var Model3DSearchResultInterfaceFactory */
    protected $searchResultFactory;

    /**
     * Model3DRepository constructor.
     * @param Model3DResource $model3dResource
     * @param Model3DFactory $modelFactory
     * @param Model3DCollectionFactory $collectionFactory
     * @param CollectionProcessorInterface $collectionProcessor
     * @param Model3DSearchResultInterfaceFactory $searchResultFactory
     */
    public function __construct(Model3DResource $model3dResource, Model3DFactory $modelFactory, Model3DCollectionFactory $collectionFactory, CollectionProcessorInterface $collectionProcessor, Model3DSearchResultInterfaceFactory $searchResultFactory)
    {
        $this->model3dResource = $model3dResource;
        $this->modelFactory = $modelFactory;
        $this->collectionFactory = $collectionFactory;
        $this->collectionProcessor = $collectionProcessor;
        $this->searchResultFactory = $searchResultFactory;
    }

    /**
     * @param $id
     * @return Model3DInterface
     */
    public function getById($id)
    {
        /** @var Model3D $model */
        $model = $this->modelFactory->create();
        $this->model3dResource->load($model, $id);
        return $model;
    }

    /**
     * @param Model3DInterface $model
     * @return void
     * @throws AlreadyExistsException
     */
    public function save(Model3DInterface $model)
    {
        $this->model3dResource->save($model);
    }

    /**
     * @param Model3DInterface $model
     * @return void
     */
    public function delete(Model3DInterface $model)
    {
        $this->model3dResource->delete($model);
    }

    /**
     * @param SearchCriteriaInterface $searchCriteria
     * @return Model3DSearchResultInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria)
    {
        $collection = $this->collectionFactory->create();
        $this->collectionProcessor->process($searchCriteria, $collection);

        /** @var Model3DSearchResultInterface $searchResults */
        $searchResults = $this->searchResultFactory->create();

        $searchResults->setSearchCriteria($searchCriteria);
        $searchResults->setItems($collection->getItems());

        return $searchResults;
    }
}
