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
        <?php if ($loggedUser && $loggedUser->name): ?>
            <div id="upper-panel">
                <ul class="hidden">
                    <li><a class="no-decoration-anchor">RESUMEN</a>|</li>
                    <li><a class="no-decoration-anchor" href="/panel/propiedades">PROPIEDADES</a>|</li>
                    <li><a class="no-decoration-anchor" href="/panel/cuenta">CUENTA</a>|</li>
                    <li><a class="no-decoration-anchor ">SOLICITUDES</a></li>
                </ul>
                <div id="upper-panel-curve-part">
                    <a class="no-decoration-anchor" href="#javascript" id="upper-panel-hide-show"><img class="hide-show-arrow"  src="/images/upperPanel/downArrow.png" alt="flecha-abajo" class="visible"/> <img  class="hidden"  src="/images/upperPanel/upArrow.png" alt="flecha-arriba"/></a><p>Bienvenido, <?php echo $loggedUser->name; ?> </p><a id="logout-button" href="/usuario/logout">SALIR</a>
                </div>

            </div>

        <?php endif; ?>
        
        <div id="wrapper">
            <div id="header">
                <div id="banner-container">
                    <div id="banner">
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
                        <div id="login-links">
                            <p>
                                <?php if (!$loggedUser || !$loggedUser->name):?>
                                    <a id="login-link" class="no-decoration-anchor" href="/usuario/loginform">LOG IN</a>
                                    <span class="vertical-serparator"><img src="/images/dude_icon.png" alt="dude"/></span>
                                <?php endif;?>
                                    
                                
                                
                                    <a class="no-decoration-anchor" href="#">CONTACTENOS</a>
                                    <span class="vertical-serparator"><img src="/images/phone_icon.png" alt="dude"/></span>
                                


                                <a id="header-help" class="no-decoration-anchor" href="#login">AYUDA</a>
                                <span class="vertical-serparator"><img src="/images/help_icon.png" alt="help"/></span>
                            </p>  
                            <div id="banner-image">
                                <img src="/images/banner_top.png" alt="banner top"/>
                            </div>
                        </div>


                        <div id="logo">
                            <a href="/"><img alt="logo" src="/images/logo.png"><a/>
                        </div>
                    </div>
                </div>

                <div id="top-menu-container">
                    <ul class="primary-links"><li class="menu-111 first"><a title="" href="<?php echo base_url(); ?>">INICIO</a></li>
                        <li class="menu-269"><a title="" href="/propiedades">PROPIEDADES</a></li>
                        <li class="menu-270"><a title="" href="/agentes">AGENTES</a></li>
                        <li class="menu-271"><a title="" href="/planes">PRECIOS Y PLANES</a></li>
                        <li class="menu-272 last"><a title="" href="http://www.google.com">CONTACTO</a></li>
                    </ul>                   
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

                        <?php if (isset($bottom)): ?>
                            <div id="bottom">
                                <?php echo $bottom; ?>
                            </div>
                        <?php endif; ?>
                    </div>

                <?php endif; ?>


            </div>
            <div id="contet-footer-divisor"></div>

            <div id="footer">

                <div id="footer-left-side">
                    <img id="footer-logo" src="/images/logo.png"/>
                    <p id="footer-message">Propiedad Santiaguera es una plataforma virtual que conecta al público en general con un amplio rango de suplidores de calidad a nivel nacional para la planificación, organización y realización de todo tuipo de eventos.</p>

                </div>

                <div id="footer-right-side">
                    <div id="newsletter">
                        <h3>Newsletter</h3>
                        <p >Recibe ofertas e informaciones sobre nuestros servicios</p>
                        <div class="round-corners" id="newsletter-email-container">
                            <input type="text" id="newsletter-input" class="round-corners"> 
                            <a href="#javascript" class="no-decoration-anchor round-corners" id="newsletter-subscribe-button">Suscríbete</a>
                        </div>

                    </div>
                    <a href="http://www.5050mkt.com" id="footer-makers-logo"><img src="/images/common/5050mktLogo.png"/></a>

                </div>


            </div>
        </div>



        <script type="text/javascript" src="/js/jquery-1.6.4.min.js" type="text/javascript" ></script>
        <script type="text/javascript" src="/js/jquery-ui-1.8.16.custom.min.js" type="text/javascript" ></script>        
        <script type="text/javascript" src="/js/jquery.cycle.all.js" type="text/javascript" ></script>
        <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>        
        <script type="text/javascript" src="/js/jquery.fancybox-1.3.4.js" type="text/javascript" ></script>
        <script type="text/javascript" src="/js/propiedadsantiaguera.js" type="text/javascript" ></script>
        <script type="text/javascript" src="http://use.typekit.com/awd1xwd.js"></script>
        <script type="text/javascript">try{Typekit.load();}catch(e){}</script>
    </body>
</html>