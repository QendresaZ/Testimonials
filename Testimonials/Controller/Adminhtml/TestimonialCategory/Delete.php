<?php

namespace GreatCompany\Testimonials\Controller\Adminhtml\TestimonialCategory;

use GreatCompany\Testimonials\Api\Data\TestimonialCategoryInterface;
use GreatCompany\Testimonials\Api\TestimonialCategoryRepositoryInterface;
//use GreatCompany\Testimonials\Helper\FileHelper;
use Magento\Backend\App\Action;
use Magento\Framework\App\Request\Http;

class Delete extends Action
{
    /**
     * @var TestimonialCategoryRepositoryInterface
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
        TestimonialCategoryRepositoryInterface $testimonialCategoryRepository,
        // FileHelper $fileHelper,
        Http $request
    )
    {
        parent::__construct($context);
        $this->testimonialCategoryRepository = $testimonialCategoryRepository;
        //    $this->fileHelper = $fileHelper;
        $this->request = $request;
    }

    public function execute()
    {
        $testimonial = $this->testimonialCategoryRepository->getById((int) $this->request->getParam('id'));

        if(!$testimonial) {
            $this->messageManager->addErrorMessage(__('Testimonial Category not found'));
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
            ->setPath('testimonials/testimonialCategory/index');
    }

    private function remove(TestimonialCategoryInterface $testimonial)
    {
//        $filePath = $this
//            ->fileHelper
//            ->getAbsolutePath($testimonial->getPath());

        try {
            $this
                ->testimonialCategoryRepository
                ->delete($testimonial);

            $this
                ->messageManager
                ->addSuccessMessage(__('The testimonial category is deleted!'));
//
//            (\file_exists($filePath))
//                ? unlink($filePath)
//                : $this->messageManager->addWarningMessage(__('Image file was not found'));
        } catch (Exception $e) {
            $this
                ->messageManager
                ->addErrorMessage(__('Exception occurred while deleting the testimonial category'));
        }
    }
}
