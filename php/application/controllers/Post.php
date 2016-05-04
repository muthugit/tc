<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class Post extends CI_Controller {
	public function __construct() {
		parent::__construct ();
		$this->load->helper ( 'url' );
	}
	
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
		$data ['title'] = "Home";
		$data ['description'] = "The blog for Tamil Creators";
		$latestArticles = file_get_contents ( 'http://128.199.93.125:9991/getSiteContents/any/1/1/15/all/true', 0, null, null );
		$categories = file_get_contents ( 'http://128.199.93.125:9991/getGenericContents/category', 0, null, null );
		$authors = file_get_contents ( 'http://128.199.93.125:9991/getGenericContents/users', 0, null, null );
		$data ['latestArticles'] = json_decode ( $latestArticles, true );
		$data ['categories'] = json_decode ( $categories, true );
		$data ['authors'] = json_decode ( $authors, true );
		$this->load->view ( 'index', $data );
	}
	public function show($id, $title) {
		$article = file_get_contents ( 'http://128.199.93.125:9991/fetchSingleContent/' . $id, 0, null, null );
		
		$data ['article'] = json_decode ( $article, true );
		if (isset ( $data ['article'] ['description'] ))
			$description = $data ['article'] ['description'];
		else
			$description = urldecode ( $title );
		
		$metaImage = "http://hellboundbloggers.com/wp-content/uploads/2015/01/Reducing-Costs-When-Starting-A-New-Business.jpg";
		
		require_once (APPPATH . 'controllers/Welcome.php');
		$aObj = new Welcome (); // create object
		$aObj->header ( $title, $description, $metaImage ); // call function
		
		$this->load->view ( 'singlePost', $data );
	}
}
