<?php

namespace Brander\ContactUs\Setup;

use \Magento\Framework\DB\Ddl\Table;
use \Magento\Framework\Setup\SchemaSetupInterface;
use \Magento\Framework\Setup\InstallSchemaInterface;
use \Magento\Framework\Setup\ModuleContextInterface;

/**
 * Class InstallSchema
 *
 * @package Brander/ContactUs/Setup
 */
class InstallSchema implements InstallSchemaInterface
{
    /**
     * Install contact us table
     *
     * @access  public
     * @param   SchemaSetupInterface    $setup
     * @param   ModuleContextInterface  $context
     * @return  void
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();
        $tableName = $setup->getTable('brander_contact_us');
        if ($setup->getConnection()->isTableExists($tableName) != true) {
            $table = $setup->getConnection()->newTable($tableName)
                ->addColumn(
                    'id',
                    Table::TYPE_INTEGER,
                    null,
                    [
                        'identity' => true,
                        'unsigned' => true,
                        'nullable' => false,
                        'primary'  => true
                    ],
                    'ID'
                )
                ->addColumn(
                    'name',
                    Table::TYPE_TEXT,
                    35,
                    ['nullable' => false],
                    'Client Name'
                )
                ->addColumn(
                    'email',
                    Table::TYPE_TEXT,
                    35,
                    ['nullable' => false],
                    'Client Email'
                )
                ->addColumn(
                    'question',
                    Table::TYPE_TEXT,
                    255,
                    ['nullable' => false],
                    'Client Question'
                )
                ->addColumn(
                    'created_at',
                    Table::TYPE_TIMESTAMP,
                    null,
                    [   'nullable' => false,
                        'default'  => Table::TIMESTAMP_INIT
                    ],
                    'Created At'
                )
                ->addColumn(
                    'updated_at',
                    Table::TYPE_TIMESTAMP,
                    null,
                    [
                        'nullable' => false,
                        'default' => Table::TIMESTAMP_INIT_UPDATE
                    ],
                    'Updated At')
                ->setComment('Brander Contact Us');
            $setup->getConnection()->createTable($table);
        }

        $setup->endSetup();
    }
}