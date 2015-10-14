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

    <title>OzUnimates - meet future unimates</title>

    <link href="/css/normalize.css" rel="stylesheet"/>
    <link href="/css/jquery-ui.css" rel="stylesheet"/>
    <link href="/css/jquery.idealforms.min.css" rel="stylesheet" media="screen"/>
    <!-- Bootstrap Core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/css/welcome-page.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

<style type="text/css">

    #my-forma{width:595px;margin:0 auto;border:0px solid #ccc;padding:3em;border-radius:3px;box-shadow:0 0 0px rgba(0,0,0,0);}
    #my-formb{width:595px;margin:0 auto;border:0px solid #ccc;padding:3em;border-radius:3px;box-shadow:0 0 0px rgba(0,0,0,0);}

    #comments{width:350px;height:100px;}
</style>

</head>

<body>

    <!-- Modal -->
    <div class="modal fade" id="myModal1" tabindex="-1"  role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </br>
                                    </div>
                <div class="modal-body">
                    
                    <div class="row">
                        
                        <div class="eightcol last">
                            
                            <!-- Begin Form -->
                            
                            <form id="my-forma">
                                
                                <!-- leave for the future -->
<!--                                 <section name="Destination">  
                                    <label><input type="checkbox" name="langs[]" value="English"/>America</label>
                                    <label><input type="checkbox" name="langs[]" value="Chinese"/>Australia</label>
                                    <label><input type="checkbox" name="langs[]" value="Spanish"/>England</label>
                                    <label><input type="checkbox" name="langs[]" value="French"/>France</label>
                                </section> -->
                                
                                <section name="Degree">
                                        <p class="lead">What's your target degree?</p>
                                        <select id="states" name="states">
                                            <!-- <option value="default">&ndash; What's your target degree? &ndash;</option> -->
                                            <option value="hs">High School</option>
                                            <option value="ba">Bachelor</option>
                                            <option value="ma">Master</option>
                                            <option value="phd">PHD</option>
                                            <option value="otd">Others</option>       
                                        </select>
       
                                </section>

                                <section name="Ranking">
                                        <p class="lead">Choose a range of world ranking for your target university:</p>
                                        <label><input type="checkbox" name="langs[]" value="rank1"/>Top 30</label>
                                        <label><input type="checkbox" name="langs[]" value="rank2"/>30-80</label>
                                        <label><input type="checkbox" name="langs[]" value="rank3"/>80-200</label>
                                        <label><input type="checkbox" name="langs[]" value="rank4"/>200</label>
                                    
                                </section>

                                <section name="University">
                                        <p class="lead">Specify target universities if any:</p>
                                        <label><input type="checkbox" name="langs[]" value="anu"/>Australian National University</label>
                                        <label><input type="checkbox" name="langs[]" value="usyd"/>University of Sydney</label>
                                        <label><input type="checkbox" name="langs[]" value="umel"/>University of Melbourne</label>
                                        <label><input type="checkbox" name="langs[]" value="unsw"/>University of New South Wales</label>
                                    
                                </section>                    
                                
                            </form>
                            <!-- End Form -->
                            
                        </div>
                        
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="javascript:window.location.href='en/regisnlogin';" >Find Unimates!</button>
                </div>
            </div>
        </div>
    </div>
    
    
    <!-- Modal -->
    <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Willing</h4>
                </div>
                <div class="modal-body">
                    
                    <div class="row">
                        
                        <div class="eightcol last">
                            
                            <!-- Begin Form -->
                            
                            <form id="my-formb">
                                
                                <section name="University"> 
                                    <label><input type="checkbox" name="langs[]" value="English"/>Australia National University</label>
                                    <label><input type="checkbox" name="langs[]" value="Chinese"/>University of Sydney</label>
                                    <label><input type="checkbox" name="langs[]" value="Spanish"/>University of Melbourne</label>
                                </section>

                                <section name="Degree">   
                                    <option value="default">&ndash; choose degree &ndash;</option>
                                    <option value="AR">High School</option>
                                    <option value="AL">Bachelor</option>
                                    <option value="AK">Master</option>
                                    <option value="AZ">PHD</option>
                                    <option value="CA">Others</option>   
                                </section>
                                
                                <section name="Advantage">   
                                    <textarea NAME="Advantage" COLS=50 ROWS=10 maxlength="1000"></textarea>   
                                </section>
   
                            </form> 
                            <!-- End Form -->
                                
                        </div>   
                    </div>  
                </div>

                <div class="modal-footer">    
                    <button type="button" class="btn btn-primary" onclick="javascript:window.location.href='en/regisnlogin';" >Find Unimates!</button>
                </div>

            </div>
        </div>
    </div>

    <a id="menu-toggle" href="en/regisnlogin" class="btn btn-dark btn-lg toggle">Sign in</a>

    <!-- Header -->
    <header id="top" class="header">
        <div class="text-vertical-center">
            <h1>OzUnimates</h1>
            <h3>Meet future university mates.</h3>
            <br>
            <a class="btn btn-dark btn-lg" data-toggle="modal" data-target="#myModal1">Start As a Student</a>
            <a class="btn btn-dark btn-lg" data-toggle="modal" data-target="#myModal2">Start As a Counselor</a>
            <br><br>
            <a href="en/index" class="btn btn-dark btn-lg">See who's here!</a>
            <br><br>
            <a href="#about" class="fa fa-angle-double-down" id="tellMore"></a>
        </div>
    </header>

    <!-- About -->
    <section id="about" class="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Wanna study in Australia, but lack of informaion?</h2>
                    <p class="lead">Talk to your future university mates, directly.</p>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>

    <!-- Services -->
    <!-- The circle icons use Font Awesome's stacked icon classes. For more information, visit http://fontawesome.io/examples/ -->
    <section id="services" class="services bg-primary">
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-10 col-lg-offset-1">
                    <h2>Here your future unimates help with:</h2>
                    <hr class="small">
                    <div class="row">
                        <div class="col-md-3 col-sm-6">
                            <div class="service-item">
                                <span class="fa-stack fa-4x">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-pencil fa-stack-1x text-primary"></i>
                            </span>
                                <h4>
                                    <strong>Essay Editing</strong>
                                </h4>
                                <p>Personal Statement/Resume/...<br/>Ask a unimate to improve them!</p>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="service-item">
                                <span class="fa-stack fa-4x">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-university fa-stack-1x text-primary"></i>
                            </span>
                                <h4>
                                    <strong>University Information</strong>
                                </h4>
                                <p>Info for your aim uni/major.<br/>Translated into your language!</p>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="service-item">
                                <span class="fa-stack fa-4x">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-plane fa-stack-1x text-primary"></i>
                            </span>
                                <h4>
                                    <strong>Settle down</strong>
                                </h4>
                                <p>First time in Oz?<br/>Unimate helps you settle!</p>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="service-item">
                                <span class="fa-stack fa-4x">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-user-secret fa-stack-1x text-primary"></i>
                            </span>
                                <h4>
                                    <strong>Private Consultant</strong>
                                </h4>
                                <p>Want to be babysitted?<br/>Ask an unimate to be your private consultant.</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                    	<div class="col-md-12 col-sm-12">
                    		<a href="#portfolio" class="fa fa-angle-double-down" id="tellMore"></a>
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
    <section id="portfolio" class="portfolio">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1 text-center">
                    <h2>World's Top Universities in Australia</h2>
                    <hr class="small">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="portfolio-item">
                                <a href="#">
                                    <img class="img-portfolio img-responsive" src="/img/portfolio-1.jpg">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="portfolio-item">
                                <a href="#">
                                    <img class="img-portfolio img-responsive" src="/img/portfolio-2.jpg">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="portfolio-item">
                                <a href="#">
                                    <img class="img-portfolio img-responsive" src="/img/portfolio-3.jpg">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="portfolio-item">
                                <a href="#">
                                    <img class="img-portfolio img-responsive" src="/img/portfolio-4.jpg">
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- /.row (nested) -->
                    <a href="#" class="btn btn-dark">View More Items</a>
                </div>
                <!-- /.col-lg-10 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>

    <hr/>
    <!-- Footer -->
    <footer>
        <div class="container footer">
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1 text-center">
                    <h4><strong>OzUnimates</strong>
                    </h4>
                    <p>Canberra, Australia</p>
                    <ul class="list-unstyled">
                        <li><i class="fa fa-phone fa-fw"></i> (+61) 416-365067</li>
                        <li><i class="fa fa-envelope-o fa-fw"></i>  <a href="mailto:name@example.com">xuan9230@gmail.com</a>
                        </li>
                    </ul>
                    <br>
                    <ul class="list-inline">
                        <li>
                            <a href="#"><i class="fa fa-facebook fa-fw fa-3x"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-twitter fa-fw fa-3x"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-dribbble fa-fw fa-3x"></i></a>
                        </li>
                    </ul>
                    <hr class="small">
                    <p class="text-muted">Copyright &copy; OzUnimates 2015</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="/js/bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script>
    // Scrolls to the selected menu item on the page
    $(function() {
        $('a[href*=#]:not([href=#])').click(function() {
            if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') || location.hostname == this.hostname) {

                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                if (target.length) {
                    $('html,body').animate({
                        scrollTop: target.offset().top
                    }, 1000);
                    return false;
                }
            }
        });
    });
    </script>

    <script type="text/javascript" src="js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="js/jquery.idealforms.js"></script>
    <!-- display modals -->
    <script type="text/javascript">
        var options = {
            
            onFail: function(){
                alert( $myform.getInvalid().length +' invalid fields.' )
            },
            
            inputs: {
                
                'langs[]': {
                    filters: 'min max',
                    data: { min: 2, max: 3 },
                    errors: {
                        min: 'Check at least <strong>2</strong> options.',
                        max: 'No more than <strong>3</strong> options allowed.'
                    }
                }
            }
            
        };
    
    var $myforma = $('#my-forma').idealforms(options).data('idealforms');
     var $myformb = $('#my-formb').idealforms(options).data('idealforms');
    
    
    $('#reset').click(function(){
                      $myform.reset().fresh().focusFirst()
                      });
                      
                      $myform.focusFirst();
    </script>

</body>

</html>
