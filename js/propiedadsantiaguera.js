





bindEvent = function(elementOrSelector,eventName,handler)
{
    
    if( typeof elementOrSelector != 'string' &&  typeof elementOrSelector != 'object')
        throw "The first argumnet of bindEvent must be a selector or an element.";
    
    var element;
    element = $(elementOrSelector); 
    
    
    if(!elementHasHandler(element,eventName,handler))
    {
            
        element.bind(eventName,handler);
        return true;
    }
        
    
    return false;
};

    
elementHasHandler = function (element,eventName,handler)
{
    element = $(element);
    
    
    if(element.data('events') == undefined)
        return false;
    
    
        
    jQuery.each(element.data('events'), function(i, event){

        jQuery.each(event, function(i, activeHandler){
            if(activeHandler.type == eventName && activeHandler.handler == handler)
                return true;

        });
    });
    
    return false;

    
};

initilizeSlideShows = function()
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
    
    
    $('#front-properties-pager-container #properties-pager-properties-container').cycle({ 
        fx:     'fade', 
        speed:  'fast', 
        timeout: 5000,         
        cleartype: true,
        cleartypeNoBg: true
        
        
    });
    
    $('#tools-center-slideshow').cycle({ 
        fx:     'fade', 
        speed:  'fast', 
        timeout: 4000, 
        pager:  '#tools-center-pager',
        cleartype: true,
        cleartypeNoBg: true,
        pagerEvent:    'click',
        activePagerClass: 'active',
        pagerAnchorBuilder: function (idx, slide){
            return '#tools-center-pager a:nth('+idx+')';
           
        }
    });
    
    $(".property-slideshow").fancybox({
        openEffect	: 'none',
        closeEffect	: 'none'
    });
    
};

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
            
            return '.propiedad-viewer-slideshow-selector-'+idx; 
        }
    });
    $('#propiedad-viewer-slidesshow-pager').cycle({ 
        fx:     'fade', 
        prev:   '#propiedad-viewer-previous-pager', 
        next:   '#propiedad-viewer-next-pager', 
        after: function(curr,next,opts){
            hideNextorPrevious(curr,next,opts,'#propiedad-viewer-next-pager','#propiedad-viewer-previous-pager')
        },
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

hideNextorPrevious = function (curr, next, opts, nextSelector, previousSelector){

    
    var index = opts.currSlide;
    $(previousSelector)[index == 0 ? 'hide' : 'show']();
    $(nextSelector)[index == opts.slideCount - 1 ? 'hide' : 'show']();   
}

blockExists = function(idName){
    var block = $('#'+idName);
    if(block.length > 0)
        return true;
  
    return false;
};

alertMessageCallback = function (response,successMessage,failureMessage)
{
    this.getMessage = function()
    {
        
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


JqueryCycleAjaxPager = function(containerSelector,nextButtonSelector,previousButtonSelector, actualPageNumberDisplaySelector, pageNumbersCotainerSelector, numberOfVisiblePagesInThePager, previousPagerGroupSelector, nextPagerGroupSelector)
{
    
    var thisObject = this;
    this.container;
    this.numberOfPages;
    this.nextButton;
    this.previousButton;
    this.actualPageNumberDisplay;
    this.pageNumbersContainer;
    this.actualPage;
    this.numberOfPagerGroups;
    this.nextPagerGroup;
    this.previousPagerGroup;
    thisObject.slidesPerPage;
    
    this.refreshActualPageDisplay = function (){
        
        thisObject.actualPageNumberDisplay.html("Página " + thisObject.actualPage + '-' + thisObject.numberOfPages );
    };
    
    
    (this.init = function(){
        
        thisObject.actualPageNumberDisplay= $(actualPageNumberDisplaySelector);
        thisObject.container= $(containerSelector);
        thisObject.numberOfPages = thisObject.container.children().length;
        thisObject.actualPage = 1;
        thisObject.nextButton = $(nextButtonSelector);
        thisObject.previousButton = $(previousButtonSelector);
        thisObject.pageNumbersContainer = $(pageNumbersCotainerSelector);
        thisObject.numberOfPagerGroups = thisObject.pageNumbersContainer.children().length;
        thisObject.nextPagerGroup = $(nextPagerGroupSelector);
        thisObject.previousPagerGroup = $(previousPagerGroupSelector);
        
        
        if(thisObject.numberOfPages > 0)
            thisObject.refreshActualPageDisplay();
        
        
        if(thisObject.numberOfPages > 1)
        {
                
            thisObject.nextButton.show();
            thisObject.previousButton.hide();
        }
        else
        {
            thisObject.previousButton.hide();
            thisObject.nextButton.hide();
        }
        
        thisObject.container.cycle({
            fx:     'fade', 
            prev:   previousButtonSelector, 
            next:   nextButtonSelector,     
            
            
            onPrevNextEvent: function(isNext,zeroBasedSlideIndex,slideElement){
                
                thisObject.actualPage = zeroBasedSlideIndex + 1;                
                thisObject.refreshActualPageDisplay();
                
                var info = {
                    currSlide : zeroBasedSlideIndex, 
                    slideCount:  thisObject.numberOfPages
                };
                hideNextorPrevious(isNext,zeroBasedSlideIndex, info ,nextButtonSelector,previousButtonSelector);
                
                if((thisObject.actualPage %  (numberOfVisiblePagesInThePager+1)==0) && isNext)
                    thisObject.pageNumbersContainer.cycle('next');
                
                else if((thisObject.actualPage %  numberOfVisiblePagesInThePager == 0) && !isNext)
                    thisObject.pageNumbersContainer.cycle('prev');
                
                
            },
            onPagerEvent: function(zeroBasedSlideIndex, slideElement){
                thisObject.actualPage = zeroBasedSlideIndex + 1;                
                thisObject.refreshActualPageDisplay();
                              
            },
            
            pager: thisObject.pageNumbersContainer,
            pagerAnchorBuilder: function(index,DOMelement){
                var pageNumber = index+1;
                
                return  '.ajax-pager-page-number:nth(' + index + ')';                
                
            },
            activePagerClass: 'selected',
            timeout: 0 
            
            
            
        });
                
        thisObject.pageNumbersContainer.cycle({
            fx:     'fade', 
            timeout: 0            
            
            
          
            
        //            prev:   previousPagerGroupSelector, 
        //            next:   nextPagerGroupSelector, 
            
        //            after: function(curr,next,opts){                          
        //                hideNextorPrevious(curr,next,opts,nextPagerGroupSelector,previousPagerGroupSelector);
        //            },                        
        //            activePagerClass: 'selected-pager-group',
            
        });
    //        
    //         if(thisObject.numberOfPagerGroups > 1)
    //            {
    //                
    //                thisObject.previousPagerGroup.hide();
    //            }
    //            else
    //                {
    //                    thisObject.nextPagerGroup.hide();
    //                    thisObject.previousPagerGroup.hide();
    //                }
        
    })();
    
     

    
}


HiderAndShowerElement = function(elementSelector,  valuesToSelectorsToShowMap, elementsToShowOrHideSelector, emptyElementsValuesWhenHidding, event, runEventOnLoad){
    
    if(typeof event == "undefined")
        event = "click";
    
    if(typeof emptyElementsValuesWhenHidding == "undefined")
        event = false;
    
    
    
    var thisObject = this;
    this.element = $(elementSelector);
    this.elementsToShowOrHide = $(elementsToShowOrHideSelector);
    
    
    this.element.unbind(event);
    
    this.element.bind(event,function(defaultEvent){
        defaultEvent.preventDefault();
        var elementValue = thisObject.element.val() || thisObject.element.is(":checked")? thisObject.element.val() : false;
        
        thisObject.elementsToShowOrHide.hide();
       
       
        
        if(emptyElementsValuesWhenHidding)
        {
            $(elementsToShowOrHideSelector + ":not(" +valuesToSelectorsToShowMap[elementValue] + ")").val("");
        }
            
        
        if(elementValue)
            $(valuesToSelectorsToShowMap[elementValue]).show();
        else 
        {
            $(valuesToSelectorsToShowMap['selector']).show();
            
        }
            
    });
    
    if(runEventOnLoad)
    {
        thisObject.element.trigger(event);
    }
   
};


formRecolectorButtonBehaviour = function(event,formWrapper,recivingScriptUrl,postCallback){
            event.preventDefault();
            var info = {};
            
            var inputs = $(formWrapper).find('input, select, textarea');
            
            
            
            
            for(i = 0; i < inputs.length; i++)
            {
                 
                info[$(inputs[i]).attr('name')] = $(inputs[i]).val();
            }
            
            
            $.post(recivingScriptUrl, info ,function(response){                                
                
                postCallback(response);
            },'json');
        };



Form = function (formWrapperSelector, sendButtonSelector, cleanButtonSelector, ajax, recivingScriptUrl,alertMessageCallbackFunction){
    
    var thisObject = this;
    
    
//    var thisObject = this;
//    this.form = $(formWrapperSelector);
//    this.cleanButton = $(cleanButtonSelector);        
//    this.sendButton = $(sendButtonSelector);
//    this.recivingScriptUrl = recivingScriptUrl;
// 
//    
//    var i=0;
    
     thisObject.init(formWrapperSelector, sendButtonSelector, cleanButtonSelector, ajax, recivingScriptUrl,alertMessageCallbackFunction);
    thisObject.setClearButtonBehaviour();
    
    if (ajax)
    {
        bindEvent(thisObject.sendButton, "click", function(event){
            
            
            formRecolectorButtonBehaviour(event, thisObject.form, recivingScriptUrl, alertMessageCallbackFunction);
        })

    }
    
};

Form.prototype.setClearButtonBehaviour = function(){
    
        var thisObject = this;
        bindEvent(this.cleanButton, "click", function(){
        
            var dataInputs = thisObject.form.find('input, textarea');
        
            for(i=0; i<dataInputs.length; i++)
            {
                $(dataInputs[i]).val('');
            }
        });
    };


Form.prototype.form;
Form.prototype.cleanButton;        
Form.prototype.sendButton;
Form.prototype.recivingScriptUrl;
Form.prototype.init = function(formWrapperSelector, sendButtonSelector, cleanButtonSelector, ajax, recivingScriptUrl,alertMessageCallbackFunction){
    this.form = $(formWrapperSelector);
    this.cleanButton = $(cleanButtonSelector);        
    this.sendButton = $(sendButtonSelector);
    this.recivingScriptUrl = recivingScriptUrl;
};

        

AjaxConditionalForm = function(formWrapperSelector, conditionalBoolReturningFunction, sendButtonSelector, cleanButtonSelector, alertMessageCallbackFunction){
  
       var thisObject = this;
       
       
       var recivingScript = $(sendButtonSelector).attr("data-reciving-script");
       thisObject.uber.init.call(this,formWrapperSelector, sendButtonSelector, cleanButtonSelector, true, recivingScript,alertMessageCallbackFunction);
    
      thisObject.setClearButtonBehaviour();
      
      
      
    
        bindEvent(thisObject.sendButton, "click", function(event){
            
            if(conditionalBoolReturningFunction())
                {
                    
                    
                    formRecolectorButtonBehaviour(event, thisObject.form, recivingScript, alertMessageCallbackFunction);
                }
                
                
                
            
            
        })

    
};
AjaxConditionalFormTransitional = function(){};
AjaxConditionalFormTransitional.prototype = Form.prototype;

AjaxConditionalForm.prototype = new AjaxConditionalFormTransitional();
AjaxConditionalForm.prototype.uber = Form.prototype;



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
    
    var thisObject = this;
    this.parent = $(parentSelector);
    this.minValue = minValue;
    this.maxValue = maxValue;
    this.minInitialValue = minInitialPosition;
    this.maxInitialValue = maxInitialPosition;
    this.minDisplay =$(minDisplaySelector);
    this.maxDisplay = $(maxDisplaySelector);
    this.step = step;
   
    this.getMax = function(){
        return thisObject.maxValue; 
    };
   
    var biggerThan = this.maxInitialValue >= maxValue? 'Más de ': '';
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
            var bigger = ui.values[ 1 ] >= maxValue? 'Más de ' : '';
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


printCallbackMessageInContainer = function(response, successMessageContainer, errorMessageContainer){
    
    if(typeof response != 'object' || typeof response.success != 'boolean')
        throw "The response must be an object with a bool property called response and a string property called message";
    
    
    if(response.success)
    {
        if(response.message)
            $(successMessageContainer).show().html(response.message);
        else
        {
            $(successMessageContainer+", "+ errorMessageContainer).hide();
        }
            
    }
    else
    {
        $(errorMessageContainer).html(response.message).show();
        $(successMessageContainer).hide();
    }
            
    
    
};

initializeForms = function(){
    
    initializeInputsWithDefaultText();

   
    var  signupForm = new Form('#signup-form-container','#signup-form-container #signup-form-send-button','#signup-form-container #signup-form-clear-button');
    var forgotPassword = new Form('#password-reset-form', '#password-reset-submit', '', true, '/usuario/password_reset_request', function(response){
    
        new alertMessageCallback(response, 'Email enviado', 'Error trate luego').getMessage();
        
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
    
    var givePosts = new Form('#give-posts-to-agents-overlay', '#give-posts-to-agents-overlay-save-button', '', true, '/miembros/give_posts',  function(response){
        printCallbackMessageInContainer(response,"#give-posts-to-agents-overlay .info-messages","#give-posts-to-agents-overlay .error-messages");
        if(response.success)
            window.location.href= window.location.href;
        
    });

    
    
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
            initializeForms();
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
  

    var forgotPassword = new ViewLoaderElement('#login-password-reset-button','click',[{
        value: '', 
        url:'/ajax/form_getter/passwordRecovery'
    }],'#login','a');


    var propertiesPanelPublishedButton = new ViewLoaderElement('#panels-property-section-menu-tabs-published','click',[{
        value: '', 
        url:'/panel/get_user_published_properties_pager/print'
    }],'#panels-property-section-pager','a');

    var propertiesPanelCreatedButton = new ViewLoaderElement('#panels-property-section-menu-tabs-created','click',[{
        value: '', 
        url:'/panel/get_user_created_properties_pager/print'
    }],'#panels-property-section-pager','a');



    
    var propertyTypeRepopulate = {
        'property_sell_price_us' : $('#property-form-description-sell-price-us').val(), 
        'property_sell_price_dr' : $('#property-form-description-sell-price-dr').val(), 
        'property_rent_price_us' : $('#property-form-description-rent-price-us').val(), 
        'property_rent_price_dr' : $('#property-form-description-sell-rent-dr').val()
    };

    
    
    
    
//    var propertyCondition = new ViewLoaderElement('#property-form-description-condition','change',[{
//        value: 1, 
//        url:'/ajax/view_loader/sell_rent_inputs',
//        data: {
//            status: 'sell', 
//            repopulate : propertyTypeRepopulate
//        }
//    },{
//        value: 2, 
//        url:'/ajax/view_loader/sell_rent_inputs',
//        data: {
//            status: 'rent', 
//            repopulate : propertyTypeRepopulate
//        }
//    },{
//        value: 3, 
//        url:'/ajax/view_loader/sell_rent_inputs',
//        data: {
//            status: 'sell-rent', 
//            repopulate : propertyTypeRepopulate
//        }
//    }],'#property-form-description-column-container');

};



Overlay = function (selector, optionalClosebuttonSelector)
{
    $(selector).fancybox({
        padding:0,
        margin:0, 
        showCloseButton: false,        
        scrolling: 'auto',
        onComplete: function (){
            initializeForms(); 
            initializeViewLoaderElements();
            initializeOverlays();
            initializeHiderAndShowerElement();
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


Iframe = function(selector){
    
    this.anchor = $(selector);
   bindEvent(this.anchor, "click", function(event){ 
       event.preventDefault();
        var href = $(selector).attr("href");
        $('body').append('<iframe style="position:" src="'+href+ '"></iframe>');
   });
    
   
}

initializeOverlays = function(){
    var login = new Overlay('#login-link','#login-close-button');
    var advancedFilter = new Overlay('#basic-filter-advanced-filter-link','#advanced-filter-close-button');
    var givePostsToAgents = new Overlay('.give-agent-publication ','#give-posts-to-agents-overlay-close-button, #give-posts-to-agents-overlay-cancel-button');
    var buyFormPolicy = new Overlay("#buy-form-policy");
    var buyFormTerms = new Overlay('#buy-form-terms');
};

initializeInputsWithDefaultText = function(){
    var loginEmail = new InputsWithDefaultText('#login-email', 'Email');
    var password = new InputsWithDefaultText('#login-password', 'Contraseña','#login-password-clear');
    var resetPasswordEmail = new InputsWithDefaultText('#password-reset-input', 'Email');
    var basicFilterReferenceNumber = new InputsWithDefaultText("#basic-filter-reference-number", "N\xfamero de referencia");
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


IFilter = function (){

    };
IFilter.getMaxPrice= function(){};
IFilter.getMinPrice= function(){};





Filter = function(filterContainerSelector,sliderChangerElementSelector, sliderContainerSelector, searchButtonSelector, valuesToSliderParameters, sliderMinValue,sliderMaxValue,sliderMinInitialValue,sliderMaxInitialValue,step,submitUrl){
   
    var thisObject = this;
    this.sliderChangerElement = $(sliderChangerElementSelector);
    this.searchButtonElement = $(searchButtonSelector);
    this.sliderElement = new Slider(sliderContainerSelector, sliderMinValue, sliderMaxValue, sliderMinInitialValue, sliderMaxInitialValue, '#basic-filter-price-slider-min-display', '#basic-filter-price-slider-max-display', step);
    this.filterElement = $(filterContainerSelector);
    this.sliderChangerElementEvent = function(){
     

        for(value in valuesToSliderParameters)
        {
            if(thisObject.sliderChangerElement.val() == value)
            {
                  
                thisObject.sliderElement = new Slider(sliderContainerSelector, valuesToSliderParameters[value].minValue, valuesToSliderParameters[value].maxValue, valuesToSliderParameters[value].minInitialValue, valuesToSliderParameters[value].maxInitialValue, "#basic-filter-price-slider-min-display", "#basic-filter-price-slider-max-display", valuesToSliderParameters[value].step);
            }
        }
   
    };
   
    this.submitEvent = function(event)
    {
        event.preventDefault();
        var infoContainersElementsInFilterSelector = filterContainerSelector + " input:not(#basic-filter-search-button), " + filterContainerSelector + " select";
        var infoContainersElementsInFilter = $(infoContainersElementsInFilterSelector);
       
        var queryString = "?";
        
        $.each(infoContainersElementsInFilter, function(index, element){
            var jqueryElement = $(element);
            queryString += jqueryElement.val() != jqueryElement.attr("data-null-value")?  jqueryElement.attr("name") + "=" + jqueryElement.val()+ "&" : '';           
        });
        
        if(sliderChangerElementSelector)
        {
            var minPrice= thisObject.sliderElement.getRange()[0];
            var maxPrice = thisObject.sliderElement.getRange()[1];
            queryString += "minprice=" + minPrice + "&" +"maxprice=" + maxPrice;
            queryString += "&absoluteMin=" + thisObject.sliderElement.minValue + "&" +"absoluteMax=" + thisObject.sliderElement.maxValue + "&step=" + thisObject.sliderElement.step;
            var noLimitToMaxPrice = thisObject.sliderElement.getMax() <= maxPrice;
            queryString +=  noLimitToMaxPrice? "&nopricelimit=true" : "";
        }
        else
            queryString += 'filter-type=advanced';
        
        
        window.location.href = submitUrl + queryString;
       
       
    };

   
   
   
    bindEvent(sliderChangerElementSelector, "change", thisObject.sliderChangerElementEvent);
    bindEvent(searchButtonSelector, "click", thisObject.submitEvent);
   
   
   
   
   
   
};



//Filter = function(f){
//   
//    var thisObject = this;
//    this.sliderChangerElement = $(sliderChangerElementSelector);
//    this.searchButtonElement = $(searchButtonSelector);
//    this.sliderElement = new Slider(sliderContainerSelector, sliderMinValue, sliderMaxValue, sliderMinInitialValue, sliderMaxInitialValue, '#basic-filter-price-slider-min-display', '#basic-filter-price-slider-max-display', step);
//    this.filterElement = $(filterContainerSelector);
//    this.sliderChangerElementEvent = function(){
//     
//
//        for(value in valuesToSliderParameters)
//        {
//            if(thisObject.sliderChangerElement.val() == value)
//            {
//                  
//                thisObject.sliderElement = new Slider(sliderContainerSelector, valuesToSliderParameters[value].minValue, valuesToSliderParameters[value].maxValue, valuesToSliderParameters[value].minInitialValue, valuesToSliderParameters[value].maxInitialValue, "#basic-filter-price-slider-min-display", "#basic-filter-price-slider-max-display", valuesToSliderParameters[value].step);
//            }
//        }
//   
//    };
//   
//   
//   
//   
//   
//   
//    bindEvent(sliderChangerElementSelector, "change", thisObject.sliderChangerElementEvent);
//    bindEvent(searchButtonSelector, "click", thisObject.submitEvent);
//     
//   
//};
//
//
//Filter.prototype.submitEvent = function(event)
//    {
//        event.preventDefault();
//        var infoContainersElementsInFilterSelector = filterContainerSelector + " input:not(#basic-filter-search-button), " + filterContainerSelector + " select";
//        var infoContainersElementsInFilter = $(infoContainersElementsInFilterSelector);
//       
//        var queryString = "?";
//        
//        $.each(infoContainersElementsInFilter, function(index, element){
//            var jqueryElement = $(element);
//            queryString += jqueryElement.val() != jqueryElement.attr("data-null-value")?  jqueryElement.attr("name") + "=" + jqueryElement.val()+ "&" : '';           
//        });
//        
//        if(sliderChangerElementSelector)
//        {
//            var minPrice= thisObject.sliderElement.getRange()[0];
//            var maxPrice = thisObject.sliderElement.getRange()[1];
//            queryString += "minprice=" + minPrice + "&" +"maxprice=" + maxPrice;
//            queryString += "&absoluteMin=" + thisObject.sliderElement.minValue + "&" +"absoluteMax=" + thisObject.sliderElement.maxValue + "&step=" + thisObject.sliderElement.step;
//            var noLimitToMaxPrice = thisObject.sliderElement.getMax() <= maxPrice;
//            queryString +=  noLimitToMaxPrice? "&nopricelimit=true" : "";
//        }
//        else
//            queryString += 'filter-type=advanced';
//        
//        
//        window.location.href = submitUrl + queryString;
//       
//       
//    };



initializeFilters = function(){
   
    var basicFilterMinPriceInitialValue = $.getUrlVar('minprice') ? Number($.getUrlVar('minprice')) : 0;
    var basicFilterMaxPriceInitialValue = $.getUrlVar('maxprice')? Number( $.getUrlVar('maxprice')) : 50000000;
    var basicFilterMinValue = $.getUrlVar('absoluteMin')? Number($.getUrlVar('absoluteMin')) : 0;
    var basicFilterMaxValue = $.getUrlVar('absoluteMax')? Number($.getUrlVar('absoluteMax')) : 50000000;   
    var basicFilterStep = $.getUrlVar('step')? Number($.getUrlVar('step')) : 500000;
    var basicFilter = new Filter("#basic-filter","#basic-filter-condition", "#basic-filter-price-slider","#basic-filter-search-button",{
        1: {
            minValue: 0, 
            maxValue: 50000000, 
            maxInitialValue: 50000000, 
            minInitialValue: 0, 
            step: 500000
        }, 
        2: {
            minValue: 0, 
            maxValue: 300000, 
            maxInitialValue: 300000, 
            minInitialValue: 0, 
            step: 5000
        }
    }, basicFilterMinValue, basicFilterMaxValue, basicFilterMinPriceInitialValue, basicFilterMaxPriceInitialValue, basicFilterStep, "/propiedades/buscar");
    
    
    var basicFilter = new Filter("#basic-filter","#basic-filter-condition", "#basic-filter-price-slider","#basic-filter-search-button",{
        1: {
            minValue: 0, 
            maxValue: 50000000, 
            maxInitialValue: 50000000, 
            minInitialValue: 0, 
            step: 500000
        }, 
        2: {
            minValue: 0, 
            maxValue: 300000, 
            maxInitialValue: 300000, 
            minInitialValue: 0, 
            step: 5000
        }
    }, basicFilterMinValue, basicFilterMaxValue, basicFilterMinPriceInitialValue, basicFilterMaxPriceInitialValue, basicFilterStep, "/propiedades/buscar");
   
   
   
   
};

    
initializeSliders = function () {
  
    var frontPageBasicFilterSlider = new Slider('#basic-filter-price-slider', 1000000, 50000000, 1000000, 50000000, '#basic-filter-price-slider-min-display', '#basic-filter-price-slider-max-display', 1000000);
};





InterestsCalculator = function (mountInputSelector, rateInputSelector, yearsInputSelector, calculateButtonSelector, responseInputSelector)
{
    var thisObject = this;
    this.mountInput = $(mountInputSelector);
    this.rateInput = $(rateInputSelector);
    this.yearsInput = $(yearsInputSelector);
    this.calculateButton = $(calculateButtonSelector);
    this.responseInput = $(responseInputSelector);
    
    
    
    this.calculateEvent = function(event){
        event.preventDefault();
        var mount = Number(thisObject.mountInput.val());
        var rate = Number(thisObject.rateInput.val());
        var years = Number(thisObject.yearsInput.val());
        
        
        
        var valiidateForInterest = function(mount,rate,years)
        {
            
            for(index in arguments)
            {
                
                    
                    
                if(typeof arguments[index] != 'number')
                {
                    
                    return false;
                }
            }
            
            return true;
        }
        
        
          
        if(valiidateForInterest(mount,rate,years))
        {
            thisObject.responseInput.val(mount + rate) ;
        }
        
        
    };
        
    
    thisObject.calculateButton.click(thisObject.calculateEvent);
    
};

initializeInterestsCalculators = function()
{
    var interestCalculator = new InterestsCalculator("#interests-calculator-mount", "#interests-calculator-rate", "#interests-calculator-years", "#interests-calculator-calculate-button", "#interests-calculator-result");
};


HideShowWithArrowDirectionElement = function(linkSelector, arrowsSelector, elementToShowOrHideSelector){
    if( typeof linkSelector != "string" || typeof arrowsSelector != "string" || typeof elementToShowOrHideSelector != "string" )
        throw "All parameters should be selectors of tpye String.";
    
    var thisObject =this;
    this.eventButton = $(linkSelector);
    this.arrows = $(arrowsSelector);
    this.elementToHideOrShow = $(elementToShowOrHideSelector);
    
    this.hideShowEvent = function(event)
    {
        event.preventDefault();
        if(thisObject.elementToHideOrShow.is(":visible"))
            thisObject.elementToHideOrShow.hide();
        else
            thisObject.elementToHideOrShow.show();      
        
        $.each(thisObject.arrows, function(index,element){
            var jqueryElement = $(element);
            if(jqueryElement.is(":visible"))
                jqueryElement.hide();
            else
                jqueryElement.show();      
        });
        
         
        
    }
    
    this.eventButton.unbind("click");
    this.eventButton.click(thisObject.hideShowEvent);
    
    
};

initializeHideShowWithArrowDirectionElement= function(){
    var upperMenuHideOrShow = new HideShowWithArrowDirectionElement("#upper-panel-hide-show", "#upper-panel-hide-show img", "#upper-panel ul");
};


initializeHiderAndShowerElement = function(){
    
    
    var advancedFilter = new HiderAndShowerElement("#advanced-filter-property-type", {
        1: ".house-field", 
        2:'.apartment-field', 
        3:".penthouse-field",
        4:".mall-field", 
        5:".building-field", 
        6:".warehouse-field",
        7:".office-field",
        8:".lot-field",         
        9:".land-field",
        10: ".construction-project-field"
    }, "#advanced-filter .hiddable", true, "change");
    
    
    var propertiesFormPerTypeFieldHider = new HiderAndShowerElement("#property-form-description-type", {
        1: ".house-field", 
        2:'.apartment-field', 
        3:".penthouse-field",
        4:".mall-field", 
        5:".building-field", 
        6:".warehouse-field",
        7:".office-field",
        8:".lot-field",         
        9:".land-field",
        10: ".construction-project"
    }, "#property-form-description-column-container .hiddable", true, "change", true);
    
    
    var propertiesFormCondition = new HiderAndShowerElement("#property-form-description-condition", {
        1:'.sell-condition-field', 
        2 : ".rent-condition-field", 
        3 : ".rent-condition-field, .sell-condition-field"
    }, "ul #property-form-description-column4 li", false, "change");
    var signupChooser = new HiderAndShowerElement('#new-user-type-value',{
        1: '.agent-particular-field', 
        2:'.company-field', 
        3: '.company-agent-field', 
        4: '.agent-particular-field',
        5: '.agent-particular-requester-field', 
        6:'.company-requester-field', 
        7: '.company-agent-field', 
        8: '.agent-particular-requester-field'
    }, '.agent-particular-field, .company-field, .company-agent-field', false, 'change',true);   
    var supportItems = new HiderAndShowerElement("#faq", {
        selector: ".faq-data"
    }, ".hidden", false, "click");

    var propertyTypeInPropertyForm = new HiderAndShowerElement("#properrty-form-description-type", {
        1 : ".house-field", 
        2 : ".apartment-field", 
        3: ".lot-field", 
        4:".enthouse-field",
        5:".mall-field", 
        6:".building-field", 
        7:".warehouse-field", 
        8:".office-field", 
        9:".land-field"
    }, ".property-form-optional-field", true, "change", true);
    var currencyInPropertyInfo = new HiderAndShowerElement("#price-currency select", {
        dr: ".dr-price-field", 
        us: ".us-price-field"
    }, "#price-currency h1", false, "change", true);
    
        
    
};

hideElementsWithHiddenClass = function(){
    $('.hidden') .hide();
};






initializeJqueryCycleAjaxPager = function (){
    
    var propertiesSearchResults = new JqueryCycleAjaxPager('#properties-search-results-pager-results-container', '#properties-search-results-pager-next, #properties-search-results-pager-next-group', '#properties-search-results-pager-previous, #properties-search-results-pager-previous-group', '#properties-search-results-pager-current-page-display', '#properties-search-results-pager-pages',5);
    var memberProperties = new JqueryCycleAjaxPager('#members-properties-pager-container #properties-pager-properties-container', '#members-properties-pager-container #properties-pager-next-previous-next-button', '#members-properties-pager-container #properties-pager-next-previous-previous-button', '#members-properties-pager-container #properties-pager-next-previous-numbers');
    
    
    
};

AjaxAttributeValueSender = function (elementSelector, attributesToSendValue, triggerEvent, recivingScript,callback){
     
     
    var thisObject = this;
    this.element;
    this.recivingScript;
    callback = typeof callback == 'undefined' ? function(html){}: '';
     
     
    this.getAttribtesAndDoAjaxRequest = function (){
       
        var i =0;
       
        var postVariables = {};
        for(i=0; i < attributesToSendValue.length; i++)
        {
            
            postVariables[attributesToSendValue[i]] = thisObject.element.attr(attributesToSendValue[i]);
            
            
        }
        
        $.post(recivingScript,postVariables,callback);
        
        
        
    };
   
    (this.init = function(){
        thisObject.element = $(elementSelector);
        thisObject.element.unbind(triggerEvent);
        thisObject.recivingScript = recivingScript;
        
        bindEvent(thisObject.element, triggerEvent, thisObject.getAttribtesAndDoAjaxRequest);
        
    })();
   
};


AutoReactivationButton = function(elementSelector){
    
    var thisObject = this;
    this.element = $(elementSelector);
    this.messageToHide = $(thisObject.element.attr('data-message-selector'));
    
    
    this.HideOrShowReactivationMessage = function(){
        if(thisObject.element.is(":checked"))
            thisObject.messageToHide.hide();
        else
            thisObject.messageToHide.show();
    }
    
    bindEvent(thisObject.element, "change",this.HideOrShowReactivationMessage);
    
    
};

AutoReactivationButton.prototype = new AjaxAttributeValueSender();
AutoReactivationButton.prototype.constructor = AutoReactivationButton;
AutoReactivationButton.prototype.ubber = AjaxAttributeValueSender;




initializeAjaxAttributeValueSenders = function(){
 
    var  autoReactivationSelect = new AjaxAttributeValueSender('.panels-properties-pager-property-info-buttons-reactivation', ['data-property-id','checked'], 'change', '/ajax/property_auto_reactivation');
        
 
   
};

initializeAutoreactivateButtons = function(callbackFunctionName){

    var autreactivationButtons = new AutoReactivationButton(".panels-properties-pager-property-info-buttons-reactivation");

};



loadGmapAsychronously = function (callbackFunctionName)
{
    var script = document.createElement("script");
    script.type = "text/javascript";
    script.src = "http://maps.googleapis.com/maps/api/js?key=AIzaSyATiZqxuB91Vo9_8-ccgLWLHgBfASbIUjE&sensor=true&callback="+ callbackFunctionName;
    document.body.appendChild(script);
}



    
GmapShowCoordenate = function(mapElementSelector,coordenatesElementSelector, zoom){
    var thisObject = this;
    this.mapContainer;
    this.coordenateElement;
    this.zoom;
    this.map;
    this.marker;
    
    
    (thisObject.init = function()
    {
        thisObject.initializeMap(mapElementSelector,coordenatesElementSelector, zoom);
    })();
    

};

GmapShowCoordenate.prototype.initializeMap = function (mapContainerSelectorElement,coordenatesElementSelector, zoom){
   
    var mapElementId = mapContainerSelectorElement.substring(1,mapContainerSelectorElement.length) ;
   
    this.mapContainer=  $(mapContainerSelectorElement);
    
    this.coordenateElement = $(coordenatesElementSelector);
    
    
    this.zoom = zoom;
    
    var initalCoordanatesInString = this.coordenateElement.attr("value");
    
  
    
    var defaultLat = initalCoordanatesInString.split(",")[0];
    var defaultLong = initalCoordanatesInString.split(",")[1];
    
    
    var initialPosition  = new google.maps.LatLng(defaultLat,defaultLong);
    
      
    var defaultOptions =  {
        center: initialPosition, 
        zoom: this.zoom, 
        mapTypeId: google.maps.MapTypeId.ROADMAP
        };
    
    
    
    this.map= new google.maps.Map(document.getElementById(mapElementId), defaultOptions); 
    
    
    this.marker = new google.maps.Marker({
        position: initialPosition, 
        map: this.map, 
        title:"Ubicación de la propiedad."
    });
   
  
};



GmapPicker = function(mapElementSelector,coordenatesElementSelector, zoom)
{
    
    var thisObject = this;
    this.mapElement =  $(mapElementSelector);
    this.coordenateElement = $(coordenatesElementSelector);
    this.zoom;
    this.map;
    this.marker;
    
    this.setPickerFunctionality = function ()
    {
        var clickListener = function(event){
       
            thisObject.marker.setPosition(event.latLng);
            
            var latitudeLongitudValue = event.latLng.lat() + ',' + event.latLng.lng();
            thisObject.coordenateElement.attr("value",latitudeLongitudValue);
        };
         
        google.maps.event.addListener(thisObject.map, 'click', clickListener);
    };
    
    (this.init = function(){

        
        thisObject.initializeMap(mapElementSelector,coordenatesElementSelector, zoom);
        thisObject.setPickerFunctionality();
      
    })();
    
    
    
    
   
};

GmapPicker.prototype =  GmapShowCoordenate.prototype;



initializeGmapPickers = function()
{
    var propertyFormPicker = new GmapPicker("#property-form-gmap-picker","#property-form-coordenates", 7);
}

initializeGmapShowers = function()
{
    var propertySection = new GmapShowCoordenate("#property-ubication-gmap-map","#property-ubication-gmap-coordenate",7);
}

initializeGmaps = function()
{
    var propertyUbicationPicker = $("#property-form-gmap-picker");
    var propertyUbicationShower = $("#property-ubication-gmap-map");
     
     
    if(propertyUbicationPicker.length <= 0 && propertyUbicationShower.length <=0)
        return;
    
    var initializeFunction = propertyUbicationPicker.length >0 ? "initializeGmapPickers" : "initializeGmapShowers";
    loadGmapAsychronously(initializeFunction);
};


StepOfStepByStepForm = function(formContainerSelector,stepIndicatorSelector,sendButtonSelector,cleanButtonSelector,errorMessagesContainer)
{
    var thisObject = this;
    this.formContainerSelector = formContainerSelector;
    this.sendButtonSelector = sendButtonSelector;
    this.cleanButtonSelector = cleanButtonSelector;
    
    
    this.errorMessagesContainer= errorMessagesContainer;
    var recivingScript = $(this.sendButtonSelector).attr("data-reciving-script");
    this.recivingScriptUrl = recivingScript;
    this.stepIndicator = $(stepIndicatorSelector);
    
    this.select = function(){
        thisObject.stepIndicator.addClass("selected");
        $(thisObject.formContainerSelector).show();
    };
    
    this.deselect = function(){
        
        thisObject.stepIndicator.removeClass("selected");
        $(thisObject.formContainerSelector).hide();
    };
    
    this.setAvailable = function(){
        bindEvent(formContainerSelector, "click", thisObject.select);
    };
    
}

StepByStepForm = function(arrayOfStepObjects){
    
    var thisObject = this;
    
     
    
    var numberOfStepObjects = arrayOfStepObjects.length;
    
    $.each(arrayOfStepObjects, function(index,step){
        
            
        new Form(step.formContainerSelector, step.sendButtonSelector, step.cleanButtonSelector, true, step.recivingScriptUrl,function(response){
                
            if(index==0)
                step.select();
               
            printCallbackMessageInContainer(response,'',step.errorMessagesContainer);

            if(response.success)
            {
                    
                step.setAvailable();
                step.deselect();
                var nextStepExist = typeof arrayOfStepObjects[index+1] != "undefined"
                
                        
                if(nextStepExist)
                {
                    var nextStep = arrayOfStepObjects[index+1];
                    nextStep.select();
                }
            }
                    
                
                    
               
        });
    });
    
    
    
    
   
    
};




PrizeCalculator = function(prizeResultDisplay,postNumberDisplay,postNumber,planPrice,factorField){

var thisObject = this;
this.prizeResultDisplay = $(prizeResultDisplay);

this.postNumberDisplay = $(postNumberDisplay);

this.factorField = $(factorField);

this.postsNumber = $(postNumber).val();

this.planPrice = $(planPrice).val();

this.calculate = function(){
        
        var factor = thisObject.factorField.val();
        var postsNumber = thisObject.postsNumber * factor;
        var prizeResult = thisObject.planPrice * factor;                                
        
        thisObject.prizeResultDisplay.html(commify(''+ prizeResult));
        thisObject.postNumberDisplay.html( '' + postsNumber);
    };
    
    bindEvent(this.factorField, "change", thisObject.calculate);

    
}

initializePrizeCalculator = function(){

    var numberOfPostToBuyCalculator = new PrizeCalculator ("#buy-form-buy-result", "#buy-form-post-number-display",  "#buy-form-post-number", "#buy-form-plan-price", "#buy-form-plan-factor");

};


initiazlizeStepByStepForms = function(){
    
    
    var buyFormSteps = [new StepOfStepByStepForm("#buy-form-step-one","#buy-form-step-one-indicator","#buy-form-step-one-submit-button",'',"#buy-form-step-one-error-messages"),
    new StepOfStepByStepForm("#buy-form-step-two", "#buy-form-step-two-indicator"),

    ];
    var buyForm = new StepByStepForm(buyFormSteps);
};


AcceptTermsButton = function(conditionalCheckbox,buttonSelector,eventName,eventHandler,message)
{

    var thisObject = this;
    this.button = $(buttonSelector);
    this.conditionalCheckbox = $(conditionalCheckbox);

    if(typeof message == "undefined")
        message = "Para poder terminar esta compra usted debe aceptar los terminos de uso y privacidad antes de continuar.";
        
     bindEvent(buttonSelector, eventName, function(event){
         if(thisObject .conditionalCheckbox.is(":checked"))
             eventHandler(event);
         else
             alert(message);
     });
 
 
        
    
};

initializeBuyButton =  function (){
    
    var buyButton = new AcceptTermsButton("#buy-form-accept-terms","#buy-form-buy-button","click",function(){
        
    });
};


initializeAjaxConditionalForm = function(){
   var buyForm = new AjaxConditionalForm("#buy-form-container", function(){return $("#buy-form-accept-terms").is(":checked");}, "#buy-form-buy-button", '',function(response){
       
     
        if(response.success)
            window.location.href=("/panel/propiedades");
        else
            alert(response.message);
    });
   
};


$(document).ready(function(){

    extendJquery();
    var ieCssFixes = '<link rel="stylesheet" type="text/css" href="http://'+ window.location.hostname +'/css/propiedadsantiaguera-ie-fixes.css"/>' ;
    if($.browser.msie)
    {
        $('head').append(ieCssFixes);
    }    
    
    initilizeSlideShows();
    initializePropiedadViewer();       
    initializeViewLoaderElements();
    initializeForms();
    initializeOverlays();

    initializeInterestsCalculators();
    initializeHideShowWithArrowDirectionElement();
    initializeHiderAndShowerElement();    
    initializeFilters();    
    initializeJqueryCycleAjaxPager();       
    hideElementsWithHiddenClass();    
    initializeAjaxAttributeValueSenders();
    initializeAutoreactivateButtons();
    initializeGmaps();    
    initiazlizeStepByStepForms();
    initializePrizeCalculator();
    initializeBuyButton();
    initializeAjaxConditionalForm();
/*comentario*/    
});


