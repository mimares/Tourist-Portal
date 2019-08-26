<?php require "header.inc.php" ?>


<section id="home-slider">
    <div class="container">
        <div class="row">
            <div class="main-slider">
                <div class="slide-text">
                    <h1>Welcome to Subotica</h1>
                    <p>Explore this lovely gem in the north of Serbia, on your own or with some help from our guides!</p>
                    <?php if (!isset($_SESSION['username'])) {
                        echo '<a href="register.php" class="btn btn-info btn-lg">SIGN UP</a>';

                    }
                    ?>
                </div>
                <img src="assets/images/gradskaKuca.png" class="slider-hill" alt="slider image">
                <!--<img src="images/home/slider/pozoriste2.png" class="slider-house" alt="slider image">  -->
                <img src="images/home/slider/sun.png" class="slider-sun" alt="slider image">
                <img src="images/home/slider/birds1.png" class="slider-birds1" alt="slider image">
                <img src="images/home/slider/birds2.png" class="slider-birds2" alt="slider image">
            </div>
        </div>
    </div>
    <div class="preloader"><i class="fa fa-sun-o fa-spin"></i></div>
</section>
<!--/#home-slider-->

<section id="services">
    <div class="container">
        <div class="row">
            <div class="col-sm-4 text-center padding wow fadeIn" data-wow-duration="1000ms" data-wow-delay="300ms">
                <div class="single-service">
                    <div class="wow scaleIn" data-wow-duration="500ms" data-wow-delay="300ms">
                        <img src="assets/images/sinagogaSmall.png" alt="Sinagoga">
                    </div>
                    <h2>Incredible architecture</h2>
                    <p>Explore the Art Nouveau art style from the late 19th and the early 20th century that dominates the city centre.</p>
                </div>
            </div>
            <div class="col-sm-4 text-center padding wow fadeIn" data-wow-duration="1000ms" data-wow-delay="600ms">
                <div class="single-service">
                    <div class="wow scaleIn" data-wow-duration="500ms" data-wow-delay="600ms">
                        <img src="assets/images/pozoristeSmall.png" alt="Theatre">
                    </div>
                    <h2>Pearl of the north</h2>
                    <p>Small city on the border with Hungary, with a lot of historical monuments and buildings.</p>
                </div>
            </div>
            <div class="col-sm-4 text-center padding wow fadeIn" data-wow-duration="1000ms" data-wow-delay="900ms">
                <div class="single-service">
                    <div class="wow scaleIn" data-wow-duration="500ms" data-wow-delay="900ms">
                        <img src="assets/images/rajhlSmall.png" alt="Rajhl Palace">
                    </div>
                    <h2>Cultural diversity</h2>
                    <p>Feel the unique mix of Serbian, Hungarian and Croatian influences living together for many years. </p>
                </div>
            </div>
        </div>
    </div>
</section>
<!--/#services-->

<section id="action" class="responsive">
    <div class="vertical-center">
        <div class="container">
            <div class="row">
                <div class="action take-tour">
                    <div class="col-sm-7 wow fadeInLeft" data-wow-duration="500ms" data-wow-delay="300ms">
                        <h1 class="title">Explore Subotica and Palic on wheels</h1>
                        <p>Rent a bike and cruise through the city with ease!</p>
                    </div>
                    <div class="col-sm-5 text-center wow fadeInRight" data-wow-duration="500ms" data-wow-delay="300ms">
                        <img src="assets/images/bikeSmall.png" alt="bicycle">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--/#action-->

<section id="features">
    <div class="container">
        <div class="row">
            <div class="single-features">
                <div class="col-sm-5 wow fadeInLeft" data-wow-duration="500ms" data-wow-delay="300ms">
                    <img src="assets/images/suboticaSmall.jpg" class="img-responsive" alt="">
                </div>
                <div class="col-sm-6 wow fadeInRight" data-wow-duration="500ms" data-wow-delay="300ms">
                    <h2>City Hall is a good start</h2>
                    <P>You can't really miss it! Located in the the heart of the city, it invites you to explore. Be sure to get to the top of the tower for a lovely view!</P>
                </div>
            </div>
            <div class="single-features">
                <div class="col-sm-6 col-sm-offset-1 align-right wow fadeInLeft" data-wow-duration="500ms" data-wow-delay="300ms">
                    <h2>Lake Palic</h2>
                    <P>Only a 10 minutes car drive away, Palic lake is truly a gem. A bit more of Art Nouveau sightseeing, visit the famous zoo or enjoy in a stroll along the lake shore.</P>
                </div>
                <div class="col-sm-5 wow fadeInRight" data-wow-duration="500ms" data-wow-delay="300ms">
                    <img src="assets/images/velikaTerasaSmall.jpg" class="img-responsive" alt="">
                </div>
            </div>
            <div class="single-features">
                <div class="col-sm-5 wow fadeInLeft" data-wow-duration="500ms" data-wow-delay="300ms">
                    <img src="assets/images/vinarijaSmall.jpg" class="img-responsive" alt="">
                </div>
                <div class="col-sm-6 wow fadeInRight" data-wow-duration="500ms" data-wow-delay="300ms">
                    <h2>Wine and dine </h2>
                    <P>Get lost along the famous Wine route and enjoy the cousine of our multi - cultural city.</P>
                </div>
            </div>
        </div>
    </div>
</section>
<!--/#features-->


<footer id="footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center bottom-separator">
                <img src="images/home/under.png" class="img-responsive inline" alt="">
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="testimonial bottom">
                    <h2>Our happy clients</h2>
                    <div class="media">
                        <div class="pull-left">
                          <!--  <a href="#"><img src="images/home/profile1.png" alt=""></a> -->
                        </div>
                        <div class="media-body">
                            <blockquote>Don't miss Palic! We were impressed by the guide's knowledge of this place.</blockquote>
                            <h3><a href="#">- Luka Patarcic</a></h3>
                        </div>
                    </div>
                    <div class="media">
                        <div class="pull-left">
                         <!--   <a href="#"><img src="images/home/profile2.png" alt=""></a> -->
                        </div>
                        <div class="media-body">
                            <blockquote>They really are the best! I can't wait to come visit this beautiful city once more.</blockquote>
                            <h3><a href="">- Branko Sabo</a></h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="contact-info bottom">
                    <h2>Contact us</h2>
                    <address>
                        E-mail: <a href="mailto:someone@example.com">honestguidesubotica@gmail.com</a> <br>
                        Phone:<br> +381 24 4567890 <br>
                    </address>

                    <h2>Address</h2>
                    <address>
                        Trg cara Jovana Nenada 1,<br>
                        Subotica,<br>
                        Serbia <br>
                    </address>
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="contact-form bottom">
                    <h2>Send a message</h2>
                    <form id="main-contact-form" name="contact-form" method="post" action="sendemail.php">
                        <div class="form-group">
                            <input type="text" name="name" class="form-control" required="required" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" class="form-control" required="required" placeholder="Your Email">
                        </div>
                        <div class="form-group">
                            <input type="text" name="subject" class="form-control" required="required" placeholder="Subject">
                        </div>
                        <div class="form-group">
                            <textarea name="message" id="message" required="required" class="form-control" rows="8" placeholder="Your text here"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" class="btn btn-submit" value="Submit">
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="copyright-text text-center">
                    <p>&copy; Honest Guide 2019. All Rights Reserved.</p>
                    <p>Designed by <a href="https://github.com/mimares/Tourist-Portal">Dario Komesarović & Miloš Jovanić Žaki</a></p>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--/#footer-->

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/lightbox.min.js"></script>
<script type="text/javascript" src="js/wow.min.js"></script>
<script type="text/javascript" src="js/main.js"></script>
</body>
</html>

