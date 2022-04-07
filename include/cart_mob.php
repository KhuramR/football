<?php
    include "connection.php";
    $pricesubtotal = 0;
    $ip = $_SERVER['REMOTE_ADDR'];
    $selectNumCart = mysqli_query($con, "SELECT * from cart where ip='$ip' and status=0 order by id desc ");
    $numCart = mysqli_num_rows($selectNumCart);
    if ($numCart > 0) {
        while ($fetchCart = mysqli_fetch_array($selectNumCart)) {
            $colorid = $fetchCart['color_id'];
            $sizeid = $fetchCart['size_id'];
            $lengthid = $fetchCart['length_id'];
            $pid = $fetchCart['p_id'];
            $selectVar = mysqli_query($con, "SELECT products.img,products.link,products.title,variation_product.* FROM `variation_product`,products WHERE products.id=variation_product.p_id and variation_product.color_id='$colorid' and variation_product.size_id='$sizeid' and variation_product.p_id='$pid' ");
            $fetchVar = mysqli_fetch_array($selectVar);
            $sizevarquery = mysqli_query($con, "SELECT * FROM size_variation where id='$sizeid'");
            $lengthvarquery = mysqli_query($con, "SELECT * FROM length_variation where id='$lengthid'");
            $colorvarquery = mysqli_query($con, "SELECT * FROM color_variation where id='$colorid'");
            $percent = $fetchVar['percentage'];
            if ($_SESSION['currency'] == "dollar") {
                $percentage = $fetchVar['price_usd'] / 100 * $percent;
                $amount = $fetchVar['price_usd'] - $percentage;
                $price = number_format((float)$amount, 2, '.', '');
                // echo "$" . $price;
            } elseif ($_SESSION['currency'] == "pound") {
                $percentage = $fetchVar['price_gb'] / 100 * $percent;
                $amount = $fetchVar['price_gb'] - $percentage;
                $price = number_format((float)$amount, 2, '.', '');
                // echo "£" . $price;
            } elseif ($_SESSION['currency'] == "cad") {
                $percentage = $fetchVar['price_cad'] / 100 * $percent;
                $amount = $fetchVar['price_cad'] - $percentage;
                $price = number_format((float)$amount, 2, '.', '');
                // echo "$" . $price;
            } elseif ($_SESSION['currency'] == "euro") {
                $percentage = $fetchVar['price_euro'] / 100 * $percent;
                $amount = $fetchVar['price_euro'] - $percentage;
                $price = number_format((float)$amount, 2, '.', '');
                // echo "€" . $price;
            } else {
                $percentage = $fetchVar['price_usd'] / 100 * $percent;
                $amount = $fetchVar['price_usd'] - $percentage;
                $price = number_format((float)$amount, 2, '.', '');
                // echo "$" . $price;
            }
            $subtotal = $amount * $fetchCart['qty'];
            $pricesubtotal += $subtotal;
        }
    }
?>