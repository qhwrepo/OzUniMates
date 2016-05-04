  // toggle a class on body to affect nav and workarea behaviour

$('#site-nav--toggle').click(function(){
  $('body').toggleClass('body__expanded');
});

$(window).resize(function() {
  $('body').removeClass('body__expanded');
});

// wrap the accordion

$(function() {
  $(".expand").on( "click", function() {
    $(this).next().slideToggle(200);
    $expand = $(this).find(">:first-child");

    if($expand.text() == "+") {
      $expand.text("-");
    } else {
      $expand.text("+");
    }
  });
});

function set_notification(para) {
  var daForm = document.forms['notification-form'];
  daForm.elements['frequency'].value = para;
  daForm.submit();
}
