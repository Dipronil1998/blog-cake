<?php
/**
 * @var App\View\AppView $this
 * @var \Cake\Datasource\ResultSetInterface $report
 * @var \Cake\Datasource\ResultSetInterface $img
 * @var \Cake\Datasource\ResultSetInterface $img_qrcode
 */

?>


<?= h($report->first_name) ?><br><br><br>
<?= h($report->last_name) ?><br><br><br>
<?= h($report->email) ?><br><br><br>
<?= h($report->image) ?><br><br><br>

<?= $img_qrcode ?><br><br><br>
