<?php

namespace Hackathon\Blog\Model;

use Hackathon\Blog\Api\Data;
use Magento\Framework\Api\SearchCriteria;
use Magento\Framework\Api\Search\FilterGroup;
use Magento\Framework\Exception\InputException;
use Hackathon\Blog\Model\Resource\Blogpost\Collection as BlogpostCollection;

class BlogpostRepository implements \Hackathon\Blog\Api\BlogpostRepositoryInterface {

	protected $blogpostCollection;
	protected $blogpostFactory;
	protected $storeManager;
	protected $searchResultsDataFactory;

	protected $blogpostsById                    = array();
	protected $blogpostsBySlug                  = array();

	public function __construct(
		\Hackathon\Blog\Model\BlogpostFactory $blogpostFactory,
		\Hackathon\Blog\Model\Resource\Blogpost\Collection $blogpostCollection,
		\Magento\Store\Model\StoreManagerInterface $storeManager,
		\Hackathon\Blog\Api\Data\BlogpostSearchResultsInterfaceFactory $searchResultsDataFactory
	) {
		$this->blogpostFactory                  = $blogpostFactory;
		$this->blogpostCollection               = $blogpostCollection;
		$this->storeManager                     = $storeManager;
		$this->searchResultsDataFactory         = $searchResultsDataFactory;
	}
	/**
	 * Create Blog post
	 *
	 * @param \Hackathon\Blog\Api\Data\BlogpostInterface $blogpost
	 *
	 * @return \Hackathon\Blog\Api\Data\BlogpostInterface
	 */
	public function save( \Hackathon\Blog\Api\Data\BlogpostInterface $blogpost ) {
		$blogpost->save();
		unset($this->blogpostsById[$blogpost->getId()]);
		unset($this->blogpostsBySlug[$blogpost->getSlug()]);
	}

	/**
	 * @param int $id
	 *
	 * @return \Hackathon\Blog\Api\Data\BlogpostInterface
	 */
	public function getById( $id ) {
		if(!isset($this->blogpostsById[$id])) {
			$blogpost                       = $this->loadBlogpost("load", Blogpost::ID_FIELD, $id);
			$slug                           = $blogpost->getSlug();
			$this->blogpostsById[$id]       = $blogpost;
			$this->blogpostsBySlug[$slug]   = $blogpost;
		}
		return $this->blogpostsById[$id];
	}

	/**
	 * @param srtring $slug
	 *
	 * @return \Hackathon\Blog\Api\Data\BlogpostInterface
	 */
	public function getBySlug( $slug ) {
		if(!isset($this->blogpostsBySlug[$slug])) {
			$blogpost                       = $this->loadBlogpost("load", "slug", Blogpost::SLUG, $slug);
			$id                             = $blogpost->getId();
			$this->blogpostsById[$id]       = $blogpost;
			$this->blogpostsBySlug[$slug]   = $blogpost;
		}
		return $this->blogpostsBySlug[$slug];
	}

	/**
	 * @param $loadMethod
	 * @param $loadField
	 * @param $identifier
	 *
	 * @return \Hackathon\Blog\Api\Data\BlogpostInterface
	 */
	protected function loadBlogpost($loadMethod, $loadField, $identifier) {
		$blogpost           = $this->blogpostFactory->create();
		$blogpost->setStoreId($this->storeManager->getStore()->getId())->$loadMethod($identifier, $loadField);
		if(!$blogpost->getId()) {
			throw NoSuchEntityException::singleField($loadField, $identifier);
		}
		return $blogpost;
	}

	/**
	 * @param Data\BlogpostInterface $blogpost
	 *
	 * @return bool
	 */
	public function delete( \Hackathon\Blog\Api\Data\BlogpostInterface $blogpost ) {
		if($blogpost->getId()) {
			$blogpost->delete();
			$slug       = $blogpost->getSlug();
			unset($this->blogpostsById[$id]);
			unset($this->blogpostsBySlug[$slug]);
			return true;
		}
		return false;
	}


	/**
	 * @param int $id
	 *
	 * @return bool Will return true if deleted
	 */
	public function deleteById( $id ) {
		$blogpost       = $this->getById($id);
		return $this->delete($blogpost);
	}

	/**
	 * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
	 *
	 * @return \Hackathon\Blog\Api\BlogpostSearchResultsInterface
	 */
	public function getList( \Magento\Framework\Api\SearchCriteria $searchCriteria ) {
		$searchData         = $this->searchResultsDataFactory->create();
		$searchData->setSearchCriteria($searchCriteria);

		foreach ($searchCriteria->getFilterGroups() as $group) {
			$this->addFilterGroupToCollection($group, $this->blogpostCollection);
		}

		$searchData->setTotalCount($this->blogpostCollection->getSize());
		$sortOrders = $searchCriteria->getSortOrders();
		if ($sortOrders) {
			foreach ($sortOrders as $sortOrder) {
				$this->blogpostCollection->addOrder(
					$sortOrder->getField(),
					$sortOrder->getDirection() == SearchCriteria::SORT_ASC ? 'ASC' : 'DESC'
				);
			}
		}
		$this->blogpostCollection->setCurPage($searchCriteria->getCurrentPage());
		$this->blogpostCollection->setPageSize($searchCriteria->getPageSize());

		$searchData->setItems($this->blogpostCollection->getItems());

		return $searchData;
	}

	/**
	 * Adds a specified filter group to the specified blogpost collection.
	 *
	 * @param FilterGroup $filterGroup The filter group.
	 * @param BlogpostCollection $collection The blogpost collection.
	 * @return void
	 * @throws InputException The specified filter group or blogpost collection does not exist.
	 */
	protected function addFilterGroupToCollection(FilterGroup $filterGroup, BlogpostCollection $collection) {
		$fields = [];
		$conditions = [];
		foreach ($filterGroup->getFilters() as $filter) {
			$fields[] = $filter->getField();
			$condition = $filter->getConditionType() ? $filter->getConditionType() : 'eq';
			$conditions[] = [$condition => $filter->getValue()];
		}
		if ($fields) {
			$collection->addFieldToFilter($fields, $conditions);
		}
	}


}