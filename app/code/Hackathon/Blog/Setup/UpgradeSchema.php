<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 5/29/15
 * Time: 3:35 PM
 */

namespace Hackathon\Blog\Setup;

use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

/**
 * @codeCoverageIgnore
 */
class UpgradeSchema implements UpgradeSchemaInterface
{
    /**
     * {@inheritdoc}
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     * @SuppressWarnings(PHPMD.NPathComplexity)
     */
    public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;
        $connection = $installer->getConnection();

        if (version_compare($context->getVersion(), '0.0.1') >= 0) {
            $installer = $setup;
            $table = $setup->getTable($installer->getTable('blog_post'));

            $setup->getConnection()
                ->addColumn(
                    $table,
                    'keywords',
                    [
                        'type' => Table::TYPE_TEXT,
                        'after' => 'content',
                        'comment' => 'Keywords'
                    ]
                );

        }
    }
}