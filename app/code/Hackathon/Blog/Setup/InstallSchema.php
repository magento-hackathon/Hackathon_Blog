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

        /**
         * Create table 'blog_post'
         * int blogpost_id +
         * string title +
         * string content +
         * string slug +
         * string status         (publish 1 | scheduled 2 | draft 3 | review 4) +-
         * string keywords +
         * string excerpt +
         * string postdate +
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
        );
        $installer->getConnection()->createTable($table);

    }

}