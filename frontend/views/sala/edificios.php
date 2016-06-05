<?php
use frontend\models\Facultad;
use frontend\models\Edificio;
use frontend\models\Sala;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

$facultades = new Facultad; 
$edificiosa = new Edificio; 
$salas = new Sala; 
?>
<div class="jumbotron">
<h3>Paso 2:</h3>

<?= Html::activeDropDownList($edificiosa, 'ID_EDIFICIO', ArrayHelper::map($edificios, 'ID_EDIFICIO', 'NOMBRE_EDIFICIO'), array('onchange'=>'getData()','class' =>'form-control','id'=>"edificio",'prompt'=>'Seleccione Edificio')) ?>
</div>
<div id="divsalas"></div>

<?php
echo '
<script>   
$(function(){
 $(document).ready(function(){
    $("#edificio").change(function(){
        var url = "'.Url::toRoute(["sala/salas"]).'";
        $.ajax({
           type: "POST",
           url: url,
           data: { id: $("#edificio :selected").val() },
           success: function(data)
           {
               $("#divsalas").html(data);
           }
        });
    });
 });
});
</script>';
?>