var uniIndex = {
	'anu' : '澳大利亚国立大学',
	'umel' : '墨尔本大学',
	'usyd' : '悉尼大学',
	'unsw' : '新南威尔士大学',
	'monash' : '莫纳什大学',
	'queensland' : '昆士兰大学',
	'macquarie' : '麦考瑞大学',
	'ugriffith' : '格里菲思大学',
	'urealmel' : '墨尔本皇家理工学院',
  'adelaide' : '阿德莱德大学'
}

// picture uploader

$(function(){ 
    var $uploadCrop; 
 
    function readFile(input) { 
         if (input.files && input.files[0]) { 
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


// popup modal

var $content1 = $('.modal_info1').detach();
var $content2 = $('.modal_info2').detach();

(function(){
  $('.open_button1').on('click', function(e){
  	$('article').css({"z-index": "1"});
    modal.open({
      content: $content1,
      width: 840,
      height: 570,
    });
    $content1.addClass('modal_content');
    $('.modal, .modal_overlay').addClass('display');
    $('.open_button1').addClass('load');

  });

}());

var modal = (function(){

  var $close = $('<button role="button" class="modal_close" title="Close"><span></span></button>');
  var $content = $('<div class="modal_content"/>');
  var $modal = $('<div class="modal"/>');
  var $window = $(window);

  $modal.append($content, $close);

  $close.on('click', function(e){
  	$('article').css({"z-index": "1001"});
    $('.modal, .modal_overlay').addClass('conceal');
    $('.modal, .modal_overlay').removeClass('display');
    $('.open_button1').removeClass('load');
    $('.open_button2').removeClass('load');
    e.preventDefault();
    modal.close();
  });

  return {
    center: function(){
      var top = Math.max($window.height() - $modal.outerHeight(), 0) / 2;
      var left = Math.max($window.width() - $modal.outerWidth(), 0) / 2;
      $modal.css({
        top: top + $window.scrollTop(),
        left: left + $window.scrollLeft(),
      });
    },
    open: function(settings){
      $content.empty().append(settings.content);

      $modal.css({
        width: settings.width || 'auto',
        height: settings.height || 'auto'
      }).appendTo('body');

      modal.center();
      $(window).on('resize', modal.center);
    },
    close: function(){
      $content.empty();
      $modal.detach();
      $(window).off('resize', modal.center);
    }
  };
}());

// getting data from api

var $students;
$.get("/api/students", function(result){
	$students = result;
});

function open_modal(id){
    modal.open({
      content: $content2,
      width: 840,
      height: 570,
    });
    $content2.addClass('modal_content');
    $('.modal, .modal_overlay').addClass('display');
    $('.open_button2').addClass('load');

    var student = user_id(id);
   	var uni_list = split_translate(student['universities'],uniIndex);
    if(student['avatar']=='') $('#modal_avatar').attr("src","/img/no_avatar_square.jpg");
    else $('#modal_avatar_square').attr("src",student['avatar']);
    $('#modal_username').html(student['username']);
    $('#modal_university').html(uni_list);
    $('#modal_major').html(student['majors']);
    $('#modal_email').html(student['email']);
    $('#modal_description').html(student['description']);
}

// fetch specific user data based on id

function user_id(id) {
	for(i in $students) {
		var student = $students[i];
		if(student['id'] == id) return student;
	}
}

function split_translate(list,index){
	var res_arr = [];
	var ini_arr = list.split(',');
	for(i in ini_arr) {
    if(i == ini_arr.length-1) res_arr.push(index[ini_arr[i]]);
		else res_arr.push(index[ini_arr[i]]+'，');
	}
	return res_arr;
}