<?php

namespace GreatCompany\Testimonials\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Testimonial extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('greatcompany_testimonials_testimonial', 'entity_id');
    }
}
