<html>
<head>
    <title>Ture</title>
    <link href="css/main.css" rel="stylesheet">
</head>
</html>
<?php
require "header.inc.php";
$id = $_SESSION['id'] ?? '';
$sql = "SELECT t.id_tour as id_tour, id_user, title_t, date_t, username, u.id as id,title_l, is_private FROM tour t JOIN user u ON t.id_user = u.id
JOIN tour_location ON tour_location.id_tour=t.id_tour
JOIN location ON location.id_location=tour_location.id_location
GROUP BY title_t";

$query = mysqli_query($connect,$sql);
if (mysqli_num_rows($query) > 0) {
// output data of each row
    $rows = mysqli_fetch_all($query,MYSQLI_ASSOC);
    echo "<div class='row'>";
    echo "<div class='col-sm-12 col-md-8 col-md-offset-2'>";
    if($id) {
        echo "<p class='text-right'><a href=\"make_tour.php\"><button class='btn btn-primary'>Make your tour &nbsp;<i class='fa fa-plus-circle'></i></button></a></p>";
    }
    echo "<ul class=\"list-group\">";
    foreach ($rows as $row) {
        $sql = "SELECT l.title_l as title_l,l.pic_l as pic_l FROM location l
            JOIN tour_location tl ON tl.id_location = l.id_location 
            JOIN tour t ON t.id_tour = tl.id_tour
            WHERE t.id_tour = {$row['id_tour']}";

        $query = mysqli_query($connect,$sql);
        $results = mysqli_fetch_all($query,MYSQLI_ASSOC);
        if(($row['id_user'] == $id and $row['is_private']) or !$row['is_private']) {
                echoTour($row,$results,$id);
        }
    }
    echo "</ul>";
    echo "</div>";
    echo "</div>";
}
else {
    echo "0 results";
}

function echoTour($row,$results,$id) {
     echo "<li class='list-group-item'>";
        echo "<h3 class='text-primary'>Title: <span class='text-muted'>" . $row["title_t"]. "</span></h3>".
            "<h3 class='text-primary'>Date:  <span class='text-muted'>" . date('d/m/Y h:i',strtotime($row["date_t"])). "</span></h3>" .
            "<span class='text-primary' style='font-size: 18px'>Location: </span>";
        foreach ($results as $result) {
            echo '<span class="badge badge-primary"><a class="badge-link" href="locations.php#'.$result['title_l'].'">'.$result['title_l'].'</a></span>';
        }
        if ($id) {
            echo "<div>&nbsp;</div>";
            echo "<div class=\"rating rating2\" data-id='{$row['id_tour']}' style='font-size: 40px; float: right; color: orange'></div><div class='clearfix'></div>";
        }
    echo "</li>";
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
                    <p>Designed by <a href="https://github.com/mimares/Tourist-Portal">Dario Komesarovic & Milos Jovanic Zaki</a></p>
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
<script type="text/javascript" src="assets/js/rater.min.js" charset="utf-8"></script>
<script>
    function getRatings() {
        $.ajax({
            url: 'get_ratings.php',
            success: function (response) {
                $('.rating').rate();
                $.each(response,function (key,value) {
                    $('div[data-id="'+value.tour_id+'"]').rate('setValue',value.rating);
                    $('div[data-id="'+value.tour_id+'"],.rate-base-layer').css('height','40px');
                });
                setRatingListener();
            }
        })
    }
    getRatings();
    function setRatingListener() {
        $(".rating").on("change", function(ev, data){
            var data = data.to;
            var id = ev.currentTarget.getAttribute('data-id');
            $.ajax({
                url: 'set_ratings.php',
                type: 'POST',
                data: 'id='+id+'&rating='+data,
                success: function (response) {
                    location.reload();
                }
            })

        });
    }




</script>