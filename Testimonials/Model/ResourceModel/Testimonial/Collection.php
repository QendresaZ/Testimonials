<?php

namespace GreatCompany\Testimonials\Model\ResourceModel\Testimonial;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected $_idFieldName = 'entity_id';

    protected function _construct()
    {
        $this->_init('GreatCompany\Testimonials\Model\Testimonial', 'GreatCompany\Testimonials\Model\ResourceModel\Testimonial');
    }
}
