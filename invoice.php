<?php
include("../include/connection.php");
if (isset($_GET['invoice-number'])) {
  $invoice = htmlentities(@mysqli_real_escape_string($con, $_GET['invoice-number']));
  $selectInvoice = mysqli_query($con, "SELECT users.email,users.city,users.zip,users.address,users.firstname,users.lastname,invoice.* FROM `invoice` join users on users.id=invoice.user_id WHERE invoice.invoice_number='$invoice'");
  if (mysqli_num_rows($selectInvoice) > 0) {
    $fetchInvoice = mysqli_fetch_array($selectInvoice);
    function convertNumberToWord($num = false)
    {
      $num = str_replace(array(',', ' '), '', trim($num));
      if (!$num) {
        return false;
      }
      $num = (int) $num;
      $words = array();
      $list1 = array(
        '', 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine', 'ten', 'eleven',
        'twelve', 'thirteen', 'fourteen', 'fifteen', 'sixteen', 'seventeen', 'eighteen', 'nineteen'
      );
      $list2 = array('', 'ten', 'twenty', 'thirty', 'forty', 'fifty', 'sixty', 'seventy', 'eighty', 'ninety', 'hundred');
      $list3 = array(
        '', 'thousand', 'million', 'billion', 'trillion', 'quadrillion', 'quintillion', 'sextillion', 'septillion',
        'octillion', 'nonillion', 'decillion', 'undecillion', 'duodecillion', 'tredecillion', 'quattuordecillion',
        'quindecillion', 'sexdecillion', 'septendecillion', 'octodecillion', 'novemdecillion', 'vigintillion'
      );
      $num_length = strlen($num);
      $levels = (int) (($num_length + 2) / 3);
      $max_length = $levels * 3;
      $num = substr('00' . $num, -$max_length);
      $num_levels = str_split($num, 3);
      for ($i = 0; $i < count($num_levels); $i++) {
        $levels--;
        $hundreds = (int) ($num_levels[$i] / 100);
        $hundreds = ($hundreds ? ' ' . $list1[$hundreds] . ' hundred' . ' ' : '');
        $tens = (int) ($num_levels[$i] % 100);
        $singles = '';
        if ($tens < 20) {
          $tens = ($tens ? ' ' . $list1[$tens] . ' ' : '');
        } else {
          $tens = (int)($tens / 10);
          $tens = ' ' . $list2[$tens] . ' ';
          $singles = (int) ($num_levels[$i] % 10);
          $singles = ' ' . $list1[$singles] . ' ';
        }
        $words[] = $hundreds . $tens . $singles . (($levels && (int) ($num_levels[$i])) ? ' ' . $list3[$levels] . ' ' : '');
      } //end for loop
      $commas = count($words);
      if ($commas > 1) {
        $commas = $commas - 1;
      }
      return implode(' ', $words);
    }
?>
    <html>

    <head>
      <meta charset="utf-8">
      <meta content="width=device-width, initial-scale=1" name="viewport">
      <title><?= $websitefetch["site_name"] ?> | Invoice</title>
      <link rel="icon" type="image/png" sizes="32x32" href="<?= $url ?>uploads/settings/<?= $websitefetch["site_favicon"] ?>">
      <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
      <script language="javascript">
        function printdiv(printpage) {
          document.getElementById("account").style.display = "none";
          $(".invoice-box").css('margin', '0');
          $(".invoice-box").css('padding', '0');
          window.print();
          document.getElementById("account").style.display = "block";
          $(".invoice-box").css('margin', '60px auto');
          $(".invoice-box").css('padding', '30px');
        }
      </script>
      <?php @header('Content-Type: text/html; charset=utf-8'); ?>
    </head>

    <body>
      <style>
        .tt {
          margin: 0.5rem 5% !important;
        }

        @import url(https://fonts.googleapis.com/css?family=Lato:400,300,300italic,400italic,700,700italic);

        /** GLOBAL **/
        #print {
          margin-top: 30px;
          cursor: pointer;
          padding: 10px 20px;
          border: 2px solid #FFF;
          font-size: 20px;
          color: #FFF;
          text-transform: uppercase;
          line-height: 25px;
          font-family: 'Rajdhani', sans-serif;
          display: inline-block;
          font-weight: 600;
          background: transparent;
        }

        #accountbtn {
          margin-top: 30px;
          padding: 10px 20px;
          border: 2px solid #FFF;
          font-size: 20px;
          color: #FFF;
          text-transform: uppercase;
          line-height: 25px;
          font-family: 'Rajdhani', sans-serif;
          display: inline-block;
          font-weight: 600;
          background: transparent;
        }

        html,
        body {
          height: 100%;
          background: #060818;
          width: 100%;
          margin: 0;
          padding: 0;
          left: 0;
          top: 0;
          font-size: 100%;
        }

        * {
          font-family: "Lato", "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;
          color: #333447;
          line-height: 1.5;
        }

        /* TYPOGRAPHY */
        h1 {
          font-size: 2.5rem;
        }

        h2 {
          font-size: 2rem;
        }

        h3 {
          font-size: 1.375rem;
        }

        h4 {
          font-size: 1.125rem;
        }

        h5 {
          font-size: 1rem;
        }

        h6 {
          font-size: 0.875rem;
        }

        p {
          font-size: 1.125rem;
          font-weight: 200;
          line-height: 1.8;
        }

        .font-light {
          font-weight: 300;
        }

        .font-regular {
          font-weight: 400;
        }

        .font-heavy {
          font-weight: 700;
        }

        /* POSITIONING */
        .left {
          text-align: left;
        }

        .right {
          float: right;
          text-align: right;
        }

        .center {
          text-align: center;
          margin-left: auto;
          margin-right: auto;
        }

        .justify {
          text-align: justify;
        }

        /** standard padding**/
        .no-padding {
          padding: 0px;
        }

        .standard-padding {
          padding: 20px;
        }

        .standard-padding-right {
          padding-right: 20px;
        }

        .standard-padding-left {
          padding-left: 20px;
        }

        .standard-padding-right {
          padding-left: 20px;
        }

        .standard-padding-top {
          padding-top: 20px;
        }

        .standard-padding-bottom {
          padding-bottom: 20px;
        }

        .container {
          width: 100%;
          margin-left: auto;
          margin-right: auto;
        }

        .row {
          position: relative;
          width: 100%;
        }

        .pull-right {
          float: right;
        }

        .pull-left {
          float: right;
        }

        .row [class^="col"] {
          float: left;
          margin: 0.5rem 2%;
          min-height: 0.125rem;
        }

        .row::after {
          content: "";
          display: table;
          clear: both;
        }

        .hidden-sm {
          display: none;
        }

        .invoice-box {
          background: #ffffff;
          max-width: 1000px;
          margin: 60px auto;
          padding: 30px;
          box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
          font-size: 16px;
          line-height: 24px;
          color: #002336;
        }

        .title {
          margin-bottom: 0px;
          padding-bottom: 0px;
          margin-left: 10px;
          margin-right: 10px;
          font-weight: bold;
          border-bottom: 1px solid #8B8B8B;
          margin-bottom: 4px;
        }

        .infoblock {
          margin-left: 10px;
          margin-right: 10px;
          margin-top: 0px;
          padding-top: 0px;
        }

        .titles {
          padding-top: 4px;
          margin-top: 20px;
          background: #DCDCDC;
          font-weight: bold;
        }

        @media only screen and (max-width: 600px) {
          .invoice-box table tr.top table td {
            width: 100%;
            display: block;
            text-align: center;
          }

          .invoice-box table tr.information table td {
            width: 100%;
            display: block;
            text-align: center;
          }
        }

        /** RTL **/
        .rtl {
          direction: rtl;
          font-family: "Lato", Tahoma, "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;
        }

        .rtl table {
          text-align: right;
        }

        .rtl table tr td:nth-child(2) {
          text-align: left;
        }

        .eqWrap {
          display: flex;
        }

        .eq {
          padding: 10px;
        }

        .item:nth-of-type(odd) {
          background: #F9F9F9;
        }

        .item:nth-of-type(even) {
          background: #fff;
        }

        .equalHW {
          flex: 1;
        }

        table.table {
          width: 100%;
          margin-top: 20px;
          border-collapse: collapse;
        }

        .table th,
        .table td {
          text-align: left;
          padding: 0.25em;
        }

        .table tr {
          border-bottom: 1px solid #DDD;
        }

        button:hover {
          box-shadow: 0 0 4px rgba(3, 3, 3, 0.8);
          opacity: 0.9;
        }

        a {
          text-decoration: none;
        }
      </style>
      <center id="account"> <button onclick="printdiv('invoice');" id="print">Print</button> &nbsp;&nbsp; <?php if (isset($_SESSION['user_id'])) { ?>
          <a href="orders" id="accountbtn">My Account</a>
      </center>
    <?php } else { ?>
      <a href="<?= $url ?>" id="accountbtn">Webseite</a></center>
    <?php } ?>
    <div id="invoice" class="invoice-box">
      <div class="container">
        <div class="row">
          <div class="text-center eq title-block  ">
            <center>
              <a href="" class="float-right"><img src="<?= $url ?>uploads/settings/<?= $websitefetch["site_logo"] ?>" style="width:100%; max-width:255px;"></a><br>
              <?php $add =  str_replace("&lt;br&gt;", "", $websitefetch['office_address']);
              echo $add; ?>
            </center>
            <br>
          </div>
          <div class="equalHWrap eqWrap top">
            <div class="equalHW eq  logo-block">
              <h2 class=" no-padding" id="InvoiceSumExVat" style="margin:0px;">Invoice</h2>
              <p>Invoice to:</p>
              <?php if ($fetchInvoice['user_id'] != 140) { ?>
                <?= ucwords($fetchInvoice['firstname'] . " " . $fetchInvoice['lastname']) ?><br>
                Rechnungsadresse:<?= $fetchInvoice['address'] ?> <br><?= $fetchInvoice['city'] ?><br> <?= $fetchInvoice['zip'] ?>
              <?php } else { ?>
                <?= ucwords($fetchInvoice['guest_name']) ?><br>
                <?= $fetchInvoice['guest_address'] ?>
              <?php } ?>
              <br>
              <?php if ($fetchInvoice['user_id'] != 140) { ?>
                Email: <br><?= $fetchInvoice['email'] ?>
              <?php } else { ?>
                Email:<br> <?= $fetchInvoice['guest_email'] ?>
              <?php } ?>
            </div>
            <div class="equalHW eq title-block  pull-right">
              <br><br><br>
              <div style="border:1px solid; padding: 10px">
                <b>Invoice Number <?= $fetchInvoice['invoice_number'] ?></b><br>
                <b>Order Date <?= $date = date('Y-m-d', strtotime($fetchInvoice['created'])); ?></b>
              </div>
            </div>
          </div>
          <?php
          $invoiceid = $fetchInvoice['id'];
          $selectCart = mysqli_query($con, "SELECT * from cart where invoice_id='$invoiceid' and status=1 order by id desc ");
          if (mysqli_num_rows($selectCart) > 0) {
          ?>
            <div class="row" style="margin-top:20px;">
              <table class="table">
                <tr class="titles">
                  <th>S#</th>
                  <th>Product Image</th>
                  <th>Product Name</th>
                  <th>Product Price</th>
                  <th>Product Quantity</th>
                  <th>Product Subtotal</th>
                </tr>
                <?php
                $pricesubtotal = 0;
                $i = 1;
                while ($fetchCart = mysqli_fetch_array($selectCart)) {
                  $colorid = $fetchCart['color_id'];
                  $sizeid = $fetchCart['size_id'];
                  $pid = $fetchCart['p_id'];
                  $selectVar = mysqli_query($con, "SELECT products.img,products.link,products.title,variation_product.* FROM `variation_product` LEFT JOIN products on products.id=variation_product.p_id where variation_product.color_id='$colorid' and variation_product.size_id='$sizeid' and variation_product.p_id='$pid'");
                  $fetchVar = mysqli_fetch_array($selectVar);
                ?>
                  <tr class="item" id="ProductList">
                    <td id="Product"><span id="ProuductName"><?= $i++ ?><span></span></span></td>
                    <td><img src="<?= $url . "uploads/products/" . $fetchVar["img"] ?>" style="width: 70px;height: 70px;object-fit: contain;" alt=""></td>
                    <td><span id="ProductNumUnits"><?= $fetchVar['title'] ?><span></span></span></td>
                    <td>
                      <span id="ProductUnitPrice">
                        <?php
                        $percent = $fetchVar['percentage'];
                        if ($_SESSION['currency'] == "dollar") {
                          $percentage = $fetchVar['price_usd'] / 100 * $percent;
                          $amount = $fetchVar['price_usd'] - $percentage;
                          $price = number_format((float)$amount, 2, '.', '');
                          echo "$" . $price;
                        } elseif ($_SESSION['currency'] == "pound") {
                          $percentage = $fetchVar['price_gb'] / 100 * $percent;
                          $amount = $fetchVar['price_gb'] - $percentage;
                          $price = number_format((float)$amount, 2, '.', '');
                          echo "£" . $price;
                        } elseif ($_SESSION['currency'] == "cad") {
                          $percentage = $fetchVar['price_cad'] / 100 * $percent;
                          $amount = $fetchVar['price_cad'] - $percentage;
                          $price = number_format((float)$amount, 2, '.', '');
                          echo "$" . $price;
                        } elseif ($_SESSION['currency'] == "euro") {
                          $percentage = $fetchVar['price_euro'] / 100 * $percent;
                          $amount = $fetchVar['price_euro'] - $percentage;
                          $price = number_format((float)$amount, 2, '.', '');
                          echo "€" . $price;
                        } else {
                          $percentage = $fetchVar['price_usd'] / 100 * $percent;
                          $amount = $fetchVar['price_usd'] - $percentage;
                          $price = number_format((float)$amount, 2, '.', '');
                          echo "$" . $price;
                        }
                        ?>
                      </span>
                    </td>
                    <td class="product-quantity"><?= $fetchCart['qty'] ?></td>
                    <td class="product-subtotal">
                      <?php
                      $subtotal = $amount * $fetchCart['qty'];
                      $pricesubtotal += $subtotal;
                      if ($_SESSION['currency'] == "dollar") {
                        echo "$" . number_format((float)$subtotal, 2, '.', '');
                      } elseif ($_SESSION['currency'] == "pound") {
                        echo "£" . number_format((float)$subtotal, 2, '.', '');
                      } elseif ($_SESSION['currency'] == "cad") {
                        echo "$" . number_format((float)$subtotal, 2, '.', '');
                      } elseif ($_SESSION['currency'] == "euro") {
                        echo "€" . number_format((float)$subtotal, 2, '.', '');
                      } else {
                        echo "$" . number_format((float)$subtotal, 2, '.', '');;
                      }
                      ?></td>
                  </tr>
                <?php } ?>
              </table>
            </div>
          <?php } ?>
          <div class="row" style="margin-top:10%">
            <div class="equalHWrap eqWrap">
              <div class="equalHW eq">
                <table class="col-lg-6">
                </table>
                <table class="right col-lg-6">
                  <tr>
                    <td><span style="display:inline-block;margin-right:10px;"><strong>Tax</strong></span></td>
                    <td><span id="ProductCost">
                        <?= $websitefetch['gst'] ?>
                      </span> <span id="InvoiceCurrency3">%</span></td>
                  </tr>
                  <tr>
                    <td><span style="display:inline-block;margin-right:10px;"><strong>Grand Total</strong></span></td>
                    <td><span id="ProductCost">
                        <?php
                        echo $fetchInvoice["grandtotal"];
                        ?>
                      </span> <span id="InvoiceCurrency3"><?= $_SESSION["currency_symbol"] ?></span></td>
                  </tr>
                </table>
              </div>
            </div>
            <div class="center">
              <br><br><br>
              <b>Thank you for Purchasing Our Service. We hope you enjoy the
                <br>story and look forward to hearing from you again.</b>
            </div>
          </div>
          <div class="row " style="margin-top:10%; ">
            <div class="col-lg-4 tt">
              <tr>
                <td><span style="display:inline-block;margin-right:10px;">
                    <img src="<?= $url ?>uploads/settings/<?= $websitefetch['site_favicon'] ?>" width="150px">
                  </span></td>
              </tr>
            </div>
            <div class="col-lg-4 tt">
              <tr>
                <td><span style="display:inline-block;margin-right:10px;">
                    <?php $add =  str_replace("&lt;br&gt;", "", $websitefetch['office_address']);
                    echo $add; ?>
                  </span></td>
              </tr>
            </div>
            <div class="col-lg-4 tt">
              <tr>
                <td><span style="display:inline-block;margin-right:10px;">
                    Tel: <?= $websitefetch['office_phone'] ?><br>
                </td>
              </tr>
            </div>
          </div>
        </div>
      </div>
    </div>
    </body>

    </html>
<?php } else {
    echo "<script>window.open('index','_self')</script>";
  }
} else {
  echo "<script>window.open('index','_self')</script>";
} ?>