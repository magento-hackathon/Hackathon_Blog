<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 5/29/15
 * Time: 12:26 PM
 */

namespace Hackathon\Blog\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

/**
 * @codeCoverageIgnore
 */
class InstallSchema implements InstallSchemaInterface
{
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;

        $installer->startSetup();

        /**
         * Create table 'blog_post_status'
         */
        $table = $installer->getConnection()
            ->newTable($installer->getTable('blog_post_status'))
            ->addColumn(
                'status_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
                null,
                ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
                'Status id'
            )
            ->addColumn(
                'status_code',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                32,
                ['nullable' => false],
                'Status code'
            )
            ->setComment('Blogpost statuses');


        $installer->getConnection()->createTable($table);

        /**
         * Create table 'blog_post'
         */

        $table = $installer->getConnection()->newTable(
            $installer->getTable('blog_post')
        )->addColumn(
            'blogpost_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
            'Blog Post Id'
        )->addColumn(
            'title',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            ['nullable' => false],
            'Post Title'
        )->addColumn(
            'excerpt',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            '64k',
            ['nullable' => false],
            'Post excerpt'
        )->addColumn(
            'content',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            '64k',
            ['nullable' => false],
            'Post content'
        )->addColumn(
            'slug',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            ['nullable' => false],
            'Post URL Key'
        )->addColumn(
            'status',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            32,
            [],
            'Post Status'
        )->addColumn(
            'postdate',
            \Magento\Framework\DB\Ddl\Table::TYPE_DATETIME,
            null,
            [],
            'Post create date'
        )
        //
        ->addColumn(
            'status_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
            null,
            ['unsigned' => true, 'nullable' => false, 'default' => '0'],
            'Status code id'
        )
        ->addIndex(
            $installer->getIdxName('blog_post', ['blogpost_id']),
            ['blogpost_id']
        )
        ->addIndex(
            $installer->getIdxName('blog_post', ['status_id']),
            ['status_id']
        )
        ->addForeignKey(
            $installer->getFkName('blog_post', 'status_id', 'blog_post_status', 'status_id'),
            'status_id',
            $installer->getTable('blog_post_status'),
            'status_id',
            \Magento\Framework\DB\Ddl\Table::ACTION_NO_ACTION
        )
        ;
        $installer->getConnection()->createTable($table);

        $setup->endSetup();

    }

}