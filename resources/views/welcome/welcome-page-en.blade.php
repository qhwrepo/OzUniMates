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

    <title>Ozunimates - Meet your future unimates</title>


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

</head>

<body>

    @if($errors->any())        
        <ul class="alert alert-danger error">            
        @foreach($errors->all() as $error)                
            <li>{!! $error !!}</li>            
        @endforeach        
        </ul>
    @endif

    <a id="logbtn" class="navBtn btn btn-lg" onclick="set_form()">Log in</a>
    <a id="languagebtn" href="cn" class="navBtn btn btn-lg">中文</a>
    
    <div id='lean_overlay' onclick="hide_form()">
    </div>
    {!! Form::open(['url'=>'login','style'=>'display:none;','id'=>'loginForm']) !!}
        <div class="usertype">
            <label>I'm</label>
            {!! Form::radio('usertype','student') !!}<label>Newcomer</label>
            {!! Form::radio('usertype','consultant') !!}<label>Consultant</label>
        </div>   
        <div class="username">
          <input type="email" name="email" placeholder="email"/>
        </div>
        <div class="password">
          <input type="password" name="password" placeholder="password"/>
        </div>
        <div class="login">
            {!! Form::submit('login',[]) !!}
        </div> 
    {!! Form::close() !!}
    

    <!-- Header -->
    <header id="top" class="header">
        <div class="text-vertical-center" id="header-intro">
            <h1>Ozunimates</h1>
            <h3><br/>Talk to your future unimates, not consultation agencies</h3>
            <div class="or-spacer">
              <div class="mask"></div>
            </div>
            <a href="en/student/register" class="link-home"><i class="fa fa-user fa-2x"></i> I am a Newcomer</a>
            <a href="en/consultant/register" class="link-home"><i class="fa fa-graduation-cap fa-2x"></i>I am a Consultant</a>
            <a href="#about" class="fa fa-angle-double-down" id="tellMore"><span id="showme"></span></a>
        </div>
    </header>

    <!-- About -->
    <section id="about" class="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Wanna study in Australia, but lack of inforamtion?</h2>
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
                    <h2>Talk to your future unimates, directly</h2>
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
                                    <strong>1. Find him/her</strong>
                                </h4>
                                <p>Where are you going? what are you going to study? <br/>Let us help you to find your future unimates</p>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="service-item">
                                <span class="fa-stack fa-4x">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-university fa-stack-1x text-primary"></i>
                            </span>
                                <h4>
                                    <strong>2. Am I ready?</strong>
                                </h4>
                                <p>Am I familiar with universities and programs?<br/>Do I need some editing on my CV？</p>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="service-item">
                                <span class="fa-stack fa-4x">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-file-text fa-stack-1x text-primary"></i>
                            </span>
                                <h4>
                                    <strong>3. Application</strong>
                                </h4>
                                <p>Offer/Visa is not easy to get <br/>Our non-profit agency will help you! </p>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="service-item">
                                <span class="fa-stack fa-4x">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-plane fa-stack-1x text-primary"></i>
                            </span>
                                <h4>
                                    <strong>4. Enrollment </strong>
                                </h4>
                                <p>Housing/courses/social circle<br/>Let your senior unimates help you!</p>
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
        <h2>Have no specified target yet?</h2>
        <h2>Here are the most popular universities among your senior unimates.</h2>
      </div>
      <div class="or-spacer">
        <div class="mask"></div>
      </div>
      <h4>(Statistics based on 2015 release)</h4>

      <div class="distribution-map">

        <img src="/img/map_australia.png">
        <button class="map-point" style="top:69.2%;left:82.5%" id="usyd">
            <div class="content">
                <div class="centered-y">
                    <h2>University of Sydney</h2>
                    <img src="/img/uni_logo/usyd.png">
                    <div class="uni_desc">
                        <span class="desc_title">World Ranking</span>
                        <span class="desc_content">QS ranking: 45 <br/> Times ranking: 60</span>
                    </div>
                    <div class="uni_desc">
                        <span class="desc_title">Featured Subjects</span>
                        <span class="desc_content">Business, Law</span>
                    </div>
                </div>
            </div>
        </button>
        <button class="map-point" style="top:65.5%;left:82.5%" id="mcq">
            <div class="content">
                <div class="centered-y">
                    <h2>Macquarie University</h2>
                    <img src="/img/uni_logo/mcq.png">
                    <div class="uni_desc">
                        <span class="desc_title">World Ranking</span>
                        <span class="desc_content">QS ranking: 254 <br/> Times ranking: 301-350</span>
                    </div>
                    <div class="uni_desc">
                        <span class="desc_title">Featured Subjects</span>
                        <span class="desc_content">Business</span>
                    </div>
                </div>
            </div>
        </button>
        <button class="map-point" style="top:66%;left:86%" id="unsw">
            <div class="content">
                <div class="centered-y">
                    <h2>University of New South Wales</h2>
                    <img src="/img/uni_logo/unsw.png">
                    <div class="uni_desc">
                        <span class="desc_title">World Ranking</span>
                        <span class="desc_content">QS ranking: 46 <br/> Times ranking: 109</span>
                    </div>
                    <div class="uni_desc">
                        <span class="desc_title">Featured Subjects</span>
                        <span class="desc_content">Business, Engineering(Computer Science)</span>
                    </div>
                </div>
            </div>
        </button>
        <button class="map-point" style="top:74.5%;left:82%" id="anu">
            <div class="content">
                <div class="centered-y">
                    <h2>Australian National University</h2>
                    <img src="/img/uni_logo/anu.png">
                    <div class="uni_desc">
                        <span class="desc_title">World Ranking</span>
                        <span class="desc_content">QS ranking: 19 <br/> Times ranking: 45</span>
                    </div>
                    <div class="uni_desc">
                        <span class="desc_title">Featured Subjects</span>
                        <span class="desc_content">Humanities, Asia Pacific Study, Economy</span>
                    </div>
                </div>
            </div>
        </button>
        <button class="map-point" style="top:63%;left:14%" id="wa">
            <div class="content">
                <div class="centered-y">
                    <h2>University of Western Australia</h2>
                    <img src="/img/uni_logo/wa.png">
                    <div class="uni_desc">
                        <span class="desc_title">World Ranking</span>
                        <span class="desc_content">QS ranking: 98 <br/> Times ranking: 157</span>
                    </div>
                    <div class="uni_desc">
                        <span class="desc_title">Featured Subjects</span>
                        <span class="desc_content">Business</span>
                    </div>
                </div>
            </div>
        </button>
        <button class="map-point" style="top:76.5%;left:72%" id="umel">
            <div class="content">
                <div class="centered-y">
                    <h2>University of Melbourne</h2>
                    <img src="/img/uni_logo/umel.png">
                    <div class="uni_desc">
                        <span class="desc_title">World Ranking</span>
                        <span class="desc_content">QS ranking: 42 <br/> Times ranking: 33</span>
                    </div>
                    <div class="uni_desc">
                        <span class="desc_title">Featured Subjects</span>
                        <span class="desc_content">Business, Medical Science</span>
                    </div>
                </div>
            </div>
        </button>
        <button class="map-point" style="top:80%;left:75%" id="monash">
            <div class="content">
                <div class="centered-y">
                    <h2>Monash University</h2>
                    <img src="/img/uni_logo/monash.png">
                    <div class="uni_desc">
                        <span class="desc_title">World Ranking</span>
                        <span class="desc_content">QS ranking: 67 <br/> Times ranking: 83</span>
                    </div>
                    <div class="uni_desc">
                        <span class="desc_title">Featured Subjects</span>
                        <span class="desc_content">Inforamtion technology, Computer Science</span>
                    </div>
                </div>
            </div>
        </button>
        <button class="map-point" style="top:50.6%;left:90%" id="queensland">
            <div class="content">
                <div class="centered-y">
                    <h2>University of Queensland</h2>
                    <img src="/img/uni_logo/queensland.png">
                    <div class="uni_desc">
                        <span class="desc_title">World Ranking</span>
                        <span class="desc_content">QS ranking: 46 <br/> Times ranking: 65</span>
                    </div>
                    <div class="uni_desc">
                        <span class="desc_title">Featured Subjects</span>
                        <span class="desc_content">Chemistry</span>
                    </div>
                </div>
            </div>
        </button>
        <button class="map-point" style="top:74.5%;left:85.5%" id="uc">
            <div class="content">
                <div class="centered-y">
                    <h2>University of Canberra</h2>
                    <img src="/img/uni_logo/uc.png">
                    <div class="uni_desc">
                        <span class="desc_title">World Ranking</span>
                        <span class="desc_content">QS ranking: 551-600 <br/> Times ranking: ...</span>
                    </div>
                    <div class="uni_desc">
                        <span class="desc_title">Featured Subjects</span>
                        <span class="desc_content">Business</span>
                    </div>
                </div>
            </div>
        </button>
        <button class="map-point" style="top:69.2%;left:85.7%" id="sydtech">
            <div class="content">
                <div class="centered-y">
                    <h2>University of Technology Sydney</h2>
                    <img src="/img/uni_logo/sydtech.jpg">
                    <div class="uni_desc">
                        <span class="desc_title">World Ranking</span>
                        <span class="desc_content">QS ranking: 218 <br/> Times ranking: 226-250</span>
                    </div>
                    <div class="uni_desc">
                        <span class="desc_title">Featured Subjects</span>
                        <span class="desc_content">Electronic</span>
                    </div>
                </div>
            </div>
        </button>
        <button class="map-point" style="top:73%;left:65%" id="ade">
            <div class="content">
                <div class="centered-y">
                    <h2>University of Adelaide</h2>
                    <img src="/img/uni_logo/ade.png">
                    <div class="uni_desc">
                        <span class="desc_title">World Ranking</span>
                        <span class="desc_content">QS ranking: 113 <br/> Times ranking: 164</span>
                    </div>
                    <div class="uni_desc">
                        <span class="desc_title">Featured Subjects</span>
                        <span class="desc_content">Business, Media</span>
                    </div>
                </div>
            </div>
        </button>
        <button class="map-point" style="top:76.5%;left:75%" id="mr">
            <div class="content">
                <div class="centered-y">
                    <h2>Royal Melbourne Institute of Technology</h2>
                    <img src="/img/uni_logo/mr.png">
                    <div class="uni_desc">
                        <span class="desc_title">World Ranking</span>
                        <span class="desc_content">QS世界大学排名: ... <br/> Times高等教育排名: ...</span>
                    </div>
                    <div class="uni_desc">
                        <span class="desc_title">Featured Subjects</span>
                        <span class="desc_content">Computer Science, Engineering</span>
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
                    <h4><strong>Ozunimates</strong>
                    </h4>
                    <p>Canberra, Australia</p>
                    <ul class="list-unstyled">
                        <li><i class="fa fa-phone fa-fw"></i> (+61) 416-365067</li>
                        <li><i class="fa fa-envelope-o fa-fw"></i>  <a href="mailto:xuan9230@gmail.com">xuan9230@gmail.com</a>
                        </li>
                    </ul>
                    <p class="text-muted">Copyright &copy; Ozunimates 2016</p>
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
