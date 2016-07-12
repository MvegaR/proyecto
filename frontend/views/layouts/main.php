<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
  <meta charset="<?= Yii::$app->charset ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/ico"  href="favicon.ico">

  <link rel="stylesheet" type="text/css" href="css/site.css">

  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">

  <link rel="stylesheet" type="text/css" href="css/kv-export-data.css">

  <link rel="stylesheet" type="text/css" href="css/kv-export-columns.css">

  <?= Html::csrfMetaTags() ?>
  <title><?= Html::encode($this->title) ?></title>
  <?php $this->head() ?>
  
  <script type="text/javascript">var kvexpmenu_e22a9b48 = {"formId":"w1-form","messages":{"allowPopups":"Desactive bloqueadores de ventanas emergentes para asegurar una descarga correcta.","confirmDownload":"¿Ok para continuar?","downloadProgress":"Generando el archivo de exportación. Por favor espere...","downloadComplete":"¡Solicitud enviada! Puede cerrar este diálogo después de guardar el archivo descargado."}};
</script>  



  <style type="text/css">

    @-webkit-keyframes pulso {
      25% {
        -webkit-transform: scale(1.07);
        transform: scale(1.07);
      }

      75% {
        -webkit-transform: scale(0.9);
        transform: scale(1);
      }
    }

    @keyframes pulso {
      25% {
        -webkit-transform: scale(1.07);
        transform: scale(1.07);
      }

      75% {
        -webkit-transform: scale(0.9);
        transform: scale(1);
      }
    }
    .pulso{
      margin-top: 10px; font-weight: bold;

    }
    .pulso:hover, .pulso:active, .pulso:focus{
      -webkit-animation-name: pulso;
      animation-name: pulso;
      -webkit-animation-duration: 1s;
      animation-duration: 1s;
      -webkit-animation-timing-function: linear;
      animation-timing-function: linear;
      -webkit-animation-iteration-count: infinite;
      animation-iteration-count: infinite;
    }

  </style>

</head>

<body style="min-height: 110%">

  <header id="header" style="height:55px">
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
       <a class="navbar-brand" style="position:relative; top:-8px; padding-left:0px;" href= <?php echo "'".Url::to(['site/index'])."'"; ?>><span><img src="img/escudo.svg" alt="" width="60" height="40"/></span>Universidad del Bío-Bío</a>
       <!-- Brand and toggle get grouped for better mobile display -->
       <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed " data-toggle="collapse" data-target="#inverseNavbar1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>    
      </div>
      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="inverseNavbar1">
        <ul class="nav navbar-nav navbar-right">
          <li><a href=<?php echo "'".Url::to(['site/index'])."'";?>>Portada</a></li>
          <?php
          if (Yii::$app->user->isGuest) {
            echo "<li>  <a href='".Url::to(['site/login'])."'> <span class='glyphicon glyphicon-lock'> </span> Iniciar sesión </a></li>";
          } else {
            echo '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
              'Cerrar sesión (' . Yii::$app->user->identity->USER . ')',
              ['class' => 'btn btn-link text-center', 'style' => '']
              )
            . Html::endForm()
            . '</li>';
          }
          ?>
          
        </ul>
      </div>
    </div>
    <!-- /.navbar-collapse -->
    <!-- /.container-fluid -->
  </nav>
</header>


<main class="panel-primary" id="panelPrimario" 
style="background-color:#0064AC; background-image:url(img/bg.png);color:#fff;  position:relative; top:-4px; height:200px">
<div class="container">
  <span class= 'pull-right hidden-xs col-md-2 col-lg-2' style="position:relative; margin:0px;"> <br> <img src="img/Working-Schedule.png" alt="Placeholder image" width="200" height="200" class="img-responsive visible-md visible-lg"></span> 
  <h1><strong>Proyecto DSI</strong> </h1>
  <h3 class="col-xs-12 col-md-10 col-lg-10" style=" text-align:justify;">Sistema de información dedicado a la asignación de horarios y salas de clases para la Universidad del Bío-Bío.</h3>  


</div>
</main>
<section class="container" id="Contenido" class="col-xs-12">
<script src="js/jquery-2.2.4.min.js"></script>
  <div class="col-lg-9 col-md-9 col-xs-12 pull-left" style="padding:0px;">
    <div class="panel-title hidden" style="background-color:#0064AC; color:#FFFFFF; border-radius: 0px 30px 30px 0px; font-weight:bold; font-size:19px">Texto</div>
     <br>
            <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>

    <?= $content?>
  </div>
  <br>
  <div class="col-lg-3 col-md-3 col-xs-12 pull-right" style="position:relative; top:0 px; margin: 0px; padding: 0px 0px 0px 10px;" >
    <div class="list-group">
      <div class=" text-center" style="background-color:#0064AC; color:#FFFFFF; font-weight: bold; font-size:16px;">Menú principal</div>

      <?php if(!Yii::$app -> user -> isGuest && Yii::$app -> user -> identity -> ID_ROL == 1){?><a href="index.php?r=site/menu-admin" class="list-group-item pulso">Módulos de administración</a><?php } ?>
      <?php if(!Yii::$app -> user -> isGuest && Yii::$app -> user -> identity -> ID_ROL == 2){?><a href="index.php?r=horario-docente" class="list-group-item pulso">Ver Horario</a><?php } ?>
      <?php if(!Yii::$app -> user -> isGuest && Yii::$app -> user -> identity -> ID_ROL == 2){?><a href="index.php?r=solicitud-asignacion/create" class="list-group-item pulso">Formulario de asignación permanente</a><?php } ?>
      <?php if(!Yii::$app -> user -> isGuest && Yii::$app -> user -> identity -> ID_ROL == 2){?><a href="index.php?r=solicitud-asignacion-temporal/create" class="list-group-item pulso">Solicitud asignación temporal</a><?php } ?>
      <?php if(!Yii::$app -> user -> isGuest && Yii::$app -> user -> identity -> ID_ROL == 2){?><a href="index.php?r=solicitud-cancelacion/create" class="list-group-item pulso">Solicitud cancelación</a><?php } ?>
      <?php if(!Yii::$app -> user -> isGuest && Yii::$app -> user -> identity -> ID_ROL == 2){?><a href="index.php?r=solicitud-cambio/create" class="list-group-item pulso">Solicitud cambio de sala</a><?php } ?>
      <a href="index.php?r=post-de-denuncia/create" class="list-group-item pulso">Reportar sala</a>
      <a href="index.php?r=sala/lista" class="list-group-item pulso">Horarios de salas</a>
      <a href="index.php?r=horario-general" class="list-group-item pulso">Horario general</a>
            <?php if(!Yii::$app -> user -> isGuest && Yii::$app -> user -> identity -> ID_ROL == 1){?><a href="index.php?r=horario-alumno/alumno
" class="list-group-item pulso">Horario Carreras</a><?php } ?>
      <?php if(!Yii::$app -> user -> isGuest){?><a href="index.php?r=cambios/update" class="list-group-item pulso">Cambiar usuario o contraseña</a><?php } ?>
      </div>
    </div>
    <div class="col-lg-8 col-xs-12 panel-default hidden" style="float:left; padding-left:0px;">
      <div class="panel-title" style="background-color:#0064AC; color:#FFFFFF; border-radius: 0px 30px 30px 0px; font-weight:bold; font-size:19px">Descripción-Contenido-Titulo2</div>
      <div class="panel-body" style="padding-left:0px;">Cuerpo2</div>
    </div>
</section>
<footer class="container panel-footer" id="piePagina">
<div class="col-xs-4 text-left"><a href="#">Acerca</a> | <a href="#">Contacto</a></div>
<div class="col-xs-3 text-center"> © Copyright 2016</div>
<div class="col-xs-5 text-right"><a href="http://www.ubiobio.cl/">Universidad del Bío-Bío</a></div>
</footer>

 <?php  $this->endBody() ?>


</body>
</html>
<?php $this->endPage() ?>
