<?php
$image = pack("H*", $lob);
header("Content-Type: image/jpeg");
echo $image;
?>
