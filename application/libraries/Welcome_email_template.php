<?php
require_once 'Iemail_template.php';
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Welcome_email_template  implements Iemail_template
{
    
    public $user_name;
    public $user_email;
    public function __construct($user_name,$user_type,$user_email)
    {
        $this->user_name = $user_name;
        $this->user_mail = $user_email;
        $this->user_type = $user_type;
        
        
    }
    
    public function get_subject()
    {
        return utf8_decode('Bienvenido a Propiedom');
    }
    
    public function email_template($client_name)
    {
        
        $propiedom_page = base_url();
        $propiedom_logo = base_url().'images/common/logo.png';
        $planes_url = $propiedom_page.'planes';
        
         date_default_timezone_set("America/La_Paz");
        $date = date("j/n/Y g:s A");
        $html = <<<EOD
        <div style="background-color:#76bc3b; padding:40px; width:500px; height: 625px; text-align:center;">
            <div style="background-color: white; padding:30px; width:400px; height: 550px; position: relative; margin-right: auto; margin-left: auto;">
                <a style="border:none; text-decoration: none;" href={$propiedom_page}><img src="{$propiedom_logo}" alt="logo" style="border:none; text-decoration: none;"/></a>
                <div style="text-align:left;">
                    <p>
                        Bienvenido a Propiedom.com
                    </p>
                    
                    <p>
                        Usted ha creado una cuenta {$this->user_type} en nuestra plataforma a nombre de {$this->user_name}. En caso de que necesite publicaciones adicionales para agregar o publicar nuevamente sus propiedades, no dude en echarle un vistazo a <a href="{$planes_url}" style="text-decoration: underline; color: #76bb3a;>nuestro planes de publicaciones</a>
                    </p>
                     
                     <p>
                        Usuario: {$this->user_email}
                        <span style="font-weight: bold;">¿Olvidó su contraseña?</span> No hay problema, <span style="text-decoration:underline; font-weight: bold;">resetéela ahora</span>
                    </p>
                    

                    <p>
                        Si necesita asistencia o tiene alguna pregunta relacionada con su reciente compra, no dude en enviarnos un e-mail a servicios@propiedom.com, en nustra sección de ayuda o llámanos al 809-582-2690.
                    </p>
                        
                    <p>
                        Sincermente,<br/>
                        Equipo de Propiedom
                     </p>

                        
                </div>
                
            </div>
            <p color: white;>&#169; 2012 Propiedom - <a style="text-decoration: none;" href="{$politics_url}"> Política de seguridad </a>- <a style="text-decoration: none;" href="{$terms_url}"> Términos de uso </a> </p>
        </div>
EOD;
        return $html;
    }
    
    
}
?>