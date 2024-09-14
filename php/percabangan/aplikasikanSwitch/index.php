<?php

$pindah = $_GET['page'];
    switch ($pindah) {
        case "profile":
            include "profile.php";
            break;
        case "contact":
            include "contact.php";
            break;
            default:
            echo "INI ADALAH HALAMAN AWAL <br>";
            break;
    }
?>