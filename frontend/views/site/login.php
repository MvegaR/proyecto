<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Iniciar sesión';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Rellene el formulario para iniciar sesión:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true])->label("Nombre de usuario") ?>

                <?= $form->field($model, 'password')->passwordInput()->label("Contraseña") ?>

                <?= $form->field($model, 'rememberMe')->checkbox()->label("¿Recordar sesión?") ?>

                <!--
                <div style="color:#999;margin:1em 0">
                    Si usted olvido la contraseña  //Html::a('reset it', ['site/request-password-reset']) .
                </div> -->

                <div class="form-group">
                    <?= Html::submitButton('Iniciar', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
