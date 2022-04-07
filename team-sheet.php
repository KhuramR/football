
      <?php include("include/function.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Team Sheet - <?= $fetchWebsite['site_name'] ?></title>
    <link rel="icon" type="image/x-icon" href="../uploads/settings/<?= $fetchWebsite['site_favicon'] ?>"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <link href="plugins/notification/snackbar/snackbar.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/scrollspyNav.css" rel="stylesheet" type="text/css" />
</head>
<style>
    .tox-notifications-container {
    display: none !important;
}
</style>

<body data-spy="scroll" data-target="#navSection" data-offset="100">
      <?php include("include/begin-nav.php"); ?>

    <!--  BEGIN NAVBAR  -->
    <div class="sub-header-container">
        <header class="header navbar navbar-expand-sm">
            <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg></a>

            <ul class="navbar-nav flex-row">
                <li>
                    <div class="page-header">

                        <nav class="breadcrumb-one" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span>Team Sheet</span></li>
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
<?php 
if(isset($_GET['edit'])){
$id = htmlentities(@mysqli_real_escape_string($con, $_GET['edit']));
$selectProduct = mysqli_query($con, "SELECT * FROM team_sheet where id='$id'");
$fetch = mysqli_fetch_array($selectProduct);
}
?>

        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="container">


                    <div class="row">
                        <div id="flFormsGrid" class="col-lg-12 ">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-header">
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h4>Team Sheet</h4>
                                        </div>                                                                        
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area">
                                    <form id="<?=isset($_GET['edit'])?"update" :"add"?>">
                                        <div class="form-row mb-4">
                                            <div class="form-group col-md-6">
                                                <label for="inputEmail4">Name</label>
                                                <input type="text" class="form-control" id="names" value="<?= @$fetch['name'] ?>" name="name" placeholder="Name">
                                                <input type="hidden" name="id" value="<?=@$id?>">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputPassword4">Position</label>
                                                <input type="text" placeholder="Position" class="form-control" name="position"  value="<?= @$fetch['position'] ?>" id="inputPassword4" >
                                                  <input type="hidden" value="back" id="design">
                                         <input type="hidden"  id="page" value="team_sheet">
                                            </div>

                                            <div class="form-group col-md-6 d-none">
                                                <label for="inputPassword4">link</label>
                                                <input type="text" placeholder="Position" class="form-control" name="link"  value="<?= @$fetch['position'] ?>" id="link" >
                                                  
                                            </div>
                                            
                                        </div>
                                       
                                       
                                        <div class="form-row mb-4">
                                          
                                            <div class="form-group col-md-6">
                                                <label for="inputPassword4">Team</label>
                                                <input type="text" placeholder="Team" class="form-control" name="team"  value="<?= @$fetch['team'] ?>" id="inputPassword4" >
                                            </div> 
                                            <div class="form-group col-md-6">
                                            <label for="inputAddress">Present Club</label>
                                            <input type="text" class="form-control" id="inputAddress" name="present_club" value="<?= @$fetch['present_club'] ?>" placeholder="Present Club">
                                            </div>
                                          
                                        </div>
                                        <div class="form-row mb-4">
                                          <div class="form-group col-md-6">
                                                <label for="inputPassword4">Weight</label>
                                                <input type="text" placeholder="Weight" class="form-control"  value="<?= @$fetch['weight'] ?>" name="weight" id="inputPassword4" >
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputPassword4">Height</label>
                                                <input type="text" placeholder="Height" class="form-control"  value="<?= @$fetch['height'] ?>" name="height" id="inputPassword4" >
                                            </div> 
                                            <div class="form-group col-md-6">
                                                <label for="inputPassword4">Birth Place</label>
                                                <input type="text" placeholder="Birth Place" class="form-control"  value="<?= @$fetch['birth_place'] ?>" name="birth_place" id="inputPassword4" >
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputPassword4">Cityzenship</label>
                                                <input type="text" placeholder="Cityzenship" class="form-control"  value="<?= @$fetch['cityzenship'] ?>" name="cityzenship" id="inputPassword4" >
                                            </div>
                                        
                                          
                                        </div>
                                        <div class="form-row mb-4">
                                        <div class="form-group col-md-6">
                                                <label for="inputPassword4">Matches</label>
                                                <input type="text" placeholder="Matches" class="form-control"  value="<?= @$fetch['matches'] ?>" name="matches" id="inputPassword4" >
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputPassword4">Goals</label>
                                                <input type="text" placeholder="Goals" class="form-control"  value="<?= @$fetch['goals'] ?>" name="goals" id="inputPassword4" >
                                            </div>
                                        
                                          
                                        </div>
                                        <div class="form-row mb-4">
                                        <div class="form-group col-md-6">

                                                <label for="inputPassword4">Date of Birth</label>
                                                <input type="date" placeholder="Born" class="form-control"  value="<?= @$fetch['born'] ?>" name="born" id="inputPassword4" >
                                           
                                        </div>
                                        <div class="form-group col-md-6">
                                                <label for="inputPassword4">Image</label>
                                                <input type="file"  name="image" class="form-control" id="inputPassword4" >
                                            </div>
                                        </div>
                                        <div class="form-group mb-4">
                                            <label for="inputAddress">Overview</label>
                                            <textarea type="text" class="form-control" id="mytextareaa"  name="overview" placeholder="Overviewn"><?= base64_decode(@$fetch['overview']) ?></textarea>
                                        </div>
                                        
                                      <button type="submit" class="btn btn-primary mt-3"><?=isset($_GET['edit'])?"Edit" :"Add"?> Teamsheet</button>
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
$("#names").on("input", function() {
            value = $(this).val();
            value = value.replace(/\s+/g, '-').toLowerCase();
            value = value.replace(/[^a-zA-Z-]/g, "");
            value = value.toLowerCase();
            $("input[name='link']").val(value);
        });

        // tiny
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
                    // input.onchange = function () {
                    // var file = this.files[0];
                    // var formData = new FormData();
                    // formData.append('images', file);
                //     $.ajax({
                //     url : 'include/insert.php?page=blog-subimage-upload',
                //     type : 'POST',
                //     data : formData,
                //     dataType:"JSON",
                //     processData: false, 
                //     contentType: false,  
                //     success : function(data) {
                //         console.log(data);
                //         cb(data.url, { title: data.title });
                //     }
                // });
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
                // };
            input.click();
         }
        })
        // end tiny
 jQuery(document).on("click",".product .trash-product" , function(){
 $(this).closest('.product').remove();

    return false;

});

    $(".add-product").on('click', function () {
    
var tickets = '<div  class="card-body product ">'+
                                        ' <div class="form-row ">'+
                                             '<div class="col-md-1 mb-1">'+
                                               ' <label for="validationCustom01">Color</label>'+
                                               ' <input type="text" class="form-control threshold" id="validationCustom01" placeholder="Color" name="color[]"  required>'+
                                           '</div>'+
                                           ' <div class="col-md-3 mb-3">'+
                                              '  <label for="validationCustom01">Icon</label>'+
                                                '<input type="file" class="form-control threshold" id="validationCustom01" placeholder="Color" name="icon[]"  required>'+
                                                 '</div>     '+
                                            '<div class="col-md-1 mb-1">'+
                                               ' <label for="validationCustom01">Price USD</label>'+
                                               ' <input type="text" class="form-control threshold" id="validationCustom01" placeholder="$" name="usd[]"  required>'+
                                                ' </div> '+
                                              '<div class="col-md-1 mb-1">'+
                                               ' <label for="validationCustom01">Price GB</label>'+
                                               ' <input type="text" class="form-control threshold" id="validationCustom01" placeholder="£" name="gb[]"  required>'+
                                               ' </div>  '+
                                            ' <div class="col-md-2 mb-2">'+
                                               ' <label for="validationCustom01">Price CAD</label>'+
                                               ' <input type="text" class="form-control threshold" id="validationCustom01" placeholder="$" name="cad[]"  required>'+
                                                '  </div>  '+
                                            ' <div class="col-md-2 mb-2">'+
                                                '<label for="validationCustom01">Price EURO</label>'+
                                               ' <input type="euro" class="form-control threshold" id="validationCustom01" placeholder="€" name="euro[]"  required>'+
                                               ' </div> '+
                                            '<div class="col-md-1 mb-1">'+
                                                '<label for="validationCustom01">Stock</label>'+
                                                '<input type="text" class="form-control threshold" id="validationCustom01" placeholder="Stock" name="stock[]"  required>'+
                                                ' </div>'+
                                              ' <div class="col-md-1 mb-1">'+
          ' <button type="button" class="btn btn-danger mt-34 trash-product">-</button>'+
        '</div>'+
                                       ' </div>'+
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