<?php
/**
 * @Component - Preachit
 * @author Paul Kosciecha http://www.truthengaged.org.uk
 * @copyright Copyright (C) Paul Kosciecha
 * @license GNU/GPL
 */
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
$header = $this->params->get('headerseriessermons', '1');
$headertext = JText::_('COM_PREACHIT_HEADER_SERIES');
?>

<input id="series" value="<?php echo $this->filter_series;?>" type="hidden"/>
<input id="layout" value="<?php echo $this->listview;?>" type="hidden"/>

<!-- head -->

<div class="head">

	<!-- series info -->
    <h1 class="seriesname testpreach2"><?php echo strip_tags($this->series->name); ?></h1>
	<?php PIHelperadditional::showmediaplayer($this->series->video);?>
    <?php echo $this->series->imagelrg;?>
    <div class="details-cont testpreach">
        <!--<div class="seriesdate"> php echo $this->series->daterange; ?></div>-->
	    <div class="seriesdescription"><?php echo $this->series->description; ?></div>
	    <?php if ($this->series->editlink) {?>
		    <div class="pieditlink"><?php echo $this->series->editlink;?></div>
	    <?php }?>
	    <?php if ($this->series->download) {?>
        	<div class="piseriesdown"><?php echo $this->series->download;?></div>
        <?php }?>	
    </div>
    <div class="clr"></div>

<!-- end head -->

</div>

<!-- title for message list -->

<div class="headblock">
<h2 class="seriessermons"><?php echo $headertext;?></h2>
</div>