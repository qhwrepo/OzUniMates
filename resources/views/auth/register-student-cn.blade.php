<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>澳联帮 - 注册</title>
    <link href="/css/registration.css" rel="stylesheet" media="screen" type="text/css" />
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/loading.css" rel="stylesheet" media="screen" type="text/css" />
</head>

<body onload="disableSubmit()">

<div class="loading">
  <div class="box1"></div>
  <div class="box2"></div>
  <div class="box3"></div>
</div>

<div class="loading-wrap">

<h2>先来点基本信息吧。</h2>

<!-- multistep form -->

{!! Form::open(['id'=>'msform','url'=>'student/register']) !!}
    <!-- progressbar -->
    <ul class="progressbar" id="stupb">
        <li class="active"></li>
        <li></li>
        <li></li>
        <li></li>
    </ul>
    <!-- fieldsets -->
    <fieldset>
        <h2 class="fs-title">准备读什么学位？</h2>
        <input type="button" class="next action-button" value="预科" onclick="setDegree('pre')"/>
        <input type="button" class="next action-button" value="本科" onclick="setDegree('bachelor')"/>
        <input type="button" class="next action-button" value="硕士" onclick="setDegree('master')"/>
        <input type="button" class="next action-button" value="博士" onclick="setDegree('phd')"/>
        <input type="text" name="degree" class="hidden" />
    </fieldset>
    <fieldset>
        <h2 class="fs-title">有目标学校吗（可多选）？</h2>
        <input type="button" class="action-button" value="还没有目标" onclick="addUniversity(this.value)" />
        <div class="fs-subtitle">澳洲八大</div>
        <input type="button" class="action-button" value="澳大利亚国立大学" onclick="addUniversity(this.value)" />
        <input type="button" class="action-button" value="墨尔本大学"  onclick="addUniversity(this.value)"/>
        <input type="button" class="action-button" value="悉尼大学" onclick="addUniversity(this.value)"/>
        <input type="button" class="action-button" value="新南威尔士大学" onclick="addUniversity(this.value)"/>
        <input type="button" class="action-button" value="莫纳什大学" onclick="addUniversity(this.value)"/>
        <input type="button" class="action-button" value="昆士兰大学" onclick="addUniversity(this.value)"/>
        <input type="button" class="action-button" value="西澳大学" onclick="addUniversity(this.value)"/>
        <input type="button" class="action-button" value="阿德莱德大学" onclick="addUniversity(this.value)"/>
        <div class="fs-subtitle">其他热门院校</div>
        <input type="button" class="action-button" value="麦考瑞大学" onclick="addUniversity(this.value)" />
        <input type="button" class="action-button" value="格里菲思大学"  onclick="addUniversity(this.value)"/>
        <input type="button" class="action-button" value="墨尔本皇家理工学院" onclick="addUniversity(this.value)"/>
        <input type="button" class="action-button" value="悉尼科技大学" onclick="addUniversity(this.value)"/>
        <input type="button" class="action-button" value="迪肯大学" onclick="addUniversity(this.value)"/>
        <input type="button" class="action-button" value="卧龙岗大学" onclick="addUniversity(this.value)"/>
        <input type="button" class="action-button" value="维多利亚大学" onclick="addUniversity(this.value)"/>
        <input type="button" class="action-button" value="斯威本科技大学" onclick="addUniversity(this.value)"/>
        <input type="button" class="action-button" value="科廷科技大学" onclick="addUniversity(this.value)" />
        <input type="button" class="action-button" value="默多克大学"  onclick="addUniversity(this.value)"/>
        <input type="button" class="action-button" value="南澳大学" onclick="addUniversity(this.value)"/>
        <input type="button" class="action-button" value="纽卡斯尔大学" onclick="addUniversity(this.value)"/>
        <input type="button" class="action-button" value="查尔斯斯图亚特大学" onclick="addUniversity(this.value)"/>
        <input type="button" class="action-button" value="拉筹伯大学" onclick="addUniversity(this.value)"/>
        <input type="button" class="action-button" value="昆士兰科技大学" onclick="addUniversity(this.value)"/>
        <input type="button" class="action-button" value="詹姆斯库克大学" onclick="addUniversity(this.value)"/>
        <input type="button" class="action-button" value="其他" onclick="addUniversity(this.value)"/>
        <input type="text" name="universities" class="hidden"/>
        <br/>
        <a class="previous fa fa-chevron-circle-left fa-3x"></a>
        <a class="next fa fa-chevron-circle-right fa-3x" id="aUniversities"></a>
    </fieldset>
    <fieldset>
        <h2 class="fs-title">想读什么专业（可多选）？</h2>

        <input type="button" class="action-button" value="商科"  onclick="addMajor(this.value)"/>
        <input type="button" class="action-button" value="工程/计算机" onclick="addMajor(this.value)"/>
        <input type="button" class="action-button" value="自然科学" onclick="addMajor(this.value)"/>
        <input type="button" class="action-button" value="医学" onclick="addMajor(this.value)"/>
        <input type="button" class="action-button" value="法学" onclick="addMajor(this.value)"/>
        <input type="button" class="action-button" value="人文/社会" onclick="addMajor(this.value)"/>
        <input type="button" class="action-button" value="艺术" onclick="addMajor(this.value)"/>
        <input type="button" class="action-button" value="其他" onclick="addMajor(this.value)"/>
        <input type="text" name="majors" class="hidden"/>

        <br/>
        <a class="previous fa fa-chevron-circle-left fa-3x"></a>
        <a class="next fa fa-chevron-circle-right fa-3x" id="aMajors"></a>
    </fieldset>
    <fieldset>
        <h2 class="fs-title">注册信息</h2>
        <input type="text" name="username" placeholder="昵称,小于10位" class="textInput" id="usernameInput"/>
        <input type="password" name="password" placeholder="密码,大于6位" class="textInput passwordInput"/>
        <input type="password" name="repeatpassword" placeholder="重复密码" class="textInput passwordInput"/>
        <input type="email" name="email" placeholder="邮箱" class="textInput" id="emailInput"/>
        <a class="previous fa fa-chevron-circle-left fa-3x"></a>
        <a class="submit fa fa-check-circle fa-3x" onclick="msSubmit(1);"></a>
    </fieldset>
{!! Form::close() !!}
</div>

    <script src="/js/jquery.min.js" type="text/javascript"></script>
    <script src="/js/jquery.easing.min.js" type="text/javascript"></script>
    <script src="/js/registration.js" type="text/javascript"></script>

</body>

</html>
