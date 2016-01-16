<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>OzUnimates - Registration</title>
    <link href="/css/registration.css" rel="stylesheet" media="screen" type="text/css" />
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
</head>

<body onload="disableSubmit()">

  
<h2>Hi there. We need some basic information of you first. </h2>

<!-- multistep form -->

{!! Form::open(['id'=>'msform','url'=>'en/student/register']) !!}
    <!-- progressbar -->
    <ul class="progressbar" id="stupb">
        <li class="active"></li>
        <li></li>
        <li></li>
        <li></li>
    </ul>
    <!-- fieldsets -->
    <fieldset>
        <h2 class="fs-title">What's your taget degree?</h2>
        <!-- {!! Form::button('本科',['class'=>'next action-button']) !!} -->
        <input type="button" class="next action-button" value="Bachelor" onclick="setDegree('bachelor')"/>
        <input type="button" class="next action-button" value="Master" onclick="setDegree('master')"/>
        <input type="button" class="next action-button" value="PhD" onclick="setDegree('phd')"/> 
        <input type="text" name="degree" class="hidden" />
    </fieldset>
    <fieldset>
        <h2 class="fs-title">Where would you like to pursue it（multi-choice）？</h2>
        <input type="button" class="action-button" value="USA" onclick="addCountry('usa')" />
        <input type="button" class="action-button" value="UK" onclick="addCountry('uk')"/>
        <input type="button" class="action-button" value="Canada"  onclick="addCountry('canada')"/>
        <input type="button" class="action-button" value="Australia" onclick="addCountry('oz')"/>
        <input type="button" class="action-button" value="France" onclick="addCountry('france')"/>
        <input type="button" class="action-button" value="Other region" onclick="addCountry('other')"/>
        <input type="text" name="countries" class="hidden"/>
        <br/>
        <a class="previous fa fa-chevron-circle-left fa-3x"></a>
        <a class="next fa fa-chevron-circle-right fa-3x" id="aCountries"></a>
    </fieldset>
    <fieldset>
        <h2 class="fs-title">Do you have a requirement about the university's world rank（multi-choice）？</h2>
        <input type="button" class="action-button" value="Top 50" onclick="addRank('50')"/>
        <input type="button" class="action-button" value="50-100" onclick="addRank('100')"/>
        <input type="button" class="action-button" value="100-300" onclick="addRank('300')"/>
        <input type="button" class="action-button" value="300+" onclick="addRank('+')"/>
        <input type="button" class="action-button" value="I don't mind" onclick="addRank('all')"/>
        <input type="text" name="ranks" class="hidden" />
        <br/>
        <a class="previous fa fa-chevron-circle-left fa-3x"></a>
        <a class="next fa fa-chevron-circle-right fa-3x" id="aRanks"></a>
    </fieldset>
    <fieldset>
        <h2 class="fs-title">Some basic information:</h2>
        <input type="text" name="username" placeholder="Username,longer than 6 digits" class="textInput" />
        <input type="password" name="password" placeholder="Password, longer than 6 digits" class="textInput" />
        <input type="password" name="repeatpassword" placeholder="Repeat password" class="textInput"/>
        <input type="email" name="email" placeholder="Email" class="textInput" />
        <input type="text" name="wechat" placeholder="WeChat, optional" class="textInput" />
        <a class="previous fa fa-chevron-circle-left fa-3x"></a>
        <a class="submit fa fa-check-circle fa-3x" onclick="msSubmit(1);"></a>
    </fieldset>
{!! Form::close() !!}

    <script src="/js/jquery.min.js" type="text/javascript"></script>
    <script src="/js/jquery.easing.min.js" type="text/javascript"></script>
    <script src="/js/registration.js" type="text/javascript"></script>

</body>

</html>