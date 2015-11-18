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

<div>
    <div>
    <?=
    $form->field($model, 'start_time')->widget(kartik\datetime\DateTimePicker::className(), [
        'language' => 'fi',
 	    'pluginOptions' => [
 		'calendarWeeks' => true,
        'format' => 'yyyy-mm-dd hh:ii:ss'
        ]
    ]);?>

    </div>
    <?=
    $form->field($model, 'end_time')->widget(kartik\datetime\DateTimePicker::className(), [
        'language' => 'fi',
 	    'pluginOptions' => [
 		'calendarWeeks' => true,
        'format' => 'yyyy-mm-dd hh:ii:ss'
        ]

    ]);?>
    </div>
    <div>

<?= $form->field($model, 'description')->dropdownList(['Työ' => 'Työ', 'Loma' => 'Loma', 'Sairasloma'=>'Sairasloma', 'Muu'=>'Muu'],['maxlength'=>10, 'style'=>'width:200px']);?>

</div>
    </div>




    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('Tallenna', ['class' => 'btn btn-primary']) ?>
        </div>
    </div>
<?php ActiveForm::end() ?>