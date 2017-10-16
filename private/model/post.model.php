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
                categorie,
                content,
                post_type
              ) VALUES (
                :authorId,
                :title,
                :category,
                :content,
                :postType
              )");

				$kaas = '2';
				$insertQuery->bindValue(':authorId', $kaas, PDO::PARAM_STR);
				$insertQuery->bindValue(':title', $data['title'], PDO::PARAM_STR);
				$insertQuery->bindValue(':category', $data['category'], PDO::PARAM_STR);
				$insertQuery->bindValue(':content', $data['content'], PDO::PARAM_STR);
				$insertQuery->bindValue(':postType', $data['postType'], PDO::PARAM_STR);


				$test = $insertQuery->execute();
				if(!$test){
					echo '<pre>';
					print_r($insertQuery->errorInfo());
					echo '</pre>';
				}
				return $test;
			} catch( PDOException $e) {
				echo $e;
				die;
//				throw new PDOException($e->getMessage());
			}

		}

		public function readAllPost(){
			try{
				$allCategoriesQuery = $this->db->prepare("SELECT * FROM post");
				$allCategoriesQuery->execute();
				$result = $allCategoriesQuery;



				if($result->rowCount() == 0){
					echo 'er zijn nog geen categorieen beschikbaar';
				}

				return $result->fetchAll(PDO::FETCH_ASSOC);

			} catch ( Exception $e){
				throw new Exception($e->getMessage());
			}
		}

		public function readPost($id){

		}

		public function updatePost($id){

		}

		public function deletePost($id){

		}

		public function getCategories() {
			try{
				$allCategoriesQuery = $this->db->prepare("SELECT * FROM category");
				$allCategoriesQuery->execute();
				$result = $allCategoriesQuery;



				if($result->rowCount() == 0){
					echo 'er zijn nog geen categorieen beschikbaar';
				}

				return $result->fetchAll(PDO::FETCH_ASSOC);

			} catch ( Exception $e){
				throw new Exception($e->getMessage());
			}
		}

	}

?>