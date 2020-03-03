<?php

namespace Girit\RunTask\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class InstallData implements InstallDataInterface
{
    /**
     * {@inheritdoc}
     */
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        $setup->getConnection()->insert(
            $setup->getTable('mastering_sample_item'),
            [
                'id' => 'Item 1'
            ]
        );

        $setup->getConnection()->insert(
            $setup->getTable('mastering_sample_item'),
            [
                'id' => 'Item 2'
            ]
        );

        $setup->endSetup();
    }
}
