<?php declare(strict_types=1);

namespace Scandi\Product3DGraphQl\Api;

use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Exception\AlreadyExistsException;
use Scandi\Product3DGraphQl\Api\Data\Model3DInterface;
use Scandi\Product3DGraphQl\Api\Data\Model3DSearchResultInterface;

interface Model3DRepositoryInterface
{
    /**
     * @param $id
     * @return Model3DInterface
     */
    public function getById($id);

    /**
     * @param Model3DInterface $model
     * @return void
     * @throws AlreadyExistsException
     */
    public function save(Model3DInterface $model);

    /**
     * @param Model3DInterface $model
     * @return void
     */
    public function delete(Model3DInterface $model);

    /**
     * @param SearchCriteriaInterface $searchCriteria
     * @return Model3DSearchResultInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria);
}
