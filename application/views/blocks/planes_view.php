<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$language = Language_handler::get_user_prefered_language();
$this->lang->load("plans",$language);

?>
<h1 id="planes_main_title"><?php echo $this->lang->line("plans_header");?></h1>
<h4 id="planes_main_subtitle"><?php echo $this->lang->line("plans_sub_header");?></h4>
<div id="planes_holder">
    <table id="planes_detail">

        <tr>
            <td ><?php echo $this->lang->line("plans_number_of_posts");?></td>
        </tr>
        <tr>      
            <td ><?php echo $this->lang->line("plans_duration_per_post");?></td>
        </tr>

        <tr>
            <td ><?php echo $this->lang->line("plans_number_of_photos_and_videos");?></td>
        </tr>
        <tr>
            <td  ><?php echo $this->lang->line("plans_administrative_panel");?></td>
        </tr>
<!--        <tr>
            <td  >CREAR SOLICITUDES Y<br> RECIBIR PROPUESTAS</td>
        </tr>
        <tr>
            <td >ENVIO DE PROPUESTAS A TERCEROS</td>
        </tr>-->

        <tr>
            <td ><?php echo $this->lang->line("plans_ingormation_in_english_and_spanish");?></td>
        </tr>
        <tr>
            <td ><?php echo $this->lang->line("plans_google_maps");?></td>
        </tr>
    </table>

    <table id="planes_data">
        <thead>
            <tr>                
                <th><?php echo $this->lang->line("plans_basic_plan");?></th><th><img id="plans-most-popular" src="<?php echo base_url().$this->lang->line("plans_most_popular_photo_src");?>" alt="mas-popular"/><?php echo $this->lang->line("plans_plus_plan");?></th><th><?php echo $this->lang->line("plans_agent_plan");?></th><th><?php echo $this->lang->line("plans_company_plan");?></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td> <td class="white">5</td> <td>10</td> <td class="white">25</td>
            </tr>
            <tr>
                <td>30 <?php echo $this->lang->line("common_days_word");?></td> <td class="white">30 <?php echo $this->lang->line("common_days_word");?></td> <td>30 <?php echo $this->lang->line("common_days_word");?></td> <td class="white">30 <?php echo $this->lang->line("common_days_word");?></td>
            </tr>
            <tr>
                <td><img src="<?php base_url();?>/images/check.png" alt="check"/></td> <td><img src="<?php base_url();?>/images/blanco.png" alt="check"/></td> <td><img src="<?php base_url();?>/images/check.png" alt="check"/></td> <td><img src="<?php base_url();?>/images/blanco.png" alt="check"/></td>
            </tr>
            <tr>
                <td><img src="<?php base_url();?>/images/check.png" alt="check"/></td  > <td><img src="<?php base_url();?>/images/blanco.png" alt="check"/></td> <td><img src="<?php base_url();?>/images/check.png" alt="check"/></td> <td><img src="<?php base_url();?>/images/blanco.png" alt="check"/></td>
            </tr>
            <tr>
                <td><img src="<?php base_url();?>/images/check.png" alt="check"/></td> <td><img src="<?php base_url();?>/images/blanco.png" alt="check"/></td> <td><img src="<?php base_url();?>/images/check.png" alt="check"/></td> <td><img src="<?php base_url();?>/images/blanco.png" alt="check"/></td>
            </tr>
            <tr>
                <td><img src="<?php base_url();?>/images/check.png" alt="check"/></td> <td><img src="<?php base_url();?>/images/blanco.png" alt="check"/></td> <td><img src="<?php base_url();?>/images/check.png" alt="check"/></td> <td><img src="<?php base_url();?>/images/blanco.png" alt="check"/></td>
            </tr>
            
            
            <tr>
                <td>RD$1,500<br><span>RD$1,500/<?php echo $this->lang->line("common_property_word");?></span></td> <td>RD$6,000</br><span class="white">RD$1,200/<?php echo $this->lang->line("common_property_word");?></span></td> <td>RD$10,000</br><span>RD$1,000/<?php echo $this->lang->line("common_property_word");?></span></td> <td>RD$20,000</br><span class="white">RD$800/<?php echo $this->lang->line("common_property_word");?></span></td> 
            </tr>
            <tr>
                <td><a class="plans-choose-plan-link" href="<?php echo Environment_vars::$paths['https_base_site'];?>/compra/plan/<?php echo Environment_vars::$maps['texts_to_id']['plans']['Basico'];?>"><?php echo $this->lang->line("plans_choose_plan");?></a></td> 
                <td> <a class="plans-choose-plan-link" href="<?php echo Environment_vars::$paths['https_base_site'];?>/compra/plan/<?php echo Environment_vars::$maps['texts_to_id']['plans']['Plus'];?>"><?php echo $this->lang->line("plans_choose_plan");?></a></td> 
                <td> <a class="plans-choose-plan-link" href="<?php echo Environment_vars::$paths['https_base_site'];?>/compra/plan/<?php echo Environment_vars::$maps['texts_to_id']['plans']['Agente'];?>"><?php echo $this->lang->line("plans_choose_plan");?></a></td>
                <td><a class="plans-choose-plan-link" href="<?php echo Environment_vars::$paths['https_base_site'];?>/compra/plan/<?php echo Environment_vars::$maps['texts_to_id']['plans']['Inmobiliaria'];?>"><?php echo $this->lang->line("plans_choose_plan");?></a></td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="4">&nbsp;</td>
            </tr>
        </tfoot>

    </table>
    <div id="why-photos">
        <img src="<?php base_url();?>/images/planes/why.png" alt="fotos-profesionales"/>
        <img src="<?php base_url();?>/images/planes/proPhotos.png" alt="fotos-profesionales"/>
    </div>

</div>

<h1 class="info_importante_title"><?php echo $this->lang->line("plans_important_text");?></h1>
<div id="info_importante_content">
    <dl id="dl_left">
        <dt>» <?php echo $this->lang->line("plans_question_1");?></dt>
        <dd><?php echo $this->lang->line("plans_question_1_answer");?></dd>

        <dt>» <?php echo $this->lang->line("plans_question_2");?></dt>
        <dd><?php echo $this->lang->line("plans_question_2_answer");?></dd>

        <dt>» <?php echo $this->lang->line("plans_question_3");?></dt>
        <dd><?php echo $this->lang->line("plans_question_3_answer");?></dd>
    </dl>

    <dl id="dl_right">
        <dt>» <?php echo $this->lang->line("plans_question_4");?></dt>
        <dd><?php echo $this->lang->line("plans_question_4_answer");?></dd>

        <dt>» <?php echo $this->lang->line("plans_question_5");?></dt>
        <dd><?php echo $this->lang->line("plans_question_5_answer");?></dd>
    </dl>

    <p><strong><?php echo $this->lang->line("plans_question_6");?></strong></br>
      <?php echo $this->lang->line("plans_question_6_answer");?></br></br>


        <span><strong><?php echo $this->lang->line("plans_rules_1");?> <a href="<?php base_url();?>/politicas"><?php echo $this->lang->line("common_policy");?></a> <?php echo $this->lang->line("plans_rules_2");?> <a href="<?php base_url();?>/terminos"><?php echo $this->lang->line("common_terms");?></a>.</strong></span></p>
</div>

<div id="info_segura">
    

    <h2>» <?php echo $this->lang->line("plans_secure_info_header");?></h2>
    <p><?php echo $this->lang->line("plans_secure_info_text");?></p>
</div>