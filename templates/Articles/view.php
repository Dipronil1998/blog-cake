<?php
//error_reporting(0);
/**
 *  @var \App\View\AppView $this
 * @var \App\Model\Entity\Article[]|\Cake\Datasource\ResultSetInterface $article
 * @var \App\Model\Entity\Article[]|\Cake\Datasource\ResultSetInterface $img_qrcode
 * @var \App\Model\Entity\Article[]
 */
use CodeItNow\BarcodeBundle\Utils\BarcodeGenerator;

?>

<div class="col-sm-12 col-md-6">
    <div class="dt-buttons btn-group flex-wrap">

        <button class="btn btn-secondary buttons-excel buttons-html5" tabindex="0" aria-controls="example1" type="button">
            <span>Excel</span>
        </button>
        <button class="btn btn-secondary buttons-pdf buttons-html5" tabindex="0" aria-controls="example1" type="button">
            <span>PDF</span>
        </button>
        <button class="btn btn-secondary buttons-print" tabindex="0" aria-controls="example1" type="button">
            <span>Print</span>
        </button>
    </div>
</div>
<br>
<?= $img_qrcode ?><br><br>
<h1><?= h($article->title) ?></h1>
<p><?= h($article->body) ?></p>
<p><?= h($article->category->name) ?></p>
<p><small>Created: <?= $article->created->format(DATE_RFC850) ?></small></p>

<?= $this->Html->link(__('Download PDF'), ['action' => 'pdf', $article->id ]) ?>
