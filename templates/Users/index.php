<?php
/**
 * @var App\View\AppView $this
 * @var \Cake\Datasource\ResultSetInterface $users
 *  @var \App\Model\Entity\Users $img_qrcode

template
 */
?>
<br><br><br>
<?= $this->Form->create(null,['type'=>'get'])?>
<?= $this->Form->control('q',['label'=>'Search','value'=>$this->getRequest()->getQuery('q')])?>
<?= $this->Form->submit()?>
<?= $this->Form->end()?>

<?= $this->Html->link('Download CSV', ['action' => 'csv']) ?>

<?= $this->Form->create(null, ['url'=> ['action' => 'excel',], 'type'=>'POST']); ?>
<button type="submit" class="btn btn-primary">Download</button>
<?= $this->Form->end() ?>

<div class="breadcome-area">
    <div class="product-status mg-b-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="product-status-wrap drp-lst">
                        <h4>Departments List</h4>
                        <div class="asset-inner">
                            <table>
                                <tr>
                                    <th>No</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Image</th>
                                    <th>Created</th>
                                    <th>Modified</th>
                                    <th>Action</th>
                                </tr>
                                <?php
                                /**
                                 * @var \App\Model\Entity\User $user
                                 */
                                foreach ($users as $key=>$user){ ?>
                                    <tr>
                                    <td><?= $key+1 ?></td>
                                    <td><?= $user->first_name ?></td>
                                    <td><?= $user->last_name ?></td>
                                    <td><?= $user->email ?></td>
                                    <td><img src="img/<?= $user->image ?>" alt="cannot load"></td>
                                    <td><?= $user->created->format(DATE_RFC850) ?></td>
                                    <td><?= $user->modified->format(DATE_RFC850) ?></td>
                                    <td>
                                    <?= $this->Form->postLink("view", ['controller'=>'Users','action' => 'view', $user->id]) ?>
                                    <?php if( $user->role_id!="a75f7e34-837a-4912-8abf-3078fd7017ec"){?>

                                        <?= $this->Form->postLink(
                                            'Delete',
                                            ['action' => 'delete', $user->id],
                                            ['confirm' => 'Are you sure?'],
                                                        )
                                        ?>
                                        </td>
                                        </tr>
                                    <?php } } ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>


