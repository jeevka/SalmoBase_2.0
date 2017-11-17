
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
<font id="SB">S a l m o GVBrowser</font>
</div>

<!--center div -->
<!--div id=centerdiv-->

<div id="SNP_search"> 
	<form action="" method="post">
		  <input name="search" id="SNP_search_box" type="search" autofocus>
                  <input type="submit" name="button" id="SNP_search_button" >
	</form>
</div> 


<div id="about"> Salmon GVBrowser let you search for genetic variations in available Salmon genome. You can search by area (e.g. ssa29:1-1000000) or gene name (e.g. ttn).</div>

<?php

/* Color codes for location of the SNPs  */
$colours = array( "Intergenic" => "#3498DB", "Intron Variant" => "green", "3 Prime UTR" => "brown","5 Prime UTR" => "grey","Exon Variant" =>"red","Upstream Gene Variant" => "#DC7633","Downstream Gene Variant" => "#DC7633"); 


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
$db=mysql_select_db('salmon_genetic_variations_test');

if(isset($_POST['button'])){    //trigger button click

  $search=$_POST['search'];
  list($chr, $pos) = explode(":",$search);
  list($pos1, $pos2) = explode("-",$pos);
  $pos1 = intval($pos1);
  $pos2 = intval($pos2);
  echo $pos1;
  echo "<br>";
  echo $pos2; 
  /* Prepare GBrowse link */
  $link = "http://salmonbase.org/cgi-bin/gb2/gbrowse/salmon_GBrowse_Chr_NCBI/?name=".$chr.":".$pos1."..".$pos2;
  echo "<div style=\"margin-left:100px;font-size:20px;\"> <a href=".$link." target=\"_blank\"> Browse this region in GBrowse</a> </div>"; 

  #$query=mysql_query("select * from Salmon_Variations_Test where Chr = $chr and (Position >= $pos1 or Position <= $pos2);

  /* Search Genomic Range */ 
  if (preg_match('/ssa/',$search)) { 
  	$query=mysql_query("select * from Salmon_Variations_060516 where Chr like '$chr' and (Position >= $pos1 and Position <= $pos2)");
  }
  else {
        /* Search Gene names */
	$query=mysql_query("select * from Salmon_Variations_060516 where Gene like '$search'");
  }	

  $n_snps = mysql_num_rows($query);  
  
   /*Summary Table */
  if (mysql_num_rows($query) > 0)
  {
       $N_NS = 0; $N_S = 0;
       while ($row = mysql_fetch_array($query))
         {
          if ($row['Kind'] == "Non-synonymous"){
                        $N_NS++;
            }
           else if ($row['Kind'] == "Synonymous"){
                        $N_S++;
            }
         }

  	/*echo "<table id=\"N_SNP_table\">";
	echo "<tr style=\"font-size:20px;background-color:#2E64FE;color:white;\"><td>Genetic Variations</td> <td>Number</td>  </tr>";
	echo "<tr><td> Total  </td> <td>".$n_snps."</td>  </tr>";
	echo "<tr><td> Non-synonymous  </td> <td>".$N_NS."</td>  </tr>";
	echo "<tr><td> Synonymous  </td> <td>".$N_S."</td>  </tr>";
	echo "</table>";
        echo "<div id=\"chart_div\"></div>"; */
  }
   
  /* Reset the mysql pointer */ 
  mysql_data_seek($query,0); 

  /* Main table */
  if (mysql_num_rows($query) > 0)
  {
	echo "<table id=\"SNP_table\">
	     <tr style=\"font-size:20px;background-color:#2E64FE;color:white;\">
     	     <td><b>SNP ID</td>
             <td><b>Salmon</td>
             <td><b>Type</td>
             <td><b>Chromosome</td>
             <td><b>Position</td>
             <td><b>Allele</td>
             <td><b>Annotation</td>
             <td><b>Gene Name</td>
	     <td><b>SNP Location</td>
             <td><b>AA Change</td>
             </tr>";
     $n = 0;
     while ($row = mysql_fetch_array($query))
         {
           $n++; 
           /* Prepare GBrowse link */
           $start = $row['Position'] - 5000; 
           $end =  $row['Position'] + 5000;
           $link = "http://salmonbase.org/cgi-bin/gb2/gbrowse/salmon_GBrowse_Chr_NCBI/?name=".$chr.":".$start."..".$end; 
	   list($aa1,$aa2) = explode("->",$row['AA_Change']);
	   $SNP_Location = str_replace(" ","-",$row['SNP_Location']);
	   
	   /* Preparing link for sending data to next page */ 
	   if ($row['Kind'] == "Non-Synonymous"){	
			$link = "http://salmonbase.org/cgi-bin/snp_info.php?snp_id=".$row['SNP_ID']."&chr=".$row['Chr']."&pos=".$row['Position']."&annot=".$row['Kind']."&location=".$SNP_Location."&aa_change=".$aa1."-&#62;".$aa2."&allele=".$row['Allele'];
		}
	    else {
	   		$link = "http://salmonbase.org/cgi-bin/snp_info.php?snp_id=".$row['SNP_ID']."&chr=".$row['Chr']."&pos=".$row['Position']."&annot=".$row['Kind']."&location=".$SNP_Location."&aa_change=---"."&allele=".$row['Allele'];
		}

            /* Colors for diffent types of mutations */
           if ($row['Kind'] == "Non-Synonymous"){
   			$colour = "red";
              }
	   else if ($row['Kind'] == "Synonymous"){
			$colour = "green";
              }
           else{
                        $colour = "black"; 
	     }

	  

	  echo "<form action=\"SNP_Flank_Download.php\" method=\"post\">";
		/* <input type="checkbox" name="vehicle" value="Bike">I have a bike<br>
		<input type="checkbox" name="vehicle" value="Car">I have a car */
	  $snp_pos = $row['Chr'].":".$row['Position']; 
          echo "<tr>
                         <td>
                           <input type=\"checkbox\" name=\"check_list[".$n."]\" value=".$snp_pos."> 
                           <a href=".$link." target=\"_blank\">".$row['SNP_ID']."</a> 
                         </td> 
                         <td>".$row['salmon']."</td>
                         <td>".$row['Type']."</td>
                         <td>".$row['Chr']."</td>
                         <td>".$row['Position']."</td>
                         <td>".$row['Allele']."</td>
                         <td style=\"color:".$colour.";\">".$row['Kind']."</td>
			 <td>".$row['Gene']."</td>
                         <td style=\"color:".$colours[$row['SNP_Location']].";\">".$row['SNP_Location']."</td>
                         <td>".$row['AA_Change']."</td>
                 </tr>";
         }
       echo "</table>";
       echo "<div id=\"download_seq_text\">Select the genetic variations and click the <b>Download</b> button to download flanking sequences for the selected genetic variations.</div>";
       echo "<input id=\"download_button\" type=\"submit\" value=\"Download\">"; 
       echo "</form>";
  }
  else
     {
       echo "<div id=\"no_data_div\" ><h1>No data Found</h1> </div><br><br>";
     }
 }

mysql_close();
?>

<!-- Footer -->
<br>
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
}

#maindiv {
	margin-left:auto;
	margin-right:auto;
	width:1500px;
	background-color:white;
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
	width: 1411px;
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

#SNP_search {
	margin-left:auto;
}

#SNP_search_box {
	width:600px;
	height:30px;
	margin-left:380px; 
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

#no_data_div {
	margin-left:587px; 
}

#N_SNP_table {
	width:400px;
}

table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}

th, td {
    padding: 15px;
    text-align: left;
}

th {
   font-size:40px
}

table#t01 th	{
    background-color: black;
    color: white;
}

table {
        width:1325px;
        margin-left:auto;
	margin-right:auto;
        margin-top:40px;	
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
	width: 1410px;
}

#SB {
	color:#214B96;
	font-weight:bold;
	font-size:70px;
}

#about {
	font-size:20px;
	width:700px;
	margin-left:380px;
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
	-webkit-appearance: button;
	height:30px;
	width:120px; 
	margin-left:100px;
	font-size:12px;
	font-weight: bold;
}

#home,#blast_search,#gbrowse,#resource,#news {
	display:block;
	width:180px;
	color:#FFFFFF;
}
</style>
