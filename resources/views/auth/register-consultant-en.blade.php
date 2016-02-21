<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>OzUnimates - Registration</title>
    
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/bootstrap.min.css" rel="stylesheet" media="screen" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.9.3/css/bootstrap-select.min.css">
    <link href="/css/registration.css" rel="stylesheet" media="screen" type="text/css" />
    
</head>

<body onload="disableSubmit()">
  
<h2>Hi there. We need some basic information of you first.</h2>

<!-- multistep form -->

{!! Form::open(['id'=>'msform','url'=>'en/consultant/register']) !!}
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
        <h2 class="fs-title">What the degree you are pursuing?</h2>
        <!-- {!! Form::button('本科',['class'=>'next action-button']) !!} -->
        <input type="button" class="next action-button" value="Bachelor" onclick="setDegree('bachelor')"/>
        <input type="button" class="next action-button" value="Master" onclick="setDegree('master')"/>
        <input type="button" class="next action-button" value="PhD" onclick="setDegree('phd')"/> 
        <input type="text" name="degree" class="hidden" />
    </fieldset>
    <fieldset>
        <h2 class="fs-title">Where are you?</h2>
        <input type="button" class="next action-button con" value="USA" onclick="setCountry('usa')" />
        <input type="button" class="next action-button con" value="UK" onclick="setCountry('uk')"/>
        <input type="button" class="next action-button con" value="Canada"  onclick="setCountry('canada')"/>
        <input type="button" class="next action-button con" value="Australia" onclick="setCountry('oz')"/>
        <input type="button" class="next action-button con" value="France" onclick="setCountry('france')"/>
        <input type="button" class="next action-button con" value="Other region" onclick="setCountry('other')"/>
        <input type="text" name="country" class="hidden" />
        <br/>
        <a class="previous fa fa-chevron-circle-left fa-3x"></a>
    </fieldset>
    <fieldset id="selectUniversity">
        <h2 class="fs-title">Which university are you in?</h2>

        <select class="selectpicker usauni" data-live-search="true" 
        title="Search and select" onchange="setUniversity(this.value)">
            <option>哈佛大学</option>
            <option>耶鲁大学</option>
            <option>康奈尔大学</option>
        </select>

        <select class="selectpicker ukuni" data-live-search="true" 
        title="Search and select" onchange="setUniversity(this.value)">
            <option>剑桥大学</option>
            <option>牛津大学</option>
            <option>康奈尔大学</option>
        </select>

        <select class="selectpicker canadauni" data-live-search="true" 
        title="Search and select" onchange="setUniversity(this.value)">
            <option>多伦多大学</option>
            <option>傻屌大学</option>
            <option>傻屌大学2</option>
        </select>

        <select class="selectpicker franceuni" data-live-search="true" 
        title="Search and select" onchange="setUniversity(this.value)">
            <option>巴黎高等理工学院</option>
            <option>傻屌大学</option>
            <option>傻屌大学2</option>
        </select>

        <select class="selectpicker ozuni" data-live-search="true" 
        title="Search and select" onchange="setUniversity(this.value)">
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
            <option>皇家墨尔本理工学院</option>
            <option>悉尼科技大学</option>
            <option>迪肯大学</option>
            <option>昆士兰科技大学</option>
          </optgroup>
        </select>

        <select class="selectpicker otheruni" data-live-search="true" 
        title="Search and select" onchange="setUniversity(this.value)">
            <option>瑞典皇家理工学院</option>
            <option>傻屌大学</option>
            <option>傻屌大学2</option>
        </select>

        <input type="text" name="university" class="hidden" />
        <br/>
        <a class="previous fa fa-chevron-circle-left fa-3x"></a>
        <a class="next fa fa-chevron-circle-right fa-3x" id="aUniversity"></a>
    </fieldset>
    <fieldset>
        <h2 class="fs-title">How can you help your potential schoolmates(multi-choice)?</h2>
        <input type="button" class="action-button" value="Evaluate applicant's background" onclick="addSkill('evaluate')" />
        <input type="button" class="action-button" value="Recommend a university" onclick="addSkill('recommend')" />
        <input type="button" class="action-button" value="Help improve CV/PS" onclick="addSkill('cvps')"/>
        <input type="button" class="action-button" value="Majors/Specilization"  onclick="addSkill('major')"/>
        <input type="button" class="action-button" value="Careers" onclick="addSkill('career')"/>
        <input type="button" class="action-button" value="Settling down" onclick="addSkill('life')"/>
        <input type="text" name="skills" class="hidden" />
        <br/>
        <a class="previous fa fa-chevron-circle-left fa-3x"></a>
        <a class="next fa fa-chevron-circle-right fa-3x" id="aSkills"></a>
    </fieldset>
    <fieldset>
        <h2 class="fs-title">Some basic information:</h2>
        <input type="text" name="username" placeholder="Username,longer than 6 digits" class="textInput" />
        <input type="password" name="password" placeholder="Password, longer than 6 digits" class="textInput" />
        <input type="password" name="repeatpassword" placeholder="Repeat password" class="textInput"/>
        <input type="email" name="email" placeholder="Email" class="textInput" />
        <input type="text" name="wechat" placeholder="WeChat, optional" class="textInput" />
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