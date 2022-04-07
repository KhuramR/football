<?php 
include_once 'header.php';
?>
        
        <!-- Breadcrumbs Section Start -->
		<div class="rs-breadcrumbs sec-color">
            <img src="<?=$url?>frontassets/images/breadcrumbs/team.jpg" alt="Breadcrubs" />
            <div class="breadcrumbs-inner">
    			<div class="container">
    				<div class="row">
    					<div class="col-md-12 text-center">
    						<h1 class="page-title">Our Team</h1>
    						<ul>
    							<li>
    								<a class="active" href="<?=$url?>">Home</a>
    							</li>
    							<li>Team</li>
    						</ul>
    					</div>
    				</div>
    			</div>
            </div>
		</div>
		<!-- Breadcrumbs Section End -->
        
        <!-- Our Team Start Here-->
		<div class="our-team-section team-inner-page sec-spacer">
			<div class="container">
				<div class="row">
					<?php 
					$select_team = mysqli_query($con,"SELECT * FROM `team_sheet` order by id desc");
					while($fetch_team = mysqli_fetch_array($select_team)){
					?>
					<div class="col-md-3 col-sm-6 col-xs-6">
						<div class="our-team">
							<img src="<?=$url?>uploads/users/<?=$fetch_team['image']?>" alt="" style="width: 100%;height: 350px;object-fit: cover;" />
							<div class="person-details">
								<div class="overly-bg"></div>
								<a href="<?=$url?>teamsheet-detail/<?=$fetch_team['link']?>"><h5 class="person-name"><?=$fetch_team['name']?></h5></a>
								<table class="person-info">
									<tbody>
										<tr>
											 <td>Born</td>
											 <td><?=$fetch_team['born']?></td>
									    </tr>
										<tr>
											 <td>Position</td>
											 <td><?=$fetch_team['position']?></td>
									    </tr>
										
										<tr>
											 <td>Present Club</td>
											 <td><?=$fetch_team['present_club']?></td>
									    </tr>
										
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<?php 
					}
					?>
					
				</div>
			</div>
		</div>
		<!-- Our Team end Here-->
        

<?php 
include_once 'footer.php';
?>