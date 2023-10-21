<script>
    	$(document).ready(function(){
    // Default file input style
            $(".file-styled").uniform({
                fileButtonClass: 'action btn btn-default'
            });

    // Primary file input
            $(".file-styled-primary").uniform({
                fileButtonClass: 'action btn bg-blue'
            });
        })
</script>

<!-- Theme JS files -->
	<script src="<?php echo base_url();?>/public/theme/Template/global_assets/js/plugins/notifications/bootbox.min.js"></script>
	<script src="<?php echo base_url();?>/public/theme/Template/global_assets/js/plugins/notifications/sweet_alert.min.js"></script>
	<script src="<?php echo base_url();?>/public/theme/Template/global_assets/js/plugins/forms/selects/select2.min.js"></script>
<!-- /theme JS files -->
	
<script>
    $(document).ready(function(){
        $('#but_return_book').on('click', function() {
            var book_key=$("#book_key").val();
            swal({
                title: "ดำเนินการคืนหนังสือ",
                text: "เลขทะเบียนหนังสือ : "+book_key,
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#FF7043",
                confirmButtonText: "คืนหนังสือ"
            },function(){
                if(book_key!=""){
                    $.post("<?php echo base_url();?>/Return_book",{
                        book_key:book_key
                    },function(ReturnBook){
                        $("#RunReturnBook").html(ReturnBook);
                    })   
                }else{
                 
                }
            });
    

        })        
    })

</script>