<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>OzUnimates - Registration</title>
    
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/bootstrap.min.css" rel="stylesheet" media="screen" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.9.3/css/bootstrap-select.min.css">
    <link href="/css/registration.css" rel="stylesheet" media="screen" type="text/css" />
    <link href="/css/loading.css" rel="stylesheet" media="screen" type="text/css" />
    
</head>

<body onload="disableSubmit()">

<div class="loading">
  <div class="box1"></div>
  <div class="box2"></div>
  <div class="box3"></div>
</div>

<div class="loading-wrap">
  
<h2>Hi there! We need some basic information from you first.</h2>

<!-- multistep form -->

{!! Form::open(['id'=>'msform','url'=>'/en/consultant/register']) !!}
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
        <h2 class="fs-title">What degree are you pursuing?</h2>
        <input type="button" class="next action-button" value="Bachelor" onclick="setDegree('Bachelor')"/>
        <input type="button" class="next action-button" value="Master" onclick="setDegree('Master')"/>
        <input type="button" class="next action-button" value="PHD" onclick="setDegree('Phd')"/> 
        <input type="text" name="degree" class="hidden" />
    </fieldset>
    <fieldset id="selectUniversity">
        <h2 class="fs-title">In which university?</h2>
        <select data-live-search="true" class="selectpicker" 
        title="Search & Select" onchange="setUniversity(this.value)">
          <optgroup label="G8 Universities">
            <option>Australian National University</option>
            <option>University of Melbourne</option>
            <option>University of Sydney</option>
            <option>University of Queensland</option>
            <option>University of New South Wales</option>
            <option>University of Western Australia</option>
            <option>University of Adelaide</option>
            <option>University of Monash</option>
          </optgroup>
          <optgroup label="Others">
            <option>Macquarie University</option>
            <option>Griffith University</option>
            <option>Royal Melbourne Institute of Technology</option>
            <option>University of Technology Sydney</option>
            <option>Deakin University</option>
            <option>University of Wollongong</option>
            <option>Victoria University</option>
            <option>Swinburne University of Technology</option>
            <option>Curtin University of Technology</option>
            <option>Murdoch University</option>
            <option>University of South Australia</option>
            <option>Newcastle University</option>
            <option>Charles Stuart University</option>
            <option>La Trobe University</option>
            <option>Queensland University of Technology</option>
            <option>James Cook University</option>
            <option>Others</option>
          </optgroup>
        </select>
        <input type="text" name="university" class="hidden" />
        <br/>
        <a class="previous fa fa-chevron-circle-left fa-3x"></a>
        <a class="next fa fa-chevron-circle-right fa-3x" id="aUniversity"></a>
    </fieldset>

    <fieldset id="selectMajor">
        <h2 class="fs-title">And which subject?</h2>
        <select data-live-search="true" class="selectpicker"  
        title="Search & Select" onchange="setMajor(this.value)">
            <option>Business</option>
            <option>Engineering/Computer Science</option>
            <option>Natural science</option>
            <option>Medicine</option>
            <option>Law</option>
            <option>Humanities / Social</option>
            <option>Arts</option>
            <option>Others</option>
        </select>
        <input type="text" name="major" class="hidden" />
        <input type="text" name="specilization" placeholder="Specilization" class="textInput" id="specilization"/>
        <br/>
        <a class="previous fa fa-chevron-circle-left fa-3x"></a>
        <a class="next fa fa-chevron-circle-right fa-3x" id="aMajor"></a>
    </fieldset>

    <fieldset>
        <h2 class="fs-title">How are you able to help your potential unimates (multiple-choice)?</h2>
        <input type="button" class="action-button uni-button" value="Background Evaluation" onclick="addSkill(this.value)" />
        <input type="button" class="action-button uni-button" value="University Recommendation" onclick="addSkill(this.value)" />
        <input type="button" class="action-button uni-button" value="Improve CV/PS" onclick="addSkill(this.value)"/>
        <input type="button" class="action-button uni-button" value="Subject Information"  onclick="addSkill(this.value)"/>
        <input type="button" class="action-button uni-button" value="Coures Enrollment" onclick="addSkill(this.value)" />
        <input type="button" class="action-button uni-button" value="Picking up/Housing" onclick="addSkill(this.value)"/>
        <input type="button" class="action-button uni-button" value="Social" onclick="addSkill(this.value)"/>
        <input type="button" class="action-button uni-button" value="Career Opportunities" onclick="addSkill(this.value)"/>
        <input type="text" name="skills" class="hidden" />
        <br/>
        <a class="previous fa fa-chevron-circle-left fa-3x"></a>
        <a class="next fa fa-chevron-circle-right fa-3x" id="aSkills"></a>
    </fieldset>
    <fieldset>
        <h2 class="fs-title">User Information</h2>
        <input type="text" name="username" placeholder="Username being displayed, <10 digits" class="textInput"  id="usernameInput"/>
        <input type="password" name="password" placeholder="Password, >=6 digits" class="textInput passwordInput" />
        <input type="password" name="repeatpassword" placeholder="Repeat your password" class="textInput passwordInput"/>
        <input type="email" name="email" placeholder="email" class="textInput" id="emailInput" />
        <input type="text" name="invite" placeholder="Invitation code if applicable" class="textInput" />
        <a class="previous fa fa-chevron-circle-left fa-3x"></a>
        <a class="submit fa fa-check-circle fa-3x" onclick="msSubmit(2);"></a>
    </fieldset>
{!! Form::close() !!}
</div>

    <script src="/js/jquery.min.js" type="text/javascript"></script>
    <script src="/js/jquery.easing.min.js" type="text/javascript"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.9.3/js/bootstrap-select.min.js"></script>
    <script src="/js/registration.js" type="text/javascript"></script>
    <script src="/js/bootstrap.min.js" type="text/javascript"></script>

</body>

</html>
