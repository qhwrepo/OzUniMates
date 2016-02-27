<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>澳联帮 - 注册</title>
    
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/bootstrap.min.css" rel="stylesheet" media="screen" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.9.3/css/bootstrap-select.min.css">
    <link href="/css/registration.css" rel="stylesheet" media="screen" type="text/css" />
    
</head>

<body onload="disableSubmit()">
  
<h2>先来点基本信息吧。</h2>

<!-- multistep form -->

{!! Form::open(['id'=>'msform','url'=>'consultant/register']) !!}
    <!-- progressbar -->
    <ul class="progressbar" id="conpb">
        <li class="active"></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
    </ul>
    <!-- fieldsets -->
    <fieldset>
        <h2 class="fs-title">你在读什么学位？</h2>
        <input type="button" class="next action-button" value="本科" onclick="setDegree('bachelor')"/>
        <input type="button" class="next action-button" value="硕士" onclick="setDegree('master')"/>
        <input type="button" class="next action-button" value="博士" onclick="setDegree('phd')"/> 
        <input type="text" name="degree" class="hidden" />
    </fieldset>
    <fieldset id="selectUniversity">
        <h2 class="fs-title">就读哪一所大学？</h2>
        <select data-live-search="true" class="selectpicker" 
        title="搜索或选择" onchange="setUniversity(this.value)">
          <optgroup label="澳洲八大">
            <option>澳大利亚国立大学</option>
            <option>墨尔本大学</option>
            <option>悉尼大学</option>
            <option>昆士兰大学</option>
            <option>新南威尔士大学</option>
            <option>西澳大学</option>
            <option>阿德莱德大学</option>
            <option>莫纳什大学</option>
          </optgroup>
          <optgroup label="其他">
            <option>麦考瑞大学</option>
            <option>弗林德斯大学</option>
            <option>格里菲思大学</option>
            <option>墨尔本皇家理工学院</option>
            <option>悉尼科技大学</option>
            <option>迪肯大学</option>
            <option>昆士兰科技大学</option>
          </optgroup>
        </select>
        <input type="text" name="university" class="hidden" />
        <br/>
        <a class="previous fa fa-chevron-circle-left fa-3x"></a>
        <a class="next fa fa-chevron-circle-right fa-3x" id="aUniversity"></a>
    </fieldset>

    <fieldset id="selectMajor">
        <h2 class="fs-title">读什么专业呢？</h2>
        <select data-live-search="true" class="selectpicker"  
        title="搜索或选择" onchange="setMajor(this.value)">
          <optgroup label="商科">
            <option>会计</option>
            <option>金融</option>
          </optgroup>
          <optgroup label="其他">
            <option>吃</option>
            <option>喝</option>
            <option>嫖</option>
          </optgroup>
        </select>
        <input type="text" name="major" class="hidden" />
        <br/>
        <a class="previous fa fa-chevron-circle-left fa-3x"></a>
        <a class="next fa fa-chevron-circle-right fa-3x" id="aMajor"></a>
    </fieldset>

    <fieldset>
        <h2 class="fs-title">你能在哪些方面帮助师弟师妹呢（可多选）？</h2>
        <input type="button" class="action-button" value="评估申请人背景" onclick="addSkill('evaluate')" />
        <input type="button" class="action-button" value="推荐院校" onclick="addSkill('recommend')" />
        <input type="button" class="action-button" value="修改CV/PS" onclick="addSkill('cvps')"/>
        <input type="button" class="action-button" value="专业方向"  onclick="addSkill('major')"/>
        <input type="button" class="action-button" value="选课指导" onclick="addSkill('course')" />
        <input type="button" class="action-button" value="接机/找住宿" onclick="addSkill('settle')"/>
        <input type="button" class="action-button" value="社交圈" onclick="addSkill('social')"/>
        <input type="button" class="action-button" value="职业圈" onclick="addSkill('linkedin')"/>
        <input type="text" name="skills" class="hidden" />
        <br/>
        <a class="previous fa fa-chevron-circle-left fa-3x"></a>
        <a class="next fa fa-chevron-circle-right fa-3x" id="aSkills"></a>
    </fieldset>
    <fieldset>
        <h2 class="fs-title">一些注册信息</h2>
        <input type="text" name="username" placeholder="昵称" class="textInput" />
        <input type="password" name="password" placeholder="密码,大于6位" class="textInput" />
        <input type="password" name="repeatpassword" placeholder="重复密码" class="textInput"/>
        <input type="email" name="email" placeholder="邮箱" class="textInput" />
        <input type="text" name="wechat" placeholder="微信，可以不填" class="textInput" />
        <a class="previous fa fa-chevron-circle-left fa-3x"></a>
        <a class="submit fa fa-check-circle fa-3x" onclick="msSubmit(2);"></a>
    </fieldset>
{!! Form::close() !!}

    <script src="/js/jquery.min.js" type="text/javascript"></script>
    <script src="/js/jquery.easing.min.js" type="text/javascript"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.9.3/js/bootstrap-select.min.js"></script>
    <script src="/js/registration.js" type="text/javascript"></script>
    <script src="/js/bootstrap.min.js" type="text/javascript"></script>

</body>

</html>