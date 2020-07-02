<?php


namespace GreatCompany\Testimonials\Controller\Adminhtml\TestimonialCategory;

use GreatCompany\Testimonials\Api\Data\TestimonialCategoryInterface;
use GreatCompany\Testimonials\Api\Data\TestimonialCategoryInterfaceFactory;
use GreatCompany\Testimonials\Api\TestimonialCategoryRepositoryInterface;
use Magento\Backend\App\Action;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\DataObject;
use Psr\Log\LoggerInterface;


class Save extends Action
{
    /**
     * @var TestimonialCategoryInterfaceFactory
     */
    private $testimonialCategoryFactory;
    /**
     * @var TestimonialCategoryRepositoryInterface
     */
    private $testimonialCategoryRepository;
    /**
     * @var LoggerInterface
     */
    private $logger;

    public function __construct(
        Action\Context $context,
        TestimonialCategoryInterfaceFactory $testimonialCategoryFactory,
        TestimonialCategoryRepositoryInterface $testimonialCategoryRepository,
        LoggerInterface $logger
    ){
        $this->testimonialCategoryFactory = $testimonialCategoryFactory;
        $this->testimonialCategoryRepository = $testimonialCategoryRepository;
        $this->logger = $logger;
        parent::__construct($context);
    }

    public function execute()
    {
        $data = $this->prepareRequest();

        $entityId = $data->getData('entity_id');

        $testimonialCategory = ($entityId)
            ? $this->testimonialCategoryRepository->getById($entityId)
            : $this->testimonialCategoryFactory->create();

            if(!$testimonialCategory) {
                 $this->getMessageManager()->addErrorMessage(__('Testimonial Category not found'));
                return $this->getRedirect();
            }

            $this->setData($data, $testimonialCategory);

        try {
            $this
                ->testimonialCategoryRepository
                ->save($testimonialCategory);

            $this
                ->getMessageManager()
                ->addSuccessMessage(__("Testimonial Category '%1' is added/modified. ", $testimonialCategory->getName()));
        }catch (\Exception $exception) {
            $this->logger->alert($exception);

            $this
                ->getMessageManager()
                ->addErrorMessage(__("Testimonial Category couldn't be saved. An error has occured!"));
        }

        return $this->getRedirect();
    }

    private function prepareRequest()
    {
        $params = new DataObject($this->getRequest()->getParams());

        if(!$params->hasData('general') || !\is_array($params->getData('general'))) {
            $this
                ->getMessageManager()
                ->addErrorMessage('Invalid Request');

            return null;
        }

        return new DataObject($params->getData('general'));
    }

    private function setData(DataObject $data, TestimonialCategoryInterface $testimonialCategory)
    {
        foreach ($data->getData() as $key => $value) {
            $testimonialCategory->setData($key, $value);
        }
    }

    private function getRedirect()
    {
        return $this
            ->resultRedirectFactory
            ->create()
            ->setPath('testimonials/testimonialCategory/index');
    }
}
