<?php

namespace Hackathon\Blog\Model;

use \Hackathon\Blog\Api\Data\BlogpostInterface;

class Blogpost extends \Magento\Framework\Model\AbstractExtensibleModel implements BlogpostInterface {

	protected function _construct() {
		$this->_init("Hackathon\Blog\Model\Resource\Blogpost");
	}

	/**
	 * @return int
	 */
	public function getId() {
		return $this->_getData(self::ID_FIELD);
	}

	/**
	 * @param int $id
	 *
	 * @return $this
	 */
	public function setId( $id ) {
		return $this->setData(self::ID_FIELD, $id);
	}


	/**
	 * @return string
	 */
	public function getSlug() {
		return $this->_getData(self::SLUG);
	}

	/**
	 * @param string $slug
	 *
	 * @return $this
	 */
	public function setSlug( $slug ) {
		return $this->setData(self::SLUG, $slug);
	}

	/**
	 * @return string The current status (publish | scheduled | draft | review)
	 */
	public function getStatus() {
		return $this->_getData(self::STATUS);
	}

	/**
	 * @param string $status
	 *
	 * @return $this
	 */
	public function setStatus( $status ) {
		return $this->setData(self::STATUS, $status);
	}

	/**
	 * @return string
	 */
	public function getTitle() {
		return $this->_getData(self::TITLE);
	}

	/**
	 * @param string $title
	 *
	 * @return $this
	 */
	public function setTitle( $title ) {
		return $this->setData(self::TITLE, $title);
	}

	/**
	 * @return string
	 */
	public function getContent() {
		return $this->_getData(self::CONTENT);
	}

	/**
	 * @param string $content
	 *
	 * @return $this
	 */
	public function setContent( $content ) {
		return $this->setData(self::CONTENT, $content);
	}

	/**
	 * @return string
	 */
	public function getPostdate() {
		return $this->_getData(self::POSTDATE);
	}

	/**
	 * @param string $postdate
	 *
	 * @return $this
	 */
	public function setPostdate( $postdate ) {
		return $this->setData(self::POSTDATE, $postdate);
	}

	/**
	 * @return string
	 */
	public function getKeywords() {
		return $this->_getData(self::KEYWORDS);
	}

	/**
	 * @param string $keywords
	 *
	 * @return $this
	 */
	public function setKeywords( $keywords ) {
		return $this->setData(self::KEYWORDS, $keywords);
	}

	/**
	 * @return string
	 */
	public function getExcerpt() {
		return $this->_getData(self::EXCERPT);
	}

	/**
	 * @param string $excerpt
	 *
	 * @return $this
	 */
	public function setExcerpt( $excerpt ) {
		return $this->setData(self::EXCERPT, $excerpt);
	}


}