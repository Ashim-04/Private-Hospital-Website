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
          <input type="text" placeholder="Search...">
          <button type="submit"><i class="fas fa-search"></i></button>         
        </div>
        <ul>
            <li><a href="index.html">Home</a></li>
            <li><a href="about.html">About Us</a></li>
            <li><a href="bookings.php">Bookings</a></li>
            <li><a href="services.html">Services</a></li>
            <li><a href="contact.php">Contact Us</a></li>
        </ul>
    </div>
  </div>

    <div class="container">
        <div class="page">
            <h2>Welcome Administrator! Feel free to make changes!</h2>

                        
                    <div class="schedule">
                        <table>
                            <tr>
                                <th>Doctor</th>
                                <th>Specialization</th>
                                <th>Available Days</th>
                                <th>Time</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                            <tbody>
                                <?php
                                require('./connection.php');
                                    $p=crud::Selectdata();
                                    if (isset($_GET['Doctor'])) {
                                        $Doctor=$_GET['Doctor'];
                                        $e=crud::delete($Doctor);
                                    }
                                    if (count( $p)>0) {
                                        for ($i=0; $i < count( $p); $i++) { 
                                            echo '<tr>';
                                            foreach ($p[$i] as $key => $value) {
                                                echo '<td>'.$value.'</td>';
                                            }

                                                ?>

                                                <td><a href="maineditschedule.php?Doctor=<?php echo $p[$i]['Doctor'] ?>">Delete</a></td>
                                                <td><a href="updateschedule.php?Doctor=<?php echo $p[$i]['Doctor'] ?>">Update</a></td>



                                                <?php
                                                echo '</tr>';
                                        }
                                    }

                                    
                                ?>

                            </tbody>
                        </table>
                    </div>

                        <a href="doctorschedules.php" class="edit-btn blue-btn">Add new schedule</a>
                    
        </div>



        </div>
    </div>
    <div class="footer">
        <p>Contact us: samplemail@hospital.com</p>
        <p>Phone: +123 456 7890</p>
        <div class="social-icons">
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-whatsapp"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
        </div>
        <p>All rights reserved. Design by N.Z.Ashim</p>
    </div>
    
<!------------Schedule filtering---------------->
    
    <script>
function filterSchedule() {
    var inputSpecialization = document.getElementById('specialization').value;

    var table = document.querySelector('.schedule table');
    var tr = table.getElementsByTagName('tr');

    for (var i = 1; i < tr.length; i++) {
        var tdSpecialization = tr[i].getElementsByTagName('td')[1];
        
        if (tdSpecialization) {
            var specializationValue = tdSpecialization.textContent || tdSpecialization.innerText;
            var matchSpecialization = inputSpecialization === "" || specializationValue.indexOf(inputSpecialization) > -1;
            
            if (matchSpecialization) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}


    </script>

</body>
</html>
