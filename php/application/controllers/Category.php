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
		$latestArticles = file_get_contents ( 'http://128.199.93.125:9991/getSiteContents/' . $categoryId . '/1/1/' . POSTS_PER_PAGE . '/all/true', 0, null, null );
		$data ['articleList'] = json_decode ( $latestArticles, true );
		
		$title = $categoryTitle;
		$description = "Category";
		
		$data ['currentCategory'] = $categoryId;
		
		require_once (APPPATH . 'controllers/Welcome.php');
		$aObj = new Welcome (); // create object
		$aObj->header ( $title, $description ); // call function
		
		$authors = file_get_contents ( 'http://128.199.93.125:9991/getGenericContents/users', 0, null, null );
		$data ['authors'] = json_decode ( $authors, true );
		
		$this->load->view ( 'index', $data );
	}
}
