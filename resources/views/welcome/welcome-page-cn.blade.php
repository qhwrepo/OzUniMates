<!-- Edited from Stylish-portfolio bootstrap template:http://startbootstrap.com/template-overviews/stylish-portfolio/ 
under Apache 2.0 by Start Bootstrap 
 -->

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">

    <title>澳联帮 - 遇见未来的校友</title>


    <link href="/css/normalize.css" rel="stylesheet"/>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/welcome-page.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">

</head>

<body>

    @if($errors->any())        
        <ul class="alert alert-danger error">            
        @foreach($errors->all() as $error)                
            <li>{!! $error !!}</li>            
        @endforeach        
        </ul>
    @endif

    <a id="logbtn" class="navBtn btn btn-lg" onclick="set_form()">登录</a>
    <a id="languagebtn" href="en" class="navBtn btn btn-lg">English</a>
    
    <div id='lean_overlay' onclick="hide_form()">
    </div>
    {!! Form::open(['url'=>'login','style'=>'display:none;','id'=>'loginForm']) !!}
        <div class="usertype">
            <label>我是</label>
            {!! Form::radio('usertype','student') !!}<label>师弟/师妹</label>
            {!! Form::radio('usertype','consultant') !!}<label>师兄/师姐</label>
        </div>   
        <div class="username">
          <input type="email" name="email" placeholder="邮箱"/>
        </div>
        <div class="password">
          <input type="password" name="password" placeholder="密码"/>
        </div>
        <div class="login">
            {!! Form::submit('登录',[]) !!}
        </div> 
    {!! Form::close() !!}
    

    <!-- Header -->
    <header id="top" class="header">
        <div class="text-vertical-center" id="header-intro">
            <h1><img src="/img/logo.png" id="logo"></h1>
            <h3>申请就那么回事</h3>
            <h3>比起中介，直接和师兄师姐聊聊吧!</h3>
            <div class="or-spacer">
              <div class="mask"></div>
            </div>
            <a href="student/register" class="link-home"><i class="fa fa-user fa-2x"></i> 我要找师兄/师姐</a>
            <a href="consultant/register" class="link-home"><i class="fa fa-graduation-cap fa-2x"></i>我就是师兄/师姐</a>
            <a href="#about" class="fa fa-angle-double-down" id="tellMore"><span id="showme"></span></a>
        </div>
    </header>

    <!-- About -->
    <section id="about" class="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>想来澳洲留学 但是信息有限？</h2>
                    <br/>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>

    <!-- Services -->
    <section id="services" class="services bg-primary">
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-10 col-lg-offset-1">
                    <h2>直接和未来的校友聊聊吧</h2>
                    <div class="or-spacer">
                      <div class="mask"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 col-sm-6">
                            <div class="service-item">
                                <span class="fa-stack fa-4x">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-users fa-stack-1x text-primary"></i>
                            </span>
                                <h4>
                                    <strong>1. 找到ta</strong>
                                </h4>
                                <p>想去哪里，读什么？<br/>我们帮你找到校友。</p>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="service-item">
                                <span class="fa-stack fa-4x">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-university fa-stack-1x text-primary"></i>
                            </span>
                                <h4>
                                    <strong>2. 我准备好了吗</strong>
                                </h4>
                                <p>对学校/专业了解充分吗？<br/>简历还需要修改吗？</p>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="service-item">
                                <span class="fa-stack fa-4x">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-file-text fa-stack-1x text-primary"></i>
                            </span>
                                <h4>
                                    <strong>3. 正式申请</strong>
                                </h4>
                                <p>录取/签证并不容易<br/>我们的公益顾问帮你免费搞定！</p>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="service-item">
                                <span class="fa-stack fa-4x">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-plane fa-stack-1x text-primary"></i>
                            </span>
                                <h4>
                                    <strong>4. 入学之后</strong>
                                </h4>
                                <p>找房子/选课/社交圈/职业圈……<br/>快去抱校友大腿吧！</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                    	<div class="col-md-12 col-sm-12">
                    		<a href="#uni-section" class="fa fa-angle-double-down" id="tellMore"></a>
                    	</div>
                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.col-lg-10 -->
            </div>
            
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>

    <!-- Portfolio -->
    <section id="uni-section">
      <div id="uni-caption">
        <h2>还没确定目标?</h2>
        <h2>这些大学最受师兄师姐欢迎：</h2>
      </div>
      <div class="or-spacer">
        <div class="mask"></div>
      </div>
      <h4>(大学排名数据为2015年)</h4>

      <div class="distribution-map">

        <img src="/img/map_australia.png">
        <button class="map-point" style="top:69.2%;left:82.5%" id="usyd">
            <div class="content">
                <div class="centered-y">
                    <h2>悉尼大学</h2>
                    <img src="/img/uni_logo/usyd.png">
                    <div class="uni_desc">
                        <span class="desc_title">世界排名</span>
                        <span class="desc_content">QS世界大学排名: 45 <br/> Times高等教育排名: 60</span>
                    </div>
                    <div class="uni_desc">
                        <span class="desc_title">优势学科</span>
                        <span class="desc_content">商科 法学</span>
                    </div>
                </div>
            </div>
        </button>
        <button class="map-point" style="top:65.5%;left:82.5%" id="mcq">
            <div class="content">
                <div class="centered-y">
                    <h2>麦考瑞大学</h2>
                    <img src="/img/uni_logo/mcq.png">
                    <div class="uni_desc">
                        <span class="desc_title">世界排名</span>
                        <span class="desc_content">QS世界大学排名: 254 <br/> Times高等教育排名: 301-350</span>
                    </div>
                    <div class="uni_desc">
                        <span class="desc_title">优势学科</span>
                        <span class="desc_content">商科</span>
                    </div>
                </div>
            </div>
        </button>
        <button class="map-point" style="top:66%;left:86%" id="unsw">
            <div class="content">
                <div class="centered-y">
                    <h2>新南威尔士大学</h2>
                    <img src="/img/uni_logo/unsw.png">
                    <div class="uni_desc">
                        <span class="desc_title">世界排名</span>
                        <span class="desc_content">QS世界大学排名: 46 <br/> Times高等教育排名: 109</span>
                    </div>
                    <div class="uni_desc">
                        <span class="desc_title">优势学科</span>
                        <span class="desc_content">商科 工科(计算机)</span>
                    </div>
                </div>
            </div>
        </button>
        <button class="map-point" style="top:74.5%;left:82%" id="anu">
            <div class="content">
                <div class="centered-y">
                    <h2>澳大利亚国立大学</h2>
                    <img src="/img/uni_logo/anu.png">
                    <div class="uni_desc">
                        <span class="desc_title">世界排名</span>
                        <span class="desc_content">QS世界大学排名: 19 <br/> Times高等教育排名: 45</span>
                    </div>
                    <div class="uni_desc">
                        <span class="desc_title">优势学科</span>
                        <span class="desc_content">人文科学 亚太 经济</span>
                    </div>
                </div>
            </div>
        </button>
        <button class="map-point" style="top:63%;left:14%" id="wa">
            <div class="content">
                <div class="centered-y">
                    <h2>西澳大学</h2>
                    <img src="/img/uni_logo/wa.png">
                    <div class="uni_desc">
                        <span class="desc_title">世界排名</span>
                        <span class="desc_content">QS世界大学排名: 98 <br/> Times高等教育排名: 157</span>
                    </div>
                    <div class="uni_desc">
                        <span class="desc_title">优势学科</span>
                        <span class="desc_content">商科</span>
                    </div>
                </div>
            </div>
        </button>
        <button class="map-point" style="top:76.5%;left:72%" id="umel">
            <div class="content">
                <div class="centered-y">
                    <h2>墨尔本大学</h2>
                    <img src="/img/uni_logo/umel.png">
                    <div class="uni_desc">
                        <span class="desc_title">世界排名</span>
                        <span class="desc_content">QS世界大学排名: 42 <br/> Times高等教育排名: 33</span>
                    </div>
                    <div class="uni_desc">
                        <span class="desc_title">优势学科</span>
                        <span class="desc_content">商科 医学</span>
                    </div>
                </div>
            </div>
        </button>
        <button class="map-point" style="top:80%;left:75%" id="monash">
            <div class="content">
                <div class="centered-y">
                    <h2>莫纳什大学</h2>
                    <img src="/img/uni_logo/monash.png">
                    <div class="uni_desc">
                        <span class="desc_title">世界排名</span>
                        <span class="desc_content">QS世界大学排名: 67 <br/> Times高等教育排名: 83</span>
                    </div>
                    <div class="uni_desc">
                        <span class="desc_title">优势学科</span>
                        <span class="desc_content">信息技术 计算机</span>
                    </div>
                </div>
            </div>
        </button>
        <button class="map-point" style="top:50.6%;left:90%" id="queensland">
            <div class="content">
                <div class="centered-y">
                    <h2>昆士兰大学</h2>
                    <img src="/img/uni_logo/queensland.png">
                    <div class="uni_desc">
                        <span class="desc_title">世界排名</span>
                        <span class="desc_content">QS世界大学排名: 46 <br/> Times高等教育排名: 65</span>
                    </div>
                    <div class="uni_desc">
                        <span class="desc_title">优势学科</span>
                        <span class="desc_content">生命科学 化学</span>
                    </div>
                </div>
            </div>
        </button>
        <button class="map-point" style="top:74.5%;left:85.5%" id="uc">
            <div class="content">
                <div class="centered-y">
                    <h2>堪培拉大学</h2>
                    <img src="/img/uni_logo/uc.png">
                    <div class="uni_desc">
                        <span class="desc_title">世界排名</span>
                        <span class="desc_content">QS世界大学排名: 551-600 <br/> Times高等教育排名: ...</span>
                    </div>
                    <div class="uni_desc">
                        <span class="desc_title">优势学科</span>
                        <span class="desc_content">商科</span>
                    </div>
                </div>
            </div>
        </button>
        <button class="map-point" style="top:69.2%;left:85.7%" id="sydtech">
            <div class="content">
                <div class="centered-y">
                    <h2>悉尼科技大学</h2>
                    <img src="/img/uni_logo/sydtech.jpg">
                    <div class="uni_desc">
                        <span class="desc_title">世界排名</span>
                        <span class="desc_content">QS世界大学排名: 218 <br/> Times高等教育排名: 226-250</span>
                    </div>
                    <div class="uni_desc">
                        <span class="desc_title">优势学科</span>
                        <span class="desc_content">电子科技</span>
                    </div>
                </div>
            </div>
        </button>
        <button class="map-point" style="top:73%;left:65%" id="ade">
            <div class="content">
                <div class="centered-y">
                    <h2>阿德莱德大学</h2>
                    <img src="/img/uni_logo/ade.png">
                    <div class="uni_desc">
                        <span class="desc_title">世界排名</span>
                        <span class="desc_content">QS世界大学排名: 113 <br/> Times高等教育排名: 164</span>
                    </div>
                    <div class="uni_desc">
                        <span class="desc_title">优势学科</span>
                        <span class="desc_content">商科 传媒</span>
                    </div>
                </div>
            </div>
        </button>
        <button class="map-point" style="top:76.5%;left:75%" id="mr">
            <div class="content">
                <div class="centered-y">
                    <h2>墨尔本皇家理工大学</h2>
                    <img src="/img/uni_logo/mr.png">
                    <div class="uni_desc">
                        <span class="desc_title">世界排名</span>
                        <span class="desc_content">QS世界大学排名: ... <br/> Times高等教育排名: ...</span>
                    </div>
                    <div class="uni_desc">
                        <span class="desc_title">优势学科</span>
                        <span class="desc_content">计算机 工程</span>
                    </div>
                </div>
            </div>
        </button>

        </div>

    </section>

    <!-- Footer -->
    <footer>
        <div class="container footer">
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1 text-center">
                    <h4><strong>澳联帮</strong>
                    </h4>
                    <p>Canberra, Australia</p>
                    <ul class="list-unstyled">
                        <li><i class="fa fa-phone fa-fw"></i> (+61) 416-365067</li>
                        <li><i class="fa fa-envelope-o fa-fw"></i>  <a href="mailto:xuan9230@gmail.com">xuan9230@gmail.com</a>
                        </li>
                    </ul>
                    <p class="text-muted">Copyright &copy; 澳联帮 2016</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script type="text/javascript" src="/js/jquery.min.js"></script>
    <script type="text/javascript" src="/js/jquery.leanModal.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script type="text/javascript" src="/js/bootstrap.min.js"></script>
    <!-- custom -->
    <script type="text/javascript" src="/js/dist/vendor/rgbaster.min.js"></script>
    <script type="text/javascript" src="/js/welcome-page.js"></script>

</body>

</html>
