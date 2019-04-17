  
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

    ->registerCssFile( Yii::app()->theme->baseUrl . '/css/errors.css' )

		// use it when you need it!
		
		->registerCoreScript( 'jquery' )
    /* Custom Functions */
    ->registerScriptFile( Yii::app()->theme->baseUrl . '/js/funciones.js', CClientScript::POS_END )
    ->registerScriptFile( Yii::app()->theme->baseUrl . '/js/validations.js', CClientScript::POS_END )
    /* Custom Functions */
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


<!DOCTYPE html>
<html lang="en">
<head>
  
 <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<meta charset="utf-8">
<title>Preinscripción</title>
<meta name="description" content="">
<meta name="author" content="">

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
      <div class="navbar navbar-fixed-top">
           <p class="navbar-text pull-right"  >
               Logeado: <b><a style="color:white;"><?php echo Yii::app()->user->name; ?></a></b> 
            </p>         
            <a class="brand" style=
            "font-weight:normal;color:gray;font-family: '"Helvetica Neue", Helvetica, Arial, sans-serif';font-size:14px;margin:0px 0px;padding-bottom:10px;" href="#">PREINS</a>
        <?php 
        $this->widget('application.extensions.eflatmenu.EFlatMenu', array(
        'items'=>array(
              array('label' => 'Inicio', 'url' => array('/site/index')),
                array('label'=>'Alumnos', 'url'=>array('/site/alumnos'), 
                'linkOptions'=>array('onClick'=>"mostrarMenu('Alumnos','Modulo'," .$id_user. ")",'style' => 'cursor:pointer;'),),
                array('label'=>'Base', 'url'=>array('/site/base'), 
                'linkOptions'=>array('onClick'=>"mostrarMenu('Base','Modulo'," .$id_user. ")",'style' => 'cursor:pointer;'),),
                array('label'=>'Configuracion', 'url'=>array('/site/configuracion'), 
                'linkOptions'=>array('onClick'=>"mostrarMenu('Configuracion','Modulo'," .$id_user. ")",'style' => 'cursor:pointer;'),),
                array('label'=>'Escuela', 'url'=>array('/site/escuela'),
                'linkOptions'=>array('onClick'=>"mostrarMenu('Escuela','Modulo'," .$id_user. ")",'style' => 'cursor:pointer;'),),
                array('label'=>'Grupos', 'url'=>array('/site/examen'),
                'linkOptions'=>array('onClick'=>"mostrarMenu('Examen','Modulo'," .$id_user. ")",'style' => 'cursor:pointer;'),),
                array('label'=>'Login', 'url'=>array('/site/login'),'visible'=>Yii::app()->user->isGuest),              
                array('label'=>'Logout ('. strtoupper(Yii::app()->user->name).')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
        ),
              ));
          ?>  
        
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
</body>
</html>

