<?php
use frontend\models\Facultad;
use frontend\models\Edificio;
use frontend\models\Sala;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

$facultades = new Facultad; 
$edificios = new Edificio; 
$salas = new Sala; 
$this->title = 'Lista de salas'; 
$this->params['breadcrumbs'][] = $this->title; 
?>
<h1>Horario Salas</h1>
<button class="btn btn-default control1">Ver todas las salas</button>
<button class="btn btn-default control2">Buscar Sala Especifica</button>
<div class="jumbotron">
    <h2>Siga los siguientes pasos:</h2>
    <h3>Paso 1: </h3>
        <?= Html::activeDropDownList($facultades, 'ID_FACULTAD', ArrayHelper::map($facultades::find()->all(), 'ID_FACULTAD', 'NOMBRE_FACULTAD'), array('onchange'=>'getData()','class' =>'form-control','id'=>"facultad",'prompt'=>'Seleccione Facultad')) ?>
</div>
    <div id="respuesta"></div>
    <?php
        echo '
            <script>   
            $(function(){
            $(document).ready(function(){
                $("#facultad").change(function(){
                    var url = "'.Url::toRoute(["sala/edificios"]).'";
                    $.ajax({
                       type: "POST",
                       url: url,
                       data: { id: $("#facultad :selected").val() },
                       success: function(data)
                       {
                           $("#respuesta").html(data);
                       }
                    });
                });
                $(".control1").on("click",function(){
                    $(".control1").hide();
                    $(".control2").hide();
                    var url = "'.Url::toRoute(["sala/salas"]).'";
        $.ajax({
           type: "POST",
           url: url,
           data: { id: "*" },
           success: function(data)
           {
               $("#respuesta").html(data);
           }
        });
                });
             });
            });
            </script>';
    ?>

<script type="text/javascript">
    var abierto=false;
    $(".jumbotron").hide();
    $(".control2").on('click',function(){
        $(".control2").hide();
        $(".control1").hide();
        if(abierto){
            $(".jumbotron").slideUp(1000);
            abierto=false;
        }else{
            $(".jumbotron").slideDown(1000);
            abierto=true;
        }
    });
</script>