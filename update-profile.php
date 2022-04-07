<?php
include("include/function.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Update Profile - <?= $fetchWebsite['site_name'] ?></title>
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
                                <li class="breadcrumb-item active" aria-current="page"><span>User</span></li>
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
            $sessionid = $_SESSION['user_id'];
            $selectUser = mysqli_query($con, "SELECT  * FROM users WHERE id='$sessionid'");
            $fetchUser = mysqli_fetch_array($selectUser);
            ?>
            <div class="row">
                <div id="flFormsGrid" class="col-lg-12 ">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                    <h4>Update Profile</h4>
                                </div>
                            </div>
                            <div class="widget-content widget-content-area">
                                <form id="update">
                                    <input type="hidden" id="page" value="updateuserprofile">
                                    <input type="hidden" id="design" value="back">
                                    <div class="form-row ">
                                        <div class="form-group col-md-6">
                                            <label for="inputPassword4">First Name</label>
                                            <input type="text" name="firstname" placeholder="First Name" class="form-control" value="<?= $fetchUser['firstname'] ?>" id="inputPassword4">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputPassword4">Last Name</label>
                                            <input type="text" name="lastname" placeholder="Last Name" class="form-control" value="<?= $fetchUser['lastname'] ?>" id="inputPassword4">
                                        </div>
                                    </div>
                                    <div class="form-row mb-4">
                                        <div class="form-group col-md-6">
                                            <label for="inputPassword4">Email</label>
                                            <input type="text" name="email" placeholder="Email" class="form-control" value="<?= $fetchUser['email'] ?>" id="inputPassword4">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputPassword4">Password</label>
                                            <input type="text" name="Pass" placeholder="Password" class="form-control" id="inputPassword4">
                                            <span>If You Want To Change Password Then Type Here</span>
                                        </div>
                                    </div>
                                    <div class="form-row mb-4">
                                        <div class="form-group col-md-6">
                                            <label for="inputPassword4">Gender</label>
                                            <select class="form-control" name="gender">
                                                <?php if ($fetchUser['gender'] == "Male") { ?>
                                                    <option selected="">Male</option>
                                                    <option>Female</option>
                                                <?php } else { ?>
                                                    <option>Male</option>
                                                    <option selected="">Female</option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputPassword4">Profile Image</label>
                                            <input type="file" name="image" class="form-control" id="inputPassword4">
                                        </div>
                                    </div>
                                    <div class="form-row mb-4">
                                        <div class="form-group col-md-6">
                                            <label for="inputPassword4">Phone Number</label>
                                            <input type="text" name="phone" placeholder="Phone" class="form-control" value="<?= $fetchUser['phone'] ?>" id="inputPassword4">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputAddress">Address</label>
                                            <input type="text" class="form-control" name="address" id="inputAddress" value="<?= $fetchUser['address'] ?>" placeholder="Address">
                                        </div>
                                    </div>
                                    <div class="form-row mb-4">
                                        <div class="form-group col-md-6">
                                            <label for="inputPassword4">City</label>
                                            <input type="text" name="city" value="<?= $fetchUser['city'] ?>" placeholder="City" class="form-control" id="inputPassword4">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputPassword4">Zip Code</label>
                                            <input type="text" name="zip" placeholder="Zip Code" class="form-control" value="<?= $fetchUser['zip'] ?>" id="inputPassword4">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary mt-3">Update</button>
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
        <script>
            $(document).ready(function() {
                App.init();
            });
        </script>
        <script src="plugins/highlight/highlight.pack.js"></script>
        <script src="assets/js/custom.js"></script>
        <script src="plugins/notification/snackbar/snackbar.min.js"></script>
        <script src="assets/js/components/notification/custom-snackbar.js"></script>
        <script src="assets/js/customize.js"></script>
        <!-- END GLOBAL MANDATORY SCRIPTS -->
        <script src="assets/js/scrollspyNav.js"></script>
        <script>
            jQuery(document).on("click", ".product .trash-product", function() {
                $(this).closest('.product').remove();
                return false;
            });
            $(".add-product").on('click', function() {
                var tickets = '<div  class="card-body product ">' +
                    ' <div class="form-row ">' +
                    '<div class="col-md-1 mb-1">' +
                    ' <label for="validationCustom01">Color</label>' +
                    ' <input type="text" class="form-control threshold" id="validationCustom01" placeholder="Color" name="color[]"  required>' +
                    '</div>' +
                    ' <div class="col-md-3 mb-3">' +
                    '  <label for="validationCustom01">Icon</label>' +
                    '<input type="file" class="form-control threshold" id="validationCustom01" placeholder="Color" name="icon[]"  required>' +
                    '</div>     ' +
                    '<div class="col-md-1 mb-1">' +
                    ' <label for="validationCustom01">Price USD</label>' +
                    ' <input type="text" class="form-control threshold" id="validationCustom01" placeholder="$" name="usd[]"  required>' +
                    ' </div> ' +
                    '<div class="col-md-1 mb-1">' +
                    ' <label for="validationCustom01">Price GB</label>' +
                    ' <input type="text" class="form-control threshold" id="validationCustom01" placeholder="£" name="gb[]"  required>' +
                    ' </div>  ' +
                    ' <div class="col-md-2 mb-2">' +
                    ' <label for="validationCustom01">Price CAD</label>' +
                    ' <input type="text" class="form-control threshold" id="validationCustom01" placeholder="$" name="cad[]"  required>' +
                    '  </div>  ' +
                    ' <div class="col-md-2 mb-2">' +
                    '<label for="validationCustom01">Price EURO</label>' +
                    ' <input type="euro" class="form-control threshold" id="validationCustom01" placeholder="€" name="euro[]"  required>' +
                    ' </div> ' +
                    '<div class="col-md-1 mb-1">' +
                    '<label for="validationCustom01">Stock</label>' +
                    '<input type="text" class="form-control threshold" id="validationCustom01" placeholder="Stock" name="stock[]"  required>' +
                    ' </div>' +
                    ' <div class="col-md-1 mb-1">' +
                    ' <button type="button" class="btn btn-danger mt-34 trash-product">-</button>' +
                    '</div>' +
                    ' </div>' +
                    ' </div>';
                $(".product-body").append(tickets);
                return false;
            });
            $('input[type="checkbox"]').change(function(e) {
                var checked = $(this).prop("checked"),
                    container = $(this).parent(),
                    siblings = container.siblings();
                container.find('input[type="checkbox"]').prop({
                    indeterminate: false,
                    checked: checked
                });
                function checkSiblings(el) {
                    var parent = el.parent().parent(),
                        all = true;
                    el.siblings().each(function() {
                        let returnValue = all = ($(this).children('input[type="checkbox"]').prop("checked") === checked);
                        return returnValue;
                    });
                    if (all && checked) {
                        parent.children('input[type="checkbox"]').prop({
                            indeterminate: false,
                            checked: checked
                        });
                        checkSiblings(parent);
                    } else if (all && !checked) {
                        parent.children('input[type="checkbox"]').prop("checked", checked);
                        parent.children('input[type="checkbox"]').prop("indeterminate", (parent.find('input[type="checkbox"]:checked').length > 0));
                        checkSiblings(parent);
                    } else {
                        el.parents("li").children('input[type="checkbox"]').prop({
                            indeterminate: true,
                            checked: false
                        });
                    }
                }
                checkSiblings(container);
            });
        </script>
</body>
</html>