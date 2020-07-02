<?php


namespace GreatCompany\Testimonials\Api\Data;


interface TestimonialInterface
{
    const TITLE = 'title';
    const CONTENT = 'content';
    const POSITION = 'position';
    const CREATED_ON = 'created_on';
    const AUTHOR_NAME = 'author_name';
    const CATEGORY_ID = 'category_id';

    /**
     * @return int
     */
    public function getId();

    /**
     * @param int $id
     * @return void
     */
    public function setId($id);

    /**
     * @return string
     */
    public function getTitle();

    /**
     * @param string $title
     * @return void
     */
    public function setTitle($title);

    /**
     * @return string
     */
    public function getContent();

    /**
     * @param string $content
     * @return void
     */
    public function setContent($content);

    /**
     * @return int
     */
    public function getPosition();

    /**
     * @param int $position
     * @return void
     */
    public function setPosition($position);

    /**
     * @return mixed
     */
    public function getDateCreated();

    /**
     * @return string
     */
    public function getAuthorName();

    /**
     * @param string $authorName
     * @return void
     */
    public function setAuthorName($authorName);

    /**
     * @return int
     */
    public function getCategoryId();

    /**
     * @param int $categoryId
     * @return void
     */
    public function setCategoryId($categoryId);

}
