<?php
declare(strict_types=1);

namespace Extmage\MinitwittGraphQl\Model\Twitt;


class AddTwitt
{

    protected $messagePublisher;
    
    public function __construct(
        \Magento\Framework\MessageQueue\PublisherInterface $messagePublisher
        ) {
        $this->messagePublisher = $messagePublisher;
    }


    public function execute(\Extmage\Minitwitt\Model\Data\Twitt $twitt): void
    {
        try {
            $this->messagePublisher->publish('minitwitt.new_twitt', $twitt);
        } catch (Exception $e) {
            throw new GraphQlInputException(
                __(
                    'Could not add twitt'
                )
            );
        }
    }

}
