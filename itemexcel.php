<?php
header('Content-Type: application/force-download');
header('Content-disposition: attachment; filename='.date("D-M-d-Y-G-i", time()).'.xls');
// Fix for crappy IE bug in download.
header("Pragma: ");
header("Cache-Control: ");
echo $_REQUEST['datatodisplay'];
?>