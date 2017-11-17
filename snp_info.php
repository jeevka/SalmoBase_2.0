<?php

# Information passed 
$snp_id = $_GET["snp_id"];
$chr_no = $_GET["chr"];
$pos = $_GET["pos"];
$annot = $_GET["annot"];
$snp_location = $_GET["location"];
$aa_change = $_GET["aa_change"];
$allele = $_GET["allele"];

# File Downloading Part 
#header('Content-Description: File Transfer');
#header('Content-Type: text/plain');
#header('Content-Disposition: attachment; filename=Sequence.fasta');
#header('Expires: 0');
#header('Cache-Control: must-revalidate');
#header('Pragma: public');


$seq = $chr_no.":".$pos;

$file = "/var/www/cgi-bin/SNP_Seq_Download_Single.pl $seq $allele";
ob_start();
passthru($file);
$perlreturn = ob_get_contents();
ob_end_clean();
$Seq = str_replace("\n","\r\n",$perlreturn);
$Seq_new = str_replace("\r\n", "<br>", $Seq);
$start = $pos - 2000; 
$end = $pos + 2000;
$link_img="http://salmonbase.org/cgi-bin/gb2/gbrowse_img/salmon_GBrowse_Chr_NCBI/?name=".$chr_no.":".$start."..".$end."&type=gene+mRNA+RefSeq_Gene+RefSeq_Transcripts&width=790&h_region=".$chr_no.":".$pos."..".$pos."@red";

$link="http://salmonbase.org/cgi-bin/gb2/gbrowse/salmon_GBrowse_Chr_NCBI/?name=".$chr_no.":".$start."..".$end."&type=gene+mRNA+RefSeq_Gene+RefSeq_Transcripts&width=790&h_region=".$chr_no.":".$pos."..".$pos."@red";
?>


<!DOCTYPE html>
<html>
<title> SNP information </title>

<body>

<!-- MAIN DIV -->
<div id=maindiv>

<div id="headerdiv">
	<div id="SB_div">
        <font id="SB" color="blue">S a l m o GVBrowser</font>
	</div>
</div>

<!-- Centre div -->
<div id="centerdiv">
	
	<div id="snp_id"> 
		<table id="basic_info_table" style="border=1|0\">
		<tr style=\"font-size:20px;background-color:#2E64FE;color:white;"> 
		    <td>SNP_ID</td> 
		    <td>Chromosome</td>
		    <td>Position</td> 
		    <td>Annotation</td>
		    <td>Location</td>
		    <td>Amino Acid Change</td>
                </tr> 
		<tr> 
                    <td> <?php echo $snp_id; ?> </td>
                    <td> <?php echo $chr_no ?> </td>
                    <td> <?php echo $pos ?> </td>
                    <td> <?php echo $annot ?> </td>
   		    <td> <?php echo $snp_location ?> </td>
		    <td> <?php echo $aa_change ?> </td>
		</tr>
		</table>	
		
	</div>

 	<div id="flank_seq">
	<h2>Flanking Sequence</h2> 
	<p><?php echo $Seq_new; ?></p> 
	</div>


	<!--GBrowse iframe  --> 
	<div id="GBrowse_iframe"> 
	<h2> Genomic view </h2> <p id="gb_image_text"> <b>Vertical red line indicates the position of the genetic variation.</b></p>
		<a href= <?php echo $link; ?> target="_blank" >
			<img src=<?php echo $link_img; ?> >
		</a>
	</div>
</div>


<!--End of Main div -->
</div>
</body>
</html>


<style type="text/css">
body {
	background-color:#214B96;
}

#maindiv {
	width:900px;
	margin-left:auto;
	margin-right:auto;
	text-align:left;
}

#headerdiv {
	background-color:#FFFFFF;
	text-color:#FFFFFF;
	width:900px;
	height:120px;
	text-align:center;
}

#centerdiv {
	border-style: solid;
	border-color: #01A9DB;
	width:894px;
	height:auto;
	background-color:white;
}

#SB {
	font-size:65px; 
}

#SB_div {
	margin-top:5px;
}

table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
    width:894px;
}

th, td {
    padding: 15px;
    text-align: left;
}

table#t01 th    {
    background-color: black;
    color: white;
}

th {
   font-size:40px;
}

#basic_info_table {
	border: 0px solid black;
	border-collapse: separate;
}

#flank_seq {
	height:175px; 
	width:886px;
	border: 2px solid;
	margin-left:2px;
	border-color: #01A9DB;
}

#GBrowse_iframe {
	height:auto;
	width:886px;
	border:0px solid; 
	margin-top:2px; 
	border:2px solid #01A9DB;
	margin-left:2px;
}

#GB_iframe {
	height:400px;
	width:890px; 
	border-color: #01A9DB;
	border:2px solid;
}

#gb_image_text {
	margin-left:55px; 
}

</style>
