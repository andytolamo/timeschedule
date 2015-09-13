<?php
use yii\grid\GridView;

 GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        'id',
        'start_date',
        'ende_date',
        'start_time',
        'end_time'
    ],
]);