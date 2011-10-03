

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



Form = function (formWrapperSelector, sendButtonSelector, recivingScriptUrl, cleanButtonSelector, validationObjects){
    
    var thisObject = this;
    this.form = $(formWrapperSelector);
    this.cleanButton = $(cleanButtonSelector);        
    this.sendButton = $(sendButtonSelector);
    this.recivingScriptUrl = recivingScriptUrl;
 
    
    var i=0;
    
    (function(){
        
        thisObject.cleanButton.click(function(){
        
        var dataInputs = thisObject.form.find('input, textarea');
        
        for(i=0; i<dataInputs.length; i++)
        {
            $(dataInputs[i]).val('');
        }
    });
    })()                
    
};

ValidationObject = function(inputSelector,validatingFunction)
{
    var thisObject = this;
    this.input = $(inputSelector);
    this.validate = function(){validatingFunction(inputSelector)};
    
}


emailValidationFunction = function(inputSelector)
{
    var emailValidationRegex =  /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;  
    var inputValue = $(inputSelector).val();
    return emailValidationRegex.test(inputValue);
}






intializeForms = function(){
    
   var forms = { 
   
    signupForm : new Form('#signup-informacion-general','#signup-form-send-button','/prueba','#signup-form-clear-button')
    
    
    };

    
    
}

appendHtml = function (selector,newHtml)
{
    $(selector).append(newHtml);
}


FormChooserElement = function(elementSelector,eventString,valueToUrlJsonsArray,selectorOfNewFormContainer)
{
    var thisObject = this;
    this.newFormContainer = $(selectorOfNewFormContainer);
    this.chooserElement= $(elementSelector);    
    
    if(!valueToUrlJsonsArray instanceof Array)
        throw "FormChooserElement recieves an Array";
    
    this.chooserElement.bind(eventString,function(){
        var i=0;
        for(i=0; i < valueToUrlJsonsArray.length; i++)
        {
            if(thisObject.chooserElement.val() == valueToUrlJsonsArray[i].value)
                {
                    $.post(valueToUrlJsonsArray[i].url,function(html){
                        thisObject.newFormContainer.find('.optional-form').remove();                        
                        thisObject.newFormContainer.append(html);
                        intializeForms();
                        initializeFormChooserElements();
                    });
                }
            
        }
        
            
    });
}


initializeFormChooserElements = function(){
    var signupChooser = new FormChooserElement('#new-user-type-value','change',[{value: 'client', url:'/ajax/form_getter/signup_informacion_general/client'},{value: 'company', url:'/ajax/form_getter/signup_informacion_general/company'}],'#signup-form');
    
};

Overlay = function (selector, optionalClosebuttonSelector)
{
    $(selector).fancybox({type:'inline', padding:0,margin:0, showCloseButton: false});
    $(optionalClosebuttonSelector).click(function(){
        $.fancybox.close();
    });
    
}

initializeOverlays = function(){
    var login = new Overlay('#login-link','#login-close-button');
    
};


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
    
    initializeFormChooserElements();
    intializeForms();
    initializeOverlays();
    
    var map = $('#property-ubication-gmap-map');
    if(map.length>0)
        drawPropertyUbication('16,16');
}


