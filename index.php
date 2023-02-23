<?php 
    include 'inc/header.php';
?>
<!DOCTYPE html>
<html>

<head>
    <title>Te Lami</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <!-- Slider CSS -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
	<link rel="stylesheet" href="carousel-02/css/owl.carousel.min.css">
    <link rel="stylesheet" href="carousel-02/css/owl.theme.default.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/4.5.6/css/ionicons.min.css">
	<link rel="stylesheet" href="carousel-02/css/smth.css">
    <script src="https://kit.fontawesome.com/66346d787d.js" crossorigin="anonymous"></script>
  </head>
</head>

<body>
    <section class="header-img">
        <div class="slide-bar">
            <img src="images/restaurant1.jpg" class="img1"></img>
            <img src="images/restaurant2.jpg" class="img2"></img>
        </div>
        <div class="img-content">
            <div class="img-text">
                <p>Sherbim i mrekullueshem!</p>
                <h2>Menyte me te mira ne qytet!</h2>
                <div class="img-menu-button">
                    <a href="ushqimet.php">Shiko menyne <i class="fa-solid fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </section>

    <section class="section1">
        <div class="container">
            <div class="section1-content">
                <div class="service1">
                    <div class="service-icon">
                        <i class="fa-solid fa-map-location-dot"></i>
                    </div>
                    <div class="service-text">
                        <h2>An amazing menu!</h2>
                        <p>We have menu options ranging from drinks to desserts!</p>
                        <a href="#">Read More</a>
                    </div>
                </div>
                <div class="service1 service1-bg">
                    <div class="service-icon">
                        <i class="fa-solid fa-utensils"></i>
                    </div>
                    <div class="service-text">
                        <h2>Great location!</h2>
                        <p>We are located in the heart of Prishtina!</p>
                        <a href="#">Read More</a>
                    </div>
                </div>
                <div class="service1">
                    <div class="service-icon">
                        <i class="fa-solid fa-user-tie"></i>
                    </div>
                    <div class="service-text">
                        <h2>Best staff anywhere!</h2>
                        <p>Our staff is highly trained to serve give you the best experience you deserve!</p>
                        <a href="#">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section">
			<div class="container">
				<div class="row">
					<div class="col-md-12 text-center">
						<h2 class="heading-section mb-5 pb-md-4">Our special menu!</h2>
					</div>
					<div class="col-md-12">
						<div class="featured-carousel owl-carousel">
                        <?php
                            $ushqimet=merrUshqimet();
                            while ($ushqimi = mysqli_fetch_assoc($ushqimet)) {
                                $ushid=$ushqimi['ushqimetID'];
                                $ushqimiFoto=$ushqimi['foto'];
                                echo "<div class='item'>";
                                echo "<div class='work'>";
                                echo "<div class='img d-flex align-items-center justify-content-center rounded' style='background-image: url(images/$ushqimiFoto);'>";
                                echo "<a href='ushqimet.php' class='icon d-flex align-items-center justify-content-center'>";
                                echo "<span class='ion-ios-search'></span>";
                                echo "</a>";
                                echo "</div>";
                                echo "<div class='text pt-3 w-100 text-center'>";
                                echo "<h3><a href='#'>". $ushqimi['emriUshqimit'] ."</a></h3>";
                                echo "<span>". $ushqimi['pershkrimi'] ."</span>";
                                echo "</div></div></div>";
                            }
                        ?>
							<!--<div class="item">
								<div class="work">
									<div class="img d-flex align-items-center justify-content-center rounded" style="background-image: url(carousel-02/images/work-1.jpg);">
										<a href="#" class="icon d-flex align-items-center justify-content-center">
											<span class="ion-ios-search"></span>
										</a>
									</div>
									<div class="text pt-3 w-100 text-center">
										<h3><a href="#">Work 01</a></h3>
										<span>Web Design</span>
									</div>
								</div>
							</div>-->
                            
						</div>
					</div>
				</div>
			</div>
		</section>

    <section class="section2">
        <div class="container">
            <div class="section2-content">
                <div class="section2-imgSection">
                    <img src="images/restaurant2.jpg" alt="Menu">
                </div>
                <div class="section2-description">
                    <p class="section2-description-about">About Us</p>
                    <div class="section2-description-h2">
                        <h2>Te Lami</h2>
                        <h2>has the best menu in Prishtina!</h2>
                    </div>
                    <p class="section2-description-about2">We have the best menu in the city of Prishtina, aswell as the
                        best staff just waiting to serve you and give you the best experience!</p>
                    <div class="section2-description-p">
                        <div class="section2-box">
                            <p>01</p>
                        </div>
                        <div class="section2-description-paragraph">
                            <p>Professional & Expert</p>
                            <p>We make sure to cook your food exactly how you like it!</p>
                        </div>
                    </div>
                    <div class="section2-description-p">
                        <div class="section2-box">
                            <p>02</p>
                        </div>
                        <div class="section2-description-paragraph">
                            <p>Quality and Excellent Staff</p>
                            <p>Our staff is extremely friendly and very professional.</p>
                        </div>
                    </div>
                    <div class="section2-description-p">
                        <div class="section2-box">
                            <p>03</p>
                        </div>
                        <div class="section2-description-paragraph">
                            <p>Large Menu</p>
                            <p>Our menu literally consists of 10 pages!</p>
                        </div>
                    </div>
                    <div class="img-menu-button">
                        <a href="ushqimet.php">Shiko menyne <i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php  
        include "inc/footer.php";
    ?>
    <script src="carousel-02/js/jquery.min.js"></script>
    <script src="carousel-02/js/popper.js"></script>
    <script src="carousel-02/js/bootstrap.min.js"></script>
    <script src="carousel-02/js/owl.carousel.min.js"></script>
    <script src="carousel-02/js/main.js"></script>
</body>

</html>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
