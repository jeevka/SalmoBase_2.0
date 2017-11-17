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
		<?php 
		$action=$_REQUEST['action']; 
		if ($action=="")    /* display the contact form */
		    {
		    ?>
		    	<form  id="message_form" action="" method="POST" enctype="multipart/form-data">  
			    <input type="hidden" name="action" value="submit">
			    Your name:<br>
			    <input name="name" type="text" value="" size="60"/><br> <br> 
		    	    Your email address:<br>
			    <input name="email" type="text" value="" size="60"/><br><br>  
		    	    Your message:<br>
		    	    <textarea name="message" rows="7" cols="60"></textarea><br> <br>  
   		    	    <div class="g-recaptcha" data-sitekey="6LdQui4UAAAAAA8tO-itHRlsLeXNUkZNMrhwLZWt"></div><br> 
		    	    <input type="submit" value="Send email"/>
		        </form>

		    <?php
		    }
		else                /* send the submitted data */
		    {
        		$email;$message;$captcha;
		        if(isset($_POST['email']))
		        $email=$_POST['email'];
		        if(isset($_POST['message']))
		          $comment=$_POST['message'];
		        if(isset($_POST['g-recaptcha-response']))
		          $captcha=$_POST['g-recaptcha-response'];

		        if(!$captcha)
			{
		          	echo '<h3>Please check the the captcha form.</h3>';
		          	exit;
			}
		        $response=json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LdQui4UAAAAACDcvlttelsbU6NY8lIZu3NZXM_J&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']), true);
	        	if($response['success'] == false)
        		{
		          	echo '<h2>You are spammer ! </h2>';
        		}
		        else
        		{
				$name=$_REQUEST['name'];
                        	$email=$_REQUEST['email'];
                        	$message=$_REQUEST['message'];
                		$from="From: $name<$email>\r\nReturn-path: $email";
	                	$receipnt="jeevan.karloss@nmbu.no,salmobase-support@nmbu.no";
                		$subject="SalmoBase: contact form";
	                	mail($receipnt, $subject, $message, $from);
                		echo "<h3>Thank you.<br> We have now received your mail and will get back to you as soon as possible</h3><br>";
        		}	
                }
		?>
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
