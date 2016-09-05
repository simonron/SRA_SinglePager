<?php
// Add JavaScript Frameworks
JHtml::_('bootstrap.framework');
defined('_JEXEC') or die;

// Getting params from template
$params = JFactory::getApplication()->getTemplate(true)->params;

$app = JFactory::getApplication();
$doc = JFactory::getDocument();
$this->language = $doc->language;
$this->direction = $doc->direction;

// Detecting Active Variables
$option   = $app->input->getCmd('option', '');
$view     = $app->input->getCmd('view', '');
$layout   = $app->input->getCmd('layout', '');
$task     = $app->input->getCmd('task', '');
$itemid   = $app->input->getCmd('Itemid', '');
$sitename = $app->getCfg('sitename');

if($task == "edit" || $layout == "form" )
{
	$fullWidth = 1;
}
else
{
	$fullWidth = 0;
}

// Add JavaScript Frameworks
JHtml::_('bootstrap.framework');

// Add Stylesheets
$doc->addStyleSheet('templates/'.$this->template.'/css/template.css');
$doc->addStyleSheet('templates/'.$this->template.'/css/'.$this->template.'.css');
$doc->addStyleSheet('templates/'.$this->template.'/css/override.css');

// Load optional RTL Bootstrap CSS
JHtml::_('bootstrap.loadCss', false, $this->direction);

// Add current user information
$user = JFactory::getUser();

// Adjusting content width
if ($this->countModules('right_col') && $this->countModules('left_col'))
{
	$span = "span6";
}
elseif ($this->countModules('right_col') && !$this->countModules('left_col'))
{
	$span = "span9";
}
elseif (!$this->countModules('right_col') && $this->countModules('left_col'))
{
	$span = "span9";
}
else
{
	$span = "span12";
}

// Logo file or site title param
if ($this->params->get('logoFile'))
{
	$logo = '<img src="'. JURI::root() . $this->params->get('logoFile') .'" alt="'. $sitename .'" />';
}
elseif ($this->params->get('sitetitle'))
{
	$logo = '<span class="site-title" title="'. $sitename .'">'. htmlspecialchars($this->params->get('sitetitle')) .'</span>';
}
else
{
	$logo = '<span class="site-title" title="'. $sitename .'">'. $sitename .'</span>';
}
?>
	<!DOCTYPE html>
	<!--[if lte IE 7]>

<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/ie7_only.css" type="text/css" />

<![endif]-->
	<!--[if IE 8]>

<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/ie8_only.css" type="text/css" />

<![endif]-->
	<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">

	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta property="og:image" content=" http://number8marketing.co.uk/images/images/no8m_logo.png" />
		<jdoc:include type="head" />
		<?php
	// Use of Google Font
	if ($this->params->get('googleFont'))
	{
	?>
			<!--		<link href='https://fonts.googleapis.com/css?family=Merriweather:400,700,400italic' rel='stylesheet' type='text/css'>-->
			<?php
	}
	?>
				<?php
	// Template color
	if ($this->params->get('templateColor'))
	{
	?>

					<?php
	}
	$isiPad = (bool) strpos($_SERVER['HTTP_USER_AGENT'],'iPad');
	if ($isiPad)
	$doc->addStyleSheet('templates/'.$this->template.'/css/iPadoverride.css');
			$doc->addScript('templates/'.$this->template.'/js/application.js');
	?>


						<!--[if lt IE 9]>
		<script src="<?php echo $this->baseurl ?>/media/jui/js/html5.js"></script>
	<![endif]-->
						<!--[if lt IE 7]>
<script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE7.js"></script>
<![endif]-->

						<!--[if lt IE 7]>
 <script src="http://ie7-js.googlecode.com/svn/version/2.0(beta3)/IE7.js"
 type="text/javascript">
 </script>
 <script src="http://ie7-js.googlecode.com/svn/version/2.0(beta3)/IE7-squish.js"
 type="text/javascript">
 </script>
<![endif]-->





						<!-- ****** faviconit.com favicons ****** -->
						<link rel="shortcut icon" href="/favicon.ico">
						<link rel="icon" sizes="16x16 32x32 64x64" href="/favicon.ico">
						<link rel="icon" type="image/png" sizes="196x196" href="/favicon-196.png">
						<link rel="icon" type="image/png" sizes="160x160" href="/favicon-160.png">
						<link rel="icon" type="image/png" sizes="96x96" href="/favicon-96.png">
						<link rel="icon" type="image/png" sizes="64x64" href="/favicon-64.png">
						<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32.png">
						<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16.png">
						<link rel="apple-touch-icon" sizes="152x152" href="/favicon-152.png">
						<link rel="apple-touch-icon" sizes="144x144" href="/favicon-144.png">
						<link rel="apple-touch-icon" sizes="120x120" href="/favicon-120.png">
						<link rel="apple-touch-icon" sizes="114x114" href="/favicon-114.png">
						<link rel="apple-touch-icon" sizes="76x76" href="/favicon-76.png">
						<link rel="apple-touch-icon" sizes="72x72" href="/favicon-72.png">
						<link rel="apple-touch-icon" href="/favicon-57.png">
						<meta name="msapplication-TileColor" content="#FFFFFF">
						<meta name="msapplication-TileImage" content="/favicon-144.png">
						<meta name="msapplication-config" content="/browserconfig.xml">
						<!-- ****** faviconit.com favicons ****** -->
						<script src="./js/jquery.js"></script>
						<script src="./js/modernizr-2.0.6.js"></script>


	</head>

	<!--<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-45770775-18', 'auto');
  ga('send', 'pageview');

</script>-->


	<body class="site <?php echo $option
	. ' view-' . $view
	. ($layout ? ' layout-' . $layout : ' no-layout')
	. ($task ? ' task-' . $task : ' no-task')
	. ($itemid ? ' itemid-' . $itemid : '')
	. ($params->get('fluidContainer') ? ' fluid' : '');
?>">


		<!-- Mobile sidebar -->
		<div class='off-screen-left'>
			<div class='container'>
				<jdoc:include type="modules" name="mobile-sidebar-left" />
			</div>
		</div>

		<div class='cover' onclick='onClickCover()'></div>



		<!-- Mobile Menu Button -->
		<div class='mobile-menu-bar'>
			<div class='mobile-menu-button' onclick='onClickMenu();'><span>&#9776;</span>&nbsp; Menu</div>
		</div>
		<div id="wrapper">
			<div id="top_area">
				<div class='container'>
					<div class='row-fluid'>
						<div class="no8m_logo span6">
							<jdoc:include type="modules" name="no8m_logo" style="none" />
						</div>
						<div class='main_menu span6'>
							<jdoc:include type="modules" name="main_menu" style="none" />
						</div>
					</div>
				</div>
			</div>





			<span id="top_of_site"></span>
			<section>
				<div class="hero">
					<div class='container-fluid'>
						<div class='row-fluid'>
							<div class='hero-full-width'>
								<jdoc:include type="modules" name="hero-full-width" style="xhtml" />
							</div>
						</div>
					</div>
				</div>
			</section>
			<section>
				<div id="FlexibleAndCreative" class="tiled">
					<div class="container">
						<div class="mask">
							<jdoc:include type="modules" name="FlexibleAndCreative" style="xhtml" />
						</div>
					</div>
				</div>
			</section>

			<section>
				<div class="expertise" id="Expertise">
					<div class='container'>
						<div class='row-fluid'>
							<div class="holder">
								<div class="expertise-left span6">
									<jdoc:include type="modules" name="expertise-left" style="xhtml" />
								</div>
								<div class='expertise-right span6'>
									<jdoc:include type="modules" name="expertise-right" style="none" />
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<section>
				<div class="clients" id="clients">
					<div class='container'>
						<div class='row-fluid'>
							<div class="clients-main span12">
								<jdoc:include type="modules" name="clients-main" style="xhtml" />
							</div>
						</div>
						<div class='row-fluid'>
							<div class="clients-left span6">
								<jdoc:include type="modules" name="clients-left" style="none" />
							</div>
							<div class='clients-right span6'>
								<jdoc:include type="modules" name="clients-right" style="none" />
							</div>
						</div>
					</div>
				</div>

			</section>
			<section>
				<div class="Associates" id="Associates">
					<div class='container'>
						<div class='row-fluid'>
							<div class="Associates-main span12">
								<jdoc:include type="modules" name="Associates-main" style="xhtml" />
							</div>
						</div>
						<div class='row-fluid'>
							<div id="pic_holder">
								<div class="Associates-left span3">
									<jdoc:include type="modules" name="Associates-left" style="none" />
								</div>
								<div class="Associates-left-m span3">
									<jdoc:include type="modules" name="Associates-left-m" style="none" />
								</div>
								<div class='Associates-right-m span3'>
									<jdoc:include type="modules" name="Associates-right-m" style="none" />
								</div>
								<div class='Associates-right span3'>
									<jdoc:include type="modules" name="Associates-right--" style="none" />
								</div>
							</div>
						</div>

					</div>
				</div>
			</section>
			<section>
				<div id="Testimonial" class="tiled">
					<div class="container">
						<jdoc:include type="modules" name="Testimonial" style="none" />
					</div>
				</div>
			</section>
			<section>
				<div id="twitter">
					<div class="container">
						<jdoc:include type="modules" name="twitter" style="none" />
					</div>
				</div>
			</section>
			<section>

				<div id="Contact">
					<!--Get in touch-->
					<div class="container">
						<jdoc:include type="modules" name="contact" style="xhtml" />
					</div>
				</div>

				<!-- Footer -->
				<!--Get in touch as well-->
				<div class="footer">
					<div class='container'>
						<jdoc:include type="modules" name="footer" style="xhtml" />
						<div class='row-fluid'>
							<div class="footer-left span8">
								<jdoc:include type="modules" name="footer-left" style="none" />
								<p>
									<br>Website by <a href='https://volute.co.uk'>Volute</a></p>
							</div>
							<div class='footer-right span4'>
								<jdoc:include type="modules" name="footer-right" style="none" />
							</div>
						</div>
					</div>
				</div>
			</section>
			<script src="./js/jquery.js"></script>
			<script>
				$(function() {
					console.log("THING called");
					$('a[href*="#"]:not([href="#"])').click(function() {
						//hijacks the anchor click action and does this >---
						move_this = this.hash;
						console.log("XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX   link " + move_this + " clicked");
						sra_menu(move_this);
						closeMenu();// closes mobile menu - even if already closed
					});
				});

				function sra_menu(move_this) {
					displayed_content = move_this;
					var offset = 0;
					display_here_top = $(top_of_site).offset().top;
					displayed_content_top = $(displayed_content).offset().top;
					console.log(displayed_content +" top is " + displayed_content_top);
					move_here_y = (displayed_content_top - display_here_top);
					console.log("move_here_y= " + move_here_y);

					if (typeof last_content != 'undefined') {
						console.log("last_content = " + last_content);
						if (displayed_content != last_content) {
							console.log(" -------------  transform state of last_content" + last_content + " = " + $(last_content).css("transform"));
							$(last_content).css("transform", "none");
							$(last_content).css("transform", "none");
							$(last_content).css("position", "relative");
							$(last_content).css("border", "solid 0px");
							console.log("RESETTING");
							console.log(" #############  RESETTING transform state of last_content" + last_content + " = " + $(last_content).css("transform"));
							last_content = displayed_content;
							console.log(" after last_content = displayed_content = " + last_content);
						}
					}
					 else {
						console.log("last_content NOT SET")
					};


					console.log(" #############  transform state of " + displayed_content + " = " + $(displayed_content).css("transform"));


					if ($(displayed_content).css("transform") == 'none') {
						//$(displayed_content).css("transform", "translate(0px,-" + move_here_y + "px)");
						$(displayed_content).css("top", "100vh)");
						//$(displayed_content).css("transform", "translate(0px,123px)");
						//$(displayed_content).css("position", "absolute");
						//$(last_content).css("position", "relative");
						//$(displayed_content).css("z-index", "100");
						//$(last_content).css("z-index","0");
						$(displayed_content).css("border-bottom", "solid 100vh rgba(0,0,0,0.5)");
						$(displayed_content).css("border-left", "solid 10vw rgba(0,0,0,0.5)");
						$(displayed_content).css("border-right", "solid 10vw rgba(0,0,0,0.5)");
						$(displayed_content).css("border-top", "solid 10vh rgba(0,0,0,0.5)");
						$(wrapper).css("overflow-y", "scroll");

						$("body").css("overflow-y", "hidden");


						//$(displayed_content).fadeIn();
						//
						/*		var elements =  $('.container :not('+displayed_content+' .container)');
									$(elements).fadeOut();
								console.log(elements);
								$(displayed_content).fadeIn();*/

					} else {
						$("body").css("overflow-y", "scroll");
						$(wrapper).css("overflow-y", "auto");
						$(displayed_content).css("transform", "none");
						$(displayed_content).css("position", "relative");
						$(displayed_content).css("border", "solid 0px");






						/*		$(displayed_content).css("transform", "translate(auto auto )");*/
						console.log("reset?");
					}
					last_content = displayed_content;
				}
			</script>

			<script>
				document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')
			</script>

			<jdoc:include type="modules" name="debug" style="none" />

		</div>
		<!-- end wrapper -->
	</body>

	</html>