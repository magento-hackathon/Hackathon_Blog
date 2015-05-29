<?php

namespace Hackathon\Blog\Model\Resource\Blogpost;

class Collection extends \Magento\Framework\Model\Resource\Db\Collection\AbstractCollection {

	protected function _construct() {
		$this->_init('Hackathon\Blog\Model\Blogpost', 'Hackathon\Blog\Model\Resource\Blogpost');
	}


}