<?php


namespace GreatCompany\Testimonials\Api\Data;


interface TestimonialCategoryInterface
{
    const NAME = 'name';
    const DESCRIPTION = 'description';

    /**
     * @return int
     */
    public function getId();

    /**
     * @return string
     */
    public function getName();

    /**
     * @param string $name
     * @return string
     */
    public function setName($name);

    /**
     * @return string
     */
    public function getDescription();

    /**
     * @param string $description
     * @return string
     */
    public function setDescription($description);
}
