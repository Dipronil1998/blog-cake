
<br><br><br><br>

<div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="background:lightseagreen" >
          <div class="sparkline12-list"style="background:lightgreen;color:blue">
            <div class="sparkline12-hd">
              <div class="main-sparkline12-hd" >
               <center> <h1  style="color:green">Edit Category</h1></center>
              </div>
            </div>
            <div class="form-group-inner">

              </div>
            <div class="sparkline12-graph" >
              <div class="basic-login-form-ad" >
                <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
                    <div class="all-form-element-inner">
                        <?php echo $this->Form->create($category);
                        ?>
                        <div class="form-group-inner" >
                          <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                              <label class="login2 pull-right ">Name</label>
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                              <?php echo $this->Form->control('name',[
                                  'label'=>false,
                                  'class'=>"form-control"
                              ]);?>
                            </div>
                          </div>
                        </div>

                        <div class="form-group-inner">
                          <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                              <label class="login2 pull-right ">Description</label>
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                              <!-- <textarea name="w3review" rows="4" cols="113"></textarea> -->
                              <?php echo $this->Form->control('description',[
                                    'rows' => '3',
                                  'label'=>false,
                                  'class'=>"form-control"
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
                                <?= $this->Html->link("back", ['action' => 'index'],['class' => 'btn btn-danger float-right']) ?>
                                  <!-- <button class="btn btn-white" type="submit">Cancel</button> -->
                                  <!-- <button class="btn btn-sm btn-primary login-submit-cs" type="submit">Save
                                    Change</button> -->
                                    <?= $this->Form->button(__('Final Submit'),(['class' => 'btn btn-success float-right'])) ?>
                                    <?= $this->Form->end() ?>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
