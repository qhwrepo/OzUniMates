// popup modal

var $content1 = $('.modal_info1').detach();
var $content2 = $('.modal_info2').detach();
var con_id_msg;

(function(){
  $('.open_button1').on('click', function(e){
    modal.open({
      content: $content1,
      width: 780,
      height: 380,
    });
    $content1.addClass('modal_content');
    $('.modal, .modal_overlay').addClass('display');
    $('.modal, .modal_overlay').removeClass('conceal');
    $('.open_button1').addClass('load');

    rolldown();

  });

}());

var modal = (function(){

  var $close = $('<button role="button" class="modal_close" title="Close"><span></span></button>');
  var $content = $('<div class="modal_content"/>');
  var $modal = $('<div class="modal"/>');
  var $window = $(window);

  $modal.append($content, $close);

  $close.on('click', function(e){
    $('.modal, .modal_overlay').addClass('conceal');
    $('.modal, .modal_overlay').removeClass('display');
    $('.open_button1').removeClass('load');
    $('.open_button2').removeClass('load');
    $("#modal-button").css("visibility","hidden");
    e.preventDefault();
    modal.close();
  });

  return {
    center: function(){
      var top = Math.max($window.height() - $modal.outerHeight(), 0) / 2 - 20;
      var left = Math.max($window.width() - $modal.outerWidth(), 0) / 2;

      $modal.css({
        top: top + $window.scrollTop(),
        left: left + $window.scrollLeft(),
      });
      $("#modal-button").css({
        top: top + $window.scrollTop() + 400,
        left: left + $window.scrollLeft() + 370,
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

var $consultants;
$.get("/api/consultants", function(result){
  $consultants = result;
});

function open_modal(id){
    con_id_msg = id;
    modal.open({
      content: $content2,
      width: 780,
      height: 380,
    });
    $content2.addClass('modal_content');
    $('.modal, .modal_overlay').addClass('display');
    $('.modal, .modal_overlay').removeClass('conceal');
    $('.open_button2').addClass('load');

    var consultant = user_id(id);
    var tagstr = "";

    $.get("/api/consultant/"+id+"/tags", function(result){
        $.each(result, function(index, value) {
          tagstr += value;
          if(index == result.length-1) ;
          else tagstr += ", "
        });
        $('#modal_tag').html(tagstr);
    });

    if(consultant['avatar']=='') $('#modal_avatar_square').attr("src","/img/no_avatar_square.jpg");
    else $('#modal_avatar_square').attr("src",consultant['avatar']);
    $('#modal_username').html(consultant['username']);
    $('#modal_university').html(consultant['university']);
    $('#modal_major').html(consultant['major']);
    $('#modal_major').append(' - '+consultant['specilization']);
    if(consultant['degree']=='bachelor') $('#modal_major').append(' 本科');
    else if(consultant['degree']=='master') $('#modal_major').append(' 硕士');
    else if(consultant['degree']=='phd') $('#modal_major').append(' 博士');
    else if(consultant['degree']=='pre') $('#modal_major').append(' 预科');
    $('#modal_email').html(consultant['email']);
    if(consultant['description']=='') $('#modal_description').html('ta还没有填写简介');
    else $('#modal_description').html(consultant['description']);

    rolldown();
}

// fetch specific user data based on id

function user_id(id) {
  for(i in $consultants) {
    var consultant = $consultants[i];
    if(consultant['id'] == id) return consultant;
  }
}

// pass consultant id and start a new thread
function start_message() {
  document.forms['msgform'].elements['conid'].value = con_id_msg;
  $('#msgform').submit();
}
