<?php

namespace Extmage\Minitwitt\Model\Data;

class TwittCategory extends \Magento\Framework\Api\AbstractSimpleObject implements \Extmage\Minitwitt\Api\Data\TwittCategoryInformationInterface
{
    public function setTwitts($twitts)
    {
        return $this->setData(self::KEY_TWITTS, $twitts);
    }

    public function getTwitts()
    {
        return $this->_get(self::KEY_TWITTS);
    }

    public function setCategory($category)
    {
        return $this->setData(self::KEY_CATEGORY, $category);
    }

    public function getCategory()
    {
        return $this->_get(self::KEY_CATEGORY);
    }

    public function setId($id)
    {
        return $this->setData(self::KEY_ID, $id);
    }

    public function getId()
    {
        return $this->_get(self::KEY_ID);
    }


    

    
}
