<?php
session_start();
$currency = $_SESSION['currency'];
include("../include/connection.php");
$id = htmlentities(@mysqli_real_escape_string($con, $_POST['id']));
$selectProduct = mysqli_query($con, "SELECT * FROM products where id='$id'");
$fetchProduct = mysqli_fetch_array($selectProduct);
$pid = $fetchProduct['id'];
$selectImg = mysqli_query($con, "SELECT * FROM images where p_id='$pid'");
$fetchImg = mysqli_fetch_array($selectImg);
$selectColor = mysqli_query($con, "SELECT * FROM `variation_product` where p_id='$pid'");
$fetchColor = mysqli_fetch_array($selectColor);
if ($fetchColor['percentage'] != "") {
    $percent = $fetchColor['percentage'];
} else {
    $percent = 100;
}
?>
<style>
    .qty {
        width: 95px;
        border: 1px solid #ededed;
        background: none;
        padding: 0 10px;
        height: 45px;
    }
    .button {
        background: none;
        border: 1px solid #333;
        margin-left: 10px;
        font-size: 12px;
        font-weight: 700;
        height: 45px;
        width: 230px;
        line-height: 18px;
        padding: 10px 15px;
        text-transform: uppercase;
        background: #333;
        color: #ffffff;
        -webkit-transition: 0.3s;
        transition: 0.3s;
        cursor: pointer;
    }
</style>
<div class="container">
    <form id="product_model">
        <div class="row">
            <div class="col-lg-5 col-md-5 col-sm-12">
                <div class="modal_tab">
                    <div class="tab-content product-details-large">
                        <div class="tab-pane fade show active" id="tab1" role="tabpanel">
                            <div class="modal_tab_img">
                                <?php
                                if (isset($_POST['product'])) {
                                ?>
                                    <input type="hidden" value="product_model" id="design" />
                                    <a href="#"><img src="../assets/img/s-product/<?= $fetchProduct['img'] ?>" alt=""></a> <?php } else { ?>
                                    <input type="hidden" value="front" id="design" />
                                    <a href="#"><img src="assets/img/s-product/<?= $fetchProduct['img'] ?>" alt=""></a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 col-md-7 col-sm-12">
                <div class="modal_right">
                    <div class="modal_title mb-10">
                        <h2><?= $fetchProduct['title'] ?></h2>
                    </div>
                    <div class="modal_price mb-10">
                        <input type="hidden" id="id_product" value="<?= $id ?>">
                        <input type="hidden" id="totalprice">
                        <span class="new_price">
                            <?php
                            if ($currency == "dollar") {
                                $percentage = $fetchColor['price_usd'] / 100 * $percent;
                                $amount = $fetchColor['price_usd'] - $percentage;
                                echo "$" . number_format((float)$amount, 2, '.', '');
                            } elseif ($currency == "pound") {
                                $percentage = $fetchColor['price_gb'] / 100 * $percent;
                                $amount = $fetchColor['price_gb'] - $percentage;
                                echo "£" . number_format((float)$amount, 2, '.', '');
                            } elseif ($currency == "cad") {
                                $percentage = $fetchColor['price_cad'] / 100 * $percent;
                                $amount = $fetchColor['price_cad'] - $percentage;
                                echo "$" . number_format((float)$amount, 2, '.', '');
                            } elseif ($currency == "euro") {
                                $percentage = $fetchColor['price_euro'] / 100 * $percent;
                                $amount = $fetchColor['price_euro'] - $percentage;
                                echo "€" . number_format((float)$amount, 2, '.', '');
                            } else {
                                $percentage = $fetchColor['price_usd'] / 100 * $percent;
                                $amount = $fetchColor['price_usd'] - $percentage;
                                echo "$" . number_format((float)$amount, 2, '.', '');
                            } ?>
                        </span>
                        <span class="old_price">
                            <?php
                            if ($currency == "dollar") {
                                echo "$" . number_format((float)$fetchColor['price_usd'], 2, '.', '');
                            } elseif ($currency == "pound") {
                                echo "£" . number_format((float)$fetchColor['price_gb'], 2, '.', '');
                            } elseif ($currency == "cad") {
                                echo "$" . number_format((float)$fetchColor['price_cad'], 2, '.', '');
                            } elseif ($currency == "euro") {
                                echo "€" . number_format((float)$fetchColor['price_euro'], 2, '.', '');
                            } else {
                                echo "$" . number_format((float)$fetchColor['price_usd'], 2, '.', '');
                            } ?>
                        </span>
                    </div>
                    <div class="modal_description mb-15">
                        <p><?= $fetchProduct['short_description'] ?></p>
                    </div>
                    <div class="row">
                        <div class="modal_add_to_cart col-lg-4">
                            <label for="validationCustom01">Colors</label>
                            <select class="form-control" id="color_product" name="color">
                                <?php
                                $selectSubCategory = mysqli_query($con, "SELECT * FROM `color_variation`");
                                while ($fetchSubCategory = mysqli_fetch_array($selectSubCategory)) { ?>
                                    <option style="width:200px;" value="<?= $fetchSubCategory['id'];  ?>"><?= ucwords($fetchSubCategory['variation']);  ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="modal_add_to_cart col-lg-4">
                            <label for="validationCustom01">Size</label>
                            <select class="form-control" id="size_product" name="size">
                                <?php
                                $selectSubCategory = mysqli_query($con, "SELECT * FROM `size_variation`");
                                while ($fetchSubCategory = mysqli_fetch_array($selectSubCategory)) { ?>
                                    <option style="width:200px;" value="<?= $fetchSubCategory['id'];  ?>"><?= ucwords($fetchSubCategory['variation']);  ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="modal_add_to_cart">
                        <input min="1" max="100" class="qty" id="qty_product" value="1" name="qty" type="number">
                        <input type="hidden" value="addtocart" id="page" />
                        <input type="hidden" value="<?= $fetchProduct['id'] ?>" name="id" />
                        <input type="hidden" value="<?= $fetchProduct['img'] ?>" name="img" />
                        <input type="hidden" value="<?= $fetchProduct['title'] ?>" name="title" />
                        <input type="submit" class="button" value="Add to Cart" />
                    </div>
                </div>
                <div class="modal_social">
                    <h2>Share this product</h2>
                    <ul>
                        <li class="facebook"><a href="https://www.facebook.com/sharer/sharer.php?u=https://crystalgel101.com/product/<?= $fetchProduct['link']; ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
                        <li class="twitter"><a href="https://twitter.com/home?status=https://crystalgel101.com/product/<?= $fetchProduct['link']; ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
                        <li class="pinterest"><a href="https://pinterest.com/pin/create/button/?url=https://crystalgel101.com/product/<?= $fetchProduct['link']; ?>" target="_blank"><i class="fa fa-pinterest"></i></a></li>
                        <li class="linkedin"><a href="https://www.linkedin.com/shareArticle?mini=true&url=https://crystalgel101.com/product/<?= $fetchProduct['link']; ?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </form>
</div>
</div>
<?php if (isset($_POST['product'])) {  ?>
    <script src="../admin/assets/js/customize.js"></script>
<?php } else { ?>
    <script src="admin/assets/js/customize.js"></script>
<?php } ?>
<script>
    $("#color_product").change(function(event) {
        /* Act on the event */
        var color = $(this).val();
        var p_id = $("#id_product").val();
        var size = $("#size_product").val();
        var qty = $("#qty_product").val();
        $.ajax({
            url: '../admin/include/fetch.php?page=price',
            type: "POST",
            dataType: "json",
            data: {
                size: size,
                color: color,
                qty: qty,
                p_id: p_id
            },
            success: function(result) {
                $(".old_price").hide();
                $("#totalprice").val(result.price);
                $(".new_price").html(result.currency);
            }
        })
    });
    $("#size_product").change(function(event) {
        /* Act on the event */
        var size = $(this).val();
        var p_id = $("#id_product").val();
        var color = $("#color_product").val();
        var qty = $("#qty_product").val();
        $.ajax({
            url: '../admin/include/fetch.php?page=price',
            type: "POST",
            dataType: "json",
            data: {
                size: size,
                color: color,
                qty: qty,
                p_id: p_id
            },
            success: function(result) {
                $(".old_price").hide();
                $("#totalprice").val(result.price);
                $(".new_price").html(result.currency);
            }
        })
    });
    $("#qty_product").change(function(event) {
        /* Act on the event */
        var qty = $(this).val();
        var p_id = $("#id_product").val();
        var color = $("#color_product").val();
        var size = $("#size_product").val();
        $.ajax({
            url: '../admin/include/fetch.php?page=price',
            type: "POST",
            dataType: "json",
            data: {
                size: size,
                color: color,
                qty: qty,
                p_id: p_id
            },
            success: function(result) {
                $("#totalprice").val(result.price);
                $(".new_price").html(result.currency);
            }
        })
    });
</script>