<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/style.css">
        <script src="https://kit.fontawesome.com/66346d787d.js" crossorigin="anonymous"></script>
    </head>
<body>
<footer class="footer">
        <div class="footer-container">
            <div class="footer-content">
                <div class="col1">
                    <h2>Address</h2>
                    <div class="col1-details">
                        <i class="fa-solid fa-location-dot"></i>
                        <p>Te Grandi, Prishtine, Kosova</p>
                    </div>
                    <div class="col1-details">
                        <i class="fa-solid fa-phone"></i>
                        <p>+383 45 299 748</p>
                    </div>
                    <div class="col1-details">
                        <i class="fa-solid fa-envelope"></i>
                        <p>elhamimusliu@gmail.com</p>
                    </div>
                    <div class="col1-details">
                        <div class="social-media">
                            <div>
                                <a href="#"><i class="fa-brands fa-facebook"></i></a>
                            </div>
                            <div>
                                <a href="#"><i class="fa-brands fa-twitter"></i></a>
                            </div>
                            <div>
                                <a href="#"><i class="fa-brands fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col2">
                    <h2>Opening Hours</h2>
                    <div class="col2-div">
                        <p>Monday-Friday:</p>
                        <p>08:00 AM - 10:00 PM</p>
                    </div>
                    <div class="col2-div">
                        <p>Saturday - Sunday:</p>
                        <p>08:00 AM - 09:00 PM</p>
                    </div>
                </div>
                <div class="col3">
                    <h2>Services</h2>
                    <div class="col3-details">
                        <i class="fa-solid fa-greater-than"></i>
                        <p>Food delivery</p>
                    </div>
                    <div class="col3-details">
                        <i class="fa-solid fa-greater-than"></i>
                        <p>Free delivery</p>
                    </div>
                    <div class="col3-details">
                        <i class="fa-solid fa-greater-than"></i>
                        <p>Home made ingredients</p>
                    </div>
                    <div class="col3-details">
                        <i class="fa-solid fa-greater-than"></i>
                        <p>Fresh vegetables</p>
                    </div>
                    <div class="col3-details">
                        <i class="fa-solid fa-greater-than"></i>
                        <p>Great menu</p>
                    </div>
                </div>
                <div class="col4">
                    <h2>Want to Contact us?</h2>
                    <p>Leave your message and your details below!</p>
                    <textarea name="message" rows="6" placeholder="Type your Message"></textarea>
                </div>
            </div>
        </div>
    </footer>

    <script src="jquery-3.6.0.js"></script>
<script src="jquery.validate.min.js"></script>
<script>
    $().ready(function() {
        $("#login_form").validate({
            rules: {
                email: {
                    required: true,
                    email: true
                },
                passwordi: {
                    required: true,
                    minlength: 5
                },
                emri: {
                    required: true,
                    minlength: 3
                },
                mbiemri: {
                    required: true,
                    minlength: 3
                },
                
                adresa: {
                    required: true,
                    minlength: 3
                }
            },
            messages: {
                passwordi: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long"
                },
                email: {
                    required: "Please provide an email",
                    email: "Please enter a valid email address"
                },
                emri: {
                    required: "Please provide a name",
                    minlength: "Your name must be at least 5 characters long"
                },
                mbiemri: {
                    required: "Please provide a lastname",
                    minlength: "Your lastname must be at least 3 characters long"
                },
                adresa: {
                    required: "Please provide an address",
                    minlength: "Your address must be at least 3 characters long"
                }
            }

        });
        jQuery.validator.addMethod("lettersonly", function(value, element) {
            return this.optional(element) || /^[a-z]+$/i.test(value);
        }, "Letters only please");
    });
</script>
</body>
</html>