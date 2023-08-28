<?php

namespace Test\BuyOneClick\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Ddl\Table;
use Zend_Db_Exception;

class InstallSchema implements InstallSchemaInterface
{
    /**
     * @param SchemaSetupInterface $setup
     * @param ModuleContextInterface $context
     * @return void
     * @throws Zend_Db_Exception
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();
        if (version_compare($context->getVersion(), '1.0.0') < 0) {
            $table = $setup->getConnection()->newTable(
                $setup->getTable('buyoneclick_orders')
            )->addColumn(
                    'id',
                    Table::TYPE_INTEGER,
                    null,
                    [
                        'identity' => true,
                        'nullable' => false,
                        'primary' => true,
                        'unsigned' => true,
                    ],
                    'ID'
                )->addColumn(
                    'sku',
                    Table::TYPE_TEXT,
                    255,
                    ['nullable => false'],
                    'Product sku'
                )->addColumn(
                    'phone',
                    Table::TYPE_TEXT,
                    255,
                    [],
                    'Customer phone'
                )->addColumn(
                    'created_at',
                    Table::TYPE_TIMESTAMP,
                    null,
                    [
                        'nullable' => false,
                        'default' => Table::TIMESTAMP_INIT
                    ],
                    'Created At'
                )->setComment('Buy one click orders table');
            $setup->getConnection()->createTable($table);
        }

        $setup->endSetup();
    }
}
