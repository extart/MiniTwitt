<?php

namespace Extmage\Minitwitt\Model\ResourceModel\TwittCategory;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected function _construct()
    {
        $this->_init(
            \Extmage\Minitwitt\Model\TwittCategory::class,
            \Extmage\Minitwitt\Model\ResourceModel\TwittCategory::class
        );
    }
}
