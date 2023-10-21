<?php
	include("public/database/pdo_library.php");
	include("public/database/class_data_library.php");
?>	
	<div class="page-header">
		<div class="page-header-content">
			<div class="page-title">
				<h4>
					<span class="text-semibold">ข้อมูลพื้นฐานหนังสือ</span> - ลงทะเบียนหนังสือ
					<small class="display-block">Management Information System Regina Library</small>
				</h4>
			</div>

			<!--<div class="heading-elements">
				<div class="heading-btn-group">
					<a href="#" class="btn btn-link btn-float has-text"><i class="icon-bars-alt text-primary"></i><span>Statistics</span></a>
					<a href="#" class="btn btn-link btn-float has-text"><i class="icon-calculator text-primary"></i> <span>Invoices</span></a>
					<a href="#" class="btn btn-link btn-float has-text"><i class="icon-calendar5 text-primary"></i> <span>Schedule</span></a>
				</div>
			</div>-->
		</div>
	</div>
	<!-- Page container -->
	<div class="page-container">
		<!-- Page content -->
		<div class="page-content">
			<!-- Main content -->
			<div class="content-wrapper">
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->				
	<?php
		$Books_Key=filter_input(INPUT_POST,'Books_Key');
		$Books_NameTh=filter_input(INPUT_POST,'Books_NameTh');
		$Books_NameEn=filter_input(INPUT_POST,'Books_NameEn');
		$Books_Bid=filter_input(INPUT_POST,'Books_Bid');
		$Books_ISBN=filter_input(INPUT_POST,'Books_ISBN');
		$Books_Price=filter_input(INPUT_POST,'Books_Price');
		$LA_Key=filter_input(INPUT_POST,'LA_Key');
		$LT_No=filter_input(INPUT_POST,'LT_No');
		$LE_Key=filter_input(INPUT_POST,'LE_Key');
		$LTr_Key=filter_input(INPUT_POST,'LTr_Key');
		$LP_Key=filter_input(INPUT_POST,'LP_Key');
		$Books_Time=filter_input(INPUT_POST,'Books_Time');
		$DDCA_No=filter_input(INPUT_POST,'DDCA_No');
		$DDCB_No=filter_input(INPUT_POST,'DDCB_No');
		$Books_print_at=filter_input(INPUT_POST,'Books_print_at');
		$Books_year_at=filter_input(INPUT_POST,'Books_year_at');
		$lk_ID=filter_input(INPUT_POST,'lk_ID');
		$abbreviation_code=filter_input(INPUT_POST,'abbreviation_code');
		$Isu_TxtCount=count($_POST["Isu_Txt"]); //Post->Array
		$TypeInput=filter_input(INPUT_POST,'TypeInput');
		$BRR_Error="NullError";
			if($TypeInput=="Add"){
				$AddLibraryBooks=new MD_LibraryBooks("Add",$Books_Key,$Books_NameTh,$Books_NameEn,$Books_Bid,$Books_ISBN,$Books_Price,$Books_Time,$LA_Key,$LT_No,$LE_Key,$LTr_Key,$LP_Key,$DDCB_No,$DDCA_No,$Books_print_at,$Books_year_at,$lk_ID,$abbreviation_code);
					if($AddLibraryBooks->Run_MD_LibraryBooks()=="NotError"){
						$BRR_Error="NotError";
						$into_count=0;
						$AddNotError=0;
						$AddError=0;
						while($into_count<$Isu_TxtCount){
							$MDIS_NO=$Books_Key.$into_count;
							$MDIS_Txt=$_POST["Isu_Txt"][$into_count];
							$Ibrary_Subject=new MD_Ibrary_Subject("Add",$MDIS_NO,$MDIS_Txt,$Books_Key);	
								if($Ibrary_Subject->RunMDIbrarySubject()=="NotError"){
									$AddNotError=$AddNotError+1;
								}elseif($Ibrary_Subject->RunMDIbrarySubject()=="Error"){
									$AddError=$AddError+1;
								}else{
									$AddError=$AddError+1;
								}
							$into_count=$into_count+1;
						}
					}else{
						$BRR_Error="Error";
					}
			}else{//***---
				$BRR_Error="NullError";
			}
		 
	?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
		<?php
				if($BRR_Error=="NotError"){ ?>
					
					<div class="row">
						<div class="col-sm-12 col-md-12 col-lg-12">
							<div class="content-group-lg">
								<div class="alert alert-success alert-styled-left">
									<div style="font: 20px">ลงทะเบียนหนังสือสำเร็จ</div>
								</div>
            				</div>							
						</div>
					</div>
				
					<div class="row">
						<div class="col-sm-12 col-md-12 col-lg-12">
							<button type="button" onclick="location.href='<?php echo base_url();?>/admin?library_mod=books_register';" class="btn btn-success">กลับไปที่หน้าลงทะเบียนหนังสือ</button>
						</div>
					</div>

				
		<?php	}elseif($BRR_Error=="Error"){ ?>
				
					<div class="row">
						<div class="col-sm-12 col-md-12 col-lg-12">
							<div class="content-group-lg">
								<div class="alert alert-danger alert-styled-left">
									<div style="font: 20px">ลงทะเบียนหนังสือไม่สำเร็จ</div>
								</div>
            				</div>							
						</div>
					</div>				
				
					<div class="row">
						<div class="col-sm-12 col-md-12 col-lg-12">
							<button type="button" onclick="location.href='<?php echo base_url();?>/admin?library_mod=books_register';" class="btn btn-success">กลับไปที่หน้าลงทะเบียนหนังสือ</button>
						</div>
					</div>					

		<?php	}else{ ?>
			
					<div class="row">
						<div class="col-sm-12 col-md-12 col-lg-12">
							<div class="content-group-lg">-
								<div class="alert alert-danger alert-styled-left">
									<div style="font: 20px">พบข้อผิดพลาดไม่สามารถดำเนินการได้</div>
								</div>
            				</div>							
						</div>
					</div>		
				
					<div class="row">
						<div class="col-sm-12 col-md-12 col-lg-12">
							<button type="button" onclick="location.href='<?php echo base_url();?>/admin?library_mod=books_register';" class="btn btn-success">กลับไปที่หน้าลงทะเบียนหนังสือ</button>
						</div>
					</div>					

		<?php	} ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

			</div>
			<!-- /main content -->
		</div>
		<!-- /page content -->
	</div>
	<!-- /page container -->


