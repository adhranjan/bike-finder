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
echo $value;
?>

<form name="choice_form" id="choice_form" method="post">
        <input type="radio" name="choice" <?php if ($value == 'date') { ?>checked='checked'<?php } ?> onChange="autoSubmit();" value="date"> Uploaded Date
     
        <input type="radio" name="choice" <?php if ($value == 'price') { ?> checked='checked'checked='checked'<?php } ?> onChange="autoSubmit();" value="price"> Price
      
       <input type="radio" name="choice" <?php if ($value == 'stockRem') { ?>checked='checked' <?php } ?> onChange="autoSubmit();" value="stockRem"> Number of Availabe bikes
</form>