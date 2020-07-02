<?php

namespace GreatCompany\Testimonials\Block\Adminhtml\Edit\Testimonial;

use GreatCompany\Testimonials\Block\Adminhtml\Edit\GenericButton;
use Magento\Backend\Block\Widget\Context;
use Magento\Framework\App\Request\Http;
use Magento\Framework\Registry;
use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

class DeleteButton extends GenericButton implements ButtonProviderInterface
{
    private $registry;
    /**
     * @var Context
     */
    private $context;
    /**
     * @var Http
     */
    private $request;

    public function __construct(
        Context $context,
        Registry $registry,
        Http $request
    ) {
        parent::__construct($context, $registry);
        $this->request = $request;
    }

    public function getButtonData()
    {
        if (is_null($this->request->getParam('id'))) {
            return [];
        }

        return [
            'label' => __('Delete Testimonial'),
            'class' => 'delete',
            'on_click' => sprintf("location.href = '%s';", $this->getDeleteUrl()),
            'sort_order' => 20
        ];
    }

    public function getDeleteUrl()
    {
        return $this->getUrl('*/*/delete', ['id' => $this->request->getParam('id')]);
    }
}
