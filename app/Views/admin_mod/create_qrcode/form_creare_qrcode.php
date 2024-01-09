<!--
    Develop By Kunlathon Saowakhon
    พัฒนาเว็บไซต์โดย นายกุลธร เสาวคนธ์
    Tel 0932670639
    โทร 0932670639
    Email: mpamese.pc2001@gmail.com , missing_yrc2014@hotmail.com	
-->
<meta charset="utf-8">
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
<?php
	$session=session();
	$input_creare_qrcode=\Config\Services::request();
		if($session->has("IL_Key")>=1){
			if($_SESSION["IL_Status"]==1){
                $int_count=$input_creare_qrcode->getPost('int_count');
            ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

    <fieldset class="content-group"> 
        <div class="row">
    <?php
            $count_fcq=0;
            while($count_fcq<$int_count){ ?>

            <div class="col-<?php echo $grid;?>-6">
                <div class="form-group">
                    <label class="control-label col-<?php echo $grid;?>-5">เลขทะเบียนหนังสือห้องสมุด</label>
                    <div class="col-<?php echo $grid;?>-7">
                        <input type="text" name="create_qr[]" id="create_qr<?php echo $count_fcq;?>" value="" class="form-control">
                    </div>
                </div>
            </div>

    <?php   $count_fcq=$count_fcq+1; } ?>
               
        </div>
    </fieldset>

    <fieldset class="content-group">
        <div class="row">
            <div class="col-<?php echo $grid;?>-12">
                <button type="submit" name="submit_cbc" id="submit_cbc" class="btn btn-success">Print Qrcode</button>
            </div>
        </div>
    </fieldset>
    <input type="hidden" name="count_fcq" id="count_fcq" value="<?php echo $count_fcq;?>">
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<?php
			}else{
				exit("<script>window.location='/UserLogin/Logout';</script>");
			}
		}else{
			exit("<script>window.location='/UserLogin/Logout';</script>");
		}
?>