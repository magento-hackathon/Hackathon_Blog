<?php

namespace Hackathon\Blog\Api;

interface BlogpostRepositoryInterface {

	/**
	 * Create Blog post
	 * @param \Hackathon\Blog\Api\Data\BlogpostInterface $blogpost
	 * @return \Hackathon\Blog\Api\Data\BlogpostInterface
	 */
	public function save(\Hackathon\Blog\Api\Data\BlogpostInterface $blogpost);

	/**
	 * @param int $id
	 *
	 * @return \Hackathon\Blog\Api\Data\BlogpostInterface
	 */
	public function getById(int $id);

	/**
	 * @param srtring $slug
	 *
	 * @return \Hackathon\Blog\Api\Data\BlogpostInterface
	 */
	public function getBySlug(srtring $slug);

	/**
	 * @param int $id
	 *
	 * @return bool Will return true if deleted
	 */
	public function deleteById(int $id);

	/**
	 * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
	 *
	 * @return \Hackathon\Blog\Api\BlogpostSearchResultsInterface
	 */
	public function getList(\Magento\Framework\Api\SearchCriteria $searchCriteria);
}