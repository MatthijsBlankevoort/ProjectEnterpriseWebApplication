<?php
require_once 'private/model/post.model.php';
class PostController{
	private $postData;
	private $model;

	/**
	 * PostController constructor.
	 */
	public function __construct() {
		$this->model = new PostModel();
	}

	/**
	 * @return mixed
	 */
	public function getPostData() {
		return $this->postData;
	}


	public function getCategories() {
		return $this->model->getCategories();
	}

	public function getPosts(){
		return $this->model->readAllPost();
	}

	/**
	 * @param $postData
	 */
	public function setPostData( $postData ) {
		$this->postData = $postData;
	}

	/**
	 * This method will go through the steps of checking and sanitizing data
	 * After that it will fire the method to insert the data in the database
	 */
	public function handleData($postData){
		$this->setPostData($postData);

		$title = $this->postData['title'];
		$category = $this->postData['category'];
		$content = $this->postData['content'];
		$postType = $this->postData['postType'];

		$title = htmlspecialchars($title);
		$category = htmlspecialchars($category);
		$content  = htmlspecialchars($content);
		$postType = htmlspecialchars($postType);

		trim(strip_tags($title));
		trim(strip_tags($category));
		trim(strip_tags($content));
		trim(strip_tags($postType));

		$data = array(
			'title' => $title,
			'category' => $category,
			'content' => $content,
			'postType' => $postType
		);

		$this->model->create($data);
		header('location: /');
	}
}
