<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Users $user
 * @var \App\Model\Entity\Users $img_qrcode
 */

?>
<h3>User Detail</h3>
<section class="col-lg-5 connectedSortable ui-sortable">
    <div class="card-body">
        <div class="image">
            <b>Profile Picture: </b><br><br>
            <?= $this->Html->image($user->image,[
                'height'=>150,'width'=>250
            ]); ?>
        </div>
    </div>
</section>
<?= $img_qrcode ?><br><br>
<b><?= __(' Name') ?></b>
<p><?= h($user->first_name." ".$user->last_name) ?></p
<b><?= __('Email') ?></b>
<p><?= h($user->email) ?></p>
<p><?= __('Created') ?></p>
<p><?= h($user->created) ?></p>

<br>
<?= $this->Html->link(__('Download PDF'), ['action' => 'pdf', $user->id ]) ?>

<?= $this->Form->create(null, ['url'=> ['action' => 'excel', $user->id], 'type'=>'POST']); ?>
<button type="submit" class="btn btn-primary">Download</button>
<?= $this->Form->end() ?>

<br>
<?= $this->Html->link("back", ['controller'=>'Users','action' => 'index'],['class' => 'btn btn-danger float-right']) ?>
