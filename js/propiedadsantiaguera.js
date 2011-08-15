

initilizeFrontPageSlideShow = function()
{
    $('#front-page-slide-show').cycle({
        fx:     'fade', 
        speed:  'fast', 
        timeout: 3000, 
        pager:  '#front-page-slide-show-pager',
        cleartype: true,
        cleartypeNoBg: true,
        pagerEvent:    'click',
        activePagerClass: 'front-page-active-selector',
        pagerAnchorBuilder: function (idx, slide){
            return '<span class="front-page-slide-show-selector"></span>';
           
        }
    });
    
     
    $('#ultimos-proyectos-slides').cycle({ 
        fx:     'fade', 
        speed:  'fast', 
        timeout: 3000, 
        pager:  '#ultimos-proyectos-nav',
        cleartype: true,
        cleartypeNoBg: true,
        pagerEvent:    'click',
        activePagerClass: 'ultimos-proyectos-active-selector',
        pagerAnchorBuilder: function (idx, slide){
            return '<span class="ultimos-proyectos-selector"></span>';
           
        }
    });
}

initializePropiedadViewer = function (){
    $('#propiedad-viewer-slideshow').cycle({
        fx:     'fade', 
        speed:  'fast', 
        timeout: 3000, 
        pager:  '#propiedad-viewer-slidesshow-pager',
        cleartype: true,
        cleartypeNoBg: true,
        pagerEvent:    'click',
        
        activePagerClass: 'propiedad-viewer-active-selector',
        pagerAnchorBuilder: function (idx, slide){
            
            return '#propiedad-viewer-slidesshow-pager ul li a:eq(' +idx +')'; 
        }
    });
    $('#propiedad-viewer-slidesshow-pager').cycle({ 
        fx:     'scrollHorz', 
        prev:   '#propiedad-viewer-previousPager', 
        next:   '#propiedad-viewer-nextPager', 
        after: hideNextorPrevious,
        timeout: 0 
    });
}

drawPropertyUbication = function(latitudeAndLongitude)
{
    var latitudeAndLongitudeArray = latitudeAndLongitude.split(',');
    var latitude = latitudeAndLongitudeArray[0];
    var longitude = latitudeAndLongitudeArray[1];
    var latlng = new google.maps.LatLng(latitude,longitude);
    var myOptions = {
        zoom: 15,
        center: latlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    var map = new google.maps.Map(document.getElementById("property-ubication-gmap-map"), myOptions);
    
    var marker = new google.maps.Marker({
        position: latlng, 
        map: map, 
        title:"5050mkt"
    });   
    
}

hideNextorPrevious = function (curr, next, opts){

    var index = opts.currSlide;
    $('#propiedad-viewer-previousPager')[index == 0 ? 'hide' : 'show']();
    $('#propiedad-viewer-nextPager')[index == opts.slideCount - 1 ? 'hide' : 'show']();   
}

blockExists = function(idName){
    var block = $('#'+idName);
    if(block.length > 0)
        return true;
  
    return false;
};

intializeAgentesHeaderSection = function(){

    $('#agentes-header-inmobliarias').click(function(){
        $('#agentes-pager-header').html('INMOBILARIAS');
    });
    
    $('#agentes-header-agentes').click(function(){
        $('#agentes-pager-header').html('AGENTES');
    });
}

initializePhotoUploader = function(uploadButton)
{
   
    var btnUpload=$('#signup-upload-photo-button');  
    var statusMessages=$('#signup-upload-photo-status');  
    var photoPreview = $('#signup-upload-photo-preview');
        
    new AjaxUpload('signup-upload-photo-button', {
        action: 'ajax/fileuploader/photo',
        responseType: 'json',
        onChange : function(file , ext) {
            if ( $('select').val() == 0 ) {
                alert("Please select a directory, then Upload");
                return false;
            }
        },
        onSubmit : function(file , ext){
            // Allow only images. You should add security check on the server-side.
            if (ext && /^(gif|jpg|jpeg|png)$/i.test(ext)){
                /* Change status text */
               statusMessages.html('Subiendo el archivo...');
                var directory = 111;
                this.setData({
                    'directory': directory
                });
                
            } else {

                statusMessages.html('Solo se permiten imagenes.');
   
                return false;
            }
        },
        onComplete : function(file, response){
      
            if (response.success) {
                 
                 photoPreview.attr('src',response.filePath);
                   
            } else {
               
               statusMessages.html('Se ha producido un error, por favor intentelo denuevo.');
            }
        }
    });
}
intializeSignUpFormSection = function(){
    
   
    $('#new-user-type-value').change(function(){
        var userType = $(this).val();    
        $.post('/ajax/form_getter/signup_informacion_general/'+userType,function(formHtml){
            appendHtml('#new-user-type',formHtml);
            var uploadButton = $('#signup-upload-photo-button');
            initializePhotoUploader(uploadButton);            
        });
    });
    
    var btnUpload=$('#signup-upload-photo-button');
    if(btnUpload.length>0)
        initializePhotoUploader(btnUpload);
  

    
    
}

appendHtml = function (selector,newHtml)
{
    $(selector).append(newHtml);
}

$(document).ready
{
    
    var ieCssFixes = '<link rel="stylesheet" type="text/css" href="http://'+ window.location.hostname +'/css/propiedadsantiaguera-ie-fixes.css"/>' ;
    if($.browser.msie)
    {
        $('head').append(ieCssFixes);
    }
    
    initilizeFrontPageSlideShow();
    initializePropiedadViewer();
    if(blockExists('agentes-header'))
    {
        intializeAgentesHeaderSection();
    }
    
    if(blockExists('sign-up-form'))
    {
        intializeSignUpFormSection();
    }
    
    var map = $('#property-ubication-gmap-map');
    if(map.length>0)
        drawPropertyUbication('16,16');
}


