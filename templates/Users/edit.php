
<?php
/**
 * @var \Cake\Datasource\ResultSetInterface $user
 * @var \App\View\AppView $this
 */

?>
<div class="error-pagewrap">
    <div class="error-page-int">
        <div class="text-center custom-login">
            <h3>Edit Profile</h3>
        </div>
        <div class="content-error">
            <div class="hpanel">
                <div class="panel-body">
                    <?php
                    echo $this->Form->create($user,[
                        'type'=>'file'
                    ]);
                    ?>
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
                            <label>Update Image</label>
                            <?= $this->Form->file('image_file',[
                                'label'=>false,
                                'class'=>'form-control',
                            ]) ?>
                            <?= $this->Html->image($user->image,[
                                'height'=>100,
                                'width'=>100,
                                'value'=>''
                            ]); ?>
                        </div>

                    </div>
                    <div class="text-center">
                        <?= $this->Form->button(__('Update',[
                            'class'=>'btn btn-success',
                        ])); ?>
                        <button class="btn btn-default">Cancel</button>
                    </div>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>

