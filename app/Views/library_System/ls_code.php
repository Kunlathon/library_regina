<meta charset="utf-8">
<?php
	$session=session();
//----------------------------------------------------------------------------------------------------------				
				include(APPPATH."Database-pdo/pdo_library.php");	
				include(APPPATH."Database-pdo/class_library.php");
				include(APPPATH."Database-pdo/class_data_library.php");	
//----------------------------------------------------------------------------------------------------------
				include("public/add-ons/php-barcode-generator-master/src/BarcodeGenerator.php");
				include("public/add-ons/php-barcode-generator-master/src/BarcodeGeneratorHTML.php");
//----------------------------------------------------------------------------------------------------------	
		if(($session->has("IL_Key")>=1)){
			if($_SESSION["IL_Status"]==1){ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title></title>
    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url();?>/public/theme_web/startbootstrap-sb-admin-2-gh-pages/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <!-- Custom styles for this template-->
    <link href="<?php echo base_url();?>/public/theme_web/startbootstrap-sb-admin-2-gh-pages/css/sb-admin-2.min.css" rel="stylesheet">
	<style>
		@font-face {
			font-family: 'surafont_sanukchang';
			src: url('<?php echo base_url();?>/public/font/surafont_sanukchang-webfont.eot');
			src: url('<?php echo base_url();?>/public/font/surafont_sanukchang-webfont.eot?#iefix') format('embedded-opentype'),
			url('<?php echo base_url();?>/public/font/surafont_sanukchang-webfont.woff') format('woff'),
			url('<?php echo base_url();?>/public/font/surafont_sanukchang.ttf') format('truetype');
		}
		body{
			font-family: "surafont_sanukchang";
			font-size: 16px;
			color: #032E3B;
			position: relative;
		}
	</style>
</head>

<body id="page-top" class="col-sm-12 col-md-12 col-lg-12">
    <div id="wrapper">
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <div class="container-fluid">



     
                    

      

   

                </div>
            </div>

            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->
        </div>
        <!-- End of Content Wrapper -->
    </div>
<!-- End of Page Wrapper -->
<!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
<!-- Logout Modal-->
<!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url();?>/public/theme_web/startbootstrap-sb-admin-2-gh-pages/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url();?>/public/theme_web/startbootstrap-sb-admin-2-gh-pages/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Core plugin JavaScript-->
    <script src="<?php echo base_url();?>/public/theme_web/startbootstrap-sb-admin-2-gh-pages/vendor/jquery-easing/jquery.easing.min.js"></script>
<!-- Custom scripts for all pages-->
    <script src="<?php echo base_url();?>/public/theme_web/startbootstrap-sb-admin-2-gh-pages/js/sb-admin-2.min.js"></script>
<!-- Page level plugins -->
    <script src="<?php echo base_url();?>/public/theme_web/startbootstrap-sb-admin-2-gh-pages/vendor/chart.js/Chart.min.js"></script>
<!-- Page level custom scripts -->
    <script src="<?php echo base_url();?>/public/theme_web/startbootstrap-sb-admin-2-gh-pages/js/demo/chart-area-demo.js"></script>
    <script src="<?php echo base_url();?>/public/theme_web/startbootstrap-sb-admin-2-gh-pages/js/demo/chart-pie-demo.js"></script>
</body>

</html>				
	<?php	}else{}
		}else{	?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->	
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>ข้อมูลหนังสือ เลขทะเบียน </title>
    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url();?>/public/theme_web/startbootstrap-sb-admin-2-gh-pages/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <!-- Custom styles for this template-->
    <link href="<?php echo base_url();?>/public/theme_web/startbootstrap-sb-admin-2-gh-pages/css/sb-admin-2.min.css" rel="stylesheet">
	<style>
		@font-face {
			font-family: 'surafont_sanukchang';
			src: url('<?php echo base_url();?>/public/font/surafont_sanukchang-webfont.eot');
			src: url('<?php echo base_url();?>/public/font/surafont_sanukchang-webfont.eot?#iefix') format('embedded-opentype'),
			url('<?php echo base_url();?>/public/font/surafont_sanukchang-webfont.woff') format('woff'),
			url('<?php echo base_url();?>/public/font/surafont_sanukchang.ttf') format('truetype');
		}
		body{
			font-family: "surafont_sanukchang";
			font-size: 16px;
			color: #032E3B;
			position: relative;
		}
	</style>
</head>

<body id="page-top" class="col-sm-12 col-md-12 col-lg-12">
	<br>
    <div id="wrapper">
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <div class="container-fluid">
				
				
	<?php
		$BR_Key="00001";
			if((isset($BR_Key))){
				$RunReadDataBooks=new ReadDataBooksAll($BR_Key,"BL");
				$RRDB_Error=$RunReadDataBooks->RunReadDataBooksError();
					if(($RRDB_Error=="NoError")){ ?>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
		<?php
			foreach($RunReadDataBooks->RunReadDataBooksAll() as $library=>$RunReadDataBooksRow){
				$SBL_Books_Key=$RunReadDataBooksRow["Books_Key"];
				$SBL_Books_NameTh=$RunReadDataBooksRow["Books_NameTh"];
				$SBL_Books_NameEn=$RunReadDataBooksRow["Books_NameEn"];
				$SBL_Books_Bid=$RunReadDataBooksRow["Books_Bid"];
				$SBL_Books_ISBN=$RunReadDataBooksRow["Books_ISBN"];
				$SBL_Books_Price=$RunReadDataBooksRow["Books_Price"];
				$SBL_Books_DDCA_No=$RunReadDataBooksRow["DDCA_No"];
				$SBL_Books_DDCB_No=$RunReadDataBooksRow["DDCB_No"];
				$SBL_Books_LA_Key=$RunReadDataBooksRow["LA_Key"];
				$SEL_Books_LK_ID=$RunReadDataBooksRow["lk_ID"];
				$SEL_Books_LP_Key=$RunReadDataBooksRow["LP_Key"];
				$SEL_Books_LE_Key=$RunReadDataBooksRow["LE_Key"];
				$SEL_Books_LTr_Key=$RunReadDataBooksRow["LTr_Key"];
				$SEL_Books_LT_No=$RunReadDataBooksRow["LT_No"];
				$SEL_Books_Books_Time=$RunReadDataBooksRow["Books_Time"];
//--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++						
				$LAd_No=$RunReadDataBooksRow["LAd_No"];
				$Li_StatusNo=$RunReadDataBooksRow["Li_StatusNo"];
//--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++						
				$SBL_Books_Books_print_at=$RunReadDataBooksRow["Books_print_at"];
				$SBL_Books_Books_year_at=$RunReadDataBooksRow["Books_year_at"];
				$SBL_Books_abbreviation_code=$RunReadDataBooksRow["abbreviation_code"];
//--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++					
			$DataDDCA=new ManagementDDCA($SBL_Books_DDCA_No,"RowId");				
				foreach($DataDDCA->RowAllManagementDDCA() as $library=>$DataDDCARow){
					$DDCA_TxtTh=$DataDDCARow["DDCA_TxtTh"];
				}	
//--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++	
			$DataDDCB=new ManagementDDCB($SBL_Books_DDCB_No,"RowBId");
				foreach($DataDDCB->RowIdManagementDDCB() as $library=>$DataDDCBRow){
					$DDCB_TxtTh=$DataDDCBRow["DDCB_TxtTh"];
				}			
//--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++				
			$DataAuthor=new ManagementAuthor($SBL_Books_LA_Key,"-","read_txt");	
			$AuthorTxt=$DataAuthor->RunMAAuthorTxt();
//--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++	
//ที่เก็บหนังสือ
			$DataKeep=new ManagementKeep($SEL_Books_LK_ID,"-","-","read_txt");
				$KeepTxt=$DataKeep->CallMK_KeepTxt();
//ข้อมูลสำนักพิมพ์  
			$DataPublisher=new ManagementPublisher($SEL_Books_LP_Key,"-","read_txt");
				$PublisherTxt=$DataPublisher->CallMP_PublisherTxt();
//ข้อมูลบรรณาธิการ
			$DataEditor=new ManagementEditor($SEL_Books_LE_Key,"-","read_txt");
				$EditorTxt=$DataEditor->CallEditorTxt();
//ข้อมูลผู้แปล
			$DataTranslator=new ManagementTranslator($SEL_Books_LTr_Key,"-","read_txt");
				$TranslatorTxt=$DataTranslator->CallMTTranslatorTxt();
//ประเภทหนังสือ
			$DataType=new ManagementType($SEL_Books_LT_No,"-","read_txt");
				$DataTxt=$DataType->CallMLTTypeTxt();				
			}		
		?>
		
		<div class="row">
			<div class="col-sm-3 col-md-3 col-lg-3">
                <div class="card mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">รูปภาพหนังสือ</h6>
                    </div>
					
	<?php
		if((file_exists("public/books_img/$SBL_Books_Key.jpg"))){
			$img_SBKID=$SBL_Books_Key.".jpg";
		}else{
			$img_SBKID="img_library.jpg";
		}
	?>					
					
                    <div class="card-body">
						<img style="width: 564; height: 400;" src="<?php echo base_url();?>/public/books_img/<?php echo $img_SBKID;?>" width="564" height="400" class="img-thumbnail" alt="img_library">
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">QR Code</h6>
                    </div>
                    <div class="card-body">
   
                    </div>
                </div>				
			</div>
			<div class="col-sm-9 col-md-9 col-lg-9">
                <div class="card mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">ข้อมูลหนังสือ&nbsp;</h6>
                    </div>
                    <div class="card-body">
						<div class="row">
							<div class="col-sm-6 col-md-6 col-lg-6">
								<fieldset class="content-group">
									<div class="row">
										<div class="col-sm-4 col-md-4 col-lg-4" style="color: #000000; font-weight: bold;">รหัส&nbsp;/&nbsp;เลข&nbsp;หนังสือ&nbsp;:</div>
										<div class="col-sm-8 col-md-8 col-lg-8" style="color: #0000FF; font-weight: bold;"><?php echo $SBL_Books_Key;?></div>									
									</div>
								</fieldset>							
							</div>
							<div class="col-sm-6 col-md-6 col-lg-6">
								<fieldset class="content-group">
									<div class="row">
										<div class="col-sm-4 col-md-4 col-lg-4" style="color: #000000; font-weight: bold;"><b>เลขทะเบียน&nbsp;:</b></div>
										<div class="col-sm-8 col-md-8 col-lg-8" style="color: #0000FF; font-weight: bold;"><?php echo $BR_Key;?></div>									
									</div>
								</fieldset>							
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6 col-md-6 col-lg-6">
								<fieldset class="content-group">
									<div class="row">
										<div class="col-sm-4 col-md-4 col-lg-4" style="color: #000000; font-weight: bold;">ชื่อหนังสือ&nbsp;ภาษาไทย&nbsp;:</div>
										<div class="col-sm-8 col-md-8 col-lg-8" style="color: #0000FF; font-weight: bold;"><?php echo $SBL_Books_NameTh;?></div>									
									</div>
								</fieldset>							
							</div>
							<div class="col-sm-6 col-md-6 col-lg-6">
								<fieldset class="content-group">
									<div class="row">
										<div class="col-sm-4 col-md-4 col-lg-4" style="color: #000000; font-weight: bold;">ชื่อหนังสือ&nbsp;ภาษาอังกฤษ&nbsp;หรือ&nbsp;ภาษาอื่นๆ : </div>
										<div class="col-sm-8 col-md-8 col-lg-8" style="color: #0000FF; font-weight: bold;"><?php echo $SBL_Books_NameEn;?></div>									
									</div>
								</fieldset>							
							</div>
						</div>	
					
						<div class="row">
							<div class="col-sm-6 col-md-6 col-lg-6">
								<fieldset class="content-group">
									<div class="row">
										<div class="col-sm-4 col-md-4 col-lg-4" style="color: #000000; font-weight: bold;">ISBN&nbsp;Code</div>
										<div class="col-sm-8 col-md-8 col-lg-8" style="color: #0000FF; font-weight: bold;"><?php echo $SBL_Books_ISBN;?></div>									
									</div>
								</fieldset>							
							</div>
							<div class="col-sm-6 col-md-6 col-lg-6">
								<fieldset class="content-group">
									<div class="row">
										<div class="col-sm-4 col-md-4 col-lg-4" style="color: #000000; font-weight: bold;">ราคาต่อเล่ม&nbsp;โดยประมาณ</div>
										<div class="col-sm-8 col-md-8 col-lg-8" style="color: #0000FF; font-weight: bold;"><?php echo $SBL_Books_Price;?></div>									
									</div>
								</fieldset>							
							</div>
						</div>						
						<div class="row">
							<div class="col-sm-6 col-md-6 col-lg-6">
								<fieldset class="content-group">
									<div class="row">
										<div class="col-sm-4 col-md-4 col-lg-4" style="color: #000000; font-weight: bold;">ผู้แต่ง</div>
										<div class="col-sm-8 col-md-8 col-lg-8" style="color: #0000FF; font-weight: bold;"><?php echo $AuthorTxt;?></div>									
									</div>
								</fieldset>							
							</div>
							<div class="col-sm-6 col-md-6 col-lg-6">
								<fieldset class="content-group">
									<div class="row">
										<div class="col-sm-4 col-md-4 col-lg-4" style="color: #000000; font-weight: bold;">ข้อมูลบรรณาธิการ</div>
										<div class="col-sm-8 col-md-8 col-lg-8" style="color: #0000FF; font-weight: bold;"><?php echo $EditorTxt;?></div>									
									</div>
								</fieldset>							
							</div>
						</div>	
						<div class="row">
							<div class="col-sm-6 col-md-6 col-lg-6">
								<fieldset class="content-group">
									<div class="row">
										<div class="col-sm-4 col-md-4 col-lg-4" style="color: #000000; font-weight: bold;">ข้อมูลผู้แปล</div>
										<div class="col-sm-8 col-md-8 col-lg-8" style="color: #0000FF; font-weight: bold;"><?php echo $TranslatorTxt;?></div>									
									</div>
								</fieldset>							
							</div>
							<div class="col-sm-6 col-md-6 col-lg-6">
								<fieldset class="content-group">
									<div class="row">
										<div class="col-sm-4 col-md-4 col-lg-4" style="color: #000000; font-weight: bold;">ข้อมูลสำนักพิมพ์</div>
										<div class="col-sm-8 col-md-8 col-lg-8" style="color: #0000FF; font-weight: bold;"><?php echo $PublisherTxt;?></div>									
									</div>
								</fieldset>							
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6 col-md-6 col-lg-6">
								<fieldset class="content-group">
									<div class="row">
										<div class="col-sm-4 col-md-4 col-lg-4" style="color: #000000; font-weight: bold;">วันที่ลงทะเบียนหนังสือ</div>
										<div class="col-sm-8 col-md-8 col-lg-8" style="color: #0000FF; font-weight: bold;"><?php echo date("d-m-Y H:i:s",strtotime($SEL_Books_Books_Time));?></div>									
									</div>
								</fieldset>							
							</div>
							<div class="col-sm-6 col-md-6 col-lg-6">
								<fieldset class="content-group">
									<div class="row">
										<div class="col-sm-4 col-md-4 col-lg-4" style="color: #000000; font-weight: bold;">ทศนิยมดิวอี้หมวดใหญ่</div>
										<div class="col-sm-8 col-md-8 col-lg-8" style="color: #0000FF; font-weight: bold;"><?php echo $DDCA_TxtTh." (".$SBL_Books_DDCA_No.")";?></div>									
									</div>
								</fieldset>							
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6 col-md-6 col-lg-6">
								<fieldset class="content-group">
									<div class="row">
										<div class="col-sm-4 col-md-4 col-lg-4" style="color: #000000; font-weight: bold;">ทศนิยมดิวอี้หมวดย่อย</div>
										<div class="col-sm-8 col-md-8 col-lg-8" style="color: #0000FF; font-weight: bold;"><?php echo $DDCB_TxtTh." (".$SBL_Books_DDCB_No.")";?></div>									
									</div>
								</fieldset>							
							</div>
							<div class="col-sm-6 col-md-6 col-lg-6">
								<fieldset class="content-group">
									<div class="row">
										<div class="col-sm-4 col-md-4 col-lg-4" style="color: #000000; font-weight: bold;">พิมพ์ครั้ง</div>
										<div class="col-sm-8 col-md-8 col-lg-8" style="color: #0000FF; font-weight: bold;"><?php echo $SBL_Books_Books_print_at;?></div>									
									</div>
								</fieldset>							
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6 col-md-6 col-lg-6">
								<fieldset class="content-group">
									<div class="row">
										<div class="col-sm-4 col-md-4 col-lg-4" style="color: #000000; font-weight: bold;">ปีที่พิมพ์</div>
										<div class="col-sm-8 col-md-8 col-lg-8" style="color: #0000FF; font-weight: bold;"><?php echo $SBL_Books_Books_year_at;?></div>									
									</div>
								</fieldset>							
							</div>
							<div class="col-sm-6 col-md-6 col-lg-6">
								<fieldset class="content-group">
									<div class="row">
										<div class="col-sm-4 col-md-4 col-lg-4" style="color: #000000; font-weight: bold;">ที่เก็บหนังสือ</div>
										<div class="col-sm-8 col-md-8 col-lg-8" style="color: #0000FF; font-weight: bold;"><?php echo $KeepTxt;?></div>									
									</div>
								</fieldset>							
							</div>
						</div>	
						<div class="row">
							<div class="col-sm-6 col-md-6 col-lg-6">
								<fieldset class="content-group">
									<div class="row">
										<div class="col-sm-4 col-md-4 col-lg-4" style="color: #000000; font-weight: bold;">รหัสตัวย่อ ห้องสมุด</div>
										<div class="col-sm-8 col-md-8 col-lg-8" style="color: #0000FF; font-weight: bold;"><?php echo $SBL_Books_abbreviation_code;?></div>									
									</div>
								</fieldset>							
							</div>
							<div class="col-sm-6 col-md-6 col-lg-6">
								<fieldset class="content-group">
									<div class="row">
										<div class="col-sm-4 col-md-4 col-lg-4" style="color: #000000; font-weight: bold;"></div>
										<div class="col-sm-8 col-md-8 col-lg-8" style="color: #0000FF; font-weight: bold;"></div>									
									</div>
								</fieldset>							
							</div>
						</div>
                    </div>
                </div>			
			</div>
		</div>
		<div class="row">
			<div class="col-sm-4 col-md-4 col-lg-4">
                <div class="card mb-4">
	<?php $Barcode_BCI=new Picqer\Barcode\BarcodeGeneratorHTML(); ?>					
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Barcode Code (ISBN)</h6>
                    </div>
                    <div class="card-body">
						<div class="row">
							<div class="col-sm-12 col-md-12 col-lg-12">
								<center>
									<div class="img-thumbnail">
										<?php echo  $Barcode_BCI->getBarcode($SBL_Books_Bid,$Barcode_BCI::TYPE_CODE_128,2,50);?>
										<small><?php echo $SBL_Books_Bid;?></small>								
									</div>
								</center>							
							</div>
						</div>
                    </div>
                </div>	
                <div class="card mb-4">
	<?php $Barcode_BCB=new Picqer\Barcode\BarcodeGeneratorHTML(); ?>					
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Barcode Code (Books)</h6>
                    </div>
                    <div class="card-body">
						<div class="row">
							<div class="col-sm-12 col-md-12 col-lg-12">
								<center>
									<div class="img-thumbnail">
										<?php echo  $Barcode_BCB->getBarcode($BR_Key,$Barcode_BCB::TYPE_CODE_128,2,50);?>
										<small><?php echo $BR_Key;?></small>								
									</div>
								</center>							
							</div>
						</div>   
                    </div>
                </div>				
			</div>
			<div class="col-sm-8 col-md-8 col-lg-8">
                <div class="card mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">หัวข้อเรื่อง</h6>
                    </div>
                    <div class="card-body">
						<div class="table-responsive">
							<table class="table table-hover">
								<thead>
									<tr>
										<th><div>#</div></th>
										<th><div>หัวข้อเรื่อง</div></th>
									</tr>
			<?php
				$SubjectPrint=new MD_Ibrary_Subject('Read',$SBL_Books_Key,'-','-');
					if(($SubjectPrint->RunMDIbrarySubject()=="NotError")){
						$count_SP=0;
						foreach($SubjectPrint->RunSubjectRow() as $rc=>$SubjectRow){ 
						$count_SP=$count_SP+1;
						?>
									<tr>
										<th><div><?php echo $count_SP;?></div></th>
										<th><div><?php echo $SubjectRow["Isu_Txt"];?></div></th>
									</tr>					
			<?php		}				
					}else{ ?>
									<tr>
										<th><div>-</div></th>
										<th><div>-</div></th>
									</tr>				
			<?php	}?>						

								</thead>
							</table>
						</div>   
                    </div>
                </div>			
			</div>
		</div>		
		
		
		
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->				
	<?php			}else{ ?>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->		
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->		
	<?php			} ?>
	<?php	}else{ ?>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
					<div class="row">
						<div class="col-sm-12 col-md-12 col-lg-12">
						    <div class="text-center">
								<div class="error mx-auto" data-text="404">404</div>
									<p class="lead text-gray-800 mb-5">Page Not Found</p>
									<p class="text-gray-500 mb-0">It looks like you found a glitch in the matrix...</p>
									<a href="index.html">&larr; Back to Dashboard</a>
							</div>
						</div>
					</div>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->				
	<?php	}?>			
				

                    

      

   

                </div>
            </div>

            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright my-auto">
                        <div class="row">
							<div class="col-sm-4 col-md-4 col-lg-4">X</div>
							<div class="col-sm-4 col-md-4 col-lg-4">X</div>
							<div class="col-sm-4 col-md-4 col-lg-4">X</div>
						</div>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->
        </div>
        <!-- End of Content Wrapper -->
    </div>
<!-- End of Page Wrapper -->
<!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
<!-- Logout Modal-->
<!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url();?>/public/theme_web/startbootstrap-sb-admin-2-gh-pages/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url();?>/public/theme_web/startbootstrap-sb-admin-2-gh-pages/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Core plugin JavaScript-->
    <script src="<?php echo base_url();?>/public/theme_web/startbootstrap-sb-admin-2-gh-pages/vendor/jquery-easing/jquery.easing.min.js"></script>
<!-- Custom scripts for all pages-->
    <script src="<?php echo base_url();?>/public/theme_web/startbootstrap-sb-admin-2-gh-pages/js/sb-admin-2.min.js"></script>
<!-- Page level plugins -->
    <script src="<?php echo base_url();?>/public/theme_web/startbootstrap-sb-admin-2-gh-pages/vendor/chart.js/Chart.min.js"></script>
<!-- Page level custom scripts -->
    <script src="<?php echo base_url();?>/public/theme_web/startbootstrap-sb-admin-2-gh-pages/js/demo/chart-area-demo.js"></script>
    <script src="<?php echo base_url();?>/public/theme_web/startbootstrap-sb-admin-2-gh-pages/js/demo/chart-pie-demo.js"></script>
</body>

</html>	
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->			
<?php	}?>