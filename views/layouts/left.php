<?php

use deyraka\materialdashboard\widgets\Menu;
use yii\helpers\Html;

?>
<div class="sidebar" data-color="purple" data-image="../vendor/deyraka-material/yii2-material-dashboard/assets/img/sidebar-2.jpg">
    <!--
    Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"
    Tip 2: you can also add an image using data-image tag
-->
    <div class="logo">
        <h1  class="simple-text logo-normal">
          Klinik Apps
        </h1>
    </div>
    <div class="sidebar-wrapper">
        <?= Menu::widget([
            'items' => [
                ['label' => 'Dashboard', 'icon' => 'dashboard', 'url' => ['site/index']],
                ['label' => 'Master Data', 'icon' => 'library_books', 'items' => [
                    ['label' => 'Pasien', 'icon' => 'person', 'url' => ['pasien/index']],
                    ['label' => 'Poli', 'icon' => 'home_health', 'url' => ['polis/index']],
                    ['label' => 'Dokter', 'icon' => 'person', 'url' => ['dokters/index']],      
                ]],
            ]
        ]); ?>
    </div>
</div>