	
<?php

#####################################################################################################
# Updated Codes on 07 Oct 2014 by Jeevan
# MySql is no longer needed for gene expression data 
# So the codes are changed
#####################################################################################################

# E.g. Gname is CIGSSA_000001.t1. We need to split the gene name. 
# Gene expression data is mapped to gene names not transcript name 
$Transcript_name = $_GET['gname'];
#$Transcript_name= "CIGSSA_001994";
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

<!-- Plotly Graph for Gene expression data -->

<?php
$servername = "db-01.orion.nmbu.no";
$username = "jeevka";
$password = "gbrowse01ok";

// Create connection
$conn = mysqli_connect($servername, $username, $password);

$con=mysql_connect('db-01.orion.nmbu.no', 'jeevka', 'gbrowse01ok');
$db=mysql_select_db('salmon_gene_expression_plots');
$search=$gene_name;
$query=mysql_query("select * from sally_gene_expression_data where gene_id like '$search'");

$rows = array();

$x = array();
$y = array();
while ($query_result = mysql_fetch_array($query)){
    $x[] = $query_result['tissue'];
    $y[] = floatval($query_result['fpkm']);
}

$data = Array();
$temp = Array();
$data["x"] = $x;
$data["y"] = $y;
$data['type'] = "bar";
#$temp['color'] = Array('rgba(55,128,191,0.6)','rgba(55,128,191,0.6)','rgba(55,128,191,0.6)','rgba(55,128,191,0.6)','rgba(55,128,191,0.6)','rgba(55,128,191,0.6)','rgba(55,128,191,0.6)','rgba(55,128,191,0.6)','rgba(55,128,191,0.6)'); 
#$data['marker'] =$temp;
$data['marker'] = Array("color" => Array('rgba(0,84,105,1)','rgba(206,0,0,2)','rgba(247,92,3,3)','rgba(255,153,0,4)','rgba(241,196,15,5)','rgba(172,81,232,6)','rgba(24,145,224,7)','rgba(135,191,70,8)','rgba(235,56,56,9)')); 
$conn->close();

?>


<!DOCTYPE html>
<html>
<title> meta data </title>
<head>     <!-- Internal CSS file -->
    <link rel="stylesheet" type="text/css" href="salmonbase.css" /> 
    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
</head> 
<body>

<!--Gene expression image div -->
<div id="geneexpression">
		<script>
			       var layout = {barmode: 'stack',
			       xaxis: {autorange: 'reversed'}};

				var layout = {
					yaxis: {title: 'FPKM Values'},
					barmode: 'relative',
					height:500,
					width:600,
					font: {
					    family: 'Courier New, monospace',
					    size: 18,
					    color: '#000000'
					     }
					};
                                var data1 = Array(<?php echo json_encode($data); ?>);
				Plotly.newPlot('geneexpression', data1,layout);
  		</script>
        <!--div id="geneexpression_text"> Gene expression data (FPKM) for Salmon transcript <?php echo $gene_name ?> in different tissue samples.</div-->
</div>

</body>
</html>


<style type="text/css">
body	{
	background-color:#eef0f2;
}

#geneexpression {
	border-style: solid;
	/*border-color: #01A9DB;*/
	width:600px;
	height:auto;
}

</style>
