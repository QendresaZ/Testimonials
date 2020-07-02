<?php

namespace GreatCompany\Testimonials\Controller\Adminhtml\Index;

use GreatCompany\Testimonials\Api\Data\TestimonialInterface;
use GreatCompany\Testimonials\Api\TestimonialRepositoryInterface;
//use GreatCompany\Testimonials\Helper\FileHelper;
use Magento\Backend\App\Action;
use Magento\Framework\App\Request\Http;

class Delete extends Action
{
    /**
     * @var TestimonialRepositoryInterface
     */
    private $testimonialRepository;
    /**
     * @var FileHelper
     */
 //   private $fileHelper;
    /**
     * @var Http
     */
    private $request;

    public function __construct(
        Action\Context $context,
        TestimonialRepositoryInterface $testimonialRepository,
       // FileHelper $fileHelper,
        Http $request
    )
    {
        parent::__construct($context);
        $this->testimonialRepository = $testimonialRepository;
    //    $this->fileHelper = $fileHelper;
        $this->request = $request;
    }

    public function execute()
    {
        $testimonial = $this->testimonialRepository->getById((int) $this->request->getParam('id'));

        if(!$testimonial) {
            $this->messageManager->addErrorMessage(__('Testimonial not found'));
            return $this->getRedirect();
        }

        $this->remove($testimonial);

        return $this->getRedirect();
    }

    private function getRedirect()
    {
        return $this
            ->resultRedirectFactory
            ->create()
            ->setPath('testimonials/index/index');
    }

    private function remove(TestimonialInterface $testimonial)
    {
//        $filePath = $this
//            ->fileHelper
//            ->getAbsolutePath($testimonial->getPath());

        try {
            $this
                ->testimonialRepository
                ->delete($testimonial);

            $this
                ->messageManager
                ->addSuccessMessage(__('The testimonial is deleted!'));
//
//            (\file_exists($filePath))
//                ? unlink($filePath)
//                : $this->messageManager->addWarningMessage(__('Image file was not found'));
        } catch (Exception $e) {
            $this
                ->messageManager
                ->addErrorMessage(__('Exception occurred while deleting the testimonial'));
        }
    }
}
