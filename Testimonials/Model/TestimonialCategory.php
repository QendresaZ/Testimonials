<?php

namespace GreatCompany\Testimonials\Model;

use GreatCompany\Testimonials\Api\Data\TestimonialCategoryInterface;
use Magento\Framework\Model\AbstractModel;

class TestimonialCategory extends AbstractModel implements TestimonialCategoryInterface
{
    protected $_idFieldName = 'entity_id';

    public function _construct()
    {
        $this->_init('GreatCompany\Testimonials\Model\ResourceModel\TestimonialCategory');
    }

    public function getName()
    {
        return $this->_getData(self::NAME);
    }

    public function setName($name)
    {
        return $this->setData(self::NAME, $name);
    }

    public function getDescription()
    {
        return $this->_getData(self::DESCRIPTION);
    }

    public function setDescription($description)
    {
        return $this->setData(self::DESCRIPTION, $description);
    }
}
