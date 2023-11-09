<?php
    header('Content-Type: text/html; charset=UTF-8');
    $session=session();
    $InputCBK=\Config\Services::request();
    if(($session->has("IL_Key")>=1)){
        if(($_SESSION["IL_Status"]==1)){
            include("public/database/pdo_library.php");	
            include("public/database/class_library.php");
            include("public/database/class_data_library.php");	
//----------------------------------------------------------------------------------------------------------
            include("public/add-ons/php-barcode-generator-master/src/BarcodeGenerator.php");
            include("public/add-ons/php-barcode-generator-master/src/BarcodeGeneratorHTML.php");
            //$InputCBK=$InputDCA->getPost('xxxx'); ?>
<!--________________________________________________________________________________-->
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>ระบบห้องสมุด Print Code Books</title>


<!--Code Print css-->
        <link rel="stylesheet" href="<?php echo base_url();?>/public/code_js/print_css_js/css/normalize.css">
		<link rel="stylesheet" href="<?php echo base_url();?>/public/code_js/print_css_js/css/paper.css"> 	
<!--Code Print css End-->
        <style>
			@font-face {
				font-family: 'THSarabunNew';
				src: url('<?php echo base_url();?>/view/font/thsarabunnew-webfont.eot');
				src: url('<?php echo base_url();?>/view/font/thsarabunnew-webfont.eot?#iefix') format('embedded-opentype'),
			url('<?php echo base_url();?>/view/font/thsarabunnew-webfont.woff') format('woff'),
			url('<?php echo base_url();?>/view/font/THSarabunNew.ttf') format('truetype');
			}
			body{
				font-family: "THSarabunNew";
				font-size: 18px;
				color: #032E3B;
			}
		</style>
	
		<style>
			@media print {
				
				@page{
					size: A4;
					margin: 1 cm;
				}
				
				button {
					display:none;
				}
				
				#p_echo{
					display:none;
				}
				
				body{
					font-family: "THSarabunNew";
					font-size: 18pt; 
							
				}
			}
			
			body{
				width: 210mm; height: 296mm;
			}
			.imgA{
				width: 210mm; height: 296mm;
			}
		</style>

        <script type="text/javascript">
            function setScreenHWCookie() {
                $.cookie('sw',screen.width);
                    //$.cookie('sh',screen.height);
                return true;
            }
                setScreenHWCookie();
        </script>

    <?php
		$width_system=filter_input(INPUT_COOKIE,'sw');
		if($width_system>=1200){
			$grid="lg";
		}elseif($width_system<=992){
			$grid="md";
		}elseif($width_system<=768){
			$grid="sm";
		}else{
			$grid="xs";
		}
    ?>

<!-- Core JS files -->
	<script src="<?php echo base_url();?>/public/theme/Template/global_assets/js/core/libraries/bootstrap.min.js"></script>
<!-- /core JS files -->	
<!--Code Print js-->
	<script src="<?php echo base_url();?>/public/code_js/print_css_js/js/html2canvas.js"></script>	
<!--Code Print js End-->	

    </head>
        <body class="col-<?php echo $grid;?>-12">

            <div id="p_echo">
                <div class="row">
                    <div class="col-<?php echo $grid;-12?>">
                        <div class="table-responsive">
                            <table class="table" align="center">
                                <thead>
                                    <tr>
                                        <th style="width: 20%">
                                            <div><button type="button"  class="btn btn-default" onclick="window.print()"><b><h4>พิมพ์</h4></b></button></div>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th style="width: 20%">
                                            <div><font color="#F70105"><b>ระบบการพิมพ์  รองรับ เว็บเบราว์เซอร์  Google Chrome และ  Microsoft Edge เท่านั้น<b></font></div>
                                        </th>								
                                    </tr>
                                </thead>						
                            </table>
                            <table class="table" align="center">
                                <thead>
                                    <tr>
                                        <th style="width: 20%"><div>ขนาดกระดาษ</div></th>
                                        <th style="width: 20%"><div>แนวกระดาษ</div></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><div>A4&nbsp;:&nbsp;210mm&nbsp;X&nbsp;296mm</div></td>
                                        <td><div>แนวตั้ง</div></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

    <?php
        $stsyem_library_name="RC_Library1";
    ?>

            <section class="sheet padding-10mm imgA">

                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td><div>สำเนา 1 <?php echo "BookKey : ".$books." (".$stsyem_library_name.")";?></div></td>
                    </tr>
                </table>
            
                <table width="100%" border="1" cellspacing="0" cellpadding="0">
                </tr>

    <?php
        $BL_Key=$books;
            if((isset($BL_Key))){
                $PLBCount=0;
                $PrintListbooks=new MD_Library_Listbooks("RowArray",$BL_Key,"-","-","-","-");
                foreach($PrintListbooks->CallArrayMDLL() as $rc_book=>$PrintListbooksRow){ 
                $Listbooks_Status=$PrintListbooksRow["Li_StatusNo"];
//------------------------------------------------------------------------------------------	
                    $book_no=$PrintListbooksRow["LLB_Key"];	
                    $DataAdder=new ManagementAdder($PrintListbooksRow["LAd_No"],"-","read_txt");
                    $DataStatus=new ManagementStatus($PrintListbooksRow["Li_StatusNo"],"-","-","read_txt"); 
//------------------------------------------------------------------------------------------
                    $Barcode_generator=new Picqer\Barcode\BarcodeGeneratorHTML();
//------------------------------------------------------------------------------------------
            ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

    <?php
            if(($PLBCount%4==0)){ ?>
                </tr>
                <tr>
                    <td>
                        <div><center><img  src="https://chart.googleapis.com/chart?chs=100x100&cht=qr&chl=<?php echo base_url();?>print_books/books/<?php echo $book_no;?>&choe=UTF-8" title="<?php echo $stsyem_library_name." : ".$book_no;?>"></center></div>
                        <div><center><?php echo  $Barcode_generator->getBarcode($book_no,$Barcode_generator::TYPE_CODE_128,2,40);?></center></div>
                        <div><center><small><?php echo $stsyem_library_name." : ".$book_no;?></small></center></div>
                    </td>
    <?php   }else{  ?>
                    <td>
                        <div><center><img src="https://chart.googleapis.com/chart?chs=100x100&cht=qr&chl=<?php echo base_url();?>print_books/books/<?php echo $book_no;?>&choe=UTF-8" title="<?php echo $stsyem_library_name." : ".$book_no;?>"></center></div>
                        <div><center><?php echo  $Barcode_generator->getBarcode($book_no,$Barcode_generator::TYPE_CODE_128,2,40);?></center></div>
                        <div><center><small><?php echo $stsyem_library_name." : ".$book_no;?></small></center></div>
                    </td>
    <?php   } ?>




<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<?php	
            $PLBCount=$PLBCount+1;
                } ?>		
              
    <?php   }else{} ?>      


            </tr>


                </table>


            </section>


            <section class="sheet padding-10mm imgA">

                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td><div>สำเนา 2 <?php echo "BookKey : ".$books." (".$stsyem_library_name.")";?></div></td>
                    </tr>
                </table>

                <table width="100%" border="1" cellspacing="0" cellpadding="0">


                <?php
                    $BL_Key=$books;
                        if((isset($BL_Key))){
                            $PLBCount=0;
                            $PrintListbooks=new MD_Library_Listbooks("RowArray",$BL_Key,"-","-","-","-");
                            foreach($PrintListbooks->CallArrayMDLL() as $rc_book=>$PrintListbooksRow){ 
                                $Listbooks_Status=$PrintListbooksRow["Li_StatusNo"];
//------------------------------------------------------------------------------------------	
                                $book_no=$PrintListbooksRow["LLB_Key"];	
                                $DataAdder=new ManagementAdder($PrintListbooksRow["LAd_No"],"-","read_txt");
                                $DataStatus=new ManagementStatus($PrintListbooksRow["Li_StatusNo"],"-","-","read_txt"); 
//------------------------------------------------------------------------------------------
                                $Barcode_generator=new Picqer\Barcode\BarcodeGeneratorHTML();
//------------------------------------------------------------------------------------------
                ?>
                <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

                <?php
                        if(($PLBCount%4==0)){ ?>
                </tr>
                <tr>
                    <td>
                        <div><center><img  src="https://chart.googleapis.com/chart?chs=100x100&cht=qr&chl=<?php echo base_url();?>print_books/books/<?php echo $book_no;?>&choe=UTF-8" title="<?php echo $stsyem_library_name." : ".$book_no;?>"></center></div>
                        <div><center><?php echo  $Barcode_generator->getBarcode($book_no,$Barcode_generator::TYPE_CODE_128,2,40);?></center></div>
                        <div><center><small><?php echo $stsyem_library_name." : ".$book_no;?></small></center></div>
                    </td>
                <?php   }else{  ?>
                    <td>
                        <div><center><img  src="https://chart.googleapis.com/chart?chs=100x100&cht=qr&chl=<?php echo base_url();?>print_books/books/<?php echo $book_no;?>&choe=UTF-8" title="<?php echo $stsyem_library_name." : ".$book_no;?>"></center></div>
                        <div><center><?php echo  $Barcode_generator->getBarcode($book_no,$Barcode_generator::TYPE_CODE_128,2,40);?></center></div>
                        <div><center><small><?php echo $stsyem_library_name." : ".$book_no;?></small></center></div>
                    </td>
                <?php   } ?>




                <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                <?php	
                $PLBCount=$PLBCount+1;
                } ?>		

                <?php   }else{} ?>      

                </table>


            </section>           

            
        </body>
    </html>	
<!--________________________________________________________________________________-->
<?php   }else{

        }
    }else{

    }
?>

