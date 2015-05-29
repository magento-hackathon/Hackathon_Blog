<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 5/29/15
 * Time: 1:32 PM
 */
/**
 * Blogpost statuses collection
 *
 */
namespace Hackathon\Blog\Model\Resource\Blogpost\Status;

class Collection extends \Magento\Framework\Model\Resource\Db\Collection\AbstractCollection
{
    /**
     * Blogpost status table
     *
     * @var string
     */
    protected $_blogpostStatusTable;

    /**
     * Collection model initialization
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Hackathon\Blog\Model\Blogpost\Status', 'Hackathon\Blog\Model\Resource\Blogpost\Status');
    }

    /**
     * Convert items array to array for select options
     *
     * @return array
     */
    public function toOptionArray()
    {
        return parent::_toOptionArray('status_id', 'status_code');
    }
}