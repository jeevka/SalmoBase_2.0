	
<?php

#####################################################################################################
# Updated Codes on 07 Oct 2014 by Jeevan
# MySql is no longer needed for gene expression data 
# So the codes are changed
#####################################################################################################

# E.g. Gname is CIGSSA_000001.t1. We need to split the gene name. 
# Gene expression data is mapped to gene names not transcript name 
$Transcript_name = $_GET['gname'];
$gname_temp = explode(".",$Transcript_name);
$gname = trim($gname_temp[0]);
$gene_name = $gname;
# There is no chaneg in GENE expression data between 3.6, 3.6 Chr and 3.6 Chr NCBI
#$Image_file_name = "/var/www/html/GE_Images_Ssa_3p6_Chr/".$gname.".png";
$Image_file_name = "/var/www/html/Gene_Expression_Images_060815/".$gname.".png";
$gene_func_text = $_GET['func'];
$Ortho_Gene = "/var/www/html/Ortho_Genes/".$gname.".png";
$Ortho_Protein = "/var/www/html/Images/".$Transcript_name.".png";
$Alias = $_GET['func'];
#$GO_Term = $_GET['go'];
#echo "**".$Alias."**";

# Check whether we have the GE image for the given gene
if (file_exists($Image_file_name)) {
	$Image_file_name = "/GE_Images_Ssa_3p6_Chr/".$gname.".png";
}
# If there is no Gene expression image/data then choose the default one which says there is no GE data
else{
	$Image_file_name = "/GE_Images/Default.jpg";
}

# Check whether we have the Orthologous image for the given gene
if (file_exists($Ortho_Gene)) {
        $Ortho_Gene = "/Ortho_Genes/".$gname.".png";
}
# If there is no Ortholog Gene similarity image/data then choose the default one which says there is no Ortho data data
else{
        $Ortho_Gene = "/Default_Images/Default_Gene.jpg";
}

# Check whether we have the Orthologous image for the given gene
if (file_exists($Ortho_Protein)) {
        $Ortho_Protein = "/Images/".$Transcript_name.".png";
}
# If there is no Ortholog Gene similarity image/data then choose the default one which says there is no Ortho data data
else{
        $Ortho_Protein = "/Default_Images/Default_Protein.jpg";
}

################################################################
#     *******Coders here after are not in use******** 
################################################################
// MySQL Login Details
$myServer = "db-01.orion.nmbu.no";
$myUser = "jeevka";
$myPass = "gbrowse01ok";
$myDB = "salmon_metadata";

// Connection MySQL server
$con= new mysqli($myServer,$myUser,$myPass,$myDB);
if ($con->connect_error)
   {
     die("Connection Failed :". $con->connect_error);
   }

###################################################
# Query Details of Hoemeolog Gene 
###################################################
$query = sprintf("SELECT * FROM salmon_metadata_090415 WHERE Gene='%s'",$Transcript_name);

$result = $con->query($query); 
if ($result->num_rows > 0) 
	{	
   	while($row = $result->fetch_assoc()) 
    		{	
		$Homeolog_ID = $row["Homeolog"];
		$Homeolog_Position = $row["Position"];
		$Homeolog_Name = $row["Gene_Symbol"];
		$Homeolog_Function = $row["Gene_name"];
    		}	
   	}	
else
	{
        $Homeolog_ID = "0";
        $Homeolog_Position = "0";
	$Homeolog_Name = "No Homeolog Found";
	$Homeolog_Function = "0";
	}


$ref = $_GET['name'];
$start = $_GET['segstart'];
$end = $_GET['segend'];
$gname = $_GET['gname'];
$GB_Version = $_GET['q'];

$Link_To_Homeolog="http://salmobase.org/cgi-bin/gb2/gbrowse/salmon_GBrowse_Chr_NCBI/?name=".$Homeolog_ID;
$Link_To_NCBI="http://www.ncbi.nlm.nih.gov/gene/?term=".$Homeolog_Name;
$Link_To_NCBI_Gene="http://www.ncbi.nlm.nih.gov/gene/?term=".$Alias;
$con->close();
?>

<!-- To download the DNA sequence -->
<?php

// to get the gene region
if( isset($_GET['gene_region']) )
{
    //be sure to validate and clean your variables
    $gene_region = htmlentities($_GET['gene_region']);
    $range_1 = htmlentities($_GET['range1']);
    $range_2 = htmlentities($_GET['range2']);
    
    $range_1 = $range_1 - $start;
    $range_2 = $range_2 + $end;		
    echo $gene_region;	
}
?>

<!DOCTYPE html>
<html>
<title> meta data </title>
<head>     <!-- Internal CSS file -->
    <link rel="stylesheet" type="text/css" href="salmonbase.css" /> 
</head> 
<body>

<!-- MAIN DIV -->
<div id=maindiv>

<div id="headerdiv">
	<div class="container-fluid header-image">
	 	<div class="row">
	  		<div class="col-lg-12">
				<h2 id="logo"> Salmo<span id="split_text">Base</span> <small>- Integrated molecular resource for Salmonid species</small> </h2>
			</div>
		</div>
	</div>

	<!--div id="SB_div"-->
        <!--font id="SB" color="blue">SalmoBase</font-->
	<!--h2 id="logo">Salmo<span id="split_text">Base</span> <small>- Integrated molecular resource for Salmonid species</small></h2>
	</div-->
</div>


<div id=centerdiv>


<!--Gene expression image div -->
<div id=geneexpression>
        <img id="gene_expression_image" src="<?php echo $Image_file_name;  ?>" alt="GE">
        <div id="geneexpression_text"> Gene expression data (FPKM) for Salmon transcript <?php echo $gene_name ?> in different tissue samples.</div>
</div>

<!--Gene name div in first left -->
<div id="gene_name"> 
         <div id="gene_name_text">
            <div id="gene_name_text_inner"> Gene Name (Best refseq hit)</div>           
         </div> 
         <div id="gene_name_value_1"> 
             <!--div id="gene_name_vlaue_1"> <i> <a href= <?php echo $Link_To_NCBI_Gene?> target="_blank" ><?php echo $Alias ?></a> </i> </div-->

                <?php if ($Alias != "Unknown") { ?>
			<div id="gene_name_value_inner_1"> 
                                         <!--textarea rows="2" cols="30"-->  
                                              <i> 
                                                     <a href= <?php echo $Link_To_NCBI_Gene?> target="_blank" ><?php echo $Alias ?></a>
				              </i> 
                                         <!--/textarea-->
			</div>	
                <?php } else { ?>
			<div id="gene_name_value_inner_1"> Unknown </div>
                <?php } ?>

	 </div>
</div>


<!--Gene ID div in second left -->
<div id="gene_ID"> 
               <div id="gene_ID_text"> 
                 <div id="gene_name_text_inner_2"> CIGENE Gene ID</div> 
               </div> 
               <div id="gene_name_value_2"> 
			<div id="gene_id_value"><?php echo $Transcript_name ?> </div>
               </div> 
</div>

<!-- Gene Function Div in the third left -->
<div id="gene_function"> 
	<!--
	<div id="gene_ontology_text"> 
		<div id="gene_ontology_text_inner"> Homeolog Gene Name </div> 
	</div> 
		
	<div id="gene_ontology_text_1">
		<?php if ($Homeolog_ID != "0") { ?>
			<div id="gene_ontology_value_inner"> <i><a href= <?php echo $Link_To_NCBI?> target="_blank" ><?php echo $Homeolog_Name ?></a> </i></div> 
		<?php } else { ?>
			<div id="gene_ontology_value_inner">No Homeolog Found </div>
		<?php } ?>
	</div>

	<div id="gene_function_text">
			<div id="gene_function_text_inner">Homeolog Gene ID </div>
	</div> 
	<div id="gene_function_text_1">
			<?php if ($Homeolog_ID != "0") { ?>
				<div id="gene_function_value_inner"> <a href=<?php echo $Link_To_Homeolog?> target="_blank"><?php echo $Homeolog_ID ?></a></div>
			<?php } else { ?>
				<div id="gene_function_value_inner"> No Homeolog Found </a></div>
			<?php } ?>
	</div>
	-->
	<!--div id="gene_ontology_text">Gene Ontology:</div> <div id="gene_ontology_text_1"><?php echo $gene_func_text ?>. </div-->
</div>

<!-- Down load sequence opions  -->
<div id=downloadseq>
<form id=download_form  method="get" action="download.php" target="_blank">
<div id=download_div>
	<input type="radio" name="seq_type" id="gene_region" value="1" checked>Gene region<br>
	<input type="radio" name="seq_type" id="exon" value="2">Coding region<br>
	<!-- input type="radio" name="seq_type" id="intron" value="3">Intron region<br-->
	<input type="radio" name="seq_type" id="intron" value="4">Protein Sequences<br>
	<input hidden id="hide1" name="ref" value= <?php echo $ref ?>>  
	<input hidden id="hide2" name="r1" value= <?php echo $start ?>> 
	<input hidden id="hide3" name="r2" value= <?php echo $end ?>>
	<input hidden id="hide4" name="gname" value= <?php echo $gname ?>>
	<input hidden id="hide4" name="GB_Version" value= <?php echo $GB_Version ?>>
	Upstream length &nbsp;&nbsp;&nbsp;&nbsp;: <input type="text" id=range1 name="upstream" value=0><br>
	Downstream length: <input type="text" id=range2 name="downstream" value=0> <br> <br>
	<!-- a href=  target="_blank"  style="text-decoration: none"-->
	<button type="submit"> Download Fasta File </button>
</div>
</form>
</div>


<div id="methods">
	<div id="method_text"> 
	FKPM values are calculated from publically available RNAseq data generated from a single double-haploid female  Atlantic salmon (Salmo salar). <br>
Raw data (short reads) are available here:
<br>
<ul>
<a href="http://www.ncbi.nlm.nih.gov/biosample/?term=SRS956266"><li>Liver (SRS956266)</li></a>
<a href="http://www.ncbi.nlm.nih.gov/biosample/?term=SRS956276"><li>Gut	(SRS956276)</li></a> 
<a href="http://www.ncbi.nlm.nih.gov/biosample/?term=SRS956267"><li>Gill (SRS956267) </li></a>
<a href="http://www.ncbi.nlm.nih.gov/biosample/?term=SRS956271"><li>Brain (SRS956271)</li></a>
<a href="http://www.ncbi.nlm.nih.gov/biosample/?term=SRS956272"><li>Spleen (SRS956272)</li></a>
<a href="http://www.ncbi.nlm.nih.gov/biosample/?term=SRS956269"><li>Muscle (SRS956269)</li></a>
<a href="http://www.ncbi.nlm.nih.gov/biosample/?term=SRS956273"><li>Heart (SRS956273)</li></a>
<a href="http://www.ncbi.nlm.nih.gov/biosample/?term=SRS956275"><li>Pancreas (SRS956275) </li></a>
<a href="http://www.ncbi.nlm.nih.gov/biosample/?term=SRS956274"><li>Pyloric_caecum (SRS956274)</li></a>
<a href="http://www.ncbi.nlm.nih.gov/biosample/?term=SRS951397"><li>Skin (SRS951397)</li></a>
</ul>
<br>
	<b>FPKM:</b> FPKM stands for "Fragments Per Kilobase Of Exon Per Million Fragments Mapped".  
	</div>
</div>

<!--Gene expression image div -->
<!--div id=geneexpression>
        <img src=" alt="GE" width="570px" height="500px">
        <div id="geneexpression_text"> Gene expression data (FPKM) for Salmon transcript in different tissue samples.</div>
</div-->


<!--Ortholog Protein image div -->
<!--div id=ortho_protein>
        <img src="<?php echo $Ortho_Protein;  ?>" alt="OG" height="500px" width="580px"> 
	<div id="ortho_protein_text"> <div id="ortho_protein_inner_text"> Comparision of Salmon protein <?php echo $gname ?> with other fish species.</div> </div>
</div-->


<!--Ortholog Gene expression image div -->
<!--div id=ortho_gene>
        <img src="<?php echo $Ortho_Gene;  ?>" alt="OG" height="500px" width="580px">
	<div id="ortho_gene_text"> <div id="ortho_protein_inner_text"> Comparision of Salmon gene <?php echo $gene_name ?> with other fish species.</div> </div>
</div-->


<!--END OF Center div -->
</div>


<!--End of Main div -->
</div>
</body>
</html>


<style type="text/css">
body	{
	background-color:#eef0f2;
}

#maindiv {
	width:1200px;
	margin-left:auto;
	margin-right:auto;
	text-align:left;
}

#headerdiv {
	background-color:#FFFFFF;
	text-color:#FFFFFF;
	width:1200px;
	height:80px;
	text-align:left;
}

#hide1 {
	visibility:none;
}

#centerdiv {
	border-style: solid;
	/*border-color: #01A9DB;*/
	width:1194px;
	height:650px;
	background-color:white;
}

#gene_name {
	height:30px;
	/*
	border-style: solid;
	border-color: #01A9DB;
	*/
	width:582px;
	float:left;
	margin-top:0px;
	margin-right:0px;
	font-size:18px;
}

#gene_name_text	{
	float:left;
	background-color:#3C6478;
	color:white;
	font-size:20px;
	height:30px;
	margin-left:0;
	margin-top:0;
	text-align:center;
	width:268px;
	border-style:solid;
	/*border-color:#01A9DB;*/
}

#gene_name_text_inner_1	{
	position:absolute;
	margin-top:5px;
	margin-left:76px;
}

#split_text{
	color:#f47d42;
	font-style:bold;
	font-size:42px;
}

#logo{
	font-family: Sans;
	font-size:42px;
}
#gene_name_text_inner_2	{
	position:absolute;
	margin-top:5px;
	margin-left:50px;
}

#gene_name_value_1 {
	/*
	float:left;
	*/
	position:absolute;
	margin-top:0px;
	text-align:middle;
	font-size:18px;
	height:32px;
	width:308px;
	/*border-color:#01A9DB;*/
	border-style:solid;
	margin-left:274px;
}

#gene_name_value_2 {
	margin-left:353px;
	position:absolute;
	margin-top:2px;
	/*
	text-align:middle;
	*/
	font-size:18px;
	width:308px;
	margin-left:268px;
	border-style:solid;
	/*border-color:#01A9DB;*/
	height:33px;
}

#gene_ID {
	height:41px;
	/*
	border-style: solid;
	border-color: #01A9DB;
	*/
	margin-top:1px;
	margin-right:0px; 
	width:582px; 
	float:right;
}

#gene_ID_text {
	float:left;
	background-color:#3C6478;
	color:white;
	font-size:20px;
	height:30px;
	margin-left:-6px;
	margin-top:5px;
	text-align:center;
	width:268px;
	border-style:solid;
	/*border-color:#01A9DB;*/
}

#gene_ID_value {
	float:right;
	margin-right:85px;
	text-align:middle;
}

#gene_id_value {
	margin-left:76px;
	margin-top:5px;
}

#gene_function {
	#height:76px;
	height:0px;
	#border-style: solid;
	border-style:hidden;
	/*border-color: black;*/
	margin-top:0px;
	width:582px;
	float:left;  
}

#gene_function_text {
	font-size:18px;
}

#gene_name_value_inner_1 {
	margin-left:110px;
}

#gene_function_text {
	border-style: solid;
	/*border-color: black;*/
	width:268px;
	height:34px;
	background-color:blue;
	color:white;
	float:none;
	margin-left:-3px;
}

#gene_function_text_1 {
	border-style: solid;
	/*border-color: #01A9DB;*/
	width:310px;
	position:absolute;
	margin-left:271px;
	margin-top:-40px;
	height:34px;
}

#gene_function_text_inner {
	float:left;
	font-size:20px;
	height:0px;
	margin-left:-6px;
	margin-top:6px;
	text-align:center;
	width:246px;
}

#gene_function_value_inner {
	float:left;
	font-size:16px;
	height:0px;
	margin-left:21px;
	margin-top:6px;
	text-align:center;
	width:250px;
}

#gene_ontology_text {
	border-style: solid;
	/*border-color: #01A9DB;*/
	width:268px;
	height:34px;
	background-color:blue;
	color:white;
	margin-top:-3px;
	margin-left:-3px;
}

#gene_ontology_text_1 {
	width:310px;
	position:absolute;
	margin-left:270px;
	margin-top:-40px;
	height:34px;
	border-style: solid;
	/*border-color: #01A9DB;*/
}

#gene_ontology_text_inner {
	float:left;
	font-size:20px;
	height:0px;
	margin-left:0;
	margin-top:4px;
	text-align:center;
	width:246px;
}

#gene_ontology_value_inner {
	float:left;
	font-size:16px;
	height:0px;
	margin-left:23px;
	margin-top:10px;
	text-align:center;
	width:250px;
}

#methods {
	border-style: solid;
	/*border-color: #01A9DB;*/
	#height:295px;
	height:376px;
	width:582px;
}

#method_text {
	margin-top:6px;
	margin-left:7px;
	font-size:17px;
}

#geneexpression {
	border-style: solid;
	/*border-color: #01A9DB;*/
	width:600px;
	height:596px;
	margin-left:0px;
	float:right;
	margin-top:0px;
}

#gene_expression_image {
	height:594px;
	width:570px;
}

#geneexpression_text {
	border-style: solid;
	/*border-color: #01A9DB;*/
	height:42px;
	width:601px;
	font-size: 18px;
	margin-left: -5px;
	border-width:5px;
}

#aboutgene	{
	border:1px solid;
	width:560px;
	height:50px;
	float:right;
	margin-right:10px;
	margin-top:10px;
}

#downloadseq {
	border-style: solid;
	/*border-color: #01A9DB;*/
	width:582px;
	height:192px;
	margin-left:0px;
	#margin-top:152px;
	margin-top:72px;
}

#range1 {
	width:50px;
}

#range2 {
	width:50px;
}

#download_options {
	width:100px;
	margin-left:50px;
	border:3px solid;
}

#download_div	{
	width:230px;
	height:150px;
	margin-left:198px;
	margin-top:17px;
}

#download_form_ {
	margin-left:25px;
	margin-top:0px;
}

#SB {
	font-weight:bold;
	font-size:80px;
	vertical-align:middle;
}

#SB_div	{
	position:absolute;
	margin-top:0px;
	margin-left:0px;
}

#ortho_protein	{
	margin-left:614px;
	margin-top:0px;
	border-style: solid;
	/*border-color: #01A9DB;*/
	height:550px;
	width:600px;
	float:right;
}

#ortho_protein_text {
	border-style: solid;
	/*border-color: #01A9DB;*/
	height:40px;
	width:600px;
	border-left-style:none;
	border-right-style:none;
	font-size: 18px;
	text-align: center;
	vertical-align: middle;
}

#ortho_protein_inner_text {
	position:absolute;
	margin-top:7px;
	margin-left:10px;
}

#ortho_gene {
	margin-top:-557px;
	margin-left:0px;
	height:552px;
	width:588px;
	border-style: solid;
	/*border-color: #01A9DB;*/
	float:left; 
}

#ortho_gene_text {
	border-style: solid;
	/*border-color: #01A9DB;*/
	height:42px;
	border-left-style:none;
	border-right-style:none;
	font-size: 18px;
	text-align: center;
}

i {
	text-transform:capitalize;
}
</style>
