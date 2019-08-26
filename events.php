<?php
require "header.inc.php";
$sql = "SELECT id_event, id_location, title_e, description_e, pic_e, date_e FROM event";
$result = $connect->query($sql);

if ($result->num_rows > 0) {
// output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<div class=\"row\">";
        echo "<div class=\"col-sm-12 col-md-6 col-md-offset-2\">";
        echo "<h2 class='text-primary' id='{$row['title_e']}'>Title: <span class='text-muted'>" . $row["title_e"]. "</span></h2>";
        echo "<h2 class='text-primary'>Date: <span class='text-muted' style='font-size: 16px'> ".date('d/m/Y h:i',strtotime($row["date_e"]))."</span></h2>";
        echo "<h2 class='text-primary'>Description: </h2><p style='font-size: 16px'>" . $row["description_e"]. "</p>";;

        echo "</div>";
        echo "<div class=\"col-sm-12 col-md-2\">";
        echo "<img src=\"assets/images/{$row['pic_e']}\" alt=\"location picture\" width='200' /><div class='clearfix'></div>";
        echo "</div>";
        echo "</div>";
        echo "<hr>";
    }
}
else {
    echo "0 results";
}
?>
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
                    <p>Designed by <a href="https://github.com/mimares/Tourist-Portal">Dario Komesarovi? & Milo� Jovani? �aki</a></p>
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

