<?php

namespace Hackathon\Blog\Api\Data;

interface BlogpostSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface {

	/**
	 * @return \Hackathon\Blog\Api\Data\BlogpostInterface[]
	 */
	public function getItems();

	/**
	 * @param \Hackathon\Blog\Api\Data\BlogpostInterface[] $items
	 *
	 * @return $this
	 */
	public function setItems(array $items = null);
}