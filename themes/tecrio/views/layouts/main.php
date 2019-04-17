<?php
  $conexion=mysql_connect("localhost","root","");  
          mysql_select_db("planeacioncatedra",$conexion);?>

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
              array('label'=>'Inicio', 'url'=>array('/site/index')),
              array('label'=>'Planes de Estudio', 'url'=>array('/planEstudio/PlanesEstudio')),
              array('label'=>'Instrumentación', 'url'=>array('/Instrumentacion/busqueda')),              
              array('label'=>'Iniciar Sesión', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
              array('label'=>'Cerrar Sesión ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
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


    </div>

</body>
</html>

