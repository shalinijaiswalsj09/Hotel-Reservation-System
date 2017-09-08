<footer>
    <div id="footer">
        <ul class="nav">
            <li><a href="index.php">Home</a>|</li>
            <li><a href="services.php">Services</a>|</li>
            <li><a href="gallery.php">Gallery</a>|</li>
            <li><a href="restaurant.php">Restaurant</a>|</li>
            <li><a href="booking.php">Booking</a></li>
        </ul>
    </div>
    <div class="container_12">
        <div class="grid_12">
            <div class="socials">
                <a href="http://www.facebook.com" class="fa fa-facebook"></a>
                <a href="http://www.twitter.com" class="fa fa-twitter"></a>
                <a href="http://www.googleplus.com" class="fa fa-google-plus"></a>
            </div>
            <div class="copy">
                Your Trip (c) 2016 | <a href="privacy policy.php">Privacy Policy</a>|<a href="terms and condition.php">Terms and Condition</a>
            </div>
        </div>
    </div>
</footer>
<script>
    $(function (){
        $('#bookingForm').bookingForm({
            ownerEmail: '#'
        });
    })
    $(function() {
        $('#bookingForm input, #bookingForm textarea').placeholder();
    });
</script>