 <div id="sidebar">
        <h2>Vacation Spots</h2>
        <ul class="nav">
            <!-- display links for all vacation spots -->
            <?php foreach($vacation_spots as $a_vacation_spot) : ?>
            <li>
                <a href="../vacation_spots/index.php?action=view_vacation_spot&vacation_spot_id=<?php echo $a_vacation_spot['VacationSpotId']; ?>">
                    <?php echo $a_vacation_spot['VacationSpot']; ?>
                </a>
            </li>
            <?php endforeach; unset($a_vacation_spot); ?>
        </ul>
    </div>