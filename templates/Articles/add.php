
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="sparkline12-list">
            <div class="sparkline12-hd">
                <div class="main-sparkline12-hd">
                    <h1>Add Article</h1>
                </div>
            </div>
            <div class="sparkline12-graph">
                <div class="basic-login-form-ad">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="all-form-element-inner">
                                <?php
                                echo $this->Form->create(null,[
                                    'controller' => 'Articles',
                                    'action' => 'add',
                                ]); ?>
                                <div class="form-group-inner">
                                    <div class="row">
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                            <label class="login2 pull-right pull-right-pro">Title</label>
                                        </div>
                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                            <?php echo $this->Form->control('title',[
                                                'label'=>false,
                                                'class'=>"form-control"
                                            ]); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group-inner">
                                    <div class="row">
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                            <label class="login2 pull-right pull-right-pro">Select Category</label>
                                        </div>
                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                            <div class="form-select-list">
                                                <!-- <select class="form-control custom-select-value" name="account">
                                                  <option>Select 1</option>
                                                  <option>Select 2</option>
                                                  <option>Select 3</option>
                                                  <option>Select 4</option>
                                                </select> -->
                                                <?= $this->Form->control('category_id',[
                                                    'label'=>false,
                                                    'class'=>"form-control",
                                                    'empty'=>'select category']);?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group-inner">
                                    <div class="row">
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                            <label class="login2 pull-right pull-right-pro">Body</label>
                                        </div>
                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                            <?= $this->Form->control('body', [
                                                'label'=>false,
                                                'rows' => '6',
                                                'cols'=>'114',
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
                                                    <!-- <button class="btn btn-white" type="submit">Cancel</button> -->
                                                    <!-- <button class="btn btn-sm btn-primary login-submit-cs" type="submit">Save
                                                      Change</button> -->
                                                    <?= $this->Form->button(__('Save Article'),[
                                                        'class'=>['btn btn-sm btn-primary','login-submit-cs']
                                                    ]);?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?= $this->Form->end(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
