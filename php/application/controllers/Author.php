<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class Author extends CI_Controller {
	public function __construct() {
		parent::__construct ();
		$this->load->helper ( 'url' );
	}
	public function index() {
	}
	public function show($id) {
		$metaImage = "";
		$author = file_get_contents ( API_PATH . 'getUserInfo/' . $id, 0, null, null );
		
		$author = json_decode ( $author, true );
		$data ['author'] = $author;
		
		$description = "Email: " . $data ['author'] ['email'];
		if (isset ( $data ['author'] ['profilePic'] )) {
			$metaImage = $data ['author'] ['profilePic'];
		} else {
			$data ['author'] ['profilePic'] = 'profileNoImage.jpg';
		}
		$title = $data ['author'] ['name'];
		
		$data ['currentAuthor'] = $data ['author'] ['objectId'];
		
		$latestArticles = file_get_contents ( API_PATH . 'getSiteContents/any/1/1/' . POSTS_PER_PAGE . '/' . $data ['author'] ['objectId'] . '/true', 0, null, null );
		$data ['articleList'] = json_decode ( $latestArticles, true );
		$data ['currentCategory'] = "any";
		
		require_once (APPPATH . 'controllers/Welcome.php');
		$aObj = new Welcome (); // create object
		$aObj->header ( $title, $description, $metaImage ); // call function
		
		$this->load->view ( 'templates/authorPage', $data );
	}
	function _remap($id) {
		$this->show ( $id, 'df' );
	}
}
