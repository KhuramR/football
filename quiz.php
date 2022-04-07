<?php
include("include/function.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Quiz - <?=$fetchWebsite['site_name'] ?></title>
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
                                <li class="breadcrumb-item active" aria-current="page"><span>Quiz</span></li>
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
            if(isset($_GET['edit'])){
            $id = htmlentities(mysqli_real_escape_string($con, $_GET['edit']));
            $selectProduct = mysqli_query($con, "SELECT * FROM `options` JOIN quiz_questions on options.question_id = quiz_questions.id WHERE options.question_id = '$id'  OR quiz_questions.id='$id'");
            $fetchProduct = mysqli_fetch_array($selectProduct);
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
                                        <h4>Edit Quiz</h4>
                                    <?php   } else { ?>
                                        <h4>Add Quiz</h4>
                                    <?php  } ?>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
                            <form id="<?= isset($_GET['edit']) ? "update" : "add" ?>">
                            <input type="hidden" value="back" id="design">
                            <input type="hidden" value="<?=@$id?>" name="id">
                            <input type="hidden" id="page" value="quiz">
                            <div class="row">
                                            <?php 
                                            if(isset($_GET['edit'])){
                                            ?>
                            <div class="col-md-12">
											<label class="col-form-control float-left">Video / image (500x270)</label>
											<input type="file" accept="image/*,video/*" class="form-control" name="video-question1" placeholder="Answer" >
											</div>
                            <div class="form-group col-lg-12">
											<label class="col-form-control float-left">Question 1</label>
											<input type="text" class="form-control" name="Question1" placeholder="Question" value="<?=@$fetchProduct['question']?>" ><a href="javascript:void(0)"><i class="fa fa-plus text-info" onClick="Function1()"> Options</i></a>
                                            
										<div class="row">
											<div class="form-group col-lg-6" id="options1" style="display: none;">
											<?php 
                                            $select_option = mysqli_query($con,"SELECT * FROM `options` WHERE question_id = '$id'");
                                            $z= 1;
                                            $a= 1;
                                            while($fetch_option = mysqli_fetch_array($select_option)){
                                            ?>
											<input type="text" class="form-control"   value="<?=@$fetch_option['options']?>"  name="option<?=$z++?>" placeholder="Option <?=$a++?>" >
											<br>
                                            <?php 
                                            }
                                            ?>
											
										
										</div>
                                        <div class="form-group col-lg-6" id="ans1div" style="display: none;">
											<?php 
                                            $option_select = mysqli_query($con,"SELECT * FROM `options` WHERE question_id = '$id'");
                                            $i = 1;
                                            $d = 1;
                                            while($option_fetch = mysqli_fetch_array($option_select)){
                                            ?>
											<input type="text" class="form-control"   value="<?=@$option_fetch['answers']?>"  name="answer<?=$i++?>" placeholder="Answer <?=$d++?>" >
											<br>
                                            <?php 
                                            }
                                            ?>
											
										
										</div>
                                        </div>
                                        
                                           
                                      
										</div>
                                        
                                        <?php 
                                        }else{
                                            ?>
                                           <div class="col-md-12">
											<label class="col-form-control float-left">Video / image (500x270)</label>
											<input type="file" accept="image/*,video/*" class="form-control" name="video-question1" placeholder="Answer" >
											</div>
                            <div class="form-group col-lg-12">
											<label class="col-form-control float-left">Question 1</label>
											<input type="text" class="form-control" name="Question1" placeholder="Question" value="<?=@$fetchProduct['question']?>" ><a href="javascript:void(0)"><i class="fa fa-plus text-info" onClick="Function1()"> Options</i></a>
                                            
									
                                        
                                            <div class="row">
											<div class="form-group col-lg-6" id="options1" style="display: none;">
											
											<input type="text" class="form-control" name="A1" placeholder="option A" >
											<br>
											<input type="text" class="form-control" name="B1" placeholder="option B" >
											<br>
											<input type="text" class="form-control" name="C1" placeholder="option C" >
											<br>
											<input type="text" class="form-control" name="D1" placeholder="option D" >
                                            <br>
											<input type="text" class="form-control" name="E1" placeholder="option E" >
                                            <br>
											<input type="text" class="form-control" name="F1" placeholder="option F" >
										
										</div>
                                        <div class="form-group col-lg-6" id="ans1div" style="display: none;">
											
											<input type="text" class="form-control" name="q1a1" placeholder="Answer A" >
											<br>
											<input type="text" class="form-control" name="q1a2" placeholder="Answer B" >
											<br>
											<input type="text" class="form-control" name="q1a3" placeholder="Answer C" >
											<br>
											<input type="text" class="form-control" name="q1a4" placeholder="Answer D" >
                                            <br>
											<input type="text" class="form-control" name="q1a5" placeholder="Answer E" >
                                            <br>
											<input type="text" class="form-control" name="q1a6" placeholder="Answer F" >
										
										</div>
                                        </div>
                                      
										</div>
                                        <!-- <div class="col-md-6">
											<label class="col-form-control float-left">Answer</label>
											<input type="text" class="form-control" name="Answer1" placeholder="Answer" >
											</div> -->

                                            <div class="col-md-12">
											<label class="col-form-control float-left">Video / Image (500x270)</label>
											<input type="file" accept="image/*,video/*" class="form-control" name="video-question2" placeholder="Answer" >
											</div>
                                            <div class="form-group col-lg-12">
											<label class="col-form-control float-left">Question 2</label>
											<input type="text" class="form-control" value="<?=@$fetchProduct['question']?>" name="Question2" placeholder="Question"><a href="javascript:void(0)"><i class="fa fa-plus text-info" onClick="Function2()"> Options</i></a>
                                           
											
                                       
                                            <div class="row">
											<div class="form-group col-lg-6" id="options2" style="display: none;">
											
											<input type="text" class="form-control"  name="A2" placeholder="option A" >
											<br>
											<input type="text" class="form-control"  name="B2" placeholder="option B" >
											<br>
											<input type="text" class="form-control"  name="C2" placeholder="option C" >
											<br>
											<input type="text" class="form-control"  name="D2" placeholder="option D" >
                                            <br>
											<input type="text" class="form-control"  name="E2" placeholder="option E" >
                                            <br>
											<input type="text" class="form-control"  name="F2" placeholder="option F" >
										
										</div>
                                        <div class="form-group col-lg-6" id="ans2div" style="display: none;">
											
											<input type="text" class="form-control"  name="q2a1" placeholder="Answer A" >
											<br>
											<input type="text" class="form-control"  name="q2a2" placeholder="Answer B" >
											<br>
											<input type="text" class="form-control"  name="q2a3" placeholder="Answer C" >
											<br>
											<input type="text" class="form-control"  name="q2a4" placeholder="Answer D" >
                                            <br>
											<input type="text" class="form-control"  name="q2a5" placeholder="Answer E" >
                                            <br>
											<input type="text" class="form-control"  name="q2a6" placeholder="Answer F" >
										
										</div>
                                        </div>
                                     
										</div>
                                        <?php   }
                                            ?>
                                        <!-- <div class="col-md-6">
											<label class="col-form-control float-left">Answer</label>
											<input type="text" class="form-control" name="Answer2" placeholder="Answer" >
											</div> -->
                            </div>
                           
                                <button type="submit" onclick="tinyMCE.triggerSave(true,true);" class="btn btn-primary mt-3 "><?= isset($_GET['edit']) ? "Edit" : "Add" ?> Quiz</button>
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
<script>
function Function1() {
  // Focus = Changes the background color of input to yellow
  $('#options1').fadeToggle(500);
  $('#ans1div').fadeToggle(500);

}
	function Function2() {
  // Focus = Changes the background color of input to yellow
  $('#options2').fadeToggle(500);
  $('#ans2div').fadeToggle(500);;

}
	function Function3() {
  // Focus = Changes the background color of input to yellow
  $('#options3').fadeToggle(500);;
}
	function Function4() {
  // Focus = Changes the background color of input to yellow
  $('#options4').fadeToggle(500);;
}
	function Function5() {
  // Focus = Changes the background color of input to yellow
  $('#options5').fadeToggle(500);;
}
	function Function6() {
  // Focus = Changes the background color of input to yellow
  $('#options6').fadeToggle(500);;
}
	function Function7() {
  // Focus = Changes the background color of input to yellow
  $('#options7').fadeToggle(500);;
}
	function Function8() {
  // Focus = Changes the background color of input to yellow
  $('#options8').fadeToggle(500);;
}
	function Function9() {
  // Focus = Changes the background color of input to yellow
  $('#options9').fadeToggle(500);;
}
	function Function10() {
  // Focus = Changes the background color of input to yellow
  $('#options10').fadeToggle(500);;
}


</script>