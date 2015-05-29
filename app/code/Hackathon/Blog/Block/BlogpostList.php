<?php

namespace Hackathon\Blog\Block;

class BlogpostList extends \Magento\Framework\View\Element\Template
{
    private $_repositoryInterface = null;
    private $_searchCriteriaBuilder = null;

    /**
     * Constructor
     *
     * @param Template\Context $context
     * @param array $data
     */
    public function __construct(\Magento\Framework\View\Element\Template\Context $context,
                                \Hackathon\Blog\Api\BlogpostRepositoryInterface $repositoryInterface,
                                \Magento\Framework\Api\SearchCriteriaBuilder $searchCriteriaBuilder,
                                array $data = [])
    {
        $this->_repositoryInterface = $repositoryInterface;
        $this->_searchCriteriaBuilder = $searchCriteriaBuilder;
        parent::__construct($context, $data);
    }


    /**
     * Get list of sections for invalidation
     *
     * @return array
     */
    public function getPosts()
    {
        $this->_searchCriteriaBuilder->setCurrentPage(1);
        $this->_searchCriteriaBuilder->setPageSize(10);
        $searchCriteria = $this->_searchCriteriaBuilder->create();

        return $this->_repositoryInterface->getList($searchCriteria);
    }
}
