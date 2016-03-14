// picture uploader

$(function(){ 
    var $uploadCrop; 
 
    function readFile(input) { 
         if (input.files && input.files[0]) {
            $(".not-active").removeClass("not-active");
            var reader = new FileReader(); 
             
            reader.onload = function (e) { 
                $uploadCrop.croppie('bind', { 
                    url: e.target.result 
                }); 
            } 
             
            reader.readAsDataURL(input.files[0]); 
        } 
        else { 
            alert("你的浏览器暂不支持！"); 
        } 
    } 

    $uploadCrop = $('#upload-demo').croppie({ 
        viewport: { 
            width: 350, 
            height: 350, 
            type: 'square' 
        }, 
        boundary: { 
            width: 400, 
            height: 400 
        } 
    }); 

    $('#upload').on('change', function () {  
        $(".crop").show();
        $("#greet_upload").html("重新上传");
        $("#modal_avatar").css("top","0%");
        $("#greet").hide(); 
        $(".actions").css("padding-bottom","0px");
        readFile(this);
    }); 

    $('#submit-avatar').on('click', function (ev) {
        $uploadCrop.croppie('result', {
          type: 'canvas',
          size: 'viewport'
        }).then(function (resp) { 
            $('#cropped_avatar').val(resp);
            $('#avatar-form').submit();
          });
    });
    $('#dismiss-avatar').on('click', function() {
        $('#modal_mask').hide();
        $('#modal_avatar').hide();
    });

}); 


// modal - common use
function rolldown() {
  $('.rolldown-list li').each(function () {
      // var delay = ($(this).index()/4+0.8) + 's';
      // $(this).css({
      //     webkitAnimationDelay: delay,
      //     mozAnimationDelay: delay,
      //     animationDelay: delay
      // });
      // $(".btn-2").css("visibility","visible");
    });
}

function weihu() {
    alert("功能即将上线：）");
}



