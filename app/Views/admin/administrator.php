<?php
	$session=session();
		if(($session->has("IL_Key")>=1)){ 
			if(($_SESSION["IL_Status"]==1)){ 
				$library_mod=isset($_GET["library_mod"]) ? $_GET["library_mod"] : "books_home";
				//include(APPPATH."Database-pdo/pdo_library.php");
				//include(APPPATH."Database-pdo/class_library.php");	
			?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>MIS Regina Library</title>

<!-- Global stylesheets -->
	<link href="<?php echo base_url();?>public/theme/Template/global_assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>public/theme/Template/layout_4/LTR/default/full/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>public/theme/Template/layout_4/LTR/default/full/assets/css/core.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>public/theme/Template/layout_4/LTR/default/full/assets/css/components.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>public/theme/Template/layout_4/LTR/default/full/assets/css/colors.min.css" rel="stylesheet" type="text/css">
<!-- /global stylesheets -->
	<style>
		@font-face {
			font-family: 'surafont_sanukchang';
			src: url('<?php echo base_url();?>public/font/surafont_sanukchang-webfont.eot');
			src: url('<?php echo base_url();?>public/font/surafont_sanukchang-webfont.eot?#iefix') format('embedded-opentype'),
			url('<?php echo base_url();?>public/font/surafont_sanukchang-webfont.woff') format('woff'),
			url('<?php echo base_url();?>public/font/surafont_sanukchang.ttf') format('truetype');
		}
		
		body{
			font-family: "surafont_sanukchang";
			font-size: 16px;
			color: #032E3B;
			position: relative;
		}
	</style>
<!-- Core JS files -->
	<script src="<?php echo base_url();?>public/theme/Template/global_assets/js/plugins/loaders/pace.min.js"></script>
	<script src="<?php echo base_url();?>public/theme/Template/global_assets/js/core/libraries/jquery.min.js"></script>
	<script src="<?php echo base_url();?>public/theme/Template/global_assets/js/core/libraries/bootstrap.min.js"></script>
	<script src="<?php echo base_url();?>public/theme/Template/global_assets/js/plugins/loaders/blockui.min.js"></script>
	<script src="<?php echo base_url();?>public/theme/Template/global_assets/js/plugins/ui/nicescroll.min.js"></script>
	<script src="<?php echo base_url();?>public/theme/Template/global_assets/js/plugins/ui/drilldown.js"></script>
<!-- /core JS files -->
	<?php
		$Copy_Library_Mod=strtolower($library_mod);
			if(($Copy_Library_Mod=="author")){
				include("public/admin_mod/js/author/author_js.php");
			}elseif(($Copy_Library_Mod=="editor")){
				include("public/admin_mod/js/editor/editor_js.php");
			}elseif(($Copy_Library_Mod=="books_register" || $Copy_Library_Mod=="books_register_run")){
				include("public/admin_mod/js/books_register/books_register_js.php");
			}elseif(($Copy_Library_Mod=="data_Books")){
				include("public/admin_mod/js/data_Books/data_Books_js.php");
			}elseif(($Copy_Library_Mod=="books_registration")){
				include("public/admin_mod/js/books_registration/books_registration_js.php");
			}elseif(($Copy_Library_Mod=="error")){
				include("public/admin_mod/js/error/error_js.php");
			}elseif(($Copy_Library_Mod=="books_library")){
				include("public/admin_mod/js/books_library/books_library_js.php");
			}elseif(($Copy_Library_Mod=="report_library")){
				include("public/admin_mod/js/report_library/report_library_js.php");
			}elseif(($Copy_Library_Mod=="books_home")){
				include("public/admin_mod/js/books_home/books_home_js.php");
			}elseif(($Copy_Library_Mod=="type")){
				include("public/admin_mod/js/type/type_js.php");
			}elseif(($Copy_Library_Mod=="translator")){
				include("public/admin_mod/js/translator/translator_js.php");
			}elseif(($Copy_Library_Mod=="publisher")){
				include("public/admin_mod/js/publisher/publisher_js.php");
			}elseif(($Copy_Library_Mod=="keep")){
				include("public/admin_mod/js/keep/keep_js.php");
			}elseif(($Copy_Library_Mod=="ddc")){
				include("public/admin_mod/js/ddc/ddc_js.php");
			}elseif(($Copy_Library_Mod=="borrow_book")){
				include("public/admin_mod/js/borrow_book/borrow_book_js.php");
			}elseif(($Copy_Library_Mod=="return_book")){
				include("public/admin_mod/js/return_book/return_book_js.php");
			}elseif(($Copy_Library_Mod=="data_library")){
				include("public/admin_mod/js/data_library/data_library_js.php");
			}elseif(($Copy_Library_Mod=="create_qrcode")){
				include("public/admin_mod/js/create_qrcode/create_qrcode_js.php");
			}else{ ?>
<!-- Theme JS files -->
	<script src="<?php echo base_url();?>public/theme/Template/global_assets/js/plugins/visualization/d3/d3.min.js"></script>
	<script src="<?php echo base_url();?>public/theme/Template/global_assets/js/plugins/visualization/d3/d3_tooltip.js"></script>
	<script src="<?php echo base_url();?>public/theme/Template/global_assets/js/plugins/forms/styling/switchery.min.js"></script>
	<script src="<?php echo base_url();?>public/theme/Template/global_assets/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
	<script src="<?php echo base_url();?>public/theme/Template/global_assets/js/plugins/ui/moment/moment.min.js"></script>
	<script src="<?php echo base_url();?>public/theme/Template/global_assets/js/plugins/pickers/daterangepicker.js"></script>

	<script src="<?php echo base_url();?>public/theme/Template/global_assets/js/demo_pages/dashboard.js"></script>
<!-- /theme JS files -->			
	<?php	} ?>
	<script src="<?php echo base_url();?>public/theme/Template/layout_4/LTR/default/full/assets/js/app.js"></script>

<!--****************************************************************************-->
    <script type="text/javascript">
		function setScreenHWCookie() {
			$.cookie('sw', screen.width);
			//$.cookie('sh',screen.height);
			return true;
		}
		setScreenHWCookie();
    </script>
 
    <?php
		$width_system=filter_input(INPUT_COOKIE,'sw');
		if(($width_system>=1200)){
			$grid="lg";
		}elseif(($width_system<=992)){
			$grid="md";
		}elseif(($width_system<=768)){
			$grid="sm";
		}else{
			$grid="xs";
		}
    ?>
<!--****************************************************************************-->

</head>

<body class="col-<?php echo $grid;?>-12">

<!-- Main navbar -->
	<?php include("public/structure_admin/main_navbar.php");?>
<!-- /main navbar -->
<!-- Second navbar -->
	<?php include("public/structure_admin/second_navbar.php");?>
<!-- /second navbar -->
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->			
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->			
		<?php
			$library_load="public/admin_mod/{$library_mod}.php";
				if((file_exists($library_load))){
					include $library_load;
				}else{
					include "public/admin_mod/error.php";
				}
		?>		
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->					
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<!-- Footer -->
	<?php include("public/structure_admin/footer.php");?>
<!-- /footer -->		
</body>
</html>		
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->			
<?php		}else{
				exit("<script>window.location='UserLogin/Logout';</script>");			
			}
		}else{
			exit("<script>window.location='UserLogin/Logout';</script>");
		}
?>





