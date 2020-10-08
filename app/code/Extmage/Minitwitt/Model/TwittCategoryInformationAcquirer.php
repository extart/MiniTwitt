<?php

namespace Extmage\Minitwitt\Model;

use Magento\Framework\Exception\NoSuchEntityException;

/**
 * Currency information acquirer class
 */
class TwittCategoryInformationAcquirer implements \Extmage\Minitwitt\Api\TwittCategoryInformationAcquirerInterface
{
    
    protected $categoryCollectionFactory;
    
    protected $categoryFactory;
    
    protected $categoryInformationFactory;
    
    protected $twittInformationFactory;
    
    public function __construct(
            \Extmage\Minitwitt\Model\ResourceModel\TwittCategory\CollectionFactory $categoryCollectionFactory,
            \Extmage\Minitwitt\Model\TwittCategoryFactory $categoryFactory,
            \Extmage\Minitwitt\Model\Data\TwittCategoryFactory $categoryInformationFactory,
            \Extmage\Minitwitt\Model\Data\TwittFactory $twittInformationFactory
        ) {
        $this->categoryCollectionFactory = $categoryCollectionFactory;
        $this->categoryInformationFactory = $categoryInformationFactory;
        $this->twittInformationFactory = $twittInformationFactory;
        $this->categoryFactory = $categoryFactory;
    }
    
    public function getTwittCategoriesInfo()
    {
        $categoriesInfo = [];
        
        /**
         * @var \Extmage\Minitwitt\Model\ResourceModel\Category\Collection $categoriesCollection
         */
        $categoriesCollection = $this->categoryCollectionFactory->create();
        $categoriesCollection->load();
        foreach ($categoriesCollection as $category){
            
            /**
             * @var \Extmage\Minitwitt\Model\Data\TwittCategory $categoryInformation
             */
            $categoryInformation = $this->categoryInformationFactory->create(); 
            $categoryInformation->setId($category->getId());
            $categoryInformation->setCategory($category->getCategory());
            $categoriesInfo[] = $categoryInformation;
        }
        return $categoriesInfo;
        
    }

    public function getTwittCategoryInfo($categoryId)
    {
        
        /**
         * @var \Extmage\Minitwitt\Model\TwittCategory $category
         */
        $category = $this->categoryFactory->create();
        $category->load($categoryId);
        if(!$category->getId()){
            throw new NoSuchEntityException(
                __(
                    "The category isn't available."
                    )
                );
        }else{
            /**
             * @var \Extmage\Minitwitt\Model\Data\TwittCategory $categoryInformation
             */
            $categoryInformation = $this->categoryInformationFactory->create();
            $categoryInformation->setId($category->getId());
            $categoryInformation->setCategory($category->getCategory());
            $twittsCollection = $category->getTwittsCollection();
            $twitts = [];
            if($twittsCollection){
                foreach ($twittsCollection as $twitt){
                    
                    /**
                     * @var \Extmage\Minitwitt\Model\Data\Twitt $twittInfo
                     */
                    $twittInfo = $this->twittInformationFactory->create();
                    $twittInfo->setAuthor($twitt->getAuthor());
                    $twittInfo->setCategoryId($twitt->getCategoryId());
                    $twittInfo->setContent($twitt->getContent());
                    $twittInfo->setCreatedAt($twitt->getCreatedAt());
                    $twittInfo->setId($twitt->getId());
                    $twitts[] = $twittInfo;
                }
            }
            $categoryInformation->setTwitts($twitts);
        }
        return $categoryInformation;
    }



 
}
