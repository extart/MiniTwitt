<?php

namespace Extmage\Minitwitt\Model;

class Twitt extends \Magento\Framework\Model\AbstractModel
{

    
    protected function _construct()
    {
        $this->_init(\Extmage\Minitwitt\Model\ResourceModel\Twitt::class);
    }
    
}
