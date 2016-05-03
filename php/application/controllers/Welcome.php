<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class Welcome extends CI_Controller {
	
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
		$latestArticles = file_get_contents ( 'http://128.199.93.125:9991/getSiteContents/any/1/1/15/all/true', 0, null, null );
		$categories = file_get_contents ( 'http://128.199.93.125:9991/getGenericContents/category', 0, null, null );
		$authors = file_get_contents ( 'http://128.199.93.125:9991/getGenericContents/users', 0, null, null );
		$data ['latestArticles'] = json_decode ( $latestArticles, true );
		$data ['categories'] = json_decode ( $categories, true );
		$data ['authors'] = json_decode ( $authors, true );
		$this->load->view ( 'index', $data );
	}
	
}
