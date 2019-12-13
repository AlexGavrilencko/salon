<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use app\models\LoginForm;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

$this->title = 'Авторизация';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php $form = ActiveForm::begin([
    'id' => 'login-form',
    'layout' => 'horizontal',
    'fieldConfig' => [
        'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
        'labelOptions' => ['class' => 'col-lg-1 control-label'],
    ],
]); ?>
<br>
<div class="site-registration">
    <div class="text-light d-flex align-items-center justify-content-center h-100 flex-row bd-highlight flex-column">
        <div class="pole darkwindow">
            <?php $form = ActiveForm::begin(); ?>
                <h3 class="text-center">Авторизация</h3>


                <?= $form->field($model, 'e_mail')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <?= $form->field($model, 'rememberMe')->checkbox([
                    'template' => "<div class=\"col-lg-offset-1 col-lg-3 btn-rounded btngreen\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
                ]) ?>


                   <div class=" row justify-content-center">
                        <?= Html::submitButton('Вход', ['class' => 'btn-rounded btngreen btn btn-lg m-2', 'name' => 'login-button']) ?>
                    </div>


                <?php ActiveForm::end(); ?>
        
                <a href="<?= Url::toRoute(['/auth/signup']); ?>" class="btn-rounded btngreen btn btn-lg btn-block m-4"><h3 class="text-center">Регистрация</h3></a>
                
        </div>
    </div>
</div>

<br>