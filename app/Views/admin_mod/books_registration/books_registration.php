<meta charset="utf-8">
	<script>
		$(document).ready(function(){
	// Menu border and text color
			$('.select-border-color').select2({
				dropdownCssClass: 'border-success',
				containerCssClass: 'border-success text-success-700'
			});
		})
	</script>
	
	<script>
		$(document).ready(function(){
			$('[data-toggle="tooltip"]').tooltip();   
		});
	</script>	
	

	
<?php
	$session=session();
	$InputSBL=\Config\Services::request();
		if($session->has("IL_Key")>=1){
			if($_SESSION["IL_Status"]==1){
//----------------------------------------------------------------------------------------------------------				
				include("public/database/pdo_library.php");	
				include("public/database/class_library.php");
				include("public/database/class_data_library.php");	
//----------------------------------------------------------------------------------------------------------
				include("public/add-ons/php-barcode-generator-master/src/BarcodeGenerator.php");
				include("public/add-ons/php-barcode-generator-master/src/BarcodeGeneratorHTML.php");
//----------------------------------------------------------------------------------------------------------				
				$BR_Key=$InputSBL->getPost('BR_Key'); ?>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
	<?php
		$RunReadDataBooks=new ReadDataBooksAll($BR_Key,"BL");
		$RRDB_Error=$RunReadDataBooks->RunReadDataBooksError();
			if($RRDB_Error=="NoError"){ ?>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
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
				$SBL_Books_abbreviation_code=$RunReadDataBooksRow["abbreviation_code"];}
//--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++					
			$DataDDCA=new ManagementDDCA($SBL_Books_DDCA_No,"-","-","RowId");				
				foreach($DataDDCA->RowAllManagementDDCA() as $library=>$DataDDCARow){
					$DDCA_TxtTh=$DataDDCARow["DDCA_TxtTh"];
				}
//--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++	
			$DataDDCB=new ManagementDDCB("-",$SBL_Books_DDCB_No,"-","-","RowBId");
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
				
			?>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
	<div class="row">
		<div class="col-sm-12 col-md-12 col-lg-12" style="font-weight: bold; text-align: center; font-size: 18px;">
<form name="Show_books_library">
			<div class="panel panel-body border-top-primary">
				<div class="text-center">
					<h6 class="no-margin text-semibold" style="font-weight: bold; font-size: 18px;">การจัดการสถานะหนังสือ</h6><br>	
					<div class="row">
						<div class="col-sm-4 col-md-4 col-lg-4">
							<fieldset class="content-group">
								<label class="control-label col-sm-5 col-md-5 col-lg-5 text-semibold">แหล่งที่มา</label>
								<div class="col-sm-7 col-md-7 col-lg-7">
								<select class="select-border-color border-warning" data-toggle="tooltip" name="BR_Adder" id="BR_Adder" required="required" data-placeholder="ข้อมูลแหล่งที่มา..." title="แหล่งที่มา">
										<option></option>
									<optgroup label="ข้อมูล แหล่งที่มา">
		<?php
				$BooksAdder=new ManagementAdder("-","-","read");
				foreach($BooksAdder->CallMAdd_Adder() as $library=>$BooksAdderRow){ ?>
										
					<?php
							if($LAd_No==$BooksAdderRow["LAd_No"]){ ?>
										<option value="<?php echo $BooksAdderRow["LAd_No"];?>" selected="selected"><?php echo $BooksAdderRow["LAd_txt"];?></option>							
					<?php	}else{ ?>
										<option value="<?php echo $BooksAdderRow["LAd_No"];?>" ><?php echo $BooksAdderRow["LAd_txt"];?></option>							
					<?php	}?>
										

		<?php	} ?>
										
									</optgroup>
								</select>
								</div>
							</fieldset>					
						</div>
						<div class="col-sm-4 col-md-4 col-lg-4">
							<fieldset class="content-group">
								<label class="control-label col-sm-5 col-md-5 col-lg-5 text-semibold">สถานะหนังสือ</label>
								<div class="col-sm-7 col-md-7 col-lg-7">
								<select class="select-border-color border-warning" data-toggle="tooltip" name="BR_Status" id="BR_Status" required="required" data-placeholder="ข้อมูลสถานะหนังสือ..." title="สถานะหนังสือ">
										<option></option>
									<optgroup label="ข้อมูล สถานะหนังสือ">
		<?php
				$BooksStatus=new ManagementStatus("-","-","-","read"); 
				foreach($BooksStatus->CallMSStatus() as $library=>$BooksStatusRow){ ?>
				
					<?php
							if($Li_StatusNo==$BooksStatusRow["Li_StatusNo"]){ ?>
										<option value="<?php echo $BooksStatusRow["Li_StatusNo"];?>" selected="selected"><?php echo $BooksStatusRow["Li_StatusTxtTh"];?></option>							
					<?php	}else{ ?>
										<option value="<?php echo $BooksStatusRow["Li_StatusNo"];?>"><?php echo $BooksStatusRow["Li_StatusTxtTh"];?></option>							
					<?php	} ?>
				
				
		<?php	} ?>
									</optgroup>
								</select>
								</div>
							</fieldset>	
						</div>
						<div class="col-sm-4 col-md-4 col-lg-4">
							<button type="button" name="Enter_Books" id="Enter_Books" class="btn btn-success" style="font-family: surafont_sanukchang; font-size: 16px;">บันทึกข้อมูล</button>
							<button type="button" name="Delete_Books" id="Delete_Books" class="btn btn-primary" style="font-family: surafont_sanukchang; font-size: 16px;">Delete</button>	
						</div>
					</div>
					
				</div>
			</div>
</form>
		</div>
	</div>
	
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
	<script>
		$(document).ready(function(){
			$('#Enter_Books').on('click', function() {
					var BR_Key="<?php echo $BR_Key;?>";
					var BR_Adder=$("#BR_Adder").val();
					var BR_Status=$("#BR_Status").val();
					var BR_Time="<?php date("Y-m-d H:i:s");?>";
				swal({
					title: "แก้ไขข้อมูล",
					text: "เลขทะเบียน "+BR_Key,
					type: "info",
					showCancelButton: true,
					closeOnConfirm: false,
					confirmButtonColor: "#2196F3",
					showLoaderOnConfirm: true
				},function() {
					setTimeout(function() {
						if(BR_Adder=="" && BR_Status==""){
							swal({
								title: "เกิดข้อผิดพลาด",
								text: "ข้อมูลไม่ถูกต้อง ไม่สามารถดำเนินการได้",
								confirmButtonColor: "#EF5350",
								type: "error"
							});
						}else{
							swal({
								title: "กำลังดำเนินการแก้ไขข้อมูล",
								confirmButtonColor: "#2196F3"
							},function(){
								$.post("<?php echo base_url();?>/BooksRegistration/updateBooks",{
									BR_Key:BR_Key,
									BR_Adder:BR_Adder,
									BR_Status:BR_Status,
									BR_Time:BR_Time
								},function(br){
									if(br!=""){
										$("#ShowDataSBL").html(br)
									}else{}
								})
							});
						}
					}, 2000);
				});
			});			
		})		
	</script>	
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->	
	<script>
		$(document).ready(function(){
			var BR_Key="<?php echo $BR_Key;?>"; 
			$('#Delete_Books').on('click', function() {
				swal({
					title: "ลบข้อมูล",
					text: "ต้องการลบข้อมูลเลขทะเบียนหนังสือ "+BR_Key+" ใช้หรือไม่",
					type: "warning",
					showCancelButton: true,
					confirmButtonColor: "#EF5350",
					confirmButtonText: "ลบ",
					cancelButtonText: "ไม่ลบ",
					closeOnConfirm: false,
					closeOnCancel: false
				},
				function(isConfirm){
					if (isConfirm) {
						swal({
							title: "ลบข้อมูล",
							text: "ดำเนินการลบข้อมูลเลขทะเบียนหนังสือ "+BR_Key,
							confirmButtonColor: "#66BB6A",
							type: "success"
						},function(){
							$.post("<?php echo base_url();?>/BooksRegistration/DeleteBooks",{
								BR_Key:BR_Key
							},function(BR_Data){
								if(BR_Data!=""){
									$("#ShowDataSBL").html(BR_Data)
								}else{}
							})
						});
					}
					else {
						swal({
							title: "ยกเลิกการลบ",
							text: "ยกเลิกลบข้อมูลเลขทะเบียนหนังสือ "+BR_Key,
							confirmButtonColor: "#2196F3",
							type: "error"
						});
					}
				});
			});
		})
	</script>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->	
	<script>
		/*$(document).ready(function(){
			var KeyISBN="9786162828090";
			var KeyA=KeyISBN.slice(0,3);
			var KeyB=KeyISBN.slice(3,3);
			var KeyC=KeyISBN.slice(7,4);
			var KeyD=KeyISBN.slice(11,2);
			var KeyG=KeyISBN.slice(12,1);
			var ISBN=KeyB;
			document.getElementById("KeyISBN").innerHTML = ISBN;
		});*/
	</script>	
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->	
	
	<div id="ShowDataSBL"></div>

	<?php
		if(file_exists("public/books_img/$SBL_Books_Key.jpg")){
			$img_SBKID=$SBL_Books_Key.".jpg";
		}else{
			$img_SBKID="img_library.jpg";
		}
	?>
	
	<div class="row">
		<div class="col-sm-12 col-md-12 col-lg-12" style="font-weight: bold; text-align: center; font-size: 18px;">
			<div class="row">
				<div class="col-sm-3 col-md-3 col-lg-3">
				<img style="width: 564; height: 564;" src="<?php echo base_url();?>/public/books_img/<?php echo $img_SBKID;?>" width="564" height="564" class="img-thumbnail" alt="img_library">
				</div>
				<div class="col-sm-9 col-md-9 col-lg-9">
					<fieldset class="content-group">				
						<label class="control-label col-sm-4 col-md-4 col-lg-4 text-semibold">รหัส / เลข หนังสือ</label>
						<div class="col-sm-8 col-md-8 col-lg-8"><?php echo $SBL_Books_Key;?></div>
					</fieldset>
					<fieldset class="content-group">				
						<label class="control-label col-sm-4 col-md-4 col-lg-4 text-semibold">เลขทะเบียน หนังสือ</label>
						<div class="col-sm-8 col-md-8 col-lg-8"><?php echo $BR_Key;?></div>
					</fieldset>					
					<fieldset class="content-group">				
						<label class="control-label col-sm-4 col-md-4 col-lg-4 text-semibold">ชื่อหนังสือ ภาษาไทย</label>
						<div class="col-sm-8 col-md-8 col-lg-8"><?php echo $SBL_Books_NameTh;?></div>
					</fieldset>					
					<fieldset class="content-group">				
						<label class="control-label col-sm-4 col-md-4 col-lg-4 text-semibold">ชื่อหนังสือ ภาษาอังกฤษ หรือ ภาษาอื่นๆ</label>
						<div class="col-sm-8 col-md-8 col-lg-8"><?php echo $SBL_Books_NameEn;?></div>
					</fieldset>	
					<fieldset class="content-group">		
	<?php
		$Barcode_generator=new Picqer\Barcode\BarcodeGeneratorHTML();
	?>					
						<label class="control-label col-sm-4 col-md-4 col-lg-4 text-semibold">Barcode Code</label>
						<div class="col-sm-8 col-md-8 col-lg-8">
							<center>
								<div class="img-thumbnail">
									<?php echo  $Barcode_generator->getBarcode($SBL_Books_Bid,$Barcode_generator::TYPE_CODE_128,2,50);?>
									<small><?php echo $SBL_Books_Bid;?></small>								
								</div>
							</center>
						</div>
					</fieldset>
					<fieldset class="content-group">				
						<label class="control-label col-sm-4 col-md-4 col-lg-4 text-semibold">ISBN&nbsp;Code</label>
						<div class="col-sm-8 col-md-8 col-lg-8"><code><?php echo $SBL_Books_ISBN;?></code></div>
					</fieldset>
					<fieldset class="content-group">				
						<label class="control-label col-sm-4 col-md-4 col-lg-4 text-semibold">ราคาต่อเล่ม&nbsp;โดยประมาณ</label>
						<div class="col-sm-8 col-md-8 col-lg-8"><?php echo $SBL_Books_Price;?></div>
					</fieldset>						
				</div>
			</div>
		</div>
	</div>	
	<div class="row">
		<div class="col-sm-6 col-md-6 col-lg-6" style="font-weight: bold; text-align: center; font-size: 18px;">
			<fieldset class="content-group">				
				<label class="control-label col-sm-4 col-md-4 col-lg-4 text-semibold">ผู้แต่ง</label>
				<div class="col-sm-8 col-md-8 col-lg-8"><?php echo $AuthorTxt;?></div>
			</fieldset>		
		</div>
		<div class="col-sm-6 col-md-6 col-lg-6" style="font-weight: bold; text-align: center; font-size: 18px;">
			<fieldset class="content-group">				
				<label class="control-label col-sm-4 col-md-4 col-lg-4 text-semibold">ประเภทหนังสือ</label>
				<div class="col-sm-8 col-md-8 col-lg-8"><?php echo $DataTxt;?></div>
			</fieldset>		
		</div>
		<div class="col-sm-6 col-md-6 col-lg-6" style="font-weight: bold; text-align: center; font-size: 18px;">
			<fieldset class="content-group">				
				<label class="control-label col-sm-4 col-md-4 col-lg-4 text-semibold">ข้อมูลบรรณาธิการ</label>
				<div class="col-sm-8 col-md-8 col-lg-8"><?php echo $EditorTxt;?></div>
			</fieldset>		
		</div>
		<div class="col-sm-6 col-md-6 col-lg-6" style="font-weight: bold; text-align: center; font-size: 18px;">
			<fieldset class="content-group">				
				<label class="control-label col-sm-4 col-md-4 col-lg-4 text-semibold">ข้อมูลผู้แปล</label>
				<div class="col-sm-8 col-md-8 col-lg-8"><?php echo $TranslatorTxt;?></div>
			</fieldset>		
		</div>
		<div class="col-sm-6 col-md-6 col-lg-6" style="font-weight: bold; text-align: center; font-size: 18px;">
			<fieldset class="content-group">				
				<label class="control-label col-sm-4 col-md-4 col-lg-4 text-semibold">ข้อมูลสำนักพิมพ์</label>
				<div class="col-sm-8 col-md-8 col-lg-8"><?php echo $PublisherTxt;?></div>
			</fieldset>		
		</div>
		<div class="col-sm-6 col-md-6 col-lg-6" style="font-weight: bold; text-align: center; font-size: 18px;">
			<fieldset class="content-group">				
				<label class="control-label col-sm-4 col-md-4 col-lg-4 text-semibold">วันที่ลงทะเบียนหนังสือ</label>
				<div class="col-sm-8 col-md-8 col-lg-8"><?php echo date("d-m-Y H:i:s",strtotime($SEL_Books_Books_Time));?></div>
			</fieldset>		
		</div>
		<div class="col-sm-6 col-md-6 col-lg-6" style="font-weight: bold; text-align: center; font-size: 18px;">
			<fieldset class="content-group">				
				<label class="control-label col-sm-4 col-md-4 col-lg-4 text-semibold">ทศนิยมดิวอี้หมวดใหญ่</label>
				<div class="col-sm-8 col-md-8 col-lg-8"><?php echo $DDCA_TxtTh." (".$SBL_Books_DDCA_No.")";?></div>
			</fieldset>		
		</div>
		<div class="col-sm-6 col-md-6 col-lg-6" style="font-weight: bold; text-align: center; font-size: 18px;">
			<fieldset class="content-group">				
				<label class="control-label col-sm-4 col-md-4 col-lg-4 text-semibold">ทศนิยมดิวอี้หมวดย่อย</label>
				<div class="col-sm-8 col-md-8 col-lg-8"><?php echo $DDCB_TxtTh." (".$SBL_Books_DDCB_No.")";?></div>
			</fieldset>		
		</div>
		<div class="col-sm-6 col-md-6 col-lg-6" style="font-weight: bold; text-align: center; font-size: 18px;">
			<fieldset class="content-group">				
				<label class="control-label col-sm-4 col-md-4 col-lg-4 text-semibold">พิมพ์ครั้ง</label>
				<div class="col-sm-8 col-md-8 col-lg-8"><?php echo $SBL_Books_Books_print_at;?></div>
			</fieldset>		
		</div>
		<div class="col-sm-6 col-md-6 col-lg-6" style="font-weight: bold; text-align: center; font-size: 18px;">
			<fieldset class="content-group">				
				<label class="control-label col-sm-4 col-md-4 col-lg-4 text-semibold">ปีที่พิมพ์</label>
				<div class="col-sm-8 col-md-8 col-lg-8"><?php echo $SBL_Books_Books_year_at;?></div>
			</fieldset>		
		</div>
		<div class="col-sm-6 col-md-6 col-lg-6" style="font-weight: bold; text-align: center; font-size: 18px;">
			<fieldset class="content-group">				
				<label class="control-label col-sm-4 col-md-4 col-lg-4 text-semibold">ที่เก็บหนังสือ</label>
				<div class="col-sm-8 col-md-8 col-lg-8"><?php echo $KeepTxt;?></div>
			</fieldset>		
		</div>
		<div class="col-sm-6 col-md-6 col-lg-6" style="font-weight: bold; text-align: center; font-size: 18px;">
			<fieldset class="content-group">				
				<label class="control-label col-sm-4 col-md-4 col-lg-4 text-semibold">รหัสตัวย่อ ห้องสมุด</label>
				<div class="col-sm-8 col-md-8 col-lg-8"><?php echo $SBL_Books_abbreviation_code;?></div>
			</fieldset>		
		</div>		
	</div>	
	
	<div class="row">
		<div class="col-sm-3 col-md-3 col-lg-3">
	<?php
		$Barcode_BR=new Picqer\Barcode\BarcodeGeneratorHTML();
	?>				
			<div class="panel panel-body border-top-warning">
				<center>
					<div class="img-thumbnail">
						<?php echo  $Barcode_BR->getBarcode($BR_Key,$Barcode_BR::TYPE_CODE_128,2,50);?>
						<small><?php echo $BR_Key;?></small>					
					</div>
				</center>				
			</div>
			<div class="panel panel-body border-top-warning">
			
			</div>
		</div>
		<div class="col-sm-9 col-md-9 col-lg-9">
			<div class="panel panel-body border-top-warning">
				<div class="text-center">
					<h6 class="no-margin text-semibold" style="font-weight: bold; font-size: 18px;">หัวข้อเรื่อง</h6><br>
				</div>
				<div class="table-responsive">
					<table class="table table-hover">
						<thead>
							<tr>
								<th><div>#</div></th>
								<th><div>หัวข้อเรื่อง</div></th>
							</tr>
	<?php
		$SubjectPrint=new MD_Ibrary_Subject('Read',$SBL_Books_Key,'-','-');
			if($SubjectPrint->RunMDIbrarySubject()=="NotError"){
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
	
	
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->				
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->				
	<?php	}elseif($RRDB_Error=="Error"){ ?>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
						<div class="row">
							<div class="col-sm-12 col-md-12 col-lg-12" style="font-weight: bold; text-align: center; font-size: 20px;" >
								<content>~~~~ไม่พบข้อมูลหนังสือ เลขทะเบียน <code><?php echo $BR_Key;?></code> ~~~~</content>
							</div>
						</div>				
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->				
	<?php	}else{ ?>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
						<div class="row">
							<div class="col-sm-12 col-md-12 col-lg-12" style="font-weight: bold; text-align: center; font-size: 20px;" >
								<content>~~~~ไม่พบข้อมูล~~~~</content>
							</div>
						</div>				
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->				
	<?php	}?>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->					
<?php		}else{
				exit("<script>window.location='Admin?library_mod=books_library';</script>");
			}
		}else{
			exit("<script>window.location='Admin?library_mod=books_library';</script>");
		}
?>