<?php
use yii\grid\GridView;
use yii\grid\ActionColumn;
$models = $dataProvider->getModels();
?>

<?=

 GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        'id',
        'start_time',
        'end_time',
        'description',
        ['class' => 'yii\grid\SerialColumn'],
	        [
	            'class' => 'yii\grid\ActionColumn',
	            'header'=>'Action',
	            'headerOptions' => ['width' => '80'],
	            'template' => ' {update} {delete}{link}',
	        ],
    ],
]);