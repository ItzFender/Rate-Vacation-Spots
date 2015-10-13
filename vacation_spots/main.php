<?php include '../view/header.php'; ?>
<div id="main">
	<ul>
	<?php foreach($vacation_spots as $vacation_spot) : ?>
			<li>
				<?php echo '<img Width="75"  src="data:image/jpeg;base64,' . base64_encode( $vacation_spot['VacationPic'] ) . '" />'; ?>

				<a href="?action=view_vacation_spot&vacation_spot_id=
					<?php echo $vacation_spot['VacationSpotId']; ?>">
					<?php echo $vacation_spot['VacationSpot']; ?>

				</a>
				
			</li>	
	<?php endforeach; ?>
	</ul>
</div>
<?php include '../view/footer.php'; ?>