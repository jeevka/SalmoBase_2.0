<!doctype html>
<html lang=''>
<head>
   <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="styles_contact.css">
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>
   <title>Salmobase</title>
</head>
<body onload="startTime();" >

<!-- Main DIV --> 
<div id="main_div">

<div id="salmobase_title_text"> 
	<font id="SB"> SalmoBase</font>
	<div id="title_inner_text"> <font id="inner_text"> Integrated molecular resource for Salmonid species.</font> </div> 
</div>


<div id='cssmenu'>
<ul>
   <li><a href='index.php'><span>Home</span></a></li>
   <li class='active has-sub'><a href='#'><span>Tools/Resources</span></a>
      <ul>
         <li class='has-sub'><a href='#'><span>Atlantic Salmon</span></a>
            <ul>
               <li><a href='http://salmobase.org/cgi-bin/gb2/gbrowse/salmon_GBrowse_Chr_NCBI/'><span>GBrowse</span></a></li>
               <li class='last'><a href='http://salmobase.org/salmon_blast.php'><span>BLAST</span></a></li>
               <li class='last'><a href='http://salmonbase.org/SGVBrowser.php'><span>SNP Browser</span></a></li>
        	<li class='last'><a href='http://salmonbase.org/SGEBrowser.php'><span>GE Browser</span></a></li>
            </ul>
         </li>
         <!--li class='has-sub'><a href='#'><span>Brown Trout</span></a>
            <ul>
               <li><a href='#'><span>GBrowse</span></a></li>
               <li class='last'><a href='#'><span>BLAST</span></a></li>
               <li class='last'><a href='#'><span>SNP Browser</span></a></li>
               <li class='last'><a href='#'><span>GE Browser</span></a></li>
            </ul>
         </li-->
      </ul>
   </li>

   <li class='active has-sub' ><a href='#'><span>Related Projects</span></a>
      <ul>
         <li class='has-sub'><a href='https://www.nmbu.no/forskning/tema/mat/prosjekter/node/19676' target="_blank"><span>GenoSysFat</span></a>
            <!--ul>
               <li><a href='#'><span>Browse data 1</span></a></li>
               <li class='last'><a href='#'><span>Browse data 2</span></a></li>
               <li class='last'><a href='#'><span>Browse data 3</span></a></li>
                <li class='last'><a href='#'><span>Browse data 4</span></a></li>
            </ul-->
         </li>
         <li class='has-sub'><a href='https://www.nmbu.no/om/fakulteter/vetbio/institutter/iha/forskning/prosjekter/node/24555' target="_blank"><span>DigiSal</span></a>
            <!--ul>
               <li><a href='#'><span>data</span></a></li>
               <li class='last'><a href='#'><span>data 1</span></a></li>
               <li class='last'><a href='#'><span>data 2</span></a></li>
               <li class='last'><a href='#'><span>data 3</span></a></li>
            </ul-->
         </li>
	<li class='has-sub'><a href='https://licebase.org/' target="_blank"><span>LiceBase</span></a></li>
      </ul>
   </li>

   <li><a href='About.html'><span>About</span></a></li>
   <li class='last'><a href='#'><span>Contact</span></a></li>
   <li class='last'><a href='Downloads.html'><span>Download</span></a></li>
</ul>
</div>



<div id=contact>

<!--form  action="" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="action" value="submit"/> Your name:<br />
    <input name="name" type="text" value="" size="30"/> <br /> Your email:<br />
    <input name="email" type="text" value="" size="30"/> <br /> Your message:<br />
    <textarea name="message" rows="7" cols="30"> </textarea> <br />
    <input type="submit" value="Send email"/>
</form-->

<?php
$action=$_REQUEST['action'];
if ($action=="")    /* display the contact form */
    {
    ?>
    <form  action="" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="action" value="submit">
    Your name:<br>
    <input name="name" type="text" value="" size="60"/><br>
    Your email address:<br>
    <input name="email" type="text" value="" size="60"/><br>
    Your message:<br>
    <textarea name="message" rows="7" cols="60"></textarea><br>
    <input type="submit" value="Send email"/>
    </form>
    <?php
    }
else                /* send the submitted data */
    {
    $name=$_REQUEST['name'];
    $email=$_REQUEST['email'];
    $message=$_REQUEST['message'];
    if (($name=="")||($email=="")||($message==""))
        {
        echo "All fields are required, please fill <a href=\"\">the form</a> again.";
        }
    else{
        $from="From: $name<$email>\r\nReturn-path: $email";
        $subject="Message sent using your contact form";
         mail("jeevan.karloss@nmbu.no", $subject, $message, $from);
       /* mail("teshome.mulugeta@nmbu.no", $subject, $message, $from);*/
        echo "Thank you. We have now received your mail and will get back to you as soon as possible";
        }
    }
?>

<!--End of Contact div -->
</div>

<div id="footer" >Copyright © Salmobase.org </div>

<!--End of Main div-->
</div>

</body>
<html>

<style type="text/css">

</style>
