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
		
		$data ['widget3'] = $this->createWidgetContents ( "widget-3", "#f0efef", "black", "no" );
		$data ['widget4'] = $this->createWidgetContents ( "widget-4", "grey", "white", "no" );
		$data ['widget5'] = $this->createWidgetContents ( "widget-5", "grey", "white", "no" );
		$data ['widget6'] = $this->createWidgetContents ( "widget-6", "grey", "white", "no" );
		$data ['widget7'] = $this->createWidgetContents ( "widget-7", "grey", "white", "no" );
		$data ['widget8'] = $this->createWidgetContents ( "widget-8", "grey", "white", "no" );
		$data ['widget9'] = $this->createWidgetContents ( "widget-9", "grey", "white", "no" );
		
		$data ['widget9'] = $this->createWidgetContents ( "widget-9", "grey", "white", "no", "2" );
		
		$this->header ( "Home", "Home" );
		$this->load->view ( 'index', $data );
	}
	public function createWidgetContents($widgetName, $backgroundColor, $titleColor, $isImage, $typeOfContent = false) {
		$categoryInfo = "";
		if (! isset ( $typeOfContent ) || $typeOfContent == '') {
			$typeOfContent = 1;
		}
		$htmlContent = file_get_contents ( API_PATH . 'getHtmlBlocks/' . $widgetName, 0, null, null );
		if (isset ( $htmlContent )) {
			$categoryInfo ['backgroundColor'] = $backgroundColor;
			$categoryInfo ['titleColor'] = $titleColor;
			$categoryInfo ['isImage'] = $isImage;
			if (isSet ( json_decode ( $htmlContent, true )[0] )) {
				$widgetContent = json_decode ( $htmlContent, true )[0];
				
				$widgetContentArray = explode ( "|", $widgetContent ['htmlContent'] );
				if (isset ( $widgetContentArray )) {
					if (isset ( $widgetContentArray [1] ))
						$categoryInfo ['widgetCategoryTitle'] = trim ( $widgetContentArray [1] );
					else
						$categoryInfo ['widgetCategoryTitle'] = "";
				}
				if (isset ( $widgetContentArray [2] )) {
					$categoryInfo ['backgroundColor'] = $widgetContentArray [2];
				}
				if (isset ( $widgetContentArray [3] )) {
					$categoryInfo ['titleColor'] = $widgetContentArray [3];
				}
				
				$categoryInfo ['categoryUrl'] = "category/lists/" . trim ( $widgetContentArray [0] ) . "/" . $categoryInfo ['widgetCategoryTitle'];
				if (isset ( $widgetContentArray [0] ) && $widgetContentArray [0] != null && trim ( $widgetContentArray [0] ) != '') {
					$widgetArticles = file_get_contents ( API_PATH . 'getSiteContents/' . trim ( $widgetContentArray [0] ) . '/' . $typeOfContent . '/1/5/all/false', 0, null, null );
					$categoryInfo ['widgetArticlesList'] = json_decode ( $widgetArticles, true );
				} else {
					$categoryInfo ['widgetArticlesList'] = "";
				}
			}
		}
		return $categoryInfo;
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
		
		$data ['widget1'] = $this->createWidgetContents ( "widget-1", "red", "white", "yes" );
		$data ['widget2'] = $this->createWidgetContents ( "widget-2", "yellow", "black", "no" );
		
		$this->load->view ( 'common/header', $data );
	}
	public function getHtmlContent($data, $whatToGet, $contentName) {
		$htmlContent = file_get_contents ( API_PATH . 'getHtmlBlocks/' . $whatToGet, 0, null, null );
		if (isSet ( json_decode ( $htmlContent, true )[0] ))
			$data [$contentName] = json_decode ( $htmlContent, true )[0];
		return $data;
	}
}
