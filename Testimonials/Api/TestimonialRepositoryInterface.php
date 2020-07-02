<?php


namespace GreatCompany\Testimonials\Api;



use GreatCompany\Testimonials\Api\Data\TestimonialInterface;
use GreatCompany\Testimonials\Model\ResourceModel\Testimonial\Collection;
use Magento\Framework\Api\SearchCriteriaInterface;

interface TestimonialRepositoryInterface
{

    /**
     * @param int $id
     * @return \GreatCompany\Testimonials\Api\Data\TestimonialInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getById($id);

    /**
     * @param TestimonialInterface $testimonial
     * @return \GreatCompany\Testimonials\Api\Data\TestimonialInterface
     */
    public function save(TestimonialInterface $testimonial);

    /**
     * @param TestimonialInterface $testimonial
     * @return void
     */
    public function delete(TestimonialInterface $testimonial);

    /**
     * @param int $testimonialId
     * @return void
     */
    public function deleteById($testimonialId);

    public function getByCategoryName($categoryName);

    /**
     * @return Collection
     */
    public function getCollection();

}
