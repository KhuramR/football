<?php
// include "connection.php";

function content($id)
{

    $con = db();

    $selectContent = mysqli_query($con, "SELECT * FROM contents where id='$id'");

    $fetchContent = mysqli_fetch_array($selectContent);

    $desc = str_replace("<p>", "", base64_decode($fetchContent['content']));
    $desc = str_replace("</p>", "", $desc);

    if (@$_SESSION['user_role'] == 1) {
        return "<span class='content$id'>" . $desc . "</span>" . "<label class='topcorner fa fa-edit cursor content-x cursor ml-2' style='z-index:100;font-size: 14px; '  title='Edit' id='content$id'></label>";
    } else {
        return base64_decode($fetchContent['content']);

    }

}

function img($id)
{

    $con = db();
    $selectImg = mysqli_query($con, "SELECT * FROM page_image where id='$id'");
    $fetchContent = mysqli_fetch_array($selectImg);

    if (@$_SESSION['user_role'] == 1) {
        // return ($fetchContent['jp_content'])."<label class='topcorner fa fa-edit content-x cursor' id='content$id'></label>";
        return array($fetchContent['image'], " class='image-x cursor'", " id='img$id' style=' position:relative; '", "id='img$id'", "image-x cursor");

    } else {
        return array($fetchContent['image'], '', '');

    }

}
