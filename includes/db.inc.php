<?php

// the name of the rendered server
$serverName = 'localhost';

// the database username 
$dbUserName = 'root';

// the database user password
$dbPassword = '';

// the database name
$dbName = 'form-login';

// connecting the php script to the database 
$connection = mysqli_connect($serverName, $dbUserName, $dbPassword, $dbName);