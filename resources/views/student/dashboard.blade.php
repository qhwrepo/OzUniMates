<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link href="/css/dashboard.css" rel="stylesheet" type="text/css" />
</head>

<body>

    <nav id="site-nav" class="site-nav" role='navigation'>
      <button href="#" id="site-nav--toggle"  class="site-nav--toggle"><i class="entypo-menu"></i>Menu</button></button>
      <ul class="site-nav--list">
        <li><a href="#"><i class="entypo-gauge"></i>Dashboard</a></li>
        <li><a href="#"><i class="entypo-download"></i>Work Queue</a></li>
        <li><a href="#"><i class="entypo-picture"></i>Asset Mgmt</a></li>
        <li><a href="#"><i class="entypo-doc-text"></i>Reports</a></li>
        <li><a href="#"><i class="entypo-chart-bar"></i>Admin</a></li>
        <li><a href="#"><i class="entypo-user"></i>Your Profile</a></li>
        <li><a href="#"><i class="entypo-logout"></i>Logout</a></li>
        <li><a href="#"><i class="entypo-lifebuoy"></i>Help</a></li>
      </ul>
    </nav>
    <div class="wrapper">
      <header class="site-header">
        <h1>{{$user->username}} | <span class="site-header--current">个人信息</span></h1>
<!--         <aside class="account">GabeN <i class="entypo-user"></i></aside> -->
      </header>
      <section class="workspace">
        <div id="integration-list">
    <ul>
        <li>
            <a>
                <div>
                    <h2>用户名</h2>
                    <span>{{$user->username}}</span>
                </div>
            </a>
        </li>
        <li>
            <a>
                <div>
                    <h2>用户名</h2>
                    <span>{{$user->username}}</span>
                </div>
            </a>
        </li>
        <li>
            <a>
                <div>
                    <h2>用户名</h2>
                    <span>{{$user->username}}</span>
                </div>
            </a>
        </li>
        <li>
            <a>
                <div>
                    <h2>用户名</h2>
                    <span>{{$user->username}}</span>
                </div>
            </a>
        </li>







        <li>
            <a class="expand">
                <div class="right-arrow">+</div>
                <h2>DCD Design</h2>
                <span>Cable installation tools, Line swivels, Duct pullers, Cable pulling eyes, Wire mesh grips, Line blowing, Lubricants, Manhole products, Duct rodders and a new cable puller, Cable Lashers</span>
            </a>

            <div class="detail">
                <div id="left" style="width:15%;float:left;height:100%;">
                    <div id="sup">
                        <img src="http://www.dcddesign.com/images/dcd-logo.jpg" width="100%" />
                    </div>
                </div>
                <div id="right" style="width:85%;float:right;height:100%;padding-left:20px;">
                    <div id="sup">
                        <div><span>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</span>
                            <br />
                            <br /><a href="http://www.dcddesign.com/">Visit Website</a>
                        </div>
                    </div>
                </div>
            </div>
        </li>
        <li>
            <a class="expand">
                <div class="right-arrow">+</div>
                <h2>Huskie Tools</h2>
                <span>Huskie Tools battery powered compression tools and cutters, hydraulic compression and cutting tools and dies</span>
            </a>

            <div class="detail">
                <div id="left" style="width:15%;float:left;height:100%;">
                    <div id="sup">
                        <img src="http://www.huskietools.info/ht_wp//wp-content/uploads/2012/06/logo.gif" width="100%" />
                    </div>
                </div>
                <div id="right" style="width:85%;float:right;height:100%;padding-left:20px;">
                    <div id="sup">
                        <div><span>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</span>
                            <br />
                            <br /><a href="http://www.huskietools.com/">Visit Website</a>
                        </div>
                    </div>
                </div>
            </div>
        </li>
        <li>
            <a class="expand">
                <div class="right-arrow">+</div>
                <h2>Line Hardware</h2>
                <span>Pole, cable, pipe, coil pipe, flatbed, low-boy and equipment trailers.</span>
            </a>

            <div class="detail">
                <div id="left" style="width:15%;float:left;height:100%;">
                    <div id="sup">
                        <img src="http://www.linehardware.com/graphics/logo2.gif" width="100%" />
                    </div>
                </div>
                <div id="right" style="width:85%;float:right;height:100%;padding-left:20px;">
                    <div id="sup">
                        <div><span>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</span>
                            <br />
                            <br /><a href="#">Visit Website</a>
                        </div>
                    </div>
                </div>
            </div>
        </li>
        <li>
            <a class="expand">
                <div class="right-arrow">+</div>
                <h2>Lonestar Prestress</h2>
                <span>Concrete poles up to 75’, square tapered, smooth or pebble finish, easi-set transportable pre-cast concrete buildings</span>
            </a>

            <div class="detail">
                <div id="left" style="width:15%;float:left;height:100%;">
                    <div id="sup">
                        <img src="http://www.lonestarprestress.com/images/main_logo.jpg" width="100%" />
                    </div>
                </div>
                <div id="right" style="width:85%;float:right;height:100%;padding-left:20px;">
                    <div id="sup">
                        <div><span>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</span>
                            <br />
                            <br /><a href="#">Visit Website</a>
                        </div>
                    </div>
                </div>
            </div>
        </li>
        <li>
            <a class="expand">
                <div class="right-arrow">+</div>
                <h2>Mid Central Electric</h2>
                <span>½ to 5 KVA transformers and capacitor isolators, low loss copper wound</span>
            </a>

            <div class="detail">
                <div id="left" style="width:15%;float:left;height:100%;">
                    <div id="sup">
                        <img src="http://www.midcentralelectric.com/intro.jpg" width="100%" />
                    </div>
                </div>
                <div id="right" style="width:85%;float:right;height:100%;padding-left:20px;">
                    <div id="sup">
                        <div><span>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</span>
                            <br />
                            <br /><a href="#">Visit Website</a>
                        </div>
                    </div>
                </div>
            </div>
        </li>
        <li>
            <a class="expand">
                <div class="right-arrow">+</div>
                <h2>Quality FiberGlass</h2>
                <span>Ground sleeves, switch gear and transformer box pads, cable trays, battery racks, fuse cabinets and trench covers.</span>
            </a>

            <div class="detail">
                <div id="left" style="width:15%;float:left;height:100%;">
                    <div id="sup">
                        <img src="http://www.qualityfiberglassproducts.com/uploads/3/3/9/7/3397275/1394822038.png" width="100%" />
                    </div>
                </div>
                <div id="right" style="width:85%;float:right;height:100%;padding-left:20px;">
                    <div id="sup">
                        <div><span>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</span>
                            <br />
                            <br /><a href="#">Visit Website</a>
                        </div>
                    </div>
                </div>
            </div>
        </li>
        <li>
            <a class="expand">
                <div class="right-arrow">+</div>
                <h2>RMC Plastics</h2>
                <span>Wildlife protectors, Secondary twist wire separators and Spreader tools.</span>
            </a>

            <div class="detail">
                <div id="left" style="width:15%;float:left;height:100%;">
                    <div id="sup">
                        <img src="http://rmcplastics.com/wp-content/themes/rmcplastics/images/RMC-logo200.fw.png" width="100%" />
                    </div>
                </div>
                <div id="right" style="width:85%;float:right;height:100%;padding-left:20px;">
                    <div id="sup">
                        <div><span>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</span>
                            <br />
                            <br /><a href="#">Visit Website</a>
                        </div>
                    </div>
                </div>
            </div>
        </li>
        <li>
            <a class="expand">
                <div class="right-arrow">+</div>
                <h2>ROHN Products</h2>
                <span>Tapered Steel poles for power line, substations and lighting.</span>
            </a>

            <div class="detail">
                <div id="left" style="width:15%;float:left;height:100%;">
                    <div id="sup">
                        <img src="http://www.twrlighting.com/images/rohn.jpg" width="100%" />
                    </div>
                </div>
                <div id="right" style="width:85%;float:right;height:100%;padding-left:20px;">
                    <div id="sup">
                        <div><span>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</span>
                            <br />
                            <br /><a href="#">Visit Website</a>
                        </div>
                    </div>
                </div>
            </div>
        </li>
        <li>
            <a class="expand">
                <div class="right-arrow">+</div>
                <h2>Speed Systems</h2>
                <span>Cable preparation tools, secondary and primary cable strippers; elbow puller: Oklahoma and North Texas</span>
            </a>

            <div class="detail">
                <div id="left" style="width:15%;float:left;height:100%;">
                    <div id="sup">
                        <img src="http://www.spdsystems.com/Content/Images/SpdSysLogo.gif" width="100%" />
                    </div>
                </div>
                <div id="right" style="width:85%;float:right;height:100%;padding-left:20px;">
                    <div id="sup">
                        <div><span>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</span>
                            <br />
                            <br /><a href="#">Visit Website</a>
                        </div>
                    </div>
                </div>
            </div>
        </li>
        <li>
            <a class="expand">
                <div class="right-arrow">+</div>
                <h2>Tiiger</h2>
                <span>Pole Pulling Equipment</span>
            </a>

            <div class="detail">
                <div id="left" style="width:15%;float:left;height:100%;">
                    <div id="sup">
                        <img src="http://www.tiiger.com/images/Tiiger_logo.jpg" width="100%" />
                    </div>
                </div>
                <div id="right" style="width:85%;float:right;height:100%;padding-left:20px;">
                    <div id="sup">
                        <div><span>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</span>
                            <br />
                            <br /><a href="#">Visit Website</a>
                        </div>
                    </div>
                </div>
            </div>
        </li>
        <li>
            <a class="expand">
                <div class="right-arrow">+</div>
                <h2>Trayer Engineering</h2>
                <span>Submersible and Padmount Switchgear, Auto-Transfer & SCADA</span>
            </a>

            <div class="detail">
                <div id="left" style="width:15%;float:left;height:100%;">
                    <div id="sup">
                        <img src="http://trayer.com/wp-content/uploads/2013/11/trayer-logo.jpg" width="100%" />
                    </div>
                </div>
                <div id="right" style="width:85%;float:right;height:100%;padding-left:20px;">
                    <div id="sup">
                        <div><span>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</span>
                            <br />
                            <br /><a href="#">Visit Website</a>
                        </div>
                    </div>
                </div>
            </div>
        </li>

    </ul>
</div>
      </section>
    </div>

    <script type="text/javascript" src="/js/jquery.min.js"></script>
    <script type="text/javascript" src="/js/dashboard.js"></script>
</body>

</html>