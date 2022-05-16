<?php require_once __DIR__ . '/../../../public/assets/db.php'; ?>

<div class="opening-hours">

        <div class="horaires">

            <ul>
            <?php foreach($jours as $key => $value) : ?>
                    <?php if ($key === $currentTime) : ?>
                        <li class="active-horaires"><?=$key . ' : ' .  $value?></li>
                    <?php else : ?>
                        <li><?=$key . ' : ' . $value?></li>
                        <?php endif; ?>
                        <?php endforeach; ?>
            </ul>
        </div>

</div> 

