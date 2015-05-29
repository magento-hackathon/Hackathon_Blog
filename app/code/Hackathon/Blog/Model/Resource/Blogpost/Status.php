<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 5/29/15
 * Time: 1:27 PM
 */
namespace Hackathon\Blog\Model\Resource\Blogpost;

/**
 * Review status resource model
 *
 * @author      Magento Core Team <core@magentocommerce.com>
 */
class Status extends \Magento\Framework\Model\Resource\Db\AbstractDb
{
    /**
     * Resource status model initialization
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('blogpost_status', 'status_id');
    }
}