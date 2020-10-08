<?php
namespace Extmage\Minitwitt\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class InstallData implements InstallDataInterface
{

    public function __construct()
    {

    }
    
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();
        $categoryTable = $setup->getTable(\Extmage\Minitwitt\Setup\InstallSchema::TWITT_CATEGORY_TABLE_NAME);

        $data = [
            [
                'category' => 'News'
            ],
            [
                'category' => 'Messages'
            ],
            [
                'category' => 'Purchases'
            ]
        ];
        
        foreach ($data as $row) {
            $setup->getConnection()->insertForce($categoryTable, $row);
        }
        $setup->endSetup();

    }
}
