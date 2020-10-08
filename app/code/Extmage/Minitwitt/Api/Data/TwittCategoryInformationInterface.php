<?php

namespace Extmage\Minitwitt\Api\Data;

interface TwittCategoryInformationInterface
{
    
    const KEY_ID = 'id';
    const KEY_CATEGORY = 'category';
    const KEY_TWITTS = 'twitts';

    /**
     * Get the country id for the store.
     *
     * @return string
     */
    public function getId();

    /**
     * Set the country id for the store.
     *
     * @param string $id
     * @return $this
     */
    public function setId($id);

    /**
     * Get category.
     *
     * @return string
     */
    public function getCategory();

    /**
     * Set category.
     *
     * @param string $category
     * @return $this
     */
    public function setCategory($category);


    /**
     * Get the available regions for the store.
     *
     * @return \Extmage\Minitwitt\Api\Data\TwittInformationInterface[]|null
     */
    public function getTwitts();

    /**
     * Set the available regions for the store
     *
     * @param \Extmage\Minitwitt\Api\Data\TwittInformationInterface[] $twitts
     * @return $this
     */
    public function setTwitts($twitts);

}
