<?php
/**
 * @var App\View\AppView $this
 * @var \Cake\Datasource\ResultSetInterface $articles
 */

?>

<div class="breadcome-area">
    <div class="product-status mg-b-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="product-status-wrap drp-lst">
                        <h4>Departments List</h4>
                        <div class="add-product">
                            <?= $this->Html->link("add Articiles", ['controller' => 'Articles','action' => 'add'],['class' => 'btn btn-success float-right']) ?>
                        </div>
                        <div class="asset-inner">
                            <table>
                                <tr>
                                    <th>No</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Body</th>
                                    <th>Created</th>
                                    <th>Modified</th>
                                    <th>Action</th>
                                </tr>
                                <?php
                                /**
                                 * @var \App\Model\Entity\Article $article
                                 */
                                foreach ($articles as $key=>$article){ ?>
                                    <tr>
                                    <td><?= $key+1 ?></td>
                                    <td><?= $article->title ?></td>
                                    <td><?= $article->category->name ?></td>
                                    <td><?= $article->body ?></td>
                                    <td><?= $article->created->format(DATE_RFC850) ?></td>
                                    <td><?= $article->modified->format(DATE_RFC850) ?></td>
                                    <td>
                                    <?= $this->Html->link('View', ['action' => 'view', $article->id]) ?>
                                    <?php if($user==$article->user_id || $user1->role_id=="7594fbb1-1a31-4236-b636-73de2352a703"){?>
                                        <?= $this->Html->link('Edit', ['action' => 'edit', $article->id]) ?>
                                        <?= $this->Form->postLink(
                                            'Delete',
                                            ['action' => 'delete', $article->id],
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


