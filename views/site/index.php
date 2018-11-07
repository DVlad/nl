<?php

/* @var $this yii\web\View */
use app\components\NewsletterWidget;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;
use app\models\NewsletterForm;

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">

        <?php NewsletterWidget::begin(['message' => 'Please subscribe :)']); ?>

            <?php $form = ActiveForm::begin([
                'id' => 'newsletter-form',
                'validationUrl' => Url::toRoute(NewsletterForm::VALIDATE_ROUTE),
                'enableAjaxValidation' => true,
            ]) ?>

            <?= $form->field($model, 'email') ?>

            <div class="form-group">
                <?= Html::submitButton('Submit', ['class' => 'btn btn-primary','id' => 'submitBtn']) ?>
            </div>

            <?php ActiveForm::end(); ?>

            <div class="alert alert-success" id="success" style="display:none;"></div>

            <?php $ajaxScript = " $(document).ready(function() {
            $('body').on('beforeSubmit','form#newsletter-form', function() {
                var form = $(this);
                if (form.find('.has-error').length)
                {
                    return false;
                }
                $.ajax({
                    url    : '" . Url::toRoute(NewsletterForm::SAVE_ROUTE) . "',
                    type   : 'post',
                    data   : form.serialize(),
                    success: function (response)
                    {
                        var getupdatedata = response.success;
                        $('#success').html(getupdatedata).css('display','block');
                        $('#submitBtn').prop('disabled',true);;
                    },
                    error  : function ()
                    {
                        console.log('ups, something went wrong');
                    }
                });
                return false;
                });
            });";
            $this->registerJs($ajaxScript);?>
        <?php NewsletterWidget::end(); ?>

    </div>

</div>

