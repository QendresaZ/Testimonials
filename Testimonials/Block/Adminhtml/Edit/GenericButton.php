<?php

namespace GreatCompany\Testimonials\Block\Adminhtml\Edit;

use Magento\Backend\Block\Widget\Context;
use Magento\Framework\Registry;
use Magento\Framework\UrlInterface;

class GenericButton
{
    /**
     * @var UrlInterface
     */
    protected $urlBuilder;

    /**
     * @var Registry
     */
    private $registry;

    public function __construct(
        Context $context,
        Registry $registry
    ) {
        $this->registry = $registry;
        $this->urlBuilder = $context->getUrlBuilder();
    }

    public function getUrl($route = '', $params = [])
    {
        return $this->urlBuilder->getUrl($route, $params);
    }
}
