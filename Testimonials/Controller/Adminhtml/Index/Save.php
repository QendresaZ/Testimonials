<?php

namespace GreatCompany\Testimonials\Controller\Adminhtml\Index;

use GreatCompany\Testimonials\Api\Data\TestimonialInterface;
use GreatCompany\Testimonials\Api\Data\TestimonialInterfaceFactory;
use GreatCompany\Testimonials\Api\TestimonialRepositoryInterface;
use Magento\Backend\App\Action;
use Magento\Framework\DataObject;
use Psr\Log\LoggerInterface;

class Save extends Action
{

    /**
     * @var LoggerInterface
     */
    private $logger;
    /**
     * @var TestimonialInterfaceFactory
     */
    private $testimonialFactory;
    /**
     * @var TestimonialRepositoryInterface
     */
    private $testimonialRepository;

    public function __construct(
        Action\Context $context,
        TestimonialInterfaceFactory $testimonialFactory,
        TestimonialRepositoryInterface $testimonialRepository,
        LoggerInterface $logger
    ) {
        parent::__construct($context);
        $this->testimonialFactory = $testimonialFactory;
        $this->testimonialRepository = $testimonialRepository;
        $this->logger = $logger;
    }

    public function execute()
    {
        $data = $this->prepareRequest();

        $entityId = $data->getData('entity_id');

        $testimonial = ($entityId)
            ? $this->testimonialRepository->getById($entityId)
            : $this->testimonialFactory->create();

        if (!$testimonial) {
            $this->getMessageManager()->addErrorMessage(__('Testimonial Category not found'));
            return $this->getRedirect();
        }

        $this->setData($data, $testimonial);

        try {
            $this
                ->testimonialRepository
                ->save($testimonial);

            $this
                ->getMessageManager()
                ->addSuccessMessage(__("Testimonial '%1' is added/modified. ", $testimonial->getName()));
        } catch (\Exception $exception) {
            $this->logger->alert($exception);

            $this
                ->getMessageManager()
                ->addErrorMessage(__("Testimonial couldn't be saved. An error has occured!"));
        }

        return $this->getRedirect();
    }

    private function prepareRequest()
    {
        $params = new DataObject($this->getRequest()->getParams());

        if (!$params->hasData('general') || !\is_array($params->getData('general'))) {
            $this
                ->getMessageManager()
                ->addErrorMessage('Invalid Request');

            return null;
        }

        return new DataObject($params->getData('general'));
    }

    private function setData(DataObject $data, TestimonialInterface $testimonial)
    {
        foreach ($data->getData() as $key => $value) {
            $testimonial->setData($key, $value);
        }
    }

    private function getRedirect()
    {
        return $this
            ->resultRedirectFactory
            ->create()
            ->setPath('testimonials/index/index');
    }
}
