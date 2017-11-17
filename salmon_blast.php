
<!DOCTYPE html>
<html>
<title>Salmon Blast search </title>

<body> 

<!-- MAIN DIV -->
<div id=maindiv>

<div id="headerdiv">
	<font id="SB" color="blue">S a l m o B a s e</font>
</div>

<!-- Main MENU options -->
<div id=menudiv >
        <ul id=coolMenu">
                <li><a href="http://128.39.181.113/index.php">HOME</a></li>
                <li><a href="http://128.39.181.113/salmon_blast.php">BLAST Search </a></li>
                <li><a href="http://128.39.181.180/cgi-bin/gb2/gbrowse/salmon_GBrowse/" target="_blank" >GBrowse </a> </li>
        </ul>
</div>


<!-- Main DIV which contains all the BLAST options -->
<fieldset id="contentdiv">
 <legend id=blast_title> BLAST Search </legend> 
<br> <br>

<!--Query Seq DIV -->
<form enctype="multipart/form-data" action="/cgi-bin/salmon_blast.py" method="post">
  <textarea id=query_seq name="query_seq"></textarea>  <br><br>
  
  Or, upload file  <input type="file" name="qfile" id="qfile"><br>
                   
<!-- Database selection-->
<h3>Choose database </h3>
<select id=database>
  <option value="SG3p6">Salmon Genome Assembly 3.6</option>
</select> <br><br>

<!-- BLAST SELCTION-->
<input type="radio" id="blast" name="blast" value="blastn" checked> blastn<br>
<input type="radio" id="blast" name="blast" value="megablast"> megablast<br>
<input type="radio" id="blast" name="blast" value="tblastn"> tblastn<br>
<input type="radio" id="blast" name="blast" value="primer-blastn">blastn-short<br>
<br> <br> 

E-value: <input type="text" name="evalue" value=0.05 style="width:40px"><br> <br>

<!-- SUBMIT BLAST Button-->
<input id=blast_submit type="submit" value="BLAST" />
</form>

<!--END OF Query Seq DIV -->
</fieldset>

<div id="footer">Copyright © Salmobase.org</div>

<!-- end of main div-->
</div>

</body>
</html>


<style type="text/css">
#maindiv
{
width:900px;
margin-left:auto;
margin-right:auto;
text-align:left;
}

#headerdiv
{
background-color:#FFFFFF;
text-color:#FFFFFF;
width:900px;
height:120px;
text-align:center;
}

#SB
{
font-weight:bold;
font-size:80px;
}

#menudiv
{
width:900px;
height:30px;
background-color:blue;
margin:auto;
text-align:center;
}

#coolMenu
{
text-color:#FFFFFF;
font-weight:bold;
font-size:15px;
}

#contentdiv
{
background-color:#FFFFFF;
height:700px;
width:900px;
border: 1px solid;
margin-top:10px;
}

#blast_title
{
font-size:30px;
font-weight:bold;
}

#query_seq
{
height:250px;
width:650px;
}

#database
{
width:200px;
}

#blast_submit
{
height:80px;
width:120px;
font-size:25px;
}

#footer
{
height:80px;
width:900px;
text-align:center;
}

ul
{
list-style-type:none;
margin:0;
padding:0;
}

li
{
display:inline;
margin-top:5px
}

li
{
float:left;
}

a
{
display:block;
width:180px;
color:#FFFFFF;
}

</style>
