<?php

namespace GreatCompany\Testimonials\Controller\Adminhtml\TestimonialCategory;

use Magento\Backend\App\Action;
use Magento\Backend\Model\View\Result\ForwardFactory;
use Magento\Framework\App\Action\HttpGetActionInterface;

class Edit extends Action implements HttpGetActionInterface
{
    /**
     * @var ForwardFactory
     */
    private $resultForwardFactory;

    public function __construct(
        Action\Context $context,
        ForwardFactory $resultForwardFactory
    ) {
        parent::__construct($context);
        $this->resultForwardFactory = $resultForwardFactory;
    }

    public function execute()
    {
        return $this
            ->resultForwardFactory
            ->create()
            ->forward('new');
    }
}
