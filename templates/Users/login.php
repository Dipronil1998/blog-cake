<?php
/**
 *  @var \App\View\AppView $this
 */
$this->disableAutoLayout();
?>

<?= $this->Flash->render() ?>
<div class="error-pagewrap">
    <div class="error-page-int">
        <div class="text-center m-b-md custom-login">
            <h3>PLEASE LOGIN TO APP</h3>
            <p>This is the best app ever!</p>
        </div>
        <div class="content-error">
            <div class="hpanel">
                <?= $this->Form->create(null,[
                    'controller'=>'Users',
                    'action'=>'login',
                ]) ?>
                <div class="panel-body">
                    <div class="form-group">
                        <label class="control-label" for="username">Email</label>
                        <!-- <input type="text" placeholder="example@gmail.com" title="Please enter you username" required="" value="" name="username" id="username" class="form-control"> -->
                        <?= $this->Form->control('email',[
                            'label'=>false,
                            'class'=>'form-control',
                            'required'=>true,
                        ]) ?>
                        <span class="help-block small">Your unique username to app</span>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="password">Password</label>
                        <?= $this->Form->control('password',[
                            'label'=>false,
                            'class'=>'form-control',
                        ]) ?>
                    </div>
                    <div class="checkbox login-checkbox">
                        <label>
                        <?= $this->Form->control('remember_me', ['type' => 'checkbox']);?>

                    </div>
                    <div class="text-right">
                        <!--                        <button class="btn btn-success ">Go</button>-->
                        <?= $this->Form->submit(__('Login'),[
                            'class'=>'btn btn-success btn-block'
                        ]); ?>
                    </div>
                    <?= $this->Html->link("Add User", ['action' => 'add']) ?>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
        <div class="text-center login-footer">
            <p>Copyright © 2018. All rights reserved. Template by <a href="https://colorlib.com/wp/templates/">Colorlib</a></p>
        </div>
    </div>
</div>
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
    'plugins.js','main.js',
    'tawk-chat.js'
]) ?>
