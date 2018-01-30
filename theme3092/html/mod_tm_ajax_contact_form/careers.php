<?php
/**
 * @package Module TM Ajax Contact Form for Joomla! 3.x
 * @version 1.0.0: mod_tm_ajax_contact_form.php
 * @author TemplateMonster http://www.templatemonster.com
 * @copyright Copyright (C) 2012 - 2014 Jetimpex, Inc.
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 
**/

defined('_JEXEC') or die;

$db_temp = JFactory::getDBO();
$db =&$db_temp;
$query = "SELECT * FROM #__content where catid=46 AND state=1 ORDER BY id ASC";
$db->setQuery($query);
$positions = $db->loadObjectList();

$labels_pos = $params->get('labels_pos');

?>
<section id="contact">
	<script>
	<?php if( $params->get('captcha_req')==1 ) { ?>
		var RecaptchaOptions = {
			theme : "<?php echo $params->get('captcha_theme');?>"
		};
	<?php } ?>
		jQuery(function($){
		 	var success = "<?php echo $params->get('success_notify'); ?>",
			error = "<?php echo $params->get('failure_notify'); ?>",
			recaptcha_error = "<?php echo $params->get('recaptcha_failure_notify'); ?>",
			id = "<?php echo $module->id; ?>",
		 	validator = $('#contact-form_<?php echo $module->id; ?>').validate({
		 		wrapper: "mark",
				rules: {
					phone: {
						number: true
					}<?php if( $params->get('captcha_req')==1 ) { ?>,
					recaptcha_response_field : {
						required : true
					}
					<?php } ?>
				},
				submitHandler: function(form) {
					$("#message_<?php echo $module->id; ?>")
					.removeClass("success")
					.removeClass("error")
					.addClass("loader")
					.html("Sending message")
					.fadeIn("slow");
					<?php if( $params->get('captcha_req')==1 ) { ?>
					$(form).ajaxcaptcha(validator, success, error, recaptcha_error, id);
					<?php }
					else { ?>
					$(form).ajaxsendmail(validator, success, id);
					<?php } ?>
					return false;
				}
			});
			<?php if($labels_pos) { ?>
	        $.support.placeholder = ('placeholder' in document.createElement('input'));
	        <?php } ?>
	        $('#clear_<?php echo $module->id; ?>').click(function(){
	            $('#contact-form_<?php echo $module->id; ?>').trigger('reset');
	            validator.resetForm();
	            <?php if($labels_pos) { ?>
	            if (!$.support.placeholder) {
		            $('.mod_tm_ajax_contact_form *[placeholder]').each(function(n){
		        		$(this)
		        		.parent('.controls')
                        .find('>.mod_tm_ajax_contact_form_placeholder')
                        .show();
			        })
		        }
		        <?php } ?>
            	<?php if( $params->get('captcha_req')==1 ) { ?>
                Recaptcha.reload();
                <?php } ?>
	            return false;
	        })
	        <?php if($labels_pos) { ?>
	        if (!$.support.placeholder) {
	        	$('.mod_tm_ajax_contact_form *[placeholder]').each(function(n){
	        		$(this)
	        		.attr('autocomplete','off')
	        		.addClass('ie_placeholder')
	        		.bind('keydown keyup click blur focus change paste cut', function(e){
	        			$(this).delay(10)
	                    .queue(function(n){
	                        if($(this).val() != ''){
		        				$(this)
				        		.parent('.controls')
				        		.find('>.mod_tm_ajax_contact_form_placeholder')
				        		.hide();
		        			}
		        			else{
		        				$(this)
				        		.parent('.controls')
				        		.find('>.mod_tm_ajax_contact_form_placeholder')
				        		.show();
		        			}
	                        n();
	                    });
	        		})
	        		.before('<label class="mod_tm_ajax_contact_form_placeholder"/>')
	        		.parent('.controls')
	        		.addClass('ie_placeholder_controls')
	        		.find('>.mod_tm_ajax_contact_form_placeholder')
	        		.attr('for',$(this).parent('.controls').find('>*[placeholder]').attr('id'))
	        		.text($(this).parent('.controls').find('>*[placeholder]').attr('placeholder'))
	        		.css({
	        			paddingTop: $(this).parent('.controls').find('>*[placeholder]').css('paddingTop'),
	        			paddingBottom: $(this).parent('.controls').find('>*[placeholder]').css('paddingBottom'),
	        			paddingLeft: $(this).parent('.controls').find('>*[placeholder]').css('paddingLeft'),
	        			paddingRight: $(this).parent('.controls').find('>*[placeholder]').css('paddingRight'),
	        			borderTopWidth: $(this).parent('.controls').find('>*[placeholder]').css('borderTopWidth'),
	        			borderBottomWidth: $(this).parent('.controls').find('>*[placeholder]').css('borderBottomWidth'),
	        			borderLeftWidth: $(this).parent('.controls').find('>*[placeholder]').css('borderLeftWidth'),
	        			borderRightWidth: $(this).parent('.controls').find('>*[placeholder]').css('borderRightWidth'),
	        			fontSize: $(this).parent('.controls').find('>*[placeholder]').css('fontSize'),
	        			color: $(this).parent('.controls').find('>*[placeholder]').css('color')
	        		})
	        	})
	        }
	        <?php } ?>
		})
	</script>
	<div class="pretext">
		<?php echo $params->get('pretext'); ?>
	</div>
	<form class="mod_tm_ajax_contact_form" id="contact-form_<?php echo $module->id; ?>" novalidate>
    <div class="mod_tm_ajax_contact_form_message" id="message_<?php echo $module->id; ?>">
	</div>
	  <fieldset class="row-fluid">
		  <!-- Name Field -->
		  <div class="control-group control-group-input <?php echo $params->get('errors_position');?> span6">
			<?php if(!$labels_pos) { ?>
			<label for="inputName_<?php echo $module->id; ?>"><?php echo $params->get('name_name'); ?></label>
			<?php } ?>
			<div class="controls">
			  <input name="name" type="text" class="mod_tm_ajax_contact_form_input" id="inputName_<?php echo $module->id; ?>"<?php if($labels_pos) { ?> placeholder="<?php echo $params->get('name_name'); ?>"<?php } ?> required>
			</div>
		  </div>
		  <!-- Last Name Field -->
		  <div class="control-group control-group-input <?php echo $params->get('errors_position');?> span6">
			<?php if(!$labels_pos) { ?>
			<label for="inputLastName_<?php echo $module->id; ?>">Last name</label>
			<?php } ?>
			<div class="controls">
			  <input name="lastname" type="text" class="mod_tm_ajax_contact_form_input" id="inputLastName_<?php echo $module->id; ?>"<?php if($labels_pos) { ?> placeholder="Last name"<?php } ?> required>
			</div>
		  </div>
		  <?php 
				if($params->get('phone_req'))
				{
		  ?>
		  <!-- Phone Field -->
		  <div class="control-group control-group-input <?php echo $params->get('errors_position');?> span6">
			<?php if(!$labels_pos) { ?>
			<label for="inputEmail_<?php echo $module->id; ?>"><?php echo $params->get('phone_name'); ?></label>
			<?php } ?>
			<div class="controls">
			  <input name="phone" type="text" class="mod_tm_ajax_contact_form_input" id="inputPhone_<?php echo $module->id; ?>"<?php if($labels_pos) { ?> placeholder="<?php echo $params->get('phone_name'); ?>"<?php } if($params->get('phone_req')=='required') echo ' required'; ?>>
			</div>
		  </div>
		  <?php
				}
				if($params->get('email_req')) {
			?>
		  <!-- E-mail Field -->
		  <div class="control-group control-group-input <?php echo $params->get('errors_position');?> span12">
			<?php if(!$labels_pos) { ?>
			<label for="inputEmail_<?php echo $module->id; ?>"><?php echo $params->get('email_name'); ?></label>
			<?php } ?>
			<div class="controls">
			  <input name="email" type="email" class="mod_tm_ajax_contact_form_input" id="inputEmail_<?php echo $module->id; ?>"<?php if($labels_pos) { ?> placeholder="<?php echo $params->get('email_name'); ?>"<?php } if($params->get('email_req')=='required') echo ' required'; ?>>
			</div>
		  </div>
		  <?php } ?>
		  <!-- Age Field -->
		  <div class="control-group control-group-input <?php echo $params->get('errors_position');?> span6">
			<?php if(!$labels_pos) { ?>
			<label for="inputAge_<?php echo $module->id; ?>">Age</label>
			<?php } ?>
			<div class="controls">
			  <input name="age" type="number" class="mod_tm_ajax_contact_form_input" id="inputAge_<?php echo $module->id; ?>"<?php if($labels_pos) { ?> placeholder="Age"<?php } ?> required>
			</div>
		  </div>
		  <!-- City Field -->
		  <div class="control-group control-group-input <?php echo $params->get('errors_position');?> span6">
			<?php if(!$labels_pos) { ?>
			<label for="inputCity_<?php echo $module->id; ?>">City</label>
			<?php } ?>
			<div class="controls">
			  <input name="city" type="text" class="mod_tm_ajax_contact_form_input" id="inputCity_<?php echo $module->id; ?>"<?php if($labels_pos) { ?> placeholder="City"<?php } ?> required>
			</div>
		  </div>
		  <!-- Position Field -->
		  <div class="control-group control-group-input <?php echo $params->get('errors_position');?> span12">
			<?php if(!$labels_pos) { ?>
			<label for="inputCity_<?php echo $module->id; ?>">Position</label>
			<?php } ?>
			<div class="controls">
			<?php if ($positions && count ($positions)) { ?>
				<select name="position" class="mod_tm_ajax_contact_form_select" id="selectPosition_<?php echo $module->id; ?>" required>
				  <?php if($labels_pos) { ?><option disabled selected value="">Position</option><?php } ?>
				  <?php foreach ($positions as $position){ ?>
				  <option value="<?php echo $position->title; ?>"><?php echo $position->title; ?></option>
				  <?php } ?>
				</select>
			<?php } ?>
			</div>
		  </div>
		  <!-- Salary Field -->
		  <div class="control-group control-group-input <?php echo $params->get('errors_position');?> span6">
			<?php if(!$labels_pos) { ?>
			<label for="inputSalary_<?php echo $module->id; ?>">Expected salary</label>
			<?php } ?>
			<div class="controls">
			  <input name="salary" type="number" class="mod_tm_ajax_contact_form_input" id="inputSalary_<?php echo $module->id; ?>"<?php if($labels_pos) { ?> placeholder="Expected salary"<?php } ?>>
			</div>
		  </div>
		  <!-- Date Field -->
		  <div class="control-group control-group-input <?php echo $params->get('errors_position');?> span6">
			<?php if(!$labels_pos) { ?>
			<label for="inputDate_<?php echo $module->id; ?>">Start date</label>
			<?php } ?>
			<div class="controls">
			  <input name="date" type="date" class="mod_tm_ajax_contact_form_input" id="inputDate_<?php echo $module->id; ?>"<?php if($labels_pos) { ?> placeholder="Start date"<?php } ?>>
			</div>
		  </div>
		  <?php if($params->get('website_req'))
				{
		  ?>		  
		  <!-- Website Field -->
		  <div class="control-group control-group-input <?php echo $params->get('errors_position');?> span12">
			<?php if(!$labels_pos) { ?>
			<label for="inputWebsite_<?php echo $module->id; ?>"><?php echo $params->get('website_name'); ?></label>
			<?php } ?>
			<div class="controls">
			  <input name="website" type="text" class="mod_tm_ajax_contact_form_input" id="inputWebsite_<?php echo $module->id; ?>"<?php if($labels_pos) { ?> placeholder="<?php echo $params->get('website_name'); ?>"<?php } if($params->get('website_req')=='required') echo ' required'; ?>>
			</div>
		  </div>
		  <?php
				}
				if($params->get('subject_req'))
				{
		  ?>		 
		  <!-- Subject Field -->
		  <div class="control-group control-group-input <?php echo $params->get('errors_position');?> span12">
			<?php if(!$labels_pos) { ?>
			<label for="selectSubject_<?php echo $module->id; ?>"><?php echo $params->get('subject_name'); ?></label>
			<?php } ?>
			<div class="controls">
				<?php if( $params->get('subject_type') == 1){ ?>
				<select name="type" class="mod_tm_ajax_contact_form_select" id="selectSubject_<?php echo $module->id; ?>"<?php if($params->get('phone_req')=='required') echo ' required'; ?>>
				  <?php if($labels_pos) { ?><option disabled selected value=""><?php echo $params->get('subject_name'); ?></option><?php } ?>
				  <option value="question"><?php echo JText::_('MOD_TM_AJAX_CONTACT_FORM_QUESTION'); ?></option>
				  <option value="support"><?php echo JText::_('MOD_TM_AJAX_CONTACT_FORM_COMMENTS'); ?></option>
				  <option value="misc"><?php echo JText::_('MOD_TM_AJAX_CONTACT_FORM_OTHER'); ?></option>
				</select>
				<?php
					}
					else
					{
				?>
						<input name="type" type="text" class="mod_tm_ajax_contact_form_input" id="selectSubject_<?php echo $module->id; ?>"<?php if($labels_pos) { ?> placeholder="<?php echo $params->get('subject_name'); ?>"<?php } if($params->get('phone_req')=='required') echo ' required'; ?>>
				<?php
					}
				?>
			</div>
		  </div>
		  <?php
				}
		  ?>
		 
		 <!-- Experience Field -->
		  <div class="control-group control-group-experience <?php echo $params->get('errors_position');?> span12">
		  	<?php if(!$labels_pos) { ?>
			<label for="inputExperience_<?php echo $module->id; ?>">Experience</label>
			<?php } ?>
			<div class="controls">
			  <textarea name="experience" class="mod_tm_ajax_contact_form_textarea" id="inputExperience_<?php echo $module->id; ?>"<?php if($labels_pos) { ?> placeholder="Experience"<?php } ?>></textarea>
			</div>
		  </div>
		 
		 <!-- Application Field -->
		  <div class="control-group control-group-application <?php echo $params->get('errors_position');?> span12">
		  	<?php if(!$labels_pos) { ?>
			<label for="inputApplication_<?php echo $module->id; ?>">Application</label>
			<?php } ?>
			<div class="controls">
			  <textarea name="application" class="mod_tm_ajax_contact_form_textarea" id="inputApplication_<?php echo $module->id; ?>"<?php if($labels_pos) { ?> placeholder="Application"<?php } ?> minlength="<?php echo $params->get('msg_minlength'); ?>" required></textarea>
			</div>
		  </div>
		  <?php
				if( $params->get('captcha_req')==1 )
				{
		  ?>
		 
		 <!-- Captcha Field -->
		  <div class="control-group control-group-recaptcha <?php echo $params->get('errors_position');?> span12">
			<div class="controls" id="recaptcha_<?php echo $module->id; ?>">
				<?php
				  $publickey = $params->get('public_key');
				  echo recaptcha_get_html($publickey);
				?>
				<div class="mod_tm_ajax_contact_form_recaptcha_message" id="recaptcha_message_<?php echo $module->id; ?>">
			</div>
		  </div> 
		  <?php
				}				
				if($params->get('admin_email'))
				{
		  ?>
		 
		 <!-- Submit Button -->
		  <div class="control-group control-group-button span12">
			<div class="controls">
			  <button type="submit" name="button" value="Send" class="btn btn-primary mod_tm_ajax_contact_form_btn"><?php echo $params->get('bs_name');?></button>
			<?php			
				if($params->get('reset_publish'))
				{
		  	?>
			  <button type="reset" name="button" id="clear_<?php echo $module->id; ?>" value="Clear" class="btn btn-primary mod_tm_ajax_contact_form_btn clear"><?php echo $params->get('br_name');?></button>
			<?php
				}
		  	?>  
			</div>
		  </div>
		  <?php
				}
				else
				{
		  ?>
			<p><?php echo JText::_('MOD_TM_AJAX_CONTACT_FORM_ENTER_ADMIN_EMAIL'); ?></p>
		  <?php
				}
		  ?>
		</fieldset>
	</form>
</section>