<?php
$mailcount=0;
  $query="SELECT * FROM mails WHERE mailRead = 'f'"; //query
   $result=$db->query($query);
	$num_rows=$result->num_rows;
   for($i=0;$i<$num_rows;$i++)
   {   $row=$result->fetch_row();
	 $mailcount++;
	}
?>