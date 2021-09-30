<?php
/**
 * @var App\View\AppView $this
 * @var \Cake\Datasource\ResultSetInterface $report
 */

?>

<!DOCTYPE html>
<html>
<head>

    <title>PDF</title>
    <style>
        @page {
            margin: 0px 0px 0px 0px !important;
            padding: 0px 0px 0px 0px !important;
        }
    </style>
</head>
<body>
<?= h($report->title) ?><br>
<?= h($report->body) ?>

</body>
</html>
