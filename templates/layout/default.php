<?php
/**
 * CakePHP : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */
echo $this->element('nav');
echo $this->element('slide');
$cakeDescription = 'CakePHP: the rapid development php framework';

?>
    <!DOCTYPE html>
    <html>
    <head>
        <?= $this->Html->charset() ?>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>
            <?= $cakeDescription ?>:
            <?= $this->fetch('title') ?>
            blog
        </title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">
        <?= $this->Html->meta('icon') ?>

        <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">



        <?= $this->Html->css('backg.css') ?>
    </head>
    <body>

    <main class="main">
        <div class="container">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div>
    </main>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->
    </body>
    </html>
    <!--    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">-->
    <!--    <link  href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">-->
    <!--    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">-->


<?= $this->Html->css([
    'css.css',
    'all.min.css',
    'tempusdominus-bootstrap-4.min.css',
    'icheck-bootstrap.min.css',
    'jqvmap.min.css',
    'adminlte.min.css',
    'OverlayScrollbars.min.css',
    'daterangepicker.css',
    'summernote-bs4.min.css',

]) ?>
<?= $this->Html->script([
    'jquery.min.js',
    'jquery-ui.min.js',
    'bootstrap.bundle.min.js',
    'Chart.min.js',
    'sparkline.js',
    '.vmap.min.js',
    'jquery.vmap.usa.js',
    'jquery.knob.min.js',
    'moment.min.js',
    'daterangepicker.js',
    'tempusdominus-bootstrap-4.min.js',
    'summernote-bs4.min.js',
    'jquery.overlayScrollbars.min.js',
    'adminlte.js',
    'demo.js',
    'dashboard.js',



]) ?>
<?= $this->Html->css('backg.css') ?>
<?= $this->Html->script(['vendor/jquery-1.12.4.min.js',
    'bootstrap.min.js',
    'wow.min.js',
    'jquery-price-slider.js',
    'jquery.meanmenu.js',
    'owl.carousel.min.js',
    'jquery.sticky.js',
    'jquery.scrollUp.min.js',
    'scrollbar/jquery.mCustomScrollbar.concat.min.js',
    'scrollbar/mCustomScrollbar-active.js',
    'metisMenu/metisMenu.min.js',
    'metisMenu/metisMenu-active.js',
    'tab.js',
    'icheck/icheck.min.js',
    'icheck/icheck-active.js',
    'plugins.js', 'main.js',
    'tawk-chat.js'
]) ?>
<?= $this->Html->css(['bootstrap.min.css',
    'style.css',
    'font-awesome.min.css',
    'owl.carousel.css',
    'owl.theme.css',
    'owl.transitions.css',
    'animate.css',
    'normalize.css',
    'main.css',
    'morrisjs/morris.css',
    'scrollbar/jquery.mCustomScrollbar.min.css',
    'metisMenu/metisMenu.min.css',
    'metisMenu/metisMenu-vertical.css',
    'calendar/fullcalendar.min.css',
    'calendar/fullcalendar.print.min.css',
    'form/all-type-forms.css',
    'responsive.css',
    'style.css'
]) ?>
