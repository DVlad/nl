<?php

/* @var $this yii\web\View */
use app\components\NewsletterWidget;
use app\models\NewsletterForm;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">

        <p class="lead">Please subscribe</p>

        <?php $form = ActiveForm::begin([
            'id' => 'newsletter-form',
            'validationUrl' => Url::toRoute('validate-newsletter'),
            'enableAjaxValidation' => true,
        ]) ?>

        <?= $form->field($model, 'email', ['enableAjaxValidation' => true]) ?>

        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary','id' => 'submitBtn']) ?>

        </div>

        <?php ActiveForm::end(); ?>

        <div class="alert alert-success" id="success" style="display:none;">

        </div>

        <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>
    </div>

</div>
<?php
$script = " $(document).ready(function () {
        $('body').on('beforeSubmit', 'form#newsletter-form', function () {
            var form = $(this);
            if (form.find('.has-error').length)
            {
                return false;
            }
            $.ajax({
                url    : '" . Url::toRoute('save-newsletter') . "',
                type   : 'post',
                data   : form.serialize(),
                success: function (response)
                {
                    var getupdatedata = response.success;
                    $('#success').html(getupdatedata).css('display','block');
                    $('#submitBtn').prop('disabled', true );;
                },
                error  : function ()
                {
                    console.log('internal server error');
                }
            });
            return false;
        });
    });";
$this->registerJs($script);

?>
