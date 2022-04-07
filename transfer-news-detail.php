<?php 
include_once 'header.php';
if (isset($_GET['link'])) {
    $blogid = $_GET['link'];
    $selectblog = mysqli_query($con, "SELECT * FROM `blogs` where link = '$blogid'");
    $fetchblog = mysqli_fetch_array($selectblog);
}
?>
        <!-- Breadcrumbs Section Start -->
		<div class="rs-breadcrumbs sec-color">
            <img src="<?=$url?>frontassets/images/breadcrumbs/blog-left.jpg" alt="Breadcrubs-image" />
            <div class="breadcrumbs-inner">
    			<div class="container">
    				<div class="row">
    					<div class="col-md-12 text-center">
    						<h1 class="page-title">Transfer News</h1>
    						<ul>
    							<li>
    								<a class="active" href="<?=$url?>">Home</a>
    							</li>
    							<li>News</li>
    						</ul>
    					</div>
    				</div>
    			</div>
            </div>
		</div>
		<!-- Breadcrumbs Section End -->
        
        <!-- Blog Single Start Here -->
		<div class="single-blog-details sec-spacer">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-sm-12">
						<div class="single-image">
							<img src="<?= $url ?>uploads/blogs/<?= $fetchblog['image'] ?>" alt="single">
						</div>
						<h3><?= $fetchblog['title'] ?></h3>
                        <?=  base64_decode($fetchblog['long_description']) ?>
						<div class="share-section">
							<div class="row">
								<div class="col-sm-6 col-xs-12 life-style">
									<span class="author"> 
										<a href="javascript:void(0)"><i class="fa fa-user-o" aria-hidden="true"></i> Admin </a>
									</span> 
									
									<span class="date">
										<i class="fa fa-calendar" aria-hidden="true"></i> <?php
                                    $both = $fetchblog['date_time'];
                                    echo $mysqldate = date('F j, Y', strtotime($both));
                                    ?> 
									</span>
									
								</div>
								
							</div>
						</div>



                               
					</div>
                    <div class="col-md-3 col-sm-12">
                        <!-- Blog Single Sidebar Start Here -->
						<div class="sidebar-area">
							
                            <div class="recent-post-area">
                                <span class="title"> Recent Post</span>
                                <ul class="news-post">
                                     <?php
                                        $select_blog = mysqli_query($con, "SELECT * FROM `blogs` where link != '$blogid' order by id desc LIMIT 3");
                                        while ($fetch_blog = mysqli_fetch_array($select_blog)) {
                                        ?>
                                    <li>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 content">
                                                <div class="item-post">
                                                    <div class="row">
                                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 paddimg-right-none">
                                                            <img src="<?= $url ?>uploads/blogs/<?= $fetch_blog["image"] ?>" alt="" title="News image" />
                                                        </div>
                                                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                                            <h4><a href="<?= $url ?>transfer-news-detail/<?= $fetch_blog['link'] ?>"><?= $fetch_blog["title"] ?></a></h4>
                                                            <span class="date"><i class="fa fa-calendar" aria-hidden="true"></i> <?php
                                                            $both = $fetch_blog['date_time'];
                                                            echo $mysqldate = date('F j, Y', strtotime($both)); ?></span>
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
        <!-- Blog Single End Here -->
		
<?php 
include_once 'footer.php';
?>