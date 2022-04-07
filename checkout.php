<?php
include_once 'header.php';
$select_shipping = mysqli_query($con,"SELECT * FROM `shipping_addres` where id = 1");
$fetch_shipping = mysqli_fetch_array($select_shipping);
?>

<!-- Breadcrumbs Section Start -->
<div class="rs-breadcrumbs sec-color">
	<img src="<?= $url ?>frontassets/images/breadcrumbs/cheak-out.jpg" alt="Breadcrubs" />
	<div class="breadcrumbs-inner">
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center">
					<h1 class="page-title">Check Out</h1>
					<ul>
						<li>
							<a class="active" href="<?=$url?>">Home</a>
						</li>
						<li>Check Out</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="invoicemodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Payment Success !</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <p>Thank You for your order will deliver soon. </p>
      <div id="my_invoicesss">
      
      </div>
					
			
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>

<!-- Breadcrumbs Section End -->
<!-- News Section Start Here-->
<div class="rs-check-out sec-spacer">
	<div class="container">
		<div class="row">
            <form class="form-register"  id="payment-form" method="post">
            <input type="hidden" value="back" id="design">
                                        <input type="hidden" id="page" value="paymentss">
			<div class="col-md-8">
				<h2 class="title-bg">Billing Details</h2>
				<div class="check-out-box">
					
          <div class="row">
          <?php
                if (!isset($_SESSION["user_id"])) {
                ?>
                    <!-- ACCORDION START -->
                    <h6 style="padding-left: 15px;padding-right: 15px;"><?= content(45) ?> <span><a href="<?= $url ?>login?redirect=<?= base64_encode("checkout") ?>"> <?= content(129) ?></a></span></h6>
                    <!-- ACCORDION END -->
                <?php } ?>
          </div>
                <fieldset>
                    <div class="row">
                    <?php
                if (!isset($_SESSION["user_id"])) {
                ?>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label><?= content(142) ?>*</label>
                                <input type="text" class="form-control" id="f-name" name="firstname" placeholder="First Name">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label><?= content(143) ?>*</label>
                                <input type="text" class="form-control" id="l-name" name="lastname" placeholder="Last Name">
                            </div>
                        </div>
                    </div>
                    <div class="row">
						<div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label><?= content(147) ?>*</label>
                                <input type="text" name="phone" class="form-control" id="phone" placeholder="Telephone">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label><?= content(144) ?>*</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                            </div>
                        </div>
                        
                    </div>
                    <div class="row">
                      
                     
						<div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label><?= content(150) ?>*</label>
                                <input type="password" class="form-control" id="pwd" name="pass" placeholder="Password">
                            </div>
                        </div>
						<div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label><?= content(153) ?>*</label>
                                <input type="text" class="form-control" id="address" name="address" placeholder="Address">
                            </div>
                        </div>
                    </div>
                 
                    <div class="row">
                        
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label><?= content(154) ?> *</label>
                                <select class="form-control" id="country" name="country">
                                    <option selected="" disabled="">-- Select Country --</option>
                                    <option value="Afganistan">Afghanistan</option>
                                    <option value="Albania">Albania</option>
                                    <option value="Algeria">Algeria</option>
                                    <option value="American Samoa">American Samoa</option>
                                    <option value="Andorra">Andorra</option>
                                    <option value="Angola">Angola</option>
                                    <option value="Anguilla">Anguilla</option>
                                    <option value="Antigua &amp; Barbuda">Antigua &amp; Barbuda</option>
                                    <option value="Argentina">Argentina</option>
                                    <option value="Armenia">Armenia</option>
                                    <option value="Aruba">Aruba</option>
                                    <option value="Australia">Australia</option>
                                    <option value="Austria">Austria</option>
                                    <option value="Azerbaijan">Azerbaijan</option>
                                    <option value="Bahamas">Bahamas</option>
                                    <option value="Bahrain">Bahrain</option>
                                    <option value="Bangladesh">Bangladesh</option>
                                    <option value="Barbados">Barbados</option>
                                    <option value="Belarus">Belarus</option>
                                    <option value="Belgium">Belgium</option>
                                    <option value="Belize">Belize</option>
                                    <option value="Benin">Benin</option>
                                    <option value="Bermuda">Bermuda</option>
                                    <option value="Bhutan">Bhutan</option>
                                    <option value="Bolivia">Bolivia</option>
                                    <option value="Bonaire">Bonaire</option>
                                    <option value="Bosnia &amp; Herzegovina">Bosnia &amp; Herzegovina</option>
                                    <option value="Botswana">Botswana</option>
                                    <option value="Brazil">Brazil</option>
                                    <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
                                    <option value="Brunei">Brunei</option>
                                    <option value="Bulgaria">Bulgaria</option>
                                    <option value="Burkina Faso">Burkina Faso</option>
                                    <option value="Burundi">Burundi</option>
                                    <option value="Cambodia">Cambodia</option>
                                    <option value="Cameroon">Cameroon</option>
                                    <option value="Canada">Canada</option>
                                    <option value="Canary Islands">Canary Islands</option>
                                    <option value="Cape Verde">Cape Verde</option>
                                    <option value="Cayman Islands">Cayman Islands</option>
                                    <option value="Central African Republic">Central African Republic</option>
                                    <option value="Chad">Chad</option>
                                    <option value="Channel Islands">Channel Islands</option>
                                    <option value="Chile">Chile</option>
                                    <option value="China">China</option>
                                    <option value="Christmas Island">Christmas Island</option>
                                    <option value="Cocos Island">Cocos Island</option>
                                    <option value="Colombia">Colombia</option>
                                    <option value="Comoros">Comoros</option>
                                    <option value="Congo">Congo</option>
                                    <option value="Cook Islands">Cook Islands</option>
                                    <option value="Costa Rica">Costa Rica</option>
                                    <option value="Cote DIvoire">Cote DIvoire</option>
                                    <option value="Croatia">Croatia</option>
                                    <option value="Cuba">Cuba</option>
                                    <option value="Curaco">Curacao</option>
                                    <option value="Cyprus">Cyprus</option>
                                    <option value="Czech Republic">Czech Republic</option>
                                    <option value="Denmark">Denmark</option>
                                    <option value="Djibouti">Djibouti</option>
                                    <option value="Dominica">Dominica</option>
                                    <option value="Dominican Republic">Dominican Republic</option>
                                    <option value="East Timor">East Timor</option>
                                    <option value="Ecuador">Ecuador</option>
                                    <option value="Egypt">Egypt</option>
                                    <option value="El Salvador">El Salvador</option>
                                    <option value="Equatorial Guinea">Equatorial Guinea</option>
                                    <option value="Eritrea">Eritrea</option>
                                    <option value="Estonia">Estonia</option>
                                    <option value="Ethiopia">Ethiopia</option>
                                    <option value="Falkland Islands">Falkland Islands</option>
                                    <option value="Faroe Islands">Faroe Islands</option>
                                    <option value="Fiji">Fiji</option>
                                    <option value="Finland">Finland</option>
                                    <option value="France">France</option>
                                    <option value="French Guiana">French Guiana</option>
                                    <option value="French Polynesia">French Polynesia</option>
                                    <option value="French Southern Ter">French Southern Ter</option>
                                    <option value="Gabon">Gabon</option>
                                    <option value="Gambia">Gambia</option>
                                    <option value="Georgia">Georgia</option>
                                    <option value="Germany">Germany</option>
                                    <option value="Ghana">Ghana</option>
                                    <option value="Gibraltar">Gibraltar</option>
                                    <option value="Great Britain">Great Britain</option>
                                    <option value="Greece">Greece</option>
                                    <option value="Greenland">Greenland</option>
                                    <option value="Grenada">Grenada</option>
                                    <option value="Guadeloupe">Guadeloupe</option>
                                    <option value="Guam">Guam</option>
                                    <option value="Guatemala">Guatemala</option>
                                    <option value="Guinea">Guinea</option>
                                    <option value="Guyana">Guyana</option>
                                    <option value="Haiti">Haiti</option>
                                    <option value="Hawaii">Hawaii</option>
                                    <option value="Honduras">Honduras</option>
                                    <option value="Hong Kong">Hong Kong</option>
                                    <option value="Hungary">Hungary</option>
                                    <option value="Iceland">Iceland</option>
                                    <option value="Indonesia">Indonesia</option>
                                    <option value="India">India</option>
                                    <option value="Iran">Iran</option>
                                    <option value="Iraq">Iraq</option>
                                    <option value="Ireland">Ireland</option>
                                    <option value="Isle of Man">Isle of Man</option>
                                    <option value="Israel">Israel</option>
                                    <option value="Italy">Italy</option>
                                    <option value="Jamaica">Jamaica</option>
                                    <option value="Japan">Japan</option>
                                    <option value="Jordan">Jordan</option>
                                    <option value="Kazakhstan">Kazakhstan</option>
                                    <option value="Kenya">Kenya</option>
                                    <option value="Kiribati">Kiribati</option>
                                    <option value="Korea North">Korea North</option>
                                    <option value="Korea Sout">Korea South</option>
                                    <option value="Kuwait">Kuwait</option>
                                    <option value="Kyrgyzstan">Kyrgyzstan</option>
                                    <option value="Laos">Laos</option>
                                    <option value="Latvia">Latvia</option>
                                    <option value="Lebanon">Lebanon</option>
                                    <option value="Lesotho">Lesotho</option>
                                    <option value="Liberia">Liberia</option>
                                    <option value="Libya">Libya</option>
                                    <option value="Liechtenstein">Liechtenstein</option>
                                    <option value="Lithuania">Lithuania</option>
                                    <option value="Luxembourg">Luxembourg</option>
                                    <option value="Macau">Macau</option>
                                    <option value="Macedonia">Macedonia</option>
                                    <option value="Madagascar">Madagascar</option>
                                    <option value="Malaysia">Malaysia</option>
                                    <option value="Malawi">Malawi</option>
                                    <option value="Maldives">Maldives</option>
                                    <option value="Mali">Mali</option>
                                    <option value="Malta">Malta</option>
                                    <option value="Marshall Islands">Marshall Islands</option>
                                    <option value="Martinique">Martinique</option>
                                    <option value="Mauritania">Mauritania</option>
                                    <option value="Mauritius">Mauritius</option>
                                    <option value="Mayotte">Mayotte</option>
                                    <option value="Mexico">Mexico</option>
                                    <option value="Midway Islands">Midway Islands</option>
                                    <option value="Moldova">Moldova</option>
                                    <option value="Monaco">Monaco</option>
                                    <option value="Mongolia">Mongolia</option>
                                    <option value="Montserrat">Montserrat</option>
                                    <option value="Morocco">Morocco</option>
                                    <option value="Mozambique">Mozambique</option>
                                    <option value="Myanmar">Myanmar</option>
                                    <option value="Nambia">Nambia</option>
                                    <option value="Nauru">Nauru</option>
                                    <option value="Nepal">Nepal</option>
                                    <option value="Netherland Antilles">Netherland Antilles</option>
                                    <option value="Netherlands">Netherlands (Holland, Europe)</option>
                                    <option value="Nevis">Nevis</option>
                                    <option value="New Caledonia">New Caledonia</option>
                                    <option value="New Zealand">New Zealand</option>
                                    <option value="Nicaragua">Nicaragua</option>
                                    <option value="Niger">Niger</option>
                                    <option value="Nigeria">Nigeria</option>
                                    <option value="Niue">Niue</option>
                                    <option value="Norfolk Island">Norfolk Island</option>
                                    <option value="Norway">Norway</option>
                                    <option value="Oman">Oman</option>
                                    <option value="Pakistan">Pakistan</option>
                                    <option value="Palau Island">Palau Island</option>
                                    <option value="Palestine">Palestine</option>
                                    <option value="Panama">Panama</option>
                                    <option value="Papua New Guinea">Papua New Guinea</option>
                                    <option value="Paraguay">Paraguay</option>
                                    <option value="Peru">Peru</option>
                                    <option value="Phillipines">Philippines</option>
                                    <option value="Pitcairn Island">Pitcairn Island</option>
                                    <option value="Poland">Poland</option>
                                    <option value="Portugal">Portugal</option>
                                    <option value="Puerto Rico">Puerto Rico</option>
                                    <option value="Qatar">Qatar</option>
                                    <option value="Republic of Montenegro">Republic of Montenegro</option>
                                    <option value="Republic of Serbia">Republic of Serbia</option>
                                    <option value="Reunion">Reunion</option>
                                    <option value="Romania">Romania</option>
                                    <option value="Russia">Russia</option>
                                    <option value="Rwanda">Rwanda</option>
                                    <option value="St Barthelemy">St Barthelemy</option>
                                    <option value="St Eustatius">St Eustatius</option>
                                    <option value="St Helena">St Helena</option>
                                    <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                                    <option value="St Lucia">St Lucia</option>
                                    <option value="St Maarten">St Maarten</option>
                                    <option value="St Pierre &amp; Miquelon">St Pierre &amp; Miquelon</option>
                                    <option value="St Vincent &amp; Grenadines">St Vincent &amp; Grenadines</option>
                                    <option value="Saipan">Saipan</option>
                                    <option value="Samoa">Samoa</option>
                                    <option value="Samoa American">Samoa American</option>
                                    <option value="San Marino">San Marino</option>
                                    <option value="Sao Tome &amp; Principe">Sao Tome &amp; Principe</option>
                                    <option value="Saudi Arabia">Saudi Arabia</option>
                                    <option value="Senegal">Senegal</option>
                                    <option value="Seychelles">Seychelles</option>
                                    <option value="Sierra Leone">Sierra Leone</option>
                                    <option value="Singapore">Singapore</option>
                                    <option value="Slovakia">Slovakia</option>
                                    <option value="Slovenia">Slovenia</option>
                                    <option value="Solomon Islands">Solomon Islands</option>
                                    <option value="Somalia">Somalia</option>
                                    <option value="South Africa">South Africa</option>
                                    <option value="Spain">Spain</option>
                                    <option value="Sri Lanka">Sri Lanka</option>
                                    <option value="Sudan">Sudan</option>
                                    <option value="Suriname">Suriname</option>
                                    <option value="Swaziland">Swaziland</option>
                                    <option value="Sweden">Sweden</option>
                                    <option value="Switzerland">Switzerland</option>
                                    <option value="Syria">Syria</option>
                                    <option value="Tahiti">Tahiti</option>
                                    <option value="Taiwan">Taiwan</option>
                                    <option value="Tajikistan">Tajikistan</option>
                                    <option value="Tanzania">Tanzania</option>
                                    <option value="Thailand">Thailand</option>
                                    <option value="Togo">Togo</option>
                                    <option value="Tokelau">Tokelau</option>
                                    <option value="Tonga">Tonga</option>
                                    <option value="Trinidad &amp; Tobago">Trinidad &amp; Tobago</option>
                                    <option value="Tunisia">Tunisia</option>
                                    <option value="Turkey">Turkey</option>
                                    <option value="Turkmenistan">Turkmenistan</option>
                                    <option value="Turks &amp; Caicos Is">Turks &amp; Caicos Is</option>
                                    <option value="Tuvalu">Tuvalu</option>
                                    <option value="Uganda">Uganda</option>
                                    <option value="United Kingdom">United Kingdom</option>
                                    <option value="Ukraine">Ukraine</option>
                                    <option value="United Arab Erimates">United Arab Emirates</option>
                                    <option value="United States of America">United States of America</option>
                                    <option value="Uraguay">Uruguay</option>
                                    <option value="Uzbekistan">Uzbekistan</option>
                                    <option value="Vanuatu">Vanuatu</option>
                                    <option value="Vatican City State">Vatican City State</option>
                                    <option value="Venezuela">Venezuela</option>
                                    <option value="Vietnam">Vietnam</option>
                                    <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
                                    <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                                    <option value="Wake Island">Wake Island</option>
                                    <option value="Wallis &amp; Futana Is">Wallis &amp; Futana Is</option>
                                    <option value="Yemen">Yemen</option>
                                    <option value="Zaire">Zaire</option>
                                    <option value="Zambia">Zambia</option>
                                    <option value="Zimbabwe">Zimbabwe</option>
                                </select>
                            </div>
                        </div>
						<div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label><?= content(155) ?>*</label>
                                <input type="text" class="form-control" id="city" name="city" placeholder="City">
                            </div>
                        </div>
                    </div>
                    <div class="row">
					<div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label><?= content(157) ?>*</label>
                                <input type="text" class="form-control" id="state" name="state" placeholder="State">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label><?= content(156) ?> *</label>
                                <input type="text" class="form-control" id="code" name="zip" placeholder="Postal Code">
                            </div>
                        </div>
						
                    </div>
                    <?php
               } else { ?>
                    <div class="row">
                        <div class="col-md-12">
                            <h3 style="padding-left: 15px;"><?= $fetchSession["firstname"] . " " . $fetchSession["lastname"] ?></h3>
                            <p style="padding-left: 15px;"> Now You can Place Your Order Successfully</p>
                        </div>
                    </div>
                <?php
                } ?>
                  

                </fieldset>
            
				</div>
				<!-- <h2 class="title-bg">Shipping Details</h2>
				<div class="shipping-box">
					<div class="checkbox">
						<label><input type="checkbox" value="">Ship to a different address</label>
					</div>
					<div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<div class="form-group mb-0">
								<label>Order Notes</label>
								<input placeholder="Notes about your order, e.g. special notes for delivery." name="lname" class="form-control" type="text">
							</div>
						</div>
					</div>
				</div> -->
			</div>
			<div class="col-md-4">
				<h2 class="title-bg">Your Order</h2>
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
				<div class="product-demo">
					<div class="product-image">
						<img src="<?= $url ?>frontassets/images/breadcrumbs/product-image.png" alt="">
					</div>
					<div class="product-name">
						<h5> <?= substr($fetchVar['title'], 0, 20) . "..." ?></h5>
					</div>
					<div class="product-quantity">
						<h5><i class="fa fa-times"></i><?= $fetchCart['qty'] ?></h5>
					</div>
					<div class="product-ititial-price">
						<h5>
                        <?php
                        $percent = $fetchVar['percentage'];
                        $percentage = $fetchVar['price_usd'] / 100 * $percent;
                        $amount = $fetchVar['price_usd'] - $percentage;
                        $subtotal = $amount * $fetchCart['qty'];
                        $pricesubtotal += $subtotal;
                        echo   number_format((float)$subtotal, 2, '.', '') . "£";
                        
                        ?>
                        </h5>
					</div>
				</div>
                <?php } ?>
				<div class="product-price">
					<table>
						<tr>
							<td>Subtotal</td>
							<td>
                            <?php
                          
                                $grand_total_simple = $pricesubtotal / 100 * $websitefetch['gst'] + $pricesubtotal;
                           
                            $_SESSION['grand_total_simple'] = $grand_total_simple+$fetch_shipping['shipping_price'];

                                echo number_format((float)$pricesubtotal, 2, '.', '') . "£";
                                $grandtotal = "£";
                            
                            ?>
                            </td>
						</tr>
                        <tr>
							<td>Tax</td>
							<td>
                            <?php
                          
                          echo $websitefetch['gst'] . "%";
                            
                            ?>
                            </td>
						</tr>
						<tr>
							<td class="no-border">Shipping</td>
							<td class="no-border"><?=$fetch_shipping['shipping_price'].'£'?></td>
						</tr>
					
						<tr>
							<td>Total</td>
							<td>
                            <?php
                           
                                echo number_format((float)$grand_total_simple+$fetch_shipping['shipping_price'], 2, '.', '');
                           
                            
                            echo $grandtotal
                                ?>
                                <input type="hidden" name="total_price" value="<?=number_format((float)$grand_total_simple+$fetch_shipping['shipping_price'], 2, '.', '')?>" id="total-price">
                            </td>
						</tr>
					</table>
				</div>
				<div class="rs-payment-system">
					<div class="payment-radio-btn1">
						<input type="hidden" name="total" id="total" value="10">
						<div id="paypal-button-container"></div>
					</div>
					<input class="btn-send" type="submit" value="Order Now">
				</div>
			</div>
            </form>
		</div>
	</div>
</div>
<!-- News Section End Here-->
<?php
include_once 'footer.php';
?>
<script src="https://www.paypal.com/sdk/js?client-id=<?=PAYPAL_BUTTONS_CLIENT_ID?>&currency=GBP"></script>
<script>
	var total = document.getElementById('total-price').value;
	// Render the PayPal button into #paypal-button-container
	paypal.Buttons({
		style: {
			layout: 'vertical',
			color: 'blue',
			shape: 'rect',
			label: 'paypal'
		},
		// Set up the transaction
		createOrder: function(data, actions) {
			return actions.order.create({
				purchase_units: [{
					amount: {
						value: total
					}
				}]
			});
		},
		// Finalize the transaction
		onApprove: function(data, actions) {
			return actions.order.capture().then(function(details) {
				var total = document.getElementById('total-price').value;
				var plan_id = document.getElementById('plan_id').value;
				$('#payment-form').submit();
                console.log(details);
			});
		}
	}).render('#paypal-button-container');
</script>
<script>
    $("#payment-form").on('submit', function(e) {
        e.preventDefault();
        $('input[type="submit"]').attr('disabled', 'disabled');
        var page = $('#page').val();
        var design = $('#design').val();
        // if (design == "front") {
        //     var url_design = 'admin/include/insert.php?page=' + page;
        // } else if (design == "back") {
        //     var url_design = 'include/insert.php?page=' + page;
        // } else if (design == "product") {
        //     var url_design = 'admin/include/insert.php?page=' + page;
        // }
        $.ajax({
            url: '<?=$url?>admin/include/insert.php?page=' + page,
            type: "POST",
            data: new FormData(this),
            contentType: false,
            processData: false,
            dataType: "JSON",
            success: function(result) {
                if (result['res'] == "true") {
                    $("#payment-form").trigger('reset')
                    $('input[type="submit"]').removeAttr('disabled');
                    Snackbar.show({
                        text: 'Sucessfully Inserted',
                        pos: 'bottom-right'
                    });
                    $('#invoicemodal').modal('show');
                    $('#my_invoicesss').html('<a id="my_invoice" href="<?=$url?>invoice?invoice='+result['invoice']+'" style="cursor:pointer">Invoice</a>')
                    header_desktop();
                } else if (result['res'] == "wrong") {
                    $("#add").trigger('reset')
                    $('input[type="submit"]').removeAttr('disabled');
                    Snackbar.show({
                        text: 'Something Wrong While Inserting.',
                        pos: 'bottom-right'
                    });
                }  else if (result == "confirmemail") {
                    $("#add").trigger('reset')
                    $('input[type="submit"]').removeAttr('disabled');
                    Snackbar.show({
                        text: 'Sucessfully Register. We send you confirmation email please verify before login!',
                        pos: 'bottom-right'
                    });
                } else if (result == "req") {
                    
                    $('input[type="submit"]').removeAttr('disabled');
                    Snackbar.show({
                        text: 'All field Are Required!',
                        pos: 'bottom-right'
                    });
                } else if (result == "true_sub") {
                    $("#add").trigger('reset')
                    $('input[type="submit"]').removeAttr('disabled');
                    Snackbar.show({
                        text: 'You Successfully Subscribe',
                        pos: 'bottom-right'
                    });
                } else if (result == "variation_add") {
                    // $("#add").trigger('reset')
                    $('input[type="submit"]').removeAttr('disabled');
                    Snackbar.show({
                        text: 'Please Add Variation in Product',
                        pos: 'bottom-right'
                    });
                } else if (result == "categoryselect") {
                    // $("#add").trigger('reset')
                    $('input[type="submit"]').removeAttr('disabled');
                    Snackbar.show({
                        text: 'Please Select Category in Product',
                        pos: 'bottom-right'
                    });
                } else if (result == "sproducts") {
                    // $("#add").trigger('reset')
                    $('input[type="submit"]').removeAttr('disabled');
                    Snackbar.show({
                        text: 'Please Select Product in Coupon',
                        pos: 'bottom-right'
                    });
                } else if (result == "alreadyemail") {
                    $("#add").trigger('reset')
                    $('input[type="submit"]').removeAttr('disabled');
                    Snackbar.show({
                        text: 'This Email Already Registered',
                        pos: 'bottom-right'
                    });
                } else if (result == "already_sub") {
                    $('input[type="submit"]').removeAttr('disabled');
                    Snackbar.show({
                        text: 'This Email Already Subscribe',
                        pos: 'bottom-right'
                    });
                } else if (result == "alreadycart") {
                    $("#add").trigger('reset')
                    $('input[type="submit"]').removeAttr('disabled');
                    Snackbar.show({
                        text: 'This Product Already in cart.',
                        pos: 'bottom-right'
                    });
                } else if (result == "correctpass") {
                    $('input[type="submit"]').removeAttr('disabled');
                    Snackbar.show({
                        text: 'Please Enter Same Password and Confirm Password!',
                        pos: 'bottom-right'
                    });
                } else if (result == "addcart") {
                    $("#add").trigger('reset')
                    $('input[type="submit"]').removeAttr('disabled');
                    header_desktop();
                    Swal.fire(
                        'Add to Cart!',
                        'This Product Added Successfully In  Cart.',
                        'success'
                    )
                    setTimeout(() => {
                        location.reload();
                    }, 3000);
                } else if (result == "updatecart") {
                    $("#add").trigger('reset')
                    $('input[type="submit"]').removeAttr('disabled');
                    header_desktop();
                    Swal.fire(
                        'Add to Cart!',
                        'This Product Quantity Update In Cart.',
                        'success'
                    )
                    setTimeout(() => {
                        location.reload();
                    }, 3000);
                } else if (result == "already-blog") {
                    $("#add").trigger('reset')
                    $('input[type="submit"]').removeAttr('disabled');
                    Snackbar.show({
                        text: 'This Blog Already Added..',
                        pos: 'bottom-right'
                    });
                } else if (result == "Already-Posted") {
                    $("#add").trigger('reset')
                    $('input[type="submit"]').removeAttr('disabled');
                    Snackbar.show({
                        text: 'This Question Already Added..',
                        pos: 'bottom-right'
                    });
                }
            }
        })
    });
</script>