<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class Welcome extends CI_Controller {
	public function __construct() {
		parent::__construct ();
		$this->load->helper ( 'url' );
	}
	public function index() {
		$latestArticles = file_get_contents ( API_PATH . 'getSiteContents/any/1/1/' . POSTS_PER_PAGE . '/all/false', 0, null, null );
		$data ['articleList'] = json_decode ( $latestArticles, true );
		
		$authors = file_get_contents ( API_PATH . 'getGenericContents/users', 0, null, null );
		$data ['authors'] = json_decode ( $authors, true );
		
		$data = $this->getHtmlContent ( $data, "widget-1", "widget-1" );
		$widget1Category = explode ( "|", $data ['widget-1'] ['htmlContent'] );
		if (isset ( $widget1Category [1] ))
			$data ['widget1CategoryTitle'] = trim ( $widget1Category [1] );
		if (isset ( $widget1Category [0] ) && $widget1Category [0] != null && trim ( $widget1Category [0] ) != '') {
			$widget1Articles = file_get_contents ( API_PATH . 'getSiteContents/' . trim ( $widget1Category [0] ) . '/1/1/5/all/false', 0, null, null );
			$data ['widget1ArticlesList'] = json_decode ( $widget1Articles, true );
		} else {
			$data ['widget1ArticlesList'] = "";
		}
		
		$data = $this->getHtmlContent ( $data, "widget-2", "widget-2" );
		$widget2Category = explode ( "|", $data ['widget-2'] ['htmlContent'] );
		if (isset ( $widget2Category [1] ))
			$data ['widget2CategoryTitle'] = trim ( $widget2Category [1] );
		if (isset ( $widget2Category [0] ) && $widget2Category [0] != null && trim ( $widget2Category [0] ) != '') {
			$widget2Articles = file_get_contents ( API_PATH . 'getSiteContents/' . trim ( $widget2Category [0] ) . '/1/1/5/all/false', 0, null, null );
			$data ['widget2ArticlesList'] = json_decode ( $widget2Articles, true );
		} else {
			$data ['widget2ArticlesList'] = "";
		}
		
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
		$data = $this->getHtmlContent ( $data, "top-navigation", "topNav" );
		for($i = 0; $i <= 20; $i ++)
			$data = $this->getHtmlContent ( $data, $i, "htmlContent" . $i );
		$headerContent = file_get_contents ( API_PATH . 'getHtmlBlocks/header', 0, null, null );
		if (isSet ( json_decode ( $headerContent, true )[0] ))
			$data ['header'] = json_decode ( $headerContent, true )[0];
		
		$categories = file_get_contents ( API_PATH . 'getGenericContents/category', 0, null, null );
		$data ['categories'] = json_decode ( $categories, true );
		$this->load->view ( 'common/header', $data );
	}
	public function getHtmlContent($data, $whatToGet, $contentName) {
		$htmlContent = file_get_contents ( API_PATH . 'getHtmlBlocks/' . $whatToGet, 0, null, null );
		if (isSet ( json_decode ( $htmlContent, true )[0] ))
			$data [$contentName] = json_decode ( $htmlContent, true )[0];
		return $data;
	}
}
