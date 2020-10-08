<?php

declare(strict_types=1);

namespace Extmage\Minitwitt\Model\Twitt;

use Extmage\Minitwitt\Api\Data\TwittInformationInterface;
use Magento\Framework\Exception\LocalizedException;


class Consumer
{


    /**
     * @var \Psr\Log\LoggerInterface
     */
    protected $logger;
    
    protected $twittFactory;

    public function __construct(
        \Psr\Log\LoggerInterface $logger,
        \Extmage\Minitwitt\Model\TwittFactory $twittFactory
    ) {
        $this->logger = $logger;
        $this->twittFactory = $twittFactory;
    }

    public function process(TwittInformationInterface $twittInfo)
    {
        try {
            /**
             * @var \Extmage\Minitwitt\Model\Twitt $twitt
             */
            $twitt = $this->twittFactory->create();
            $twitt->setCategoryId($twittInfo->getCategoryId());
            $twitt->setAuthor($twittInfo->getAuthor());
            $twitt->setCreatedAt($twittInfo->getCreatedAt());
            $twitt->setContent($twittInfo->getContent());
            $twitt->save();

        } catch (LocalizedException $exception) {
            $this->logger->critical(
                'Something went wrong while twitt save process. ' . $exception->getMessage()
            );
        }
    }
}
