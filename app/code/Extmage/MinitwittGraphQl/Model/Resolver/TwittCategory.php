<?php

declare(strict_types=1);

namespace Extmage\MinitwittGraphQl\Model\Resolver;

use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\GraphQl\Exception\GraphQlNoSuchEntityException;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;
use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Query\ResolverInterface;
use Magento\Framework\Reflection\DataObjectProcessor;
use Extmage\Minitwitt\Api\TwittCategoryInformationAcquirerInterface;
use Extmage\Minitwitt\Api\Data\TwittCategoryInformationInterface;
use Magento\Framework\GraphQl\Exception\GraphQlInputException;


class TwittCategory implements ResolverInterface
{
    /**
     * @var DataObjectProcessor
     */
    private $dataProcessor;

    /**
     * @var TwittCategoryInformationAcquirerInterface
     */
    private $categoryInformationAcquirer;

    /**
     * @param DataObjectProcessor $dataProcessor
     * @param TwittCategoryInformationAcquirerInterface $countryInformationAcquirer
     */
    public function __construct(
        DataObjectProcessor $dataProcessor,
        TwittCategoryInformationAcquirerInterface $categoryInformationAcquirer
    ) {
        $this->dataProcessor = $dataProcessor;
        $this->categoryInformationAcquirer = $categoryInformationAcquirer;
    }

    /**
     * @inheritdoc
     */
    public function resolve(
        Field $field,
        $context,
        ResolveInfo $info,
        array $value = null,
        array $args = null
    ) {
        if (empty($args['id'])) {
            throw new GraphQlInputException(__('Category "id" value should be specified'));
        }

        try {
            $category = $this->categoryInformationAcquirer->getTwittCategoryInfo($args['id']);
        } catch (NoSuchEntityException $exception) {
            throw new GraphQlNoSuchEntityException(__($exception->getMessage()), $exception);
        }

        return $this->dataProcessor->buildOutputDataArray(
            $category,
            TwittCategoryInformationInterface::class
        );
    }
}
