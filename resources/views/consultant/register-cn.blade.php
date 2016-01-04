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

<body>
  
<h2>先来点基本信息吧。</h2>

<!-- multistep form -->

{!! Form::open(['id'=>'msform','url'=>'consultant/store']) !!}
    <!-- progressbar -->
    <ul id="progressbar">
        <li class="active"></li>
        <li></li>
        <li></li>
        <li></li>
    </ul>
    <!-- fieldsets -->
    <fieldset>
        <h2 class="fs-title">你在读什么学位？</h2>
        <!-- {!! Form::button('本科',['class'=>'next action-button']) !!} -->
        <input type="button" class="next action-button" value="本科" onclick="setDegree('bachelor')"/>
        <input type="button" class="next action-button" value="硕士" onclick="setDegree('master')"/>
        <input type="button" class="next action-button" value="博士" onclick="setDegree('phd')"/> 
        <input type="text" name="degree" class="hidden" />
    </fieldset>
    <fieldset>
        <h2 class="fs-title">在哪里就读呢？</h2>
        <input type="button" class="next action-button con" value="美国" onclick="setCountry('usa')" />
        <input type="button" class="next action-button con" value="英国" onclick="setCountry('uk')"/>
        <input type="button" class="next action-button con" value="加拿大"  onclick="setCountry('canada')"/>
        <input type="button" class="next action-button con" value="澳大利亚" onclick="setCountry('oz')"/>
        <input type="button" class="next action-button con" value="法国" onclick="setCountry('france')"/>
        <input type="button" class="next action-button con" value="其他" onclick="setCountry('other')"/>
        <input type="text" name="country" class="hidden" />
        <br/>
        <a class="previous fa fa-chevron-circle-left fa-3x"></a>
    </fieldset>
    <fieldset id="selectUniversity">
        <h2 class="fs-title">就读哪一所大学？</h2>

        <select class="selectpicker usauni" data-live-search="true" 
        title="搜索或选择" onchange="setUniversity(this.value)">
            <option>哈佛大学</option>
            <option>耶鲁大学</option>
            <option>康奈尔大学</option>
        </select>

        <select class="selectpicker ukuni" data-live-search="true" 
        title="搜索或选择" onchange="setUniversity(this.value)">
            <option>剑桥大学</option>
            <option>牛津大学</option>
            <option>康奈尔大学</option>
        </select>

        <select class="selectpicker canadauni" data-live-search="true" 
        title="搜索或选择" onchange="setUniversity(this.value)">
            <option>多伦多大学</option>
            <option>傻屌大学</option>
            <option>傻屌大学2</option>
        </select>

        <select class="selectpicker franceuni" data-live-search="true" 
        title="搜索或选择" onchange="setUniversity(this.value)">
            <option>巴黎高等理工学院</option>
            <option>傻屌大学</option>
            <option>傻屌大学2</option>
        </select>

        <select class="selectpicker ozuni" data-live-search="true" 
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
            <option>皇家墨尔本理工学院</option>
            <option>悉尼科技大学</option>
            <option>迪肯大学</option>
            <option>昆士兰科技大学</option>
          </optgroup>
        </select>

        <select class="selectpicker otheruni" data-live-search="true" 
        title="搜索或选择" onchange="setUniversity(this.value)">
            <option>瑞典皇家理工学院</option>
            <option>傻屌大学</option>
            <option>傻屌大学2</option>
        </select>

        <input type="text" name="university" class="hidden" />
        <br/>
        <a class="previous fa fa-chevron-circle-left fa-3x"></a>
        <a class="next fa fa-chevron-circle-right fa-3x"></a>
    </fieldset>
    <fieldset>
        <h2 class="fs-title">一些注册信息</h2>
        <input type="text" name="username" placeholder="用户名" class="textInput" />
        <input type="password" name="password" placeholder="密码" class="textInput" />
        <input type="password" name="repeatpassword" placeholder="重复密码" class="textInput" />
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