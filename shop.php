<?php 
include_once 'header.php';
?>
        
        <!-- Breadcrumbs Section Start -->
		<div class="rs-breadcrumbs sec-color">
            <img src="<?=$url?>frontassets/images/breadcrumbs/shop.jpg" alt="Breadcrubs" />
            <div class="breadcrumbs-inner">
    			<div class="container">
    				<div class="row">
    					<div class="col-md-12 text-center">
    						<h1 class="page-title">Our Shop</h1>
    						<ul>
    							<li>
    								<a class="active" href="<?=$url?>">Home</a>
    							</li>
    							<li>Shop</li>
    						</ul>
    					</div>
    				</div>
    			</div>
            </div>
		</div>
		<!-- Breadcrumbs Section End -->


		<!-- Our Products Start Here-->
		<div class="our-products-section our-products-page sec-spacer">
			<div class="container">
				<div class="row">
                <?php
                                $curr = date("Y-m-d");
                                $days_ago = date('Y-m-d', strtotime('-15 days', strtotime($curr)));
                                $q = "SELECT products.*,variation_product.price_usd,variation_product.price_euro,variation_product.percentage,variation_product.stock FROM `variation_product`,products WHERE products.id=variation_product.p_id";
                                if (isset($_GET["link"])) {
                                    $getlink = explode("-", $_GET["link"]);
                                    $shopname = $getlink[0];
                                    $shopid = $getlink[1];
                                    if ($shopname == "color") {
                                        $color = $shopid;
                                        $q .= " and variation_product.color_id ='$color' GROUP BY variation_product.p_id ORDER BY products.id DESC";
                                    } elseif ($shopname == "search") {
                                        $search = strtolower($shopid);
                                        $q .= " and products.title LIKE '%$search%' GROUP BY variation_product.p_id ORDER BY products.id DESC";
                                    } elseif ($shopname == "size") {
                                        $size = $shopid;
                                        $q .= " and variation_product.size_id ='$size' GROUP BY variation_product.p_id ORDER BY products.id DESC";
                                    } elseif ($shopname == "length") {
                                        $length = $shopid;
                                        $q .= " and variation_product.length_id ='$length' GROUP BY variation_product.p_id ORDER BY products.id DESC";
                                    } elseif ($shopname == "capacity") {
                                        $weight = $shopid;
                                        $q .= " and variation_product.weight_id ='$weight' GROUP BY variation_product.p_id ORDER BY products.id DESC";
                                    } elseif ($shopname == "category") {
                                        $category = $shopid;
                                        $q .= " and $category IN (products.category) GROUP BY variation_product.p_id ORDER BY products.id DESC";
                                    } elseif ($shopname == "price") {
                                        $min_price = $getlink[1];
                                        $max_price = $getlink[2];
                                        if ($_SESSION['currency'] == "dollar") {
                                            $q .= " and variation_product.price_usd BETWEEN '$min_price' AND '$max_price' GROUP BY variation_product.p_id ORDER BY products.id DESC";
                                        } elseif ($_SESSION['currency'] == "euro") {
                                            $q .= " and variation_product.price_euro BETWEEN '$min_price' AND '$max_price' GROUP BY variation_product.p_id ORDER BY products.id DESC";
                                        }
                                    } elseif ($shopname == "sort") {
                                        $sort = $shopid;
                                        if ($sort == "date") {
                                            $q .= " and products.created_date >= '$days_ago' GROUP BY variation_product.p_id ORDER BY products.id DESC";
                                        } elseif ($sort == "price") {
                                            if ($_SESSION['currency'] == "dollar") {
                                                $q .= " GROUP BY variation_product.p_id ORDER BY MAX(variation_product.price_usd) ASC";
                                            } elseif ($_SESSION['currency'] == "euro") {
                                                $q .= " GROUP BY variation_product.p_id ORDER BY MAX(variation_product.price_euro) ASC";
                                            }
                                        } elseif ($sort == "price-desc") {
                                            if ($_SESSION['currency'] == "dollar") {
                                                $q .= " GROUP BY variation_product.p_id ORDER BY MAX(variation_product.price_usd) DESC";
                                            } elseif ($_SESSION['currency'] == "euro") {
                                                $q .= " GROUP BY variation_product.p_id ORDER BY MAX(variation_product.price_euro) DESC";
                                            }
                                        } elseif ($sort == "asc") {
                                            $q .= " GROUP BY variation_product.p_id ORDER BY products.id ASC";
                                        } elseif ($sort == "desc") {
                                            $q .= " GROUP BY variation_product.p_id ORDER BY products.id DESC";
                                        }
                                    } else {
                                        $q .= " GROUP BY variation_product.p_id ORDER BY products.id DESC";
                                    }
                                } else {
                                    $q .= " GROUP BY variation_product.p_id ORDER BY products.id DESC";
                                }
                                $query = mysqli_query($con, $q);
                                while ($fetch = mysqli_fetch_array($query)) {
                                    $categories = explode(",", $fetch["category"]);
                                ?>
					<div class="col-md-3 col-sm-6 col-xs-6">
						<div class="single-product text-center">
							<div class="product-image">
								<div class="overly"></div>
								<a href="#"><img src="<?= $url . "uploads/products/" . $fetch["img"] ?>" alt="Product" style="width: 100%;height: 290px;object-fit: cover;"/></a>
							</div>
							<div class="product-details">
                                <div class="product-tile">
                                    <a href="<?= $url ?>product-details/<?= $fetch["link"] ?>" class="product-text" title="<?= $fetch["title"] ?>"><?= $fetch["title"] ?></a>

                                    <?php 
                                    
                                        $productprice =   number_format((float)$fetch['price_usd'], 2, '.', '') . "£";
                                        $percentage = $fetch['price_usd'] / 100 * $fetch["percentage"];
                                        $amount = $fetch['price_usd'] - $percentage;
                                       
                                        $discountprice =   number_format((float)$amount, 2, '.', '') . "£";
                                        if($productprice != $discountprice) {
                                    ?>
                                    <span><?= $productprice ?></span>
                                    <?php }?>
                                    <span><?= $discountprice ?></span>
                                </div>
                                <div class="product-cart">
                                    <a href="<?= $url ?>product-details/<?= $fetch["link"] ?>"><i class="fa fa-shopping-cart"></i> View Detail</a>
                                </div>
                            </div>
						</div>
					</div>
                    <?php } ?>
					
				</div>
                <!-- <div class="row">
                    <div class="col-sm-12">
                        <div class="default-pagination text-center">
                            <ul>
                                <li><a href="#"><i class="fa fa-angle-left"></i>Previous</a></li>
                                <li class="active"><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#">5</a></li>
                                <li><a href="#">Next<i class="fa fa-angle-right"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div> -->
			</div>
		</div>
		<!-- Our Products end Here-->

      
<?php 
include_once 'footer.php';
?>