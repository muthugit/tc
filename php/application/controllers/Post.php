<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class Post extends CI_Controller {
	public function __construct() {
		parent::__construct ();
		$this->load->helper ( 'url' );
	}
	public function index() {
		$data ['title'] = "Home";
		$data ['description'] = "The blog for Tamil Creators";
		$latestArticles = file_get_contents ( API_PATH . 'getSiteContents/any/1/1/15/all/true', 0, null, null );
		$categories = file_get_contents ( API_PATH . 'getGenericContents/category', 0, null, null );
		$authors = file_get_contents ( API_PATH . 'getGenericContents/users', 0, null, null );
		$data ['latestArticles'] = json_decode ( $latestArticles, true );
		$data ['categories'] = json_decode ( $categories, true );
		$data ['authors'] = json_decode ( $authors, true );
		$this->load->view ( 'index', $data );
	}
	public function show($id, $title) {
		$article = file_get_contents ( API_PATH . 'fetchSingleContent/' . $id, 0, null, null );
		
		$data ['article'] = json_decode ( $article, true );
		if (isset ( $data ['article'] ['description'] ))
			$description = $data ['article'] ['description'];
		else
			$description = urldecode ( $title );
		
		$metaImage = $data ['article'] ['featureImageURL'];
		
		require_once (APPPATH . 'controllers/Welcome.php');
		$aObj = new Welcome (); // create object
		$aObj->header ( $title, $description, $metaImage ); // call function
		
		$this->load->view ( 'singlePost', $data );
	}
	public function page($page, $category = false, $author = false) {
		if ($page > 1)
			$from = 1 + (($page - 1) * POSTS_PER_PAGE);
		else
			$from = 1;
		if (! isset ( $category ) || $category == "")
			$category = "any";
		if (! isset ( $author ) || $author == "")
			$author = "all";
		
		$latestArticles = file_get_contents ( API_PATH . 'getSiteContents/' . $category . '/1/' . $from . '/' . POSTS_PER_PAGE . '/' . $author . '/true', 0, null, null );
		$data ['articleList'] = json_decode ( $latestArticles, true );
		$this->load->view ( 'templates/articleList', $data );
	}
}
