<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>澳联帮 - 站内信</title>
    <link href="/css/messenger.css" rel="stylesheet" type="text/css" />
</head>

<body>

      
    <div class="container clearfix">
      <div class="people-list" id="people-list">
        <div class="search">
          <input type="text" placeholder="search" />
        </div>
        <a id="back" href="/consultant/home">返回</a>
        <ul class="list">

          @for($i=0; $i<$listLen; $i++)
          <li class="clearfix" onclick="chat({{$threads[$i]->id}},{{$threads[$i]->student_id}})">
            <img src="{{$avatarList[$i]}}" alt="avatar" />
            <div class="about">
              <div class="name">{{$usernameList[$i]}}</div>
              <div class="status">
                <!-- more info? -->
              </div>
            </div>
          </li>
          @endfor

        </ul>
      </div>
    
      <div class="chat">
        <div class="chat-header clearfix">
          @if(sizeof($avatarList)>0)
          <img alt="avatar" id="chat-avatar" src="{{$avatarList[0]}}" />
          @endif
          
          <div class="chat-about">
            @if(sizeof($usernameList)>0)
            <div class="chat-with">{{$usernameList[0]}}</div>
            @endif
            <!-- <div class="chat-num-messages">already 1 902 messages</div> -->
          </div>
        </div> <!-- end chat-header -->
        
        <div class="chat-history">
          <ul id="chat-list">
            <!-- messages are inserted by jquery here -->
            @foreach($messages as $message)
            @if(!$message->sentByStu)
            <li class="clearfix">
              <div class="message-data align-right">
                <span class="message-data-time" >{{$message->created_at}}</span> &nbsp; &nbsp;
                <span class="message-data-name" >我</span>
              </div>
              <div class="message other-message float-right">
                {{$message->content}}
              </div>
            </li>
            @elseif($message->sentByStu)
            <li>
              <div class="message-data">
                <span class="message-data-name">{{$usernameList[0]}}</span>
                <span class="message-data-time">{{$message->created_at}}</span>
              </div>
              <div class="message my-message">
                {{$message->content}}
              </div>
            </li>
            @endif
            @endforeach
            
          </ul>
          
        </div> <!-- end chat-history -->
        
        <div class="chat-message clearfix">
          {!! Form::open(['id'=>'chatform','url'=>'consultant/messages/new']) !!}
            @if(sizeof($threads)>0)
            <input type="text" name="thread_id" class="hidden" value="{{$threads[0]->id}}"/>
            @else
            <input type="text" name="thread_id" class="hidden" value=""/>
            @endif
            <input type="text" name="sentByStu" class="hidden" />
          {!! Form::close() !!}
          <textarea name="content" id="message-to-send" form="chatform"
          placeholder ="Type your message" rows="3"></textarea>
          
          <button onclick="send_message()">发送</button>

        </div> <!-- end chat-message -->
        
      </div> <!-- end chat -->
    
  </div> <!-- end container -->

    <script type="text/javascript" src="/js/jquery.min.js"></script>
    <script type="text/javascript" src="/js/dist/list.min.js"></script>
    <script type="text/javascript" src="/js/messenger/messenger_consultant.js"></script>
</body>

</html>