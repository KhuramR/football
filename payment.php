<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include("header.php");
require 'stripe-vendor/autoload.php';
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
$ip = $_SERVER['REMOTE_ADDR'];
    $itemPrice = $_POST["total_price"];
   
        $currency = "usd";
        $paidAmount = $_POST["total_price"];
    // Include Stripe PHP library 
    // require_once 'stripe-php/init.php';
    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
        $select = mysqli_query($con, "SELECT * FROM users where id = '$user_id'");
        $fetchUser = mysqli_fetch_array($select);
        $form_email = $fetchUser['email'];
        $first_name = $fetchUser['firstname'];
    } else {
        // Include database connection file  
        $first_name = htmlspecialchars($_SESSION['first_name']);
        $last_name = htmlspecialchars($_SESSION['last_name']);
        $username = htmlspecialchars($_SESSION['username']);
        $form_email = htmlspecialchars($_SESSION['form_email']);
        $phone = htmlspecialchars(@$_SESSION['phone']);
        $password = md5($_SESSION['password']);
        $country = htmlspecialchars($_SESSION['country']);
        $city = htmlspecialchars($_SESSION['city']);
        $zip = htmlspecialchars($_SESSION['zip']);
        $reg = mysqli_query($con, "INSERT INTO `users`( `firstname`, `lastname`, `username`, `email`, `pass`, `phone`, `country`, `role`, `account_status`, `city`, `zip`) VALUES ('$first_name','$last_name','$username','$form_email','$password','$phone','$country','2','1','$city','$zip')");
        $select = mysqli_query($con, "SELECT * FROM users order by id desc");
        $fetch = mysqli_fetch_array($select);
        $user_id = $fetch['id'];
        $_SESSION['user_id'] = $fetch['id'];
    }




                    // Include database connection file  
                    $selectInvoice = mysqli_query($con, "SELECT * FROM invoice order by id desc");
                    $fetchInvoice = mysqli_fetch_array($selectInvoice);
                    $numrowInvoice = mysqli_num_rows($selectInvoice);
                    if ($numrowInvoice == 0) {
                        $invoice_number = "MD-1001";
                    } else {
                        $invoiceNumber = $fetchInvoice['invoice_number'];
                        $invnumber = str_replace("MD-", "", $invoiceNumber);
                        $numinv = intval($invnumber) + 1;
                        $invoice_number = "MD-" . $numinv;
                    }
                    $CartCheck = mysqli_query($con, "SELECT * FROM `cart` where  `ip`='$ip' and invoice_id=0");
                    
                        // Insert transaction data into the database 
                        $ship_firstname = @$_SESSION["ship_firstname"];
                        $ship_lastname = @$_SESSION["ship_lastname"];
                        $ship_company = @$_SESSION["ship_company"];
                        $ship_email = @$_SESSION["ship_email"];
                        $ship_phone = @$_SESSION["ship_phone"];
                        $ship_address = @$_SESSION["ship_address"];
                        $ship_country = @$_SESSION["ship_country"];
                        $ship_city = @$_SESSION["ship_city"];
                        $ship_state = @$_SESSION["ship_state"];
                        $ship_zip = @$_SESSION["ship_zip"];
                        
                        $trackid = uniqid(16);
                        $payerID = "";
                        $transactionID = "";
                        $sql = "INSERT INTO `invoice`(`invoice_number`, `user_id`, `payment_method`, `payer_email`, `payer_id`, `transaction_id`, `created`,`grandtotal`,`ship_firstname`,`ship_lastname`,`ship_company`,`ship_email`,`ship_phone`,`ship_address`,`ship_city`,`ship_state`,`ship_zip`,`order_status`,`currency`,`track_id`) VALUES ('$invoice_number','$user_id','PayPal','$form_email','$payerID','$transactionID',now(),'$paidAmount','$ship_firstname','$ship_lastname','$ship_company','$ship_email','$ship_phone','$ship_address','$ship_city','$ship_state','$ship_zip','Pending','$currency','$trackid')";
                        $insert = mysqli_query($con, $sql);
                        if($insert){
                        $selectInvoice = mysqli_query($con, "SELECT * FROM invoice order by id desc");
                        $fetchInvoice = mysqli_fetch_array($selectInvoice);
                        $invoiceNumber = $fetchInvoice['invoice_number'];
                        $lastInvoice = $fetchInvoice['id'];
                        $ip = $_SERVER['REMOTE_ADDR'];
                        $stardate = "";
                        $enddate = "";
                        $keyusername = "";
                        $keypass = "";
                        while ($fetchCart = mysqli_fetch_array($CartCheck)) {
                            $planIdMain = $fetchCart['id'];
                            $proid = $fetchCart['p_id'];
                            $colorid = $fetchCart['color_id'];
                            $lengthid = $fetchCart["length_id"];
                            $sizeid = $fetchCart["size_id"];
                            $var_p_query = mysqli_query($con, "SELECT * FROM `variation_product` WHERE p_id='$proid' and color_id='$colorid' and length_id='$lengthid' and size_id='$sizeid'");
                            $var_p_fetch = mysqli_fetch_array($var_p_query);
                            $total_remaing = $var_p_fetch["stock"] - $fetchCart["qty"];
                            $updateInner = mysqli_query($con, "UPDATE `variation_product` SET `stock`='$total_remaing' WHERE `id`='" . $var_p_fetch["id"] . "'");
                            $updateInner = mysqli_query($con, "UPDATE `cart` SET `invoice_id`='$lastInvoice',`created`=now(),`status`='1' WHERE `id`='$planIdMain'");
                        }
                        ob_start();
?>
                        <!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                        <html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">

                        <head>
                            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
                            <meta name="viewport" content="width=device-width, initial-scale=1.0">
                            <meta name="x-apple-disable-message-reformatting">
                            <!--[if !mso]><!-->
                            <meta http-equiv="X-UA-Compatible" content="IE=edge">
                            <!--<![endif]-->
                            <title></title>
                            <style type="text/css">
                                table,
                                td {
                                    color: #000000;
                                }

                                @media only screen and (min-width: 620px) {
                                    .u-row {
                                        width: 600px !important;
                                    }

                                    .u-row .u-col {
                                        vertical-align: top;
                                    }

                                    .u-row .u-col-33p33 {
                                        width: 199.98px !important;
                                    }

                                    .u-row .u-col-50 {
                                        width: 300px !important;
                                    }

                                    .u-row .u-col-66p67 {
                                        width: 400.02px !important;
                                    }

                                    .u-row .u-col-100 {
                                        width: 600px !important;
                                    }
                                }

                                @media (max-width: 620px) {
                                    .u-row-container {
                                        max-width: 100% !important;
                                        padding-left: 0px !important;
                                        padding-right: 0px !important;
                                    }

                                    .u-row .u-col {
                                        min-width: 320px !important;
                                        max-width: 100% !important;
                                        display: block !important;
                                    }

                                    .u-row {
                                        width: calc(100% - 40px) !important;
                                    }

                                    .u-col {
                                        width: 100% !important;
                                    }

                                    .u-col>div {
                                        margin: 0 auto;
                                    }
                                }

                                body {
                                    margin: 0;
                                    padding: 0;
                                }

                                table,
                                tr,
                                td {
                                    vertical-align: top;
                                    border-collapse: collapse;
                                }

                                p {
                                    margin: 0;
                                }

                                .ie-container table,
                                .mso-container table {
                                    table-layout: fixed;
                                }

                                * {
                                    line-height: inherit;
                                }
                            </style>
                            <!--[if !mso]><!-->
                            <link href="https://fonts.googleapis.com/css?family=Lato:400,700&display=swap" rel="stylesheet" type="text/css">
                            <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700&display=swap" rel="stylesheet" type="text/css">
                            <!--<![endif]-->
                        </head>

                        <body class="clean-body u_body" style="margin: 0;padding: 0;-webkit-text-size-adjust: 100%;background-color: #f5f5f5;color: #000000">
                            <!--[if IE]><div class="ie-container"><![endif]-->
                            <!--[if mso]><div class="mso-container"><![endif]-->
                            <table style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;min-width: 320px;Margin: 0 auto;background-color: #f0f0f0;width:100%" cellpadding="0" cellspacing="0">
                                <tbody>
                                    <tr style="vertical-align: top">
                                        <td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top">
                                            <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td align="center" style="background-color: #707070;"><![endif]-->
                                            <div class="u-row-container" style="padding: 29px 10px 0px;background-color: rgba(255,255,255,0)">
                                                <div class="u-row" style="Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #000000;">
                                                    <div style="border-collapse: collapse;display: table;width: 100%;background-color: black;">
                                                        <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding: 29px 10px 0px;background-color: rgba(255,255,255,0);" align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:600px;"><tr style="background-color: #000000;"><![endif]-->
                                                        <!--[if (mso)|(IE)]><td align="center" width="200" style="width: 200px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;" valign="top"><![endif]-->
                                                        <div class="u-col u-col-33p33" style="max-width: 320px;min-width: 200px;display: table-cell;vertical-align: top;">
                                                            <div style="width: 100% !important;">
                                                                <!--[if (!mso)&(!IE)]><!-->
                                                                <div style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;">
                                                                    <!--<![endif]-->
                                                                    <table style="font-family:'Lato',sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td style="overflow-wrap:break-word;word-break:break-word;padding:20px;font-family:'Lato',sans-serif;" align="left">
                                                                                    <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                                                                        <tr>
                                                                                            <td style="padding-right: 0px;padding-left: 0px;" align="center">
                                                                                                <img align="center" border="0" src="<?= $logo ?>" alt="Image" title="Image" style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: inline-block !important;border: none;height: auto;float: none;width: 100%;max-width: 160px;" width="160" />
                                                                                            </td>
                                                                                        </tr>
                                                                                    </table>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                    <!--[if (!mso)&(!IE)]><!-->
                                                                </div>
                                                                <!--<![endif]-->
                                                            </div>
                                                        </div>
                                                        <div class="u-col u-col-66p67" style="max-width: 320px;min-width: 400px;display: table-cell;vertical-align: top;">
                                                            <div style="width: 100% !important;">
                                                                <!--[if (!mso)&(!IE)]><!-->
                                                                <div style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;">
                                                                    <!--<![endif]-->
                                                                    <table style="font-family:'Lato',sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td style="overflow-wrap:break-word;word-break:break-word;padding:44px 20px 20px;font-family:'Lato',sans-serif;" align="left">
                                                                                    <div style="color: #ffffff; line-height: 120%; text-align: right; word-wrap: break-word;">
                                                                                        <p style="font-size: 14px; line-height: 120%;">If you cant view this invoice properly please use web view.</p>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                    <!--[if (!mso)&(!IE)]><!-->
                                                                </div>
                                                                <!--<![endif]-->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="u-row-container" style="padding: 0px 10px;background-color: rgba(255,255,255,0)">
                                                <div class="u-row" style="Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #f5f5f5;">
                                                    <div style="border-collapse: collapse;display: table;width: 100%;background-color: transparent;">
                                                        <div class="u-col u-col-50" style="max-width: 320px;min-width: 300px;display: table-cell;vertical-align: top;">
                                                            <div style="width: 100% !important;">
                                                                <!--[if (!mso)&(!IE)]><!-->
                                                                <div style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;">
                                                                    <!--<![endif]-->
                                                                    <table style="font-family:'Lato',sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td style="overflow-wrap:break-word;word-break:break-word;padding:35px 20px 10px;font-family:'Lato',sans-serif;" align="left">
                                                                                    <div style="line-height: 120%; text-align: left; word-wrap: break-word;">
                                                                                        <p style="font-size: 14px; line-height: 120%;"><span style="font-size: 24px; line-height: 28.8px; color: #a89842;"><strong>Order Czonfirmed</strong></span></p>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td style="overflow-wrap:break-word;word-break:break-word;font-family:'Lato',sans-serif; padding:10px 20px 10px;" align="left">
                                                                                    <div style="line-height: 120%; text-align: left; word-wrap: break-word;">
                                                                                        <p style="font-size: 14px; line-height: 120%;"><span style="font-size: 18px; line-height: 28.8px; color: black;"><strong>Thank you for your order ! You will find all the details below. If you need help, please send an email to <a href="mailto:<?= $websitefetch["site_email"] ?>"><?= $websitefetch["site_email"] ?>


                                                                                                    </a>
                                                                                                    <br>
                                                                                                    Goodbye
                                                                                                    <br>
                                                                                                    <?= $websitefetch["site_name"] ?>
                                                                                                </strong></span></p>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                    <table style="font-family:'Lato',sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td style="overflow-wrap:break-word;word-break:break-word;font-family:'Lato',sans-serif;padding:10px 20px 10px;" align="left">
                                                                                    <div style="line-height: 120%; text-align: left; word-wrap: break-word;">
                                                                                        <p style="font-size: 14px; line-height: 120%;"><span style="font-size: 24px; line-height: 28.8px; color: black;"><strong>Tracking Number</strong></span></p>
                                                                                    </div>
                                                                                </td>
                                                                                <td style="overflow-wrap:break-word;word-break:break-word;font-family:'Lato',sans-serif;" align="left">
                                                                                    <div style="line-height: 120%; text-align: left; word-wrap: break-word;">
                                                                                        <p style="font-size: 14px; line-height: 120%;"><span style="font-size: 24px; line-height: 28.8px; color: black;"><strong><?= $trackid ?></strong></span></p>
                                                                                    </div>
                                                                                </td>

                                                                            </tr>
                                                                            <tr>
                                                                                <td style="overflow-wrap:break-word;word-break:break-word;padding:35px 20px 10px;font-family:'Lato',sans-serif;" align="left">
                                                                                    <div style="line-height: 120%; text-align: left; word-wrap: break-word;">
                                                                                        <p style="font-size: 14px; line-height: 120%;"><span style="font-size: 24px; line-height: 28.8px; color: #a89842;"><strong><?= $fetch['address'] ?></strong></span></p>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                    <table style="font-family:'Lato',sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td style="overflow-wrap:break-word;word-break:break-word;padding:10px 20px 10px;font-family:'Lato',sans-serif;" align="left">
                                                                                    <div style="line-height: 120%; text-align: left; word-wrap: break-word;">
                                                                                        <p style="font-size: 14px; line-height: 120%;"><span style="font-size: 24px; line-height: 28.8px; color: #a89842;"><strong>Delivery address</strong></span></p>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td style="overflow-wrap:break-word;word-break:break-word;padding:10px 20px 10px;font-family:'Lato',sans-serif;" align="left">
                                                                                    <div style="line-height: 120%; text-align: left; word-wrap: break-word;">
                                                                                        <p style="font-size: 14px; line-height: 120%;"><span style="font-size: 24px; line-height: 28.8px; color: #a89842;"><strong><?= $fetch['address'] ?></strong></span></p>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                    <table style="font-family:'Lato',sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td style="overflow-wrap:break-word;word-break:break-word;padding:10px 20px 30px;font-family:'Lato',sans-serif;" align="left">
                                                                                    <div style="color: #757575; line-height: 160%; text-align: left; word-wrap: break-word;">
                                                                                        <p style="font-size: 14px; line-height: 160%;"><span style="font-size: 14px; line-height: 22.4px;"><?= $first_name ?></span></p>
                                                                                        <p style="font-size: 14px; line-height: 160%;"><span style="font-size: 14px; line-height: 22.4px;"><?= $form_email ?></span></p>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                    <!--[if (!mso)&(!IE)]><!-->
                                                                </div>
                                                                <!--<![endif]-->
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="u-row" style="Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #f5f5f5;">
                                                    <div style="border-collapse: collapse;display: table;width: 100%;background-color: transparent;">

                                                        <div class="u-col u-col-50" style="max-width: 320px;min-width: 300px;display: table-cell;vertical-align: top;">
                                                            <div style="width: 100% !important;">
                                                                <!--[if (!mso)&(!IE)]><!-->
                                                                <div style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;">
                                                                    <!--<![endif]-->
                                                                    <table style="font-family:'Lato',sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td style="overflow-wrap:break-word;word-break:break-word;padding:10px 20px 10px;font-family:'Lato',sans-serif;" align="left">
                                                                                    <div style="color: #333333; line-height: 120%; text-align: left; word-wrap: break-word;">
                                                                                        <p style="font-size: 14px; line-height: 120%;"><strong><span style="font-size: 24px; line-height: 28.8px;">Order number</span></strong></p>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                    <table style="font-family:'Lato',sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td style="overflow-wrap:break-word;word-break:break-word;padding:10px 20px 30px;font-family:'Lato',sans-serif;" align="left">
                                                                                    <div style="color: #333333; line-height: 120%; text-align: left; word-wrap: break-word;">
                                                                                        <p style="font-size: 14px; line-height: 120%;"><span style="font-size: 20px; line-height: 24px;"><strong>#<?= $invoice_number ?></strong></span></p>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                    <!--[if (!mso)&(!IE)]><!-->
                                                                </div>
                                                                <!--<![endif]-->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="u-row-container" style="padding: 0px 10px;background-color: rgba(255,255,255,0)">
                                                    <div class="u-row" style="Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #ffffff;">
                                                        <div style="border-collapse: collapse;display: table;width: 100%;background-color: transparent;">
                                                            <div class="u-col u-col-100" style="max-width: 320px;min-width: 600px;display: table-cell;vertical-align: top;">
                                                                <div style="width: 100% !important;">
                                                                    <!--[if (!mso)&(!IE)]><!-->
                                                                    <div style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;">
                                                                        <!--<![endif]-->
                                                                        <table style="font-family:'Lato',sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td style="overflow-wrap:break-word;word-break:break-word;padding:30px 20px 20px;font-family:'Lato',sans-serif;" align="left">
                                                                                        <div style="color: #333333; line-height: 120%; text-align: left; word-wrap: break-word;">
                                                                                            <p style="font-size: 14px; line-height: 120%;"><strong><span style="font-size: 24px; line-height: 28.8px;">Order details</span></strong></p>
                                                                                        </div>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                        <table style="font-family:'Lato',sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td style="overflow-wrap:break-word;word-break:break-word;padding:0px;font-family:'Lato',sans-serif;" align="left">
                                                                                        <table height="0px" align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;border-top: 1px solid #e3e3e3;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%">
                                                                                            <tbody>
                                                                                                <tr style="vertical-align: top">
                                                                                                    <td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top;font-size: 0px;line-height: 0px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%">
                                                                                                        <span>&#160;</span>
                                                                                                    </td>
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                        <!--[if (!mso)&(!IE)]><!-->
                                                                    </div>
                                                                    <!--<![endif]-->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                                $pricesubtotal = 0;
                                                $select = mysqli_query($con, "SELECT products.title,invoice.invoice_number,cart.qty,variation_product.price_usd,variation_product.price_gb,variation_product.price_euro,variation_product.price_cad,variation_product.percentage FROM `invoice`,cart,products,variation_product where invoice.id=cart.invoice_id and variation_product.p_id=products.id and variation_product.p_id=cart.p_id and variation_product.color_id=cart.color_id and variation_product.size_id=cart.size_id and variation_product.length_id = cart.length_id and variation_product.weight_id = cart.weight_id and invoice.invoice_number='$invoice_number'");
                                                while ($row = mysqli_fetch_array($select)) {
                                                ?>
                                                    <div class="u-row-container" style="padding: 0px 10px;background-color: rgba(255,255,255,0)">
                                                        <div class="u-row" style="Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #ffffff;">
                                                            <div style="border-collapse: collapse;display: table;width: 100%;background-color: transparent;">
                                                                <div class="u-col u-col-66p67" style="max-width: 320px;min-width: 400px;display: table-cell;vertical-align: top;">
                                                                    <div style="width: 100% !important;">
                                                                        <!--[if (!mso)&(!IE)]><!-->
                                                                        <div style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;">
                                                                            <!--<![endif]-->
                                                                            <table style="font-family:'Lato',sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td style="overflow-wrap:break-word;word-break:break-word;padding:28px 20px 20px;font-family:'Lato',sans-serif;" align="left">
                                                                                            <div style="color: #333333; line-height: 140%; text-align: left; word-wrap: break-word;">
                                                                                                <p style="font-size: 14px; line-height: 140%;"><span style="font-size: 18px; line-height: 25.2px;"><?= ucfirst($row["title"]) ?></span></p>
                                                                                                <p style="font-size: 14px; line-height: 140%;"><span style="font-size: 16px; line-height: 22.4px; color: #a89842;">Quantité : <?= $row["qty"] ?> x
                                                                                                        <?php
                                                                                                        $percent = $row['percentage'];
                                                                                                     
                                                                                                            $percentage = $row['price_usd'] / 100 * $percent;
                                                                                                            $amount = $row['price_usd'] - $percentage;
                                                                                                            $price = number_format((float)$amount, 2, '.', '');
                                                                                                            echo "$" . $price;
                                                                                                        
                                                                                                        ?>
                                                                                                    </span></p>
                                                                                            </div>
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                            <!--[if (!mso)&(!IE)]><!-->
                                                                        </div>
                                                                        <!--<![endif]-->
                                                                    </div>
                                                                </div>
                                                                <div class="u-col u-col-33p33" style="max-width: 320px;min-width: 200px;display: table-cell;vertical-align: top;">
                                                                    <div style="width: 100% !important;">
                                                                        <!--[if (!mso)&(!IE)]><!-->
                                                                        <div style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;">
                                                                            <!--<![endif]-->
                                                                            <table style="font-family:'Lato',sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td style="overflow-wrap:break-word;word-break:break-word;padding:40px 20px 20px;font-family:'Lato',sans-serif;" align="left">
                                                                                            <div style="color: #333333; line-height: 120%; text-align: left; word-wrap: break-word;">
                                                                                                <p style="font-size: 14px; line-height: 120%;"><span style="font-size: 24px; line-height: 28.8px;"><strong><span style="line-height: 28.8px; font-size: 24px;">
                                                                                                                <?php
                                                                                                                $subtotal = $amount * $row['qty'];
                                                                                                                $pricesubtotal += $subtotal;
                                                                                                                
                                                                                                                    echo "$" . number_format((float)$subtotal, 2, '.', '');
                                                                                                                
                                                                                                                ?>
                                                                                                            </span></strong></span></p>
                                                                                            </div>
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                            <!--[if (!mso)&(!IE)]><!-->
                                                                        </div>
                                                                        <!--<![endif]-->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                                <div class="u-row-container" style="padding: 0px 10px;background-color: rgba(255,255,255,0)">
                                                    <div class="u-row" style="Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #ffffff;">
                                                        <div style="border-collapse: collapse;display: table;width: 100%;background-color: transparent;">
                                                            <div class="u-col u-col-100" style="max-width: 320px;min-width: 600px;display: table-cell;vertical-align: top;">
                                                                <div style="width: 100% !important;">
                                                                    <!--[if (!mso)&(!IE)]><!-->
                                                                    <div style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;">
                                                                        <!--<![endif]-->
                                                                        <table style="font-family:'Lato',sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td style="overflow-wrap:break-word;word-break:break-word;padding:0px;font-family:'Lato',sans-serif;" align="left">
                                                                                        <table height="0px" align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;border-top: 1px solid #e3e3e3;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%">
                                                                                            <tbody>
                                                                                                <tr style="vertical-align: top">
                                                                                                    <td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top;font-size: 0px;line-height: 0px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%">
                                                                                                        <span>&#160;</span>
                                                                                                    </td>
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                        <!--[if (!mso)&(!IE)]><!-->
                                                                    </div>
                                                                    <!--<![endif]-->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="u-row-container" style="padding: 0px 10px;background-color: rgba(255,255,255,0)">
                                                    <div class="u-row" style="Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #ffffff;">
                                                        <div style="border-collapse: collapse;display: table;width: 100%;background-color: transparent;">
                                                            <div class="u-col u-col-66p67" style="max-width: 320px;min-width: 400px;display: table-cell;vertical-align: top;">
                                                                <div style="width: 100% !important;">
                                                                    <!--[if (!mso)&(!IE)]><!-->
                                                                    <div style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;">
                                                                        <!--<![endif]-->
                                                                        <table style="font-family:'Lato',sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td style="overflow-wrap:break-word;word-break:break-word;padding:28px 20px 25px;font-family:'Lato',sans-serif;" align="left">
                                                                                        <div style="color: #333333; line-height: 140%; text-align: left; word-wrap: break-word;">
                                                                                            <p style="font-size: 14px; line-height: 140%;"><span style="font-size: 24px; line-height: 33.6px;"><strong><span style="line-height: 33.6px; font-size: 20px;">Total</span></strong></span></p>
                                                                                        </div>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                        <!--[if (!mso)&(!IE)]><!-->
                                                                    </div>
                                                                    <!--<![endif]-->
                                                                </div>
                                                            </div>
                                                            <div class="u-col u-col-33p33" style="max-width: 320px;min-width: 200px;display: table-cell;vertical-align: top;">
                                                                <div style="width: 100% !important;">
                                                                    <!--[if (!mso)&(!IE)]><!-->
                                                                    <div style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;">
                                                                        <!--<![endif]-->
                                                                        <table style="font-family:'Lato',sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td style="overflow-wrap:break-word;word-break:break-word;padding:35px 20px 20px;font-family:'Lato',sans-serif;" align="left">
                                                                                        <div style="color: #333333; line-height: 120%; text-align: left; word-wrap: break-word;">
                                                                                            <?php
                                                                                            $grand_total_simple = $pricesubtotal / 100 * $websitefetch['gst'] + $pricesubtotal;
                                                                                            $_SESSION['grand_total_simple'] = $grand_total_simple;
                                                                                           
                                                                                                $grandtotal = "$" . $grand_total_simple;
                                                                                            
                                                                                            ?>
                                                                                            <p style="font-size: 14px; line-height: 120%;"><strong><span style="font-size: 20px; line-height: 36px;"><?= $grandtotal ?></span></strong></p>
                                                                                        </div>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                        <!--[if (!mso)&(!IE)]><!-->
                                                                    </div>
                                                                    <!--<![endif]-->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="u-row-container" style="padding: 0px 10px 20px;background-color: rgba(255,255,255,0)">
                                                        <div class="u-row" style="Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #f5f5f5;">
                                                            <div style="border-collapse: collapse;display: table;width: 100%;background-color: transparent;">
                                                                <div class="u-col u-col-100" style="max-width: 320px;min-width: 600px;display: table-cell;vertical-align: top;">
                                                                    <div style="width: 100% !important;">
                                                                        <!--[if (!mso)&(!IE)]><!-->
                                                                        <div style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;">
                                                                            <!--<![endif]-->
                                                                            <table style="font-family:'Lato',sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td style="overflow-wrap:break-word;word-break:break-word;padding:30px 20px;font-family:'Lato',sans-serif;" align="left">
                                                                                            <div style="color: #ffffff; line-height: 140%; text-align: center; word-wrap: break-word;">
                                                                                                <p style="font-size: 14px; line-height: 140%;color: black;">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&nbsp;Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis.</p>
                                                                                                <p style="font-size: 14px; line-height: 140%;">&nbsp;</p>
                                                                                                <p style="font-size: 14px; line-height: 140%;color:#a89842;">&nbsp;<a href="<?= $url ?>" target="_blank" style="color:#a89842;"><?= $websitefetch["site_name"] ?></a></p>
                                                                                                <p style="font-size: 14px; line-height: 140%;"></p>
                                                                                            </div>
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                            <!--[if (!mso)&(!IE)]><!-->
                                                                        </div>
                                                                        <!--<![endif]-->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="u-row-container" style="padding: 30px;background-color: #f0f0f0">
                                                        <div class="u-row" style="Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;">
                                                            <div style="border-collapse: collapse;display: table;width: 100%;background-color: transparent;">
                                                                <div class="u-col u-col-100" style="max-width: 320px;min-width: 600px;display: table-cell;vertical-align: top;">
                                                                    <div style="width: 100% !important;">
                                                                        <!--[if (!mso)&(!IE)]><!-->
                                                                        <div style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;">
                                                                            <!--<![endif]-->
                                                                            <table style="font-family:'Lato',sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td style="overflow-wrap:break-word;word-break:break-word;padding:20px;font-family:'Lato',sans-serif;" align="left">
                                                                                            <div style="line-height: 120%; text-align: left; word-wrap: break-word;">
                                                                                                <div style="font-family: arial, helvetica, sans-serif;"><span style="font-size: 12px; color: #999999; line-height: 14.4px;">You received this email because you signed up for My Company Inc.</span></div>
                                                                                                <div style="font-family: arial, helvetica, sans-serif;">&nbsp;</div>
                                                                                                <div style="font-family: arial, helvetica, sans-serif;"><span style="font-size: 12px; color: #999999; line-height: 14.4px;">Unsubscribe</span></div>
                                                                                            </div>
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                            <!--[if (!mso)&(!IE)]><!-->
                                                                        </div>
                                                                        <!--<![endif]-->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </body>

                        </html>
                        <?php
                        $html = ob_get_contents();
                        ob_end_clean();
                        $subject = 'Successfully Purchased | ORDER ID # '.$trackid;
                        $message = $html;
                        $mail = new PHPMailer;
                        $mail->isSMTP();
                        $mail->Host = $global_host;
                        $mail->SMTPAuth = true;
                        $mail->Username = $global_emails;
                        $mail->Password = $global_pswds;
                        $mail->SMTPSecure = 'tls';
                        $mail->Port = 587;
                        $mail->setFrom($global_emails, $websitefetch["site_name"]);
                        // $mail->addReplyTo($settinginfo["customer_s"], $settinginfo["site_name"]);
                        // Add a recipient jisko  email ja rh h
                        $mail->addAddress($form_email);
                        // Email subject
                        $mail->Subject = $subject;
                        // Set email format to HTML
                        $mail->isHTML(true);
                        $mail->Body = $html;
                        // Send email
                        // $mail->send();
                        
                   

                        if ($mail->send()) {

                            ob_start();
                        ?>


                            <!DOCTYPE html>
                            <html>

                            <head>
                                <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
                                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                                <meta name="x-apple-disable-message-reformatting">
                                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                                <title></title>
                                <style type="text/css">
                                    table,
                                    td {
                                        color: #000000;
                                    }

                                    a {
                                        color: #236fa1;
                                        text-decoration: underline;
                                    }

                                    @media only screen and (min-width: 620px) {
                                        .u-row {
                                            width: 600px !important;
                                        }

                                        .u-row .u-col {
                                            vertical-align: top;
                                        }

                                        .u-row .u-col-100 {
                                            width: 600px !important;
                                        }
                                    }

                                    @media (max-width: 620px) {
                                        .u-row-container {
                                            max-width: 100% !important;
                                            padding-left: 0px !important;
                                            padding-right: 0px !important;
                                        }

                                        .u-row .u-col {
                                            min-width: 320px !important;
                                            max-width: 100% !important;
                                            display: block !important;
                                        }

                                        .u-row {
                                            width: calc(100% - 40px) !important;
                                        }

                                        .u-col {
                                            width: 100% !important;
                                        }

                                        .u-col>div {
                                            margin: 0 auto;
                                        }
                                    }

                                    body {
                                        margin: 0;
                                        padding: 0;
                                    }

                                    table,
                                    tr,
                                    td {
                                        vertical-align: top;
                                        border-collapse: collapse;
                                    }

                                    p {
                                        margin: 0;
                                    }

                                    .ie-container table,
                                    .mso-container table {
                                        table-layout: fixed;
                                    }

                                    * {
                                        line-height: inherit;
                                    }

                                    a[x-apple-data-detectors='true'] {
                                        color: inherit !important;
                                        text-decoration: none !important;
                                    }
                                </style>
                                <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700&display=swap" rel="stylesheet" type="text/css">
                            </head>

                            <body class="clean-body u_body" style="margin: 0;padding: 0;-webkit-text-size-adjust: 100%;background-color: #e7e7e7;color: #000000">
                                <table style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;min-width: 320px;Margin: 0 auto;background-color: #e7e7e7;width:100%" cellpadding="0" cellspacing="0">
                                    <tbody>
                                        <tr style="vertical-align: top">
                                            <td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top">
                                                <div class="u-row-container" style="padding: 0px;background-color: transparent">
                                                    <div class="u-row" style="Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background: linear-gradient(46deg, #a89842, #83783f);">
                                                        <div style="border-collapse: collapse;display: table;width: 100%;background-color: transparent;">
                                                            <div class="u-col u-col-100" style="max-width: 320px;min-width: 600px;display: table-cell;vertical-align: top;">
                                                                <div style="width: 100% !important;">
                                                                    <div style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;">
                                                                        <table style="font-family:'Montserrat',sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td style="overflow-wrap:break-word;word-break:break-word;padding:25px 10px;font-family:'Montserrat',sans-serif;" align="left">
                                                                                        <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                                                                            <tr>
                                                                                                <td style="padding-right: 0px;padding-left: 0px;" align="center">
                                                                                                    <img align="center" border="0" src="<?= $logo ?>" alt="Image" title="Image" style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: inline-block !important;border: none;height: auto;float: none;width: 23%;max-width: 133.4px;" width="133.4" />
                                                                                                </td>
                                                                                            </tr>
                                                                                        </table>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="u-row-container" style="padding: 0px;background-color: transparent">
                                                    <div class="u-row" style="Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #ffffff;">
                                                        <div style="border-collapse: collapse;display: table;width: 100%;background-color: transparent;">
                                                            <div class="u-col u-col-100" style="max-width: 320px;min-width: 600px;display: table-cell;vertical-align: top;">
                                                                <div style="width: 100% !important;">
                                                                    <div style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;">
                                                                        <table style="font-family:'Montserrat',sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td style="overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:'Montserrat',sans-serif;" align="left">
                                                                                        <div style="color: #34495e; line-height: 140%; text-align: center; word-wrap: break-word;">
                                                                                            <p style="font-size: 14px; line-height: 140%;"><span style="font-size: 26px; line-height: 36.4px;"><strong><span style="line-height: 36.4px; font-size: 26px;">Order Placement!</span></strong></span></p>
                                                                                        </div>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                        <table style="font-family:'Montserrat',sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td style="overflow-wrap:break-word;word-break:break-word;padding:10px 33px;font-family:'Montserrat',sans-serif;" align="left">
                                                                                        <div style="color: #686d6d; line-height: 210%; text-align: center; word-wrap: break-word;">
                                                                                            <p style="font-size: 14px; line-height: 210%;"><span style="font-size: 16px; line-height: 33.6px;">Dear Admin,</span></p>
                                                                                            <p style="font-size: 14px; line-height: 210%;">You have a new order by <?= $first_name ?> .Kindly check this out.</p>
                                                                                        </div>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="u-row-container" style="padding: 0px;background-color: transparent">
                                                    <div class="u-row" style="Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #ffffff;">
                                                        <div style="border-collapse: collapse;display: table;width: 100%;background-color: transparent;">
                                                            <div class="u-col u-col-100" style="max-width: 320px;min-width: 600px;display: table-cell;vertical-align: top;">
                                                                <div style="width: 100% !important;">
                                                                    <div style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;">
                                                                        <table style="font-family:'Montserrat',sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td style="overflow-wrap:break-word;word-break:break-word;padding:44px 10px 10px;font-family:'Montserrat',sans-serif;" align="left">
                                                                                        <div style="line-height: 140%; text-align: center; word-wrap: break-word;">
                                                                                            <p style="font-size: 14px; line-height: 140%;"><span style="font-size: 20px; line-height: 28px;"><strong><span style="line-height:28px;font-size: 26px;border-bottom: 1px solid #928540;">Order Detail</span></strong></span></p>
                                                                                        </div>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                        <table style="font-family:'Montserrat',sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td style="overflow-wrap:break-word;word-break:break-word;padding:0px 33px 10px;font-family:'Montserrat',sans-serif;" align="left">
                                                                                        <div style="color: #686d6d; line-height: 210%; text-align: center; word-wrap: break-word;">
                                                                                            <table style="text-align: left;width: 100%;">
                                                                                                <tr>
                                                                                                    <th>Invoice Number</th>
                                                                                                    <td>#<?= $invoice_number ?></td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <th>Email</th>
                                                                                                    <td><?= $form_email ?></td>
                                                                                                </tr>
                                                                                                <!--<tr>-->
                                                                                                <!--<th>Item Name</th>-->
                                                                                                <!--<td><?= ucfirst($row["title"]) ?></td>-->
                                                                                                <!--</tr>-->
                                                                                                <!--<tr>-->
                                                                                                <!--<th>Item Quantity</th>-->
                                                                                                <!--<td>-->
                                                                                                <!--    Quantity : <?= $row["qty"] ?> x-->
                                                                                                <?php
                                                                                                // $percent = $row['percentage'];
                                                                                                // if ($_SESSION['currency'] == "dollar") {
                                                                                                //     $percentage = $row['price_usd'] / 100 * $percent;
                                                                                                //     $amount = $row['price_usd'] - $percentage;
                                                                                                //     $price = number_format((float)$amount, 2, '.', '');
                                                                                                //     echo "$" . $price;
                                                                                                // } elseif ($_SESSION['currency'] == "pound") {
                                                                                                //     $percentage = $row['price_gb'] / 100 * $percent;
                                                                                                //     $amount = $row['price_gb'] - $percentage;
                                                                                                //     $price = number_format((float)$amount, 2, '.', '');
                                                                                                //     echo "£" . $price;
                                                                                                // } elseif ($_SESSION['currency'] == "cad") {
                                                                                                //     $percentage = $row['price_cad'] / 100 * $percent;
                                                                                                //     $amount = $row['price_cad'] - $percentage;
                                                                                                //     $price = number_format((float)$amount, 2, '.', '');
                                                                                                //     echo "$" . $price;
                                                                                                // } elseif ($_SESSION['currency'] == "euro") {
                                                                                                //     $percentage = $row['price_euro'] / 100 * $percent;
                                                                                                //     $amount = $row['price_euro'] - $percentage;
                                                                                                //     $price = number_format((float)$amount, 2, '.', '');
                                                                                                //     echo "€" . $price;
                                                                                                // } else {
                                                                                                //     $percentage = $row['price_usd'] / 100 * $percent;
                                                                                                //     $amount = $row['price_usd'] - $percentage;
                                                                                                //     $price = number_format((float)$amount, 2, '.', '');
                                                                                                //     echo "$" . $price;
                                                                                                // }
                                                                                                ?>

                                                                                                <!--</td>-->
                                                                                                <!--</tr>-->
                                                                                                <!--<tr>-->
                                                                                                <!--<th>Grand Total</th>-->
                                                                                                <!--<td>-->
                                                                                                <?php
                                                                                                // $grand_total_simple = $pricesubtotal / 100 * $websitefetch['gst'] + $pricesubtotal;
                                                                                                // $_SESSION['grand_total_simple'] = $grand_total_simple;
                                                                                                // if ($_SESSION['currency'] == "dollar") {
                                                                                                //     $grandtotal = "$" . $grand_total_simple;
                                                                                                // } elseif ($_SESSION['currency'] == "pound") {
                                                                                                //     $grandtotal = "£" . $grand_total_simple;
                                                                                                // } elseif ($_SESSION['currency'] == "cad") {
                                                                                                //     $grandtotal = "$" . $grand_total_simple;
                                                                                                // } elseif ($_SESSION['currency'] == "euro") {
                                                                                                //     $grandtotal = "€" . $grand_total_simple;
                                                                                                // } else {
                                                                                                //     $grandtotal = "$" . $grand_total_simple;
                                                                                                // }
                                                                                                ?>
                                                                                                <!--</td>-->
                                                                                                <!--</tr>-->

                                                                                            </table>
                                                                                        </div>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                        <table style="font-family:'Montserrat',sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td style="overflow-wrap:break-word;word-break:break-word;padding:22px 10px 44px;font-family:'Montserrat',sans-serif;" align="left">
                                                                                        <div align="center">
                                                                                            <a href="<?= $url ?>invoice?invoice=<?= $invoice_number ?>" target="_blank" style="box-sizing: border-box;display: inline-block;font-family:'Montserrat',sans-serif;text-decoration: none;-webkit-text-size-adjust: none;text-align: center;color: #FFFFFF; background-color: #ffb200; border-radius: 4px;-webkit-border-radius: 4px; -moz-border-radius: 4px; width:auto; max-width:100%; overflow-wrap: break-word; word-break: break-word; word-wrap:break-word; mso-border-alt: none;">
                                                                                                <span style="display:block;padding:15px 33px;line-height:120%;"><span style="font-size: 16px; line-height: 19.2px;"><strong><span style="line-height: 19.2px; font-size: 16px;">View Invoice</span></strong></span></span>
                                                                                            </a>
                                                                                        </div>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="u-row-container" style="padding: 0px;background-color: transparent">
                                                    <div class="u-row" style="Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #009fa6;">
                                                        <div style="border-collapse: collapse;display: table;width: 100%;background-color: transparent;">
                                                            <div class="u-col u-col-100" style="max-width: 320px;min-width: 600px;display: table-cell;vertical-align: top;">
                                                                <div style="width: 100% !important;">
                                                                    <div style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="u-row-container" style="padding: 0px 0px 4px;background-color: transparent">
                                                        <div class="u-row" style="Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #ffffff;">
                                                            <div style="border-collapse: collapse;display: table;width: 100%;background-color: transparent;">
                                                                <div class="u-col u-col-100" style="max-width: 320px;min-width: 600px;display: table-cell;vertical-align: top;">
                                                                    <div style="width: 100% !important;">
                                                                        <div style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;">
                                                                            <table style="font-family:'Montserrat',sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td style="overflow-wrap:break-word;word-break:break-word;padding:22px 44px;font-family:'Montserrat',sans-serif;" align="left">
                                                                                            <div style="color: #a6acb1; line-height: 140%; text-align: center; word-wrap: break-word;">
                                                                                                <p style="font-size: 14px; line-height: 140%;">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis.</p>
                                                                                                <p style="font-size: 14px; line-height: 140%;color:#a89842;">&nbsp;<a href="<?= $url ?>" target="_blank" style="color:#a89842;"><?= $websitefetch["site_name"] ?></a></p>
                                                                                            </div>
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </body>

                            </html>
<?php
$html = ob_get_contents();
ob_end_clean();
$subject = 'Successfully Purchased | ORDER ID # '.$trackid;
$message = $html;
$mail = new PHPMailer;
$mail->isSMTP();
$mail->Host = $global_host;
$mail->SMTPAuth = true;
$mail->Username = $global_emails;
$mail->Password = $global_pswds;
$mail->SMTPSecure = 'tls';
$mail->Port = 587;
$mail->setFrom($global_emails, $websitefetch["site_name"]);
// $mail->addReplyTo($settinginfo["customer_s"], $settinginfo["site_name"]);
// Add a recipient jisko  email ja rh h
$mail->addAddress($global_emails);
// Email subject
$mail->Subject = $subject;
// Set email format to HTML
$mail->isHTML(true);
$mail->Body = $html;
// Send email
$mail->send();

                         
                        }
                        echo "true";
                    } else {
                      echo "wrong";
                    }
                  

?>


