<?php

namespace Brander\ContactUs\Setup;

use \Magento\Framework\Setup\UpgradeDataInterface;
use \Magento\Framework\Setup\ModuleContextInterface;
use \Magento\Framework\Setup\ModuleDataSetupInterface;

/**
 * Class UpgradeData
 *
 * @package Brander\ContactUs\Setup
 */
class UpgradeData implements UpgradeDataInterface
{

    /**
     * {@inheritdoc}
     */
    public function upgrade( ModuleDataSetupInterface $setup, ModuleContextInterface $context )
    {
        $setup->startSetup();
        if ($context->getVersion()
            && version_compare($context->getVersion(), '0.1.1') < 0
        ) {
            $tableName = $setup->getTable('brander_contact_us');
            $data = [
                [
                    'name'      => 'Test 1',
                    'email'     => 'test1@gmail.com',
                    'telephone' => '+79379992',
                    'question'  => 'hola amigos!'
                ],
                [
                    'name'      => 'Test 2',
                    'email'     => 'test2@gmail.com',
                    'telephone' => '+79379992',
                    'question'  => 'hola amigos!'
                ],
            ];

            $setup->getConnection()->insertMultiple($tableName, $data);
        }

        $setup->endSetup();
    }
}