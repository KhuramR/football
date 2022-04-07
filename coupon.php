<?php
include("include/function.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Coupon - <?= $fetchWebsite['site_name'] ?></title>
    <link rel="icon" type="image/x-icon" href="../uploads/settings/<?= $fetchWebsite['site_favicon'] ?>" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <link href="assets/css/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link href="plugins/notification/snackbar/snackbar.min.css" rel="stylesheet" type="text/css" />
</head>
<body data-spy="scroll" data-target="#navSection" data-offset="100">
    <?php include("include/begin-nav.php"); ?>
    <!--  BEGIN NAVBAR  -->
    <div class="sub-header-container">
        <header class="header navbar navbar-expand-sm">
            <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu">
                    <line x1="3" y1="12" x2="21" y2="12"></line>
                    <line x1="3" y1="6" x2="21" y2="6"></line>
                    <line x1="3" y1="18" x2="21" y2="18"></line>
                </svg></a>
            <ul class="navbar-nav flex-row">
                <li>
                    <div class="page-header">
                        <nav class="breadcrumb-one" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span>Coupon</span></li>
                            </ol>
                        </nav>
                    </div>
                </li>
            </ul>
        </header>
    </div>
    <!--  END NAVBAR  -->
    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">
        <div class="overlay"></div>
        <div class="search-overlay"></div>
        <?php include("include/sidebar.php"); ?>
        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="container">
            <?php
            if (isset($_GET['edit'])) {
            $id = htmlentities(@mysqli_real_escape_string($con, $_GET['edit']));
            $selectProduct = mysqli_query($con, "SELECT * FROM coupons where id='$id'");
            $fetchProduct = mysqli_fetch_array($selectProduct);
            $coy =  explode(",", $fetchProduct['p_id']);
            $cat =  explode(",", $fetchProduct['cat_id']);
            }
            ?>
            <div class="row">
                <div id="flFormsGrid" class="col-lg-12 ">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                    <?php
                                    if (isset($_GET['edit'])) { ?>
                                        <h4>Edit Coupon</h4>
                                    <?php   } else { ?>
                                        <h4>Add Coupon</h4>
                                    <?php  } ?>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
                            <form id="<?= isset($_GET['edit']) ? "update" : "add" ?>">
                                <div class="form-row mb-4">
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Coupon Title</label>
                                        <input type="text" name="coupon" class="form-control" id="inputEmail4" value="<?= @$fetchProduct['coupon'] ?>" <?= isset($_GET['edit']) ? "" : "required=''" ?> placeholder="Coupon Title">
                                        <input type="hidden" value="back" id="design">
                                        <input type="hidden" id="page" value="coupons">
                                        <input type="hidden" name="id" value="<?= @$id ?>">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Coupon Code</label>
                                        <input type="text" name="code" class="form-control" id="inputEmail4" value="<?= @$fetchProduct['code'] ?>" <?= isset($_GET['edit']) ? "" : "required=''" ?> placeholder="Coupon Code">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Start Date</label>
                                        <input type="date" name="start_date" class="form-control" id="inputEmail4" value="<?= @$fetchProduct['start_date'] ?>" <?= isset($_GET['edit']) ? "" : "required=''" ?> placeholder="Start Date">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Valid Date</label>
                                        <input type="date" name="valid_date" class="form-control" id="inputEmail4" value="<?= @$fetchProduct['valid_date'] ?>" <?= isset($_GET['edit']) ? "" : "required=''" ?> placeholder="Valid Date">
                                    </div>
                                    <!-- <div class="form-group col-md-6">
                                        <label for="inputEmail4">Minimum Product</label>
                                        <input type="number" min="0" name="minimum_product" class="form-control" id="inputEmail4" value="<?= @$fetchProduct['minimum_product'] ?>" <?= isset($_GET['edit']) ? "" : "required=''" ?> placeholder="Minimum Product">
                                    </div> -->
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Status</label>
                                        <select name="status" class="form-control" <?= isset($_GET['edit']) ? "" : "required=''" ?>>
                                            <option value="">-- Select Status --</option>
                                            <option value="1" <?= (@$fetchProduct["status"] == 1) ? "selected=''" : "" ?>>Active</option>
                                            <option value="0" <?= (@$fetchProduct["status"] == 0) ? "selected=''" : "" ?>>Inactive</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Percentage Off (%)</label>
                                        <input type="number" min="0" name="peroff" class="form-control" id="inputEmail4" value="<?= @$fetchProduct['peroff'] ?>" <?= isset($_GET['edit']) ? "" : "required=''" ?> placeholder="Minimum Product">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Select Product</label>
                                        <div class="form-group col-md-12 checkbox" style="border: 1px solid #bfc9d4">
                                            <ul class="ul">
                                                <li class="li">
                                                    <label> <input type="checkbox" id="product-select"> Select All</label>
                                                </li>
                                                <?php
                                                $selectCategory = mysqli_query($con, "SELECT * FROM `products`");
                                                while ($fetchCategory = mysqli_fetch_array($selectCategory)) {
                                                    $parentCat = $fetchCategory['id'];
                                                ?>
                                                    <li class="li">
                                                        <label><input type="checkbox" name="p_id[]" value='<?= $fetchCategory['id'] ?>' <?= (in_array($fetchCategory['id'], $coy) ? "checked=''" : "") ?>> <?= $fetchCategory['title'] ?></label>
                                                    </li>
                                                <?php } ?>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Select Categories</label>
                                        <div class="form-group col-md-12 checkbox" style="border: 1px solid #bfc9d4">
                                            <ul class="ul">
                                                <li class="li">
                                                    <label> <input type="checkbox" id="categories-select"> Select All</label>
                                                </li>
                                                <?php
                                                $selectCategory = mysqli_query($con, "SELECT * FROM `category`");
                                                while ($fetchCategory = mysqli_fetch_array($selectCategory)) {
                                                    $parentCat = $fetchCategory['id'];
                                                ?>
                                                    <li class="li">
                                                        <label><input type="checkbox" name="cat_id[]" value='<?= $fetchCategory['id'] ?>' <?= (in_array($fetchCategory['id'], $cat) ? "checked=''" : "") ?>> <?= $fetchCategory['name'] ?></label>
                                                    </li>
                                                <?php } ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary mt-3 "><?= isset($_GET['edit']) ? "Edit" : "Add" ?> Coupon</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php include("include/footer.php"); ?>
        </div>
        <!--  END CONTENT AREA  -->
    </div>
    <!-- END MAIN CONTAINER -->
    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="assets/js/libs/jquery-3.1.1.min.js"></script>
    <script src="bootstrap/js/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/app.js"></script>
    <script src="plugins/notification/snackbar/snackbar.min.js"></script>
    <!-- END PAGE LEVEL PLUGINS -->
    <!--  BEGIN CUSTOM SCRIPTS FILE  -->
    <script src="assets/js/components/notification/custom-snackbar.js"></script>
    <script src="assets/js/customize.js"></script>
    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>
    <script src="plugins/highlight/highlight.pack.js"></script>
    <script src="assets/js/custom.js"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->
    <script src="assets/js/scrollspyNav.js"></script>
    <script>
        $('#product-select').click(function(event) {
            if (this.checked) {
                // Iterate each checkbox
                $('input:checkbox[name="p_id[]"]').each(function() {
                    $(this).attr("checked", true);
                });
            } else {
                $('input:checkbox[name="p_id[]"]').each(function() {
                    $(this).attr("checked", false);
                });
            }
        });
        $('#categories-select').click(function(event) {
            if (this.checked) {
                // Iterate each checkbox
                $('input:checkbox[name="cat_id[]"]').each(function() {
                    $(this).attr("checked", true);
                });
            } else {
                $('input:checkbox[name="cat_id[]"]').each(function() {
                    $(this).attr("checked", false);
                });
            }
        });
    </script>
</body>
</html>