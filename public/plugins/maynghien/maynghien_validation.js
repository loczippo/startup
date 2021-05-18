
function IsEmail(email) {
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email);
}
function IsPhone(Phone) {
    var regex = /([0-9]{10})|(\([0-9]{3}\)\s+[0-9]{3}\-[0-9]{4})/;
    return regex.test(Phone);
}
function IsInteger(text) {
    var regex = /^\d+$/;
    return regex.test(text);
}
function IsFloat(text) {
    var regex = /^\d{0,2}(\.\d{0,2}){0,1}$/;
    return regex.test(text);
}
// return code: 
// 0: không có lỗi
// 1: null
// 2: độ dài
// 3: email
// 4: phone
// 5: integer
//6: interger lenght
function validate_Input_maynghien(input, inputtype, allownull, inputlenght,minlenght) {
    var val = input.val();
    val = $.trim(val);
    if (allownull && (val == null || val == "")) {
        return 0;
    }
    else if (!allownull && (val == null || val == "")) {
        return 1;
    }
    if (inputtype == "email" || inputtype == "text" || inputtype == "phone") {
        if (val.length > inputlenght || (minlenght > 0 && val.length < minlenght)) {
            return 2;
        }
    }
    if (inputtype == "email") {
        if(IsEmail(val)){
            return 0;
        }
        else{
            return 3;
        }
    }
    if (inputtype == "phone") {
        if (IsPhone(val)) {
            return 0;
        }
        else {
            return 4;
        }
    }
    if (inputtype == "integer") {
        if (IsInteger(val)) {
           
            if (inputlenght > 0 && parseInt(val) > inputlenght) {
                return 6;
            }
            if (minlenght > 0 && parseInt(val) < minlenght) {
                return 6;
            }
            return 0;
        }
        else {
            return 5;
        }
    }

    if (inputtype == "float") {
        if (IsFloat(val)) {

            if (inputlenght > 0 && parseFloat(val) > inputlenght) {
                return 6;
            }
            return 0;
        }
        else {
            return 7;
        }
    }

    return 0;
}
function maynghien_validation(container) {
    var selector = container + " :input";
    var result = 0;
    $(selector).each(function () {
        var inputtype = $(this).data("valid");
        var input = $(this);
        var allownull = !$(this).prop('required');
        var inputlenght = $(this).data("lenght");
        var inputminlenght = $(this).data("minlenght");
        result = validate_Input_maynghien(input, inputtype, allownull, inputlenght, inputminlenght);
        var msg = "";
        input.parent().next(".validation").remove(); // remove msg err
        switch (result) {
           
            case 1:
                msg = $(input).data("label") +" không được để trống!";
                break;
            case 2:
                msg = $(input).data("label") +" không nhập quá " + inputlenght + " ký tự" + (inputminlenght != null ? " và không được nhỏ hơn " + inputminlenght : "") + "!";
                break;
            case 3:
                msg = "Email không đúng định dạng!";
                break;
            case 4:
                msg = "Số điện thoại không đúng!";
                break;
            case 5:
                msg = $(input).data("label") +" phải nhập số nguyên!";
                break;
            case 6:
                if (inputlenght > 0 && inputminlenght <= 0 )
                    msg = $(input).data("label") + " phải nhỏ hơn " + inputlenght;
                if (inputminlenght > 0 && inputminlenght >= 0)
                    msg = $(input).data("label") + " phải lớn hơn " + inputminlenght;
                if(inputlenght>0 && inputminlenght>0 && inputlenght!=inputminlenght)
                    msg = $(input).data("label") + " phải nằm trong khoảng từ " + inputminlenght + " đến " + inputlenght + "!";
                if (inputlenght > 0 && inputminlenght > 0 && inputlenght == inputminlenght)
                    msg = $(input).data("label") + " phải bằng " + inputminlenght;
                break;
            case 7:
                msg = $(input).data("label") +" phải nhập số!";
                break;

        }
        if (result > 0)
        {
            $.notify({
                title: '<strong>Không lưu được!</strong>',
                message: msg
            }, {
                    type: 'danger'
                });
            $(this).focus();
            return false;
            
        }
        //return true;
       

    });// each
    
    return result;
}