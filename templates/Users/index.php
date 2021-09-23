<?php
/**
 * @var App\View\AppView $this
 * @var \Cake\Datasource\ResultSetInterface $articles
 */
?>
<br><br><br>
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
                                    <th>Role</th>
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
                                    <td><?= $user->role->title ?></td>
                                    <td><?= $user->created->format(DATE_RFC850) ?></td>
                                    <td><?= $user->modified->format(DATE_RFC850) ?></td>
                                    <td>

                                    <?php if( $user->role_id!="7594fbb1-1a31-4236-b636-73de2352a703"){?>

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


