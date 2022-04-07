<?php
include("include/function.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Seo - <?= $fetchWebsite['site_name'] ?></title>
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
                                <li class="breadcrumb-item active" aria-current="page"><span>Seo</span></li>
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
            $selectProduct = mysqli_query($con, "SELECT * FROM seos where id='$id'");
            $fetchProduct = mysqli_fetch_array($selectProduct);
            ?>
            <div class="row">
                <div id="flFormsGrid" class="col-lg-12 ">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                    <h4>Edit Seo</h4>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
                            <form id="update">
                                <div class="form-row mb-4">
                                    <input type="hidden" id="page" value="editseo">
                                    <input type="hidden" value="<?= $id ?>" name="id">
                                    <input type="hidden" value="back" id="design">
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Seo Title</label>
                                        <input type="text" name="title" class="form-control" id="inputEmail4" value="<?= @$fetchProduct['title'] ?>" required="" placeholder="Seo Title">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Seo Pagelink</label>
                                        <input type="text" name="link" required="" readonly class="form-control" value="<?= @$fetchProduct['page_link'] ?>" id="inputEmail4" placeholder="Seo Pagelink">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="inputEmail4">Seo Keywords</label>
                                        <input type="text" name="keywords"   class="form-control" value="<?= @base64_decode($fetchProduct['keywords']) ?>" id="inputEmail4" placeholder="Seo Keywords">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="inputEmail4">Seo Description</label>
                                        <textarea name="description" class="form-control" cols="30" rows="3"><?= @base64_decode($fetchProduct['description']) ?></textarea>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary mt-3 ">Edit Seo</button>
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
    </script>
</body>
</html>