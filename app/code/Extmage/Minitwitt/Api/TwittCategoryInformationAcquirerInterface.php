<?php

namespace Extmage\Minitwitt\Api;

interface TwittCategoryInformationAcquirerInterface
{
    /**
     * Get all categories information.
     *
     * @return \Extmage\Minitwitt\Api\Data\TwittCategoryInformationInterface[]
     */
    public function getTwittCategoriesInfo();

    /**
     * Get category information for the store.
     *
     * @param string $categoryId
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @return \Extmage\Minitwitt\Api\Data\TwittCategoryInformationInterface
     */
    public function getTwittCategoryInfo($categoryId);
}
