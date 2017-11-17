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
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-51608817-1', 'salmobase.org');
  ga('send', 'pageview');

</script>

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
					<li><a href="/JBrowse-1.12.3/index.html" target="_blank" >JBrowse </a></li>
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


    
  <div class="container-fluid ">
	<div class="row">	
		<div class="main_text col-lg-6 main_body">
			<h3>SalmoBase</h3>
			<p>The Atlantic salmon (Salmo salar) is arguably one of the most iconic and well-studied salmonid species, 
			with great societal, economic, and ecological importance. Its mammalian sized genome has undergone extensive 
			restructuring since a whole genome duplication event ~80 million years ago, which creates opportunities to explore 
			the evolutionary process of rediploidization. Today, a genome assembly is publically available 
			<a href="http://www.nature.com/nature/journal/vaop/ncurrent/full/nature17164.html" target="_blank"> (Lien et al. 2016) </a>, 
			wherein 9447 scaffolds (N50 = 3.18Mb) are ordered into 29 chromosome files. On the SalmoBase pages you will find a 
			GBrowse interface for exploring the chromosome sequence. Using public RNAseq data we have performed an annotation 
			and identified 37,000 high confidence protein coding genes, wherein almost half show splice variants. 
			BLAST functionality is included as are links to expression levels, gene and SNP information.</p>
		</div>
		
		<div class="col-lg-5 col-lg-offset-1">
			<div style="position:relative;">
				<figure>
				<a href="http://biorxiv.org/content/early/2016/12/20/095737"><img id="salgene_tree" style="position:relative;" src ="SalGENE_fishtree_final_1.jpg" alt="Salgene"></a>
				<a href="#"> <img class="effectfront coho_salmon" src ="images/coho_salmon.png" width="52px" height="21px"></a>
				<a href="#"> <img class="effectfront artic_char" src ="images/rainbow_trout_1.png" width="44px" height="16px"></a>
				<a href="#"> <img class="effectfront atlantic_salmon" src ="images/Atlantic_salmon_1.png" width="64px" height="26px" alt="atlantic salmon"></a>
				<a href="#"> <img class="effectfront brown_trout" src ="images/Atlantic_salmon_1.png" width="60px" height="24px" alt="brown_trout"></a>
				<a href="#"> <img class="effectfront rainbow_trout" src ="images/rainbow_trout_1.png" width="50px" height="23px"></a>
				<a href="#"> <img class="effectfront danube_salmon" src ="images/Danube_salmon.png" width="48px" height="21px"></a>
				<a href="#"> <img class="effectfront european_grayling" src ="images/european_grayling.png" width="54px" height="23px"></a>
				<a href="#"> <img class="effectfront lakewhite" src ="images/Lakewhite.png" width="52px" height="23px"></a>
				<a href="#"> <img class="effectfront northenpike" src ="images/northenpike.png" width="52px" height="23px"></a>
				</figure>
			</div>
			<p style="padding-top:5px;">Phylogenetic tree of [major] or [culturally and economically important] lineages of salmonids. Timing of evolution of anadromous behaviour is indicated,
			although anadromy in white fish is not likely to involve extensive stays in marine environments.</p>
		</div>
	</div> <!-- Row Ends -->
	<div class="row">
		<div class="main_text col-lg-6 main_body">
		<h3>The Sequencing Project</h3>
		<p> The International Cooperation to Sequence the Atlantic Salmon Genome (ICSASG) have sequenced the 
		    Atlantic salmon genome in a collaboration between researchers in Canada, Chile and Norway. 
		    Funds have been provided from the 
		    <a href="http://www.forskningsradet.no/en/Home+page/1177315753906" target="_blank"> Research Council of Norway </a>,
		    <a href="http://www.fhf.no/hot-topics/about-fhf/" target="_blank"> the Norwegian Fishery and Aquaculture Industry Research Fund </a>, 
		    <a href="http://www.genomebc.ca/" target="_blank">Genome British Columbia </a>, 
		    <a href="http://www.english.corfo.cl" target="_blank">the Chilean Economic Development Agency and the InnovaChile Committee </a>. 
		    Commercial partners are <a href="http://www.marineharvest.com/" target="_blank">Marine Harvest </a>,<a href="http://aquagen.no/en/" target="_blank"> AquaGen</a>, <a href="http://www.cermaq.com/" target="_target">Cermaq</a> and 
		    <a href="http://www.salmobreed.no/en/" target="_blank">Salmobreed </a>.</p>
		
		<h3>ELIXIR.NO Project</h3>
		<p>This website is developed and hosted as a part of the national infrastructure project 
		<a href="www.bioinfo.no" target="_blank">ELIXIR.NO</a>, by researchers at <a href="http://cigene.no/" target="_blank">
		Centre for Integrative Genetics (CIGENE), Department of Animal and Aquacultural Sciences</a>, <a href="http://velkommen.nmbu.no/" target="_blank">
		Norwegian University of Life Sciences</a>. It presents both the latest 
		<a href="/cgi-bin/gb2/gbrowse/salmon_GBrowse_Chr_NCBI/" target="_blank"><i>S. salar</i> assembly</a> 
		and includes various metadata such as gene content.</p>

		</div>
			<div class="col-lg-4 col-lg-offset-1">
			<a href="">
			<div style="padding-left:50px;"><img id="salmon-circle" src ="salmon_circos.jpg" alt="Salmon_circos" width="350px" height="350px">
			</a></div>
			<!-- <div class="col-lg-4 col-lg-offset-1"> -->
			<p style="padding-top:5px;">Homeologous regions in the Atlantic salmon genome subdivided into 98 collinear blocks along the 29 salmon chromosomes.
			Source: <a href="http://www.nature.com/nature/journal/v533/n7602/full/nature17164.html">Nature 2016 doi:10.1038/nature17164</a></p>
			<!-- </div> -->
		</div>	
	
                <div class="col-lg-12 main_body main_text">
                        <h3>Citing SalmoBase</h3>
                        <p style="font-size:18px;"><b>SalmoBase: an integrated molecular data resource for Salmonid species.</b> Jeevan Karloss Antony Samy, Teshome Dagne Mulugeta, Torfinn Nome, Simen Rød Sandve, Fabian Grammes, Matthew Peter Kent, Sigbjørn Lien and Dag Inge Våge. <a href="https://bmcgenomics.biomedcentral.com/articles/10.1186/s12864-017-3877-1" target="_blank">BMC Genomics 2017 18:482</a></p>
                </div>

	</div>
	<div class="row" style="padding-top:40px;">
		<div class="col-lg-12 bottom_pics">
			<div class="col-lg-4" style="padding-left:25px;"><a href="http://www.bioinfo.no/elixir"><img id="exlixir" src="exlixir.png" alt="exlixir" height="100x" width="144px"></a></div>
			<div class="col-lg-4" style="position:relative;left:40px;"><a href="https://cigene.no/"><img id="cigene" src="CIGENE.png" alt="cigene" height="100px" width="199px"></a></div>
			<div class="col-lg-4" style="position:relative;left:90px;"><a href="https://www.nmbu.no/"><img id="nmbu" src="NMBU.png" alt="nmub" height="100px" width="auto"></a></div>
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
