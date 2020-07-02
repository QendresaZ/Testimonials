<?php


namespace GreatCompany\Testimonials\Model;


use GreatCompany\Testimonials\Api\Data\TestimonialInterface;
use GreatCompany\Testimonials\Api\Data\TestimonialInterfaceFactory;
use GreatCompany\Testimonials\Api\TestimonialRepositoryInterface;
use GreatCompany\Testimonials\Model\ResourceModel\Testimonial\Collection;
use GreatCompany\Testimonials\Model\ResourceModel\Testimonial\CollectionFactory;
use GreatCompany\Testimonials\Model\ResourceModel\TestimonialFactory as TestimonialResourceModelFactory;
use Magento\Framework\Data\Collection\AbstractDb;

class TestimonialRepository implements TestimonialRepositoryInterface
{

    /**
     * @var TestimonialInterfaceFactory
     */
    private $modelFactory;
    /**
     * @var CollectionFactory
     */
    private $collectionFactory;
    /**
     * @var TestimonialFactory
     */
    private $testimonialFactory;
    /**
     * @var TestimonialResourceModelFactory
     */
    private $testimonialModelFactory;

    public function __construct(
        TestimonialInterfaceFactory $modelFactory,
        CollectionFactory $collectionFactory,
        TestimonialFactory $testimonialFactory,
        TestimonialResourceModelFactory $testimonialModelFactory
    )
    {
        $this->modelFactory = $modelFactory;
        $this->collectionFactory = $collectionFactory;
        $this->testimonialFactory = $testimonialFactory;
        $this->testimonialModelFactory = $testimonialModelFactory;
    }

    public function getById($id)
    {
        $model = $this->getModel();

        $this->getResourceModel()->load($model, $id);

        return ($model->getId())
            ? $model
            : null;
    }

    public function save(TestimonialInterface $testimonial): void
    {
        $this
            ->getResourceModel()
            ->save($testimonial);
    }

    public function delete(TestimonialInterface $testimonial): void
    {
        $this
            ->getResourceModel()
            ->delete($testimonial);
    }

    public function deleteById($testimonialId): void
    {
        $model = $this->getById($testimonialId);

        if($model) {
            $this
                ->getResourceModel()
                ->delete($model);
        }
    }
    private function getResourceModel()
    {
        return $this->testimonialModelFactory->create();
    }

    private function getModel()
    {
        return $this->modelFactory->create();
    }

    public function getCollection()
    {
        return $this
            ->collectionFactory
            ->create();
    }

    public function getByCategoryName($categoryName)
    {
        $resourceModel = $this->getResourceModel();
        $testimonialCategoryTableName = $resourceModel->getTable('greatcompany_testimonials_category');
        $collection = $this->getCollection();

        $collection
            ->getSelect()
            ->joinInner(
                ['second_table' => $testimonialCategoryTableName],
                'main_table.category_id = second_table.entity_id',
                'main_table.*'
            )
            ->where("second_table.name = ?", $categoryName);

        return $collection->getItems();
    }
}
