<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

include "copy_productClass.php";
$product = new product;

$datlich_id = $_GET['datlich_id'] ?? null;
if ($datlich_id === null) {
    header('Location: lsSuaChua.php');
    exit();
}

// Kiểm tra lịch có thuộc về user hiện tại hay không
$get_datlich = $product->get_datlich($datlich_id);
if ($get_datlich) {
    $resultdl = $get_datlich->fetch_assoc();
    if (!isset($_SESSION['user']['id']) || $resultdl['user_id'] != $_SESSION['user']['id']) {
        header('Location: lsSuaChua.php');
        exit();
    }
}

$delete_datlich = $product->delete_datlich($datlich_id);
header('Location: lsSuaChua.php');
exit();
?>
