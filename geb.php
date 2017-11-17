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
    <link rel="stylesheet" type="text/css" href="salmonbase_geb.css" />
    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
    <!-- DataTables CSS internet-->
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.9/css/jquery.dataTables.min.css" />
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.8/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
  </head>
	<div class="container-fluid header-image">
	 <div class="row">
	  <div class="col-lg-12"><h2 id="logo">Salmo<span id="split_text">Base</span> <small>- Integrated molecular resource for Salmonid species</small></h2>
	</div></div></div> 
	
  <body>
  <div class="container-fluid">
    <div class = "row">
      <nav class ="navbar navbar-default col-lg-12" >
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
             <h1 class="col-lg-offset-4">Salmon GEBrowser</h1> <br>
             <div class="col-lg-7 col-lg-offset-3">
					
		<div id="SNP_search">
		<form action="" method="post">
			 <input name="search" id="SNP_search_box" type="search" autofocus>
			   <input type="submit" name="button" id="SNP_search_button" >
		</form>
		</div>

		<div id="about">Salmon GEBrowser let you search for gene expression data available
				for Atlantic Salmon. You can search by area (e.g. ssa29:1-1000000) 
				or gene name (e.g. atrn, rpia).
                </div>

		<div id="FPKM_text_div">
        		<p>FKPM values are calculated from publically available RNAseq data generated from a single double-haploid female Atlantic salmon (Salmo salar).
           		FPKM stands for "Fragments Per Kilobase Of Exon Per Million Fragments Mapped".</p>
		</div>
		
             </div> 
	</div> <!--end of row --> 
<!--/div--> <!--End of Fluid --> 

<?php

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
$db1=mysql_select_db('salmon_gene_expression');

// Connecting Gene Expression database for plotly plots
//$db2=mysql_select_db('salmon_gene_expression_plots');

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

  #var_dump($query); 
  #echo "<br>"; 
 
  // Connecting Gene Expression database for plotly plots
  $db2=mysql_select_db('salmon_gene_expression_plots');
  
  # Plot Count 
  $n_plots = 0; 
  
  /* Main table */
  if (mysql_num_rows($query) > 0){
  	if (mysql_num_rows($query) > 1) {
		while ($row = mysql_fetch_array($query))
        	 {
			#$img = "GE_Images_Ssa_3p6_Chr/".$row['gene_id'].".png";
                        #var_dump($row); 
			#echo "<br>";
                        // Searching the database for gene expression data
			$search=$row['gene_id'];
                        
                        ++$n_plots;
			$query_2=mysql_query("select * from sally_gene_expression_data where gene_id like '$search'");
                        
			$rows = array();
			$x = array();
			$y = array();
			while ($query_result = mysql_fetch_array($query_2)){
				$x[] = $query_result['tissue'];
				$y[] = floatval($query_result['fpkm']); 
			}
			
			$data = Array();
			$temp = Array();
			$data["x"] = $x;
			$data["y"] = $y;
			$data['type'] = "bar";
			$data['marker'] = Array("color" => Array('rgba(0,84,105,1)','rgba(206,0,0,2)','rgba(247,92,3,3)','rgba(255,153,0,4)','rgba(241,196,15,5)','rgba(172,81,232,6)','rgba(24,145,224,7)','rgba(135,191,70,8)','rgba(235,56,56,9)'));                        
                         	 
			/* Prepare GBrowse link */
			$link = "http://salmonbase.org/cgi-bin/gb2/gbrowse/salmon_GBrowse_Chr_NCBI/?name=".$row['gene_id'];

			/* NCBI Gene Link */
			$ncbi_link = "http://www.ncbi.nlm.nih.gov/gene/?term=".$row['gene_symbol'];

			echo "<div id=\"gene_expression_image\" >";
                        $new_id = "gene_expression_plot_"."$n_plots";
                        #echo $new_id; 
			#echo "<br>"; 

			echo "<div class=\"container-fluid\" style=\"border:solid 0px;\">";
	  		echo "<div class=\"row\">";
			echo "<div id=\"gene_expression_plot_info\" class=\"col-sm-4\"  style=\"border:solid 3px;\" >";
                        echo "<table id=\"gene_info_table_new\">";

                                               echo "<tr>";
                                                       echo "<td class=\"coloum_color\" style=\"color:white;background-color:#3C6478\">Gene ID</td>";
                                                       echo "<td><a href=".$link." target=\"_blank\">".$row['gene_id']."</a></td>";
                                                echo "</tr>";

                                                echo "<tr>";
                                                        echo "<td class=\"coloum_color\" style=\"color:white;background-color:#3C6478\">Gene Symbol</td>";
                                                        echo "<td> <a href=".$ncbi_link." target=\"_blank\">".$row['gene_symbol']."</a></td>";
                                                echo "</tr>";

                                                echo "<tr>";
                                                        echo "<td class=\"coloum_color\" style=\"color:white;background-color:#3C6478\">Chr No</td>";
                                                        echo "<td>".$row['chr_no']."</td>";
                                                echo "</tr>";

                                                echo "<tr>";
                                                        echo "<td class=\"coloum_color\" style=\"color:white;background-color:#3C6478\">Range</td>";
                                                        echo "<td>".$row['start']."-".$row['end']."</td>";
                                                echo "</tr>";
				echo "</table>";

			echo "</div>"; 
			echo		"<div id=\"".$new_id."\" class=\"col-sm-8\" style=\"border:solid 3px;\"></div>";
			echo	"</div>";
			echo "</div>";
			echo "<br>"; 

			/*	echo "<div id=\"gene_expression_info\">";
					echo "<table id=\"gene_info_table\">";

                                               echo "<tr>";
                                                       echo "<td class=\"coloum_color\" style=\"color:white;background-color:#3C6478\">Gene ID</td>";
                                                       echo "<td><a href=".$link." target=\"_blank\">".$row['gene_id']."</a></td>";
                                                echo "</tr>";

                                                echo "<tr>";
                                                        echo "<td class=\"coloum_color\" style=\"color:white;background-color:#3C6478\">Gene Symbol</td>";
                                                        echo "<td> <a href=".$ncbi_link." target=\"_blank\">".$row['gene_symbol']."</a></td>";
                                                echo "</tr>";

                                                echo "<tr>";
                                                        echo "<td class=\"coloum_color\" style=\"color:white;background-color:#3C6478\">Chr No</td>";
                                                        echo "<td>".$row['chr_no']."</td>";
                                                echo "</tr>";

						echo "<tr>";
 							echo "<td class=\"coloum_color\" style=\"color:white;background-color:#3C6478\">Range</td>";
							echo "<td>".$row['start']."-".$row['end']."</td>";
						echo "</tr>";


					echo "</table>";
				echo "</div>";
                                */ 

				#echo "<div id=\"gene_expression_image_tag\">";
				#var_dump($data); 
                                echo "<script>
				       var layout = {barmoe: 'stack',
				       xaxis: {autorange: 'reversed'}};

					var layout = {
						xaxis: {title: 'Tissue samples'},
						yaxis: {title: 'FPKM Values'},
						barmode: 'relative',
						height:600,
						width:645,
						font: {
						    family: 'Courier New, monospace',
						    size: 18,
						    color: '#000000'
						     }
						};
                        	        var data1 = Array(".json_encode($data).");
					
					Plotly.newPlot('".$new_id."', data1,layout);
			  	</script>";  
                               #echo "</div>";
				#Plotly.newPlot('gene_expression_image_tag', data1,layout); 
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
</div> <!--end of fluid -->


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
