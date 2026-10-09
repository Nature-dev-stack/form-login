<?php 

if (session_status()=== PHP_SESSION_NONE) {
   include_once 'functions.inc.php';
   logoutUser();
}