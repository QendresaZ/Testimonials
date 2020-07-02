<?php

namespace GreatCompany\Testimonials\Model\ResourceModel\TestimonialCategory;

use Magento\Ui\DataProvider\AbstractDataProvider;

class DataProvider extends AbstractDataProvider
{
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $collectionFactory,
        array $meta = [],
        array $data = []
    ) {
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
        $this->collection = $collectionFactory->create();
    }

    /**
     * @return array
     */
    public function getData()
    {
        $result = [];
        foreach ($this->collection->getItems() as $item) {
            $result[$item->getId()]['general'] = $item->getData();
        }
        return $result;
    }
}
