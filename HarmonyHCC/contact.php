<?php
$server_name = "localhost";
$username = "root";
$password = "";
$database_name = "contactform";

$message = "";

if (isset($_POST['submit'])) {
    $conn = mysqli_connect($server_name, $username, $password, $database_name);

    if (!$conn) {
        die("Connection Failed: " . mysqli_connect_error());
    }

    $name = $_POST['name'];
    $email = $_POST['email'];
    $msg = $_POST['message'];

    $sql_query = "INSERT INTO messages (name, email, message) VALUES ('$name', '$email', '$msg')";

    if (mysqli_query($conn, $sql_query)) {
        $message = "Your Message has been submitted!";
    } else {
        $message = "Error: " . $sql_query . "" . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Harmony Health Care Center</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100;200;300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="icon" href="images/logoicon.png" type="image/x-icon">
    <link href="style.css" rel="stylesheet">
</head>
<body>

   <div class="logo-and-navbar">
    <div class="logo-container">
        <img src="images/logo.png" alt="Harmony Healthcare Center Logo" class="navbar-logo">
    </div>

    <div class="navbar">
        <div class="searchbox">
          <input type="text" id="searchBar" placeholder="Search...">
          <button type="submit" onclick="searchH1()"><i class="fas fa-search"></i></button>         
        </div>
        <ul>
            <li><a href="index.html">Home</a></li>
            <li><a href="about.html">About Us</a></li>
            <li><a href="bookings.php">Bookings</a></li>
            <li><a href="services.html">Services</a></li>
            <li><a href="contact.html">Contact Us</a></li>
        </ul>
    </div>
  </div>

    <div class="container">

    <div class="page">
        <div class="form">

        <h2>Contact Us</h2>
        <form action="" method="post">
            <input type="text" name="name" placeholder="Your Name" required>
            <input type="text" name="email" placeholder="Your Email" required>
            <input class="messagebox" type="text" name="message" placeholder="Type your message" required>
            <input type="submit" name="submit" value="SUBMIT" class="hero-btn blue-btn">
        </form>
        <h3><?php if (!empty($message)) echo "<p>$message</p>"; ?></h3>
        </div>
    </div>

            <div class="page">
          <div class="row">

            <div class="contact-location-col">
              <h1>Our Location</h1>
              <p><i class="fas fa-map-marker-alt"></i>123 Health Street, Wellness City, 12345<br> 
               <i class="fas fa-phone"></i> +94 75 636 8473<br>
                   <i class="fas fa-envelope"></i> hhcc@gmail.com</p>
            </div>
            <div class="contact-location-col">
              <p><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d989.1431976979477!2d81.8310415695328!3d7.401670129468281!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae53fa8c8ed1533%3A0xdf4ca5a55212e421!2sBCAS%20Kalmunai%20Campus!5e0!3m2!1sen!2slk!4v1703953227863!5m2!1sen!2slk" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></p>
            </div>
          </div>
        </div>

    </div>

    <div class="footer">
        <p>Contact us: hhcc@gmail.com</p>
        <p>Phone: +94 75 636 8473</p>
        <div class="social-icons">
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-whatsapp"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
        </div>
        <p>Copyright 2023 © Harmony Health Care Center. All rights reserved | Company registration PQ 232 | Powered by N.Z. Ashim</p>
    </div>

    <script>
        function searchH1() {
    var searchText = document.getElementById('searchBar').value.toLowerCase();
    var h1Tags = document.getElementsByTagName('h1');
    var found = false;

    for (var i = 0; i < h1Tags.length; i++) {
        if (h1Tags[i].textContent.toLowerCase() === searchText) {
            h1Tags[i].scrollIntoView();
            found = true;
            break;
        }
    }

    if (!found) {
        alert('No matching h1 tag found');
    }
}
    </script>


</body>
</html>
