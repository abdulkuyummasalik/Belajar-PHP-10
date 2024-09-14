<?php
// header
echo "<h1>PPLG X-1</h1>";

// nav
echo '<li><a href="?page=home">Home </a></li>';
echo '<li><a href="?page=about">About </a></li>';
echo '<li><a href="?page=contact">Contact <br></a></li>';

// main
$page = isset($_GET['page']) ? $_GET['page'] : 'home';


//switch
switch ($page) {
    case "home":
        include "home.php";
        break;
    case "about":
        include "about.php";
        break;
    case "contact":
        include "contact.php";
        break;
    default:
        include "home.php";
        break;

}

// footer
echo "<a href='#'>@khoyum28</a>";