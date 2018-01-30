<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_contact
 *
 * @copyright   Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

/**
 * marker_class: Class based on the selection of text, none, or #__
 * jicon-text, jicon-none, jicon-icon
 */
 
 
$app = JFactory::getApplication('site');
$template = $app->getTemplate(true);
include_once(JPATH_BASE.'/templates/'. $template->template .'/includes/functions.php');
?>


<div class="contact_details span4">
	<?php if (($this->params->get('address_check') > 0) && ($this->contact->address || $this->contact->suburb  || $this->contact->state || $this->contact->country || $this->contact->postcode)) : ?>
		<?php echo wrap_with_tag(JText::_('TPL_CONTACT_ADDRESS'),$template->params->get('categoryItemHeading'));
		if ($this->params->get('address_check') > 0) : ?>
		<?php endif; ?>
		<div class="contact_address">
		<i class="icons-marker fa fa-home"></i>
			<?php if ($this->contact->address && $this->params->get('show_street_address')) :
			echo $this->contact->address; ?>
			<?php endif;
			if ($this->contact->suburb && $this->params->get('show_suburb')) :
			echo $this->contact->suburb; ?>
			<?php endif;
			if ($this->contact->state && $this->params->get('show_state')) :
			echo $this->contact->state; ?>
			<?php endif;
			if ($this->contact->postcode && $this->params->get('show_postcode')) :
			echo $this->contact->postcode; ?>
			<?php endif;
			if ($this->contact->country && $this->params->get('show_country')) :
			echo $this->contact->country;
			endif; ?>
		</div>
	<?php endif; ?>
		<?php echo wrap_with_tag(JText::_('TPL_CONTACT_PHONES'),$template->params->get('categoryItemHeading'));
		if ($this->contact->telephone && $this->params->get('show_telephone')) : ?>
		<div class="contact_details_telephone">
		<i class="icons-marker fa fa-phone"></i>
			<?php echo nl2br($this->contact->telephone); ?>
		</div>			
		<div class="clearfix"></div>
		<?php endif;
		if ($this->contact->fax && $this->params->get('show_fax')) : ?>
		<div class="contact_details_fax">
		<i class="icons-marker fa fa-fax"></i>
			<?php echo nl2br($this->contact->fax); ?>
		</div>
		<div class="clearfix"></div>
		<?php endif;
		if ($this->contact->mobile && $this->params->get('show_mobile')) :?>
		<div class="contact_details_mobile">
		<i class="icons-marker fa fa-mobile"></i>
			<?php echo nl2br($this->contact->mobile); ?>
		</div>
		<div class="clearfix"></div>
		<?php endif;
		if ($this->contact->webpage && $this->params->get('show_webpage')) : ?>
		<i class="icons-marker fa fa-list-alt"></i>
		<div class="contact_details_webpage">
			<a href="<?php echo $this->contact->webpage; ?>" target="_blank"><?php echo $this->contact->webpage; ?></a>
		</div>
		<div class="clearfix"></div>
		<?php endif; ?>
		<?php echo wrap_with_tag(JText::_('TPL_CONTACT_MAILTO'),$template->params->get('categoryItemHeading'));
		if ($this->contact->email_to && $this->params->get('show_email')) : ?>
		<div class="contact_details_emailto">	
		<i class="icons-marker fa fa-envelope"></i>			
			<?php echo $this->contact->email_to; ?>
		</div>
		<div class="clearfix"></div>
		<?php endif;
		if ($this->params->get('allow_vcard')) : ?>
    <div class="contact_vcard">
    	<?php echo JText::_('COM_CONTACT_DOWNLOAD_INFORMATION_AS');?>
      	<a href="<?php echo JRoute::_('index.php?option=com_contact&amp;view=contact&amp;id='.$this->contact->id . '&amp;format=vcf'); ?>"><?php echo JText::_('COM_CONTACT_VCARD');?></a>
    </div>
     <div class="clearfix"></div>
	 <?php endif; ?>
</div>