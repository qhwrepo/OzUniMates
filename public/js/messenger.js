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

function chat(thread_id,consultant_id) {
  
  // display the avatar if not empty
  var avatar_small;
  $.get("/api/consultant/"+consultant_id+"/avatar_small", function(result){
    avatar_small = result;
    if(avatar_small=='') $('#chat-avatar').attr("src","/img/no_avatar_small.jpg");
    else $('#chat-avatar').attr("src",avatar_small);
  });
  

} 
