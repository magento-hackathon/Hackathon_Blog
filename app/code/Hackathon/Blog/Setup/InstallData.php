<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 5/29/15
 * Time: 1:11 PM
 */
namespace Hackathon\Blog\Setup;

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
        $installer = $setup;

        //(publish | scheduled | draft | review)
        $blogpostStatuses = [
            \Hackathon\Blog\Model\Blogpost::STATUS_PUBLISH => 'Publish',
            \Hackathon\Blog\Model\Blogpost::STATUS_SHEDULED => 'Sheduled',
            \Hackathon\Blog\Model\Blogpost::STATUS_DRAFT => 'Draft',
            \Hackathon\Blog\Model\Blogpost::STATUS_REVIEW => 'Review',
        ];



        foreach ($blogpostStatuses as $k => $v) {
            $bind = ['status_id' => $k, 'status_code' => $v];
            $installer->getConnection()->insertForce($installer->getTable('blog_post_status'), $bind);
        }

    }

}
