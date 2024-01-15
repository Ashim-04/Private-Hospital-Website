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
            <li><a href="contact.php">Contact Us</a></li>
        </ul>
    </div>
  </div>

    <div class="container">
        <div class="page">
            <h2>Our Doctors' Schedule</h2>

                        <div class="specialization-selector">
                            <select id="specialization">
                                <option value="">Search by specialization...</option>
                                <option value="Cardiology">Cardiology</option>
                                <option value="Dermatology">Dermatology</option>
                                <option value="Neurology">Neurology</option>
                                <option value="Pediatrics">Pediatrics</option>
                                <option value="Orthopedics">Orthopedics</option>
                                <option value="Ophthalmology">Ophthalmology</option>
                                <option value="Psychiatry">Psychiatry</option>
                                <option value="Gastroenterology">Gastroenterology</option>
                                <option value="Endocrinology">Endocrinology</option>
                                <option value="Cardiothoracic Surgery">Cardiothoracic Surgery</option>
                                <option value="Rheumatology">Rheumatology</option>
                                <option value="Urology">Urology</option>
                                <option value="General Surgery">General Surgery</option>
                                <option value="Neurosurgery">Neurosurgery</option>
                                <option value="Anesthesiology">Anesthesiology</option>
                                <option value="Plastic Surgery">Plastic Surgery</option>
                                <option value="Oncology">Oncology</option>
                                <option value="Pulmonology">Pulmonology</option>
                                <option value="Nephrology">Nephrology</option>
                                <option value="Infectious Disease">Infectious Disease</option>
                                <option value="Gynecology">Gynecology</option>
                                <option value="Immunology">Immunology</option>
                                <option value="Geriatrics">Geriatrics</option>
                            </select>
                                <button onclick="filterSchedule()"><i class="fas fa-search"></i></button> 
                        </div>
                    <div class="schedule">
                        <table>
                            <tr>
                                <th>Doctor</th>
                                <th>Specialization</th>
                                <th>Available Days</th>
                                <th>Time</th>
                            </tr>
                            <tbody>
                                <?php
                                require('./connection.php');
                                    $p=crud::Selectdata();
                                    if (count( $p)>0) {
                                        for ($i=0; $i < count( $p); $i++) { 
                                            echo '<tr>';
                                            foreach ($p[$i] as $key => $value) {
                                                if ($key!='id') {
                                                    echo '<td>'.$value.'</td>';

                                                }
                                                }
                                                echo '</tr>';
                                        }
                                    }

                                ?>
                            </tbody>
                        </table>
                    </div>

                        <a href="login.php" class="edit-btn blue-btn">EDIT</a>
                    
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
