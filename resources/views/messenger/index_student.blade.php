<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>澳联帮 - 站内信</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link href="/css/messenger.css" rel="stylesheet" type="text/css" />
</head>

<body>

      
    <div class="container clearfix">
      <div class="people-list" id="people-list">
        <div class="search">
          <input type="text" placeholder="search" />
          <i class="fa fa-search"></i>
        </div>
        <ul class="list">

          @for($i=0; $i<$listLen; $i++)
          <li class="clearfix" onclick="chat({{$threads[$i]->id}},{{$threads[$i]->consultant_id}})">
            <img src="{{$avatarList[$i]}}" alt="avatar" />
            <div class="about">
              <div class="name">{{$usernameList[$i]}}</div>
              <div class="status">
                <i class="fa fa-circle online"></i> online
              </div>
            </div>
          </li>
          @endfor

        </ul>
      </div>
    
      <div class="chat">
        <div class="chat-header clearfix">
          <img alt="avatar" id="chat-avatar" src="{{$avatarList[0]}}" />
          
          <div class="chat-about">
            <div class="chat-with">{{$usernameList[0]}}</div>
            <!-- <div class="chat-num-messages">already 1 902 messages</div> -->
          </div>
        </div> <!-- end chat-header -->
        
        <div class="chat-history">
          <ul id="chat-list">
            <!-- messages are inserted by jquery here -->
            @foreach($messages as $message)
            @if($message->sentByStu)
            <li class="clearfix">
              <div class="message-data align-right">
                <span class="message-data-time" >{{$message->created_at}}</span> &nbsp; &nbsp;
                <span class="message-data-name" >{{$usernameList[0]}}</span> <i class="fa fa-circle me"></i>
                
              </div>
              <div class="message other-message float-right">
                {{$message->content}}
              </div>
            </li>
            @endif
            @endforeach


            <!-- <li class="clearfix">
              <div class="message-data align-right">
                <span class="message-data-time" >10:10 AM, Today</span> &nbsp; &nbsp;
                <span class="message-data-name" >Olia</span> <i class="fa fa-circle me"></i>
                
              </div>
              <div class="message other-message float-right">
                Hi Vincent, how are you? How is the project coming along?
              </div>
            </li>
            
            <li>
              <div class="message-data">
                <span class="message-data-name"><i class="fa fa-circle online"></i> Vincent</span>
                <span class="message-data-time">10:12 AM, Today</span>
              </div>
              <div class="message my-message">
                Are we meeting today? Project has been already finished and I have results to show you.
              </div>
            </li>
            
            <li class="clearfix">
              <div class="message-data align-right">
                <span class="message-data-time" >10:14 AM, Today</span> &nbsp; &nbsp;
                <span class="message-data-name" >Olia</span> <i class="fa fa-circle me"></i>
                
              </div>
              <div class="message other-message float-right">
                Well I am not sure. The rest of the team is not here yet. Maybe in an hour or so? Have you faced any problems at the last phase of the project?
              </div>
            </li>
            
            <li>
              <div class="message-data">
                <span class="message-data-name"><i class="fa fa-circle online"></i> Vincent</span>
                <span class="message-data-time">10:20 AM, Today</span>
              </div>
              <div class="message my-message">
                Actually everything was fine. I'm very excited to show this to our team.
              </div>
            </li>
            
            <li>
              <div class="message-data">
                <span class="message-data-name"><i class="fa fa-circle online"></i> Vincent</span>
                <span class="message-data-time">10:31 AM, Today</span>
              </div>
              <i class="fa fa-circle online"></i>
              <i class="fa fa-circle online" style="color:#AED2A6"></i>
              <i class="fa fa-circle online" style="color:#DAE9DA"></i>
            </li> -->
            
          </ul>
          
        </div> <!-- end chat-history -->
        
        <div class="chat-message clearfix">
          {!! Form::open(['id'=>'chatform','url'=>'student/messages/new']) !!}
            <input type="text" name="thread_id" class="hidden" value="{{$threads[0]->id}}"/>
            <input type="text" name="sentByStu" class="hidden" />
          {!! Form::close() !!}
          <textarea name="content" id="message-to-send" form="chatform"
          placeholder ="Type your message" rows="3"></textarea>
          
<!--           attachments, to be implemented        
          <i class="fa fa-file-o"></i> &nbsp;&nbsp;&nbsp;
          <i class="fa fa-file-image-o"></i> -->
          <button onclick="send_message()">Send</button>

        </div> <!-- end chat-message -->
        
      </div> <!-- end chat -->
    
  </div> <!-- end container -->

    <script type="text/javascript" src="/js/jquery.min.js"></script>
    <script type="text/javascript" src="/js/dist/list.min.js"></script>
    <script type="text/javascript" src="/js/messenger/messenger_student.js"></script>
</body>

</html>