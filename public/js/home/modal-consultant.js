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
    $('article').css({"z-index": "15"});
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

var $students;
$.get("/api/students", function(result){
  $students = result;
});

function open_modal(id){
    $('article').css({"z-index": "1"});
    modal.open({
      content: $content2,
      width: 840,
      height: 570,
    });
    $content2.addClass('modal_content');
    $('.modal, .modal_overlay').addClass('display');
    $('.open_button2').addClass('load');

    var student = user_id(id);
    if(student['avatar']=='') $('#modal_avatar').attr("src","/img/no_avatar_square.jpg");
    else $('#modal_avatar_square').attr("src",student['avatar']);
    $('#modal_username').html(student['username']);
    $('#modal_university').html(student['universities']);
    $('#modal_major').html(student['majors']);
    $('#modal_email').html(student['email']);
    console.log(student['description']=='');
    if(student['description']=='') $('#modal_description').html('ta决定暂时保持神秘');
    else $('#modal_description').html(student['description']);
}

// fetch specific user data based on id

function user_id(id) {
  for(i in $students) {
    var student = $students[i];
    if(student['id'] == id) return student;
  }
}
