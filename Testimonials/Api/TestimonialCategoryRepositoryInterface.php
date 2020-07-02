<?php


namespace GreatCompany\Testimonials\Api;


use GreatCompany\Testimonials\Api\Data\TestimonialCategoryInterface;
use GreatCompany\Testimonials\Model\ResourceModel\TestimonialCategory\Collection;

interface TestimonialCategoryRepositoryInterface
{

    /**
     * @param int n$id
     * @return \GreatCompany\Testimonials\Api\Data\TestimonialCategoryInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getById($id);

    /**
     * @param TestimonialCategoryInterface $testimonialCategory
     * @return void
     */
    public function delete(TestimonialCategoryInterface $testimonialCategory);

    /**
     * @param TestimonialCategoryInterface $testimonialCategory
     * @return \GreatCompany\Testimonials\Api\Data\TestimonialCategoryInterface
     */
    public function save(TestimonialCategoryInterface $testimonialCategory);

    /**
     * @param int $id
     * @return void
     */
    public function deleteById($id);

    /**
     * @param string $name
     * @return \GreatCompany\Testimonials\Api\Data\TestimonialCategoryInterface
     */
    public function getByName($name);

    /**
     * @return Collection
     */
    public function getCollection();
}
