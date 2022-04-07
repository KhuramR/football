<?php
include_once 'connection.php';
if (isset($_POST['value'])) {
    $search_val = $_POST['value'];


    $search = mysqli_query($con, "SELECT * FROM invoice WHERE  track_id = '$search_val'");
    if (mysqli_num_rows($search) > 0) {
        while ($fetch = mysqli_fetch_array($search)) {
?>
            <div class="dart col-md-5 mt-35">
                <h3 class="counter-heading">Invoice No</h3>
                <hr class="counter-divider right-side">
                <div class="counter"> <i class="fas fa-file-invoice"></i>
                    <span class="counter-value"><?=$fetch['invoice_number']?></span>
                </div>
            </div>
            <div class="dart col-md-5 mt-35">
                <h3 class="counter-heading">Email</h3>
                <hr class="counter-divider right-side">
                <div class="counter"> <i class="fas fa-envelope"></i>
                    <span class="counter-value"><?=$fetch['payer_email']?></span>
                </div>
            </div>
            
            <div class="dart col-md-5 mt-35">
                <h3 class="counter-heading">Status</h3>
                <hr class="counter-divider right-side">
                <div class="counter"> <i class="fas fa-tasks"></i>
                    <span class="counter-value"><?=$fetch['order_status']?></span>
                </div>
            </div>
            <div class="dart col-md-5 mt-35">
                <h3 class="counter-heading">Total Price</h3>
                <hr class="counter-divider right-side">
                <div class="counter"> <i class="fas fa-money-check-alt"></i>
                    <span class="counter-value">$<?=$fetch['grandtotal']?></span>
                </div>
            </div>
            <div class="dart col-md-5 mt-35">
                <h3 class="counter-heading ">Payment Method</h3>
                <hr class="counter-divider right-side">
                <div class="counter"><i class="fab fa-cc-stripe"></i>
                    <span class="counter-value">Stipe</span>
                </div>
            </div>
<?php
        }
    } else {
        echo "<br><h3>Your Tracking Id Is Not Found!!!</h3>";
    }
}
?>