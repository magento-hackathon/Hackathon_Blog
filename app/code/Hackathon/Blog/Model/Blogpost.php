<?php

namespace Hackathon\Blog\Model;

use \Hackathon\Blog\Api\Data\BlogpostInterface;
use Hackathon\Blog\Api\Data\int;
use Hackathon\Blog\Api\Data\string;

class Blogpost extends AbstractExtensibleModel implements BlogpostInterface {
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
	public function setId( int $id ) {
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
	public function setSlug( string $slug ) {
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
	public function setStatus( string $status ) {
		return $this->setData(self::STATUS, $status);
	}

	/**
	 * @return string
	 */
	public function getTitle() {
		return $this->_getData(self::TITLE);
	}

	/**
	 * @param string|string $title
	 *
	 * @return $this
	 */
	public function setTitle( string $title ) {
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
	public function setContent( string $content ) {
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
	public function setPostdate( string $postdate ) {
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
	public function setKeywords( string $keywords ) {
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
	public function setExcerpt( string $excerpt ) {
		return $this->setData(self::EXCERPT, $excerpt);
	}


}