$(document).ready(function () {
    DemoModule.Init();
    DemoModule.InitEvents();
});
var CommonModule = (function () {

    var Validate = function() {
        try {
            var error = 0;
            $('.required').each(function(){
                var $input = $(this);
                var val = $input.val();
                if(val === '') {
                    $input.addClass('error');
                    error++;
                }
                else {
                    $input.removeClass('error');
                }
            });
            if (error > 0) {
                return false;
            }
            return true;
        }
        catch (e) {
            console.log('Submit: ' + e.message);
        }
    };

    return {
        Validate: Validate
    };
})();
// singleton
var DemoModule = (function () {
    var Init = function () {
        try {
        }
        catch (e) {
            console.log('Init: ' + e.message);
        }
    };

    var InitEvents = function () {
        try {
            $('.number-only').on('keyup', function (e) {
                OnlyInputNumber(e, $(this));
            });
            $('#btn-submit').on('click', function(){
                Submit();
            });
        }
        catch (e) {
            console.log('InitEventLogin: ' + e.message);
        }
    };

    var OnlyInputNumber = function (e, $input) {
        try {
            $input.val($input.val().replace(/[^0-9]/g, ""));
            if ((e.which < 48 || e.which > 57)) {
                e.preventDefault();
            }
        }
        catch (e) {
            console.log('OnlyInputNumber: ' + e.message);
        }
    };

    var Submit = function() {
        try {
            if (CommonModule.Validate()){
                /// submit
            }
            else {
                $('.error').first().focus();
                alert('error');
            }
        }
        catch (e) {
            console.log('Submit: ' + e.message);
        }
    };

    return {
        Init: Init,
        InitEvents: InitEvents
    };
})();
