
function LoaiBoDau(text) {
    var CODAU = "âăêôơưáấắéếóốớúứíýàầằèềòồờùừìỳảẩẳẻểỏổởủửỉỷãẫẵẽễõỗỡũữĩỹạậặẹệọộợụựịỵđ";
    var KODAU = "aaeoouaaaeeooouuiyaaaeeooouuiyaaaeeooouuiyaaaeeooouuiyaaaeeooouuiyd";
    var kq = "";
    var k;

    for (i = 0; i < text.length; i++) {
        k = CODAU.indexOf(text[i]);
        if (k >= 0)
            kq += KODAU[k];
        else
            kq += text[i];
    }

    return kq;
}

function FilterDropDownListBy(dropdownlist, filter) {
    filter = LoaiBoDau(filter.toLowerCase());
    var count = 0;

    var rowcount = dropdownlist.length;
    for (i = 0; i < rowcount; i++) {
        if (LoaiBoDau(dropdownlist.options[i].text.toLowerCase()).indexOf(filter) > -1) {
            dropdownlist.options[i].hide();

        }
        else
            dropdownlist.options[i].show();
    }

    return count;
}

$.ctrlalt = function (key, callback, args) {
    $(document).keydown(function (e) {
        if (!args) args = []; // IE barks when args is null 
        if (e.keyCode == key.charCodeAt(0) && e.ctrlKey && e.altKey) {
            callback.apply(this, args);
            return false;
        }
    });
};


function disableCtrlKeyCombination(e, forbiddenKeys) {
    //list all CTRL + key combinations you want to disable

    var key;
    var isCtrl;
    if (window.event) {
        key = window.event.keyCode;     //IE
        if (window.event.ctrlKey)
            isCtrl = true;
        else
            isCtrl = false;
    }
    else {
        key = e.which;     //firefox
        if (e.ctrlKey)
            isCtrl = true;
        else
            isCtrl = false;
    }
    //if ctrl is pressed check if other key is in forbidenKeys array
    if (isCtrl) {
        for (i = 0; i < forbiddenKeys.length; i++) {
            //case-insensitive comparation
            if (forbiddenKeys[i].toLowerCase() == String.fromCharCode(key).toLowerCase()) {
                alert('Key combination CTRL + '
                    + String.fromCharCode(key)
                    + ' has been disabled.');
                return false;
            }
        }

    }

    return true;

}

//chuẩn bị
$(document).ready(function () {
    // $(".datepicker").datepicker({
    //     dateFormat: "dd/mm/yy",
    // });

});
//end chuẩn bị
var Saving = false;
$(document).on("click", ".saveform", function () {
    if (!Saving) {
        Saving = true;
    }
    else {
        return;
    }
    var container = $(this).data("container");
    var url = $(this).data("url");
    var aftersave = $(this).data("aftersave");
    if (maynghien_validation("#" + container) == 0) {
        $("#spinnergif").trigger("click");
        var params = "?";
        var datatosend = {};
        $("#" + container + " :input").each(function () {

            var Id = $(this).attr('id');
            var name = $(this).attr('name');
            if (name == null && name == "") {
                name = Id;
            }
            var val = $(this).val();
            if ($(this).attr('type') == "checkbox") {
                val = this.checked;
            }

            params += name + "=" + val + "&";
            datatosend[name] = val;
        });
        params = params.slice(0, -1);
        var jsondata = JSON.stringify({ datatosend: datatosend });
        $.ajax({
            type: "post",
            url: url /*+ params*/,
            data: datatosend,
            datatype: "json",
            success: function (data) {
                Saving = false;
                if (aftersave != null && aftersave != "") {
                    window[aftersave](data);
                }
                //$.fancybox.close();
            },
            error: function (data) {
                Saving = false;
            }
        });

    }
    else {
        Saving = false;
    }


});

function Clearform(container) {
    $("#" + container + " :input").each(function () {

        var Id = $(this).attr('id');
        var name = $(this).attr('name');
        if (name == null && name == "") {
            name = Id;
        }
        var val = $(this).val();
        if ($(this).attr('type') == "checkbox") {
            //val = this.checked;
        }
        if ($(this).attr('type') == "text") {
            //val = this.checked;
            $(this).val("");
        }
        //params += name + "=" + val + "&";
        //datatosend[name] = val;
    });
}

function stringToDate(strDate) {
    var arr = strDate.split("/");
    var d = arr[2] + "-" + (arr[1].lenght > 1 ? arr[1] : "0" + arr[1]) + "-" + arr[0];
    return new Date(d);
}
function createformparam(container) {
    var params = "?";
    $("#" + container + " :input").each(function () {

        var Id = $(this).attr('id');
            var name = $(this).attr('name');
            if (name == null && name == "") {
                name = Id;
            }
            
            
        var val = $(this).val();
        if (val == null) val = '';
        if ($(this).attr('type') == "checkbox") {
            val = this.checked;
        }
        params += name + "=" + val + "&";
    });
    params = params.slice(0, -1);
    return params;
}
$(document).on("click", ".findform", function () {

    var container = $(this).data("container");
    var url = $(this).data("url");
    var Grid = $(this).data("grid");
    if (maynghien_validation("#" + container) == 0) {
        var params = createformparam(container);
        var gridurl = url + params;
        $("#" + Grid).setGridParam({
            url: gridurl,
            page: 1
        });
        reload();
    }



});
$(document).on("click", ".exportform", function () {

    var container = $(this).data("container");
    var url = $(this).data("url");

    if (maynghien_validation("#" + container) == 0) {
        var params = createformparam(container);
        var exportdurl = url + params;
        window.open(exportdurl);
    }



});
