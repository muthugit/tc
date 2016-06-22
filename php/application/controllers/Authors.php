<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class Authors extends CI_Controller {
	public function __construct() {
		parent::__construct ();
		$this->load->helper ( 'url' );
	}
	public function index() {
		$data ['title'] = "Authors";
		$data ['description'] = "The blog for Tamil Creators";
		$authors = file_get_contents ( API_PATH . 'getGenericContents/users', 0, null, null );
		$data ['authors'] = json_decode ( $authors, true );
		
		
		require_once (APPPATH . 'controllers/Welcome.php');
		$aObj = new Welcome (); // create object
		$aObj->header ( $data ['title'], $data ['description'] ); // call function
		
		$this->load->view ( 'authorsList', $data );
	}
}
