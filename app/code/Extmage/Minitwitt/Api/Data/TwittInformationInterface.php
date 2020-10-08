<?php

namespace Extmage\Minitwitt\Api\Data;

interface TwittInformationInterface
{
    const KEY_ID = 'id';
    const KEY_CATEGORY_ID = 'category_id';
    const KEY_AUTHOR = 'author';
    const KEY_CREATED_AT = 'created_at';
    const KEY_CONTENT = 'content';
    /**
     * Get id.
     *
     * @return string
     */
    public function getId();

    /**
     * Set id.
     *
     * @param string $id
     * @return $this
     */
    public function setId($id);

    /**
     * Get category Id.
     *
     * @return string
     */
    public function getCategoryId();

    /**
     * Set category Id.
     *
     * @param string $categoryId
     * @return $this
     */
    public function setCategoryId($categoryId);


    /**
     * Get author.
     *
     * @return string
     */
    public function getAuthor();

    /**
     * Set author
     *
     * @param string $author
     * @return $this
     */
    public function setAuthor($author);
    
    /**
     * Get created at (timestamp).
     *
     * @return string
     */
    public function getCreatedAt();
    
    /**
     * Set created at
     *
     * @param string $createdAt
     * @return $this
     */
    public function setCreatedAt($createdAt);
    
    /**
     * Get content.
     *
     * @return string
     */
    public function getContent();
    
    /**
     * Set the available regions for the store
     *
     * @param string $content
     * @return $this
     */
    public function setContent($content);

}
