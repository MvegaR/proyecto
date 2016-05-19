<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Docente */

$this->title = 'Cambiar usuario o contraseña';
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="docente-update">
	<?php if(isset($error)) echo "<div class='alert alert-danger'>$error</div>";?>

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
