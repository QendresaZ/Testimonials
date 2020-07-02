<?php


namespace GreatCompany\Testimonials\Model\Attribute\Source;


use GreatCompany\Testimonials\Api\TestimonialCategoryRepositoryInterface;
use Magento\Framework\Data\OptionSourceInterface;

class Testimonial implements OptionSourceInterface
{
    /**
     * @var TestimonialRepositoryInterface
     */
    private $testimonialCategoryRepository;

    protected $options;

    public function __construct(
        TestimonialCategoryRepositoryInterface $testimonialCategoryRepository
    )
    {
        $this->testimonialCategoryRepository = $testimonialCategoryRepository;
    }

    public function toOptionArray()
    {
        $collection = $this->testimonialCategoryRepository->getCollection();

        $this->options = ($collection->count())
            ? array_map(function ($testimonialCategory) {
                return [
                    'label' => $testimonialCategory->getName(),
                    'value' => $testimonialCategory->getId()
                    ];
            }, $collection->getItems())
            : [];

        return $this->options;
    }
}
