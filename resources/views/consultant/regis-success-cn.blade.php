<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>澳联帮 - 注册成功！</title>
    <link href="/css/regis-success.css" rel="stylesheet" media="screen" type="text/css" />
</head>

<body>
<div class="main">
    <h1>{{ \Auth::user("consultant")['username'] }},师弟师妹们等你好久了！</h1>

    <h1>接下来：</h1>
    <div id="hint1" class="hint">1.想来你们学校的师弟师妹会被列出来</div>
    <div id="hint2" class="hint">2.上传个头像，让他们也看到你</div>
    <div id="hint3" class="hint">3.积极地响应师弟师妹们的求助请求吧！</div>

    <div id="hint4" class="hint">如果ta在你的帮助下成功入学，你将获得来自学校的返佣，和来自ta的红包喔！</div>
    <br/>
    <div id="hint5" class="hint"><a href="/consultant/home">开始</a></div>
</div>
</body>

</html>