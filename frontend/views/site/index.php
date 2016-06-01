<?php

/* @var $this yii\web\View */
$this->title = 'PASH UBB';
?>
    <div class="panel-title hidden" style="background-color:#0064AC; color:#FFFFFF; border-radius: 0px 30px 30px 0px; font-weight:bold; font-size:19px">Texto</div>
     <br>
            <ul class="breadcrumb">
                <li><a href="#">Informacion de Autentificacion</a></li>
                <li class="active"><button class="btn btn-default glyphicon glyphicon glyphicon-arrow-up control"> Ocultar</button></li>
            </ul> 
<div class="site-index">

    <div class="jumbotron">
        <?php 
            if(!Yii::$app -> user -> isGuest){
                echo '<h2 align="left"><strong>Autentificado como rol de: ';
                if(Yii::$app -> user -> identity -> ID_ROL == 1){
                    echo "Administrador</strong>";
                }else{
                    echo "Docente</strong>";
                }
                echo "</h2>";
            }else {
                echo '<h2 align="left">Plataforma PASH UBB</h2>';
            }
        ?>
        <p align="left"><?php echo date('j \d\e F \d\e Y\, g:ia') ?></p>
        <p align="left">Estimad@s Usuari@s:</p>
        <p align="justify">Les damos la más cordial bienvenida a la Plataforma de Administracion de Salas y Horarios PASH UBB. Favor, ante cualquier consulta, inconveniente o requerimiento asociado a claves y password de acceso, y otras situaciones relativas a la plataforma, les invitamos a contactarnos al correo <a title="Plataforma PASH UBB" href="mailto:plataformamoodle@ubiobio.cl" target="_blank"><strong><u><span style="color:rgb(0,0,255);">plataformapash@ubiobio.cl</span></u></strong></a>.</p>
        <p align="left">Les saluda,</p>
        <p align="left">Administrador Plataforma PASH UBB</p>
    </div>

    <div class="body-content">
    <div class="panel panel-default">
  <div class="panel-body">
        <div class="row">
            <div class="col-lg-4">
                <h2><span class='glyphicon glyphicon-bookmark'> </span></h2>
                <p align="justify">PASH es una Plataforma de Administracion que tiene por finalidad prestar servicios de apoyo a la docencia de Pregrado y Postgrado de la Universidad del Bío-Bío, optimizando las asignaciones de salas y horarios.</p>
            </div>
            <div class="col-lg-4">
                <h2><span class='glyphicon glyphicon-bookmark'> </span></h2>
                <p align="justify">El diseño de PASH permite que el Administrador y los Academicos la utilicen fácilmente, dado que sus funcionalidades han sido configuradas en función de sus necesidades.</p>
            </div>
            <div class="col-lg-4">
                <h2><span class='glyphicon glyphicon-bookmark'></span></h2>
                <p align="justify">PASH es una plataforma en constante desarrollo, diseñada y construida en la Universidad del Bío-Bío, por lo cual invitamos a sus usuarios a enviar comentarios y sugerencias, a objeto de continuar ofreciéndoles un servicio de calidad.</p>
            </div>
        </div>
 </div>
</div>
    </div>
</div>
<script type="text/javascript">
    var abierto=true;
    var boton=true;
    $(".control").on('click',function(){
	    if(abierto){
     	    $(".jumbotron").slideUp(1000);
            $(".control").attr('class', 'btn btn-default glyphicon glyphicon glyphicon-arrow-down control');
            $(".control").text(" Mostrar");
  	        abierto=false;
        }else{
  	        $(".jumbotron").slideDown(1000);
            $(".control").attr('class', 'btn btn-default glyphicon glyphicon glyphicon-arrow-up control');
            $(".control").text(" Ocultar");
  	        abierto=true;
        }
    });
</script>