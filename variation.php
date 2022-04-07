<?php
include("include/function.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Variations - <?= $fetchWebsite['site_name'] ?></title>
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
                                <li class="breadcrumb-item active" aria-current="page"><span>Variation</span></li>
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
            <div class="row">
                <div id="flFormsGrid" class="col-lg-12 ">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                    <?php
                                    if (isset($_GET['edit'])) {
                                    ?>
                                        <h4>Update Variation</h4>
                                    <?php } else { ?>
                                        <h4>Add Variation</h4>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <?php
                        $id = htmlentities(@mysqli_real_escape_string($con, $_GET['edit']));
                        $page = htmlentities(@mysqli_real_escape_string($con, $_GET['page']));
                        if ($page == "color") {
                            $select = mysqli_query($con, "SELECT * FROM `color_variation`  WHERE id='$id'");
                        } elseif ($page == "size") {
                            $select = mysqli_query($con, "SELECT * FROM `size_variation`  WHERE id='$id'");
                        } elseif ($page == "length") {
                            $select = mysqli_query($con, "SELECT * FROM `length_variation`  WHERE id='$id'");
                        }
                        elseif ($page == "capacity") {
                            $select = mysqli_query($con, "SELECT * FROM `weight_variation`  WHERE id='$id'");
                        }
                        if (mysqli_num_rows($select) > 0) {
                            $fetch = mysqli_fetch_array($select);
                        }
                        ?>
                        <div class="widget-content widget-content-area">
                            <?php
                            if (isset($_GET['edit'])) {
                            ?>
                                <form id="update">
                                <?php } else { ?>
                                    <form id="add">
                                    <?php } ?>
                                    <input type="hidden" value="<?= @$id ?>" name="id">
                                    <input type="hidden" value="back" id="design">
                                    <?php
                                    if ($page == "color") {
                                    ?>
                                        <input type="hidden" id="page" value="variation_color">
                                    <?php }
                                    if ($page == "size") {
                                    ?>
                                        <input type="hidden" id="page" value="variation_size">
                                    <?php }if ($page == "length") {
                                    ?>
                                        <input type="hidden" id="page" value="variation_length">
                                    <?php }if ($page == "capacity") {
                                    ?>
                                        <input type="hidden" id="page" value="variation_capacity">
                                    <?php } ?>
                                    
                                    <div class="form-row mb-4">
                                        <div class="form-group col-md-12">
                                            <label for="inputPassword4">Variation Name</label>
                                            <input type="text" placeholder="Variation Name" class="form-control" value="<?= @$fetch['variation'] ?>" name="name" id="inputPassword4">
                                        </div>
                                    </div>
                                    <?php
                                    if (isset($_GET['edit'])) {
                                    ?>
                                        <button type="submit" class="btn btn-primary mt-3">Update</button>
                                    <?php } else { ?>
                                        <button type="submit" class="btn btn-primary mt-3">Add</button>
                                    <?php } ?>
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
    <!-- END GLOBAL MANDATORY SCRIPTS -->
    <script src="assets/js/scrollspyNav.js"></script>
    <script src="plugins/notification/snackbar/snackbar.min.js"></script>
    <!-- END PAGE LEVEL PLUGINS -->
    <!--  BEGIN CUSTOM SCRIPTS FILE  -->
    <script src="assets/js/components/notification/custom-snackbar.js"></script>
    <script src="assets/js/customize.js"></script>
</body>
</html>