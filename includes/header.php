<?php
include "includes/db.php";
include "includes/functions.php";
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title> <?php echo $title; ?> | App</title>
    <link href="https://fonts.googleapis.com/css?family=Raleway|Ubuntu+Mono" rel="stylesheet">
    <link rel="stylesheet" href="css/animations.css">
    <link rel="stylesheet" href="css/app.css">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" href="assets/img/app-logo.svg" sizes="32x32">
    <link rel="icon" type="image/png" href="assets/img/app-logo.svg" sizes="16x16">
    <link rel="manifest" href="/manifest.json">
    <link rel="mask-icon" href="assets/img/app-logo.svg" color="#5bbad5">
  </head>
  <?php if (isset($bodyID)): ?>
    <body id="<?php echo $bodyID; ?>">
  <?php else: ?>
    <body>
  <?php endif; ?>
