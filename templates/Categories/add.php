
<!-- <div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Categories'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="categories form content">
            <?= $this->Form->create($category) ?>
            <fieldset>
                <legend><?= __('Add Category') ?></legend>
                <?php

echo $this->Form->control('name');
echo $this->Form->control('description');
?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div> -->
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="sparkline12-list">
            <div class="sparkline12-hd">
                <div class="main-sparkline12-hd">
                    <h1>All Form Element</h1>
                </div>
            </div>
            <div class="sparkline12-graph">
                <div class="basic-login-form-ad">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="all-form-element-inner">
                                <?= $this->Form->create($category) ?>
                                <div class="form-group-inner">
                                    <div class="row">
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                            <label class="login2 pull-right pull-right-pro">Name</label>
                                        </div>
                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                            <!-- <input type="text" class="form-control" /> -->
                                            <?= $this->Form->control('name',[
                                                'label'=>false,
                                                'class'=>'form-control'
                                            ]);?>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group-inner">
                                    <div class="row">
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                            <label class="login2 pull-right pull-right-pro">Description</label>
                                        </div>
                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                            <!-- <textarea name="w3review" rows="4" cols="150"></textarea> -->
                                            <?= $this->Form->control('description',[
                                                'label'=>false,
                                                'class'=>'form-control'
                                            ]);?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group-inner">
                                    <div class="login-btn-inner">
                                        <div class="row">
                                            <div class="col-lg-3"></div>
                                            <div class="col-lg-9">
                                                <div class="login-horizental cancel-wp pull-left form-bc-ele">
                                                    <button class="btn btn-white" type="submit">Cancel</button>
                                                    <!-- <button class="btn btn-sm btn-primary login-submit-cs" type="submit">Save
                                                      Change</button> -->
                                                    <?= $this->Form->button(__('Submit'),[
                                                        'class'=>['btn btn-sm btn-primary','login-submit-cs']
                                                    ]) ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?= $this->Form->end() ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
