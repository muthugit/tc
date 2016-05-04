<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class Welcome extends CI_Controller {
	public function __construct() {
		parent::__construct ();
		$this->load->helper ( 'url' );
	}
	public function index() {
		$latestArticles = file_get_contents ( 'http://128.199.93.125:9991/getSiteContents/any/1/1/' . POSTS_PER_PAGE . '/all/true', 0, null, null );
		$data ['articleList'] = json_decode ( $latestArticles, true );
		
		$authors = file_get_contents ( 'http://128.199.93.125:9991/getGenericContents/users', 0, null, null );
		$data ['authors'] = json_decode ( $authors, true );
		
		$this->header ( "Home", "Home" );
		$this->load->view ( 'index', $data );
	}
	public function header($title, $description, $metaImage = false) {
		$data ['title'] = urldecode ( $title );
		if (isset ( $description ))
			$data ['description'] = $description;
		else
			$data ['description'] = $title;
		if (isset ( $metaImage )) {
			$data ['metaImage'] = $metaImage;
		}
		$categories = file_get_contents ( 'http://128.199.93.125:9991/getGenericContents/category', 0, null, null );
		$data ['categories'] = json_decode ( $categories, true );
		$this->load->view ( 'common/header', $data );
	}
}
