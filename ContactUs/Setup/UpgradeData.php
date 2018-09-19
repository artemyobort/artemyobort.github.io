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
     * Creates sample data for contact us table.
     *
     * @access  public
     * @param   ModuleDataSetupInterface    $setup
     * @param   ModuleContextInterface      $context
     * @return  void
     */
    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();
        if ($context->getVersion()
            && version_compare($context->getVersion(), '0.1.1') < 0
        ) {
            $tableName = $setup->getTable('brander_contact_us');

            $data = [
                [
                    'name'     => 'Test 1',
                    'email'    => 'test1@gmail.com',
                    'question' => 'hola amigos!'
                ],
                [
                    'name'     => 'Test 2',
                    'email'    => 'test2@gmail.com',
                    'question' => 'hola amigos!'
                ],
            ];

            $setup->getConnection()->insertMultiple($tableName, $data);
        }

        $setup->endSetup();
    }
}