<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>School Notification Installation</title>

        <link rel="stylesheet" type="text/css" href="{{asset('bootstrap/css/bootstrap.css')}}">
        <style>
            .body img {
                width: 100% !important;
            }
            .body h3 {
                color: #7C86CE;
                font-weight: bold;
                font-size: 18px;
            }
            body {
                font-family: "Khmer OS Battambang";
            }
            .thumbnail {
              display: block;
              padding: 4px;
              margin-bottom: 20px;
              line-height: 1.42857143;
              -webkit-transition: all .2s ease-in-out;
              transition: all .2s ease-in-out;
              border-radius: 0;
              border: none;
              background-color: none;
            }

            .carousel-control {
              position: absolute;
              top: 0;
              left: 0;
              bottom: 0;
              width: 15%;
              opacity: .5;
              font-size: 20px;
              color: #fff;
              text-align: center;
              text-shadow: none;
            }
            .carousel-control.left {
                background-image: none;
                    color: #7c87d0;
            }
            .carousel-control.right {
                  left: auto;
                  right: 0;
                  background-image: none;
                      color: #7c87d0;
            }

            .carousel-control {
              padding-top:10.25%;
              width:5%;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h3>{{$title}}</h3>
                    <hr/>
                    <div class="col-sm-6 col-md-6">
                        <div class="thumbnail">
                          <img src="images/ios.png" alt="iOS Download">
                            <div class="caption text-center">
                                <h3>iOS Download</h3>
                                <p><a href="https://itunes.apple.com/kh/app/schnotify/id1084268027?mt=8" class="btn btn-default" role="button"><span class="glyphicon glyphicon-cloud-download" aria-hidden="true"></span> Install Now </a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <div class="thumbnail">
                          <img src="images/android.png" alt="Android Download">
                            <div class="caption text-center">
                                <h3>Android Download</h3>
                                <p><a href="https://play.google.com/store/apps/details?id=trendsecsolution.com.schoolnotificationapp" class="btn btn-success" role="button"><span class="glyphicon glyphicon-cloud-download" aria-hidden="true"></span> Install Now </a></p>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    
                    
                    <div class="container well">
                    <h3>How to instal App on Android Device</h3>
                    <hr/>
                        <div class="col-md-12">
                            <div class="well-none">
                                <div id="myCarousel" class="carousel slide">
                                    
                                    <!-- Carousel items -->
                                    <div class="carousel-inner">

                                        <div class="item active">
                                            <div class="row">
                                                <div class="col-sm-3 col-xs-6"><a href="./images/devices/android01.png"><img src="./images/devices/android01.png" alt="Image" class="img-responsive"></a>
                                                </div>
                                                <div class="col-sm-3 col-xs-6"><a href="./images/devices/android02.png"><img src="./images/devices/android02.png" alt="Image" class="img-responsive"></a>
                                                </div>
                                                <div class="col-sm-3 col-xs-6"><a href="./images/devices/android03.png"><img src="./images/devices/android03.png" alt="Image" class="img-responsive"></a>
                                                </div>
                                                <div class="col-sm-3 col-xs-6"><a href="./public/images/devices/android05.png"><img src="./images/devices/android05.png" alt="Image" class="img-responsive"></a>
                                                </div>
                                            </div>
                                            <!--/row-->
                                        </div>
                                       
                                        <!--/item-->
                                    </div>
                                    <!--/carousel-inner
                                    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                                    <i class="glyphicon glyphicon-chevron-left fa-4"></i></a>

                                    <a class="right carousel-control" href="#myCarousel" data-slide="next">
                                    <i class="glyphicon glyphicon-chevron-right fa-4"></i></a>--> 
                                </div>
                                <!--/myCarousel-->
                            </div>
                            <!--/well-->
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    
                    <div class="container well">
                        
                        <h3>How to instal App on iOS Device</h3>
                        <hr/>
                        <div class="col-md-12">
                            <div class="well-none">
                                <div id="myCarousel1" class="carousel slide">
                                    <!-- Carousel items -->
                                    <div class="carousel-inner">
                                        <div class="item active">
                                            <div class="row">
                                                <div class="col-sm-3 col-xs-6"><a href="./images/devices/ios1.png"><img src="./images/devices/ios1.png" alt="Image" class="img-responsive"></a>
                                                </div>
                                                <div class="col-sm-3 col-xs-6"><a href="./images/devices/ios2.png"><img src="./images/devices/ios2.png" alt="Image" class="img-responsive"></a>
                                                </div>
                                                <div class="col-sm-3 col-xs-6"><a href="./images/devices/ios3.png"><img src="./images/devices/ios3.png" alt="Image" class="img-responsive"></a>
                                                </div>
                                                <div class="col-sm-3 col-xs-6"><a href="./images/devices/ios4.png"><img src="./images/devices/ios4.png" alt="Image" class="img-responsive"></a>
                                                </div>
                                            </div>
                                            <!--/row-->
                                        </div>
                                        <!--/item-->
                                    </div>
                                    <!--/carousel-inner--
                                    <a class="left carousel-control" href="#myCarousel1" data-slide="prev">
                                    <i class="glyphicon glyphicon-chevron-left fa-4"></i></a>

                                    <a class="right carousel-control" href="#myCarousel1" data-slide="next">
                                    <i class="glyphicon glyphicon-chevron-right fa-4"></i></a> -->
                                </div>
                                <!--/myCarousel-->
                            </div>
                            <!--/well-->
                        </div>
                    </div>
                    
                    <div class="clearfix"></div>
                    <hr/>
                    <p>&COPY; TRENDSECSOLUTION Co,. Ltd <?php echo date('Y'); ?></p>
                </div>
            </div>

        </div>
        <!-- jQuery -->
        <script type="text/javascript" src="{{asset('/plugins/jQuery/jquery-2.2.3.min.js')}}"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <!-- Bootstrap -->
        <script type="text/javascript" src="{{asset('/bootstrap/js/bootstrap.min.js')}}"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#myCarousel').carousel({
                    interval: 0
                })

                $('#myCarousel').on('slid.bs.carousel', function() {
                    //alert("slid");
                });


            });


        </script>
    </body>
</html>