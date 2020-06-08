<?php require 'param.php'; ?>
<?php session_unset(); ?>
<?php session_destroy(); ?>
<?php header('Location: ../index.php') ?> 