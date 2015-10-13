<?php include '../view/header.php'; ?>
<div id="main">
    <?php include '../view/sidebar.php'; ?>
    <div id="content">
        <h1><?php echo $vacation_spot['VacationSpot']; ?></h1>

        <div id="form">
            <form id="addReviewForm" action="index.php" method="post">
				<textarea rows="7" cols="60" placeholder="Enter your review here!" name="review"></textarea><br /><br />
				<input type="hidden" name="vacation_spot_id" value="<?php echo $vacation_spot['VacationSpotId'] ?>" />
				<input type="hidden" name="action" value="add_review" />
				<input type="submit" value="Add Review" />
			</form>
        </div>
    </div>
</div>

<?php include '../view/footer.php'; ?>