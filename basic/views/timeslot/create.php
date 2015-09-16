<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datetimepicker\DateTimePicker;


$form = ActiveForm::begin([
    'id' => 'timeslot-form',
    'options' => ['class' => 'form-horizontal'],
]) ?>

<?php Yii::$app->session->getFlash('error'); ?>
<?= Yii::$app->session->getFlash('success'); ?>


<div class="timepickers">
<?=
$form->field($model, 'start_time')->widget(DateTimePicker::className(), [
    'language' => 'fi',
    'size' => 'ms',
    'template' => '{input}',
    'pickButtonIcon' => 'glyphicon glyphicon-time',
    'inline' => false,
    'clientOptions' => [
        'startView' => 1,
        'minView' => 0,
        'maxView' => 1,
        'autoclose' => true,
        'linkFormat' => 'yyyy-mm-dd hh:ii:ss', // if inline = true
         'format' => 'yyyy-mm-dd hh:ii:ss', // if inline = false
        'todayBtn' => true
    ]
])->textInput(['maxlength'=>10,'style'=>'width:200px']);?>

</div>
<div class="timepickers">
<?=
$form->field($model, 'end_time')->widget(DateTimePicker::className(), [
    'language' => 'fi',
    'size' => 'ms',
    'template' => '{input}',
    'pickButtonIcon' => 'glyphicon glyphicon-time',
    'inline' => false,
    'clientOptions' => [
        'startView' => 1,
        'minView' => 0,
        'maxView' => 1,
        'autoclose' => true,
        'linkFormat' => 'yyyy-mm-dd hh:ii:ss', // if inline = true
        'format' => 'yyyy-mm-dd hh:ii:ss', // if inline = false
        'todayBtn' => true
    ]
])->textInput(['maxlength'=>10, 'style'=>'width:200px']);?>
</div>


<div>

<?= $form->field($model, 'description')->dropdownList(['Työ' => 'Työ', 'Loma' => 'Loma', 'Sairasloma'=>'Sairasloma', 'Muu'=>'Muu'],['maxlength'=>10, 'style'=>'width:200px']);?>

</div>


    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('Tallenna', ['class' => 'btn btn-primary']) ?>
        </div>
    </div>
<?php ActiveForm::end() ?>