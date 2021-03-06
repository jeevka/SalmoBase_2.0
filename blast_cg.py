#!/local/genome/packages/python2/2.7.6/bin/python

# Import modules for CGI handling 
import cgi, cgitb; cgitb.enable()
import os 
from Bio.Blast.Applications import *
import time 
import datetime
import Format_Blast_Results as FM
import Format_Blast_Results_210814 as FM1
import Format_Blast_Alignment_Results as FMA
import Format_Blast_Alignment_Results_200814 as FMA1
import subprocess
import Seq_Length as SL
import Execute_R as ER
import re
import pickle 
import sys

# Name the input files according to current time
DT = datetime.datetime.now().strftime('%Y-%m-%d-%H-%M-%S')
Fname = "Query_Seq/"+ DT + ".fasta"

# Create instance of FieldStorage
form = cgi.FieldStorage()

#############################################################################################
# START OF HTML PART 
#############################################################################################
print "Content-type:text/html\r\n\r\n"
print "<html>"
print "<head>"
print "<title>Salmon BLAST search</title>"
print "</head>"
print "<body>"

############################################################################################
# Get data from fields
############################################################################################
if form.getvalue('query_seq'):
   query_seq = form.getvalue('query_seq')
   qfile = open(Fname,"wb")
   qfile.write(query_seq)
   qfile.close()
else:
   # Check for upload file 
   uploaded_file = form['qfile']
   if uploaded_file.file:
        qfile = open(Fname,"w")
	qfile.write(uploaded_file.file.read())
	qfile.close()


# Output format
output_format = form.getvalue('output_format')

# Get the E Value
e_value = form.getvalue('evalue')

# Calculate the length of input seq
qseq_length = SL.find_length(Fname)

# Output format
#output_format = form.getvalue('output_format')
#print output_format

##################################################################################################
################################# Choose Database ################################################
##################################################################################################
database_chosen = form.getvalue('database')

if database_chosen == "SG3p6":
	database = "/var/www/cgi-bin/Salmon_3p6_Blast_DB/Salmon_3p6_Masked_220514.fasta"
	chosen_GBrowse = "http://salmobase.org/cgi-bin/gb2/gbrowse/salmon_GBrowse/"
elif database_chosen == "SG3p6_Chr":
	database = "/var/www/cgi-bin/Salmon_3p6_Chr_Blast_DB/Salmon_3p6_Chr_Masked_180814.fasta"
        # Updated on 22 April 2015. This is the latest from NCBI
	chosen_GBrowse = "http://salmobase.org/cgi-bin/gb2/gbrowse/salmon_GBrowse_Chr/"
elif database_chosen == "SG3p6_Chr_Trans": 
        database = "/var/www/cgi-bin/Salmon_3p6_Chr_Transcript_DB_071014/Salmon_3p6_Chr_Transcript.fasta"
        chosen_GBrowse = "http://salmobase.org/cgi-bin/gb2/gbrowse/salmon_GBrowse_Chr/"	
elif database_chosen == "SG3p6_Chr_NCBI_Masked":
        database = "/var/www/cgi-bin/Salmon_3p6_Chr_NCBI_Blast_DB/ssal-asm3.6chr-MAPPED.masked-v4.0.fa"
        chosen_GBrowse = "http://salmobase.org/cgi-bin/gb2/gbrowse/salmon_GBrowse_Chr_NCBI/"
        #database = "/var/www/cgi-bin/Salmon_3p6_Chr_Transcript_DB_071014/Salmon_3p6_Chr_Transcript.fasta"
        #chosen_GBrowse = "http://salmobase.org/cgi-bin/gb2/gbrowse/salmon_GBrowse_Chr/"
elif database_chosen == "SG3p6_Chr_NCBI_Trans":
        database = "/mnt/home/Salmon_3p6_Chr_NCBI_Transcript_DB_230415/Salmon_3p6_Chr_Transcript.fasta"
        chosen_GBrowse = "http://salmobase.org/cgi-bin/gb2/gbrowse/salmon_GBrowse_Chr_NCBI/"
elif database_chosen == "SG3p6_Chr_NCBI_Prot":
	database="/mnt/home/Salmon_3p6_Chr_NCBI_Protein_DB_230415/Salmon_Protein_Seqs_211014.fasta"
	chosen_GBrowse = "http://salmobase.org/cgi-bin/gb2/gbrowse/salmon_GBrowse_Chr_NCBI/"
elif database_chosen == "SG3p6_Chr_NCBI_RefSeq_Prot":
        database="/mnt/home/Salmon_RefSeq_Protein/GCF_000233375.1_ICSASG_v2_protein.faa"
        chosen_GBrowse = "http://salmobase.org/cgi-bin/gb2/gbrowse/salmon_GBrowse_Chr_NCBI/"
elif database_chosen == "omy_v6_ncbi":
	database="/var/www/cgi-bin/rainbow_trout_ncbi/rainbow_trout_refseq.fa"
        chosen_GBrowse = "http://salmobase.org/cgi-bin/gb2/gbrowse/rainbow_trout_ncbi/"

elif database_chosen == "salmon-ncr":
        database="/var/www/cgi-bin/SalmoSalar_ncRNA/SalmoSalar_ncRNA.fasta"
        chosen_GBrowse = "http://salmobase.org/cgi-bin/gb2/gbrowse/salmon_GBrowse_Chr_NCBI/"

elif database_chosen == "rainbow-ncr":
        database="/var/www/cgi-bin/RainbowTrout_ncRNA/RainbowTrout_ncRNA.fasta"
        chosen_GBrowse = "http://salmobase.org/cgi-bin/gb2/gbrowse/rainbow_trout_ncbi/"

elif database_chosen == "coho_v1":
        database="/var/www/cgi-bin/coho_salmon/Coho_Salmon.fa"
        chosen_GBrowse = "http://salmobase.org/cgi-bin/gb2/gbrowse/coho_salmon/"

elif database_chosen == "coho_ncRNA":
        database="/var/www/cgi-bin/coho_salmon_ncRNA/Coho_Salmon_ncRNA.fasta"
        chosen_GBrowse = "http://salmobase.org/cgi-bin/gb2/gbrowse/coho_salmon/"

#elif database_chosen == "salmonids":
#        database="/mnt/home/salmonids/Salmonids.fasta"
#        chosen_GBrowse = "http://salmobase.org/cgi-bin/gb2/gbrowse/salmon_GBrowse_Chr_NCBI/"
#	chosen_GBrowse = "http://salmobase.org/cgi-bin/gb2/gbrowse/rainbow_trout_V6/"

elif database_chosen == "salmonids":
        database1="/var/www/cgi-bin/Salmon_3p6_Chr_NCBI_Blast_DB/ssal-asm3.6chr-MAPPED.masked-v4.0.fa"
	database2="/var/www/cgi-bin/Rainbow_Trout_Masked/Rainbow_Trout_Masked.fa"
	database3="/var/www/cgi-bin/coho_salmon_masked/Coho_Salmon_Masked.fa"
        chosen_GBrowse1 = "http://salmobase.org/cgi-bin/gb2/gbrowse/salmon_GBrowse_Chr_NCBI/"
        chosen_GBrowse2 = "http://salmobase.org/cgi-bin/gb2/gbrowse/rainbow_trout_ncbi/"
	chosen_GBrowse3 = "http://salmobase.org/cgi-bin/gb2/gbrowse/coho_salmon/"

else:
        database = "/var/www/cgi-bin/Salmon_3p6_Chr_Protein_DB_211014/Salmon_Protein_Seqs_211014.fasta"
        chosen_GBrowse = "http://salmobase.org/cgi-bin/gb2/gbrowse/salmon_GBrowse_Chr/"

# BLAST OUTPUT FILE
if database_chosen == "salmonids":
	DT1 = datetime.datetime.now().strftime('%Y-%m-%d-%H-%M-%S.%f')
	DT2 = datetime.datetime.now().strftime('%Y-%m-%d-%H-%M-%S.%f')
	DT3 = datetime.datetime.now().strftime('%Y-%m-%d-%H-%M-%S.%f')
	OutFile1 = "Blast_Output/" + DT1 + ".out"
	OutFile2 = "Blast_Output/" + DT2 + ".out"
	OutFile3 = "Blast_Output/" + DT3 + ".out"
else:
	OutFile = "Blast_Output/" + DT + ".out"

###################################################################################################
############################## Choose BLAST Program ###############################################
############### For some reasons Megablast and other blast exe are in different bin folders #######
###################################################################################################
blast_chosen = form.getvalue('blast') 
if database_chosen == "salmonids":
        if blast_chosen == "megablast":
                BLAST = "/local/genome/packages/blast+/2.2.28/bin/blastn"
                Mega_BLAST1  = NcbiblastnCommandline(cmd=BLAST,task="megablast", query=Fname, db=database1, evalue=e_value, outfmt=output_format, out=OutFile1,best_hit_overhang=0.1,max_target_seqs=1)
		Mega_BLAST2  = NcbiblastnCommandline(cmd=BLAST,task="megablast", query=Fname, db=database2, evalue=e_value, outfmt=output_format, out=OutFile2,best_hit_overhang=0.1,max_target_seqs=1)
		Mega_BLAST3  = NcbiblastnCommandline(cmd=BLAST,task="megablast", query=Fname, db=database3, evalue=e_value, outfmt=output_format, out=OutFile3,best_hit_overhang=0.1,max_target_seqs=1)
		# Combining the BLAST Output files 
		#os.system("cat "+OutFile2+">>"+OutFile1)
		#os.system("cat "+OutFile3+">>"+OutFile1)
        elif blast_chosen == "blastn-short":
                BLAST = "/local/genome/packages/blast+/2.2.28/bin/blastn"
                Mega_BLAST1  = NcbiblastnCommandline(cmd=BLAST,task="blastn-short", query=Fname, db=database1, evalue=e_value, outfmt=output_format, out=OutFile1,best_hit_overhang=0.1,max_target_seqs=1) 
		Mega_BLAST2  = NcbiblastnCommandline(cmd=BLAST,task="blastn-short", query=Fname, db=database2, evalue=e_value, outfmt=output_format, out=OutFile2,best_hit_overhang=0.1,max_target_seqs=1 )
		Mega_BLAST3  = NcbiblastnCommandline(cmd=BLAST,task="blastn-short", query=Fname, db=database3, evalue=e_value, outfmt=output_format, out=OutFile3,best_hit_overhang=0.1,max_target_seqs=1)
        else:
                BLAST = "/local/genome/packages/blast+/2.2.28/bin/" + blast_chosen
                Mega_BLAST1  = NcbiblastnCommandline(cmd=BLAST, query=Fname, db=database1, evalue=e_value, outfmt=output_format, out=OutFile1,best_hit_overhang=0.1,max_target_seqs=1)	
                Mega_BLAST2  = NcbiblastnCommandline(cmd=BLAST, query=Fname, db=database2, evalue=e_value, outfmt=output_format, out=OutFile2,best_hit_overhang=0.1,max_target_seqs=1)
                Mega_BLAST3  = NcbiblastnCommandline(cmd=BLAST, query=Fname, db=database3, evalue=e_value, outfmt=output_format, out=OutFile3,best_hit_overhang=0.1,max_target_seqs=1)
else: 
	if blast_chosen == "megablast":
        	BLAST = "/local/genome/packages/blast+/2.2.28/bin/blastn" 
		Mega_BLAST  = NcbiblastnCommandline(cmd=BLAST,task="megablast", query=Fname, db=database, evalue=e_value, outfmt=output_format, out=OutFile)
	elif blast_chosen == "blastn-short":
        	BLAST = "/local/genome/packages/blast+/2.2.28/bin/blastn"
        	Mega_BLAST  = NcbiblastnCommandline(cmd=BLAST,task="blastn-short", query=Fname, db=database, evalue=e_value, outfmt=output_format, out=OutFile)
	else:
		BLAST = "/local/genome/packages/blast+/2.2.28/bin/" + blast_chosen
		Mega_BLAST  = NcbiblastnCommandline(cmd=BLAST, query=Fname, db=database, evalue=e_value, outfmt=output_format, out=OutFile)


###############################################################################################
# Run blastn using Biopython
###############################################################################################
try:
	if database_chosen == "salmonids":
		stdout, stderr = Mega_BLAST1()
		stdout, stderr = Mega_BLAST2()
		stdout, stderr = Mega_BLAST3()

                # Combining the BLAST Output files
                os.system("cat "+OutFile2+">>"+OutFile1)
                os.system("cat "+OutFile3+">>"+OutFile1)
	else:
		stdout, stderr = Mega_BLAST()
except:
	print "</body>"
	print "<div align=center>"
	print "<br><br><br>"
	print "<h1> Please submit a fasta file as input </h1>"
	print "<br><br>"
	print "<FORM style=\"width:200px;height:80px;margin-left:auto;margin-right:auto;margin-top:15px;\">"
	print "<button Type=\"button\" value=\"Back\" onClick=\"history.go(-1);return true;\" style=\"width:150px;height:50px;font-size:25px;\">Back</button>"
	print "</FORM>"
	print "</div>"
	print "</html>"
	sys.exit()
	

# Reading the BLAST OUTPUT file
if database_chosen == "salmonids":
        d1 = open(OutFile1,"r")
        data = d1.readlines()
        d1.close()

        #d2 = open(OutFile2,"r")
        #data2 = d2.readlines()
        #d2.close()

        #d3 = open(OutFile3,"r")
        #data3 = d3.readlines()
        #d3.close()
else: 
	d = open(OutFile,"r")
	data = d.readlines()
	d.close()

################################################################################################
# Formatting the BLAST Output File
################################################################################################
#Formatted_out = "BLAST_Output_Formatted/" + DT 
# This is for Table output
if int(output_format) == 6:
	#FM.main_main(OutFile,DT,qseq_length)
	if database_chosen == "salmonids":
		FM1.main_main(OutFile1,DT1,qseq_length)
		#FM1.main_main(OutFile2,DT2,qseq_length)
		#FM1.main_main(OutFile3,DT3,qseq_length)
	else:
		FM1.main_main(OutFile,DT,qseq_length)
	
else:	
	# This one deals with Alignment output format
	# This will dump a .p file that we can use later 
	#FMA.main_main(OutFile,DT,qseq_length)
 	# Updated 210814 by Jeevan: Bug was fixed 
	# try and except was updated on 301015 by jeevan to fix the tblastn problem
	# tblastn output file has some data even though there are no hits.
        # Then, the FMA1.main_main gives errors. 
	# instead of fixing the FMA1.main_main Jeevan add a small hack which "WORKS". 
	try:
		FMA1.main_main(OutFile,DT)
	
		# Input file for GBRWOSE link in BLAST Alignment result view
		Fname =  "/var/www/cgi-bin/Blast_Output/" + DT + ".out.p"

		# Loading the pickle file which contains genome co-ordinates
		# for GBrowse when it is BLAST alignment results 
		BA_RANGE = pickle.load(open( Fname, "rb" ))
	except: 
		pass

if database_chosen == "salmonids":
	R_input_file = "BLAST_Output_Formatted/"  + DT1 + "_Formatted.txt"
else:
	R_input_file = "BLAST_Output_Formatted/"  + DT + "_Formatted.txt"

# Input file for GBRWOSE link in BLAST Alignment result view 
#Fname =  "/var/www/cgi-bin/Blast_Output/" + DT + ".out.p"

# Loading the pickle file which contains genome co-ordinates 
# for GBrowse
# BA_RANGE = pickle.load(open( Fname, "rb" ))

ER.run_execute_R(R_input_file,DT,qseq_length)

summary_image =   "BLAST_Summary_Images/" + DT + ".png"


#############################################################################################
# START OF HTML PART
#############################################################################################
#print "Content-type:text/html\r\n\r\n"
#print "<html>"
#print "<head>"
#print "<title>Salmon BLAST search</title>"
#print "</head>"
#print "<body>"


#################################################################################################
# MAIN DIV
#################################################################################################
print "<div align=center>"

print "<div id=\"headerdiv\">"
print "<font id=\"SB\" color=\"#777\" ></font>"
print "</div>"

# Header 
print "<div id=\"header\" align=center style=\"background-color:#3C6478;width:1200px;color:white;height:40px;\">"
print "<h1 style=\"margin-bottom:0\">SalmoBase BLAST search results</h1>"
print "</div>"

##################################################################################################
# BLAST SUMMARY IMAGE 
##################################################################################################
print "<div id=BLAST_SUMMARY>"
#data_uri = open('BLAST_images/BLAST_SUMMARY.png', 'rb').read().encode('base64').replace('\n', '')
#data_uri = open(summary_image, 'rb').read().encode('base64').replace('\n', '')
MM = 0
try:
	data_uri = open(summary_image, 'rb').read().encode('base64').replace('\n', '')
	img_tag = '<img src="data:image/png;base64,{0}">'.format(data_uri)
	print img_tag
except: 
	if blast_chosen == "blastp":
		pass
	else:
		print "<h2>No Significant matches found.</h2>"
	MM = 1
#print "<img src=\"/BLAST_images/BLAST_SUMMARY.png\" style=\"height:600px;width:600px;margin-top:20px;\" />"
print "</div>"

#####################################################################################################
# Start of result table 
#####################################################################################################
# If table format is selected  
if int(output_format) == 6:
	print "<table style=\"width:1200px;text-align:left;margin-top:20px;border:1px solid\">"
	if MM == 0:
		print "<tr style=\"text-align:center;\" bgcolor=\"#7ACDEB\">"
		print "<th> Query </th>"
		print "<th> Subject </th>"
		print "<th> Identity </th>" 
		print "<th> Length </th>" 
		print "<th> Mismatches </th>" 
		print "<th> Gaps</th>" 
		print "<th> QStart </th>"
		print "<th> QEnd </th>" 
		print "<th> SStart </th>" 
		print "<th> SEnd </th>" 
		print "<th> Score </th>"
		print "<th> E-Value </th>"
		print "<th> GBrowse View </th>"
		print "</tr>"

	for i in data:
        	temp = i.split()

                # Choosing the Gbrowse based on Seq names
                if re.search("ssa",temp[1]):
                        chosen_GBrowse = chosen_GBrowse1
                elif re.search("NC_035",temp[1]):
                        chosen_GBrowse = chosen_GBrowse2
                else:
                        chosen_GBrowse = chosen_GBrowse3

		if re.search(":",temp[1]):
			temp[1] = temp[1].split(":")[0] 
		

		if blast_chosen == "blastp":
			GBrowse = chosen_GBrowse + "?name=" + temp[1] + ";"
		else:
	        	GBrowse = chosen_GBrowse + "?name=" + temp[1] + ":" + str(int(temp[8]) - 5000) + ".." + str(int(temp[9].strip()) + 5000) + ";h_region=" + temp[1] + ":" + str(temp[8]) + ".." + str(temp[9].strip()) + ";"
                
                if re.search("^omy",temp[1]):
			GBrowse = chosen_GBrowse + "?name=" + temp[1] + ":" + str(int(temp[8]) - 5000) + ".." + str(int(temp[9].strip()) + 5000) + ";h_region=" + temp[1] + ":" + str(temp[8]) + ".." + str(temp[9].strip()) + ";"

        	print "<tr>"
        	print "<td> %s </td>" %temp[0]
        	print "<td> %s </td>" %temp[1] 
        	print "<td> %s </td>" %temp[2]
        	print "<td> %s </td>" %temp[3]
        	print "<td> %s </td>" %temp[4]
        	print "<td> %s </td>" %temp[5]
        	print "<td> %s </td>" %temp[6]
        	print "<td> %s </td>" %temp[7]
        	print "<td> %s </td>" %temp[8]
        	print "<td> %s </td>" %temp[9]
		print "<td> %s </td>" %temp[11]
		print "<td> %s </td>" %temp[10]
		print "<td> <a href= %s target=\"_blank\"" %GBrowse
		print  ">"
		print "GBrowse View </a>" 
		print "</td>" 
        	print "</tr>"

	# End of Table
	print "</table>"
# END OF IF
# If alignment format is selected 
else:   
	#print "<div style=\"width:800px;text-align:left;border:1px solid\">"
        N = 0; M = 0;NSeq = 0; MM = 0 ; NResults = 1
	for i in data:

		# End of BLAST Summary results	
                if re.search("> ",i):
                        print "</table>"
                        M = 1 
			NSeq += 1

		if NSeq == 1 and MM == 0:
			# Open a div after the ">" symbol: Outer div 
                        print "<div style=\"width:1200px;text-align:left;margin-top:10px;border:1px solid\">"
			# Inner Div 
			print "<div style=\"width:900px;margin-top:20px;margin-left:auto;margin-right:auto;\">"
			MM = 1
		
		if NSeq > 1 and re.search("> ",i):
			# End of outer div
			print "</div>"
			# End of Inner div
			print "</div>"			

			# Beginning of outer div
			print "<div style=\"width:1200px;text-align:left;margin-top:10px;border:1px solid\">"
			# Beginning of Inner Div 
			print "<div style=\"width:900px;margin-left:auto;margin-right:auto;margin-top:10px;\">"
			
 		# Print the summary results 
		if N != 0 and M == 0:
			temp = i.split()
			if len(temp) > 0:
		                print "<tr>"
        		        print "<td> <a href=#%s >" %temp[0] 
				print "%s </a> </td>" %temp[0]
                		print "<td> %s </td>" %temp[1]
	                	print "<td> %s </td>" %temp[2]
				print "<tr>"
		
		# Beginning of the Summary results 
		if re.search("Sequences",i):
			 print "<table style=\"width:1200px;text-align:left;margin-top:20px;border:1px solid;\">"
		         print "<tr style=\"text-align:center;\" bgcolor=\"#7ACDEB\">"
                	 print "<th> Subject </th>"
	                 print "<th> Score </th>"
         	         print "<th> E-value </th>"
                	 print "</tr>"
			 N += 1
 		
		# GBRwose link before every Secondary ("Score") Results
                if re.search("Score =",i):
                        #temp = i.split()
                        #scaf = i.replace("> ","")
                        #scaf = scaf.strip()
			NResults += 1                
			#t = BA_RANGE[scaf]
                       	#temp = t[NResults].split("-")
                        # GBrowse link from BLAST Result at the beginning of each ">"
                        #GBrowse = chosen_GBrowse + "?name=" + scaf + ":" + str(int(temp[0]) - 5000) + ".." + str(int(temp[1].strip()) + 5000) + ";h_region=" + scaf + ":" + str(temp[0]) + ".." + str(temp[1].strip()) + ";"

                        # This is for links to BLAST results within the same page
                        #ID = i.replace(">","")
                        #print "<div id=%s" %ID
                        #print "></div>"
                        #print i.strip()
                       	#print "<br><br><div style=\"margin-left:0px;width:150px;height:30px;border:1px solid;background-color:A3F2FC;text-align:center\"><a href= %s target=\"_blank\"" %GBrowse
                        #print  ">"
                        #print "<div style=\"margin-top:5px;\">GBrowse View</div> </a> </div>"
                        #print "<br>"
                          
 			
			
		if M == 1:
			if re.search(">",i):
				temp = i.split()
				scaf = i.replace("> ","")				
				scaf = scaf.strip()
				t = BA_RANGE[scaf]
                                temp = t[1].split("-")
                                # GBrowse link from BLAST Result at the beginning of each ">" 
				if blast_chosen == "blastp":
					GBrowse = chosen_GBrowse + "?name=" + scaf + ";"
				else:
					GBrowse = chosen_GBrowse + "?name=" + scaf + ":" + str(int(temp[0]) - 5000) + ".." + str(int(temp[1].strip()) + 5000) + ";h_region=" + scaf + ":" + str(temp[0]) + ".." + str(temp[1].strip()) + ";"
                                # This is for links to BLAST results within the same page
                                ID = i.replace(">","")
				print "<div id=%s" %ID
				print "></div>"
				print i.strip()  
				print "<br><br><div style=\"margin-left:0px;width:150px;height:30px;border:1px solid;background-color:A3F2FC;text-align:center\"><a href= %s target=\"_blank\"" %GBrowse
                		print  ">"
		                print "<div style=\"margin-top:5px;\">GBrowse View</div> </a> </div>"
				print "<br>"
                                print "<pre>"
				NResults = 1

			elif re.search("\|",i):
				print i.rstrip()
				
			else:
				##print "<pre>"
				#print "Hello"
				print i.rstrip()
				#print "</pre>"
			
		       
	


print "</pre>"
#subprocess.call(['chmod','777',OutFile])

#print "<p><iframe src= %s  width=200 height=400 frameborder=0 ></iframe></p>" %OutFile
# closing of inner div 
print "</div>"

print "</div>"

#print "<div>"
#print "<p><iframe src= %s  width=200 height=400 frameborder=0 ></iframe></p>" %OutFile
#print "</div>"

print "<FORM style=\"width:200px;height:80px;margin-left:auto;margin-right:auto;margin-top:15px;\">"
print "<button Type=\"button\" value=\"Back\" onClick=\"history.go(-1);return true;\" style=\"width:150px;height:50px;font-size:25px;\">Back</button>"
print "</FORM>"

# End of MAIN DIV
print "</div>"

print "</body>"
print "</html>"
