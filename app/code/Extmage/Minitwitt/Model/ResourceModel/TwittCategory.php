<?php

namespace Extmage\Minitwitt\Model\ResourceModel;

class TwittCategory extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    
    protected function _construct()
    {
        $this->_init('em_twitt_category', 'id');
    }
}
