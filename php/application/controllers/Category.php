<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class Category extends CI_Controller {
	public function __construct() {
		parent::__construct ();
		$this->load->helper ( 'url' );
	}
	public function index() {
	}
	public function lists($categoryId, $categoryTitle = false) {
		$latestArticles = file_get_contents ( API_PATH . 'getSiteContents/' . $categoryId . '/1/1/' . POSTS_PER_PAGE . '/all/true', 0, null, null );
		$data ['articleList'] = json_decode ( $latestArticles, true );
		
		$title = $categoryTitle;
		$description = "Category";
		
		$data ['currentCategory'] = $categoryId;
		$data ['currentAuthor'] = 'all';
		
		$data ['categoryTitle'] = $categoryTitle;
		
		require_once (APPPATH . 'controllers/Welcome.php');
		$aObj = new Welcome (); // create object
		$aObj->header ( $title, $description ); // call function
		
		$authors = file_get_contents ( API_PATH . 'getGenericContents/users', 0, null, null );
		$data ['authors'] = json_decode ( $authors, true );
		
		$this->load->view ( 'categoryList', $data );
	}
}
