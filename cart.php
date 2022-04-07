<?php 
include_once 'header.php';
if (isset($_GET["remove"])) {
    $id = base64_decode($_GET["remove"]);
    $delete = mysqli_query($con, "DELETE FROM `cart` WHERE id='$id'");
    if ($delete) {
        echo "<script>window.open('cart','_self')</script>";
    } else {
        echo "wrong";
    }
}
?>
        <!-- Breadcrumbs Section Start -->
		<div class="rs-breadcrumbs sec-color">
            <img src="<?=$url?>frontassets/images/breadcrumbs/cheak-out.jpg" alt="Breadcrubs" />
            <div class="breadcrumbs-inner">
    			<div class="container">
    				<div class="row">
    					<div class="col-md-12 text-center">
    						<h1 class="page-title">Cart</h1>
    						<ul>
    							<li>
    								<a class="active" href="<?=$url?>">Home</a>
    							</li>
    							<li>Cart</li>
    						</ul>
    					</div>
    				</div>
    			</div>
            </div>
		</div>
		<!-- Breadcrumbs Section End -->


		<!-- Cart Page Start Here -->
        <div class="shipping-area sec-spacer">
			<div class="container">
				<div class="row">
					<div class="tab-content">
						<form id="updatecart">
						<div role="tabpane4" class="tab-pane active" id="checkout">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							
								<div class="product-list">
									<table>
								

					<?php
                        $pricesubtotal = 0;
                        $ip = $_SERVER['REMOTE_ADDR'];
                        $selectCart = mysqli_query($con, "SELECT * from cart where ip='$ip' and status=0 order by id desc ");
                        while ($fetchCart = mysqli_fetch_array($selectCart)) {
                            $colorid = $fetchCart['color_id'];
                            $sizeid = $fetchCart['size_id'];
                            $pid = $fetchCart['p_id'];
                            $selectVar = mysqli_query($con, "SELECT products.img,products.category,products.link,products.title,variation_product.* FROM `variation_product` LEFT JOIN products on products.id=variation_product.p_id where variation_product.color_id='$colorid' and variation_product.size_id='$sizeid' and variation_product.p_id='$pid'");
                            $fetchVar = mysqli_fetch_array($selectVar);
                            $categories = explode(",", $fetchVar["category"]);
                        ?>
                            <tr id="row-<?= $fetchCart['id'] ?>">
							<td class="product-remove"> <a href="?remove=<?= base64_encode($fetchCart['id']) ?>"><i class="fa fa-times" aria-hidden="true"></i></a></td>


                                <td class="product-thumbnail">
                                    <input type="hidden" value="<?= $fetchCart['id'] ?>" name="cartid[]">
                                    <a href="<?= $url ?>product-details/<?= $fetchVar["link"] ?>"><img src="<?= $url ?>uploads/products/<?= $fetchVar['img'] ?>" alt="cart-image"></a>
                                </td>
                                <td class="product-name"><?= $fetchVar['title'] ?></td>
                                <td class="product-price">
                                    <span class="amount">
                                        <?php
                                        $percent = $fetchVar['percentage'];
                                      
                                         
                                                $percentage = $fetchVar['price_usd'] / 100 * $percent;
                                                $amount = $fetchVar['price_usd'] - $percentage;
                                                $price = number_format((float)$amount, 2, '.', '');
                                           
                                            echo   $price . "£";
                                      
                                        ?>
                                    </span>
                                </td>
                                <td class="product-quantity">
								<div class="order-pro order1">	
								<input type="number" onchange="qty_item(this)" name="qty[]" data-id="<?= $fetchCart['id'] ?>" data- value="<?= $fetchCart['qty'] ?>" min="1">
								</div>
							</td>
                                <td class="product-subtotal">
                                    <?php
                                    $subtotal = $amount * $fetchCart['qty'];
                                    $pricesubtotal += $subtotal;
                                    
                                        echo number_format((float)$subtotal, 2, '.', '') . "£";
                                   
                                    ?></td>
                                
                            </tr>
                        <?php } ?>
			
				</table>
				
								</div>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<div class="order-list">
							
								<div class="coupon-fields buttons-cart">

								<input type="submit" class="apply-coupon button button-default button-default-size button" value="Update Cart">
                       			 <a href="<?= $url ?>" class="apply-coupon button button-default button-default-size button">Continue Shopping</a>
									
								</div>
							</div>
						</div>
						</form>
						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<div class="order-list checkout-price">
								<h3>Your Order</h3>
								<table>
									<tr class="cart-subtotal">
										<td><b>Product</b></td>
										<td><b>Total</b></td>
									</tr>
									<tr class="row-bold">
										<td>Subtotal</td>
										<td><?php
                                            if (isset($_SESSION['user_id'])) {
                                                if ($pricesubtotal > 40) {
                                                    $grand_total_simple = $pricesubtotal;
                                                } else {
                                                    $grand_total_simple = $pricesubtotal / 100 * $websitefetch['gst'] + $pricesubtotal;
                                                }
                                                $_SESSION['grand_total_simple'] = $grand_total_simple;
                                                
                                                    echo number_format((float)$pricesubtotal, 2, '.', '') . "£";
                                                    $grandtotal = number_format((float)$grand_total_simple, 2, '.', '') . "£";
                                               
                                            } else {
                                                $grand_total_simple = $pricesubtotal / 100 * $websitefetch['gst'] + $pricesubtotal;
                                                $_SESSION['grand_total_simple'] = $grand_total_simple;
                                               
                                                    echo number_format((float)$pricesubtotal, 2, '.', '') . "£";
                                                    $grandtotal = number_format((float)$grand_total_simple, 2, '.', '');
                                                
                                            }
                                            ?>
											</td>
									</tr>
									<tr class="row-bold">
										<td><?= content(120) ?></td>
										<td><?php
                                            if (isset($_SESSION['user_id'])) {
                                                if ($pricesubtotal > 40) {
                                                    echo "Free";
                                                } else {
                                                    echo $websitefetch['gst'] . "%";
                                                }
                                            } else {
                                                echo $websitefetch['gst'] . "%";
                                            }
                                            ?></td>
									</tr>
									<tr class="row-bold">
										<td><?= content(410) ?></td>
										<td><?php
                                        $select_shipping = mysqli_query($con,"SELECT * FROM `shipping_addres` where id = 1");
                                        $fetch_shipping = mysqli_fetch_array($select_shipping);
                                        echo $fetch_shipping['shipping_price'].'£';
                                         ?></td>
									</tr>
									<tr class="row-bold">
                                    <td><?= content(90) ?></td>
                                    <td>
                                        <?php 
                                        $grandtotal1 = rtrim($grandtotal, '£');
                                        $stotal = $grandtotal1 + $fetch_shipping['shipping_price'];
                                        echo $stotal.'£';
                                        // $grandtotal
                                         ?>
                                    </td>
                                </tr>
								</table>
								<div class="next-step">
								<a href="<?=$url?>checkout"><?= content(91) ?></a>
								</div>
							</div>
						</div>                           
					</div>                                 
				</div>
			</div>
		</div>
        <!-- Cart Page End Here  -->
		
<?php 
include_once 'footer.php';
?>
<script src="<?=$url?>admin/assets/js/customize.js"></script>