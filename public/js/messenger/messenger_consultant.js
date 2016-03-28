var current_thread;
var current_avatar;
var current_mate;
var current_messages;

 (function(){
  
  var searchFilter = {
    options: { valueNames: ['name'] },
    init: function() {
      var userList = new List('people-list', this.options);
      var noItems = $('<li id="no-items-found">No items found</li>');
      
      userList.on('updated', function(list) {
        if (list.matchingItems.length === 0) {
          $(list.list).append(noItems);
        } else {
          noItems.detach();
        }
      });
    }
  };
  
  searchFilter.init();
  
})();

function appendChat() {
  $("#chat-list").empty();
  $.each(current_messages, function(index, value) {
    if(value["sentByStu"]==0) {
      $("#chat-list").append('<li class="clearfix"><div class="message-data align-right"><span class="message-data-time" >'
        + value["created_at"] +
        '</span> &nbsp; &nbsp;<span class="message-data-name">'
        + '我' +
        '</span></div><div class="message other-message float-right">'
        + value["content"] +
        '</div></li>');
    }
    else {
      $("#chat-list").append('<li><div class="message-data"><span class="message-data-name">'
        + current_mate +
        '</span><span class="message-data-time">'
        + value["created_at"] +
        '</span></div><div class="message my-message">'
        + value["content"] + 
        '</div></li>');
    }
  });
}

function chat(thread_id,student_id) {
  
  current_thread = thread_id;

  // display the avatar if not empty
  $.get("/api/student/"+student_id+"/avatar_small", function(result){
    current_avatar = result;
    if(current_avatar=='') $('#chat-avatar').attr("src","/img/no_avatar_small.jpg");
    else $('#chat-avatar').attr("src",current_avatar);
  });

  // display curernt uunimate who you are talking with
  $.get("/api/student/"+student_id+"/username", function(result){
    current_mate = result;
    $('.chat-with').html(current_mate);
  });  

  // display messages under this thread
  $.get("/api/thread/"+thread_id+"/messages", function(result){
    current_messages = result;
    appendChat();
  });

}

function send_message() {
  var daForm = document.forms['chatform'];
  if(current_thread!=null) daForm.elements['thread_id'].value = current_thread;
  daForm.elements['sentByStu'].value = 0;
  document.getElementById('chatform').submit();
} 
