<?php

namespace Girit\RunTask\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Ddl\Table;

class InstallSchema implements InstallSchemaInterface
{
    /**
     * {@inheritdoc}
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        $table = $setup->getConnection()->newTable(
            $setup->getTable('mastering_sample_item')
        )->addColumn(
            'id',
            Table::TYPE_INTEGER,
            null,
            ['identity' => true, 'nullable' => false, 'primary' => true],
            'Item ID'
        )->addColumn(
            'active',
            Table::TYPE_BOOLEAN,
            false,
            ['nullable' => true],
            'Is Active'
        )->addIndex(
            $setup->getIdxName('mastering_sample_item', ['id']),
            ['id']
        )->setComment(
            'Sample Items'
        );
        $setup->getConnection()->createTable($table);

        $setup->endSetup();
    }
}
