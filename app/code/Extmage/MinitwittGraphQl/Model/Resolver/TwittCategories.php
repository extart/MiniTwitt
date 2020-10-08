<?php
declare(strict_types=1);

namespace Extmage\MinitwittGraphQl\Model\Resolver;

use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;
use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Query\ResolverInterface;
use Magento\Framework\Reflection\DataObjectProcessor;
use Extmage\Minitwitt\Api\TwittCategoryInformationAcquirerInterface;
use Extmage\Minitwitt\Api\Data\TwittCategoryInformationInterface;


class TwittCategories implements ResolverInterface
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
     * @param TwittCategoryInformationAcquirerInterface $categoryInformationAcquirer
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
        $categories = $this->categoryInformationAcquirer->getTwittCategoriesInfo();

        $output = [];
        foreach ($categories as $category) {
            $output[] = $this->dataProcessor->buildOutputDataArray($category, TwittCategoryInformationInterface::class);
        }

        return $output;
    }
}
