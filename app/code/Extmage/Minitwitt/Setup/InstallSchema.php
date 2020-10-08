<?php
namespace Extmage\Minitwitt\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class InstallSchema implements InstallSchemaInterface
{

    const TWITT_TABLE_NAME = 'em_twitt';
    const TWITT_CATEGORY_TABLE_NAME = 'em_twitt_category';
    
    /**
     *
     * @param object $installer
     * @param object $installer
     *
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();
        $this->createTwittCategoryTable($installer);
        $this->createTwittTable($installer);
        $installer->endSetup();
    }

    protected function createTwittCategoryTable($installer){
        $table = $installer->getConnection()
        ->newTable($installer->getTable(self::TWITT_CATEGORY_TABLE_NAME))
        ->addColumn('id', \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER, 12, [
            'unsigned' => true,
            'nullable' => false,
            'primary' => true,
            'auto_increment' => true
        ], 'ID')
        ->addColumn('category', \Magento\Framework\DB\Ddl\Table::TYPE_TEXT, 32, [
            'nullable' => false
        ], 'Category');
        
        $installer->getConnection()->createTable($table);
    }
    
    protected function createTwittTable($installer)
    {
        $table = $installer->getConnection()
        ->newTable($installer->getTable(self::TWITT_TABLE_NAME))
        ->addColumn('id', \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER, 12, [
            'unsigned' => true,
            'nullable' => false,
            'primary' => true,
            'auto_increment' => true
        ], 'ID')
        ->addColumn('category_id', \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER, 12, [
            'unsigned' => true,
            'nullable' => false,
        ], 'Topic ID')
        ->addColumn('author', \Magento\Framework\DB\Ddl\Table::TYPE_TEXT, 64, [
            'nullable' => false,
        ], 'Author')
        ->addColumn('created_at', \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP, null, [
            'nullable' => false,
        ], 'Created At')
        ->addColumn('content', \Magento\Framework\DB\Ddl\Table::TYPE_TEXT, 255, [
            'nullable' => false,
        ], 'Content');
        
        $installer->getConnection()->createTable($table);
    }
}
