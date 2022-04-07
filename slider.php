<?php
include("include/function.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Slider - <?= $fetchWebsite['site_name'] ?></title>
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
                                <li class="breadcrumb-item active" aria-current="page"><span>Slider</span></li>
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
            $id = htmlentities(@mysqli_real_escape_string($con, $_GET['edit']));
            $selectProduct = mysqli_query($con, "SELECT * FROM slider where id='$id'");
            $fetchProduct = mysqli_fetch_array($selectProduct);
            ?>
            <div class="row">
                <div id="flFormsGrid" class="col-lg-12 ">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                    <?php
                                    if (isset($_GET['edit'])) { ?>
                                        <h4>Edit slider</h4>
                                    <?php   } else { ?>
                                        <h4>Add slider</h4>
                                    <?php  } ?>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
                            <form id="<?=isset($_GET['edit'])?"update" :"add"?>">
                                <div class="form-row mb-4">
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Slider Title</label>
                                        <input type="text" name="title" class="form-control" id="inputEmail4" value="<?= @$fetchProduct['title'] ?>" <?=isset($_GET['edit'])?"" :"required=''"?> placeholder="Slider Title">
                                        <input type="hidden" value="back" id="design">
                                        <input type="hidden" id="page" value="sliders">
                                        <input type="hidden" name="id" value="<?=@$id?>">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Slider Subtitle</label>
                                        <input type="text" name="subtitle" class="form-control" id="inputEmail4" value="<?= @$fetchProduct['sub_title'] ?>" <?=isset($_GET['edit'])?"" :"required=''"?> placeholder="Slider Subtitle">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="inputPassword4">Slider Image (1920x1080)</label>
                                        <input type="file" name="image" class="form-control"  accept="image/*" <?=isset($_GET['edit'])?"" :"required=''"?>  id="inputPassword4">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary mt-3 "><?=isset($_GET['edit'])?"Edit" :"Add"?> Slider</button>
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
        jQuery(document).on("click", ".product .trash-product", function() {
            $(this).closest('.product').remove();
            return false;
        });
        $(".add-product").on('click', function() {
            var product = ' <div class="form-row product">' +
                ' <div class="col-md-1 mb-1 ">' +
                ' <label for="validationCustom01">Colors</label>' +
                '<select class="form-control" name="color[]">' +
                '<option value="0">None</option>' +
                '<option value="all">All</option>' +
                '<?php
                    $selectSubCategory = mysqli_query($con, "SELECT * FROM `color_variation`");
                    while ($fetchSubCategory = mysqli_fetch_array($selectSubCategory)) { ?><option value="<?= $fetchSubCategory['id'];  ?>"><?= ucwords($fetchSubCategory['variation']);  ?></option>' +
                '<?php } ?>' +
                '</select>' +
                '</div> ' +
                '<div class="col-md-1 mb-1 ">' +
                '<label for="validationCustom01">Size</label>' +
                '<select class="form-control" name="size[]">' +
                '<option value="0">None</option>' +
                '<option value="all">All</option>' +
                ' <?php
                    $selectSubCategory = mysqli_query($con, "SELECT * FROM `size_variation`");
                    while ($fetchSubCategory = mysqli_fetch_array($selectSubCategory)) { ?>' +
                '<option value="<?= $fetchSubCategory['id'];  ?>"><?= ucwords($fetchSubCategory['variation']);  ?></option><?php } ?></select></div>' +
                '<div class="col-md-1 mb-1">' +
                ' <label for="validationCustom01">USD</label>' +
                ' <input type="text" class="form-control threshold" id="validationCustom01" placeholder="$" name="usd[]"  required>' +
                '</div> ' +
                ' <div class="col-md-1 mb-1">' +
                ' <label for="validationCustom01">GB</label>' +
                '<input type="text" class="form-control threshold" id="validationCustom01" placeholder="£" name="gb[]"  required>' +
                ' </div>  ' +
                '<div class="col-md-1 mb-1">' +
                ' <label for="validationCustom01">CAD</label>' +
                ' <input type="text" class="form-control threshold" id="validationCustom01" placeholder="$" name="cad[]"  required>' +
                ' </div>  ' +
                '<div class="col-md-1 mb-1">' +
                '<label for="validationCustom01">EURO</label>' +
                ' <input type="euro" class="form-control threshold" id="validationCustom01" placeholder="€" name="euro[]"  required>' +
                ' </div> ' +
                ' <div class="col-md-1 mb-1">' +
                ' <label for="validationCustom01">Stock</label>' +
                ' <input type="text" class="form-control threshold" id="validationCustom01" placeholder="Stock" name="stock[]"  required>' +
                ' </div>' +
                ' <div class="col-md-1 mb-1">' +
                ' <label for="validationCustom01">Stock</label>' +
                ' <input type="text" class="form-control threshold" id="validationCustom01" placeholder="% Off" name="percentage[]"  required>' +
                ' </div>' +
                '<div class="col-md-2 mb-2">' +
                '<label for="validationCustom01">Vendor Amount</label>' +
                ' <input type="text" class="form-control threshold" required="" id="validationCustom01" placeholder="Vendor Amount" name="vendor_amount[]"  required>' +
                ' </div>' +
                '<div class="col-md-1 mb-1 ">' +
                '<button type="button" class="btn btn-danger mt-34 trash-product">-</button>' +
                ' </div>';
            $(".product-body").append(product);
            return false;
        });
        $("#inputEmail4").on("input", function() {
            value = $(this).val();
            value = value.replace(/\s+/g, '-').toLowerCase();
            value = value.replace(/[^a-zA-Z-]/g, "");
            value = value.toLowerCase();
            $("input[name='link']").val(value);
        });
    </script>
</body>
</html>