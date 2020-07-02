<?php

namespace GreatCompany\Testimonials\Model;

use GreatCompany\Testimonials\Api\Data\TestimonialInterface;

use Magento\Framework\Model\AbstractModel;

class Testimonial extends AbstractModel implements TestimonialInterface
{
    protected $_idFieldName = 'entity_id';

    public function _construct()
    {
        $this->_init('GreatCompany\Testimonials\Model\ResourceModel\Testimonial');
    }

    public function getTitle()
    {
        return $this->_getData(self::TITLE);
    }

    public function setTitle($title)
    {
        return $this->setData(self::TITLE, $title);
    }

    public function getContent()
    {
        return $this->_getData(self::CONTENT);
    }

    public function setContent($content)
    {
        return $this->setData(self::CONTENT, $content);
    }

    public function getPosition()
    {
        return $this->_getData(self::POSITION);
    }

    public function setPosition($position)
    {
        return $this->setData(self::POSITION, $position);
    }

    public function getAuthorName()
    {
        return $this->_getData(self::AUTHOR_NAME);
    }

    public function setAuthorName($authorName)
    {
        return $this->setData(self::AUTHOR_NAME, $authorName);
    }

    public function getCategoryId()
    {
        return $this->_getData(self::CATEGORY_ID);
    }

    public function setCategoryId($categoryId)
    {
        return $this->setData(self::CATEGORY_ID, $categoryId);
    }

    public function getDateCreated()
    {
        return $this->_getData(self::CREATED_ON);
    }
}
