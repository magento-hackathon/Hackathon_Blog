<?php

namespace Hackathon\Blog\Api\Data;

interface BlogpostSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{
	/**
	 * Get post list.
	 *
	 * @return \Hackathon\Blog\Api\Data\BlogpostInterface[]
	 */
	public function getItems();

	/**
	 * Set items list.
	 *
	 * @param \Hackathon\Blog\Api\Data\BlogpostInterface[] $items
	 * @return $this
	 */
	public function setItems(array $items = null);
}