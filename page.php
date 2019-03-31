<html>
<body>
<div id="content">
<?php
$query1=mysql_connect("localhost","root","");
mysql_select_db("bykfinder",$query1);

$start=0;
$limit=2;

if(isset($_GET['id']))
{
$id=$_GET['id'];
$start=($id-1)*$limit;
}

$query=mysql_query("select * from user LIMIT $start, $limit");
while($query2=mysql_fetch_array($query))
{
echo "<li>".$query2['fname']."</li>";
}
$rows=mysql_num_rows(mysql_query("select * from user"));
$total=ceil($rows/$limit);

if($id>1)
{
echo "<a href='?id=".($id-1)."' class='button'>PREVIOUS</a>";
}
if($id!=$total)
{
echo "<a href='?id=".($id+1)."' class='button'>NEXT</a>";
}

echo "<ul class='page'>";
for($i=1;$i<=$total;$i++)
{
if($i==$id) { echo "<li class='current'>".$i."</li>"; }

else { echo "<li><a href='?id=".$i."'>".$i."</a></li>"; }
}
echo "</ul>";
?>
</div>
</body>
</html>
