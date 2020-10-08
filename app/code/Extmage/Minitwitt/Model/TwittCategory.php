<?php

namespace Extmage\Minitwitt\Model;

use Magento\Framework\Model\AbstractModel;

class TwittCategory extends \Magento\Framework\Model\AbstractModel
{

    protected $twittsCollectionFactory;
    
    protected function _construct()
    {
        $this->_init(\Extmage\Minitwitt\Model\ResourceModel\TwittCategory::class);
    }
        
    public function __construct(
            \Magento\Framework\Model\Context $context,
            \Magento\Framework\Registry $registry,
            \Extmage\Minitwitt\Model\ResourceModel\Twitt\CollectionFactory $twittsCollectionFactory
        ) {
            parent::__construct($context, $registry);
            $this->twittsCollectionFactory = $twittsCollectionFactory;
    }
    
    public function getTwittsCollection(){
        if(!$this->getId()){
            return false;
        }
        
        /**
         * @var \Extmage\Minitwitt\Model\ResourceModel\Twitt\Collection $collection
         */
        $collection = $this->twittsCollectionFactory->create();
        $collection->addFieldToFilter(\Extmage\Minitwitt\Api\Data\TwittInformationInterface::KEY_CATEGORY_ID, $this->getId());
        $collection->addOrder('created_at', \Magento\Framework\Data\Collection\AbstractDb::SORT_ORDER_DESC);
        $collection->setPageSize(10);
        $collection->setCurPage(1);
        return $collection;
        
        
    }
    
}
