<?php

namespace GreatCompany\Testimonials\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class TestimonialCategory extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('greatcompany_testimonials_category', 'entity_id');
    }
}
