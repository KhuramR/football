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
                    <h1 class="page-title">Reset Password</h1>
                    <ul>
                        <li>
                            <a class="active" href="<?=$url?>">Home</a>
                        </li>
                        <li>Reset Password</li>
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
        <div class="contact-comment-section" style="width: 40%;">
            <h3>Reset Password</h3>
            <div id="form-message"></div>
            <?php
            if (!isset($_GET["status"])) {
            ?>
                <form id="forgot">

                    <fieldset>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label><?= content(131) ?>*</label>
                                    <input type="email" class="form-control" id="f-name" name="email" placeholder="Email">
                                </div>
                            </div>

                        </div>


                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group mb-0">
                                    <input class="btn-send" type="submit" value="Reset">
                                </div>
                            </div>
                        </div>

                    </fieldset>
                </form>
                <?php
            } else {
                if ($_GET["status"] == "recover") {
                ?>
                    <form id="update">
                        <input type="hidden" name="code" value="<?= $_GET["code"] ?>">
                        <input type="hidden" id="page" value="changepass">
                        <input type="hidden" id="design" value="front">
                        <input type="hidden" name="userid" value="<?= base64_decode($_GET["trx"]) ?>">
                        <fieldset>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label><?= content(408) ?>*</label>
                                        <input type="password" class="form-control" id="f-name" name="pass" placeholder="Email">
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label><?= content(409) ?>*</label>
                                        <input type="password" class="form-control" id="f-name" name="confirm_pass" placeholder="Email">
                                    </div>
                                </div>

                            </div>


                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group mb-0">
                                        <input class="btn-send" type="submit" value="Reset">
                                    </div>
                                </div>
                            </div>

                        </fieldset>
                    </form>
            <?php }
            } ?>
        </div>
        <!-- </center> -->
    </div>
</div>
<!-- Contact Section End -->



<?php
include_once 'footer.php';
?>