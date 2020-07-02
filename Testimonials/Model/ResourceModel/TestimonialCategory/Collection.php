<?php

namespace GreatCompany\Testimonials\Model\ResourceModel\TestimonialCategory;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected $_idFieldName = 'entity_id';

    protected function _construct()
    {
        $this->_init('GreatCompany\Testimonials\Model\TestimonialCategory', 'GreatCompany\Testimonials\Model\ResourceModel\TestimonialCategory');
    }
}
