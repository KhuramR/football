<?php
include("include/function.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Products - <?= $fetchWebsite['site_name'] ?></title>
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
                                <li class="breadcrumb-item active" aria-current="page"><span>Product</span></li>
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
            if (isset($_GET["edit"])) {
                $id = htmlentities(@mysqli_real_escape_string($con, $_GET['edit']));
                $selectProduct = mysqli_query($con, "SELECT * FROM products where id='$id'");
                $fetchProduct = mysqli_fetch_array($selectProduct);
                $coy =  explode(",", $fetchProduct['category']);
                $selectcvarition = mysqli_query($con, "SELECT * FROM `variation_product` WHERE p_id='" . $fetchProduct["id"] . "'");
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
                                        <h4>Edit Product</h4>
                                    <?php   } else { ?>
                                        <h4>Add Product</h4>
                                    <?php  } ?>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
                            <form id="<?= (isset($_GET['edit'])) ? "update" : "add" ?>">
                                <div class="form-row mb-4">
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Product Name</label>
                                        <input type="text" name="name" class="form-control" id="inputEmail4" value="<?= @$fetchProduct['title'] ?>" required="" placeholder="Product Name">
                                        <input type="hidden" value="back" id="design">
                                        <input type="hidden" id="page" value="products">
                                        <input type="hidden" name="id" value="<?= @$fetchProduct["id"] ?>">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Product Link</label>
                                        <input type="text" name="link" required="" readonly class="form-control" value="<?= @$fetchProduct['link'] ?>" id="inputEmail4" placeholder="Product Link">
                                    </div>
                                </div>
                                <div class="form-row mb-4">
                                    <div class="form-group col-md-6">
                                        <label for="ingredients">Ingredient</label>
                                        <input type="text" name="ingredients" class="form-control" id="ingredients" value="<?= @$fetchProduct['ingredients'] ?>" placeholder="Ingredients">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="use">Use</label>
                                        <input type="text" name="use" class="form-control" value="<?= @$fetchProduct['pro_use'] ?>" id="use" placeholder="Use">
                                    </div>
                                </div>
                                <div class="form-row mb-4">
                                    <div class="form-group col-md-6">
                                        <label for="inputPassword4">Product Image (500x500)</label>
                                        <input type="file" name="image" class="form-control" value="<?= $fetchProduct['img'] ?>" accept="image/*" <?= (isset($_GET['edit'])) ? "" : "required" ?> id="inputPassword4">
                                    </div>
                                    <div class="form-group col-md-6 checkbox" style="border: 1px solid #bfc9d4">
                                        <ul class="ul">
                                            <?php
                                            $selectCategory = mysqli_query($con, "SELECT * FROM `category` where categoryid=0");
                                            while ($fetchCategory = mysqli_fetch_array($selectCategory)) {
                                                $parentCat = $fetchCategory['id'];
                                            ?>
                                                <li class="li">
                                                    <input type="checkbox" name="category[]" value='<?= $fetchCategory['id'] ?>' <?= (isset($_GET['edit'])) ? (in_array($fetchCategory['id'], $coy) ? "checked=''" : "") : "" ?>>
                                                    <label><?= $fetchCategory['name'] ?></label>
                                                    <ul class="ul">
                                                        <?php
                                                        $selectSubCategory = mysqli_query($con, "SELECT * FROM `category` where categoryid='$parentCat'");
                                                        while ($fetchSubCategory = mysqli_fetch_array($selectSubCategory)) {
                                                            if (isset($_GET["edit"])) {
                                                                if (in_array($fetchSubCategory['id'], @$coy)) {
                                                        ?>
                                                                    <li class="li">
                                                                        <input type="checkbox" name="category[]" value='<?= $fetchSubCategory['id'] ?>' checked=''>
                                                                        <label><?= $fetchSubCategory['name'] ?></label>
                                                                    </li>
                                                                <?php } else { ?>
                                                                    <li class="li">
                                                                        <input type="checkbox" name="category[]" value='<?= $fetchSubCategory['id'] ?>' checked=''>
                                                                        <label><?= $fetchSubCategory['name'] ?></label>
                                                                    </li>
                                                                <?php }
                                                            } else { ?>
                                                                <li class="li">
                                                                    <input type="checkbox" name="category[]" value='<?= $fetchSubCategory['id'] ?>' checked=''>
                                                                    <label><?= $fetchSubCategory['name'] ?></label>
                                                                </li>
                                                        <?php }
                                                        } ?>
                                                    </ul>
                                                </li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </div>
                                <div class="form-row mb-4 gallery-body">
                                    <?php
                                    if (isset($_GET['edit'])) {
                                        $selectgallery = mysqli_query($con, "SELECT * FROM images where p_id='" . $fetchProduct["id"] . "'");
                                        if (mysqli_num_rows($selectgallery) > 0) {
                                    ?>
                                            <div class="col-md-12">
                                                <h4>Edit Products Gallery Images</h4>
                                            </div>
                                            <?php
                                            while ($row = mysqli_fetch_array($selectgallery)) { ?>
                                                <div class="form-group col-md-3">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <img src="<?= $url ?>uploads/products/<?= $row["img"] ?>" class="card-img img-fluid" alt="">
                                                        </div>
                                                        <div class="card-footer">
                                                            <input type="file" name="gallery_<?= $row["id"] ?>" class="form-control" accept="image/*">
                                                        </div>
                                                    </div>
                                                </div>
                                    <?php   }
                                        }
                                    } ?>
                                    <div class="form-group col-md-6">
                                        <label for="inputGalery">Gallery Image (100x100)</label>
                                        <input type="file" name="gallery[]" class="form-control" accept="image/*" id="inputGalery">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <button type="button" class="btn btn-primary mt-34 add-gallery">+</button>
                                    </div>
                                </div>
                                <div class="form-group mb-4">
                                    <label for="inputAddress">Produt Short Description</label>
                                    <textarea class="form-control" name="short_description" required="" placeholder="Product Short Description"><?= @$fetchProduct['short_description'] ?></textarea>
                                </div>
                                <div class="form-group mb-4">
                                    <label for="inputAddress">Produt Long Description</label>
                                    <textarea class="form-control" name="long_description" placeholder="Product Short Description"><?= @$fetchProduct['long_description'] ?></textarea>
                                </div>
                                <div class="form-group mb-4">
                                    <label for="inputAddress">Add Variations ?</label>
                                    <?php
                                    if (isset($_GET['edit'])) { ?>
                                        <input type="checkbox" name="variation" value="variation_add" id="variation" placeholder="Produt Description" checked="">
                                    <?php } else { ?>
                                        <input type="checkbox" name="variation" value="variation_add" id="variation" placeholder="Produt Description">
                                    <?php  } ?>
                                </div>
                                <div class="card-body product-body ">
                                    <?php
                                    if (isset($_GET['edit'])) { ?>
                                        <?php
                                        $i = 1;
                                        while ($fetchvarition = mysqli_fetch_array($selectcvarition)) {
                                            if ($i == 1) {
                                        ?>
                                                <div class="form-row product">
                                                    <input type="hidden" name="varition_product_id[]" value="<?= $fetchvarition["id"] ?>">
                                                    <div class="col-md-1 mb-1 productvar" style="display:block;">
                                                        <label for="validationCustom01">Capacity</label>
                                                        <select class="form-control" name="capacity[]">
                                                            <option value="0">None</option>
                                                            <option value="all">All</option>
                                                            <?php
                                                            $selectSubCategory = mysqli_query($con, "SELECT * FROM `weight_variation`");
                                                            while ($fetchSubCategory = mysqli_fetch_array($selectSubCategory)) { ?>
                                                                <option value="<?= $fetchSubCategory['id'];  ?>" <?= ($fetchvarition["weight_id"]) ? "selected" : "" ?>><?= ucwords($fetchSubCategory['variation']);  ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-1 mb-1 productvar" style="display:block;">
                                                        <label for="validationCustom01">Colors</label>
                                                        <select class="form-control" name="color[]">
                                                            <option value="0">None</option>
                                                            <option value="all">All</option>
                                                            <?php
                                                            $selectSubCategory = mysqli_query($con, "SELECT * FROM `color_variation`");
                                                            while ($fetchSubCategory = mysqli_fetch_array($selectSubCategory)) { ?>
                                                                <option value="<?= $fetchSubCategory['id'];  ?>" <?= ($fetchvarition["color_id"]) ? "selected" : "" ?>><?= ucwords($fetchSubCategory['variation']);  ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-1 mb-1 productvar" style="display:block;">
                                                        <label for="validationCustom01">Size</label>
                                                        <select class="form-control" name="size[]">
                                                            <option value="0">None</option>
                                                            <option value="all">All</option>
                                                            <?php
                                                            $selectSubCategory = mysqli_query($con, "SELECT * FROM `size_variation`");
                                                            while ($fetchSubCategory = mysqli_fetch_array($selectSubCategory)) { ?>
                                                                <option value="<?= $fetchSubCategory['id'];  ?>" <?= ($fetchvarition["size_id"]) ? "selected" : "" ?>><?= ucwords($fetchSubCategory['variation']);  ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-1 mb-1 productvar" style="display:block;">
                                                        <label for="validationCustom01">Length</label>
                                                        <select class="form-control" name="length[]">
                                                            <option value="0">None</option>
                                                            <option value="all">All</option>
                                                            <?php
                                                            $selectSubCategory = mysqli_query($con, "SELECT * FROM `length_variation`");
                                                            while ($fetchSubCategory = mysqli_fetch_array($selectSubCategory)) { ?>
                                                                <option value="<?= $fetchSubCategory['id'];  ?>" <?= ($fetchvarition["length_id"]) ? "selected" : "" ?>><?= ucwords($fetchSubCategory['variation']);  ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-1 mb-1">
                                                        <label for="validationCustom01">Pounds</label>
                                                        <input type="text" class="form-control threshold" required="" id="validationCustom01" value="<?= $fetchvarition["price_usd"] ?>" placeholder="£" name="usd[]" required>
                                                    </div>
                                                    <div class="col-md-1 mb-1 d-none">
                                                        <label for="validationCustom01">EURO</label>
                                                        <input type="euro" class="form-control threshold"  id="validationCustom01" value="<?= $fetchvarition["price_euro"] ?>" placeholder="€" name="euro[]" >
                                                    </div>
                                                    <div class="col-md-1 mb-1">
                                                        <label for="validationCustom01">Stock</label>
                                                        <input type="text" class="form-control threshold" required="" id="validationCustom01" value="<?= $fetchvarition["stock"] ?>" placeholder="Stock" name="stock[]" required>
                                                    </div>
                                                    <div class="col-md-1 mb-1">
                                                        <label for="validationCustom01">% Off</label>
                                                        <input type="text" class="form-control threshold" required="" id="validationCustom01" value="<?= $fetchvarition["percentage"] ?>" placeholder="% Off" name="percentage[]" required>
                                                    </div>
                                                    <div class="col-md-2 mb-2">
                                                        <label for="validationCustom01">Vendor Amount</label>
                                                        <input type="text" class="form-control threshold" required="" id="validationCustom01" placeholder="Vendor Amount" name="vendor_amount[]" value="<?= $fetchvarition["vendor_amount"] ?>" required>
                                                    </div>
                                                    <div class="col-md-1 mb-1 productvar" style="display:block;">
                                                        <button type="button" class="btn btn-primary mt-34 add-product">+</button>
                                                    </div>
                                                </div>
                                            <?php } else { ?>
                                                <div class="form-row product">
                                                    <input type="hidden" name="varition_product_id[]" value="<?= $fetchvarition["id"] ?>">
                                                    <div class="col-md-1 mb-1 productvar" style="display:block;">
                                                        <label for="validationCustom01">Capacity</label>
                                                        <select class="form-control" name="capacity[]">
                                                            <option value="0">None</option>
                                                            <option value="all">All</option>
                                                            <?php
                                                            $selectSubCategory = mysqli_query($con, "SELECT * FROM `weight_variation`");
                                                            while ($fetchSubCategory = mysqli_fetch_array($selectSubCategory)) { ?>
                                                                <option value="<?= $fetchSubCategory['id'];  ?>" <?= ($fetchvarition["weight_id"]) ? "selected" : "" ?>><?= ucwords($fetchSubCategory['variation']);  ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-1 mb-1 productvar" style="display:block;">
                                                        <label for="validationCustom01">Colors</label>
                                                        <select class="form-control" name="color[]">
                                                            <option value="0">None</option>
                                                            <option value="all">All</option>
                                                            <?php
                                                            $selectSubCategory = mysqli_query($con, "SELECT * FROM `color_variation`");
                                                            while ($fetchSubCategory = mysqli_fetch_array($selectSubCategory)) { ?>
                                                                <option value="<?= $fetchSubCategory['id'];  ?>" <?= ($fetchvarition["color_id"]) ? "selected" : "" ?>><?= ucwords($fetchSubCategory['variation']);  ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-1 mb-1 productvar" style="display:block;">
                                                        <label for="validationCustom01">Size</label>
                                                        <select class="form-control" name="size[]">
                                                            <option value="0">None</option>
                                                            <option value="all">All</option>
                                                            <?php
                                                            $selectSubCategory = mysqli_query($con, "SELECT * FROM `size_variation`");
                                                            while ($fetchSubCategory = mysqli_fetch_array($selectSubCategory)) { ?>
                                                                <option value="<?= $fetchSubCategory['id'];  ?>" <?= ($fetchvarition["size_id"]) ? "selected" : "" ?>><?= ucwords($fetchSubCategory['variation']);  ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-1 mb-1 productvar" style="display:block;">
                                                        <label for="validationCustom01">Length</label>
                                                        <select class="form-control" name="length[]">
                                                            <option value="0">None</option>
                                                            <option value="all">All</option>
                                                            <?php
                                                            $selectSubCategory = mysqli_query($con, "SELECT * FROM `length_variation`");
                                                            while ($fetchSubCategory = mysqli_fetch_array($selectSubCategory)) { ?>
                                                                <option value="<?= $fetchSubCategory['id'];  ?>" <?= ($fetchvarition["length_id"]) ? "selected" : "" ?>><?= ucwords($fetchSubCategory['variation']);  ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-1 mb-1">
                                                        <label for="validationCustom01">Pounds</label>
                                                        <input type="text" class="form-control threshold" required="" id="validationCustom01" value="<?= $fetchvarition["price_usd"] ?>" placeholder="£" name="usd[]" required>
                                                    </div>
                                                    <div class="col-md-1 mb-1 d-none">
                                                        <label for="validationCustom01">EURO</label>
                                                        <input type="euro" class="form-control threshold"  id="validationCustom01" value="<?= $fetchvarition["price_euro"] ?>" placeholder="€" name="euro[]" >
                                                    </div>
                                                    <div class="col-md-1 mb-1">
                                                        <label for="validationCustom01">Stock</label>
                                                        <input type="text" class="form-control threshold" required="" id="validationCustom01" value="<?= $fetchvarition["stock"] ?>" placeholder="Stock" name="stock[]" required>
                                                    </div>
                                                    <div class="col-md-1 mb-1">
                                                        <label for="validationCustom01">% Off</label>
                                                        <input type="text" class="form-control threshold" required="" id="validationCustom01" value="<?= $fetchvarition["percentage"] ?>" placeholder="% Off" name="percentage[]" required>
                                                    </div>
                                                    <div class="col-md-2 mb-2">
                                                        <label for="validationCustom01">Vendor Amount</label>
                                                        <input type="text" class="form-control threshold" required="" id="validationCustom01" placeholder="Vendor Amount" value="<?= $fetchvarition["vendor_amount"] ?>" name="vendor_amount[]" required>
                                                    </div>
                                                    <div class="col-md-1 mb-1 ">
                                                        <button type="button" class="btn btn-danger mt-34 trash-product" disabled>-</button>
                                                    </div>
                                                </div>
                                        <?php }
                                            $i++;
                                        } ?>
                                    <?php } else { ?>
                                        <div class="form-row product">
                                            <div class="col-md-1 mb-1 productvar">
                                                <label for="validationCustom01">Capacity</label>
                                                <select class="form-control" name="capacity[]">
                                                    <option value="0">None</option>
                                                    <option value="all">All</option>
                                                    <?php
                                                    $selectSubCategory = mysqli_query($con, "SELECT * FROM `weight_variation`");
                                                    while ($fetchSubCategory = mysqli_fetch_array($selectSubCategory)) { ?>
                                                        <option value="<?= $fetchSubCategory['id'];  ?>"><?= ucwords($fetchSubCategory['variation']);  ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="col-md-1 mb-1 productvar">
                                                <label for="validationCustom01">Colors</label>
                                                <select class="form-control" name="color[]">
                                                    <option value="0">None</option>
                                                    <option value="all">All</option>
                                                    <?php
                                                    $selectSubCategory = mysqli_query($con, "SELECT * FROM `color_variation`");
                                                    while ($fetchSubCategory = mysqli_fetch_array($selectSubCategory)) { ?>
                                                        <option value="<?= $fetchSubCategory['id'];  ?>"><?= ucwords($fetchSubCategory['variation']);  ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="col-md-1 mb-1 productvar">
                                                <label for="validationCustom01">Size</label>
                                                <select class="form-control" name="size[]">
                                                    <option value="0">None</option>
                                                    <option value="all">All</option>
                                                    <?php
                                                    $selectSubCategory = mysqli_query($con, "SELECT * FROM `size_variation`");
                                                    while ($fetchSubCategory = mysqli_fetch_array($selectSubCategory)) { ?>
                                                        <option value="<?= $fetchSubCategory['id'];  ?>"><?= ucwords($fetchSubCategory['variation']);  ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="col-md-1 mb-1 productvar">
                                                <label for="validationCustom01">Length</label>
                                                <select class="form-control" name="length[]">
                                                    <option value="0">None</option>
                                                    <option value="all">All</option>
                                                    <?php
                                                    $selectSubCategory = mysqli_query($con, "SELECT * FROM `length_variation`");
                                                    while ($fetchSubCategory = mysqli_fetch_array($selectSubCategory)) { ?>
                                                        <option value="<?= $fetchSubCategory['id'];  ?>"><?= ucwords($fetchSubCategory['variation']);  ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="col-md-1 mb-1">
                                                <label for="validationCustom01">Pounds</label>
                                                <input type="text" class="form-control threshold" required="" id="validationCustom01" placeholder="£" name="usd[]" required>
                                            </div>
                                            <!-- <div class="col-md-1 mb-1">
                                            <label for="validationCustom01">GB</label>
                                            <input type="text" class="form-control threshold" required="" id="validationCustom01" placeholder="£" name="gb[]" required>
                                        </div> -->
                                            <!-- <div class="col-md-1 mb-1">
                                            <label for="validationCustom01">CAD</label>
                                            <input type="text" class="form-control threshold" required="" id="validationCustom01" placeholder="$" name="cad[]" required>
                                        </div> -->
                                            <div class="col-md-1 mb-1 d-none">
                                                <label for="validationCustom01">EURO</label>
                                                <input type="euro" class="form-control threshold"  id="validationCustom01" placeholder="€" name="euro[]" >
                                            </div>
                                            <div class="col-md-1 mb-1">
                                                <label for="validationCustom01">Stock</label>
                                                <input type="text" class="form-control threshold" required="" id="validationCustom01" placeholder="Stock" name="stock[]" required>
                                            </div>
                                            <div class="col-md-1 mb-1">
                                                <label for="validationCustom01">% Off</label>
                                                <input type="text" class="form-control threshold" required="" id="validationCustom01" placeholder="% Off" name="percentage[]" required>
                                            </div>
                                            <div class="col-md-2 mb-2">
                                                <label for="validationCustom01">Vendor Amount</label>
                                                <input type="text" class="form-control threshold" required="" id="validationCustom01" placeholder="Vendor Amount" name="vendor_amount[]" required>
                                            </div>
                                            <div class="col-md-1 mb-1 productvar">
                                                <button type="button" class="btn btn-primary mt-34 add-product">+</button>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                                <button type="submit" class="btn btn-primary mt-3 "><?= (isset($_GET['edit'])) ? "Edit" : "Add" ?> Produts</button>
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
        <?php
        if (isset($_GET['edit'])) { ?>
        <?php } ?>
        jQuery(document).on("click", ".product .trash-product", function() {
            $(this).closest('.product').remove();
            return false;
        });
        $(".add-product").on('click', function() {
            var product = ' <div class="form-row product">' +
                '   <input type="hidden" name="varition_product_id[]" value="">' +
                ' <div class="col-md-1 mb-1 ">' +
                ' <label for="validationCustom01">Capacity</label>' +
                '<select class="form-control" name="capacity[]">' +
                '<option value="0">None</option>' +
                '<option value="all">All</option>' +
                '<?php
                    $selectSubCategory = mysqli_query($con, "SELECT * FROM `weight_variation`");
                    while ($fetchSubCategory = mysqli_fetch_array($selectSubCategory)) { ?><option value="<?= $fetchSubCategory['id'];  ?>"><?= ucwords($fetchSubCategory['variation']);  ?></option>' +
                '<?php } ?>' +
                '</select>' +
                '</div> ' +
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
                '<div class="col-md-1 mb-1 ">' +
                '<label for="validationCustom01">Length</label>' +
                '<select class="form-control" name="length[]">' +
                '<option value="0">None</option>' +
                '<option value="all">All</option>' +
                ' <?php
                    $selectSubCategory = mysqli_query($con, "SELECT * FROM `length_variation`");
                    while ($fetchSubCategory = mysqli_fetch_array($selectSubCategory)) { ?>' +
                '<option value="<?= $fetchSubCategory['id'];  ?>"><?= ucwords($fetchSubCategory['variation']);  ?></option><?php } ?></select></div>' +
                '<div class="col-md-1 mb-1">' +
                ' <label for="validationCustom01">Pounds</label>' +
                ' <input type="text" class="form-control threshold" id="validationCustom01" placeholder="£" name="usd[]"  required>' +
                '</div> ' +
                // ' <div class="col-md-1 mb-1">' +
                // ' <label for="validationCustom01">GB</label>' +
                // '<input type="text" class="form-control threshold" id="validationCustom01" placeholder="£" name="gb[]"  required>' +
                // ' </div>  ' +
                // '<div class="col-md-1 mb-1">' +
                // ' <label for="validationCustom01">CAD</label>' +
                // ' <input type="text" class="form-control threshold" id="validationCustom01" placeholder="$" name="cad[]"  required>' +
                // ' </div>  ' +
                '<div class="col-md-1 mb-1 d-none">' +
                '<label for="validationCustom01">EURO</label>' +
                ' <input type="euro" class="form-control threshold" id="validationCustom01" placeholder="€" name="euro[]"  >' +
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