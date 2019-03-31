<script>
function autoSubmit(){
    var formObject = document.forms['choice_form'];
    formObject.submit();
}
</script>

				  		<?php 
									$value = 'date';
										  if(isset($_POST['choice'])) {
										   $value = $_POST['choice'];

										  }
										   if($value=='date')
										   {
										   echo "New First" ;
										   }
										   else if($value=='price')
										   {
										   echo "Order By Price" ;
										   }
										   else if ($value=='stockRem')
										   {
										   echo "Order By Stocks" ;
										   }
										  
										?>
<form name="choice_form" id="choice_form" method="post">
   Order By:
        <input type="radio" name="choice" <?php if ($value == 'date') { ?>checked='checked'<?php } ?> onChange="autoSubmit();" value="date"> Uploaded Date
     
        <input type="radio" name="choice" <?php if ($value == 'price') { ?>checked='checked'<?php } ?> onChange="autoSubmit();" value="price"> Price
     	
     	 <input type="radio" name="choice" <?php if ($value == 'stockRem') { ?> checked='checked'<?php } ?> onChange="autoSubmit();" value="stockRem"> Number of Availabe bikes
     
</form>

