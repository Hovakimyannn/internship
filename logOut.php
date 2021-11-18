<?php

session_start();
session_unset();

header("Location: welcome.php");
exit();