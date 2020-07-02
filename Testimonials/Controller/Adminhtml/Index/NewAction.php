<?php

namespace GreatCompany\Testimonials\Controller\Adminhtml\Index;

use Magento\Backend\App\Action;
use Magento\Backend\Model\View\Result\ForwardFactory;
use Magento\Framework\Controller\ResultFactory;

class NewAction extends Action
{
    /**
     * @var ForwardFactory
     */
    private $forwardFactory;

    public function __construct(Action\Context $context)
    {
        parent::__construct($context);
    }

    public function execute()
    {
        return $this->resultFactory->create(ResultFactory::TYPE_PAGE);
    }
}
