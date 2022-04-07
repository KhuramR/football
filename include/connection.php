<?php
@session_start();
@session_regenerate_id();
// $con = mysqli_connect("localhost", "root", "", "football") or die("not connected");
$con = mysqli_connect("localhost", "xiomstud_ibrahim", "xiomibrahim888@?$", "xiomstud_merchantunited") or die("not connected");
$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
$url = $protocol . $_SERVER['HTTP_HOST'] . "/";
function db()
{
    static $con;
    if ($con === NULL) {
        // $con = mysqli_connect("localhost", "root", "", "football") or die("not connected");
        $con = mysqli_connect("localhost", "xiomstud_ibrahim", "xiomibrahim888@?$", "xiomstud_merchantunited") or die("not connected");
    }
    return $con;
}

define("PAYPAL_BUTTONS_CLIENT_ID","AZNUwpo4dLjG5AHjZfwlZdI8qyl4KhCeLvZAdWfuYvMUhDXzKbLYhfkpmwrPukVNTw1FAq3CSWwZyYvR");
define("PAYPAL_BUTTONS_SECRET_KEY","ENfAxc2fTzpESIv1tzqAgJsIwrcEjHVL7hC-fI5iYDtDvwZ2hZqVFMwg-J86Mzs2kb8ZUR9NTImHBJhu");

//  define("PAYPAL_BUTTONS_CLIENT_ID","ASu-ISB2BO67dis63NysCI9AZl2FNkJp9QDbNV0qyRzmUZNdrmPioj9tI8xNcWBv3vRTzwDkVhQSiGIx");
// define("PAYPAL_BUTTONS_SECRET_KEY","EOAWkirc1D_jM6YglGLXWaTGzO-gVSDtm4c0Hao5qT7UkmmTuB-xQWwQfwKF5KbE33xq4-kOGqODciSl");
function seoUrl($string)
{
    $string = strtolower($string);
    $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
    $string = preg_replace("/[\s-]+/", " ", $string);
    $string = preg_replace("/[\s_]/", "-", $string);
    return $string;
}
$websitequery = mysqli_query($con, "SELECT * FROM `settings`");
$websitefetch = mysqli_fetch_array($websitequery);
$pagelink =  str_replace(".php", "", basename($_SERVER['PHP_SELF']));
$qp = mysqli_query($con, "SELECT * FROM `seos` WHERE page_link='$pagelink'");
if (mysqli_num_rows($qp) > 0) {
    $fetchmp = mysqli_fetch_array($qp);
    $pagename = $fetchmp["title"];
} else {
    $pagename = "Not Found";
}


$global_host = 'smtp.gmail.com';
$global_emails = 'bestxmasoffers@gmail.com';
$global_pswds = 'Redrhinoz@1234.';
$globaluserid = @$_SESSION["user_id"];
$logo = 'https://i.ibb.co/jR6JFRS/logo.png';