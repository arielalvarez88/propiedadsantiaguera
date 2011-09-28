 <?php
$loggedUser = User_handler::getLoggedUser();

$thisPage = str_replace('/', '-', uri_string());
 ?>
<html>

    <head>
        <link rel="stylesheet" type="text/css" href="/css/propiedadsantiaguera.css"/>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    </head>
    <body>
        <div id="wrapper">
            <div id="header">
                <div id="banner-container">
                    <div id="banner">

                        <div id="login">
                            <p>
                                <?php if($loggedUser):?>
                                <span id="saludo-usuario">Bienvenido <?php echo $loggedUser->name.', ';?></span>
                                <a class="no-decoration-anchor" href="/loggout</a>
                                <span class="vertical-serparator"> | </span>
                                <?php endif;?>
                                <a class="no-decoration-anchor" href="#">Somos</a>
                                <span class="vertical-serparator"> | </span>
                                  <?php if(!$loggedUser):?>
                                <a class="no-decoration-anchor" href="#">Login Usuarios</a>
                                 <span class="vertical-serparator"> | </span>
                                <?php endif;?>
                                
                               
                                <a class="no-decoration-anchor" href="#">Ayuda</a>
                            </p>


                        </div>

                        <div id="logo">
                            <img alt="logo" src="/images/logo.png">
                        </div>
                    </div>
                </div>

                <div id="top-menu-container">
                    <ul class="primary-links"><li class="menu-111 first"><a title="" href="<?php echo base_url();?>">INICIO</a></li>
                        <li class="menu-269"><a title="" href="/propiedades">PROPIEDADES</a></li>
                        <li class="menu-270"><a title="" href="/agentes">AGENTES</a></li>
                        <li class="menu-271"><a title="" href="http://www.google.com">PRECIOS Y PLANES</a></li>
                        <li class="menu-272 last"><a title="" href="http://www.google.com">CONTACTO</a></li>
                    </ul>                    
                    <div id="idiomas-container">
                        <span>Idioma:</span>
                        <ul id="idomas-list">
                            <li class="idiomas-item" id="espanol">
                                <a class="no-decoration-anchor" href="#">
                                    <img src="/images/spanishFlag.png" class="no-decoration-anchor"/>
                                </a>
                            </li>
                            <li class="idiomas-item" id="ingles">
                                <a class="no-decoration-anchor" href="#">
                                    <img src="/images/englishFlag.png" class="no-decoration-anchor">
                                </a>

                            </li>
                        </ul>
                    </div>

                </div>
            </div>
            <div id="content">
                <?php if (isset($topLeftSide) || isset($topCenterSide) || isset($topRightSide)): ?>
                    <div id="top-section">
                        <?php if (isset($topLeftSide)): ?>
                            <div id="top-left-side">
                                <?php echo $topLeftSide; ?>
                            </div>
                        <?php endif; ?>

                        <?php if (isset($topCenterSide)): ?>
                            <div id="top-center-side">
                                <?php echo $topCenterSide; ?>
                            </div>
                        <?php endif; ?>

                        <?php if (isset($topRightSide)): ?>

                            <div id="top-right-side">
                                <?php echo $topRightSide; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

                <?php if (isset($centerSection)): ?>

                    <div id="center-section">
                        <?php echo $centerSection; ?>
                    </div>
                <?php endif; ?>

                <?php if (isset($bottomLeftSide) || isset($bottomRightSide)): ?>
                    <div id="bottom-section">
                        <?php if (isset($bottomLeftSide)): ?>
                            <div id="bottom-left-side">
                                <?php echo $bottomLeftSide; ?>
                            </div>
                        <?php endif; ?>

                        <?php if (isset($bottomRightSide)): ?>
                            <div id="bottom-right-side">
                                <?php echo $bottomRightSide; ?>
                            </div>
                        <?php endif; ?>
                    </div>

                <?php endif; ?>


            </div>
            <div id="contet-footer-divisor"></div>

            <div id="footer">
                <div id="footer-left-side">

                    <div id="footer-propiedades">
                        <div id="footer-propiedad1" class="footer-propiedad">
                            <p><img id="footer-propiedad1-icon" src="/images/footer/footerSectionIcon1.png"/><a id="footer-propiedad1-link"  class="no-decoration-anchor">Propiedades de Lujo</a></p>
                        </div>

                        <div id="footer-propiedad2" class="footer-propiedad">
                            <p><img  id="footer-propiedad2-icon" src="/images/footer/footerSectionIcon2.png"/><a id="footer-propiedad2-link" class="no-decoration-anchor">Terrenos</a></p>
                        </div>
                    </div>
                    <ul id="secondary-links">
                        <li class="secondary-link"><a class="no-decoration-anchor" href="<?php base_url(); ?>">INICIO</a> | </li>
                        <li class="secondary-link"><a class="no-decoration-anchor" href="<?php base_url(); ?>">PROPIEDADES</a> | </li>
                        <li class="secondary-link"><a class="no-decoration-anchor" href="<?php base_url(); ?>">AGENTES</a> | </li>
                        <li class="secondary-link"><a class="no-decoration-anchor" href="<?php base_url(); ?>">PUBL&Iacute;CATE</a> |</li>
                        <li class="secondary-link"><a class="no-decoration-anchor" href="<?php base_url(); ?>">CONTACTENOS</a></li>

                    </ul>
                    <p id="footer-copyright" >Copyright 2011 propiedadsantiaguera.com | Todos los derechos reservados.</p>
                </div>
                <div id="footer-right-side">

                    <div id="footer-social">
                        <p>
                            <span id="footer-siguenos"> Siguenos en: </span> 
                            <a href="http://www.facebook.com/pages/5050MKT/175725589155037" class="footer-social-icon"><img class="no-decoration-anchor" src="/images/footer/facebookIcon.png"/></a>
                            <a href="http://twitter.com/#!/5050MKT" class="footer-social-icon"><img  class="no-decoration-anchor" src="/images/footer/tweeterIcon.png"/></a>
                            <a href="#no-link" class="footer-social-icon no-decoration-anchor"><img class="no-decoration-anchor" src="/images/footer/punticosIcon.png"/></a>
                            <a href="#no-link" class="footer-social-icon no-decoration-anchor"><img class="no-decoration-anchor" src="/images/footer/youtubeIcon.png"/></a>
                        </p>
                    </div>
                    <div id="footer-logo">
                        <img src="/images/footer/footerLogo.png"/>
                    </div>
                    <div id="footer-firma">
                        <img src="/images/footer/firma.png"/>
                    </div>
                </div>

            </div>
        </div>
        <script src="/js/jquery-1.6.1.min.js" type="text/javascript" ></script>
        <script src="/js/jquery-ui-1.8.14.custom.min.js" type="text/javascript" ></script>        
        <script src="/js/jquery.cycle.all.js" type="text/javascript" ></script>
        <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
        <script type="text/javascript" src="/js/ajaxupload.js"></script>
        <script src="/js/propiedadsantiaguera.js" type="text/javascript" ></script>
    </body>
</html>