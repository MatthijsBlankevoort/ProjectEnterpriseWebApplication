<?php
require_once 'private/model/post.model.php';
class PostController{
	private $postData;
	private $model;
	/**
	 * PostController constructor.
	 *
	 * @param $data
	 */
	public function __construct($data) {
		$this->setPostData($data);
		$this->model = new PostModel();
	}

	/**
	 * @return mixed
	 */
	public function getPostData() {
		return $this->postData;
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
	public function handleData(){
		$title = $this->postData['title'];
		$content = $this->postData['content'];

		$title = htmlspecialchars($title);
		$content = htmlspecialchars($content);

		trim(strip_tags($title));
		trim(strip_tags($content));

		$data = array(
			'title' => $title,
			'content' => $content
		);

		$this->model->create($data);
	}
}
