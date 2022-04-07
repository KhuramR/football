<?php
include_once 'header.php';
?>
<!-- Breadcrumbs Section Start -->
<div class="rs-breadcrumbs sec-color">
    <img src="<?= $url ?>frontassets/images/breadcrumbs/blog-left.jpg" alt="Breadcrubs-image" />
    <div class="breadcrumbs-inner">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1 class="page-title">Transfer News</h1>
                    <ul>
                        <li>
                            <a class="active" href="<?=$url?>">Home</a>
                        </li>
                        <li>Transfer News</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumbs Section End -->

<!-- Home Blog Start Here -->
<div id="rs-blog" class="rs-blog sec-spacer">
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-ms-12">
                <div class="row">
                    <?php
                    $select_news = mysqli_query($con, "SELECT * FROM `blogs` order by id desc");
                    while ($fetch_news = mysqli_fetch_array($select_news)) {
                    ?>
                        <div class="col-md-4 col-sm-6 col-xs-6">
                            <div class="single-blog-slide">
                                <div class="images">
                                    <a href="<?= $url ?>transfer-news-detail/<?= $fetch_news['link'] ?>"><img src="<?= $url ?>uploads/blogs/<?= $fetch_news['image'] ?>" alt="News Image" style="width: 100%;object-fit: cover;height: 224px;"></a>
                                </div>
                                <div class="blog-details">
                                    <span class="date"><i class="fa fa-calendar-check-o"></i>
                                        <?php
                                        $both = $fetch_news['date_time'];
                                        echo $mysqldate = date('j F  Y', strtotime($both));
                                        ?>
                                    </span>
                                    <h3><a href="<?= $url ?>transfer-news-detail/<?= $fetch_news['link'] ?>"><?= $fetch_news['title'] ?> </a></h3>
                                    <p><?= base64_decode($fetch_news['short_description']) ?></p>
                                    <div class="read-more">
                                        <a href="<?= $url ?>transfer-news-detail/<?= $fetch_news['link'] ?>">Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php }
                    ?>
                    
                </div>
                <!-- <div class="row">
                    <div class="col-sm-12">
                        <div class="default-pagination text-center">
                            <ul>
                                <li><a href="#"><i class="fa fa-angle-left"></i>Previous</a></li>
                                <li class="active"><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#">5</a></li>
                                <li><a href="#">Next<i class="fa fa-angle-right"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div> -->
            </div>
            <div class="col-md-3 col-sm-12">
                <!-- Blog Single Sidebar Start Here -->
                <div class="sidebar-area">
                   
                  
                    <div class="recent-post-area">
                        <span class="title"> Recent News</span>
                        <ul class="news-post">
                        <?php
                                        $select_news_recent = mysqli_query($con, "SELECT * FROM `blogs` order by id desc LIMIT 0,3");
                                        while ($fetch_news_recent = mysqli_fetch_array($select_news_recent)) {
                                        ?>
                            <li>
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 content">
                                        <div class="item-post">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 paddimg-right-none">
                                                    <img src="<?= $url ?>uploads/blogs/<?= $fetch_news_recent["image"] ?>" alt="" title="News image" />
                                                </div>
                                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                                    <h4><a href="<?= $url ?>transfer-news-detail/<?= $fetch_news['link'] ?>"><?= $fetch_news_recent["title"] ?></a></h4>
                                                    <span class="date"><i class="fa fa-calendar" aria-hidden="true"></i> 
                                                    <?php
                                                            $both = $fetch_news_recent['date_time'];
                                                            echo $mysqldate = date('j F Y', strtotime($both)); ?>
                                                            </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <?php } ?>
                            
                        </ul>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Home Blog End Here -->



<?php
include_once 'footer.php';
?>