<?php

namespace Extmage\Minitwitt\Model\Data;

class Twitt extends \Magento\Framework\Api\AbstractSimpleObject implements \Extmage\Minitwitt\Api\Data\TwittInformationInterface
{
    public function getCreatedAt()
    {
        return $this->_get(self::KEY_CREATED_AT);
    }

    public function setCreatedAt($createdAt)
    {
        return $this->setData(self::KEY_CREATED_AT, $createdAt);
    }

    public function setContent($content)
    {
        return $this->setData(self::KEY_CONTENT, $content);
    }

    public function setAuthor($author)
    {
        return $this->setData(self::KEY_AUTHOR, $author);
    }

    public function getAuthor()
    {
        return $this->_get(self::KEY_AUTHOR);
    }

    public function getCategoryId()
    {
        return $this->_get(self::KEY_CATEGORY_ID);
    }

    public function setCategoryId($categoryId)
    {
        return $this->setData(self::KEY_CATEGORY_ID, $categoryId);
    }

    public function getContent()
    {
        return $this->_get(self::KEY_CONTENT);
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
