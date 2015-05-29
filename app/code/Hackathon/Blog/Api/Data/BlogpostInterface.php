<?php

namespace Hackathon\Blog\Api\Data;

interface BlogpostInterface {

	const ID_FIELD      = "blogpost_id";
	const SLUG          = "slug";
	const TITLE         = "title";
	const STATUS        = "status";
	const CONTENT       = "content";
	const POSTDATE      = "postdate";
	const EXCERPT       = "excerpt";
	const KEYWORDS      = "keywords";

	const STATUS_PUBLISH = 1;
	const STATUS_SHEDULED = 2;
	const STATUS_DRAFT = 3;
	const STATUS_REVIEW = 4;

	/**
	 * @return int
	 */
	public function getId();

	/**
	 * @param int $id
	 * @return $this
	 */
	public function setId($value);

	/**
	 * @return string
	 */
	public function getSlug();

	/**
	 * @param string $slug
	 *
	 * @return $this
	 */
	public function setSlug($slug);

	/**
	 * @return string The current status (publish | scheduled | draft | review)
	 */
	public function getStatus();

	/**
	 * @param string $status
	 *
	 * @return $this
	 */
	public function setStatus($status);

	/**
	 * @return string
	 */
	public function getTitle();

	/**
	 * @param string|string $title
	 *
	 * @return $this
	 */
	public function setTitle($title);

	/**
	 * @return string
	 */
	public function getContent();

	/**
	 * @param string $content
	 *
	 * @return $this
	 */
	public function setContent($content);

	/**
	 * @return string
	 */
	public function getPostdate();

	/**
	 * @param string $postdate
	 *
	 * @return $this
	 */
	public function setPostdate($postdate);

	/**
	 * @return string
	 */
	public function getKeywords();

	/**
	 * @param string $keywords
	 *
	 * @return $this
	 */
	public function setKeywords($keywords);

	/**
	 * @return string
	 */
	public function getExcerpt();

	/**
	 * @param string $excerpt
	 *
	 * @return $this
	 */
	public function setExcerpt($excerpt);
}