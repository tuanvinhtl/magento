define([
    'jquery'
], function ($) {
    "use strict";

    return function () {
        $.validator.addMethod(
            'validate-minimum-age',
            function (value) {
                console.log(value);
                if(value){
                    return true;
                }
                else{
                    return false;
                }
            },
            $.mage.__('Your validation error message')
        );
    }
});
