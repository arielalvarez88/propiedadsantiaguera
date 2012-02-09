<?php
$loggedUser = User_handler::getLoggedUser();

$thisPage = str_replace('/', '-', uri_string());
$can_create_properties = !$loggedUser instanceof IUser_requests_only;
$can_create_agents = $loggedUser instanceof Company_user;

$language = Language_handler::get_user_prefered_language();
$this->lang->load("footer", $language);
$this->lang->load("header", $language);

require_once realpath("./application/libraries/User_factory.php");
require_once realpath("./application/libraries/User_factory.php");
require_once realpath("./application/libraries/User_factory.php");
require_once realpath("./application/libraries/User_factory.php");
?>
<html>

    <head>

        <title>Propiedom - Red de Propiedades Dominicanas</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="stylesheet" type="text/css" href="<?php base_url(); ?>/css/propiedadsantiaguera.css"/>
        <link rel="icon" href="<?php echo base_url(); ?>images/common/favicon.ico" type="image/x-icon"/>

        <link rel="shortcut icon" href="<?php echo base_url(); ?>images/common/favicon.ico" type="image/x-icon"/> 

        <script type="text/javascript">

            var _gaq = _gaq || [];
            _gaq.push(['_setAccount', 'UA-28926825-1']);
            _gaq.push(['_trackPageview']);

            (function() {
                var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
                ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
                var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
            })();

        </script>
    </head>
    <body>

        <div id="fb-root"></div>
        <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/es_LA/all.js#xfbml=1&appId=317263621644405";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>

        <?php if ($loggedUser && $loggedUser->name): ?>

            <div id="upper-panel">

                <div>
                    <ul >
                        <?php if ($loggedUser instanceof Admin_user): ?>
                            <li><a class="no-decoration-anchor" href="<?php base_url(); ?>cms">CMS</a>|</li>

                        <?php endif; ?>
                        <?php if ($can_create_properties): ?>
                            <li><a class="no-decoration-anchor" href="<?php base_url(); ?>/panel/propiedades">PROPIEDADES</a>|</li>
                        <?php endif; ?>

                        <li><a class="no-decoration-anchor" href="<?php base_url(); ?>/panel/cuenta">CUENTA</a><?php echo $can_create_agents ? '|' : ''; ?></li>
    <!--                            <li><a class="no-decoration-anchor ">SOLICITUDES</a><?php echo $can_create_agents ? '|' : ''; ?></li>-->
                        <?php if ($can_create_agents): ?>
                            <li><a class="no-decoration-anchor" href="<?php base_url(); ?>/panel/agentes">AGENTES</a></li>

                        <?php endif; ?>



                    </ul>

                    <p>Bienvenid@, <?php echo $loggedUser->name; ?> <a id="logout-button" href="<?php base_url(); ?>/usuario/logout">SALIR</a></p>


                </div>


            </div>

        <?php endif; ?>

        <div id="content-header-wrapper">
            <div id="header">
                <div id="banner-container">
                    <div id="banner">

                        <div id="top-links">



                            <div id="idiomas-container">
                                <span>Idioma:</span>

                                <ul id="idomas-list">
                                    <li class="idiomas-item" id="espanol">
                                        <a href="/change_language/set_language/spanish" class="no-decoration-anchor" href="#">
                                            <img  src="<?php base_url(); ?>/images/spanishFlag.png" class="no-decoration-anchor"/>
                                        </a>
                                    </li>
                                    <li class="idiomas-item" id="ingles">
                                        <a href="/change_language/set_language/english" class="no-decoration-anchor" href="#">
                                            <img  src="<?php base_url(); ?>/images/englishFlag.png" class="no-decoration-anchor"/>
                                        </a>

                                    </li>
                                </ul>

                            </div>  

                            <div id="login-links">


                                <a class="no-decoration-anchor" href="<?php base_url(); ?>/contacto"><?php echo $this->lang->line('header_contact_link'); ?></a>
                                <span class="vertical-serparator"><img src="<?php base_url(); ?>/images/phone_icon.png" alt="dude"/></span>



                                <a id="header-help" class="no-decoration-anchor" href="<?php base_url(); ?>/soporte"><?php echo $this->lang->line('header_support_link'); ?></a>
                                <span class="vertical-serparator"><img src="<?php base_url(); ?>/images/help_icon.png" alt="help"/></span>


                            </div>


                        </div>


                        <div id="logo">
                            <a href="/"><img alt="logo" src="<?php base_url(); ?>/images/common/logo.png"></a>
                            <div id="banner-image">
                                <img src="<?php base_url(); ?>/images/headerBanner/banner.png" alt="banner top"/>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="top-menu-container">

                    <?php if (!$loggedUser || !$loggedUser->name): ?>
                        <a id="login-link" class="no-decoration-anchor" href="<?php base_url(); ?>/ajax/view_loader/blocks/login"><img src="<?php base_url(); ?>/images/primaryLinks/loginButton.png" alt="Login Button"/></a>
                    <?php endif; ?>

                    <ul class="primary-links">
                        <li class="menu-111 first"><a title="" href="<?php echo base_url(); ?>"><?php echo $this->lang->line('header_home_link'); ?></a></li>
                        <li class="menu-269"><a  href="<?php base_url(); ?>/propiedades"><?php echo $this->lang->line('header_properties_link'); ?></a></li>
                        <li class="menu-270"><a  href="<?php base_url(); ?>/miembros"><?php echo $this->lang->line('header_members_link'); ?></a></li>
                        <li class="menu-271"><a  href="<?php base_url(); ?>/planes"><?php echo $this->lang->line('header_prizes_link'); ?></a></li>


                    </ul>                




                </div>
            </div>
            <div id="content">
                <?php if (isset($topLeftSide) || isset($topCenterSide) || isset($topRightSide) || isset($top)): ?>
                    <div id="top-section">


                        <?php if (isset($top)): ?>
                            <div id="top">
                                <?php echo $top; ?>
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

                <?php if (isset($bottomLeftSide) || isset($bottomRightSide) || isset($bottom)): ?>
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
                    <img id="footer-logo" src="<?php base_url(); ?>/images/footer/footerLogo.png"/>


                    <p id="footer-message"><?php echo $this->lang->line("footer_page_description"); ?></p>
                </div>






                <div id="footer-company-menu">
                    <h2><?php echo $this->lang->line("footer_company_menu_header"); ?></h2>
                    <ul>
                        <li>
                            <a href="<?php base_url(); ?>/nosotros"><?php echo $this->lang->line("footer_company_menu_us"); ?></a>
                        </li>
                        <li>
                            <a class="no-decoration-anchor" href="<?php base_url(); ?>/herramientas"><?php echo $this->lang->line("footer_company_menu_tools"); ?></a>
                        </li>
                        <li>
                            <a href="<?php base_url(); ?>/planes"><?php echo $this->lang->line("footer_company_menu_terms"); ?></a>
                        </li>

                        <li>
                            <?php echo $this->lang->line("footer_company_menu_publicity"); ?>
                        </li>
                    </ul>
                </div>



                <div id="footer-resources-menu">
                    <h2><?php echo $this->lang->line("footer_resources_menu_header"); ?></h2>
                    <ul>
                        <li>
                            <a href="<?php base_url(); ?>/soporte"><?php echo $this->lang->line("footer_resources_menu_support"); ?></a>
                        </li>
                        <li>
                            <a href="<?php base_url(); ?>/terminos"><?php echo $this->lang->line("footer_resources_menu_terms"); ?></a>
                        </li>
                        <li>
                            <a href="<?php base_url(); ?>/politicas"><?php echo $this->lang->line("footer_resources_menu_privacy"); ?></a>
                        </li>

                    </ul>
                </div>







                <div id="footer-contact">
                    <h2><?php echo $this->lang->line("footer_contact_us_header"); ?></h2>
                    <p><?php echo $this->lang->line("footer_contact_us_text"); ?></p>
                    <h4><?php echo $this->lang->line("footer_contact_follow_us"); ?></h4>
                    <p>
                        <a href="http://www.facebook.com/pages/Propiedom/250512698354520" target="_blank" id="facebook-icon"></a>
                        <a id="twitter-icon" href="#not-yet"></a>
                        <a id="google-plus-icon" href="#not-yet"></a>
                    </p>

                </div>





                <div id="footer-bottom">
                    <p id="footer-bottom-left"><?php echo $this->lang->line("footer_rights"); ?></p>
                    <a class="no-decoration-anchor" href="http://www.5050mkt.com"><img src="<?php base_url(); ?>/images/common/5050mktLogo.png" alt="5050mkt-logo"/></a>
                    <p id="footer-bottom-right">
                        <?php echo $this->lang->line("footer_product"); ?>
                    </p>
                </div>

            </div>
        </div>    


        <!--[if !IE 7]>

		#wrapper {display:table;height:100%}

<![endif]-->

        <script type="text/javascript" src="<?php base_url(); ?>/js/Interfaces.js" type="text/javascript" ></script>
        <script type="text/javascript" src="<?php base_url(); ?>/js/jquery-1.7.1.js" type="text/javascript" ></script>
        <script type="text/javascript" src="<?php base_url(); ?>/js/jquery-ui-1.8.16.custom.min.js" type="text/javascript" ></script>        
        <script type="text/javascript" src="<?php base_url(); ?>/js/jquery.cycle.all.js" type="text/javascript" ></script>
        <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>        
        <script type="text/javascript" src="<?php base_url(); ?>/js/jquery.fancybox-1.3.4.js" type="text/javascript" ></script>
        <script type="text/javascript" src="<?php base_url(); ?>/js/jquery.validate.min.js" type="text/javascript" ></script>
        <script type="text/javascript" src="<?php base_url(); ?>/js/tiny_mce/tiny_mce.js" type="text/javascript" ></script>



        <script type="text/javascript" src="<?php base_url(); ?>/js/propiedadsantiaguera.js" type="text/javascript" ></script>
        <script type="text/javascript" src="http://use.typekit.com/awd1xwd.js"></script>
        <script type="text/javascript">try{Typekit.load();}catch(e){}</script>
        <script type="text/javascript" src="<?php base_url(); ?>/js/css_browser_selector.js" type="text/javascript" ></script>


    </body>
</html>