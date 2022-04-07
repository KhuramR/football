  <?php
    include "connection.php";
    include "function.php";
    
    if (isset($_SESSION['user_id'])) {
        $sessionid = $_SESSION['user_id'];
        $selectSession = mysqli_query($con, "SELECT * FROM users where id='$sessionid'");
        $fetchSession = mysqli_fetch_array($selectSession);
    }
    $pricesubtotal = 0;
    $grandtotal = 0;
    $pous = 0;
    $qrty = 0;
    $ip = $_SERVER['REMOTE_ADDR'];
    $selectNumCart = mysqli_query($con, "SELECT * from cart where ip='$ip' and status=0 order by id desc ");
    $numCart = mysqli_num_rows($selectNumCart);
    if ($numCart > 0) {
        while ($fetchCart = mysqli_fetch_array($selectNumCart)) {
            $colorid = $fetchCart['color_id'];
            $sizeid = $fetchCart['size_id'];
            $lengthid = $fetchCart['length_id'];
            $pid = $fetchCart['p_id'];
            $selectVar = mysqli_query($con, "SELECT products.img,products.link,products.category,products.title,variation_product.* FROM `variation_product`,products WHERE products.id=variation_product.p_id and variation_product.color_id='$colorid' and variation_product.size_id='$sizeid' and variation_product.p_id='$pid' ");
            $fetchVar = mysqli_fetch_array($selectVar);
            $categories = explode(",", $fetchVar["category"]);
            $sizevarquery = mysqli_query($con, "SELECT * FROM size_variation where id='$sizeid'");
            $lengthvarquery = mysqli_query($con, "SELECT * FROM length_variation where id='$lengthid'");
            $colorvarquery = mysqli_query($con, "SELECT * FROM color_variation where id='$colorid'");
            $percent = @$fetchVar['percentage'];
            if ($_SESSION['currency'] == "dollar") {
                if (isset($_SESSION['user_id'])) {
                    $select = mysqli_query($con, "SELECT * FROM `category` WHERE name LIKE '%Accessories%'");
                    if (mysqli_num_rows($select) > 0) {
                        $fetche = mysqli_fetch_array($select);
                        $catidd = $fetche["id"];
                    }
                    if ($fetchSession["points_status"] == "Goddess") {
                        if (in_array($catidd, $categories)) {
                            $percentage = $fetchVar['price_usd'] / 100 * 15;
                            $amount = $fetchVar['price_usd'] - $percentage;
                            $price = number_format((float)$amount, 2, '.', '');
                        }
                    } elseif ($fetchSession["points_status"] == "Nymph") {
                        if (in_array($catidd, $categories)) {
                            $percentage = $fetchVar['price_usd'] / 100 * 15;
                            $amount = $fetchVar['price_usd'] - $percentage;
                            $price = number_format((float)$amount, 2, '.', '');
                        }
                    } else {
                        $percentage = $fetchVar['price_usd'] / 100 * $percent;
                        $amount = $fetchVar['price_usd'] - $percentage;
                        $price = number_format((float)$amount, 2, '.', '');
                    }
                } else {
                    $percentage = $fetchVar['price_usd'] / 100 * $percent;
                    $amount = $fetchVar['price_usd'] - $percentage;
                    $price = number_format((float)$amount, 2, '.', '');
                }
            } elseif ($_SESSION['currency'] == "euro") {
                if (isset($_SESSION['user_id'])) {
                    $select = mysqli_query($con, "SELECT * FROM `category` WHERE name LIKE '%Accessories%'");
                    if (mysqli_num_rows($select) > 0) {
                        $fetche = mysqli_fetch_array($select);
                        $catidd = $fetche["id"];
                    }
                    if ($fetchSession["points_status"] == "Goddess") {
                        if (in_array($catidd, $categories)) {
                            $percentage = $fetchVar['price_euro'] / 100 * 15;
                            $amount = $fetchVar['price_euro'] - $percentage;
                            $price = number_format((float)$amount, 2, '.', '');
                        }
                    } elseif ($fetchSession["points_status"] == "Nymph") {
                        if (in_array($catidd, $categories)) {
                            $percentage = $fetchVar['price_euro'] / 100 * 15;
                            $amount = $fetchVar['price_euro'] - $percentage;
                            $price = number_format((float)$amount, 2, '.', '');
                        }
                    } else {
                        $percentage = $fetchVar['price_euro'] / 100 * $percent;
                        $amount = $fetchVar['price_euro'] - $percentage;
                        $price = number_format((float)$amount, 2, '.', '');
                    }
                } else {
                    $percentage = $fetchVar['price_euro'] / 100 * $percent;
                    $amount = $fetchVar['price_euro'] - $percentage;
                    $price = number_format((float)$amount, 2, '.', '');
                }
            } else {
                if (isset($_SESSION['user_id'])) {
                    $select = mysqli_query($con, "SELECT * FROM `category` WHERE name LIKE '%Accessories%'");
                    if (mysqli_num_rows($select) > 0) {
                        $fetche = mysqli_fetch_array($select);
                        $catidd = $fetche["id"];
                    }
                    if ($fetchSession["points_status"] == "Goddess") {
                        if (in_array($catidd, $categories)) {
                            $percentage = $fetchVar['price_usd'] / 100 * 15;
                            $amount = $fetchVar['price_usd'] - $percentage;
                            $price = number_format((float)$amount, 2, '.', '');
                        }
                    } elseif ($fetchSession["points_status"] == "Nymph") {
                        if (in_array($catidd, $categories)) {
                            $percentage = $fetchVar['price_usd'] / 100 * 15;
                            $amount = $fetchVar['price_usd'] - $percentage;
                            $price = number_format((float)$amount, 2, '.', '');
                        }
                    } else {
                        $percentage = $fetchVar['price_usd'] / 100 * $percent;
                        $amount = $fetchVar['price_usd'] - $percentage;
                        $price = number_format((float)$amount, 2, '.', '');
                    }
                } else {
                    $percentage = $fetchVar['price_usd'] / 100 * $percent;
                    $amount = $fetchVar['price_usd'] - $percentage;
                    $price = number_format((float)$amount, 2, '.', '');
                }
            }
            $qrty += $fetchCart['qty'];
            $subtotal = $amount * $fetchCart['qty'];
            $pricesubtotal += $subtotal;
        }
        if (isset($_SESSION['user_id'])) {
            if ($pricesubtotal > 40) {
                $grand_total_simple = $pricesubtotal;
            } else {
                $grand_total_simple = $pricesubtotal / 100 * $websitefetch['gst'] + $pricesubtotal;
            }
            if ($_SESSION['currency'] == "dollar") {
                $pous = "$" .number_format((float)$pricesubtotal, 2, '.', '');
                $grandtotal = "$" . number_format((float)$grand_total_simple, 2, '.', '');
            } elseif ($_SESSION['currency'] == "pound") {
                $pous = "£" .number_format((float)$pricesubtotal, 2, '.', '');
                $grandtotal = "£" . number_format((float)$grand_total_simple, 2, '.', '');
            } elseif ($_SESSION['currency'] == "cad") {
                $pous = "$" .number_format((float)$pricesubtotal, 2, '.', '');
                $grandtotal = "$" . number_format((float)$grand_total_simple, 2, '.', '');
            } elseif ($_SESSION['currency'] == "euro") {
                $pous = "€" .number_format((float)$pricesubtotal, 2, '.', '');
                $grandtotal = "€" . number_format((float)$grand_total_simple, 2, '.', '');
            } else {
                $pous = "$" .number_format((float)$pricesubtotal, 2, '.', '');
                $grandtotal = "$" . number_format((float)$grand_total_simple, 2, '.', '');
            }
        } else {
            $grand_total_simple = $pricesubtotal / 100 * $websitefetch['gst'] + $pricesubtotal;
            $_SESSION['grand_total_simple'] = $grand_total_simple;
            if ($_SESSION['currency'] == "dollar") {
                $pous = "$" .number_format((float)$pricesubtotal, 2, '.', '');
                $grandtotal = "$" . number_format((float)$grand_total_simple, 2, '.', '');
            } elseif ($_SESSION['currency'] == "pound") {
                $pous = "£" .number_format((float)$pricesubtotal, 2, '.', '');
                $grandtotal = "£" . number_format((float)$grand_total_simple, 2, '.', '');
            } elseif ($_SESSION['currency'] == "cad") {
                $pous = "$" .number_format((float)$pricesubtotal, 2, '.', '');
                $grandtotal = "$" . number_format((float)$grand_total_simple, 2, '.', '');
            } elseif ($_SESSION['currency'] == "euro") {
                $pous = "€" .number_format((float)$pricesubtotal, 2, '.', '');
                $grandtotal = "€" . number_format((float)$grand_total_simple, 2, '.', '');
            } else {
                $pous = "$" .number_format((float)$pricesubtotal, 2, '.', '');
                $grandtotal = "$" . number_format((float)$grand_total_simple, 2, '.', '');
            }
        }
    }
    ?>
  <style>
      .fa-linkedin:before {
          content: "in";
          font-size: large;
      }
      .social-sharing ul .linkedin a:hover {
          /*color: #A89842;*/
          background: #04669A;
      }
  </style>
  <button class="cart-icon" data-bs-toggle="dropdown">
      <i class="fa fa-shopping-basket"></i>
      <span class="item_txt"> <?= content(14) ?></span>
      <span class="item_count">(<?= $qrty ?>)</span>
      <span class="item_total">- <?= $grandtotal ?></span>
  </button>
  <div class="header-cart dropdown-menu">
      <ul>
          <?php
            $selectCart = mysqli_query($con, "SELECT * from cart where ip='$ip' and status=0 order by id desc LIMIT 0,2");
            if (mysqli_num_rows($selectCart) > 0) {
                while ($fetchCart = mysqli_fetch_array($selectCart)) {
                    $colorid = $fetchCart['color_id'];
                    $weightid = $fetchCart['weight_id'];
                    $sizeid = $fetchCart['size_id'];
                    $lengthid = $fetchCart['length_id'];
                    $pid = $fetchCart['p_id'];
                    $selectVar = mysqli_query($con, "SELECT products.img,products.link,products.title,variation_product.* FROM `variation_product`,products WHERE products.id=variation_product.p_id and variation_product.color_id='$colorid' and variation_product.size_id='$sizeid' and variation_product.p_id='$pid' ");
                    $fetchVar = mysqli_fetch_array($selectVar);
                    $sizevarquery = mysqli_query($con, "SELECT * FROM size_variation where id='$sizeid'");
                    $lengthvarquery = mysqli_query($con, "SELECT * FROM length_variation where id='$lengthid'");
                    $colorvarquery = mysqli_query($con, "SELECT * FROM color_variation where id='$colorid'");
                    $capacityvarquery = mysqli_query($con, "SELECT * FROM weight_variation where id='$weightid'");
            ?>
                  <li>
                      <div class="img_content">
                          <img class="product-image img-responsive" src="<?= $url ?>uploads/products/<?= $fetchVar['img'] ?>" alt="" title="" style="width: 60px;">
                          <span class="product-quantity"><?= $fetchCart['qty'] ?>x</span>
                      </div>
                      <div class="right_block">
                          <span class="product-name"><?= @$fetchVar['title'] ?></span>
                          <span class="product-price">
                              <?php
                                $percent = @$fetchVar['percentage'];
                                if ($_SESSION['currency'] == "dollar") {
                                    if (isset($_SESSION['user_id'])) {
                                        $select = mysqli_query($con, "SELECT * FROM `category` WHERE name LIKE '%Accessories%'");
                                        if (mysqli_num_rows($select) > 0) {
                                            $fetche = mysqli_fetch_array($select);
                                            $catidd = $fetche["id"];
                                        }
                                        if ($fetchSession["points_status"] == "Goddess") {
                                            if (in_array($catidd, $categories)) {
                                                $percentage = $fetchVar['price_usd'] / 100 * 15;
                                                $amount = $fetchVar['price_usd'] - $percentage;
                                                $price = number_format((float)$amount, 2, '.', '');
                                            }
                                        } elseif ($fetchSession["points_status"] == "Nymph") {
                                            if (in_array($catidd, $categories)) {
                                                $percentage = $fetchVar['price_usd'] / 100 * 15;
                                                $amount = $fetchVar['price_usd'] - $percentage;
                                                $price = number_format((float)$amount, 2, '.', '');
                                            }
                                        } else {
                                            $percentage = $fetchVar['price_usd'] / 100 * $percent;
                                            $amount = $fetchVar['price_usd'] - $percentage;
                                            $price = number_format((float)$amount, 2, '.', '');
                                        }
                                    } else {
                                        $percentage = $fetchVar['price_usd'] / 100 * $percent;
                                        $amount = $fetchVar['price_usd'] - $percentage;
                                        $price = number_format((float)$amount, 2, '.', '');
                                    }
                                } elseif ($_SESSION['currency'] == "euro") {
                                    if (isset($_SESSION['user_id'])) {
                                        $select = mysqli_query($con, "SELECT * FROM `category` WHERE name LIKE '%Accessories%'");
                                        if (mysqli_num_rows($select) > 0) {
                                            $fetche = mysqli_fetch_array($select);
                                            $catidd = $fetche["id"];
                                        }
                                        if ($fetchSession["points_status"] == "Goddess") {
                                            if (in_array($catidd, $categories)) {
                                                $percentage = $fetchVar['price_euro'] / 100 * 15;
                                                $amount = $fetchVar['price_euro'] - $percentage;
                                                $price = number_format((float)$amount, 2, '.', '');
                                            }
                                        } elseif ($fetchSession["points_status"] == "Nymph") {
                                            if (in_array($catidd, $categories)) {
                                                $percentage = $fetchVar['price_euro'] / 100 * 15;
                                                $amount = $fetchVar['price_euro'] - $percentage;
                                                $price = number_format((float)$amount, 2, '.', '');
                                            }
                                        } else {
                                            $percentage = $fetchVar['price_euro'] / 100 * $percent;
                                            $amount = $fetchVar['price_euro'] - $percentage;
                                            $price = number_format((float)$amount, 2, '.', '');
                                        }
                                    } else {
                                        $percentage = $fetchVar['price_euro'] / 100 * $percent;
                                        $amount = $fetchVar['price_euro'] - $percentage;
                                        $price = number_format((float)$amount, 2, '.', '');
                                    }
                                } else {
                                    if (isset($_SESSION['user_id'])) {
                                        $select = mysqli_query($con, "SELECT * FROM `category` WHERE name LIKE '%Accessories%'");
                                        if (mysqli_num_rows($select) > 0) {
                                            $fetche = mysqli_fetch_array($select);
                                            $catidd = $fetche["id"];
                                        }
                                        if ($fetchSession["points_status"] == "Goddess") {
                                            if (in_array($catidd, $categories)) {
                                                $percentage = $fetchVar['price_usd'] / 100 * 15;
                                                $amount = $fetchVar['price_usd'] - $percentage;
                                                $price = number_format((float)$amount, 2, '.', '');
                                            }
                                        } elseif ($fetchSession["points_status"] == "Nymph") {
                                            if (in_array($catidd, $categories)) {
                                                $percentage = $fetchVar['price_usd'] / 100 * 15;
                                                $amount = $fetchVar['price_usd'] - $percentage;
                                                $price = number_format((float)$amount, 2, '.', '');
                                            }
                                        } else {
                                            $percentage = $fetchVar['price_usd'] / 100 * $percent;
                                            $amount = $fetchVar['price_usd'] - $percentage;
                                            $price = number_format((float)$amount, 2, '.', '');
                                        }
                                    } else {
                                        $percentage = $fetchVar['price_usd'] / 100 * $percent;
                                        $amount = $fetchVar['price_usd'] - $percentage;
                                        $price = number_format((float)$amount, 2, '.', '');
                                    }
                                }
                                $subtotal = $amount * $fetchCart['qty'];
                                // $pricesubtotal += $subtotal;
                                if ($_SESSION['currency'] == "dollar") {
                                    echo number_format((float)$subtotal, 2, '.', '') . "$";
                                } elseif ($_SESSION['currency'] == "euro") {
                                    echo number_format((float)$subtotal, 2, '.', '') . "€";
                                } else {
                                    echo number_format((float)$subtotal, 2, '.', '') . "$";
                                }
                                ?>
                          </span>
                          <a href="javascript:void(0)" class="remove-from-cart removecart" id="<?= $fetchCart['id'] ?>"> <i class="fa fa-remove pull-xs-left"></i></a>
                          <div class="attributes_content">
                              <?php
                                if (mysqli_num_rows($sizevarquery) > 0) {
                                    $sizevarfetch = mysqli_fetch_array($sizevarquery);
                                ?>
                                  <span><strong>Size</strong>: <?= $sizevarfetch["variation"] ?></span><br>
                              <?php
                                }
                                if (mysqli_num_rows($lengthvarquery) > 0) {
                                    $lengthvarfetch = mysqli_fetch_array($lengthvarquery);
                                ?>
                                  <span><strong>Length</strong>: <?= $lengthvarfetch["variation"] ?></span><br>
                              <?php
                                }
                                if (mysqli_num_rows($colorvarquery) > 0) {
                                    $colorvarfetch = mysqli_fetch_array($colorvarquery);
                                ?>
                                  <span><strong>Color</strong>: <?= $colorvarfetch["variation"] ?></span><br>
                              <?php
                                }
                                if (mysqli_num_rows($capacityvarquery) > 0) {
                                    $capacityvarfetch = mysqli_fetch_array($capacityvarquery);
                                ?>
                                  <span><strong>Capacity</strong>: <?= $capacityvarfetch["variation"] ?></span><br>
                              <?php
                                }
                                ?>
                          </div>
                      </div>
                  </li>
          <?php }
            } ?>
      </ul>
      <div class="price_content">
          <div class="cart-subtotals">
              <div class="products price_inline d-none">
                  <span class="label">Subtotal</span>
                  <span class="value">
                      <?= $pous ?></span>
              </div>
              <div class=" price_inline">
                  <span class="label"></span>
                  <span class="value"></span>
              </div>
              <div class="tax price_inline">
                  <span class="label">frais de livraison </span>
                  <span class="value">
                      <?php


                    $select_shipping = mysqli_query($con,"SELECT * FROM `shipping_addres` where id = 1");
                    $fetch_shipping = mysqli_fetch_array($select_shipping);
                    echo '€'.$fetch_shipping['shipping_price'];
                        // if (isset($_SESSION['user_id'])) {
                        //     if ($pricesubtotal > 40) {
                        //         echo "Free";
                        //     } else {
                        //         echo $websitefetch['gst'] . "%";
                        //     }
                        // } else {
                        //     echo $websitefetch['gst'] . "%";
                        // }
                        ?></span>
              </div>
          </div>
          <div class="cart-total price_inline">
              <span class="label">Total</span>
              <span class="value"><?php 
              $pous1 = ltrim($pous, '€');
              $stotal = $pous1 + $fetch_shipping['shipping_price'];
              echo '€'.$stotal;
            //   $grandtotal 
              ?></span>
          </div>
      </div>
      <div class="checkout">
          <a href="<?= $url ?>cart" class="btn btn-primary">Voir panier </a>
      </div>
  </div>