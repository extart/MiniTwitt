<?php

declare(strict_types=1);

namespace Extmage\MinitwittGraphQl\Model\Resolver;

use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Exception\GraphQlInputException;
use Magento\Framework\GraphQl\Query\ResolverInterface;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;
use Extmage\MinitwittGraphQl\Model\Twitt\AddTwitt;

class TwittCreate implements ResolverInterface
{
    protected $addTwitt;
    
    protected $twittInformationFactory;
    
    protected $dateTime;

    public function __construct(
        AddTwitt $addTwitt,
        \Extmage\Minitwitt\Model\Data\TwittFactory $twittInformationFactory,
        \Magento\Framework\Stdlib\DateTime\DateTime $dateTime
    ) {
        $this->addTwitt = $addTwitt;
        $this->twittInformationFactory = $twittInformationFactory;
        $this->dateTime = $dateTime;
    }

    /**
     * @inheritdoc
     */
    public function resolve(Field $field, $context, ResolveInfo $info, array $value = null, array $args = null)
    {
        if (empty($args['input']['author'])) {
            throw new GraphQlInputException(__('Required parameter "author" is missing'));
        }
        $author = $args['input']['author'];
        
        if (empty($args['input']['content'])) {
            throw new GraphQlInputException(__('Required parameter "content" is missing'));
        }
        $content = $args['input']['content'];
        
        if (empty($args['input']['category_id'])) {
            throw new GraphQlInputException(__('Required parameter "category_id" is missing'));
        }
        $categoryId = $args['input']['category_id'];
        
        /**
         * @var \Extmage\Minitwitt\Model\Data\Twitt $twitt
         */
        $twitt = $this->twittInformationFactory->create();
        
        $twitt->setAuthor($author);
        $twitt->setCategoryId($categoryId);
        $twitt->setContent($content);
        $twitt->setCreatedAt($this->dateTime->date());

        $this->addTwitt->execute($twitt);

        return [
            'twitt' => [
                'author' => $twitt->getAuthor(),
                'created_at' => $twitt->getCreatedAt(),
                'content' => $twitt->getContent()
            ],
        ];
    }
}
