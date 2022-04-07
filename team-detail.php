<?php 
include_once 'header.php';
if (isset($_GET['link'])) {
    $blogid = $_GET['link'];
    $selectblog = mysqli_query($con, "SELECT * FROM `team_sheet` where link = '$blogid'");
    $fetch_team = mysqli_fetch_array($selectblog);
}
?>
    <style>
		.rs-team-single-section .rs-team-single-text .single-details .single-team-info table tr td h4{
			color: #505050;
		}
		.rs-team-single-section .rs-team-single-text .single-details{
			background-color: #fbc02d;
		}
	</style>    
        <!-- Breadcrumbs Section Start -->
		<div class="rs-breadcrumbs sec-color">
            <img src="<?=$url?>frontassets/images/breadcrumbs/team-single-header.jpg" alt="Breadcrubs"  />
            <div class="breadcrumbs-inner">
    			<div class="container">
    				<div class="row">
    					<div class="col-md-12 text-center">
    						<h1 class="page-title">Teamsheet Detail</h1>
    						<ul>
    							<li>
    								<a class="active" href="<?=$url?>">Home</a>
    							</li>
    							<li>Teamsheet Detail</li>
    						</ul>
    					</div>
    				</div>
    			</div>
            </div>
		</div>
		<!-- Breadcrumbs Section End -->


		<!-- Team Single Start -->
		<div class="rs-team-single-section team-inner-page sec-spacer">
			<div class="container">
				<div class="row">
					<div class="col-md-4">
						<div class="rs-team-single-image">
							<img src="<?=$url?>uploads/users/<?=$fetch_team['image']?>" alt="" style="width: 100%;height: 350px;object-fit: cover;">
							<div class="player-info">
								<h3 class="player-title"><?=$fetch_team['name']?></h3>
								<span class="player-position"><?=$fetch_team['position']?></span>
								<!-- <span class="player-club"><?=$fetch_team['team']?></span> -->
								<!-- <div class="social-icon">
									<a href="#"><i class="fa fa-facebook-f"></i></a>
									<a href="#"><i class="fa fa-twitter"></i></a>
									<a href="#"><i class="fa fa-linkedin"></i></a>
								</div> -->

							</div>
						</div>
					</div>
					<div class="col-md-8">
						<div class="rs-team-single-text mb-50">
							<h3>Personal Info</h3>
							<div class="row single-details mb-30">
								<div class="col-md-8 single-team-info">
									<table>
										<tr>
											<td><h3>Born:</h3></td>
											<td><h4><?=$fetch_team['born']?></h4></td>
										</tr>
										<tr>
											<td><h3>Weight:</h3></td>
											<td><h4><?=$fetch_team['weight']?>kg</h4></td>
										</tr>
										<tr>
											<td><h3>Height:</h3></td>
											<td><h4><?=$fetch_team['height']?>cm</h4></td>
										</tr>
										<tr>
											<td><h3>Birth Place:</h3></td>
											<td><h4><?=$fetch_team['birth_place']?></h4></td>
										</tr>
										<tr>
											<td><h3>Citizenship:</h3></td>
											<td><h4><?=$fetch_team['cityzenship']?></h4></td>
										</tr>
									</table>
								</div>
								
							</div>
							<h3>Career Info</h3>
							<div class="row single-details">
								<div class="col-md-12 single-team-info">
									<table>
										<tr>
											<td><h3>Team</h3></td>
											<td><h4><?=$fetch_team['team']?></h4></td>
										</tr>
										<tr>
											<td><h3>Matches:</h3></td>
											<td><h4><?=$fetch_team['matches']?></h4></td>
										</tr>
										<tr>
											<td><h3>Goals:</h3></td>
											<td><h4><?=$fetch_team['goals']?> Goals</h4></td>
										</tr>
										
										<tr>
											<td><h3>Present Club:</h3></td>
											<td><h4><?=$fetch_team['present_club']?></h4></td>
										</tr>
										
									</table>
								</div>								
							</div>							
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<h3>Overview</h3>
						<div class="team-information-text">
							<p class="mb-0"><?=base64_decode($fetch_team['overview'])?></p> 
						</div>
                       
                    </div>
				</div>
				<!-- <div class="row">
                    <div class="col-sm-12">
                        <div class="team-single-comment">
                            <h3>Post a Comment</h3>
                            <textarea name="comments" placeholder="Comments here"></textarea>
                            <input type="submit" value="Submit">
                        </div>
                    </div>
				</div> -->
			</div>
		</div>
		<!-- Team Single End  -->
		
<?php 
include_once 'footer.php';
?>