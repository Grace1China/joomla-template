<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_articles_category
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
JLoader::register('FieldsHelper', JPATH_ADMINISTRATOR . '/components/com_fields/helpers/fields.php');

$doc = JFactory::getDocument();
$js = <<<JS
(function ($) {
    $(document).on('change', '#language-select,#Church-select,#locations-select,#time-select', function() {
        var tagids = '-10';
            $('.custom-select').each(function(e){
            	if($(this).find("option:selected").attr('data-tagid')){
            		tagids = tagids+','+$(this).find("option:selected").attr('data-tagid');
            	}
            });
            request = {
                'option' : 'com_ajax',
                'module' : 'schedullist',
                'format' : 'json',
                'tagids' : tagids,
                'catid' : $('ul.category-module').data('catid'),
            };

        $.ajax({
            type      : 'POST',
            data      : request,
            success   : function (response) {

            	$('ul.category-module').empty();
            	$('ul.category-module').append(
            	"<hr class='uk-grid-divider'><div class='row'><div class='col-sm'>language</div><div class='col-sm'>church</div><div class='col-sm'>campus</div><div class='col-sm'>venue</div><div class='col-sm'>day</div><div class='col-sm'>time</div><div class='col-sm'>contact</div></div>");
                var newlist = '';
                if(response.data) {
                    


$('ul.category-module').append(  response.data);

                       
                   

                }
            },
            error     : function (response) {
                console.log(response);
            }
        });
    });
})(jQuery)
JS;

	


$doc->addScriptDeclaration($js);


$db = JFactory::getDbo();
$query = $db->getQuery(true);
$query->select('*');
$query->from('bicf_tags');//todo: add where just get the select father. so need edit the tag field
//echo $query;
$db->setQuery($query);
$tags = $db->loadObjectList();

$map = null;
$mapid = null;


foreach ($tags as $key => $value) {

	if(!isset($mapid)){
		$mapid = array($value->id => $value);
	}else{
		$mapid[$value->id]=$value;
	}
	if(!isset($map)){
		$map = array($value->parent_id => array($value));//father to child object
	}
	else{
		if($map[$value->parent_id]){
			array_push($map[$value->parent_id],$value);//father is there, child go to father
		} else {
			$map[$value->parent_id] = array($value);//father is no there let father get the first child

		}
	}
}


 	$tpl='<div><label for="validationServer01">{parent}</label><select id="{parent}-select" class="custom-select"><option selected>Select {parent}...</option>';

	# code...1->{church 17} {language 19}
	#17->{aom 23} english
	
	$p_arr = $map[1];
	//var_dump($p_arr);
	//var_dump($map);
	foreach ($p_arr as $key => $value) {
		//var_dump('--path:'.$value->id);
		

		$tpl1 = str_ireplace("{parent}",$mapid[$value->id]->title,$tpl);
		
		
		$arr_child=$map[$value->id];


		foreach ($arr_child as $key => $value) {
			# code...
			$tpl1 = $tpl1.' <option data-tagid="'.$value->id.'" >'.$value->title.'</option>';
		}
		
		$tpl1 = $tpl1."</select></div>";
		echo $tpl1;
	}
	


?>

<ul class=" container category-module<?php echo $moduleclass_sfx; ?>" data-catid="<?php echo $params->get('catid')[0]; ?>">
	
			<hr class="uk-grid-divider">
			<div class="row">
					<div class="col-sm">language</div>
					<div class="col-sm">church</div>
					<div class="col-sm">campus</div>
					<div class="col-sm">venue</div>
					<div class="col-sm">day</div>
					<div class="col-sm">time</div>
					<div class="col-sm">contact</div>
			</div>
    		<hr class="uk-grid-divider">

		<?php foreach ($list as $item) : ?>
			<div class="row">
				<?php 
				$fields = $item->jcfields ?: FieldsHelper::getFields("com_content.article", $item, true); ?>
			
				<?php foreach ($fields as $field) : ?>
					
					<?php if (!isset($field->value) || $field->value == '') : ?>
						<?php continue; ?>
					<?php endif; ?>
					<div class="col-sm"><?php echo $field->value; ?></div>
				<?php endforeach; ?>
			</div>
			<hr class="uk-grid-divider">
		<?php endforeach; ?>

</ul>
