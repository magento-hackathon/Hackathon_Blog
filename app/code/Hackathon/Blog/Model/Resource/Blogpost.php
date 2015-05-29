<?php

namespace Hackathon\Blog\Model\Resource;

class Blogpost extends \Magento\Framework\Model\Resource\Db\AbstractDb {
	/**
	 * Resource initialization
	 *
	 * @return void
	 */
	protected function _construct() {
		$this->_init('blogpost', 'blogpost_id');
	}


}