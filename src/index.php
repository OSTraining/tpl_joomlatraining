<?php
/**
 * @package     Joomla.Site
 * @subpackage  Templates.ostrainingbreeze
 *
 * @copyright   Copyright (C) 2009, 2016 OSTraining.com
 * @license     GNU General Public License version 2 or later; see license.txt
 */

defined('_JEXEC') or die;

$app = JFactory::getApplication();
$doc = JFactory::getDocument();

include_once JPATH_THEMES . DIRECTORY_SEPARATOR . $doc->template . DIRECTORY_SEPARATOR . 'functions.php';

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" >
<head>
	<jdoc:include type="head" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <style>
        a,
        i{
            color:<?php echo $color_scheme; ?>;
        }
        .btn-primary,
        .navigation .nav-child li > a:hover,
        .navigation .nav-child li > a:focus,
        .navigation .nav-child:hover > a,
        .nav > li a,
		#mainmenu > li > ul > li > a:hover,
		.dropdown-menu > li > a:hover,
		.dropdown-menu > li > a:focus,
		.dropdown-submenu:hover > a,
		.dropdown-submenu:focus > a,
		#header,
		.navigation{
            background-color:<?php echo $color_scheme; ?>;
        }
        #mainmenu > .active > a,
        #mainmenu > .active > a:hover,
        #mainmenu > .active > a:focus,
        #mainmenu > li > a:hover,
        #mainmenu > li > a:focus {
            color: <?php echo $hover_color; ?>;
        }
    </style>
    <?php
    // Use of Google Font
    if ($this->params->get('googleFont'))
    {
        ?>
        <link href='//fonts.googleapis.com/css?family=<?php echo $this->params->get('googleFontName');?>' rel='stylesheet' type='text/css' />
        <style type="text/css">
            body{
                font-family: '<?php echo str_replace('+', ' ', $google_font[0]);?>', sans-serif;
            }
        </style>
    <?php
    }
    ?>
    <!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
</head>
<body class="myitemid-<?php echo $itemid; ?>" style="background-image:url(<?php echo $fullbg; ?>)">

    <!-- Body -->
    <div class="body">
        <div class="container m-bottom">
            <!-- Header -->
            <div class="row-fluid" id="header">
                <div class="inner-padding">
                	<div class="span4">
                    	<a class="brand pull-left" href="<?php echo $this->baseurl; ?>">
                        	<?php echo $logo; ?>
                    	</a>
                	</div>
                	<div class="span8">
                    	<div class="header-search pull-right">
                        	<?php if ($this->countModules('menu')) : ?>
								<nav class="navigation " role="navigation">
									<jdoc:include type="modules" name="menu" style="none" />
								</nav>
							<?php endif; ?>
                    	</div>
                	</div>
            	</div>
            </div>
        </div>
        <?php if ($this->countModules('top or banner')) : ?>
			<div class="container m-bottom">
            	<jdoc:include type="modules" name="top" style="none" />
            	<jdoc:include type="modules" name="banner" style="none" />
			</div>
		<?php endif; ?>
		<div class="container m-bottom b-top">
            <div class="inner-padding">
			<div class="row-fluid">
                <?php if ($this->countModules('left')) : ?>
                    <!-- Start Left -->
                    <div id="left-content" class="span3">
                        <div class="sidebar-nav">
                            <jdoc:include type="modules" name="left" style="well" />
                        </div>
                    </div>
                    <!-- Start Left -->
                <?php endif; ?>
                <!-- Start Content -->
                <div id="content" role="main" class="<?php echo $span_component; ?>">
                    <jdoc:include type="modules" name="bodytop" style="xhtml" />
                    <?php if(count($app->getMessageQueue())) : ?>
						<jdoc:include type="message" />
					<?php endif; ?>
                    <jdoc:include type="component" />
                    <jdoc:include type="modules" name="bodybottom" style="xhtml" />
                </div>
                <!-- End Content -->
                <?php if ($this->countModules('right')) : ?>
                    <div id="right-content" class="span3">
                        <!-- Start Right -->
                        <jdoc:include type="modules" name="right" style="well" />
                        <!-- End Right -->
                    </div>
                <?php endif; ?>
            </div>
			</div>
		</div>
		<?php if ($this->countModules('bottom-a or bottom-b or bottom-c')) : ?>
		<div class="container m-bottom">
            <!-- Start bottom -->
            <div class="inner-padding">
				<div class="row-fluid" id="bottom">
                    <?php if ($this->countModules('bottom-a')) : ?>
                        <!-- Start bottom-a -->
                        <div id="bottom-a" class="<?php echo $span_bottom; ?>">
                            <jdoc:include type="modules" name="bottom-a" style="well" />
                        </div>
                        <!-- End bottom-a -->
                    <?php endif; ?>
                    <?php if ($this->countModules('bottom-b')) : ?>
                        <!-- Start bottom-b -->
                        <div id="bottom-b" class="<?php echo $span_bottom; ?>">
                            <jdoc:include type="modules" name="bottom-b" style="well" />
                        </div>
                        <!-- End bottom-b -->
                    <?php endif; ?>
                    <?php if ($this->countModules('bottom-c')) : ?>
                        <!-- Start bottom-c -->
                        <div id="bottom-c" class="<?php echo $span_bottom; ?>">
                            <jdoc:include type="modules" name="bottom-c" style="well" />
                        </div>
                        <!-- End bottom-c -->
                    <?php endif; ?>
                </div>
			</div>
            <!-- End bottom -->
        </div>
		<?php endif; ?>
    </div>
    <!-- Start Footer -->
    <footer class="footer" role="contentinfo">
        <?php if ($this->countModules('footer-a or footer-b or footer-c')) : ?>
			<div class="container m-bottom">
            <!-- Start footer -->
                <div class="row-fluid" id="footer">
                <div class="inner-padding">
                    <?php if ($this->countModules('footer-a')) : ?>
                        <!-- Start footer-a -->
                        <div id="footer-a" class="<?php echo $span_footer; ?>">
                            <jdoc:include type="modules" name="footer-a" style="footer" />
                        </div>
                        <!-- End footer-a -->
                    <?php endif; ?>
                    <?php if ($this->countModules('footer-b')) : ?>
                        <!-- Start footer-b -->
                        <div id="footer-b" class="<?php echo $span_footer; ?>">
                            <jdoc:include type="modules" name="footer-b" style="footer" />
                        </div>
                        <!-- End footer-b -->
                    <?php endif; ?>
                    <?php if ($this->countModules('footer-c')) : ?>
                        <!-- Start footer-c -->
                        <div id="footer-c" class="<?php echo $span_footer; ?>">
                            <jdoc:include type="modules" name="footer-c" style="footer" />
                        </div>
                        <!-- End footer-c -->
                    <?php endif; ?>
                </div>
                </div>
            <!-- End footer -->
			</div>
		<?php endif; ?>
		<?php if ($this->countModules('credits') or $footer_text) : ?>
			<div class="container m-bottom">
            	<div class="inner-padding">
                	<div class="row-fluid copyright-ost">
                    	<div class="span6"><?php echo $footer_text; ?></div>
                    	<div class="span6"><jdoc:include type="modules" name="credits" style="no" /></div>
                	</div>
            	</div>
        	</div>
        <?php endif; ?>
    </footer>
    <!-- End Footer -->
    <jdoc:include type="modules" name="debug" style="none" />
</body>
</html>
