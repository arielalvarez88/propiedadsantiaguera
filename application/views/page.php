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
                
                <div>
                    <ul >
                    <li><a class="no-decoration-anchor">RESUMEN</a>|</li>
                    <li><a class="no-decoration-anchor" href="/panel/propiedades">PROPIEDADES</a>|</li>
                    <li><a class="no-decoration-anchor" href="/panel/cuenta">CUENTA</a>|</li>
                    <li><a class="no-decoration-anchor ">SOLICITUDES</a></li>
                </ul>

                        <p>Bienvenido, <?php echo $loggedUser->name; ?> <a id="logout-button" href="/usuario/logout">SALIR</a></p>
                    
                    
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
                    <ul class="primary-links">
                        <li class="menu-111 first"><a title="" href="<?php echo base_url(); ?>">INICIO</a></li>
                        <li class="menu-269"><a title="" href="/propiedades">PROPIEDADES</a></li>
                        <li class="menu-270"><a title="" href="/miembros">MIEMBROS</a></li>
                        <li class="menu-271"><a title="" href="/planes">PRECIOS</a></li>
                        <li class="menu-271"><a title="" href="/planes">SOLICITUDES</a></li>
                        <li class="menu-272 last"><a title="" href="/contacto">CONTACTO</a></li>
                    </ul>                   
                </div>
            </div>
            <div id="content">
                <?php if (isset($topLeftSide) || isset($topCenterSide) || isset($topRightSide) || isset($top)): ?>
                    <div id="top-section">
                        
                        
                        <?php if (isset($top)): ?>
                            <div id="top">
                                <?php echo $top;?>
                            </div>
                        <?php endif; ?>
         
                        
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


            
   
        </div>
        
                 <div id="footer">
                            <div id="contet-footer-divisor"></div>
                            
                            
                            
                                
                           
                <div id="footer-body">
                    
                    <div id="footer-logo-message">
                        <img id="footer-logo" src="/images/footer/footerLogo.png"/>
                        <p id="footer-message"><span class="bold">Propiedad Santiaguera</span> es una plataforma virtual facilita de manera f&aacute;cil e interactiva, la oferta inmobiliaria del mercado.</p>
                    </div>
                    
                     
                    
                    <div id="footer-company-menu">
                        <h2>Empresa</h2>
                        <ul>
                        <li>
                            Nosotros
                        </li>
                        <li>
                            Herramientas
                        </li>
                        <li>
                            Precios
                        </li>
                        <li>
                            Solicitudes
                        </li>
                        <li>
                            Publicidad
                        </li>
                    </ul>
                    </div>
                    
                    <div id="footer-resources-menu">
                        <h2>Recursos</h2>
                        <ul>
                        <li>
                            Soporte
                        </li>
                        <li>
                            <a href="/terminos">T&eacute;rminos de uso</a>
                        </li>
                        <li>
                            <a href="/politicas">Privacidad y</a>
                        </li>
                        <li>
                            <a href="/politicas">Seguridad</a>
                        </li>
                        
                    </ul>
                    </div>
                    
                    <div id="footer-contact">
                        <h2>Contactanos</h2>
                        <p>Calle M&eacute;xico Esq. Apeco, #32B <br/> Reparto del Este, Santiago, Rep. Dom. <br/> 809.582.2690</p>
                        <h4>Siguenos</h4>
                        <p>
                            <a href="#not-yet"></a>
                            <a id="twitter-icon" href="#not-yet"></a>
                            <a id="google-plus-icon" href="#not-yet"></a>
                        </p>
                            
                    </div>
                    
                    
                    
             

                <div id="footer-bottom">
                    <p id="footer-bottom-left">2011 Propiedad Santiaguera, All rights reserved</p>
                    <a class="no-decoration-anchor" href="http://www.5050mkt.com"><img src="/images/common/5050mktLogo.png" alt="5050mkt-logo"/></a>
                    <p id="footer-bottom-right">
                        Propiedad Santiaguera es un producto de
                    </p>
                </div>

                       </div>
                </div>
                                
                                
                                
                                
            </div>
            
            <!--[if !IE 7]>
	
		#wrapper {display:table;height:100%}

<![endif]-->

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