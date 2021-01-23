// Collapse button AnimationEffect
var fhAdvance = false;
var fhDelLink = false;

$("#fh-advance-toggler").on("click", function () {
    if (fhAdvance) {
        fhAdvance = false
        $("#fh-advance-toggler").addClass("ion-arrow-down-b");
        $("#fh-advance-toggler").removeClass("ion-arrow-up-b");
    } else {
        fhAdvance = true;
        $("#fh-advance-toggler").removeClass("ion-arrow-down-b");
        $("#fh-advance-toggler").addClass("ion-arrow-up-b");
    }
});

$("#fh-del-link-toggler").on("click", function () {
    if (fhDelLink) {
        fhDelLink = false
        $("#fh-del-link-toggler").addClass("ion-arrow-down-b");
        $("#fh-del-link-toggler").removeClass("ion-arrow-up-b");
    } else {
        fhDelLink = true;
        $("#fh-del-link-toggler").removeClass("ion-arrow-down-b");
        $("#fh-del-link-toggler").addClass("ion-arrow-up-b");
    }
});


function checkURL(link) {
    var string = link.value;
    if (!~string.indexOf("http") && !~string.indexOf("https")) {
        string = "http://" + string;
    }
    link.value = string;
    return link
}

// File hosting form
var bar = $('.bar');
var percent = $('.percent');
$('#fh_form').ajaxForm({
    beforeSend: function () {
        // var percentVal = '0%';
        // bar.width(percentVal)
        // percent.html(percentVal);
        $(".loading-anim").removeClass("display-none");
        $("#fh_form").addClass("display-none");
    },
    uploadProgress: function (event, position, total, percentComplete) {
        // var percentVal = percentComplete + '%';
        // bar.width(percentVal)
        // percent.html(percentVal);
    },
    complete: function (xhr) {
        // alert('File Has Been Uploaded Successfully');
        $(".loading-anim").addClass("display-none");
        
        // Setup response
        $("#res_filename").val(xhr['responseJSON']['filename']);
        $("#res_link").val(xhr['responseJSON']['temp_link']);
        $("#res_del_link").val(xhr['responseJSON']['temp_del_link']);

        // Key
        if(xhr['responseJSON']['key'] != null){
            $("#res_key").val(xhr['responseJSON']['key']);
        }else{
            $("#res_key_container").addClass("display-none");
        }

        // Message
        if(xhr['responseJSON']['message'] != null){
            $("#res_message").val(xhr['responseJSON']['message']);
        }else{
            $("#res_message_container").addClass("display-none");
        }
        
        // Response div container
        $("#fh_response").removeClass("display-none");
    }
});


// Short link form
$('#sl_form').ajaxForm({
    beforeSend: function () {
        // var percentVal = '0%';
        // bar.width(percentVal)
        // percent.html(percentVal);
        $("#sl_form").addClass("display-none");
    },
    uploadProgress: function (event, position, total, percentComplete) {
        // var percentVal = percentComplete + '%';
        // bar.width(percentVal)
        // percent.html(percentVal);
    },
    complete: function (xhr) {
        // alert('Link Has Been Generated Successfully');
        $("#res_sl_container").removeClass("display-none");

        // Setup response
        $("#res_your_link").val(xhr['responseJSON']['shortlink']['link']);
        $("#res_short_link").val(xhr['responseJSON']['domain'] + xhr['responseJSON']['shortlink']['code']);
    }
});

// Copy link
function copyLink(param = ""){
    var copyText;

    // Select input text and re-enabling it
    if(param == ""){
        copyText = document.getElementById('res_link');
        $("#res_link").removeAttr("disabled");
    }else if(param == 'short_link'){
        copyText = document.getElementById('res_short_link');
        $("#res_short_link").removeAttr("disabled");
    }else{
        copyText = document.getElementById('res_del_link');
        $("#res_del_link").removeAttr("disabled");
    }

    // Select text and copy from input
    copyText.select();
    copyText.setSelectionRange(0, 99999)
    document.execCommand("copy");
    
    // Disabling input text
    if(param == ""){
        $("#res_link").attr("disabled", "");
    }else if(param == 'short_link'){
        $("#res_short_link").attr("disabled", "");
    }else{
        $("#res_del_link").attr("disabled", "");
    }

    // Show alert dialog confirmation
    alert("Copied the link: " + copyText.value);
}


// Verify key
$("#fh_verify_key").on("submit", function (e) {
    e.preventDefault();
    var key = $("#fh-key").val();
    var url = $("#fh-key").attr("data-url") + "/" + key;

    window.open(url, "_self");
});


// Download file
function downloadfile(url, dld_url) {
    $.ajax({
       "url": dld_url,
       "error": function (e){
           console.log(e);
       }
    });
    
    window.open(url, "_blank");
    location.reload();
}