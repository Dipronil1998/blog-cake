<?php
/**
 *  @var \App\View\AppView $this
 */
$this->disableAutoLayout();
?>



<div class="error-pagewrap">
    <div class="error-page-int">
        <div class="text-center custom-login">
            <h3>Registration</h3>
            <p>This is the best app ever!</p>
        </div>
        <div class="content-error">
            <div class="hpanel">
                <div class="panel-body">
                    <?= $this->Form->create(null,[
                        'controller'=>'Users',
                        'action'=>'add',
                    ]) ?>
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label>First Name</label>
                            <?= $this->Form->control('first_name',[
                                'label'=>false,
                                'class'=>'form-control',
                            ]) ?>
                        </div>
                        <div class="form-group col-lg-6">
                            <label>Last Name</label>
                            <!--                                <input type="text" class="form-control">-->
                            <?= $this->Form->control('last_name',[
                                'label'=>false,
                                'class'=>'form-control',
                            ]) ?>
                        </div>
                        <div class="form-group col-lg-12">
                            <label>Email</label>
                            <?= $this->Form->control('email',[
                                'label'=>false,
                                'class'=>'form-control',
                            ]) ?>
                        </div>
                        <div class="form-group col-lg-12">
                            <label>Password</label>
                            <?= $this->Form->control('password',[
                                'label'=>false,
                                'class'=>'form-control',
                            ]) ?>
                        </div>
                        <div class="form-group col-lg-6">
                            <label>Select Role</label>
                            <?= $this->Form->control('role_id', [
                                'type'=>'select',
                                'class'=>'form-control',
                                'label'=>false,
                            ]) ?>
                        </div>
                    </div>
                    <div class="text-center">
                        <?= $this->Form->button(__('Register',[
                            'class'=>'btn btn-success',
                        ])); ?>
                        <button class="btn btn-default">Cancel</button>
                    </div>
                    <?= $this->Form->end() ?>
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
