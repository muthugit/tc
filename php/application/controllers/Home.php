<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class Home extends CI_Controller {
	
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * http://example.com/index.php/welcome
	 * - or -
	 * http://example.com/index.php/welcome/index
	 * - or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 *
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index() {
	}
	public function page($page) {
		$data ['title'] = "Home";
		$data ['description'] = "The blog for Tamil Creators";
		if ($page > 1)
			$from = 1 + (($page - 1) * POSTS_PER_PAGE);
		else
			$from = 1;
		
		require_once (APPPATH . 'controllers/Welcome.php');
		$aObj = new Welcome (); // create object
		$aObj->header ( "Home", "Home" ); // call function
		
		$latestArticles = file_get_contents ( API_PATH . 'getSiteContents/any/1/' . $from . '/' . POSTS_PER_PAGE . '/all/true', 0, null, null );
		$categories = file_get_contents ( API_PATH . 'getGenericContents/category', 0, null, null );
		
		
		$authors = file_get_contents ( API_PATH . 'getGenericContents/users', 0, null, null );
		$data ['articleList'] = json_decode ( $latestArticles, true );
		$data ['categories'] = json_decode ( $categories, true );
		$data ['authors'] = json_decode ( $authors, true );
		
		$this->load->view ( 'index', $data );
	}
}
