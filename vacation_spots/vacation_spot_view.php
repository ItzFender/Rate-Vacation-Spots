<?php include '../view/header.php'; ?>
<div id="main">
    <?php include '../view/sidebar.php'; ?>
    <div id="content">
        <h1><?php echo $vacation_spot_name; ?></h1>

        <div id="description">
            <p><?php echo $vacation_description ?></p>
        	<?php if(isset($_SESSION['logged_in'])){ ?>
            	<form action="index.php" method="POST">
            		<input type="hidden" name="vacation_spot_name" value="<?php echo $vacation_spot_name ?>" />
            		<input type="hidden" name="vacation_spot_id" value="<?php echo $vacation_spot_id ?>" />
					<input type="hidden" name="action" value="show_add_review_form" />
					<input type="submit" value="Add Review" />
				</form>
			<?php } ?>
            <p>
				<h2>Reviews:</h2>
            </p>
        </div>
        <div>
        	<ul>
	        	<?php foreach ($reviews as $review){ ?>
	        	<li class = review>
		        	<p class="user"> <?php echo $review['User']; ?>
		        		- <small class="ReviewDate" >
							<?php echo date('l M jS', $review['PostDate']); ?>
						</small>
					</p>
					<p>
						<?php echo $review['Review']; ?>
					</p>
					<?php if(isset($_SESSION['user']) && ($_SESSION['user'] == $review['UserId'])){ ?>
						<p>
							<form class="review_buttons" action="index.php" method="post">
								<input type="hidden" name="vacation_spot_id" value="<?php echo $review['VacationSpotId'] ?>" />
								<input type="hidden" name="review_id" value="<?php echo $review['ReviewId'] ?>" />
								<input type="hidden" name="action" value="delete_review" />
								<input type="submit" name="deleteReview" value="Delete Review" />
							</form> <form class="review_buttons" action="index.php" method="post">
								<input type="hidden" name="vacation_spot_id" value="<?php echo $review['VacationSpotId'] ?>" />
								<input type="hidden" name="review_id" value="<?php echo $review['ReviewId'] ?>" />
								<input type="hidden" name="action" value="show_edit_review_form" />
								<input type="submit" name="editReview" value="Edit Review" />
							</form>
							<br />
						</p>
					<?php } ?>
					<hr />
				</li>
        		<?php } unset($review); ?>
        	</ul>
        </div>
    </div>
</div>

<?php include '../view/footer.php'; ?>