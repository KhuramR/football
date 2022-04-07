<?php
include("connection.php");
$currency = $_SESSION['currency'];
$currency_symbol = $_SESSION["currency_symbol"];
if (isset($_SESSION['user_id'])) {
    $sessionid = $_SESSION['user_id'];
    $selectSession = mysqli_query($con, "SELECT * FROM users where id='$sessionid'");
    $fetchSession = mysqli_fetch_array($selectSession);
}
$id = htmlentities(@mysqli_real_escape_string($con, $_POST['id']));
$selectProduct = mysqli_query($con, "SELECT * FROM products where id='$id'");
$fetchProduct = mysqli_fetch_array($selectProduct);
$pid = $fetchProduct['id'];
$selectColor = mysqli_query($con, "SELECT * FROM `variation_product` where p_id='$pid'");
$fetchColor = mysqli_fetch_array($selectColor);
$categories = explode(",", $fetchProduct["category"]);
if ($fetchColor['percentage'] != "" && $fetchColor['percentage'] != "0") {
    $percent = $fetchColor['percentage'];
} else {
    $percent = 100;
}
?>
<!-- single product area -->
<div class="single-product-page-area">
    <div class="row">
        <div class="col-md-6">
            <div class="page-content">
                <div class="images-container">
                    <div class="js-qv-mask mask pos_content">
                        <div class="product-images js-qv-product-images">
                            <div class="thumb-container">
                                <ul id="tabs1" class="nav nav-tabs" data-bs-tabs="tabs">
                                    <li class="active"><a href="#product-1" data-bs-toggle="tab">
                                            <img src="<?= $url ?>uploads/products/<?= $fetchProduct["img"] ?>" alt="">
                                        </a></li>
                                    <?php
                                    $i = 2;
                                    $selectImg = mysqli_query($con, "SELECT * FROM images where p_id='$pid'");
                                    while ($fetchImg = mysqli_fetch_array($selectImg)) {
                                    ?>
                                        <li><a href="#product-<?= $i++ ?>" data-bs-toggle="tab">
                                                <img src="<?= $url ?>uploads/products/<?= $fetchImg["img"] ?>" alt="">
                                            </a></li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="product-cover">
                        <div id="my-tab-content1" class="tab-content">
                            <div class="tab-pane fade show active" id="product-1">
                                <img src="<?= $url ?>uploads/products/<?= $fetchProduct["img"] ?>" alt="harosa single product">
                                <div class="layer hidden-sm-down">
                                    <i class="material-icons zoom-in"></i>
                                </div>
                            </div>
                            <?php
                            $p = 2;
                            $selectImg = mysqli_query($con, "SELECT * FROM images where p_id='$pid'");
                            while ($fetchImg = mysqli_fetch_array($selectImg)) {
                            ?>
                                <div class="tab-pane fade" id="product-<?= $p++ ?>">
                                    <img src="<?= $url ?>uploads/products/<?= $fetchImg["img"] ?>" alt="harosa single product">
                                    <div class="layer hidden-sm-down">
                                        <i class="material-icons zoom-in"></i>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <h1 class="h1 namne_details"><?= $fetchProduct['title'] ?></h1>
            <div id="product_comments_block_extra" class="no-print">
                <!-- <div class="hook-reviews">
                    <div class="comments_note">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>
                </div> -->
                <!-- <ul class="comments_advices">
                    <li>
                        <a href="#idTab5" class="reviews _mPS2id-h">Read reviews (<span>1</span>)</a>
                    </li>
                    <li>
                        <a class="open-comment-form">Write a review</a>
                    </li>
                </ul> -->
            </div>
            <div class="product-prices">
                <div class="product-discount">
                    <?php
                    if (isset($_SESSION['user_id'])) {
                        $select = mysqli_query($con, "SELECT * FROM `category` WHERE name LIKE '%Accessories%'");
                        if (mysqli_num_rows($select) > 0) {
                            $fetche = mysqli_fetch_array($select);
                            $catidd = $fetche["id"];
                        }
                        if ($fetchSession["points_status"] == "Goddess") {
                            if (in_array($catidd, $categories)) { ?>
                                <span class="regular-price "> <del>
                                        <?php
                                        if ($currency == "dollar") {
                                            echo   number_format((float)$fetchColor['price_usd'], 2, '.', '') . "$";
                                        } elseif ($currency == "euro") {
                                            echo   number_format((float)$fetchColor['price_euro'], 2, '.', '') . "€";
                                        } else {
                                            echo   number_format((float)$fetchColor['price_usd'], 2, '.', '') . "$";
                                        } ?>
                                    </del>
                                </span>
                            <?php      }
                        } elseif ($fetchSession["points_status"] == "Nymph") {
                            if (in_array($catidd, $categories)) { ?>
                                <span class="regular-price "> <del>
                                        <?php
                                        if ($currency == "dollar") {
                                            echo  number_format((float)$fetchColor['price_usd'], 2, '.', '') . "$";
                                        } elseif ($currency == "euro") {
                                            echo  number_format((float)$fetchColor['price_euro'], 2, '.', '') . "€";
                                        } else {
                                            echo  number_format((float)$fetchColor['price_usd'], 2, '.', '') . "$";
                                        } ?>
                                    </del>
                                </span>
                        <?php     }
                        } ?>
                    <?php } else { ?>
                        <span class="regular-price " <?= ($fetchColor['percentage'] != "" && $fetchColor['percentage'] != "0") ? "" : "style='display:none;'" ?>> <del>
                                <?php
                                if ($currency == "dollar") {
                                    echo  number_format((float)$fetchColor['price_usd'], 2, '.', '') . "$";
                                } elseif ($currency == "euro") {
                                    echo  number_format((float)$fetchColor['price_euro'], 2, '.', '') . "€";
                                } else {
                                    echo  number_format((float)$fetchColor['price_usd'], 2, '.', '') . "$";
                                } ?></del>
                        </span>
                    <?php  } ?>
                </div>
                <div class="product-price h5 has-discount">
                    <div class="current-price">
                        <span class="price">
                            <?php
                            if (isset($_SESSION['user_id'])) {
                                $select = mysqli_query($con, "SELECT * FROM `category` WHERE name LIKE '%Accessories%'");
                                if (mysqli_num_rows($select) > 0) {
                                    $fetche = mysqli_fetch_array($select);
                                    $catidd = $fetche["id"];
                                }
                                if ($fetchSession["points_status"] == "Goddess") {
                                    if (in_array($catidd, $categories)) {
                                        if ($currency == "dollar") {
                                            $percentage = $fetchColor['price_usd'] / 100 * 15;
                                            $amount = $fetchColor['price_usd'] - $percentage;
                                            echo number_format((float)$amount, 2, '.', '') . "$";
                                        } elseif ($currency == "euro") {
                                            $percentage = $fetchColor['price_euro'] / 100 * 15;
                                            $amount = $fetchColor['price_euro'] - $percentage;
                                            echo number_format((float)$amount, 2, '.', '') . "€";
                                        }
                                    }
                                } elseif ($fetchSession["points_status"] == "Nymph") {
                                    if (in_array($catidd, $categories)) {
                                        if ($currency == "dollar") {
                                            $percentage = $fetchColor['price_usd'] / 100 * $percent;
                                            $amount = $fetchColor['price_usd'] - $percentage;
                                            echo  number_format((float)$amount, 2, '.', '') . "$";
                                        } elseif ($currency == "euro") {
                                            $percentage = $fetchColor['price_euro'] / 100 * $percent;
                                            $amount = $fetchColor['price_euro'] - $percentage;
                                            echo  number_format((float)$amount, 2, '.', '') . "€";
                                        }
                                    }
                                } else {
                                    if ($fetchColor['percentage'] != "" && $fetchColor['percentage'] != "0") {
                                        if ($currency == "dollar") {
                                            $percentage = $fetchColor['price_usd'] / 100 * $percent;
                                            $amount = $fetchColor['price_usd'] - $percentage;
                                            echo  number_format((float)$amount, 2, '.', '') . "$";
                                        } elseif ($currency == "euro") {
                                            $percentage = $fetchColor['price_euro'] / 100 * $percent;
                                            $amount = $fetchColor['price_euro'] - $percentage;
                                            echo  number_format((float)$amount, 2, '.', '') . "€";
                                        }
                                    } else {
                                        if ($currency == "dollar") {
                                            echo   number_format((float)$fetchColor['price_usd'], 2, '.', '') . "$";
                                        } elseif ($currency == "euro") {
                                            echo   number_format((float)$fetchColor['price_euro'], 2, '.', '') . "€";
                                        } else {
                                            echo   number_format((float)$fetchColor['price_usd'], 2, '.', '') . "$";
                                        }
                                    }
                                }
                            } else {
                                if ($fetchColor['percentage'] != "" && $fetchColor['percentage'] != "0") {
                                    if ($currency == "dollar") {
                                        $percentage = $fetchColor['price_usd'] / 100 * $percent;
                                        $amount = $fetchColor['price_usd'] - $percentage;
                                        echo   number_format((float)$amount, 2, '.', '') . "$";
                                    } elseif ($currency == "euro") {
                                        $percentage = $fetchColor['price_euro'] / 100 * $percent;
                                        $amount = $fetchColor['price_euro'] - $percentage;
                                        echo   number_format((float)$amount, 2, '.', '') . "€";
                                    }
                                } else {
                                    if ($currency == "dollar") {
                                        echo  number_format((float)$fetchColor['price_usd'], 2, '.', '') . "$";
                                    } elseif ($currency == "euro") {
                                        echo  number_format((float)$fetchColor['price_euro'], 2, '.', '') . "€";
                                    } else {
                                        echo  number_format((float)$fetchColor['price_usd'], 2, '.', '') . "$";
                                    }
                                }
                            } ?>
                        </span>
                        <?php
                        if (isset($_SESSION['user_id'])) {
                            $select = mysqli_query($con, "SELECT * FROM `category` WHERE name LIKE '%Accessories%'");
                            if (mysqli_num_rows($select) > 0) {
                                $fetche = mysqli_fetch_array($select);
                                $catidd = $fetche["id"];
                            }
                            if ($fetchSession["points_status"] == "Goddess") {
                                if (in_array($catidd, $categories)) {
                        ?>
                                    <span class="discount discount-percentage">Save 15%</span>
                                <?php
                                }
                            } elseif ($fetchSession["points_status"] == "Nymph") {
                                if (in_array($catidd, $categories)) {
                                ?>
                                    <span class="discount discount-percentage">Save 15%</span>
                                <?php
                                }
                            } else {
                                if ($fetchProduct["percentage"] != "0" && $fetchProduct["percentage"] != "") {
                                ?>
                                    <span class="discount discount-percentage">Save <?= $percent ?>%</span>
                                <?php
                                }
                            }
                        } else {
                            if ($fetchProduct["percentage"] != "0" && $fetchProduct["percentage"] != "") {
                                ?>
                                <span class="discount discount-percentage">Save <?= $percent ?>%</span>
                        <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="product-information">
                <div class="product-desc">
                    <p><?= $fetchProduct['short_description'] ?></p>
                </div>
                <div class="product-actions">
                    <form action="#" id="add">
                        <div class="product-variants mb-4">
                            <?php
                            $selectSubCategory1 = mysqli_query($con, "SELECT size_variation.* FROM `size_variation`,variation_product WHERE variation_product.p_id='$pid' and variation_product.size_id=size_variation.id");
                            if (mysqli_num_rows($selectSubCategory1) > 0) { ?>
                                <div class="product-variants-item">
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
                                <div class="product-variants-item">
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
                                <div class="product-variants-item">
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
                                <div class="product-variants-item">
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
                        <div class="product-add-to-cart">
                            <span class="control-label">Quantity</span>
                            <div class="box-quantity d-flex">
                                <input type="hidden" id="id" value="<?= $id ?>">
                                <input type="hidden" id="totalprice">
                                <input type="hidden" value="front" id="design">
                                <input type="hidden" value="addtocart" id="page" />
                                <input type="hidden" value="<?= $fetchProduct['id'] ?>" name="id" />
                                <input type="hidden" value="<?= $fetchProduct['img'] ?>" name="img" />
                                <input type="hidden" value="<?= $fetchProduct['title'] ?>" name="title" />
                                <input class="quantity mr-40" min="1" id="qty" name="qty" value="1" type="number">
                                <button class="add-cart" type="submit"><i class="fa fa-shopping-cart"></i> add to cart</button>
                            </div>
                        </div>
                        <div class="product-additional-info">
                            <div class="social-sharing">
                                <span>Share</span>
                                <ul>
                                    <li class="facebook"><a href="https://www.facebook.com/sharer/sharer.php?u=<?= $url ?>product-details/<?= $fetchProduct['link']; ?>" target="_blank"></a></li>
                                    <li class="twitter"><a href="https://twitter.com/home?status=<?= $url ?>product-details/<?= $fetchProduct['link']; ?>" target="_blank"></a></li>
                                    <li class="pinterest"><a href="https://pinterest.com/pin/create/button/?url=<?= $url ?>product-details/<?= $fetchProduct['link']; ?>" target="_blank"></a></li>
                                    <li class="linkedin"><a href="https://www.linkedin.com/shareArticle?mini=true&url=<?= $url ?>product-details/<?= $fetchProduct['link']; ?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- single product area -->
<?php if (isset($_POST['product'])) {  ?>
    <script src="../admin/assets/js/customize.js"></script>
<?php } else { ?>
    <script src="admin/assets/js/customize.js"></script>
<?php } ?>
<script>
    $("#color").change(function(event) {
        /* Act on the event */
        var color = $(this).val();
        var p_id = $("#id").val();
        var size = $("#size").val();
        var qty = $("#qty").val();
        var length = $("#length").val();
        $.ajax({
            url: 'admin/include/fetch.php?page=price',
            type: "POST",
            dataType: "json",
            data: {
                size: size,
                length: length,
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
        var length = $(this).val();
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
        var size = $(this).val();
        var p_id = $("#id").val();
        var color = $("#color").val();
        var qty = $("#qty").val();
        var length = $("#length").val();
        $.ajax({
            url: 'admin/include/fetch.php?page=price',
            type: "POST",
            dataType: "json",
            data: {
                size: size,
                length: length,
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
        var p_id = $("#id").val();
        var color = $("#color").val();
        var size = $("#size").val();
        $.ajax({
            url: 'admin/include/fetch.php?page=price',
            type: "POST",
            dataType: "json",
            data: {
                size: size,
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