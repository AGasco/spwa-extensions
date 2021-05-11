<?php declare(strict_types=1);

namespace Scandi\Product3DGraphQl\Helper;


use Magento\Framework\Api\SearchCriteriaBuilder;
use Scandi\Product3DGraphQl\Api\Model3DRepositoryInterface;
use Scandi\Product3DGraphQl\Model\Model3D;
use Scandi\Product3DGraphQl\Model\ResourceModel\Model3D as Model3DResource;
use Scandi\Product3DGraphQl\Model\ResourceModel\Model3D\Collection as ModelCollection;
use Scandi\Product3DGraphQl\Model\ResourceModel\Model3D\CollectionFactory as ModelCollectionFactory;

class Model3DProvider
{
    /** @var ModelCollectionFactory */
    protected $model3dCollectionFactory;

    /** @var SearchCriteriaBuilder */
    protected $searchCriteriaBuilder;

    /** @var Model3DRepositoryInterface */
    protected $model3dRepository;

    /**
     * Model3DProvider constructor.
     * @param ModelCollectionFactory $model3dCollectionFactory
     * @param SearchCriteriaBuilder $searchCriteriaBuilder
     * @param Model3DRepositoryInterface $model3dRepository
     */
    public function __construct(
        ModelCollectionFactory $model3dCollectionFactory,
        SearchCriteriaBuilder $searchCriteriaBuilder,
        Model3DRepositoryInterface $model3dRepository
    ) {
        $this->model3dCollectionFactory = $model3dCollectionFactory;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        $this->model3dRepository = $model3dRepository;
    }


    public function getModelsForProductId($productId)
    {
        /** @var ModelCollection $collection */
        $collection = $this->model3dCollectionFactory->create();
        $collection->addProductFilter($productId);
        return $collection;
    }

    /**
     * @param array $ids
     * @return Model3D[]
     */
    public function getModelsForProductIds(array $ids)
    {
        $search = $this->searchCriteriaBuilder
            ->addFilter(Model3DResource::FIELD_PRODUCT_ID, $ids, 'in')
            ->create();

        $models = $this->model3dRepository->getList($search)->getItems();

        $result = [];

        foreach ($ids as $id) {
            $result[$id] = [];
        }

        /** @var Model3D $model */
        foreach ($models as $model) {
            $result[$model->getProductId()][] = $model;
        }

        return $result;
    }
}
