<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of upload_video
 *
 * @author ariel
 */
ini_set("include_path", ini_get('include_path') . ':' . realpath("./ZendGdata-1.11.11/library"));
require_once 'Zend/Loader.php';

class upload_video extends CI_Controller {

    public $authenticationUrl;
    public $httpClient;
    public $developer_key;
    public $application_id;
    public $yt;
    public $client_id;
    
    public function __construct() {
        parent::__construct();
        Zend_Loader::loadClass('Zend_Gdata_YouTube');
        Zend_Loader::loadClass('Zend_Gdata_ClientLogin');
        
        $this->authenticationURL = 'https://www.google.com/accounts/ClientLogin';
        $this->httpClient =
                Zend_Gdata_ClientLogin::getHttpClient(
                        $username = 'arielalvarez88@gmail.com', $password = 'D3s1gnp@tt3rns', $service = 'youtube', $client = null, $source = 'MySource', // a short string identifying your application
                        $loginToken   = null, $loginCaptcha = null, $this->authenticationURL);



        $this->developer_key = "AI39si58bPU3fVlTrF8i4eyximJ9qMl8NMgJpUCxF1DMAIZAR-TTYUTftwkTSfx0m9D7PNXdnYDHwCxOmV-M6Kfy6lrQeePGfg";
        $this->application_id = "Propiedom";
        $user = $this->get_logged_user_or_redirect_to_please_login();

        $this->client_id = $user->name;
        // Note that this example creates an unversioned service object.
// You do not need to specify a version number to upload content
// since the upload behavior is the same for all API versions.
        $this->yt = new Zend_Gdata_YouTube($this->httpClient, $this->application_id, $this->client_id, $this->developer_key);
        $this->yt->setMajorProtocolVersion(2);
    }

    public function index() {



        
      
// create a new VideoEntry object
        $myVideoEntry = new Zend_Gdata_YouTube_VideoEntry();

        $myVideoEntry->setVideoTitle('My Test Movie');
        $myVideoEntry->setVideoDescription('My Test Movie');
// The category must be a valid YouTube category!
        $myVideoEntry->setVideoCategory('Autos');

// Set keywords. Please note that this must be a comma-separated string
// and that individual keywords cannot contain whitespace
        $myVideoEntry->SetVideoTags('cars, funny');

        $tokenHandlerUrl = 'http://gdata.youtube.com/action/GetUploadToken';
        $tokenArray = $this->yt->getFormUploadToken($myVideoEntry, $tokenHandlerUrl);
        $tokenValue = $tokenArray['token'];
        $postUrl = $tokenArray['url'];
        $video_variables["next_url"] = base_url() . "/panel/propiedades";


        $upload_video_view_variables['next_url'] = base_url() . "upload_video/response";
        $upload_video_view_variables['token'] = $tokenArray['token'];
        $upload_video_view_variables['post_url'] = $tokenArray['url'];
        ;




        $this->load->view("blocks/upload_video", $upload_video_view_variables);
    }


    
    public function handle_status($status,$youtube_video_id) {
        $videoEntry = $this->yt->getVideoEntry($youtube_video_id);
        var_dump($videoEntry);
        try {
            $control = $videoEntry->getControl();
        } catch (Zend_Gdata_App_Exception $e) {
            echo $e->getMessage();
        }
        if ($control instanceof Zend_Gdata_App_Extension_Control) {
            if ($control->getDraft() != null && $control->getDraft()->getText() == 'yes') {
                $state = $videoEntry->getVideoState();
                if ($state instanceof Zend_Gdata_YouTube_Extension_State) {
                    print 'Upload status: ' . $state->getName() . ' ' . $state->getText();
                } else {
                    print "Not able to retrieve the video status information yet. Please try again shortly.\n";
                }
            }
        }
    }

    public function response() {
        $status = $_GET['status'];
        $video_id = $_GET['id'];

$this->handle_status($status, $video_id);

//        $video_entry = $this->yt->getVideoEntry($video_id);
//        
//
//        $view_variables['video_url'] = $video_entry->getFlashPlayerUrl();
//        
//        
//        var_dump($view_variables);
//        $this->load->view("blocks/upload_video",$view_variables);
//        
        
        }

}

?>
