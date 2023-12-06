    <meta charset="utf-8">
	<script>
		$(document).ready(function(){
			$(".touchspin-empty").TouchSpin({
				min: 1,
				max: 100
			});
		})		
	</script>	
	<script>
		$(document).ready(function(){
	// Menu border and text color
			$('.select-border-color').select2({
				dropdownCssClass: 'border-success',
				containerCssClass: 'border-success text-success-700'
			});
		})
	</script>
	
	<?php
		$session=session();
		$InputSBL=\Config\Services::request();
			if(($session->has("IL_Key")>=1)){
				if(($_SESSION["IL_Status"]==1)){
//----------------------------------------------------------------------------------------------------------				
					include(APPPATH."Database-pdo/pdo_library.php");	
					include(APPPATH."Database-pdo/class_library.php");
					include(APPPATH."Database-pdo/class_data_library.php");	
//----------------------------------------------------------------------------------------------------------
					include("public/add-ons/php-barcode-generator-master/src/BarcodeGenerator.php");
					include("public/add-ons/php-barcode-generator-master/src/BarcodeGeneratorHTML.php");
//----------------------------------------------------------------------------------------------------------	
					$BL_Key=$InputSBL->getPost('BL_Key');
						if((isset($BL_Key))){
							$RunReadDataBooks=new ReadDataBooksAll($BL_Key,"BK");
							$RunReadError=$RunReadDataBooks->RunReadDataBooksError();
								switch($RunReadError){
									case "NoError": ?>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
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
//-------------------------------------------------------------------------------------------
			$SBL_Books_Books_print_at=$RunReadDataBooksRow["Books_print_at"];
			$SBL_Books_Books_year_at=$RunReadDataBooksRow["Books_year_at"];
			$SBL_Books_abbreviation_code=$RunReadDataBooksRow["abbreviation_code"];
			
			$DataDDCA=new ManagementDDCA($SBL_Books_DDCA_No,"-","-","RowId");				
				foreach($DataDDCA->RowAllManagementDDCA() as $library=>$DataDDCARow){
					$DDCA_TxtTh=$DataDDCARow["DDCA_TxtTh"];
				}	
			$DataDDCB=new ManagementDDCB("-",$SBL_Books_DDCB_No,"-","-","RowBId");
				foreach($DataDDCB->RowIdManagementDDCB() as $library=>$DataDDCBRow){
					$DDCB_TxtTh=$DataDDCBRow["DDCB_TxtTh"];
				}
		}
		
			$DataAuthor=new ManagementAuthor($SBL_Books_LA_Key,"-","read_txt");	
			$AuthorTxt=$DataAuthor->RunMAAuthorTxt();		

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
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

	<div class="row">
		<div class="col-sm-12 col-md-12 col-lg-12" style="font-weight: bold; text-align: center; font-size: 18px;">
<form name="Show_books_library">
			<div class="panel panel-body border-top-primary">
				<div class="text-center">
					<h6 class="no-margin text-semibold" style="font-weight: bold; font-size: 18px;">ลงข้อมูลหนังสือเข้าห้องสมุด</h6><br>	
					<div class="row">
						<div class="col-sm-4 col-md-4 col-lg-4">
							<fieldset class="content-group">				
								<label class="control-label col-sm-5 col-md-5 col-lg-5 text-semibold">จำนวนหนังสือนำเข้า</label>
								<div class="col-sm-7 col-md-7 col-lg-7">
									<input type="text" name="Number_Books" id="Number_Books" value="1" class="touchspin-empty">
								</div>
							</fieldset>						
						</div>
						<div class="col-sm-4 col-md-4 col-lg-4">
							<fieldset class="content-group">
								<label class="control-label col-sm-5 col-md-5 col-lg-5 text-semibold">แหล่งที่มา</label>
								<div class="col-sm-7 col-md-7 col-lg-7">
								<select class="select-border-color border-warning" name="LAd_No" id="LAd_No" required="required" data-placeholder="ข้อมูลแหล่งที่มา...">
										<option></option>
									<optgroup label="ข้อมูล แหล่งที่มา">
		<?php
				$BooksAdder=new ManagementAdder("-","-","read");
				foreach($BooksAdder->CallMAdd_Adder() as $library=>$BooksAdderRow){ ?>
										<option value="<?php echo $BooksAdderRow["LAd_No"];?>"><?php echo $BooksAdderRow["LAd_txt"];?></option>
		<?php	} ?>
										
							
									</optgroup>
								</select>
								</div>
							</fieldset>	
						</div>
						<div class="col-sm-4 col-md-4 col-lg-4">
							<button type="button" name="Enter_Books" id="Enter_Books" class="btn btn-default" style="font-family: surafont_sanukchang; font-size: 16px;">บันทึกข้อมูล</button>
							<button type="reset" name="Reset_EB" id="Reset_EB" class="btn btn-danger" style="font-family: surafont_sanukchang; font-size: 16px;">Reset</button>	
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
				var BooksName="หนังสือ : <?php echo $SBL_Books_NameTh;?>";
				var PostBooksKey="<?php echo $SBL_Books_Key;?>";
				var PostBooks="LS001";
				var PostCountBooks=$("#Number_Books").val();
				var PostLAd_No=$("#LAd_No").val();
				swal({
					title: "ต้องการเพิ่มจำนวนหนังสือใช้หรือไม่",
					text: BooksName,
					type: "warning",
					showCancelButton: true,
					confirmButtonColor: "#EF5350",
					confirmButtonText: "ต้องการเพิ่ม",
					cancelButtonText: "ไม่ต้องการเพิ่ม",
					closeOnConfirm: false,
					closeOnCancel: false
				},
				function(isConfirm){
					if (isConfirm) {
						if(PostLAd_No==""){
							swal({
								title: "กรุณาระบุแหล่งที่มา",
								text: BooksName,
								confirmButtonColor: "#2196F3",
								type: "error"
							});
						}else{
							swal({
								title: "ดำเนินการเพิ่มรายการ",
								confirmButtonColor: "#66BB6A",
								type: "success"
							},function(RunData){
								if(PostBooksKey!="" && PostBooks!="" && PostCountBooks!="" && PostLAd_No!=""){
									$.post("<?php echo base_url();?>/BooksLibrary/Adddata_books_library",{
										PostCountBooks:PostCountBooks,
										PostBooksKey:PostBooksKey,
										PostBooks:PostBooks,
										PostLAd_No:PostLAd_No
									},function(RunDataSBL){
										$("#ShowDataSBL").html(RunDataSBL)
									})								
								}else{}
							});							
						}
					}else{
						swal({
							title: "ไม่ต้องเพิ่มรายการ",
							text: BooksName,
							confirmButtonColor: "#2196F3",
							type: "error"
						});
					}
				});
			});
		})		
	</script>	
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->		
	<div id="ShowDataSBL"></div>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
	<?php
		if(file_exists("public/books_img/$SBL_Books_Key.jpg")){
			$img_SBKID=$SBL_Books_Key.".jpg";
		}else{
			$img_SBKID="img_library.jpg";
		}
	?>	
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
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
						<label class="control-label col-sm-4 col-md-4 col-lg-4 text-semibold">ISBN Code</label>
						<div class="col-sm-8 col-md-8 col-lg-8"><?php echo $SBL_Books_Bid;?></div>
					</fieldset>
					<fieldset class="content-group">				
						<label class="control-label col-sm-4 col-md-4 col-lg-4 text-semibold">ราคาต่อเล่ม โดยประมาณ</label>
						<div class="col-sm-8 col-md-8 col-lg-8"><?php echo $SBL_Books_Price;?></div>
					</fieldset>						
				</div>
			</div>
		</div>
	</div>	
	<div class="row">
		<div class="col-sm-6 col-md-6 col-lg-6" style="font-weight: bold; text-align: center; font-size: 18px;">
			<fieldset class="content-group">				
				<label class="control-label col-sm-4 col-md-4 col-lg-4 text-semibold"></label>
				<div class="col-sm-8 col-md-8 col-lg-8"></div>
			</fieldset>		
		</div>
		<div class="col-sm-6 col-md-6 col-lg-6"style="font-weight: bold; text-align: center; font-size: 18px;">
			<fieldset class="content-group">				
				<label class="control-label col-sm-4 col-md-4 col-lg-4 text-semibold"></label>
				<div class="col-sm-8 col-md-8 col-lg-8"></div>
			</fieldset>		
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
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->									
	<?php							break;
									case "Error": ?>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
	<div class="row">
		<div class="col-sm-12 col-md-12 col-lg-12" style="font-weight: bold; text-align: center; font-size: 20px;" >
			<content>~~~~ไม่พบข้อมูลหนังสือ <code><?php echo $BL_Key;?></code>~~~~</content>
		</div>
	</div>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->									
	<?php							break;
									default: ?>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="font-weight: bold; text-align: center; font-size: 20px;" >
			<content>~~~~ไม่พบข้อมูลหนังสือ~~~~</content>
		</div>
	</div>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->									
	<?php								
								}
						}else{}
				}else{}
			}else{}
	?>