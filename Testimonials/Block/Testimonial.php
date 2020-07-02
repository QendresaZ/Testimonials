<?php


namespace GreatCompany\Testimonials\Block;


use GreatCompany\Testimonials\Api\TestimonialCategoryRepositoryInterface;
use GreatCompany\Testimonials\Api\TestimonialRepositoryInterface;
use Magento\Framework\View\Element\Template;

class Testimonial extends Template
{
    /**
     * @var TestimonialRepositoryInterface
     */
    private $testimonialRepository;
    /**
     * @var TestimonialCategoryRepositoryInterface
     */
    private $testimonialCategoryRepository;

    public function __construct(
        Template\Context $context,
        TestimonialRepositoryInterface $testimonialRepository,
        array $data = []
    ){
        parent::__construct($context, $data);
        $this->testimonialRepository = $testimonialRepository;
    }

    public function getTestimonialsByCategoryName($categoryName, $active = true)
    {
    }

}
