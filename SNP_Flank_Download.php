<?php

header('Content-Description: File Transfer');
#header('Content-Type: application/octet-stream');
header('Content-Type: text/plain');
header('Content-Disposition: attachment; filename=Sequence.fasta');
header('Expires: 0');
header('Cache-Control: must-revalidate');
header('Pragma: public');

if(isset($_POST['check_list'])){
      if(isset($_POST['check_list']) && is_array($_POST['check_list'])){
	foreach($_POST['check_list'] as $item){
		$file = "/var/www/cgi-bin/SNP_Seq_Download.pl $item";
		ob_start();
		passthru($file);
		$perlreturn = ob_get_contents();
		ob_end_clean();
		$Seq = str_replace("\n","\r\n",$perlreturn);
		echo $Seq;
	}
}
else{
	echo "NO data"; 
}

}
else{
	echo "NO DATA";
}
?>
