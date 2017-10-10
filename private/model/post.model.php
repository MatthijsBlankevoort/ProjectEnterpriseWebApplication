<?php
require_once 'private/etc/config.php';
	class PostModel{
		private $db_user = 'root';
		private $db_pass = '';
		private $db_host = '127.0.0.1';
		private $db_name = 'ewa';
		private $db;

		public function __construct() {
			$this->db = new PDO('mysql:host='.$this->db_host.';dbname='.$this->db_name, $this->db_user, $this->db_pass);

		}

		public function create($data){
			try {
				$insertQuery = $this->db->prepare("
            INSERT INTO
              post (
                author_id,
                title,
                content
              ) VALUES (
              	'" ."'
                '" . 2 . "',
                '" . $data['title'] . "',
                '" . $data['content'] . "'
              )");



				return $insertQuery->execute();
			} catch( Exception $e) {
				throw new Exception($e->getMessage());
			}

		}

		public function readAllPost(){

		}

		public function readPost($id){

		}

		public function updatePost($id){

		}

		public function deletePost($id){

		}



	}

?>