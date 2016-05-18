<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class Page extends CI_Controller {
	public function __construct() {
		parent::__construct ();
		$this->load->helper ( 'url' );
	}
	public function contactUs() {
		$title = "Contact us";
		$description = "Contact us";
		require_once (APPPATH . 'controllers/Welcome.php');
		$aObj = new Welcome (); // create object
		$aObj->header ( $title, $description ); // call function
	}
	
	public function aboutUs() {
		$title = "About us";
		$description = "About us";
		require_once (APPPATH . 'controllers/Welcome.php');
		$aObj = new Welcome (); // create object
		$aObj->header ( $title, $description ); // call function
	}
}