<?php
require_once 'Iemail_template.php';
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Bill_email_template  implements Iemail_template
{
    
    public $user_name;
    public $user_email;
    public $plan_name;
    public $total_publications_bought;
    public $subtotal;
    public $itbis;
    public $total;
    
    public function __construct($user_name,$user_email, $plan_name, $number_of_plans_purchased,$total_publications_bought, $subtotal, $itbis, $total)
    {
        $this->user_name = $user_name;
        $this->user_mail = $user_email;
        $this->plan_name = $plan_name;
        $this->number_of_plans_purchased = $number_of_plans_purchased;
        $this->total_publications_bought = $total_publications_bought;
        $this->subtotal = $subtotal;
        $this->itbis = $itbis;
        $this->total = $total;
    }
    
    public function get_subject()
    {
        return utf8_decode('Propiedom Comprobante de Pago');
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
                    <p style="color: #76b839; margin-bottom: 20px;">
                        Gracias por hacer su orden
                    </p>
                    
                    <p style="font-weight: bold; margin-bottom: 20px;">
                        <span style="font-weight: bold;">El número de confirmación de su orden es:</span> 4838468
                    </p>
                
                     <p>
                        Agradecemos su reciente compra en Propiedom. Le enviamos un e-mail con la confirmaci&oacute;n de la orden que acaba de realizar.
                        
                    </p>
                
                    <p style="background-color: #76bc3b; color: white; padding-left: 10px;">
                        Orden realizada por:
                    </p>
                
                    <p style="color: #b3b3b3; padding-left: 20px; margin-bottom: 40px;">
                        {$this->user_name}
                    </p>
                        
                        
                        
                    

                    <p style="background-color: #76bc3b; color: white; text-align: center;">
                        La descripci&oacute;n de su orden su detalla a continuaci&oacute;n:
                    </p>
                        
                        <table style="text-align:center;">
                            <tr>
                                <td style="font-weight: bold;">
                                    Detalle
                                </td>
                                                       
                        
                                <td style="font-weight: bold;">
                                    Cantidad
                                </td>
                        
                                <td style="font-weight: bold;">
                                    Total publicaciones
                                </td>
                            </tr>
                        
                            <tr>
                                <td>
                                    {$this->plan_name}
                                </td>
                                    
                                <td>
                                    {$this->number_of_plans_purchased}
                                </td>
                                    
                                    
                                    <td>
                                    {$this->total_publications_bought}
                                </td>
                            </tr>
                        </table>
                        
                        
                                    
                         <p style="text-align: right;"> 
                                    Subtotal: RD$ {$this->subtotal}
                                    Impuesto: RD$ {$this->itbis}
                                    Total: RD$ {$this->total}
                                    
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