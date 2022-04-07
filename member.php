<?php
include("include/function.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Member - <?= $fetchWebsite['site_name'] ?></title>
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
                                <li class="breadcrumb-item active" aria-current="page"><span>Member</span></li>
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
            $selectProduct = mysqli_query($con, "SELECT * FROM member_points where id=1");
            $fetchProduct = mysqli_fetch_array($selectProduct);
            ?>
            <div class="row">
                <div id="flFormsGrid" class="col-lg-12 ">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                   <h4>Edit Member Value</h4>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
                            <form id="update">
                                <div class="form-row mb-4">
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Status</label>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" placeholder="Value" aria-label="Value" name="status" value="<?=$fetchProduct['status']?>" aria-describedby="basic-addon2">
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="basic-addon2">statuses available depending on the points accumulated</span>
                                            </div>
                                        </div>
                                        <input type="hidden" value="back" id="design">
                                        <input type="hidden" id="page" value="memberp">
                                        <input type="hidden" name="id" value="<?= @$id ?>">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">ELF Points</label>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" value="<?=$fetchProduct['elf_1']?>" name="elf_a" aria-label="Example text with two button addons" aria-describedby="button-addon3" placeholder="0">
                                            <div class="input-group-prepend" id="button-addon3">
                                                <span class="input-group-text">></span>
                                            </div>
                                            <input type="text" class="form-control" value="<?=$fetchProduct['elf_2']?>" name="elf_b" aria-label="Example text with two button addons" aria-describedby="button-addon3" placeholder="150">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Nymph Points</label>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" value="<?=$fetchProduct['nymph_1']?>" name="nymph_a" aria-label="Example text with two button addons" aria-describedby="button-addon3" placeholder="150">
                                            <div class="input-group-prepend" id="button-addon3">
                                                <span class="input-group-text">></span>
                                            </div>
                                            <input type="text" class="form-control" value="<?=$fetchProduct['nymph_2']?>" name="nymph_b" aria-label="Example text with two button addons" aria-describedby="button-addon3" placeholder="499">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Goddess Points</label>
                                        <div class="input-group mb-3">
                                            
                                            <div class="input-group-prepend" id="button-addon3">
                                                <span class="input-group-text">></span>
                                            </div>
                                            <input type="text" class="form-control" value="<?=$fetchProduct['goddess']?>" name="goddess" aria-label="Example text with two button addons" aria-describedby="button-addon3" placeholder="500">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="inputEmail4">Purchases (value 1)</label>
                                        <div class="input-group mb-3">
                                        <div class="input-group-prepend" id="button-addon3">
                                                <span class="input-group-text">For purchases of</span>
                                            </div>
                                            <input type="text" class="form-control" value="<?=$fetchProduct['pur1_a']?>" name="pur1_a" aria-label="Example text with two button addons" aria-describedby="button-addon3" placeholder="20">
                                            <div class="input-group-prepend" id="button-addon3">
                                                <span class="input-group-text">€ To</span>
                                            </div>
                                            <input type="text" class="form-control" value="<?=$fetchProduct['pur1_b']?>" aria-label="Example text with two button addons" name="pur1_b" aria-describedby="button-addon3" placeholder="80">
                                            <div class="input-group-prepend" id="button-addon3">
                                                <span class="input-group-text">€ you accumulate 1 point for each euro spent</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="inputEmail4">Purchases (value 2)</label>
                                        <div class="input-group mb-3">
                                            
                                            <div class="input-group-prepend" id="button-addon3">
                                                <span class="input-group-text">For purchases ></span>
                                            </div>
                                            <input type="text" class="form-control" value="<?=$fetchProduct['pur2_a']?>" aria-label="Example text with two button addons" name="pur2" aria-describedby="button-addon3" placeholder="80">
                                            <div class="input-group-prepend" id="button-addon3">
                                                <span class="input-group-text">€ you accumulate 2 points for each euro spent</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" onclick="tinyMCE.triggerSave(true,true);" class="btn btn-primary mt-3 ">Update</button>
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
    <script src="https://cdn.tiny.cloud/1/4n7vldzhz0q64qgr45c8nhvo18g7i09mxu185krzbc0dwyt1/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        $("#inputEmail4").on("input", function() {
            value = $(this).val();
            value = value.replace(/\s+/g, '-').toLowerCase();
            value = value.replace(/[^a-zA-Z-]/g, "");
            value = value.toLowerCase();
            $("input[name='link']").val(value);
        });
        tinymce.init({
            selector: '#mytextareaa',
            height: 500,
            plugins: ' fullpage   autolink   visualblocks visualchars  image link media  codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount tinymcespellchecker a11ychecker imagetools mediaembed  linkchecker contextmenu colorpicker textpattern help',
            toolbar1: 'formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat | code',
        })
    </script>
</body>

</html>