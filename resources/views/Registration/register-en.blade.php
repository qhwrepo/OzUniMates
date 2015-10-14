<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<title>Register / Login</title>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<link href="/css/login.css" rel="stylesheet" type="text/css" />

</head>
<body>


<div class="login" style="margin-top:50px;">
    
    <div class="header">
        <div class="switch" id="switch"><a class="switch_btn_focus" id="switch_qlogin" href="javascript:void(0);" tabindex="7">Login</a>
			<a class="switch_btn" id="switch_login" href="javascript:void(0);" tabindex="8">Register</a><div class="switch_bottom" id="switch_bottom" style="position: absolute; width: 64px; left: 0px;"></div>
        </div>
    </div>
    
    <div class="web_qr_login" id="web_qr_login" style="display: block; height: 235px;"> 

        <!--Login-->
        <div class="web_login" id="web_login">      
            <div class="login-box login_form">  

            {!! Form::open(['url'=>'en/user/login']) !!}

                <div class="uinArea">
                    {!! Form::label('userLog','User',['class'=>'input-tips']) !!}
                    <div class="inputOuter">
                    {!! Form::text('userLog',null,['class'=>'inputstyle'],['id'=>'userLog']) !!}
                    </div>
                </div>

                <div class="pwdArea">
                    {!! Form::label('pwdLog','Pwd',['class'=>'input-tips']) !!}
                    <div class="inputOuter">
                    {!! Form::password('pwdLog', array('class' => 'inputstyle','id' => 'pwdLog')) !!}
                    </div>
                </div>

                {!! Form::submit('Submit',['class'=>'button_blue']) !!}

            {!! Form::close() !!} 

            </div>
        </div>
            <!--end of Login-->
  </div>

  <!--register-->
    <div class="qlogin web_login" id="qlogin" style="display: none; ">

        {!! Form::open(['url'=>'en/user/store']) !!}
            <br/>
            <ul class="reg_form" id="reg-ul">

                <li>
                    {!! Form::label('userReg','Username',['class'=>'input-tips2']) !!}
                    <div class="inputOuter2">
                    {!! Form::text('name',null,['class'=>'inputstyle2'],['maxlength'=>'16'],['id'=>'userReg']) !!}
                    </div>
                </li>

                <li>
                    {!! Form::label('emailReg','Email',['class'=>'input-tips2']) !!}
                    <div class="inputOuter2">
                    {!! Form::text('email',null,['class'=>'inputstyle2'],['maxlength'=>'32'],['id'=>'emailReg']) !!}
                    </div>
                </li>

                <li>
                    {!! Form::label('pwdReg','Password',['class'=>'input-tips2']) !!}
                    <div class="inputOuter2">
                    {!! Form::password('password', array('class' => 'inputstyle2','id' => 'pwdReg')) !!}
                </li>

                <li>
                    {!! Form::label('pwdReg2','Repeat',['class'=>'input-tips2']) !!}
                    <div class="inputOuter2">
                    {!! Form::password('password2', array('class' => 'inputstyle2','id' => 'pwdReg2')) !!}
                </li>    

                <li>
                    {!! Form::label('wechatReg','WeChat*',['class'=>'input-tips2']) !!}
                    <div class="inputOuter2">
                    {!! Form::text('wechat',null,['class'=>'inputstyle2'],['maxlength'=>'16'],['id'=>'wechatReg']) !!}
                    </div>
                </li>

                <li>
                    {!! Form::label('teleReg','Tele*',['class'=>'input-tips2']) !!}
                    <div class="inputOuter2">
                    {!! Form::text('tele',null,['class'=>'inputstyle2'],['maxlength'=>'16'],['id'=>'teleReg']) !!}
                    </div>
                </li> 

                * fields are optional.<br/>
                I agree to the <a href="#" class="zcxy" target="_blank">Privacy &amp; Conditions</a>.
                
                <li>
                    {!! Form::submit('Register',['class'=>'button_blue']) !!}
                </li>
                <div class="cl"></div>
            </ul>
        {!! Form::close() !!}
    
        </div>
    <!--end of register-->
    </div>

    <script type="text/javascript" src="/js/jquery.js"></script>
    <script type="text/javascript" src="/js/login.js"></script>

    </body>
</html>