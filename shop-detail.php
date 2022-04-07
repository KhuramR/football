<?php
include_once 'header.php';
if (isset($_GET["link"])) {
    $currency = $_SESSION['currency'];
    $currency_symbol = $_SESSION["currency_symbol"];
    $link = htmlentities(@mysqli_real_escape_string($con, $_GET["link"]));
    $selectProduct = mysqli_query($con, "SELECT * FROM products where link='$link'");
    $fetchProduct = mysqli_fetch_array($selectProduct);
    $pid = $fetchProduct['id'];
    $selectColor = mysqli_query($con, "SELECT * FROM `variation_product` where p_id='$pid'");
    $fetchColor = mysqli_fetch_array($selectColor);
    if ($fetchColor['percentage'] != "" && $fetchColor['percentage'] != "0") {
        $percent = $fetchColor['percentage'];
    } else {
        $percent = 100;
    }
}
?>

<!-- Breadcrumbs Section Start -->
<div class="rs-breadcrumbs sec-color">
    <img src="<?= $url ?>frontassets/images/breadcrumbs/shop.jpg" alt="Breadcrubs" />
    <div class="breadcrumbs-inner">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1 class="page-title">Shop Details</h1>
                    <ul>
                        <li>
                            <a class="active" href="<?=$url?>">Home</a>
                        </li>
                        <li>Shop Details</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumbs Section End -->

<!-- Shop Single Page Start Here -->
<div class="single-product-page sec-spacer">
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-sm-12">
                <div class="single-product-area left-area">
                    <div class="row">
                        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                            <div class="inner-single-product-slider">
                                <div class="inner">
                                    <div class="slider single-product-image">
                                        <div>
                                            <div class="images-single">
                                                <img src="<?= $url ?>uploads/products/<?= $fetchProduct["img"] ?>" alt="">
                                            </div>
                                        </div>
                                        <?php
                                        $i = 2;
                                        $selectImg = mysqli_query($con, "SELECT * FROM images where p_id='$pid'");
                                        while ($fetchImg = mysqli_fetch_array($selectImg)) {
                                        ?>
                                            <div>
                                                <div class="images-single">
                                                    <img src="<?= $url ?>uploads/products/<?= $fetchImg["img"] ?>" alt="">
                                                </div>
                                            </div>
                                        <?php } ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
                            <div class="single-price-info">
                                <h3><?= $fetchProduct['title'] ?></h3>
                                <span class="single-price" <?= ($fetchColor['percentage'] != "" && $fetchColor['percentage'] != "0") ? "" : "style='display:none;'" ?>>
                                    <del>
                                        <?php
                                        if ($currency == "dollar") {
                                            echo number_format((float)$fetchColor['price_usd'], 2, '.', '') . "£";
                                        } elseif ($currency == "euro") {
                                            echo number_format((float)$fetchColor['price_euro'], 2, '.', '') . "£";
                                        } else {
                                            echo number_format((float)$fetchColor['price_usd'], 2, '.', '') . "£";
                                        } ?></del>
                                </span>
                                <span class="single-price">
                                    <?php
                                    if ($fetchColor['percentage'] != "0" && $fetchColor['percentage'] != "") {

                                        $percentage = $fetchColor['price_usd'] / 100 * $percent;
                                        $amount = $fetchColor['price_usd'] - $percentage;
                                        echo  number_format((float)$amount, 2, '.', '') . "£";
                                    } else {

                                        echo  number_format((float)$fetchColor['price_usd'], 2, '.', '') . "£";
                                    }
                                    ?>
                                </span>
                                <?php if ($fetchColor['percentage'] != "0" && $fetchColor['percentage'] != "") { ?>
                                    <span class="discount discount-percentage">Save <?= $percent ?>%</span>
                                <?php } ?>
                                <p><?= $fetchProduct['short_description'] ?></p>
                                <!-- <a class="primary-btn" href="#">Add To cart</a> -->
                                
                                <p class="cat"><strong><?= content(342) ?>:</strong> <?= $fetchProduct['pro_use'] ?></p>
                                <!-- <p class="tag"><strong>Tags:</strong> Bathroom, Contemporary, Grooming</p> -->
                                <form action="#" id="add">
                                    <div class="row">
                                    <div class="product-variants mb-4 ">
                                        <?php
                                        $selectSubCategory1 = mysqli_query($con, "SELECT size_variation.* FROM `size_variation`,variation_product WHERE variation_product.p_id='$pid' and variation_product.size_id=size_variation.id");
                                        if (mysqli_num_rows($selectSubCategory1) > 0) { ?>
                                            <div class="product-variants-item col-md-4">
                                                <span class="control-label">Size</span>
                                                <select class="form-control form-control-select" name="size" id="size">
                                                    <option value="0">-- Select Size --</option>
                                                    <?php
                                                    $selectSubCategory = mysqli_query($con, "SELECT size_variation.* FROM `size_variation`,variation_product WHERE variation_product.p_id='$pid' and variation_product.size_id=size_variation.id");
                                                    while ($fetchSubCategory = mysqli_fetch_array($selectSubCategory)) { ?>
                                                        <option value="<?= $fetchSubCategory['id'];  ?>" <?= ($fetchColor["size_id"] == $fetchSubCategory['id']) ? "selected=''" : "" ?>><?= ucwords($fetchSubCategory['variation']);  ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        <?php }
                                        $selectSubCategoryv = mysqli_query($con, "SELECT color_variation.* FROM `color_variation`,variation_product WHERE variation_product.p_id='$pid' and variation_product.color_id=color_variation.id");
                                        if (mysqli_num_rows($selectSubCategoryv) > 0) {
                                        ?>
                                            <div class="product-variants-item col-md-4">
                                                <span class="control-label">Color</span>
                                                <select class="form-control form-control-select" name="color" id="color">
                                                    <option value="0">-- Select COlor --</option>
                                                    <?php
                                                    $selectSubCategory = mysqli_query($con, "SELECT color_variation.* FROM `color_variation`,variation_product WHERE variation_product.p_id='$pid' and variation_product.color_id=color_variation.id");
                                                    while ($fetchSubCategory = mysqli_fetch_array($selectSubCategory)) { ?>
                                                        <option value="<?= $fetchSubCategory['id'];  ?>" <?= ($fetchColor["color_id"] == $fetchSubCategory['id']) ? "selected=''" : "" ?>><?= ucwords($fetchSubCategory['variation']);  ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        <?php }
                                        $selectSubCategoryl = mysqli_query($con, "SELECT length_variation.* FROM `length_variation`,variation_product WHERE variation_product.p_id='$pid' and variation_product.length_id=length_variation.id");
                                        if (mysqli_num_rows($selectSubCategoryl) > 0) {
                                        ?>
                                            <div class="product-variants-item col-md-4">
                                                <span class="control-label">Length</span>
                                                <select class="form-control form-control-select" name="length" id="length">
                                                    <option value="0">-- Select Length --</option>
                                                    <?php
                                                    $selectSubCategory = mysqli_query($con, "SELECT length_variation.* FROM `length_variation`,variation_product WHERE variation_product.p_id='$pid' and variation_product.length_id=length_variation.id");
                                                    while ($fetchSubCategory = mysqli_fetch_array($selectSubCategory)) { ?>
                                                        <option value="<?= $fetchSubCategory['id'];  ?>" <?= ($fetchColor["length_id"] == $fetchSubCategory['id']) ? "selected=''" : "" ?>><?= ucwords($fetchSubCategory['variation']);  ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        <?php }
                                        $selectSubCategoryw = mysqli_query($con, "SELECT weight_variation.* FROM `weight_variation`,variation_product WHERE variation_product.p_id='$pid' and variation_product.weight_id=weight_variation.id");
                                        if (mysqli_num_rows($selectSubCategoryw) > 0) {
                                        ?>
                                            <div class="product-variants-item col-md-4">
                                                <span class="control-label">Capacity</span>
                                                <select class="form-control form-control-select" name="capacity" id="capacity">
                                                    <option value="0">-- Select Capacity --</option>
                                                    <?php
                                                    $selectSubCategory = mysqli_query($con, "SELECT weight_variation.* FROM `weight_variation`,variation_product WHERE variation_product.p_id='$pid' and variation_product.weight_id=weight_variation.id");
                                                    while ($fetchSubCategory = mysqli_fetch_array($selectSubCategory)) { ?>
                                                        <option value="<?= $fetchSubCategory['id'];  ?>" <?= ($fetchColor["weight_id"] == $fetchSubCategory['id']) ? "selected=''" : "" ?>><?= ucwords($fetchSubCategory['variation']);  ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <div class="product-discounts"></div>
                                    <div class="product-add-to-cart col-md-4">
                                        <span class="control-label">Quantity</span>
                                        <div class="box-quantity d-flex">
                                            <input type="hidden" id="id" value="<?= $pid ?>">
                                            <input type="hidden" id="totalprice">
                                            <input type="hidden" value="product" id="design">
                                            <input type="hidden" value="addtocart" id="page" />
                                            <input type="hidden" value="<?= $fetchProduct['id'] ?>" name="id" />
                                            <input type="hidden" value="<?= $fetchProduct['img'] ?>" name="img" />
                                            <input type="hidden" value="<?= $fetchProduct['title'] ?>" name="title" />
                                            <input class="quantity mr-40" min="1" id="qty" name="qty" value="1" type="number" style="width: 120px;">
                                            
                                        </div>
                                    </div>
                                   
                                    </div>
                                    <button class="add-cart primary-btn" type="submit" style="border: none;margin: 20px 0px;"><i class="fa fa-shopping-cart"></i> <?= content(345) ?></button>
                                    <?php
                                    $selectNumCart1 = mysqli_query($con, "SELECT * from cart where ip='$ip' and status=0 order by id desc ");
                                    if(mysqli_num_rows($selectNumCart1)>0){
                                    ?>
                                    <button style="border: none;margin: 20px 0px;"><a href="<?=$url?>cart"  class="add-cart primary-btn" style="background: #fac02e;"><i class="fa fa-shopping-cart"></i> View Cart</a></button>
                                    <?php }?>
                                    <div class="product-additional-info">
                                        <div class="social-sharing">
                                            <span>Share</span>
                                            <ul class="single-product-icons" style="margin-top: 0;">
                                         
                                                <li class="facebook"><a href="https://www.facebook.com/sharer/sharer.php?u=<?= $url ?>product-details/<?= $fetchProduct['link']; ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                                <li class="twitter"><a href="https://twitter.com/home?status=<?= $url ?>product-details/<?= $fetchProduct['link']; ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                                <li class="pinterest"><a href="https://pinterest.com/pin/create/button/?url=<?= $url ?>product-details/<?= $fetchProduct['link']; ?>" target="_blank"><i class="fa fa-pinterest"></i></a></li>
                                                <li class="linkedin"><a href="https://www.linkedin.com/shareArticle?mini=true&url=<?= $url ?>product-details/<?= $fetchProduct['link']; ?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-5">
                            <div class="slider single-product-nav">
                                <div class="images-slide-single">
                                    <img src="<?= $url ?>uploads/products/<?= $fetchProduct["img"] ?>" width="120" height="120" alt="">
                                </div>
                                <?php
                                $i = 2;
                                $selectImg = mysqli_query($con, "SELECT * FROM images where p_id='$pid'");
                                while ($fetchImg = mysqli_fetch_array($selectImg)) {
                                ?>
                                    <div class="images-slide-single">
                                        <img src="<?= $url ?>uploads/products/<?= $fetchImg["img"] ?>" width="120" height="120" alt="">
                                    </div>
                                <?php } ?>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="row product-description">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <!-- Nav tabs -->
                        <ul class="nav-menus">
                            <li class="active"><a data-toggle="tab" href="#tab1">Description</a></li>
                            <!-- <li><a data-toggle="tab" href="#tab2"><?=content(341)?></a></li> -->
                            <!-- <li><a data-toggle="tab" href="#tab3">Reviews</a></li> -->
                        </ul>
                        <!-- tabs content -->
                        <div class="tab-content">
                            <div id="tab1" class="tab-pane fade in active">
                                <p><?= $fetchProduct['long_description'] ?></p>
                               
                            </div>
                            <div id="tab2" class="tab-pane fade">
                                <!-- <p><?= $fetchProduct['ingredients'] ?></p> -->
                            </div>
                            <!-- <div id="tab3" class="tab-pane fade">
                                <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Vir ginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable</p>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
           
        </div>
        <div class="row our-products-section">
            <div class="col-sm-12">
                <div class="title-bar">
                    <h3 class="title-bg">Related Product</h3>
                </div>
            </div>
            <?php
                    $curr = date("Y-m-d");
                    $days_ago = date('Y-m-d', strtotime('-15 days', strtotime($curr)));
                    $q = "SELECT products.*,variation_product.price_usd,variation_product.price_euro,variation_product.percentage,variation_product.stock FROM `variation_product`,products WHERE products.id=variation_product.p_id  GROUP BY variation_product.p_id ORDER BY products.id DESC LIMIT 0,10";
                    $query = mysqli_query($con, $q);
                    while ($fetch = mysqli_fetch_array($query)) {     ?>
            <div class="col-md-3 col-sm-6 col-xs-6">
                <div class="single-product text-center">
                    <div class="product-image">
                        <div class="overly"></div>
                        <a href="#"><img src="<?= $url . "uploads/products/" . $fetch["img"] ?>" alt="Product" style="width: 100%;height: 290px;object-fit: cover;"/></a>
                    </div>
                    <div class="product-details">
                        <div class="product-tile">
                            <a href="<?= $url ?>product-details/<?= $fetch["link"] ?>" title="<?= $fetch["title"] ?>"><?= $fetch["title"] ?></a>
                            <span><?php 
                                    
                                    $productprice =   number_format((float)$fetch['price_usd'], 2, '.', '') . "£";
                                    $percentage = $fetch['price_usd'] / 100 * $fetch["percentage"];
                                    $amount = $fetch['price_usd'] - $percentage;
                                   
                                    $discountprice =   number_format((float)$amount, 2, '.', '') . "£";
                                    if($productprice != $discountprice) {
                                ?>
                                <span><?= $productprice ?></span>
                                <?php }?>
                                <span><?= $discountprice ?></span></span>
                        </div>
                        <div class="product-cart">
                            <a href="<?= $url ?>product-details/<?= $fetch["link"] ?>"><i class="fa fa-shopping-cart"></i>View Detail</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
          
        </div>
    </div>
</div>
<!-- Shop Single Page End Here -->
<?php
include_once 'footer.php';
?>
<script>
    $("#color").change(function(event) {
        /* Act on the event */
        var capacity = $("#capacity").val();
        var color = $(this).val();
        var p_id = $("#id").val();
        var size = $("#size").val();
        var qty = $("#qty").val();
        var length = $("#length").val();
        $.ajax({
            url: '<?= $url ?>admin/include/fetch.php?page=price',
            type: "POST",
            dataType: "json",
            data: {
                size: size,
                length: length,
                capacity: capacity,
                color: color,
                qty: qty,
                p_id: p_id
            },
            success: function(result) {
                if (result.percentage != "0") {
                    $(".regular-price").html("<del>" + result.old_price + "</del>").show();
                    $(".current-price .price").html(result.new_Price).show();
                    $(".discount-percentage").html("Save " + result.percentage + "%").show();
                } else {
                    $(".regular-price").html("<del>" + result.old_price + "</del>").hide();
                    $(".current-price .price").html(result.new_Price);
                    $(".discount-percentage").html("Save " + result.percentage + "%").hide();
                }
                $("#totalprice").val(result.price);
            }
        })
    });
    $("#length").change(function(event) {
        /* Act on the event */
        var capacity = $("#capacity").val();
        var length = $(this).val();
        var p_id = $("#id").val();
        var size = $("#size").val();
        var qty = $("#qty").val();
        var color = $("#color").val();
        $.ajax({
            url: '<?= $url ?>admin/include/fetch.php?page=price',
            type: "POST",
            dataType: "json",
            data: {
                size: size,
                length: length,
                capacity: capacity,
                color: color,
                qty: qty,
                p_id: p_id
            },
            success: function(result) {
                if (result.percentage != "0") {
                    $(".regular-price").html("<del>" + result.old_price + "</del>").show();
                    $(".current-price .price").html(result.new_Price).show();
                    $(".discount-percentage").html("Save " + result.percentage + "%").show();
                } else {
                    $(".regular-price").html("<del>" + result.old_price + "</del>").hide();
                    $(".current-price .price").html(result.new_Price);
                    $(".discount-percentage").html("Save " + result.percentage + "%").hide();
                }
                $("#totalprice").val(result.price);
            }
        })
    });
    $("#size").change(function(event) {
        /* Act on the event */
        var capacity = $("#capacity").val();
        var size = $(this).val();
        var p_id = $("#id").val();
        var color = $("#color").val();
        var qty = $("#qty").val();
        var length = $("#length").val();
        $.ajax({
            url: '<?= $url ?>admin/include/fetch.php?page=price',
            type: "POST",
            dataType: "json",
            data: {
                size: size,
                length: length,
                capacity: capacity,
                color: color,
                qty: qty,
                p_id: p_id
            },
            success: function(result) {
                if (result.percentage != "0") {
                    $(".regular-price").html("<del>" + result.old_price + "</del>").show();
                    $(".current-price .price").html(result.new_Price).show();
                    $(".discount-percentage").html("Save " + result.percentage + "%").show();
                } else {
                    $(".regular-price").html("<del>" + result.old_price + "</del>").hide();
                    $(".current-price .price").html(result.new_Price);
                    $(".discount-percentage").html("Save " + result.percentage + "%").hide();
                }
                $("#totalprice").val(result.price);
            }
        })
    });
    $("#qty").change(function(event) {
        /* Act on the event */
        var qty = $(this).val();
        var capacity = $("#capacity").val();
        var p_id = $("#id").val();
        var color = $("#color").val();
        var size = $("#size").val();
        $.ajax({
            url: '<?= $url ?>admin/include/fetch.php?page=price',
            type: "POST",
            dataType: "json",
            data: {
                size: size,
                length: length,
                capacity: capacity,
                color: color,
                qty: qty,
                p_id: p_id
            },
            success: function(result) {
                if (result.percentage != "0") {
                    $(".regular-price").html("<del>" + result.old_price + "</del>").show();
                    $(".current-price .price").html(result.new_Price).show();
                    $(".discount-percentage").html("Save " + result.percentage + "%").show();
                } else {
                    $(".regular-price").html("<del>" + result.old_price + "</del>").hide();
                    $(".current-price .price").html(result.new_Price);
                    $(".discount-percentage").html("Save " + result.percentage + "%").hide();
                }
                $("#totalprice").val(result.price);
            }
        })
    });
    $("#capacity").change(function(event) {
        /* Act on the event */
        var length = $("#length").val();
        var capacity = $(this).val();
        var p_id = $("#id").val();
        var size = $("#size").val();
        var qty = $("#qty").val();
        var color = $("#color").val();
        $.ajax({
            url: 'admin/include/fetch.php?page=price',
            type: "POST",
            dataType: "json",
            data: {
                size: size,
                length: length,
                capacity: capacity,
                color: color,
                qty: qty,
                p_id: p_id
            },
            success: function(result) {
                if (result.percentage != "0") {
                    $(".regular-price").html("<del>" + result.old_price + "</del>").show();
                    $(".current-price .price").html(result.new_Price).show();
                    $(".discount-percentage").html("Save " + result.percentage + "%").show();
                } else {
                    $(".regular-price").html("<del>" + result.old_price + "</del>").hide();
                    $(".current-price .price").html(result.new_Price);
                    $(".discount-percentage").html("Save " + result.percentage + "%").hide();
                }
                $("#totalprice").val(result.price);
            }
        })
    });
</script>