<!-- Forms - Select2 Selects-->
<script src="<?php echo base_url();?>public/theme/Template/global_assets/js/core/libraries/jquery_ui/interactions.min.js"></script>
<script src="<?php echo base_url();?>public/theme/Template/global_assets/js/plugins/forms/selects/select2.min.js"></script>

<script>
    $(document).ready(function(){
        $('.select-menu-color').select2({
            dropdownCssClass: 'bg-teal-400'
        });
	})
</script>
<!-- Forms - Select2 Selects end-->

<script>
    $(document).ready(function(){
        $.post("<?php echo base_url();?>/borrow_book",{

        },function(select_user){
            $("#user_books").html(select_user)
        })
	})
</script>

<script>
    $(document).ready(function(){
        $("#but_enter").on('click',function (){
            var user_key=$("#user_books").val();
            if(user_key!=""){
                $.post("<?php echo base_url();?>/borrow_book/user_books/"+user_key,{
                    user_key:user_key
                },function(Run_borrow){
                    $("#Run_borrow").html(Run_borrow)
                })
            }else{}
        })
	})
</script>