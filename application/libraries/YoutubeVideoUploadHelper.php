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

class YoutubeVideoUploadHelper {

    public $authenticationUrl;
    public $httpClient;
    public $developer_key;
    public $application_id;
    public $yt;
    public $client_id;
    public $flash_url;
    
    public function __construct($youtube_username,$youtube_password,$developer_key,$application_id='My_Application',$client_id='User') {
        
        Zend_Loader::loadClass('Zend_Gdata_YouTube');
        Zend_Loader::loadClass('Zend_Gdata_ClientLogin');
        
        $this->authenticationURL = 'https://www.google.com/accounts/ClientLogin';
        $this->httpClient =
                Zend_Gdata_ClientLogin::getHttpClient(
                        $youtube_username, $youtube_password, $service = 'youtube', $client = null, $source = 'MySource', // a short string identifying your application
                        $loginToken   = null, $loginCaptcha = null, $this->authenticationURL);



        
        $this->developer_key = $developer_key;
        $this->application_id = $application_id;
        $this->client_id = $client_id;
        // Note that this example creates an unversioned service object.
// You do not need to specify a version number to upload content
// since the upload behavior is the same for all API versions.
        $this->yt = new Zend_Gdata_YouTube($this->httpClient, $this->application_id, $this->client_id, $this->developer_key);
        $this->yt->setMajorProtocolVersion(2);
    }
    
    
    
    public function get_form_variables ($video_title,$video_description,$redirect_url='') {
       
        
        $video_title = empty ($video_title) ? 'test' : $video_title;
        $video_description = empty ($video_title) ? 'test' : $video_description;
        // create a new VideoEntry object
        $myVideoEntry = new Zend_Gdata_YouTube_VideoEntry();

        $myVideoEntry->setVideoTitle($video_title);
        $myVideoEntry->setVideoDescription($video_description);
// The category must be a valid YouTube category!
        $myVideoEntry->setVideoCategory('Autos');

// Set keywords. Please note that this must be a comma-separated string
// and that individual keywords cannot contain whitespace
        $myVideoEntry->SetVideoTags('cars, funny');

        $tokenHandlerUrl = 'http://gdata.youtube.com/action/GetUploadToken';
        $tokenArray = $this->yt->getFormUploadToken($myVideoEntry, $tokenHandlerUrl);
        $tokenValue = $tokenArray['token'];
        $postUrl = $tokenArray['url'];
        
        
        $upload_video_view_variables['token'] = $tokenArray['token'];
        $upload_video_view_variables['post_url'] = $tokenArray['url'];
        $upload_video_view_variables['post_url'] .= $redirect_url ?  '?nexturl='.$redirect_url : '';
        
       
        return $upload_video_view_variables;

        
        
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


        $upload_video_view_variables['next_url'] = base_url() . "upload_video/response/5";
        $upload_video_view_variables['token'] = $tokenArray['token'];
        $upload_video_view_variables['post_url'] = $tokenArray['url'];
        ;




        $this->load->view("blocks/upload_video", $upload_video_view_variables);
    }


    
    public function handle_upload_response($status,$youtube_video_id) {
        
     
        if($status != 200 && $status != 201)
        {
            throw new ErrorUploading();
        }
        
        $videoEntry = $this->yt->getVideoEntry($youtube_video_id);
        
        if($videoEntry->isVideoPrivate())
        {
            throw new PrivateVideo();
        }
        
        
        
        $control = '';
        
        try {
            $control = $videoEntry->getControl();
        } catch (Zend_Gdata_App_Exception $e) {
            throw  new Exception($e->getMessage());
        }
                                          
        
        $this->flash_url = $videoEntry->getFlashPlayerUrl();
        
        
    }

    public function get_video_flash_url()
    {
        return $this->flash_url;
    }
    
}

class ErrorUploading extends Exception
{
    public function __construct() {
        
        parent::__construct("Error al subir el video");
    }
}

class PrivateVideo extends Exception
{
    public function __construct() {
        
        parent::__construct("El video es privado");
    }
}

class InDraftState extends Exception
{
    public function __construct() {
        
        parent::__construct("El video es en draft");
    }
}


?>