<?php

// a custom die_now() function
function die_now($args) {
    echo("<html>\n<head>\n\t<title>VolSys - Error Page</title>\n\t");
    echo("<link rel='stylesheet' type='text/css' href='volsys.css'>\n");
    echo("</head>\n<body>\n");
    echo("<div class='box'>\n<h3>VolSys - Error Page</h3>\n</div>\n\n");
    echo("<div class='box'>$args</div>\n\n");
    echo("</body>\n</html>\n");
    die();
}

// footer function
function footer() {
	echo("<div class='box'>\n\t<a href='mainpage.php' title='Add assignment'>Add assignment</a> | \n\t
          <a href='manage_assign.php' title='Manage assignments'>Manage assignments</a>
          | \n\t <a href='add_volunteer.php'>Add Volunteer</a>  
          | \n\t<a href='manage_volunteer.php'>Manage volunteer</a> 
          | \n\t<a href='index.php'>Logout</a> 
          \n</div>\n\n"); 
          
    echo("</body>\n</html>\n"); 
}

// echo the current version
function volsys_version() {
    echo("0.1");   
}
?>

