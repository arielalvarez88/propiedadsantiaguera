(

function ($){

var variables = {

    rules: {},
    elementsToValidate: new Array(),
    errorMessages: new Array()
    
};

var methods = {

    init: function(){
        
        
        
        
        
        
        
        variables['errorMessages'] = array();
         var errorMessages =new Array();
         
        $.each(variables['elementsToValidate'], function(index,elementToValidateInfo){
            var element = $(elementToValidateInfo.elementSelector);
            var rules = elementToValidateInfo.rules.split('|');
            
            
            
            $.each(rules, function(index,ruleName){
                
                
                var result = variables.rules['ruleName'].booleanFunction.apply(element);
                
                if(!result)
                {
                        var errorMessage  = variables.rules['ruleName'].errorMessage.place('%s',elementToValidateInfo.elementNickname);
                        $(elementToValidateInfo.errorDisplayElement).append(errorMessage + '<br/>');
                        errorMessages.push(errorMessage);
                }
                    
                
                
            });

        });
        
        if(errorMessages.length > 0)            
            {
                 variables['errorMessages'] = errorMessages;
                 return false;
            }
                
            
        return true;
            
    

    },


    addRule : function(configObject){
        
        var ruleName = configObject.ruleName;
        variables[rules][ruleName] = configObject;
    },
    
    validateField: function(configObject){
        variables['elementsToValidate'].push(configObject);
    },
    
    
    validateFields: function(configObject){
        variables['elementsToValidate'] = configObject;
    }
    
    
    

};






$.fn.validate = function(functionOrProperty,configObject){

    if(methods[functionOrProperty])
        return methods[functionOrProperty].apply(this,configObject);
    
    else if ( typeof variables[functionOrProperty] != "undefined")
            return variables[functionOrProperty];         
    
    
    
     return methods['init'].apply(this);


};



})(jQuery);