<?php

namespace Extmage\Minitwitt\Model\ResourceModel\Twitt;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected function _construct()
    {
        $this->_init(
            \Extmage\Minitwitt\Model\Twitt::class,
            \Extmage\Minitwitt\Model\ResourceModel\Twitt::class
        );
    }
}
