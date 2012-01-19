


Implements = function (referenceToConstructorWhoImplements){
    var constructorThatimplements = referenceToConstructorWhoImplements;
    var interfacesReferences;
    
    for(i=1; i<arguments.length; i++)
    {
        for(property in arguments[i])
        {
                var propertyReference = arguments[i][property];
                if(typeof propertyReference == 'function')
                    {
                        if(typeof constructorThatimplements[property] == 'undefined')
                            throw "The constructor " + constructorThatimplements + " doesnt implement the method" +property ;
                    }
                    
         }
    }
    
    
};