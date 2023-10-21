<!DOCTYPE html>
<html lang="en"> 
<head>
    <title>MIS Regina Library Login</title>
    
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <meta name="description" content="Portal - Bootstrap 5 Admin Dashboard Template For Developers">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">    
    <link rel="shortcut icon" href="favicon.ico"> 
	
    <!-- App CSS -->  
    <link id="theme-style" rel="stylesheet" href="<?php echo base_url();?>/public/theme_login/portal-theme-bs5-v2.1/assets/css/portal.css">    
	
    <!-- FontAwesome JS-->
    <script defer src="<?php echo base_url();?>/public/theme_login/portal-theme-bs5-v2.1/assets/plugins/fontawesome/js/all.min.js"></script>
    
    <script type="text/javascript" >
//disable back button
		history.pushState(null, null, '');
			window.addEventListener('popstate', function(event) {
				history.pushState(null, null, '');
			});
	</script>

	<script language="JavaScript">
		var message="ห้ามคลิกขวา";
			function clickIE(){
				if(document.all){
					alert(message);
					return false;
				}else{}
			}
	</script>

</head> 

<body class="app app-login p-0">    	
    <div class="row g-0 app-auth-wrapper">
	    <div class="col-12 col-md-5 col-lg-4 auth-main-col text-center p-5">
		    <div class="d-flex flex-column align-content-end">
			    <div class="app-auth-body mx-auto">	
				    <div class="app-auth-branding mb-4"><a class="app-logo" href="<?php echo base_url();?>/Admin/login"><img class="logo-icon me-2" src="<?php echo base_url();?>/public/img_login/logo_rc.jpg" alt="logo"></a></div>
					<h2 class="auth-heading text-center mb-5">Log in to MIS Regina Library</h2>
			        <div class="auth-form-container text-start">
						<form class="auth-form login-form" action="<?php echo base_url();?>/UserLogin/LibraryLogin" method="post" enctype="multipart/form-data" accept-charset="UTF-8">         
							<div class="email mb-3">
								<label class="sr-only" for="signin-email">User Name</label>
								<input id="signin-email" name="UserName" id="UserName" type="text" class="form-control signin-email" placeholder="UesrName" required="required">
							</div><!--//form-group-->
							<div class="password mb-3">
								<label class="sr-only" for="signin-password">Password</label>
								<input id="signin-password" name="UserPassword" id="UserPassword" type="password" class="form-control signin-password" placeholder="Password" required="required">
							</div><!--//form-group-->
							<div class="text-center">
								<button type="submit" class="btn app-btn-primary w-100 theme-btn mx-auto">Log In</button>
							</div>
						</form>
					</div><!--//auth-form-container-->	
			    </div><!--//auth-body-->
		    
			    <footer class="app-auth-footer">
				    <div class="container text-center py-3">
<!--/* This template is free as long as you keep the footer attribution link. If you'd like to use the template without the attribution link, you can buy the commercial license via our website: themes.3rdwavemedia.com Thank you for your support. :) */-->
						<small class="copyright">&nbsp;พัฒนาระบบโดย&nbsp;กลุ่มงาน&nbsp;ICT&nbsp;(Regina&nbsp;Coeli&nbsp;Collage) &nbsp;Copyright&nbsp;©&nbsp;2020&nbsp;Regina&nbsp;Coeli&nbsp;Collage.&nbsp;All&nbsp;Rights&nbsp;Reserved.</small>
				    </div>
			    </footer><!--//app-auth-footer-->	
		    </div><!--//flex-column-->   
	    </div><!--//auth-main-col-->
	    <div class="col-12 col-md-7 col-lg-8 h-100 auth-background-col">
		    <div class="auth-background-holder"></div>
		    <div class="auth-background-mask"></div>
		    <div class="auth-background-overlay p-3 p-lg-5">
			    <div class="d-flex flex-column align-content-end h-100">
				    <div class="h-100"></div>
				    <div class="overlay-content p-3 p-lg-4 rounded">
					    <h5 class="mb-3 overlay-title">ระบบการจัดการฐานข้อมูลห้องสมุด ประถม (MIS Regina Library)</h5>
					    <div>โรงเรียนเรยีนาเชลีวิทยาลัย (Regina Coeli College)</div>
				    </div>
				</div>
		    </div><!--//auth-background-overlay-->
	    </div><!--//auth-background-col-->
    
    </div><!--//row-->


</body>
</html> 

