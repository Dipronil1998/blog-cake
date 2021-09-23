
<div class="error-pagewrap">
    <div class="error-page-int">
        <div class="text-center m-b-md custom-login">
            <h3>Change Password</h3>
        </div>
        <div class="content-error">
            <div class="hpanel">
                <?= $this->Form->create($user, [
                    'action' => \Cake\Routing\Router::url([
                        'controller'=>'Users',
                        'action'=>'change',
                        $user->id,
                    ]),
                ]);
                ?>
                <div class="panel-body">
                    <div class="form-group">
                        <label class="control-label" for="username">Old Password</label>
                        <?= $this->Form->control('current_password',[
                            'label'=>false,
                            'class'=>'form-control',
                            'required'=>true,
                            'type'=>'password'
                        ]) ?>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="password">New Password</label>
                        <?= $this->Form->control('new_password',[
                            'label'=>false,
                            'class'=>'form-control',
                            'type'=>'password'
                        ]) ?>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="password">Confirm Password</label>
                        <?= $this->Form->control('confirm_password',[
                            'label'=>false,
                            'class'=>'form-control',
                            'type'=>'password'
                        ]) ?>
                    </div>
                    <div class="text-right">
                        <?= $this->Form->submit(__('Change'),[
                            'class'=>'btn btn-success btn-block'
                        ]); ?>
                    </div>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
        <div class="text-center login-footer">
            <p>Copyright © 2018. All rights reserved. Template by <a href="https://colorlib.com/wp/templates/">Colorlib</a></p>
        </div>
    </div>
</div>
