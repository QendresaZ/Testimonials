<?php

namespace GreatCompany\Testimonials\Ui\Component\Listing\Column;

use Magento\Framework\UrlInterface;
use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Ui\Component\Listing\Columns\Column;

class TestimonialCategoryActions extends Column
{
    const EDIT_ACTION_PATH = 'testimonials/testimonialcategory/edit';
    /**
     * @var UrlInterface
     */
    private $urlBuilder;

    public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        UrlInterface $urlBuilder,
        array $components = [],
        array $data = []
    ) {
        $this->urlBuilder = $urlBuilder;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as &$item) {
                $item[$this->getData('name')]['edit'] = [
                    'href' => $this->urlBuilder->getUrl(
                        self::EDIT_ACTION_PATH,
                        ['id' => $item['entity_id']]
                    ),
                    'label' => __('Edit'),
                    'hidden' => false,
                    '__disableTmpl' => true
                ];
            }
        }

        return $dataSource;
    }
}
