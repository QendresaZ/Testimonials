<?php

namespace GreatCompany\Testimonials\Model;

use GreatCompany\Testimonials\Api\Data\TestimonialCategoryInterface;
use GreatCompany\Testimonials\Api\Data\TestimonialCategoryInterfaceFactory;
use GreatCompany\Testimonials\Api\TestimonialCategoryRepositoryInterface;
use GreatCompany\Testimonials\Model\ResourceModel\TestimonialCategory\CollectionFactory;
use GreatCompany\Testimonials\Model\ResourceModel\TestimonialCategoryFactory as TestimonialCategoryResourceModelFactory;
use Magento\Framework\Data\Collection\AbstractDb;

class TestimonialCategoryRepository implements TestimonialCategoryRepositoryInterface
{
    /**
     * @var TestimonialCategoryInterfaceFactory
     */
    private $modelFactory;
    /**
     * @var CollectionFactory
     */
    private $collectionFactory;
    /**
     * @var TestimonialCategoryFactory
     */
    private $testimonialCategoryFactory;
    /**
     * @var TestimonialCategoryResourceModelFactory
     */
    private $testimonialCategoryModelFactory;

    public function __construct(
        TestimonialCategoryInterfaceFactory $modelFactory,
        CollectionFactory $collectionFactory,
        TestimonialCategoryFactory $testimonialCategoryFactory,
        TestimonialCategoryResourceModelFactory $testimonialCategoryModelFactory
    )
    {
        $this->modelFactory = $modelFactory;
        $this->collectionFactory = $collectionFactory;
        $this->testimonialCategoryFactory = $testimonialCategoryFactory;
        $this->testimonialCategoryModelFactory = $testimonialCategoryModelFactory;
    }

    public function getById($id)
    {
        $model = $this->getModel();

        $this->getResourceModel()->load($model, $id);

        return ($model->getId())
            ? $model
            : null;
    }

    public function delete(TestimonialCategoryInterface $testimonialCategory)
    {
        $this
            ->getResourceModel()
            ->delete($testimonialCategory);
    }

    public function save(TestimonialCategoryInterface $testimonialCategory)
    {
       $this
           ->getResourceModel()
           ->save($testimonialCategory);
    }

    public function deleteById($id)
    {
        $model = $this->getById($id);

        if($model) {
            $this
                ->getResourceModel()
                ->delete($model);
        }
    }

    private function getResourceModel()
    {
        return $this->testimonialCategoryModelFactory->create();
    }

    private function getModel()
    {
        return $this->modelFactory->create();
    }

    public function getCollection()
    {
        return $this
            ->collectionFactory
            ->create()
            ->setOrder('entity_id', AbstractDb::SORT_ORDER_ASC);
    }

    public function getByName($name)
    {
        $model = $this->getModel();

        $this->getResourceModel()->load($model, $name);

        return ($model->getName())
            ? $model
            : null;
    }
}
