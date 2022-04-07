<?php
include "connection.php";
if (isset($_POST["page"])) {
    if (!isset($_SESSION["user_id"])) {
        $first_name = htmlspecialchars($_POST['firstname']);
        $last_name = htmlspecialchars($_POST['lastname']);
        $form_email = htmlspecialchars($_POST['email']);
        $phone = htmlspecialchars(@$_POST['phone']);
        $password = md5($_POST['pass']);
        $address = htmlspecialchars($_POST["address"]);
        $state = htmlspecialchars($_POST["state"]);
        $country = htmlspecialchars($_POST['country']);
        $city = htmlspecialchars($_POST['city']);
        $zip = htmlspecialchars($_POST['zip']);
        $query=mysqli_query($con,"SELECT  * FROM users WHERE email='$form_email'");
        if(mysqli_num_rows($query) > 0){
           
            echo "alreadyemail";
            exit();
        }
        $reg = mysqli_query($con, "INSERT INTO `users`( `firstname`, `lastname`, `address`, `email`, `pass`, `phone`, `country`, `role`, `account_status`, `city`, `zip`,`state`,`profile`) VALUES ('$first_name','$last_name','$address','$form_email','$password','$phone','$country','3','1','$city','$zip','$state','default.png')");
        $select = mysqli_query($con, "SELECT * FROM users order by id desc");
        $fetch = mysqli_fetch_array($select);
        $user_id = $fetch['id'];
        $_SESSION['user_id'] = $fetch['id'];
    }
    $_SESSION["ship_firstname"] = $_POST["ship_firstname"];
    $_SESSION["ship_lastname"] = $_POST["ship_lastname"];
    $_SESSION["ship_company"] = $_POST["ship_company"];
    $_SESSION["ship_email"] = $_POST["ship_email"];
    $_SESSION["ship_phone"] = $_POST["ship_phone"];
    $_SESSION["ship_address"] = $_POST["ship_address"];
    $_SESSION["ship_country"] = $_POST["ship_country"];
    $_SESSION["ship_city"] = $_POST["ship_city"];
    $_SESSION["ship_state"] = $_POST["ship_state"];
    $_SESSION["ship_zip"] = $_POST["ship_zip"];
    echo "success";
}
