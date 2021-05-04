$(document).ready(function () {
    //alert('ok123 ');

    CheckValidation.RequiredInput();

});

// id: #
// class: .
var CheckValidation = (function () {
    var CheckInput = function () {
        try {
            $('#c1').on('keyup', function (e) {
                console.log(e);
                var getVal = $('#c1').val();
                console.log('Value:' + getVal);
            });


        }
        catch (e) {
            console.log('OnlyInputNumber: ' + e.message);
        }
    };
    var RequiredInput = function () {
        try {
            $('#BTN_Search').on('click', function () {
                var err = 0;
                $('.required').each(function () {
                    var getVal = $(this).val();
                    if (getVal === '') {
                        $(this).addClass('error');
                        err++;
                    } else {
                        $(this).removeClass('error');
                    }



                })
                //err = 0;
                if (err == 0) {

                    var valC1 = $("#user_cd").val();
                    var valC2 = $("#user_nm_j").val();
                    var valC3 = $("#user_nm_e").val();

                    // AJAX 
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        method: "POST",// phương thức dữ liệu được truyền đi
                        url: "/search", // c1
                        data: {
                            user_cd: valC1,
                            user_nm_j: valC2,
                            user_nm_e: valC3,

                        },
                        success: function (response) {

                            console.log(response);
                            var arr = JSON.parse(JSON.stringify(response));
                            $('#searchTable').find("tbody tr").remove();
                            $.each(arr, function (key, value) {
                                console.log(value['user_cd']);
                                $('#searchTable').append("<tr><td>" + value['user_cd'] + "</td><td>"
                                    + value['user_nm_j'] + "</td><td>"

                                    + value['user_ab_j'] + "</td><td>"

                                    + value['user_nm_e'] + "</td><td>"

                                    + value['user_ab_e'] + "</td><td>"

                                    + value['lib_val_nm_j'] + "</td><td>"

                                    + value['lib_val_nm_js'] + "</td></tr>"


                                );
                            });
                        }
                    });



                } else {
                    console.log("not");
                }
            });
        }
        catch (e) {
            console.log('OnlyInputNumber: ' + e.message);
        }
    };
    

    var Submit = function () {
        try {
            console.log("123");
            $("form").submit(function () {
                alert("Submitted");
            });
        }
        catch (e) {
            console.log('OnlyInputNumber: ' + e.message);
        }
    };

    return {
        Submit: Submit,
        CheckInput: CheckInput,
        RequiredInput: RequiredInput
    };
})();


