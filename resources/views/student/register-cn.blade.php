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
    <ul id="progressbar">
        <li class="active"></li>
        <li></li>
        <li></li>
        <li></li>
    </ul>
    <!-- fieldsets -->
    <fieldset>
        <h2 class="fs-title">准备读什么学位？</h2>
        <!-- {!! Form::button('本科',['class'=>'next action-button']) !!} -->
        <input type="button" name="degree" class="next action-button" value="本科"/>
        <input type="button" name="degree" class="next action-button" value="硕士"/>
        <input type="button" name="degree" class="next action-button" value="博士"/> 
    </fieldset>
    <fieldset>
        <h2 class="fs-title">想去的地区（可多选）？</h2>
        <input type="button" name="next" class="next action-button" value="美国"/>
        <input type="button" name="next" class="next action-button" value="英国"/>
        <input type="button" name="next" class="next action-button" value="加拿大"/>
        <input type="button" name="next" class="next action-button" value="澳大利亚"/>
        <input type="button" name="next" class="next action-button" value="法国"/>
        <input type="button" name="next" class="next action-button" value="其他"/>
        <br/>
        <a class="previous fa fa-chevron-circle-left fa-3x"></a>
        <a class="next fa fa-chevron-circle-right fa-3x"></a>
    </fieldset>
    <fieldset>
        <h2 class="fs-title">目标学校的世界排名（可多选）？</h2>
        <input type="button" name="next" class="next action-button" value="Top 50"/>
        <input type="button" name="next" class="next action-button" value="50-100"/>
        <input type="button" name="next" class="next action-button" value="100-300"/>
        <input type="button" name="next" class="next action-button" value="300以外"/>
        <input type="button" name="next" class="next action-button" value="随便先"/>
        <br/>
        <a class="previous fa fa-chevron-circle-left fa-3x"></a>
        <a class="next fa fa-chevron-circle-right fa-3x"></a>
    </fieldset>
    <fieldset>
        <h2 class="fs-title">一些注册信息</h2>
        <input type="text" name="fname" placeholder="First Name" class="textInput" />
        <input type="text" name="lname" placeholder="Last Name" class="textInput" />
        <input type="text" name="phone" placeholder="Phone" class="textInput" />
        <textarea name="address" placeholder="Address" class="textInput" ></textarea>
        <a class="previous fa fa-chevron-circle-left fa-3x"></a>
        <a class="submit fa fa-check-circle fa-3x" href="javascript:{}" 
        onclick="document.getElementById('msform').submit();"></a>
<!--         <input type="submit" value="Submit" class="submit fa fa-check-circle fa-3x"> -->
    </fieldset>
{!! Form::close() !!}

    <script src="/js/jquery.min.js" type="text/javascript"></script>
    <script src="/js/jquery.easing.min.js" type="text/javascript"></script>
    <script src="/js/registration.js" type="text/javascript"></script>

</body>

</html>