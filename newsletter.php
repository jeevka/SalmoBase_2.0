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
    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
    <!-- DataTables CSS internet-->
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.9/css/jquery.dataTables.min.css" />
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.8/js/jquery.dataTables.min.js"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>
  </head>
 	<div class="container-fluid header-image">
	 <div class="row">
	  <div class="col-lg-12"><h2 id="logo">Salmo<span id="split_text">Base</span> <small>- Integrated molecular resource for Salmonid species</small></h2>
	</div></div></div> 
	
  <body>
  <div class="container-fluid" >
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
                         <li class="dropdown dropdown-submenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Coho Salmon</a>
                                <ul class="dropdown-menu">
                                        <li><a href="gbr_SS.html">GBrowse </a></li>
                                        <li><a href="JBrowse-1.12.3/index.html?data=coho_salmon" target="_blank" >JBrowse </a></li>
                                        <li onclick="choose_blast_db(\"SS_BLAST\")">
                                                <a href="blast.html?DB=SSB">BLAST
                                                <input type="hidden" id="SS" name="blast" value="SS_BLAST"><br>
                                                </a>
                                        </li>
                                        <li onclick="choose_blast_db(\"SS_ncRNA\")">
                                                <a value="SSB_ncRNA" href="blast.html?DB=SSB_ncRNA">ncRNA BLAST
                                                <input type="hidden" id="SS" name="blast" value="SS_BLAST"><br>
                                                </a>
                                        </li>
                                        <!--li><a href="blast_RT.html">BLAST </a></li-->
                                </ul>
                            </li>

                           <li class="dropdown dropdown-submenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Salmonids</a>
                                <ul class="dropdown-menu">
                                        <li><a href="blast_cg.html">BLAST</a></li>
                                </ul>
                            </li>

                        </ul>
                    </li>

                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Related Projects <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                                <li class="dropdown dropdown-submenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown">GenoSysFat</a>
                                    <ul class="dropdown-menu">
                                        <li><a href="https://www.nmbu.no/forskning/tema/mat/prosjekter/node/19676" target="_blank">About</a></li>
                                        <li><a href="http://salmobase.org/shiny/02/garethg/shiny-salmon/" target="_blank">Gene Expression Atlas</a></li>
                                    </ul>
                                </li>
                          <!--li><a href="https://www.nmbu.no/forskning/tema/mat/prosjekter/node/19676" target="_blank">GenoSysFat</a></li-->
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

	  </nav>
	</div>
  </div>


    
  <div class="container-fluid">
	<div class="row">	
		<!--div class="col-lg-12" style="height:1200px;">
			<iframe id="gb_iframe" style="height:100%;width:100%;border-style:none;" src="http://10.209.0.204/cgi-bin/gb2/gbrowse/salmon_GBrowse_Chr_NCBI/?name=CIGSSA_002010"> </iframe>
		</div-->

          <div id="main_div" class="col-lg-8" >

		<h3>Release updates</h3> <br> 
		<div id="releasenotes">
			<div class="release">
                                <div class="inner_release">
                                        Date: 01.Nov.2017 <br>
                                        Atlantic Salmon (<i>Salmo salar</i>) Gene Expression atlas is added. 
                                </div>
                                <hr>
                        </div>
                        <div class="release">
                                <div class="inner_release">
                                        Date: 06.Oct.2017 <br>
                                        RefSeq annotated Coho salmon (<i>Oncorhynchus kisutch</i>) Okis_V1 genomic data is added to GBrowse, JBrowse and BLAST databases.
                                </div>
                                <hr>
                        </div>			
			<div class="release">
				<div class="inner_release"> 
					Date: 06.Sep.2017 <br> 
					RefSeq annotated long non-coding RNA BLAST databases were added for Atlantic Salmon (<i>Salmo Salar</i>) ICSASG_v2 and Rainbow Trout (<i>Oncorhynchus mykiss</i>) Omyk_1.0. 
				</div> 
				<hr>			
			</div> 
			<br> 
			<div class="release">
				<div class="inner_release">
	                                Date: 01.Sep.2017<br>
        	                        RefSeq annotations for Rainbow trout (<i>Oncorhynchus mykiss</i>) Omyk_1.0 is added to GBrowse and JBrowse.
				</div> 
			<hr> 
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
