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
	
	<script>
		$(document).ready(function(){
			$.extend( $.fn.dataTable.defaults, {
				autoWidth: false,
				columnDefs: [{ 
					orderable: false,
					width: '100px',
					//targets: [ 5 ]
				}],
				dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
				language: {
					search: '<span>Filter:</span> _INPUT_',
					searchPlaceholder: 'Type to filter...',
					lengthMenu: '<span>Show:</span> _MENU_',
					paginate: { 'first': 'First', 'last': 'Last', 'next': $('html').attr('dir') == 'rtl' ? '&larr;' : '&rarr;', 'previous': $('html').attr('dir') == 'rtl' ? '&rarr;' : '&larr;' }
				},
				drawCallback: function () {
					$(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').addClass('dropup');
				},
				preDrawCallback: function() {
					$(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').removeClass('dropup');
				}
			});		

			$('.datatable-basic').DataTable();
			
		});
	</script>	

	<script>
		$(document).ready(function(){
			$("#print_report").on("click",function(){
				var book_key=$("#book_key").val();
					if(book_key!==""){
						window.open("<?php echo base_url();?>/print_books/books/"+book_key, "_blank");
					}else{}
			})
		})
	</script>
<?php
	$session=session();
	$InputReportL=\Config\Services::request();
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
				$BL_Key=$InputReportL->getPost('BL_Key'); ?>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
		<?php
				if(isset($BL_Key)){
					$RunReadDataBooks=new ReadDataBooksAll($BL_Key,"BK");
					$RunReadError=$RunReadDataBooks->RunReadDataBooksError();
						if($RunReadError=="NoError"){
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
								
									if(file_exists("public/books_img/$SBL_Books_Key.jpg")){
										$img_SBKID=$SBL_Books_Key.".jpg";
									}else{
										$img_SBKID="img_library.jpg";
									}
								
							}?>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->				
	<div class="row">
		<div class="col-sm-3 col-md-3 col-lg-3" style="font-weight: bold; text-align: center; font-size: 18px;">
			<img style="width: 564; height: 564;" src="<?php echo base_url();?>/public/books_img/<?php echo $img_SBKID;?>" width="564" height="564" class="img-thumbnail" alt="img_library">
		</div>
		<div class="col-sm-9 col-md-9 col-lg-9" style="font-weight: bold; text-align: center; font-size: 18px;">
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
				<label class="control-label col-sm-4 col-md-4 col-lg-4 text-semibold">ISBN&nbsp;Code</label>
				<div class="col-sm-8 col-md-8 col-lg-8"><code><?php echo $SBL_Books_ISBN;?></code></div>
			</fieldset>
			<fieldset class="content-group">				
				<label class="control-label col-sm-4 col-md-4 col-lg-4 text-semibold">ราคาต่อเล่ม&nbsp;โดยประมาณ</label>
				<div class="col-sm-8 col-md-8 col-lg-8"><?php echo $SBL_Books_Price;?></div>
			</fieldset>	
			
		</div>		
	</div>		
	<hr>
	<div class="row">
		<div class="col-sm-12 col-md-12 col-lg-12" style="font-weight: bold;  font-size: 16px;">
			<div class="panel-body">
				<div class="row">
					<div class="col-sm-6 col-md-6 col-lg-6">
						<strong style="font-weight: bold;  font-size: 18px;">รายการเล่มหนังสือ : <?php echo $SBL_Books_NameTh;?></strong>						
					</div>
					<div class="col-sm-6 col-md-6 col-lg-6">
						<button type="button" name="print_report" id="print_report" class="btn btn-success">พิมพ์</button>
						<input type="hidden" name="book_key" id="book_key" value="<?php echo $BL_Key;?>">
					</div>
				</div>

			</div>
			
			<div class="table-responsive">
				<table class="table datatable-basic">
					<thead>
						<tr>
							
							<th><div>เลขทะเบียนหนังสือ</div></th>
							<th><div>แหล่งที่มา</div></th>
							<th><div>สถานะ</div></th>
							
							
						</tr>
					</thead>
					<tbody>
						
	<?php
		$PLBCount=1;
		$PrintListbooks=new MD_Library_Listbooks("RowArray",$SBL_Books_Key,"-","-","-","-");
		foreach($PrintListbooks->CallArrayMDLL() as $rc_book=>$PrintListbooksRow){ 
		$Listbooks_Status=$PrintListbooksRow["Li_StatusNo"];
//------------------------------------------------------------------------------------------		
			$DataAdder=new ManagementAdder($PrintListbooksRow["LAd_No"],"-","read_txt");
			$DataStatus=new ManagementStatus($PrintListbooksRow["Li_StatusNo"],"-","-","read_txt"); 
//------------------------------------------------------------------------------------------		 
		?>

						<tr>
							
							<td><div><?php echo $PrintListbooksRow["LLB_Key"];?></div></td>
							<td><div><?php echo $DataAdder->CallMAdd_AdderTxt();?></div></td>
							<td><div><?php echo $DataStatus->CallMSStatusTxt();?></div></td>
								
						</tr>			
			
	<?php	
		$PLBCount=$PLBCount+1;
		} ?>					

							
					</tbody>
				</table>
			</div>
			
		</div>
	</div>
			
			
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->						
		<?php			}elseif($RunReadError=="Error"){ ?>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->						
	<div class="row">
		<div class="col-sm-12 col-md-12 col-lg-12" style="font-weight: bold; text-align: center; font-size: 20px;" >
			<content>~~~~ไม่พบข้อมูลหนังสือ <code><?php echo $BL_Key;?></code>~~~~</content>
		</div>
	</div>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->	
		<?php			}
				}else{ ?>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->	
	<div class="row">
		<div class="col-sm-12 col-md-12 col-lg-12" style="font-weight: bold; text-align: center; font-size: 20px;" >
			<content>~~~~ไม่พบข้อมูลหนังสือ~~~~</content>
		</div>
	</div>								
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->				
		<?php	}?>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->					
<?php		}else{
				exit("<script>window.location='Admin?library_mod=report_library';</script>");
			}
		}else{
			exit("<script>window.location='Admin?library_mod=report_library';</script>");
		}
?>
