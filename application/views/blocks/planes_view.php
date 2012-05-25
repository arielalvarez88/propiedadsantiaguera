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

    <div id="planes_detail">
        Cada publicacion Incluye<br />
        <ul>
            
            
            
        </ul>
        
    </div>

    <table id="planes_data">
        <thead>

        </thead>
        <tbody>
            
        </tbody>
        <tfoot>
            <tr>
                <td colspan="4">&nbsp;</td>
            </tr>
        </tfoot>

    </table>
    

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