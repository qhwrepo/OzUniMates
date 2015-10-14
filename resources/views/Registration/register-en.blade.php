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

            <!--登录-->
            <div class="web_login" id="web_login">
               
               
               <div class="login-box">
    
            
			<div class="login_form">
				<form action="en/index" name="loginform" accept-charset="utf-8" id="login_form" class="loginForm" method="post"><input type="hidden" name="did" value="0"/>
               <input type="hidden" name="to" value="log"/>
               <input type="hidden" name="_token" value="{{ csrf_token() }}">


                <div class="uinArea" id="uinArea">
                <label class="input-tips" for="u">User：</label>
                <div class="inputOuter" id="uArea">
                    
                    <input type="text" id="u" name="username" class="inputstyle"/>
                </div>
                </div>
                <div class="pwdArea" id="pwdArea">
                    <label class="input-tips" for="p">Key:</label>
               <div class="inputOuter" id="pArea">
                    
                    <input type="password" id="p" name="p" class="inputstyle"/>
                </div>
                </div>
               
                <div style="padding-left:50px;margin-top:20px;"><input type="submit" value="Login" style="width:150px;" class="button_blue"/></div>
              </form>
           </div>
           
            	</div>
               
            </div>
            <!--登录end-->
  </div>

  <!--注册-->
    <div class="qlogin" id="qlogin" style="display: none; ">
   
    <div class="web_login">

    <form name="form2" id="regUser" accept-charset="utf-8"  action="en/success-regis" method="post">
	      <input type="hidden" name="to" value="reg"/>
		      		       <input type="hidden" name="did" value="0"/>
                           <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <ul class="reg_form" id="reg-ul">
        		                  <li>
                	
                    <label for="user"  class="input-tips2">Username：</label>
                    <div class="inputOuter2">
                        <input type="text" id="user" name="user" maxlength="16" class="inputstyle2"/>
                    </div>
                    
                </li>
                
                <li>
                <label for="email" class="input-tips2">Email：</label>
                    <div class="inputOuter2">
                        <input type="text" id="email"  name="email" maxlength="16" class="inputstyle2"/>
                    </div>
                    
                </li>

                <li>
                <label for="passwd" class="input-tips2">Password：</label>
                    <div class="inputOuter2">
                        <input type="password" id="passwd"  name="passwd" maxlength="16" class="inputstyle2"/>
                    </div>
                    
                </li>
                <li>
                <label for="passwd2" class="input-tips2">Again：</label>
                    <div class="inputOuter2">
                        <input type="password" id="passwd2" name="" maxlength="16" class="inputstyle2" />
                    </div>
                    
                </li>
                
                <li>
                 <label for="wechat" class="input-tips2">WeChat*：</label>
                    <div class="inputOuter2">
                       
                        <input type="text" id="wechat" name="wechat" maxlength="10" class="inputstyle2"/>
                    </div>
                   
                </li>
                <li>
                    <label for="tele" class="input-tips2">Tele*：</label>
                    <div class="inputOuter2">
                        
                        <input type="text" id="tele" name="tele" maxlength="10" class="inputstyle2"/>
                    </div>
                    
                </li>

                * fields are optional.<br/>
                I agree to the <a href="#" class="zcxy" target="_blank">Privacy &amp; Conditions</a>.
                <li>
                    <div class="inputArea">
                        <input type="button" id="reg"  style="margin-top:10px;margin-left:85px;" class="button_blue" value="Submit"/> 
                    </div>
                    
                </li><div class="cl"></div>
            </ul>
        </form>
    
            </div>  
    
            </div>
    <!--注册end-->
        </div>

    <script type="text/javascript" src="/js/jquery.js"></script>
    <script type="text/javascript" src="/js/login.js"></script>

    </body>
</html>