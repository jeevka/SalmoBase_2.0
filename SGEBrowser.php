
<!DOCTYPE html>
<html>
<title>SalmoBase</title>
<head>
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
<link rel="icon" href="favicon.ico" type="image/x-icon">

</head>
<body>

<div id=maindiv>
<div id="back_button"> <a href="http://salmonbase.org/"> Back to Salmobase </a> </div>

<div id="header">
<font id="SB">S a l m o GEBrowser</font>
</div>

<!--center div -->
<!--div id=centerdiv-->

<div id="SNP_search"> 
	<form action="" method="post">
		  <input name="search" id="SNP_search_box" type="search" autofocus>
                  <input type="submit" name="button" id="SNP_search_button" >
	</form>
</div> 

<div id="about"> Salmon GEBrowser let you search for gene expression data available for Atlantic Salmon. You can search by area (e.g. ssa29:1-1000000) or gene name (e.g. atrn, rpia).</div>
	<div id="FPKM_text_div">
        	      <p>FKPM values are calculated from publically available RNAseq data generated from a single double-haploid female Atlantic salmon (Salmo salar).
               		FPKM stands for "Fragments Per Kilobase Of Exon Per Million Fragments Mapped".</p>
	</div>


<?php

$servername = "192.168.168.215";
$username = "jeevka";
$password = "gbrowse01ok";

// Create connection
$conn = mysqli_connect($servername, $username, $password);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

//echo "Connected successfully";

$con=mysql_connect('192.168.168.215', 'jeevka', 'gbrowse01ok');
$db=mysql_select_db('salmon_gene_expression');

if(isset($_POST['button'])){    //trigger button click

  $search=$_POST['search'];
  list($chr, $pos) = explode(":",$search);
  list($pos1, $pos2) = explode("-",$pos);
 
  /* Prepare GBrowse link */
  $link = "http://salmonbase.org/cgi-bin/gb2/gbrowse/salmon_GBrowse_Chr_NCBI/?name=".$chr.":".$pos1."..".$pos2; 

  /* Main Images div */
  echo "<div id=\"images_main_div\" >";

   /* Search Genomic Range */ 
  if (preg_match('/ssa/',$search)) { 
  	$query=mysql_query("select * from salmon_gene_expression_data where chr_no like '$chr' and (start >= $pos1 and end <= $pos2)");
  }
  else {
        /* Search Gene names */
 	$query=mysql_query("select * from salmon_gene_expression_data where gene_symbol like '$search'");
   }	 

  /* Main table */
  if (mysql_num_rows($query) > 0){
  	if (mysql_num_rows($query) > 1) {
		while ($row = mysql_fetch_array($query))
        	 { 
			$img = "GE_Images_Ssa_3p6_Chr/".$row['gene_id'].".png";

			/* Prepare GBrowse link */
			$link = "http://salmonbase.org/cgi-bin/gb2/gbrowse/salmon_GBrowse_Chr_NCBI/?name=".$row['gene_id'];

			/* NCBI Gene Link */
			$ncbi_link = "http://www.ncbi.nlm.nih.gov/gene/?term=".$row['gene_symbol']; 

			echo "<div id=\"gene_expression_image\" >";
								
				echo "<div id=\"gene_expression_info\">";
					echo "<table id=\"gene_info_table\">";

                                                echo "<tr>";
                                                        echo "<td class=\"coloum_color\" style=\"color:white;background-color:#0080FF\">Gene ID</td>";
                                                        echo "<td><a href=".$link." target=\"_blank\">".$row['gene_id']."</a></td>";
                                                echo "</tr>";

                                                echo "<tr>";
                                                        echo "<td class=\"coloum_color\" style=\"color:white;background-color:#0080FF\">Gene Symbol</td>";
                                                        echo "<td> <a href=".$ncbi_link." target=\"_blank\">".$row['gene_symbol']."</a></td>";
                                                echo "</tr>";

                                                echo "<tr>";
                                                        echo "<td class=\"coloum_color\" style=\"color:white;background-color:#0080FF\">Chr No</td>";
                                                        echo "<td>".$row['chr_no']."</td>";
                                                echo "</tr>";

						echo "<tr>";
 							echo "<td class=\"coloum_color\" style=\"color:white;background-color:#0080FF\">Range</td>";
							echo "<td>".$row['start']."-".$row['end']."</td>";
						echo "</tr>";
						

					echo "</table>";   
				echo "</div>";

				echo "<img id=\"gene_expression_image_tag\" src=".$img." />";
			echo "</div>"; 
		 }
	}
      }
  else
     {
       echo "<div style=\"margin-left:350px;\"><h1>No data Found</h1> </div><br><br>";
     }
 }

mysql_close();

/* END OF Main Images DIV */ 
echo "</div>";

?>

<!-- Footer --> 
<div id="footer">Copyright © Salmobase.org</div>

<!--END of center div -->
<!-- /div -->

<!-- END OF MAIN DIV-->
</div>

</body>
</html>

<!--CSS CODE -->

<style type="text/css">

body {
	background-color:#214B96;
}

a{
	color:blue;
	text-decoration: none;
}

#maindiv {
	margin-left:auto;
	margin-right:auto;
	width:1100px;
	background-color:white;
	height:auto; 
}

tr.coloum_color {
	background-color:#0080FF;
}

#back_button {
	height:35px;
	width:170px;
	font-size:22px;
	margin-left:11px;
}

#menudiv {
	width:1200px;
	height:50px;
	background-color:#214B96;
	margin:auto;
	text-align:center;
}

#inner_menu_div {
	margin-left:auto;
	margin-right:auto;
}

#font_style_1 {
	font-size:15px;
	margin-left:25px;
}

#header {
	background-color: #FFFFFF;
	width: 1100px;
	height: 150px;
	text-align: center;
	margin-top:10px;
}

#coolMenu {
	text-color:#FFFFFF;
	font-weight:bold;
	font-size:40px;
	width:900px;
	text-align:center;
	margin-left:300px;
}

#images_main_div {
	height:auto; 
	width:900px;
	margin-left:auto;
	margin-right:auto; 
	border:1px solid; 
	border-color:#0080FF;
	margin-top:20px; 
}

#FPKM_text_div {
	height:50px;
	width:750px;
	margin-left:200px;
}

#gene_info_table {
	width:360px;
	border:1px solid; 	
	float:left;
	margin-left:0px; 
	margin-top:0px;
}

table, th, td {
    border: 1px solid black;
    border-collapse: separate;
}

th, td {
    padding: 15px;
    text-align: left;
}

th {
   font-size:40px
}

#gene_expression_info {
	height:502px;
	width:360px;
	border:2px solid;
	border-color:#0080FF;
	float:left; 
	margin-left:15px;
	margin-top:10px;
	border-right-width:0px; 
}

#gene_expression_image {
	height:528px;
	width:896px;
	border:2px solid; 
	border-color:#0080FF;
	float:right;
        border-bottom-width:0px;
	border-top-width:0px;
}

#gene_expression_image_tag {
	height:502px;
	margin-top:10px;
	border: 2px solid #0080FF;
}

#SNP_searc {
	margin-left:auto;
}

#SNP_search_box {
	width:600px;
	height:30px;
	margin-left:250px; 
	margin-top:0px; 
	border-width:2px;
	border-color:#0080FF;
}

#SNP_search_button {
	height:30px;
	width:100px;
	-webkit-appearance: button;
}

#SNP_table_33 {
	width:1300px; 
	margin-left:100px;
	margin-top:40px; 
}

#donutchart {
	height:308px;
	width:400px; 
	float:right;
	margin-top:0px; 
	margin-right:575px;
}

#chart_div {
	height:350px;
	width:450px;
	float:left;
	margin-left:53px;
}

#top_x_div {
	height:350px;
	width:450px;
	float:right;
	margin-right:55px;
	margin-top:-315px;
}


#N_SNP_table {
	width:400px;
}

#centerdiv {
	margin-left:auto;
	margin-right:auto;
}

#SBsearch {
	width:250px;
}

#gene_search_legend {
	font-size:20px;
	font-weight:bold;
}

#footer {
	background-color: #FFFFFF;
	clear: both;
	text-align:center ;
	width: 1100px;
	margin-left:auto;
	margin-right:auto;
}

#SB {
	color:#214B96;
	font-weight:bold;
	font-size:70px;
}

#about {
	font-size:20px;
	width:700px;
	margin-left:230px;
	margin-top:50px;
}

center	{
	margin-left:auto
	margin-right:auto
}

ul {
	list-style-type:none;
	margin:0;
	padding:0;
	font-size:25px; 
}

li {
	display:inline;
	margin-top:5px;
}

li {
	float:left;
}

#download_seq_text {
	margin-left:100px;
	margin-top:10px;	
	font-size:20px;
}

#download_button{
	height:80px;
	width:120px; 
	margin-left:100px;
	font-size:30px;
	font-weight: bold;
}

#home,#blast_search,#gbrowse,#resource,#news {
	display:block;
	width:180px;
	color:#FFFFFF;
}
</style>
