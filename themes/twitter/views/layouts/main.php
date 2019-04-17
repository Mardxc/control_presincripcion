<script src='<?php echo Yii::app()->request->baseUrl; ?>
/themes/twitter_fluid/js/ajax.js' type="text/javascript"></script>

<script type="text/javascript">
    
    function mostrarlogin()
    {

       $("#inicio").animate({opacity: 1.0}, 300).fadeIn("slow");   


    }
</script>

<?php
  Yii::app()->clientscript
    ->registerCssFile( Yii::app()->theme->baseUrl . '/css/bootstrap.css' )
    ->registerCssFile( Yii::app()->theme->baseUrl . '/css/bootstrap-responsive.css' )

    ->registerCssFile( Yii::app()->theme->baseUrl . '/css/font-awesome.css' )
    ->registerCssFile( Yii::app()->theme->baseUrl . '/css/font-awesome.min.css' )

    ->registerCssFile( Yii::app()->theme->baseUrl . '/js/bootstrap.min.js ' )
    ->registerCssFile( Yii::app()->theme->baseUrl . '/js/bootstrap.js ' )

    // use it when you need it!
    
    ->registerCoreScript( 'jquery' )
    ->registerScriptFile( Yii::app()->theme->baseUrl . '/js/bootstrap-transition.js', CClientScript::POS_END )
    ->registerScriptFile( Yii::app()->theme->baseUrl . '/js/bootstrap-alert.js', CClientScript::POS_END )
    ->registerScriptFile( Yii::app()->theme->baseUrl . '/js/bootstrap-modal.js', CClientScript::POS_END )
    ->registerScriptFile( Yii::app()->theme->baseUrl . '/js/bootstrap-dropdown.js', CClientScript::POS_END )
    ->registerScriptFile( Yii::app()->theme->baseUrl . '/js/bootstrap-scrollspy.js', CClientScript::POS_END )
    ->registerScriptFile( Yii::app()->theme->baseUrl . '/js/bootstrap-tab.js', CClientScript::POS_END )
    ->registerScriptFile( Yii::app()->theme->baseUrl . '/js/bootstrap-tooltip.js', CClientScript::POS_END )
    ->registerScriptFile( Yii::app()->theme->baseUrl . '/js/bootstrap-popover.js', CClientScript::POS_END )
    ->registerScriptFile( Yii::app()->theme->baseUrl . '/js/bootstrap-button.js', CClientScript::POS_END )
    ->registerScriptFile( Yii::app()->theme->baseUrl . '/js/bootstrap-collapse.js', CClientScript::POS_END )
    ->registerScriptFile( Yii::app()->theme->baseUrl . '/js/bootstrap-carousel.js', CClientScript::POS_END )
    ->registerScriptFile( Yii::app()->theme->baseUrl . '/js/bootstrap-typeahead.js', CClientScript::POS_END )


    
?>
<?php 
include("protected/custom_conn.php");
include('themes/twitter_fluid/js/valida_proceso.php'); ?>
                <?php 
                    if (isset(Yii::app()->user->id)) {
                        $id_user=Yii::app()->user->id; 
                    }else{
                        $id_user=0;
                    }
                    
                    if (isset($_GET['r'])) {
                        $enlaces=explode("/",$_GET['r']);
                        for ($i=0; $i <count($enlaces) ; $i++) { 
                            //$modulo=$enlaces[$i];
                            $tipo='proceso';
                            if ($i==count($enlaces)-1) {
                                if ($enlaces[$i-1]=='site') {
                                    $modulo=$enlaces[$i];
                                    break;
                                }else{
                                    //echo  $enlaces[$i-1];
                                    $modulo=$enlaces[$i-1];
                                    break;
                                }
                                
                                

                            }
                        }
                        $ruta=ucfirst($modulo);
                    }
                 ?>
                 <input type='hidden' name='parametro' id='parametro'
                 value='<?php
                            if (isset($ruta)) {
                                echo $ruta; 
                             } 
                        ?>'>
                 <input type='hidden' name='tipo' id='tipo'
                 value='<?php
                            if (isset($tipo)) {
                                echo $tipo; 
                             } 
                        ?>'>
                 <script type="text/javascript">
                    window.onload= function()
                    {    
                        
                        var param=document.getElementById('parametro').value;
                        var tipo=document.getElementById('tipo').value;

                        
                        if (param!='') {
                            mostrarMenu(param,tipo,
                            <?php echo $id_user; ?>
                                );
                        };
                    }
                 </script>

<!DOCTYPE html>
<html lang="en">
<head>
  
 <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<meta charset="utf-8">
<title>Seguimiento de Catedra</title>
<meta name="description" content="">

<!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<!-- Le styles -->
<style type="text/css">
  body {
  padding-top: 60px;
  padding-bottom: 40px;
  }
  .sidebar-nav {
  padding: 9px 0;
  }

	@media (max-width: 980px) {
		body{
			padding-top: 0px;
		}
	}
</style>

<!-- Le fav and touch icons -->
<link rel="shortcut icon" href="images/favicon.ico">
<link rel="apple-touch-icon" href="images/apple-touch-icon.png">
<link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
<link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">
</head>

<body>

<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
      <div class="container-fluid">
        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </a>
        <a class="brand" href="#">SISEC</a>
        <div class="nav-collapse">
          <?php $this->widget('zii.widgets.CMenu',array(
            'htmlOptions' => array( 'class' => 'nav' ),
            'activeCssClass'  => 'active',
            'items'=>array(
                  array('label' => 'INICIO', 'url' => array('/site/index'), 'icon-class'=>'fa-home'),
                    array('label'=>'ALUMNOS', 'url'=>array('/site/alumnos'), 'icon-class'=>'fa-male',
                    'linkOptions'=>array('onClick'=>"mostrarMenu('Alumnos','Modulo'," .$id_user. ")",'style' => 'cursor:pointer;'),),
                    array('label'=>'BASE', 'url'=>array('/site/base'), 'icon-class'=>'fa-folder',
                    'linkOptions'=>array('onClick'=>"mostrarMenu('Base','Modulo'," .$id_user. ")",'style' => 'cursor:pointer;'),),
                    array('label'=>'CONFIGURACION', 'url'=>array('/site/configuracion'), 'icon-class'=>'fa-cog',
                    'linkOptions'=>array('onClick'=>"mostrarMenu('Configuracion','Modulo'," .$id_user. ")",'style' => 'cursor:pointer;'),),
                    array('label'=>'ESCUELA', 'url'=>array('/site/escuela'),'icon-class'=>'fa-archive',
                    'linkOptions'=>array('onClick'=>"mostrarMenu('Escuela','Modulo'," .$id_user. ")",'style' => 'cursor:pointer;'),),
                    array('label'=>'GRUPOS', 'url'=>array('/site/examen'),'icon-class'=>'fa-group',
                    'linkOptions'=>array('onClick'=>"mostrarMenu('Examen','Modulo'," .$id_user. ")",'style' => 'cursor:pointer;'),),
                    array('label'=>'INICIAR SESION', 'url'=>array('/site/login'), 'icon-class'=>' fa-user','visible'=>Yii::app()->user->isGuest),              
                    array('label'=>'CERRAR SESION ('. strtoupper(Yii::app()->user->name).')', 'url'=>array('/site/logout'),'icon-class'=>' fa-user', 'visible'=>!Yii::app()->user->isGuest)
            ),
          )); ?>
          
        </div><!--/.nav-collapse -->
      </div>
    </div>
  </div>


	
    <div class="container-fluid">      
           

                    <div class="cont">
                          <div class="container-fluid">
                                <?php if(isset($this->breadcrumbs)):?>
                                  <?php $this->widget('zii.widgets.CBreadcrumbs', array(
                                    'links'=>$this->breadcrumbs,
                                    'homeLink'=>false,
                                    'tagName'=>'ul',
                                    'separator'=>'',
                                    'activeLinkTemplate'=>'<li><a href="{url}">{label}</a> <span class="divider">/</span></li>',
                                    'inactiveLinkTemplate'=>'<li><span>{label}</span></li>',
                                    'htmlOptions'=>array ('class'=>'breadcrumb')
                                  )); ?>
                                <!-- breadcrumbs -->
                                <?php endif?>


                              <?php echo $content ?>
                          
                           </div><!--/.fluid-container-->
                    </div>
             
            

           


        <div class="container-fluid3">
              <hr>
              <footer>
                <center>
                  Sistema de Seguimiento de Catedra
                  <br>
                Instituto Tecnológico Superior de Rioverde
                <br>


                <p>&copy; Copyright  <?php echo date('Y'); ?></p>
              </footer>
         </div>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span2">
                <div class="well sidebar-nav">
                    <ul class="nav nav-list">
                        <div id='menu'>

                        </div>
                    </ul>
                </div><!--/.well -->
            </div><!--/span-->
            <div class="span10">
              <div class="hero-unit" >
                    <?php echo $content ?>
              </div>
            </div><!--/span-->
        </div><!--/row-->
        <hr>
        <footer>
            <div class="container" style="text-align:center;">
                <p>
                  <u>Sistema de Preinscripcion</u><br>
                  Area de Desarrollo de Software 2014<br>
                  Desarrollado por: <strong>I.S.C. César Augusto Escamilla Martínez.</strong>
                </p>
            </div>
        </footer>
    </div><!--/.fluid-container-->

    </div>

</body>
</html>

