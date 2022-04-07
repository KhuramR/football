<?php
include_once 'header.php';
?>
<!-- Breadcrumbs Section Start -->
<div class="rs-breadcrumbs sec-color">
    <img src="<?= $url ?>frontassets/images/breadcrumbs/contact.jpg" alt="Breadcrubs" />
    <div class="breadcrumbs-inner">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1 class="page-title">Sign In</h1>
                    <ul>
                        <li>
                            <a class="active" href="<?=$url?>">Home</a>
                        </li>
                        <li>Sign In</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumbs Section End -->


<!-- Contact Section Start -->
<div class="contact-page-section sec-spacer" style="display: flex;justify-content: center;align-items: center;">
    <div class="container" style="display: contents;">


        <!-- <center> -->
        <div class="contact-comment-section" style="width: fit-content;">
            <h3>Login</h3>
            <div id="form-message"></div>
            <form id="login">
                <input type="hidden" name="redirect" value="<?= @base64_decode($_GET["redirect"]) ?>">
                <fieldset>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label><?= content(139) ?>*</label>
                                <input type="email" class="form-control" id="f-name" name="email" placeholder="Email">
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label><?= content(140) ?>*</label>
                                <input type="password" class="form-control" id="l-name" name="password" placeholder="Password">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8 col-sm-12 col-xs-12">
                            <div class="form-group">
                               <p>Don't have and account? <a href="<?=$url?>register">Sign Up</a></p>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12 col-xs-12">
                            <div class="form-group">
                            <p><a href="<?=$url?>forgot-password">Forgot Password</a></p>

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group mb-0">
                                <input class="btn-send" type="submit" value="Login">
                            </div>
                        </div>
                    </div>

                </fieldset>
            </form>
        </div>
        <!-- </center> -->
    </div>
</div>
<!-- Contact Section End -->



<?php
include_once 'footer.php';
?>