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
                                <?php if ($loggedUser): ?>
                                    <span id="saludo-usuario">Bienvenido <?php echo $loggedUser->name . ', '; ?></span>
                                    <a class="no-decoration-anchor" href="/userController/logout">logout</a>
                                    <span class="vertical-serparator"> | </span>
                                <?php endif; ?>
                                <a id="login-link" class="no-decoration-anchor" href="/usuario/loginform">LOG IN</a>

                                <span class="vertical-serparator"><img src="/images/dude_icon.png" alt="dude"/></span>
                                <?php if (!$loggedUser): ?>
                                    <a class="no-decoration-anchor" href="#">CONTACTENOS</a>
                                    <span class="vertical-serparator"><img src="/images/phone_icon.png" alt="dude"/></span>
                                <?php endif; ?>


                                <a id="header-help" class="no-decoration-anchor" href="#login">AYUDA</a>
                                <span class="vertical-serparator"><img src="/images/help_icon.png" alt="help"/></span>
                            </p>  
                            <div id="banner-image">
                                <img src="/images/banner_top.png" alt="banner top"/>
                            </div>
                        </div>


                        <div id="logo">
                            <img alt="logo" src="/images/logo.png">
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
                <img id="footer-logo" src="/images/logo.png"/>
                <p id="footer-message">Propiedad Snatiaguera es una plataforma virtual que conecta al público en general con un amplio rango de suplidores de calidad a nivel nacional para la planificación, organización y realización de todo tuipo de eventos.</p>
                <div id="newsletter">

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