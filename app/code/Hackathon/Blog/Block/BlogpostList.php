<?php

namespace Hackathon\Blog\Block;

class BlogpostList extends \Magento\Framework\View\Element\Template
{
    private $_repositoryInterface = null;

    /**
     * Constructor
     *
     * @param Template\Context $context
     * @param array $data
     */
    public function __construct(\Magento\Framework\View\Element\Template\Context $context,
                                \Hackathon\Blog\Model\BlogpostRepository $repositoryInterface,
                                array $data = [])
    {
        $this->_repositoryInterface = $repositoryInterface;
        parent::__construct($context, $data);
    }


    /**
     * Get list of sections for invalidation
     *
     * @return array
     */
    public function getPosts()
    {
        return $this->_repositoryInterface;
    }
}
