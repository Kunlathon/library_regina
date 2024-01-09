<?php
    //Develop By Kunlathon Saowakhon
    //พัฒนาเว็บไซต์โดย นายกุลธร เสาวคนธ์
    //Tel 0932670639
    //โทร 0932670639
    //Email: mpamese.pc2001@gmail.com , missing_yrc2014@hotmail.com	
?>
    <div class="page-header">
		<div class="page-header-content">
			<div class="page-title">
				<h4>
					<span class="text-semibold">ข้อมูลพื้นฐานหนังสือ</span>&nbsp;-&nbsp; จัดพิมพ์ QR Code และ Barcode หนังสือ
					<small class="display-block">Management&nbsp;Information&nbsp;System&nbsp;Regina&nbsp;Library</small>
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
        if((isset($_POST["manage"]))){
            $manage=filter_input(INPUT_POST,'manage');
        }else{
            $manage="show";
        }
            if(($manage=="show")){ ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                <fieldset class="content-group">
                    <div class="row">
                        <div class="col-<?php echo $grid;?>-12">
                            <div class="panel">
                                <div class="panel-heading bg-orange-600">
                                    <div style="font-size: 18px;" class="panel-title">จัดพิมพ์ <code>QR Code</code> และ <code>Barcode</code> หนังสือ </div>
                                    <div class="heading-elements">
                                        <table border="1" >
                                            <tr>
                                                <td>
                                                    <div><button type="button" name="rest_up" id="rest_up" class="btn btn-success btn-icon" value="rest_up"><i class="icon-list-unordered"></i> รายการ</button></div>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="panel-body">

<form class="form-horizontal" action="<?php echo base_url();?>print_books/books_count/0" method="post" enctype="multipart/form-data" name="form_create_qrcode" id="form_create_qrcode">

                                    <fieldset class="content-group"> 
                                        <div class="row">
                                            <div class="col-<?php echo $grid;?>-6">
                                                <div id="int_count-null">
                                                <div class="form-group">
                                                    <label class="control-label col-<?php echo $grid;?>-2">จำนวน</label>
                                                    <div class="col-<?php echo $grid;?>-10">
                                                        <input type="number" name="int_count" id="int_count" value="1" class="form-control">
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                            <div class="col-<?php echo $grid;?>-6">
                                                <div class="form-group">
                                                    <div class="button-group">
                                                        <button type="button" name="CreateKey_Count" id="CreateKey_Count" class="btn btn-success btn-icon" title="create"><i class="icon-hammer"></i> create</button>
                                                        <button type="button" name="CreateKey_Clear" id="CreateKey_Clear" class="btn btn-danger btn-icon" title="clear"><i class="icon-eraser2"></i> clear</button>
                                                    </div>
								                </div>
                                            </div>
                                        </div>
                                    </fieldset>

                                    <div id="run_input_qrcode"></div>


</form>                                

                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>    
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
    <?php   }else{ ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
    <?php   } ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
			</div>
			<!-- /main content -->
		</div>
		<!-- /page content -->
	</div>
	<!-- /page container -->    