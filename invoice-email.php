<?php
include("include/function.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Invoice Email - <?= $fetchWebsite['site_name'] ?></title>
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
                                <li class="breadcrumb-item active" aria-current="page"><span>Invoice Email</span></li>
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
            // $id = htmlentities(@mysqli_real_escape_string($con, $_GET['edit']));
            $selectProduct = mysqli_query($con, "SELECT * FROM invoice_email where id=1");
            $fetchProduct = mysqli_fetch_array($selectProduct);
            ?>
            <div class="row">
                <div id="flFormsGrid" class="col-lg-12 ">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                    
                                        <h4>Edit Invoice Email</h4>
                                   
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
                            <form id="update">
                                <div class="form-row mb-4">
                                    <div class="form-group col-md-6">
                                        <label for="head_short_desc">Header Short Description</label>
                                        
                                        <textarea class="form-control" name="head_short_desc" required="" placeholder="Header Short Description"><?= @base64_decode($fetchProduct['header_text']) ?></textarea>
                                        <input type="hidden" value="back" id="design">
                                        <input type="hidden" id="page" value="invoice_email">
                                        <input type="hidden" name="id" value="<?= @$id ?>">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="heading">Heading</label>
                                        <input type="text" name="heading" required=""  class="form-control" value="<?= @$fetchProduct['heading'] ?>" id="heading" placeholder="Heading">
                                    </div>
                                    
                                </div>
                               
                                <div class="form-group mb-4">
                                    <label for="inputAddress">Description</label>
                                    <textarea class="form-control" name="long_description" placeholder="Description" id="mytextareaa" ><?= @base64_decode($fetchProduct['description']) ?></textarea>
                                </div>
                                <div class="form-row mb-4">
                                    <div class="form-group col-md-6">
                                        <label for="shipping_heading">Text For Shipping Address</label>
                                        <input type="text" name="shipping_heading" required=""  class="form-control" value="<?= @$fetchProduct['shipping_heading'] ?>" id="shipping_heading" placeholder="Text For Shipping Address">
                                        
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="deliver_adr_head">Text For Delivery Address</label>
                                        <input type="text" name="deliver_adr_head" required=""  class="form-control" value="<?= @$fetchProduct['deliver_adr_head'] ?>" id="deliver_adr_head" placeholder="Text For Delivery Address">
                                    </div>
                                    
                                </div>
                                 <div class="form-row mb-4">
                                    <div class="form-group col-md-6">
                                        <label for="order_number_head">Text For Order Number</label>
                                        <input type="text" name="order_number_head" required=""  class="form-control" value="<?= @$fetchProduct['order_number_head'] ?>" id="order_number_head" placeholder="Text For Order Number">
                                        
                                        
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="order_detail_head">Text For Order Detail</label>
                                        <input type="text" name="order_detail_head" required=""  class="form-control" value="<?= @$fetchProduct['order_detail_head'] ?>" id="order_detail_head" placeholder="Text For Order Detail">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="footer_text">Footer Text Short Description</label>
                                        
                                        <textarea class="form-control" name="footer_text" required="" placeholder="Footer Text Short Description"><?= @base64_decode($fetchProduct['footer_text']) ?></textarea>
                                       
                                    </div>
                                </div>
                                <button type="submit" onclick="tinyMCE.triggerSave(true,true);" class="btn btn-primary mt-3 ">Edit Invoice Mail</button>
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
                    plugins: ' fullpage   autolink   visualblocks visualchars  image link media  codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount tinymcespellchecker a11ychecker imagetools mediaembed  linkchecker contextmenu colorpicker textpattern help code',
                    toolbar1: 'formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat | code | link image ',
                    image_title: true,
                    automatic_uploads: true,
                    file_picker_types: 'image',
                    file_picker_callback: function (cb, value, meta) {
                    var input = document.createElement('input');
                    input.setAttribute('type', 'file');
                    input.setAttribute('accept', 'image/*');
                    input.onchange = function () {
                    var file = this.files[0];
                    var formData = new FormData();
                    formData.append('images', file);
                    $.ajax({
                    url : 'include/insert.php?page=blog-subimage-upload',
                    type : 'POST',
                    data : formData,
                    dataType:"JSON",
                    processData: false, 
                    contentType: false,  
                    success : function(data) {
                        console.log(data);
                        cb(data.url, { title: data.title });
                    }
                });
                    // var reader = new FileReader();
                    // reader.onload = function () {
                    // var id = 'blobid' + (new Date()).getTime();
                    // var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
                    // var base64 = reader.result.split(',')[1];
                    // var blobInfo = blobCache.create(id, file, base64);
                    // blobCache.add(blobInfo);
                    // cb(blobInfo.blobUri(), { title: file.name });
                    // };
                    // reader.readAsDataURL(file);
                };
            input.click();
         }
        })
    </script>
</body>
</html>