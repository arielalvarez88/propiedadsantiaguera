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

require_once 'Zend/Loader.php';

      



class upload_video extends CI_Controller{
    
    public function index()
    {
        
        Zend_Loader::loadClass('Zend_Gdata_YouTube');
Zend_Loader::loadClass('Zend_Gdata_ClientLogin');

        $authenticationURL= 'https://www.google.com/accounts/ClientLogin';
$httpClient = 
  Zend_Gdata_ClientLogin::getHttpClient(
              $username = 'arielalvarez88@gmail.com',
              $password = 'D3s1gnp@tt3rns',
              $service = 'youtube',
              $client = null,
              $source = 'MySource', // a short string identifying your application
              $loginToken = null,
              $loginCaptcha = null,
              $authenticationURL);

          
        
        $developer_key= "AI39si58bPU3fVlTrF8i4eyximJ9qMl8NMgJpUCxF1DMAIZAR-TTYUTftwkTSfx0m9D7PNXdnYDHwCxOmV-M6Kfy6lrQeePGfg";
        $application_id = "Propiedom";
        $user = $this->get_logged_user_or_redirect_to_please_login();
        
        $client_id = $user->name;
                  // Note that this example creates an unversioned service object.
// You do not need to specify a version number to upload content
// since the upload behavior is the same for all API versions.
        $yt = new Zend_Gdata_YouTube($httpClient,$application_id,$client_id,$developer_key);
$yt->setMajorProtocolVersion(2);
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
        $tokenArray = $yt->getFormUploadToken($myVideoEntry, $tokenHandlerUrl);
        $tokenValue = $tokenArray['token'];
        $postUrl = $tokenArray['url'];
        $video_variables["next_url"] = base_url()."/panel/propiedades";
        
        
        $upload_video_view_variables['next_url'] = base_url()."upload_video/response";
        $upload_video_view_variables['token'] = $tokenArray['token'];
        $upload_video_view_variables['post_url'] = $tokenArray['url'];;
        
        
        
        
        $this->load->view("blocks/upload_video",$upload_video_view_variables);
        
    }
    
    public function response()
    {
        var_dump($this->input->post());
        die;
    }
    
}

?>
