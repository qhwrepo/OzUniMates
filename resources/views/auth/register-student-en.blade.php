<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>OzUnimates - Registration</title>
    <link href="/css/registration.css" rel="stylesheet" media="screen" type="text/css" />
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
</head>

<body onload="disableSubmit()">

  
<h2>Hi there! We need some basic information from you first.</h2>

<!-- multistep form -->

{!! Form::open(['id'=>'msform','url'=>'/en/student/register']) !!}
    <!-- progressbar -->
    <ul class="progressbar" id="stupb">
        <li class="active"></li>
        <li></li>
        <li></li>
        <li></li>
    </ul>
    <!-- fieldsets -->
    <fieldset>
        <h2 class="fs-title">What is your target degree?</h2>
        <input type="button" class="next action-button" value="Bachelor" onclick="setDegree('bachelor')"/>
        <input type="button" class="next action-button" value="Master" onclick="setDegree('master')"/>
        <input type="button" class="next action-button" value="PHD" onclick="setDegree('phd')"/> 
        <input type="text" name="degree" class="hidden" />
    </fieldset>
    <fieldset>
        <h2 class="fs-title">Do you have target universities?</h2>
        <input type="button" class="action-button" value="no target" onclick="addUniversity(this.value)" />
        <div class="fs-subtitle">G8 Universities</div>
        <input type="button" class="action-button uni-button" value="Australian National University" onclick="addUniversity(this.value)" />
        <input type="button" class="action-button uni-button" value="University of Melbourne"  onclick="addUniversity(this.value)"/>
        <input type="button" class="action-button uni-button" value="University of Sydney" onclick="addUniversity(this.value)"/>
        <input type="button" class="action-button uni-button" value="University of New South Wales" onclick="addUniversity(this.value)"/>
        <input type="button" class="action-button uni-button" value="University of Monash" onclick="addUniversity(this.value)"/>
        <input type="button" class="action-button uni-button" value="University of Queensland" onclick="addUniversity(this.value)"/>
        <input type="button" class="action-button uni-button" value="University of Western Australia" onclick="addUniversity(this.value)"/>
        <input type="button" class="action-button uni-button" value="University of Adelaide" onclick="addUniversity(this.value)"/>
        <div class="fs-subtitle">Others</div>
        <input type="button" class="action-button uni-button" value="University of Macquarie" onclick="addUniversity(this.value)" />
        <input type="button" class="action-button uni-button" value="Griffith University"  onclick="addUniversity(this.value)"/>
        <input type="button" class="action-button uni-button" value="RMIT" onclick="addUniversity(this.value)"/>
        <input type="button" class="action-button uni-button" value="University of Technology Sydney" onclick="addUniversity(this.value)"/>
        <input type="button" class="action-button uni-button" value="Deakin University" onclick="addUniversity(this.value)"/>
        <input type="button" class="action-button uni-button" value="University of Wollongong" onclick="addUniversity(this.value)"/>
        <input type="button" class="action-button uni-button" value="Victoria University" onclick="addUniversity(this.value)"/>
        <input type="button" class="action-button uni-button" value="Swinburne University of Technology" onclick="addUniversity(this.value)"/>
        <input type="button" class="action-button uni-button" value="Curtin University of Technology" onclick="addUniversity(this.value)" />
        <input type="button" class="action-button uni-button" value="Murdoch University"  onclick="addUniversity(this.value)"/>
        <input type="button" class="action-button uni-button" value="University of South Australia" onclick="addUniversity(this.value)"/>
        <input type="button" class="action-button uni-button" value="Newcastle University" onclick="addUniversity(this.value)"/>
        <input type="button" class="action-button uni-button" value="Charles Stuart University" onclick="addUniversity(this.value)"/>
        <input type="button" class="action-button uni-button" value="La Trobe University" onclick="addUniversity(this.value)"/>
        <input type="button" class="action-button uni-button" value="Queensland University of Technology" onclick="addUniversity(this.value)"/>
        <input type="button" class="action-button uni-button" value="James Cook University" onclick="addUniversity(this.value)"/>
        <input type="button" class="action-button uni-button" value="Other" onclick="addUniversity(this.value)"/>
        <input type="text" name="universities" class="hidden"/>
        <br/>
        <a class="previous fa fa-chevron-circle-left fa-3x"></a>
        <a class="next fa fa-chevron-circle-right fa-3x" id="aUniversities"></a>
    </fieldset>
    <fieldset>
        <h2 class="fs-title">What are your target subjects?</h2>
        
        <input type="button" class="action-button" value="Business"  onclick="addMajor(this.value)"/>
        <input type="button" class="action-button" value="Engineering" onclick="addMajor(this.value)"/>
        <input type="button" class="action-button" value="Science" onclick="addMajor(this.value)"/>
        <input type="button" class="action-button" value="Medicine" onclick="addMajor(this.value)"/>
        <input type="button" class="action-button" value="Law" onclick="addMajor(this.value)"/>
        <input type="button" class="action-button" value="Humanities/Social" onclick="addMajor(this.value)"/>
        <input type="button" class="action-button" value="Arts" onclick="addMajor(this.value)"/>
        <input type="button" class="action-button" value="Others" onclick="addMajor(this.value)"/>
        <input type="text" name="majors" class="hidden"/>

        <br/>
        <a class="previous fa fa-chevron-circle-left fa-3x"></a>
        <a class="next fa fa-chevron-circle-right fa-3x" id="aMajors"></a>
    </fieldset>
    <fieldset>
        <h2 class="fs-title">User Information</h2>
        <input type="text" name="username" placeholder="Username being displayed, <10 digits" class="textInput" id="usernameInput"/>
        <input type="password" name="password" placeholder="Password, >=6 digits" class="textInput passwordInput"/>
        <input type="password" name="repeatpassword" placeholder="Repeat your password" class="textInput passwordInput"/>
        <input type="email" name="email" placeholder="Email" class="textInput" id="emailInput"/>
        <a class="previous fa fa-chevron-circle-left fa-3x"></a>
        <a class="submit fa fa-check-circle fa-3x" onclick="msSubmit(1);"></a>
    </fieldset>
{!! Form::close() !!}

    <script src="/js/jquery.min.js" type="text/javascript"></script>
    <script src="/js/jquery.easing.min.js" type="text/javascript"></script>
    <script src="/js/registration.js" type="text/javascript"></script>

</body>

</html>
