<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>澳联帮 - 注册成功！</title>
    <link href="/css/regis-success.css" rel="stylesheet" media="screen" type="text/css" />
</head>

<body>
<div class="main">
    <h1>Welcome，{{ \Auth::user("student")['username'] }}!</h1>

    <h1>Now：</h1>
    <div id="hint1" class="hint">1.Find matching schoolmates based on "tags" and "description"</div>
    <div id="hint2" class="hint">2.Click on "Hi" and get communication details</div>
    <div id="hint3" class="hint">3.Consult him/her referring to the skill sets. Done!</div>

    <div id="hint4" class="hint">This is a community where students help other students. We don't charge consultation fee.</div>
    <div id="hint5" class="hint">But we do encourage you, after the senior's help, give him/her a "lucky money"!</div>
    <div id="hint6" class="hint"><a href="/student/home">Start</a></div>
</div>
</body>

</html>