

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
        prev:   '#propiedad-viewer-previous-pager', 
        next:   '#propiedad-viewer-next-pager', 
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
    $('#propiedad-viewer-previous-pager')[index == 0 ? 'hide' : 'show']();
    $('#propiedad-viewer-next-pager')[index == opts.slideCount - 1 ? 'hide' : 'show']();   
}

blockExists = function(idName){
    var block = $('#'+idName);
    if(block.length > 0)
        return true;
  
    return false;
};

intializeAgentesHeaderSection = function(){

    $('#agentes-header-inmobliarias').unbind('click');
    $('#agentes-header-inmobliarias').click(function(){
        $('#agentes-pager-header').html('INMOBILARIAS');
    });
    
    $('#agentes-header-agentes').unbind('click');
    $('#agentes-header-agentes').click(function(){
        $('#agentes-pager-header').html('AGENTES');
    });
}

MessageCallback = function (response,successMessage,failureMessage)
{
    this.getMessage = function()
    {
        console.log(response.success);
        if(response.success == false)
        {
            alert(failureMessage);
        }
        else
        {
            alert(successMessage);
        } 
    };
    
   

};

Form = function (formWrapperSelector, sendButtonSelector, cleanButtonSelector, ajax, recivingScriptUrl,messageCallbackFunction){
    
    var thisObject = this;
    this.form = $(formWrapperSelector);
    this.cleanButton = $(cleanButtonSelector);        
    this.sendButton = $(sendButtonSelector);
    this.recivingScriptUrl = recivingScriptUrl;
 
    
    var i=0;
    
    (function(){
        thisObject.cleanButton.unbind("click");
        thisObject.cleanButton.click(function(){
        
            var dataInputs = thisObject.form.find('input, textarea');
        
            for(i=0; i<dataInputs.length; i++)
            {
                $(dataInputs[i]).val('');
            }
        });
    })() 
    
    if (ajax)
    {
        $(sendButtonSelector).unbind('click');
        $(sendButtonSelector).click(function(event){
            event.preventDefault();
            var info = {};
            
            var inputs = thisObject.form.children('input');
            
            console.log(inputs);
            for(i = 0; i < inputs.length; i++)
            {
                 
                info[$(inputs[i]).attr('id')] = $(inputs[i]).val();
            }
            
            
            $.post(recivingScriptUrl, info ,function(response){
                messageCallbackFunction(response);
            },'json');
        });

    }
    
};




ValidationObject = function(inputSelector,validatingFunction)
{
    var thisObject = this;
    this.input = $(inputSelector);
    this.validate = function(){
        validatingFunction(inputSelector)
    };
    
}


emailValidationFunction = function(inputSelector)
{
    var emailValidationRegex =  /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;  
    var inputValue = $(inputSelector).val();
    return emailValidationRegex.test(inputValue);
}




InputsWithDefaultText = function (inputSelector,defaultText,optionalClearPasswordInputSelector){
    
    var thisObject = this;
    this.input = $(inputSelector);
    this.optionalClearPasswordInput = $(optionalClearPasswordInputSelector);
        
    this.isPasswordField = typeof optionalClearPasswordInputSelector == 'undefined'? false : true;
        
    if(this.isPasswordField)
    {
        this.optionalClearPasswordInput.val(defaultText);
    }
    else
    {
        this.input.val(defaultText);
    }
    
    this.optionalClearPasswordInput.unbind('focus');    
    this.optionalClearPasswordInput.focus(function(){
            
        thisObject.optionalClearPasswordInput.hide();
        thisObject.input.show();
        thisObject.input.focus();
    });
        
    this.input.unbind('focus');    
    this.input.focus(function(){
            
        if($(this).val()== defaultText)
            $(this).val("");
            
            
    });
            
         
            
                
    this.input.blur(function(event){
        if($(event.target).val() == "")
        {
            $(event.target).val(defaultText);
                
                
            if(thisObject.isPasswordField)
            {
                thisObject.optionalClearPasswordInput.val(defaultText);
                thisObject.input.hide();
                thisObject.optionalClearPasswordInput.show();
                thisObject.input.val('');
                 
            }
        }
            
            
    });
    

 

    
};


Slider = function(parentSelector,minValue,maxValue,minInitialPosition,maxInitialPosition,minDisplaySelector,maxDisplaySelector,step){
    
    this.parent = $(parentSelector);
    this.minValue = minValue;
    this.maxValue = maxValue;
    this.minInitialValue = minInitialPosition;
    this.maxInitialValue = maxInitialPosition;
    this.minDisplay =$(minDisplaySelector);
    this.maxDisplay = $(maxDisplaySelector);
    this.step = step;
   
    var biggerThan = this.maxInitialValue >= 20000000? 'Más de ': '';
    this.minDisplay.html("$" + commify('' + this.minInitialValue));
    this.maxDisplay.html(biggerThan + "$" + commify('' + this.maxInitialValue));
    
    var sliderObject = this;
    
    
                        
    $(this.parent).slider({
        range: true,
        min: minValue,
        max: maxValue,
        step:sliderObject.step,
        values: [ sliderObject.minInitialValue , sliderObject.maxInitialValue ],
        slide: function( event, ui ) {
            var bigger = ui.values[ 1 ] >= 20000000? 'Más de ' : '';
            sliderObject.minDisplay.html( "$" + commify('' + ui.values[ 0 ]));
            sliderObject.maxDisplay .html(bigger + "$" + commify('' + ui.values[ 1 ]));
        }
        
    });
    
    $(this.parent).slider("option","values",[sliderObject.minInitialValue, sliderObject.maxInitialValue]);
    this.getRange = function()
    {
        return $(sliderObject.parent).slider("values");
      
    };
   
    
    
    $('.ui-slider-horizontal .ui-slider-range').attr('left','9.75%');
};


intializeForms = function(){
    
    initializeInputsWithDefaultText();

   
    var  signupForm = new Form('#signup-informacion-general','#signup-form-send-button','#signup-form-clear-button');
    var forgotPassword = new Form('#password-reset-form', '#password-reset-submit', '', true, '/usuario/password_reset_request', function(response){
    
        new MessageCallback(response, 'Email enviado', 'Error trate luego').getMessage();
        
    });
    
    var loginForm = new Form('#login form', '#login-submit', '', true, '/usuario/login', function(response){
        
        if(response.success)
        {
            
            window.location.href = window.location.href;
        
        }
        else
        {
            alert('Email/Password incorrectos');
            $('#login-email').val('');
            $('#login-password').val('');   
        }

        
    });

    var propertyForm = new Form('#property-form','#property-form-send-button','#property-form-clear-button');
    
    

    
    
}

appendHtml = function (selector,newHtml)
{
    $(selector).append(newHtml);
}


ViewLoaderElement = function(elementSelector,eventString,valueToUrlJsonsArray,selectorOfNewFormContainer,elementType)
{
    var thisObject = this;
    this.newFormContainer = $(selectorOfNewFormContainer);
    this.chooserElement= $(elementSelector);    
    
    if(!valueToUrlJsonsArray instanceof Array)
        throw "ViewLoaderElement recieves an Array";
    
    this.swapOptionalViews = function (scriptUrl, postVariables) 
    {
        $.post(scriptUrl,postVariables,function(html){
            thisObject.newFormContainer.find('.optional-form, .optional-view').remove();                        
            thisObject.newFormContainer.append(html);
            intializeForms();
            initializeViewLoaderElements();
            initializeInputsWithDefaultText();
                
        });
    };
    
    
    this.putSelectedClassToClickedElement = function()
    {
       $('.view-loader-element ').removeClass('selected');
       this.chooserElement.addClass('selected');       
    };
    
    this.chooserElement.unbind(eventString);
    this.chooserElement.bind(eventString,function(event){
        event.preventDefault();
        var i=0;
        if(elementType == 'a')
        {
            thisObject.swapOptionalViews(valueToUrlJsonsArray[0].url,valueToUrlJsonsArray[0].data);
            thisObject.putSelectedClassToClickedElement();
                   
        }
        else
        {
            for(i=0; i < valueToUrlJsonsArray.length; i++)
            {
                if(thisObject.chooserElement.val() == valueToUrlJsonsArray[i].value)
                {
                    thisObject.swapOptionalViews(valueToUrlJsonsArray[i].url,valueToUrlJsonsArray[i].data);
                    thisObject.putSelectedClassToClickedElement();
                }
            }
                      
        }
                    
            
    });
        
            
};



initializeViewLoaderElements = function(){
    var signupChooser = new ViewLoaderElement('#new-user-type-value','change',[{
        value: 'client', 
        url:'/ajax/view_loader/forms/signup_form', 
        data: {
            clientType: 'client'
        }
    },{
        value: 'company', 
        url:'/ajax/view_loader/forms/signup_form', 
        data: {
            clientType: 'company'
        }
    }],'#signup-form');   

    var forgotPassword = new ViewLoaderElement('#login-password-reset-button','click',[{
        value: '', 
        url:'/ajax/form_getter/passwordRecovery'
    }],'#login','a');


    var propertiesPanelPublishedButton = new ViewLoaderElement('#panels-property-section-menu-tabs-published','click',[{
        value: '', 
        url:'/usuario/get_user_published_properties_pager/print'
    }],'#panels-property-section-pager','a');

var propertiesPanelCreatedButton = new ViewLoaderElement('#panels-property-section-menu-tabs-created','click',[{
        value: '', 
        url:'/usuario/get_user_created_properties_pager/print'
    }],'#panels-property-section-pager','a');



    
    var propertyTypeRepopulate = {
        'property_sell_price_us' : $('#property-form-description-sell-price-us').val(), 
        'property_sell_price_dr' : $('#property-form-description-sell-price-dr').val(), 
        'property_rent_price_us' : $('#property-form-description-rent-price-us').val(), 
        'property_rent_price_dr' : $('#property-form-description-sell-rent-dr').val()
        };

    
    
    
    
    var propertyTypePassword = new ViewLoaderElement('#property-form-description-status','change',[{
        value: 'sell', 
        url:'/ajax/view_loader/sell_rent_inputs',
        data: {
            status: 'sell', 
            repopulate : propertyTypeRepopulate
        }
    },{
        value: 'rent', 
        url:'/ajax/view_loader/sell_rent_inputs',
        data: {
            status: 'rent', 
            repopulate : propertyTypeRepopulate
        }
    },{
        value: 'sell-rent', 
        url:'/ajax/view_loader/sell_rent_inputs',
        data: {
            status: 'sell-rent', 
            repopulate : propertyTypeRepopulate
        }
    }],'#property-form-description-column-container');

};



Overlay = function (selector, optionalClosebuttonSelector)
{
    $(selector).fancybox({
        type:'ajax', 
        padding:0,
        margin:0, 
        showCloseButton: false,
        onComplete: function (){
            intializeForms(); 
            initializeViewLoaderElements();
            initializeOverlays();
        }
        
    });
    
    $(optionalClosebuttonSelector).unbind('click');
    $(optionalClosebuttonSelector).click(function(){
        $.fancybox.close();
    });
    
}
initializeInputsWithDefaultText = function(){
    var loginEmail = new InputsWithDefaultText('#login-email', 'Email');
    var loginPassword = new InputsWithDefaultText('#login-password', 'Contraseña', '#login-password-clear');
    var resetPasswordEmail = new InputsWithDefaultText('#password-reset-input', 'Email');
    
};


initializeOverlays = function(){
    var login = new Overlay('#login-link','#login-close-button');
    
};

initializeInputsWithDefaultText = function(){
    var loginEmail = new InputsWithDefaultText('#login-email', 'Email');
    var password = new InputsWithDefaultText('#login-password', 'Contraseña','#login-password-clear');
    var resetPasswordEmail = new InputsWithDefaultText('#password-reset-input', 'Email');
};

initializeMaps = function() {
    var map = $('#property-ubication-gmap-map');
    if(map.length>0)
        drawPropertyUbication('16,16');
};


extendJquery = function (){
    
    $.extend({
        getUrlVars: function(){
            var vars = [], hash;
            var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
            for(var i = 0; i < hashes.length; i++)
            {
                hash = hashes[i].split('=');
                vars.push(hash[0]);
                vars[hash[0]] = hash[1];
            }
            return vars;
        },
        getUrlVar: function(name){
            return $.getUrlVars()[name];
        }
    });
};
    
function commify(num) {
    var Num = num;
    var newNum = "";
    var newNum2 = "";
    var count = 0;
    
    //check for decimal number
    if (Num.indexOf('.') != -1){  //number ends with a decimal point
        if (Num.indexOf('.') == Num.length-1){
            Num += "00";
        }
        if (Num.indexOf('.') == Num.length-2){ //number ends with a single digit
            Num += "0";
        }
        
        var a = Num.split("."); 
        Num = a[0];   //the part we will commify
        var end = a[1] //the decimal place we will ignore and add back later
    }
    else {
        var end = "00";
    }  
 
    //this loop actually adds the commas   
    for (var k = Num.length-1; k >= 0; k--){
        var oneChar = Num.charAt(k);
        if (count == 3){
            newNum += ",";
            newNum += oneChar;
            count = 1;
            continue;
        }
        else {
            newNum += oneChar;
            count ++;
        }
    }  //but now the string is reversed!
   
    //re-reverse the string
    for (var k = newNum.length-1; k >= 0; k--){
        var oneChar = newNum.charAt(k);
        newNum2 += oneChar;
    }
   
    // add dollar sign and decimal ending from above
    newNum2 = newNum2;
    return newNum2;
};


    
initializeSliders = function () {
  
    var frontPageBasicFilterSlider = new Slider('#basic-filter-price-slider', 1000000, 100000000, 1000000, 100000000, '#basic-filter-price-slider-min-display', '#basic-filter-price-slider-max-display', 500000);
};


$(document).ready
{   
    extendJquery();
    var ieCssFixes = '<link rel="stylesheet" type="text/css" href="http://'+ window.location.hostname +'/css/propiedadsantiaguera-ie-fixes.css"/>' ;
    if($.browser.msie)
    {
        $('head').append(ieCssFixes);
    }
    
    initilizeFrontPageSlideShow();
    initializePropiedadViewer();    
    intializeAgentesHeaderSection();
    initializeViewLoaderElements();
    initializeSliders();
    intializeForms();
    initializeOverlays();
    initializeMaps();
    
/*comentario*/    
}


