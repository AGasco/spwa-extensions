<?php declare(strict_types=1);

namespace Scandi\Product3DGraphQl\Ui\DataProvider\Product\Form\Modifier;

use Magento\Catalog\Model\Product;
use Magento\Catalog\Ui\DataProvider\Product\Form\Modifier\AbstractModifier;
use Magento\Framework\Registry;
use Magento\Ui\Component\Form\Fieldset;
use Scandi\Product3DGraphQl\Helper\Model3DProvider;
use Scandi\Product3DGraphQl\Model\Model3D;

class ProductModels extends AbstractModifier
{
    /** @var Registry */
    protected $registry;

    /** @var Model3DProvider */
    protected $model3dProvider;

    /**
     * ProductDownloads constructor.
     * @param Registry $registry
     * @param Model3DProvider $model3dProvider
     */
    public function __construct(Registry $registry, Model3DProvider $model3dProvider)
    {
        $this->registry = $registry;
        $this->model3dProvider = $model3dProvider;
    }


    public function modifyMeta(array $meta)
    {
        $meta['scandi_model3d'] = [
            'arguments' => [
                'data' => [
                    'config' => [
                        'label' => __('3D Models'),
                        'sortOrder' => 50,
                        'collapsible' => true,
                        'componentType' => Fieldset::NAME,
                    ]
                ]
            ],
            'children' => $this->getModelFields()
        ];

        return $meta;
    }

    protected function getModelFields()
    {
        $fields = [];
        /** @var Product $product */
        $product = $this->registry->registry('current_product');
        $models = $this->model3dProvider->getModelsForProductId($product->getId());

        // check if this works. was  models[i] before
        $fields['scandi.models.new'] = [
            'arguments' => [
                'data' => [
                    'config' => [
                        'formElement' => 'file',
                        'dataScope' => 'scandi.models[]',
                        'componentType' => 'field',
                        'visible' => 1,
                        'required' => 0,
                        'label' => __('Add New 3D Model')
                    ]
                ]
            ]
        ];

        $isFirst = true;
        foreach ($models as $i => $model) {
            $scope = sprintf("data.product.remove_model.%d", $model->getId());

            $fields[$scope] = [
                'arguments' => [
                    'data' => [
                        'config' => [
                            'formElement' => 'checkbox',
                            'componentType' => 'field',
                            'description' => $model->getFile(),
                            'dataScope' => $scope,
                            'checked' => true,
                            'value' => true,
                            'visible' => 1,
                            'required' => 0,
                            'label' => $isFirst ? __('Uncheck to Delete:') : '',
                            'comment' => $this->getFileLink($model)
                        ]
                    ]
                ]
            ];

            $isFirst = false;
        }

        return $fields;
    }

    protected function getFileLink(Model3D $model)
    {
        return sprintf(
            '<a href="%s" target="_blank">%s</a>',
            $model->getResourceUrl(), $model->getFile()
        );
    }

    /**
     * {@inheritdoc}
     */
    public function modifyData(array $data)
    {
        return $data;
    }
}
