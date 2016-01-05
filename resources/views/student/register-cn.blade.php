<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>澳联帮 - 注册</title>
    <link href="/css/registration.css" rel="stylesheet" media="screen" type="text/css" />
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
</head>

<body>

  
<h2>先来点基本信息吧。</h2>

<!-- multistep form -->

{!! Form::open(['id'=>'msform','url'=>'student/store']) !!}
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
        <!-- {!! Form::button('本科',['class'=>'next action-button']) !!} -->
        <input type="button" class="next action-button" value="本科" onclick="setDegree('bachelor')"/>
        <input type="button" class="next action-button" value="硕士" onclick="setDegree('master')"/>
        <input type="button" class="next action-button" value="博士" onclick="setDegree('phd')"/> 
        <input type="text" name="degree" class="hidden" />
    </fieldset>
    <fieldset>
        <h2 class="fs-title">想去的地区（可多选）？</h2>
        <input type="button" class="action-button" value="美国" onclick="addCountry('usa')" />
        <input type="button" class="action-button" value="英国" onclick="addCountry('uk')"/>
        <input type="button" class="action-button" value="加拿大"  onclick="addCountry('canada')"/>
        <input type="button" class="action-button" value="澳大利亚" onclick="addCountry('oz')"/>
        <input type="button" class="action-button" value="法国" onclick="addCountry('france')"/>
        <input type="button" class="action-button" value="其他" onclick="addCountry('other')"/>
        <input type="text" name="countries" class="hidden" />
        <br/>
        <a class="previous fa fa-chevron-circle-left fa-3x"></a>
        <a class="next fa fa-chevron-circle-right fa-3x"></a>
    </fieldset>
    <fieldset>
        <h2 class="fs-title">目标学校的世界排名（可多选）？</h2>
        <input type="button" class="action-button" value="Top 50" onclick="addRank('50')"/>
        <input type="button" class="action-button" value="50-100" onclick="addRank('100')"/>
        <input type="button" class="action-button" value="100-300" onclick="addRank('300')"/>
        <input type="button" class="action-button" value="300以外" onclick="addRank('+')"/>
        <input type="button" class="action-button" value="随便先" onclick="addRank('all')"/>
        <input type="text" name="ranks" class="hidden" />
        <br/>
        <a class="previous fa fa-chevron-circle-left fa-3x"></a>
        <a class="next fa fa-chevron-circle-right fa-3x"></a>
    </fieldset>
    <fieldset>
        <h2 class="fs-title">一些注册信息</h2>
        <input type="text" name="username" placeholder="用户名" class="textInput" />
        <input type="password" name="password" placeholder="密码" class="textInput" />
        <input type="password" name="repeatpassword" placeholder="重复密码" class="textInput" />
        <input type="email" name="email" placeholder="邮箱，可以不填" class="textInput" />
        <input type="text" name="wechat" placeholder="微信，可以不填" class="textInput" />
        <a class="previous fa fa-chevron-circle-left fa-3x"></a>
        <a class="submit fa fa-check-circle fa-3x" onclick="msSubmit(1);"></a>
    </fieldset>
{!! Form::close() !!}

    <script src="/js/jquery.min.js" type="text/javascript"></script>
    <script src="/js/jquery.easing.min.js" type="text/javascript"></script>
    <script src="/js/registration.js" type="text/javascript"></script>

</body>

</html>