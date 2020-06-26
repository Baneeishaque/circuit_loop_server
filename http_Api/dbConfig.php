<?php
ini_set('display_errors', '1');
$url = parse_url(getenv("CLEARDB_DATABASE_URL"));
$con = new mysqli($url["host"], $url["user"], $url["pass"], substr($url["path"], 1));
