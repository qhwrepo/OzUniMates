// picture uploader

$(function(){
	var container = $('.container'), inputFile = $('#file'), img, btn, txt = '上传个头像吧', txtAfter = '颜值好像很高！';
			
	if(!container.find('#upload').length){
		container.find('.input').append('<input type="button" value="'+txt+'" id="upload">');
		btn = $('#upload');
		container.prepend('<img src="" class="hidden" alt="Uploaded file" id="uploadImg" width="100">');
		img = $('#uploadImg');
	}
			
	btn.on('click', function(){
		img.animate({opacity: 0}, 300);
		inputFile.click();
	});

	inputFile.on('change', function(e){
		container.find('label').html( inputFile.val() );
		
		var i = 0;
		for(i; i < e.originalEvent.srcElement.files.length; i++) {
			var file = e.originalEvent.srcElement.files[i], 
				reader = new FileReader();

			reader.onloadend = function(){
				img.attr('src', reader.result).animate({opacity: 1}, 700);
			}
			reader.readAsDataURL(file);
			img.removeClass('hidden');
		}
		
		btn.val( txtAfter );
	});
});

function avatarSubmit() {
	document.getElementById('avatar-form').submit();
}

function dismissAvatar() {
	document.getElementById('modal-mask').style.display = 'none';
}


// modal
(function(){
  var $content = $('.modal_info').detach();

  $('.open_button').on('click', function(e){
  	$('article').css({"z-index": "1"});
    modal.open({
      content: $content,
      width: 840,
      height: 570,
    });
    $content.addClass('modal_content');
    $('.modal, .modal_overlay').addClass('display');
    $('.open_button').addClass('load');

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
    $('.open_button').removeClass('load');
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