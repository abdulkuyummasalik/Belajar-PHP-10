<?php
session_start();

$page = isset($_GET['page']) ? $_GET['page'] : 'pembelian';

require 'header.php';

switch ($page) {
    case 'pembayaran':
        require 'pembayaran.php';
        break;
    case 'transaksi':
        require 'transaksi.php';
        break;
    case 'pembelian':
    default:
        require 'pembelian.php';
        break;
}

require 'footer.php';
?>
