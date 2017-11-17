<!DOCTYPE html>
<html lang="en">
  <head>
    <title>SalmoBase</title>
	<!-- Javascript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <!--Internal Javascript -->
	<script src="scripts.js"></script>
    <!--The Bootstrap CSS  -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <!-- Internal CSS file -->
    <link rel="stylesheet" type="text/css" href="salmonbase.css" />
    <link rel="stylesheet" type="text/css" href="salmonbase_snp.css" />    
    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
    <!-- DataTables CSS internet-->
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.9/css/jquery.dataTables.min.css" />
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.8/js/jquery.dataTables.min.js"></script>
  </head>
	<div class="container-fluid header-image">
	 <div class="row">
	  <div class="col-lg-12"><h2 id="logo">Salmo<span id="split_text">Base</span> <small>- Integrated molecular resource for Salmonid species</small></h2>
	</div></div></div> 
	
  <body>
  <div class="container-fluid">
    <div class = "row">
      <nav class ="navbar navbar-default col-lg-12 main_body" >
		

             <div class="collapse navbar-collapse" id="navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="index.php">Home</a></li>
                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Species <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li class="dropdown dropdown-submenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Atlantic Salmon</a>
                                <ul class="dropdown-menu">
                                        <li><a href="gbr.html">GBrowse </a></li>
					<li><a href="/JBrowse-1.12.3/index.html">JBrowse </a></li>
                                       <li onclick="choose_blast_db(\"ASB_BLAST\");">
                                                <a  href="blast.html?DB=ASB_BLAST">BLAST
                                                        <input type="hidden" id="ASB_BLAST" name="blast" value="ASB_BLAST"><br>
                                                </a>
                                        </li>
                                        <li onclick="choose_blast_db(\"ASB_ncRNA\")">
                                                <a href="blast.html?DB=ASB_ncRNA">ncRNA BLAST
                                                <input type="hidden" id="ASB_ncRNA" name="blast" value="ASB_ncRNA"><br>
                                                </a>
                                        </li>
                                        <!--li><a href="blast.html">BLAST </a></li-->
                                        <li><a href="snp.php">GV Browser</a></li>
                                        <li><a href="geb.php">GE Browser</a></li>
                                </ul>
                            </li>
                            <li class="dropdown dropdown-submenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Rainbow Trout</a>
                                <ul class="dropdown-menu">
                                        <li><a href="gbr_RT.html">GBrowse </a></li>
					<li><a href="/JBrowse-1.12.3/index.html?data=rainbow_trout_ncbi" target="_blank" >JBrowse </a></li>
                                        <li onclick="choose_blast_db(\"RT_BLAST\")">
                                                <a href="blast.html?DB=RTB">BLAST
                                                <input type="hidden" id="RT" name="blast" value="RT_BLAST"><br>
                                                </a>
                                        </li>
                                        <li onclick="choose_blast_db(\"RT_ncRNA\")">
                                                <a value="RTB_ncRNA" href="blast.html?DB=RTB_ncRNA">ncRNA BLAST
                                                <input type="hidden" id="RT" name="blast" value="RT_BLAST"><br>
                                                </a>
                                        </li>
					<!--li><a href="blast_RT.html">BLAST </a></li-->
                                </ul>
                            </li>
                        </ul>
                    </li>

                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Related Projects <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                          <li><a href="https://www.nmbu.no/forskning/tema/mat/prosjekter/node/19676" target="_blank">GenoSysFat</a></li>
                          <li><a href="https://www.nmbu.no/prosjekter/digisal" target="_blank">DigiSal</a></li>
                          <li><a href="https://licebase.org/" target="_blank">LiceBase</a></li>
                        </ul>
                    </li>
                <li><a href="download.html">Download</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="contact.php">Contact</a></li>
		<li><a href="newsletter.php">Release Updates</a></li>
                </ul>
            </div><!-- /.navbar-collapse -->



		<!--ul class="nav navbar-nav" >
		  <li class="active"><a href="index.php">Home</a></li>
		  <li class="dropdown">
		   <a class="dropdown-toggle" data-toggle="dropdown" href="#">Tools
			<span class="caret"></span></a>
			<ul class="dropdown-menu">
			  <li><a href="gbr.html">GBrowse </a></li>
			  <li><a href="blast.html">BLAST </a></li>
			  <li><a href="snp.php">GV Browser</a></li>
			  <li><a href="geb.php">GE Browser</a></li>
			</ul>
		  </li>
		  <li class="dropdown">
		   <a class="dropdown-toggle" data-toggle="dropdown" href="#">Related Projects
		   <span class="caret"></span></a>
			 <ul class="dropdown-menu">
			  <li><a href="https://www.nmbu.no/forskning/tema/mat/prosjekter/node/19676" target="_blank">GenoSysFat</a></li>
			  <li><a href="https://www.nmbu.no/prosjekter/digisal" target="_blank">DigiSal</a></li>
			  <li><a href="https://licebase.org/" target="_blank">LiceBase</a></li>
			 </ul>
		  </li>
			<li><a href="download.html">Download</a></li>
			<li><a href="about.html">About</a></li>
			<li><a href="contact.php">Contact</a></li>
		  </ul-->
	  </nav>
	</div>
  </div>
    
	  <div class="container-fluid" style="height:100%;background-color:white;">
		
	  <div class="row">	
		<h1 class="col-lg-offset-4">Salmon GVBrowser</h1> <br>
		<div class="col-lg-6 col-lg-offset-3">
			
		<div id="SNP_search">
			<form action="" method="post">
				<input name="search" id="SNP_search_box" type="search" autofocus>
				<input type="submit" name="button" id="SNP_search_button" >
			</form>
		</div>
		<div id="about"> Salmon GVBrowser let you search for genetic variations in 
					 available Salmon genome. You can search by area (e.g. ssa29:1-1000000) or gene 
					 name (e.g. ttn).
		</div>
		</div> 
	</div> 
	
<?php

/* Color codes for location of the SNPs  */
$colours = array( "Intergenic" => "#3498DB", "Intron Variant" => "green", "3 Prime UTR" => "brown","5 Prime UTR" => "grey","Exon Variant" =>"red","Upstream Gene Variant" => "#DC7633","Downstream Gene Variant" => "#DC7633");


$servername = "db-01.orion.nmbu.no";
$username = "jeevka";
$password = "gbrowse01ok";

// Create connection
$conn = mysqli_connect($servername, $username, $password);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

//echo "Connected successfully";

$con=mysql_connect('db-01.orion.nmbu.no', 'jeevka', 'gbrowse01ok');
$db=mysql_select_db('salmon_genetic_variations_test');

if(isset($_POST['button'])){    //trigger button click

  $search=$_POST['search'];
  list($chr, $pos) = explode(":",$search);
  list($pos1, $pos2) = explode("-",$pos);
  #echo $pos; 
  #echo $chr; 
  #echo "<br>";
  $pos1 = intval($pos1);
  $pos2 = intval($pos2);
  #echo $pos1; 
  #echo "<br>";
  #echo $pos2; 
  #echo "<br><br>";
  /* Prepare GBrowse link */
  $link = "http://salmonbase.org/cgi-bin/gb2/gbrowse/salmon_GBrowse_Chr_NCBI/?name=".$chr.":".$pos1."..".$pos2;
  echo "<div style=\"margin-left:25px;font-size:20px;\"> <a href=".$link." target=\"_blank\"> Browse this region in GBrowse</a> </div>";

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
             <tr style=\"font-size:20px;background-color:#3C6478;color:white;\">
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
<!--end of container fluid -->
</div> 

	
			</div>
		</div>
	</div>
	
  </div> <!-- Container Ends -->



        <div class="container-fluid">
                <div class = "row">
                        <footer class ="col-lg-12 footer_center">
                                <p>Copyright @ Salmobase 2016</p>
                        </footer>
                </div>
        </div>  
  </body>

</html>
