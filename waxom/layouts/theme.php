<?php
/**
 * Torbara Waxom Template for Joomla, exclusively on Envato Market: http://themeforest.net/user/torbara?ref=torbara
 * @encoding     UTF-8
 * @version      1.0
 * @copyright    Copyright (C) 2015 Torbara (http://torbara.com). All rights reserved.
 * @license      GNU General Public License version 2 or later, see http://www.gnu.org/licenses/gpl-2.0.html
 * @author       Vadim Kozhukhov (support@torbara.com)
 */

// get theme configuration
include($this['path']->path('layouts:theme.config.php'));
JHtml::_('behavior.framework');

?>
<!DOCTYPE HTML>
<html lang="<?php echo $this['config']->get('language'); ?>" dir="<?php echo $this['config']->get('direction'); ?>"  data-config='<?php echo $this['config']->get('body_config','{}'); ?>'>

<head>
<?php echo $this['template']->render('head'); ?>
</head>

<body class="<?php echo $this['config']->get('body_classes'); ?>">
    <div class="wrap-overlord">
		<?php if ($this['widgets']->count('toolbar-l + toolbar-r')) : ?>
                    <div class="toolbar-wrap">
                        <div class="uk-container uk-container-center">
                            <div class="tm-toolbar uk-clearfix uk-hidden-small">

                                    <?php if ($this['widgets']->count('toolbar-l')) : ?>
                                    <div class="uk-float-left"><?php echo $this['widgets']->render('toolbar-l'); ?></div>
                                    <?php endif; ?>

                                    <?php if ($this['widgets']->count('toolbar-r')) : ?>
                                    <div class="uk-float-right"><?php echo $this['widgets']->render('toolbar-r'); ?></div>
                                    <?php endif; ?>

                            </div>
                        </div>
                    </div>    
		<?php endif; ?>

		
                    <div class="tm-menu-box"  >
                        
                            <nav class="tm-navbar uk-navbar">
                                <div class="tt-nav-wrap" <?php if ($this['config']->get('sticky_menu')=="1"){ echo "data-uk-sticky='{showup:true,animation: \"uk-animation-slide-top\"}'";} ?>>
                                    <div class="uk-grid">
                                        <div class="uk-width-1-1"> 
                                            <div class="uk-container uk-container-center uk-position-relative top-wrap">
                                                    <?php if ($this['widgets']->count('logo')) : ?>
                                                        <a class="tm-logo uk-float-left" href="<?php echo $this['config']->get('site_url'); ?>"><?php echo $this['widgets']->render('logo'); ?></a>
                                                    <?php endif; ?>
                                                        
                                                     <?php if ($this['widgets']->count('search')) : ?>
                                                        <div class="search-wrap">
                                                            <i class="uk-icon-search"></i>
                                                            <i class="uk-icon-remove"></i>
                                                            <div class="uk-navbar-content search-inner uk-hidden-small"><?php echo $this['widgets']->render('search'); ?></div>
                                                        </div>
                                                    <?php endif; ?>

                                                    <?php if ($this['widgets']->count('menu')) : ?>
                                                    <div id="main-menu" class="main-menu-wrap uk-float-right">

                                                        <?php echo $this['widgets']->render('menu'); ?>

                                                    </div>

                                                    <?php endif; ?>

                                                <?php if ($this['widgets']->count('offcanvas')) : ?>
                                                <a href="#offcanvas" class="uk-navbar-toggle uk-visible-small" data-uk-offcanvas></a>
                                                <?php endif; ?>

                                               

                                                <?php if ($this['widgets']->count('logo-small')) : ?>
                                                <div class="uk-navbar-content uk-navbar-center uk-visible-small"><a class="tm-logo-small" href="<?php echo $this['config']->get('site_url'); ?>"><?php echo $this['widgets']->render('logo-small'); ?></a></div>
                                                <?php endif; ?>
                                            </div>
                                        </div>       
                                  </div>
                              </div>  
                            </nav>
                        
                    </div>
		

		<?php if ($this['widgets']->count('top-a')) : ?>
                    <div id="tm-top-a-wrap" class="tm-top-a-box <?php echo $box_classes['top-a']; ?>">
                        <div class="uk-container uk-container-center">
                            <section id="tm-top-a" class="<?php echo $grid_classes['top-a']; echo $display_classes['top-a']; ?>" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin>
                                <?php echo $this['widgets']->render('top-a', array('layout'=>$this['config']->get('grid.top-a.layout'))); ?>
                            </section>
                        </div>
                    </div>
		<?php endif; ?>
    
            
		<?php if ($this['widgets']->count('top-b')) : ?>
                <div id="tm-top-b-wrap" class="tm-top-b-box <?php echo $box_classes['top-b']; ?>">
                    <div class="uk-container uk-container-center">
                        <section id="tm-top-b" class="<?php echo $grid_classes['top-b']; echo $display_classes['top-b']; ?>" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin>
                            <?php echo $this['widgets']->render('top-b', array('layout'=>$this['config']->get('grid.top-b.layout'))); ?>
                        </section>
                    </div>
                </div>
                <?php endif; ?>
    
    
                <?php if ($this['widgets']->count('top-c')) : ?>
                <div id="tm-top-c-wrap" class="tm-top-c-box <?php echo $box_classes['top-c']; ?>">
                    <div class="uk-container uk-container-center">
                        <section id="tm-top-c" class="<?php echo $grid_classes['top-c']; echo $display_classes['top-c']; ?>" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin>
                            <?php echo $this['widgets']->render('top-c', array('layout'=>$this['config']->get('grid.top-c.layout'))); ?>
                        </section>
                    </div>
                </div>
                <?php endif; ?>
    
    
                <?php if ($this['widgets']->count('top-d')) : ?>
                <div id="tm-top-d-wrap" class="tm-top-d-box <?php echo $box_classes['top-d']; ?>">
                    <div class="uk-container uk-container-center">
                        <section id="tm-top-d" class="<?php echo $grid_classes['top-d']; echo $display_classes['top-d']; ?>" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin>
                            <?php echo $this['widgets']->render('top-d', array('layout'=>$this['config']->get('grid.top-d.layout'))); ?>
                        </section>
                    </div>
                </div>
                <?php endif; ?>
    
    
                <?php if ($this['widgets']->count('top-e')) : ?>
                <div id="tm-top-e-wrap" class="tm-top-e-box <?php echo $box_classes['top-e']; ?>">
                    <div class="uk-container uk-container-center">
                        <section id="tm-top-e" class="<?php echo $grid_classes['top-e']; echo $display_classes['top-e']; ?>" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin>
                            <?php echo $this['widgets']->render('top-e', array('layout'=>$this['config']->get('grid.top-e.layout'))); ?>
                        </section>
                    </div>
                </div>
                <?php endif; ?>
    
                <?php if ($this['widgets']->count('top-f')) : ?>
                <div id="tm-top-f-wrap" class="tm-top-f-box <?php echo $box_classes['top-f']; ?>">
                    <div class="uk-container uk-container-center">
                        <section id="tm-top-f" class="<?php echo $grid_classes['top-f']; echo $display_classes['top-f']; ?>" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin>
                            <?php echo $this['widgets']->render('top-f', array('layout'=>$this['config']->get('grid.top-f.layout'))); ?>
                        </section>
                    </div>
                </div>
                <?php endif; ?>
    
                <?php if ($this['widgets']->count('top-g')) : ?>
                <div id="tm-top-g-wrap" class="tm-top-g-box <?php echo $box_classes['top-g']; ?>">
                    <div class="uk-container uk-container-center">
                        <section id="tm-top-g" class="<?php echo $grid_classes['top-g']; echo $display_classes['top-g']; ?>" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin>
                            <?php echo $this['widgets']->render('top-g', array('layout'=>$this['config']->get('grid.top-g.layout'))); ?>
                        </section>
                    </div>
                </div>
                <?php endif; ?>
    
            <?php if ($this['widgets']->count('breadcrumbs')) : ?>
                <div class="breadcrumbs-wrap">
                    <div class="uk-container uk-container-center">
                        <?php echo $this['widgets']->render('breadcrumbs'); ?>
                    </div>
                </div>
            <?php endif; ?>
            
            
            <?php if ($this['widgets']->count('main-top + main-bottom + sidebar-a + sidebar-b') || $this['config']->get('system_output', true)) : ?>
                
                <div class="uk-container uk-container-center<?php if ($this['config']->get('content_width')=="0"){ echo " tm-content-full-width";} ?>">
                    <div id="tm-middle" class="tm-middle uk-grid" data-uk-grid-match="" data-uk-grid-margin="">

                            <?php if ($this['widgets']->count('main-top + main-bottom') || $this['config']->get('system_output', true)) : ?>
                            <div class="<?php echo $columns['main']['class'] ?>">

                                    <?php if ($this['widgets']->count('main-top')) : ?>
                                    <section id="tm-main-top" class="<?php echo $grid_classes['main-top']; echo $display_classes['main-top']; ?>" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin><?php echo $this['widgets']->render('main-top', array('layout'=>$this['config']->get('grid.main-top.layout'))); ?></section>
                                    <?php endif; ?>

                                    <?php if ($this['config']->get('system_output', true)) : ?>
                                    <main id="tm-content" class="tm-content">

                                            <?php echo $this['template']->render('content'); ?>

                                    </main>
                                    <?php endif; ?>

                                    <?php if ($this['widgets']->count('main-bottom')) : ?>
                                    <section id="tm-main-bottom" class="<?php echo $grid_classes['main-bottom']; echo $display_classes['main-bottom']; ?>" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin><?php echo $this['widgets']->render('main-bottom', array('layout'=>$this['config']->get('grid.main-bottom.layout'))); ?></section>
                                    <?php endif; ?>

                            </div>
                            <?php endif; ?>

                            <?php foreach($columns as $name => &$column) : ?>
                            <?php if ($name != 'main' && $this['widgets']->count($name)) : ?>
                            <aside class="<?php echo $column['class'] ?>"><?php echo $this['widgets']->render($name) ?></aside>
                            <?php endif ?>
                            <?php endforeach ?>

                    </div>
                </div>
            <?php endif; ?>
                
                <?php if ($this['widgets']->count('bottom-a')) : ?>
                <div id="tm-bottom-a-wrap" class="tm-bottom-a-box <?php echo $box_classes['bottom-a']; ?>">
                    <div class="uk-container uk-container-center">
                        <section id="tm-bottom-a" class="<?php echo $grid_classes['bottom-a']; echo $display_classes['bottom-a']; ?>" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin>
                            <?php echo $this['widgets']->render('bottom-a', array('layout'=>$this['config']->get('grid.bottom-a.layout'))); ?>
                        </section>
                    </div>
                </div>
                <?php endif; ?>

		<?php if ($this['widgets']->count('bottom-b')) : ?>
                <div id="tm-bottom-b-wrap" class="tm-bottom-b-box <?php echo $box_classes['bottom-b']; ?>">
                    <div class="uk-container uk-container-center">
                        <section id="tm-bottom-b" class="<?php echo $grid_classes['bottom-b']; echo $display_classes['bottom-b']; ?>" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin>
                            <?php echo $this['widgets']->render('bottom-b', array('layout'=>$this['config']->get('grid.bottom-b.layout'))); ?>
                        </section>
                    </div>
                </div>
                <?php endif; ?>
    
                <?php if ($this['widgets']->count('bottom-c')) : ?>
                <div id="tm-bottom-c-wrap" class="tm-bottom-c-box <?php echo $box_classes['bottom-c']; ?>">
                    <div class="uk-container uk-container-center">
                        <section id="tm-bottom-c" class="<?php echo $grid_classes['bottom-c']; echo $display_classes['bottom-c']; ?>" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin>
                            <?php echo $this['widgets']->render('bottom-c', array('layout'=>$this['config']->get('grid.bottom-c.layout'))); ?>
                        </section>
                    </div>
                </div>
                <?php endif; ?>
    
                <?php if ($this['widgets']->count('bottom-d')) : ?>
                <div id="tm-bottom-d-wrap" class="tm-bottom-d-box <?php echo $box_classes['bottom-d']; ?>">
                    <div class="uk-container uk-container-center">
                        <section id="tm-bottom-d" class="<?php echo $grid_classes['bottom-d']; echo $display_classes['bottom-d']; ?>" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin>
                            <?php echo $this['widgets']->render('bottom-d', array('layout'=>$this['config']->get('grid.bottom-d.layout'))); ?>
                        </section>
                    </div>
                </div>
                <?php endif; ?>
    
                <?php if ($this['widgets']->count('bottom-e')) : ?>
                <div id="tm-bottom-e-wrap" class="tm-bottom-e-box <?php echo $box_classes['bottom-e']; ?>">
                    <div class="uk-container uk-container-center">
                        <section id="tm-bottom-e" class="<?php echo $grid_classes['bottom-e']; echo $display_classes['bottom-e']; ?>" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin>
                            <?php echo $this['widgets']->render('bottom-e', array('layout'=>$this['config']->get('grid.bottom-e.layout'))); ?>
                        </section>
                    </div>
                </div>
                <?php endif; ?>
    
        
                <?php if ($this['widgets']->count('bottom-f')) : ?>
                <div id="tm-bottom-f-wrap" class="tm-bottom-f-box <?php echo $box_classes['bottom-f']; ?>">
                    <div class="uk-container uk-container-center">
                        <section id="tm-bottom-f" class="<?php echo $grid_classes['bottom-f']; echo $display_classes['bottom-f']; ?>" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin>
                            <?php echo $this['widgets']->render('bottom-f', array('layout'=>$this['config']->get('grid.bottom-f.layout'))); ?>
                        </section>
                    </div>
                </div>
                <?php endif; ?>
            <div class="bottom-wrapper">
                <?php if ($this['widgets']->count('bottom-g')) : ?>
                <div id="tm-bottom-g-wrap" class="tm-bottom-g-box <?php echo $box_classes['bottom-g']; ?>">
                    <div class="uk-container uk-container-center">
                        <section id="tm-bottom-g" class="<?php echo $grid_classes['bottom-g']; echo $display_classes['bottom-g']; ?>" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin>
                            <?php echo $this['widgets']->render('bottom-g', array('layout'=>$this['config']->get('grid.bottom-g.layout'))); ?>
                        </section>
                    </div>
                </div>
                <?php endif; ?>

		<?php if ($this['widgets']->count('footer + debug') || $this['config']->get('warp_branding', true) || $this['config']->get('totop_scroller', true)) : ?>
		<footer id="tm-footer" class="tm-footer">

			<?php if ($this['config']->get('totop_scroller', true)) : ?>
			<a class="tm-totop-scroller" data-uk-smooth-scroll href="#"></a>
			<?php endif; ?>

			<?php
				echo $this['widgets']->render('footer');
				echo $this['widgets']->render('debug');
			?>

		</footer>
		<?php endif; ?>

        </div>
    
	<?php if ($this['widgets']->count('offcanvas')) : ?>
	<div id="offcanvas" class="uk-offcanvas">
		<div class="uk-offcanvas-bar"><?php echo $this['widgets']->render('offcanvas'); ?></div>
	</div>
	<?php endif; ?>
        <?php echo $this->render('footer'); ?>
    </div>
</body>
</html>