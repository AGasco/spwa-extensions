<?php declare(strict_types=1);

namespace Scandi\Product3DGraphQl\Model\Resolver\Products\CollectionPostProcessor;


use GraphQL\Language\AST\FieldNode;
use Magento\Catalog\Model\Product;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;
use Scandi\Product3DGraphQl\Helper\Model3DProvider;
use ScandiPWA\Performance\Api\ProductsDataPostProcessorInterface;

class Model3DProcessor implements ProductsDataPostProcessorInterface
{
    const MODEL_FIELD = 'model_3d_urls';

    /** @var Model3DProvider */
    protected $modelProvider;

    /**
     * Model3DProcessor constructor.
     * @param Model3DProvider $modelProvider
     */
    public function __construct(Model3DProvider $modelProvider)
    {
        $this->modelProvider = $modelProvider;
    }

    /**
     * @param Product[] $products
     * @param string $graphqlResolvePath
     * @param ResolveInfo|FieldNode $graphqlResolveInfo
     * @param array $processorOptions
     * @return callable
     */
    public function process(array $products, string $graphqlResolvePath, $graphqlResolveInfo, ?array $processorOptions = []): callable
    {
        $ids = [];
        foreach ($products as $product) {
            $ids[] = $product->getId();
        }

        $modelsByProductId = $this->modelProvider->getModelsForProductIds($ids);

        return function (&$product) use ($modelsByProductId) {
            $models = $modelsByProductId[$product['entity_id']];

            $urls = [];
            foreach ($models as $model) {
                $urls[] = $model->getResourceUrl();
            }

            $product[self::MODEL_FIELD] = $urls;
        };
    }
}
