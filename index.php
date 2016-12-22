<!DOCTYPE html>
<html lang="en">
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/baitap/creative_onepage/functions/dbconnect.php'; ?>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Create onepage template</title>
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,700,600' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/animate.css">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="responsive.css">
</head>
<body>
	<header id="header-section" class="header-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
					<div class="logo">
						<a href="#" class="navbar-brand">
							<img class="img-responsive" src="img/logo.png" alt="Creative" />
						</a>
					</div>
					<button class="navbar-toggle collapsed" data-toggle="collapse" data-target=".menu-area" aria-expanded="false">
						<span class="sr-only">Menu</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
					<div class="menu-area navbar-collapse collapse pull-right">
						<ul class="nav navbar-nav">
							<?php 
								$mysqliMenus = "SELECT * FROM menus";
								$resultMenus = $mysqli->query ( $mysqliMenus );
								while ( $arMenus = mysqli_fetch_assoc ( $resultMenus ) ) {
									$id_menu = $arMenus ['id_menus'];
									$name_menu = $arMenus ['menu_name'];
							?>
							<li class="<?php if($id_menu==1) echo 'active' ; ?>"><a href="#"><?php echo $name_menu?></a></li>
							<?php }?>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<section id="slider-seaction" class="slider-area">
			<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
				<!-- Wrapper for slides -->
				<div class="carousel-inner" role="listbox">
					<?php 
						$mysqliSlider = "SELECT * FROM sliders";
						$resultSlider = $mysqli->query ( $mysqliSlider );
						while ( $arSlider = mysqli_fetch_assoc ( $resultSlider ) ) {
							$id_slider = $arSlider ['id_sliders'];
							$titleslider = $arSlider ['title'];
							$contentslider = $arSlider ['content'];
							$imgslider = $arSlider ['img'];
					?>
					<div class="item <?php if($id_slider==1) echo 'active'?> signle-slider">
						<img src="img/<?php echo $imgslider?>" alt="">
						<div class="carousel-caption">
							<h1 data-animation="animated bounceInLeft"><?php echo $titleslider?></h1>
							<p data-animation="animated bounceInRight"><?php echo $contentslider?></p>
						</div>
					</div>
					<?php } ?>
				</div>

				<!-- Controls -->
				<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
					<i class="fa fa-angle-left" aria-hidden="true"></i>
				</a>
				<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
					<i class="fa fa-angle-right" aria-hidden="true"></i>
				</a>
			</div>

			<div class="slide-down">
				<a href="" class="slide_down_btn">
					<i class="fa fa-angle-down"></i>
				</a>			
			</div>
		</section>
		<!--end slider-area-->
	</header>
	<!-- end header-area -->

	<section class="about-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="about-content text-center" id="about">
						<h1> INVEST IN YOUR <span>FUTURE</span></h1>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
							aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
							Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.Lorem ipsum
							dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
						</p>
						<p> Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy
							text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen
							book.
						</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- end about-area -->

	<section id="promotional-section" class="promotional-area">
		<div class="container">
			<div class="row">
				<div class="featured-area" id="services">
					<?php 
						$mysqliPro = "SELECT * FROM promotionals";
						$resultPro = $mysqli->query ( $mysqliPro );
						while ( $arPro = mysqli_fetch_assoc ( $resultPro ) ) {
						$id_pro = $arPro ['id_pro'];
						$titlepro = $arPro ['title'];
						$detailpro = $arPro ['detail'];
						$imgpro = $arPro ['img'];
					?>
					<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
						<div class="single-featurebox text-center">
							<div class="single-feature-image" style="padding: 25px 30px;">
								<img src="img/<?php echo $imgpro?>" alt="">
							</div>
							<h3><?php echo $titlepro?></h3>
							<p><?php echo $detailpro?></p>
						</div>
					</div>
					<?php
						}
					?>
				</div>
				<div class="testimonial-area">
					<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 col-lg-offset-2 col-md-offset-2">
						<div class="testimonial-slider text-center">
							<div class="testi-devider">
								<img src="img/mini-user.png" alt="">
							</div>
							<div class="carousel slide" data-ride="carousel">
								<!-- Indicators -->
								<ol class="carousel-indicators">
									<li data-target="#" data-slide-to="0" class="active"></li>
									<li data-target="#" data-slide-to="1"></li>
									<li data-target="#" data-slide-to="2"></li>
								</ol>

								<!-- Wrapper for slides -->
								<div class="carousel-inner" role="listbox">
									<?php 
										$mysqliPro1 = "SELECT * FROM promotionals";
										$resultPro1 = $mysqli->query ( $mysqliPro1 );
										while ( $arPro1 = mysqli_fetch_assoc ( $resultPro1 ) ) {
										$id_pro = $arPro1 ['id_pro'];
										$authorpro = $arPro1 ['author'];
										$jobpro = $arPro1 ['job'];
										$aboutpro = $arPro1 ['about_author'];
									?>
									<div class="item <?php if($id_pro==1) echo 'active'?> single-testi">
										<p><?php echo $aboutpro?></p>
										<div class="testi-author">
											<h4><?php echo $authorpro?></h4>
											<h6><?php echo $jobpro?></h6>
										</div>
									</div>
									<?php }?>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--end testimonial-area-->
			</div>
		</div>
	</section>
	<section id="specilizer-section" class="specilizer-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
					<div class="works-tabs" id="speclize">
						<h1>What we do</h1>
						<div class="tabs-area">
							<!-- Nav tabs -->
							<ul class="nav nav-tabs" role="tablist">
								<?php 
									$dem =1;
									$mysqliSpecial = "SELECT * FROM specialization ORDER BY id_special ASC LIMIT 3";
									$resultSpecial = $mysqli->query ( $mysqliSpecial );
									while ( $arSpecial = mysqli_fetch_assoc ( $resultSpecial ) ) {
									$id_Special = $arSpecial ['id_special'];
									$titleSpecial = $arSpecial ['title'];
									$dem=$dem+1;
								?>
								<li role="presentation" class="<?php if($dem==3) echo 'active' ?>"><a href="#" aria-controls="<?php echo $titleSpecial?>" role="tab" data-toggle="tab"><?php echo $titleSpecial?></a></li>
								<?php }?>
							</ul>

							<!-- Tab panes -->
							<div class="tab-content">
								<div role="tabpanel" class="tab-pane active" id="development">
									<div class="single-tab">
										<?php 
											$mysqliSpecial1 = "SELECT * FROM specialization  LIMIT 1";
											$resultSpecial1 = $mysqli->query ( $mysqliSpecial1 );
											while ( $arSpecial1 = mysqli_fetch_assoc ( $resultSpecial1 ) ) {
											$contentspe = $arSpecial1 ['content'];
										?>
										<p><?php echo $contentspe?></p>
										<?php }?>
										<div class="sigworks-group">
											<?php 
												$mysqliicon = "SELECT spi.name AS spiname,spi.caption AS spicap FROM specialization AS sp INNER JOIN spec_rela_n AS sr 
												ON sp.id_special=sr.id_special INNER JOIN special_icon AS spi ON spi.id_spe_icon = sr.id_spec_icon 
												WHERE sp.id_special=1 ";
												$resulticon= $mysqli->query ( $mysqliicon );
												while ( $aricon = mysqli_fetch_assoc ( $resulticon ) ) {
												$spiname = $aricon ['spiname'];
												$spicap = $aricon ['spicap'];
											?>
											<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 text-center">
												<div class="single-sigworks">
													<i class="<?php echo $spicap?>"></i>
													<h4><?php echo $spiname?></h4>
												</div>
											</div>
											<?php }?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- end tap selection -->
				</div>
				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
					<div class="progress-bars">
						<h1>Our Specialization</h1>
						<p>I am text block. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut
							elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.
						</p>
						<div class="progressbar-area">
							<?php 
								$mysqliSpe = "SELECT * FROM specialization";
								$resultSpe = $mysqli->query ( $mysqliSpe );
								while ( $arSpe = mysqli_fetch_assoc ( $resultSpe ) ) {
								$id_spe = $arSpe ['id_special'];
								$valuespe = $arSpe ['value'];
								$titlespe = $arSpe ['title'];
							?>
							<div class="single-progressbar">
								<div class="progresstitle"><span><?php echo $titlespe?></span><span><?php echo $valuespe?>%</span></div>
								<div class="progress">
									<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="<?php echo $valuespe?>" aria-valuemin="0" aria-valuemax="100"
										style="width: <?php echo $valuespe?>%">
									</div>
								</div>
							</div>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section id="whitespace-section" class="whitespace-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 col-lg-offset-2 col-md-offset-2 text-center">
					<div class="white-space">
						<h1>Works We Did</h1>
						<div class="wa-devider">
							<i class="fa fa-tv"></i>
						</div>
						<p>Lorem Ipsum is simply dummy text of the printing and typestting industry. Lorem Ipsum has been the industry’s</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--end whitespace-area-->

	<section id="porfolio-section" class="portfolio-area">
		<div class="container">
			<div class="row">
				<div class="portfilter-area text-center" id="portfolio">
					<ul class="portfolio-filter">
						<?php 
							$mysqliCate = "SELECT * FROM categorys";
							$resultCate = $mysqli->query ( $mysqliCate );
							while ( $arCate = mysqli_fetch_assoc ( $resultCate ) ) {
							$id_cate = $arCate ['id_cate'];
							$namecate = $arCate ['name'];
						?>
						<li><a href="#" class="<?php if($id_cate==1) echo 'active' ?>" data-filter="<?php if($id_cate==1) echo '*' ?>
						<?php if($id_cate!=1) echo '.'.$namecate ?> "><?php echo $namecate?></a></li>
						<?php }?>
					</ul>
				</div>
			</div>
			<div class="row">
				<div class="portfolio-items" >
					<?php
						$mysqlipro = "SELECT * FROM projects";
						$resultpro = $mysqli->query ( $mysqlipro );
						while ( $arpro = mysqli_fetch_assoc ( $resultpro ) ) {
						$id_projects = $arpro ['id_projects'];
						$nameprojects = $arpro ['projects_name'];
						$imgproject = $arpro ['img'];
						$mysqlipro1 = "SELECT * FROM categorys AS ca INNER JOIN projects AS pr ON pr.id_cate= ca.id_cate
						WHERE pr.id_projects = $id_projects";
						$resultpro1 = $mysqli->query ( $mysqlipro1 );
						while ( $arpro1 = mysqli_fetch_assoc ( $resultpro1 ) ) {
							$namecate1 = $arpro1['name'];
					?>
					<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 portfolio-item <?php echo $namecate1?> ">
						<?php }?>
						<div class="single-portfolio">
							<img class="img-responsive" src="img/<?php echo $imgproject?>" alt="" />
							<div class="port-info text-center">
								<h4><?php echo $nameprojects ?></h4>
								<h6><?php echo $namecate1 ?></h6>
							</div>
						</div>
					</div>
						<?php  }?>
				</div>
			</div>
		</div>
	</section>
	<!--end portfolio area-->

	<section class="counter-area">
		<div class="container">
			<div class="row">
				<?php 
					$mysqlicount = "SELECT * FROM counters";
					$resultcount = $mysqli->query ( $mysqlicount );
					while ( $arcount = mysqli_fetch_assoc ( $resultcount ) ) {
					$countname = $arcount ['count_name'];
					$valuecount = $arcount ['value'];
					$imgcount = $arcount ['img'];
				?>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
					<div class="single-counter text-center">
						<img src="img/<?php echo $imgcount?>" alt="" />
						<h6><?php echo $countname?></h6>
						<span><?php echo $valuecount?></span>
					</div>
					<!--end single counter-->
				</div>
					<?php }?>
			</div>
		</div>
	</section>
	
	<section id="googleMap-section" class="googleMap-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 col-lg-offset-2 col-md-offset-2">
					<div class="googleMap-content text-center">
						<h1>Get In Touch</h1>
						<div class="map-devider"><i class="fa fa-angle-down"></i></div>
						<p>Lorem Ipsum is simply dummy text of the printing and typestting industry. Lorem Ipsum has been the industry’s</p>
						<i class="fa fa-map-marker"></i>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--end google map area-->
	
	<section id="contact" class="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center" style="margin-bottom: 15px;">
                    <h2>Contact Us</h2>
                </div><!-- /.section-header -->
            </div><!-- /.row -->
            <div class="row">
                <div class="">
                    <div class="col-lg-8 col-sm-8 col-sm-6 col-xs-12">
                        <form method="POST" action="sendMail.php" accept-charset="UTF-8" class="frm-show-form" id="form-contacts" novalidate="novalidate">
                        <input name="_token" type="hidden" value="5Z5oYKewpvNiQOIfyl85Wdz2PGUiyYpwLGWzGkWB">
                        <div class="frm_forms " id="frm_form_3_container">
                            <div class="frm_form_field form-field col-sm-6">
                                <input class="form-control" placeholder="Name" name="name" type="text">
                            </div>
                            <div class="frm_form_field form-field col-sm-6">
                                <input class="form-control" placeholder="Email Address" name="email" type="text">
                            </div>
                            <div class="frm_form_field form-field col-sm-12" style="padding-top: 2%;padding-bottom: 2%;">
                                <input class="form-control" placeholder="Name company" name="company" type="text">
                            </div>
                        </div>
                        <div class="">
                            <div class="col-sm-12">
                                <div class="frm_forms with_frm_style" id="frm_form_3_container">
                                    <div class="frm_form_field form-field  frm_none_container">
                                        <textarea class="form-control" rows="6" placeholder="Content" id="field_2ywico" name="content" cols="50"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="" style="margin-top: 5%;">
                                    <input class="form-control btn btn-primary" type="submit" name="send" value="Send">
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>                    
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="map-area">
							<div id="googleMap" style="width: 350px;height: 270px;"></div>
						</div>
                    </div>
                </div>
            </div>
        </div><!-- /.container -->    
    </section>
	<!--end map area-->

	<footer id="footer-section" class="footer-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="foot-social-icon text-center">
						<a href="#"><i class="fa fa-facebook"></i></a>
						<a href="#"><i class="fa fa-twitter"></i></a>
						<a href="#"><i class="fa fa-linkedin"></i></a>
						<a href="#"><i class="fa fa-google-plus"></i></a>
					</div>
					<div class="copyright text-center">Copyright &copy; 2015 Cretive Theme. All Rights Reserved.</div>
				</div>
			</div>
			<a href="#" id="scroll" title="Scroll to Top" style="display: none;">Top<span></span></a>
		</div>
	</footer>
	<!--end footer-->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/isotope.min.js"></script>
	<script src="js/main.js"></script>
	<script src="admin/jquery.validate.js"></script>
	<!-- Google maps API -->
	<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBEwv9OhddUeRUq34CYcw9QeQkjqQIPzno&callback=initMap"></script>
	<script>
		var myCenter=new google.maps.LatLng(16.075818, 108.151783);
		function initialize()
		{
		var mapProp = {
			center:myCenter,
			zoom:15,
			scrollwheel: false,
			mapTypeId:google.maps.MapTypeId.ROADMAP
		};

		var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);

		var marker=new google.maps.Marker({
			position:myCenter,
			});
		marker.setMap(map);
		}
		google.maps.event.addDomListener(window, 'load', initialize);      
	</script>
	<script type="text/javascript">
		$(document).ready(function(){
		$("#form-contacts").validate({
			rules: {
				name: {
					required: true,
					maxlength: 50,
				},
				email: {
					required: true,
					email: true,
				},
				company: {
					required: true,
					maxlength: 30
				},
				content: {
					required: true,
					maxlength: 1000
				},
			},
			messages: {
				name: {
					required: "<p style='color:red'>Require input</p>",
				},
				email: {
					required: "<p style='color:red'>Require input</p>",
					email: "<p style='color:red'>Format false</p>",
				},
				company: {
					required: "<p style='color:red'>Require input</p>",
				},
				content: {
					required: "<p style='color:red'>Require input</p>",
				},
			}
		});
	});
	</script>	
</body>
</html>