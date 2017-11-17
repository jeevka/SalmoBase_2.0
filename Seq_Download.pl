#!/usr/bin/env perl 

# Input from Gbrowse
$seqid = $ARGV[0];
$start = $ARGV[1];
$end   = $ARGV[2];
$type  = $ARGV[3];
$gname = $ARGV[4];
$GB_Version = $ARGV[5]; 

#################################################################################
# Download the whole gene region 
#################################################################################
if (($type == 1) && ($GB_Version eq "S3p6"))
{
 my @Temp = split('\.',$gname);
 my $gname_1 = shift @Temp;
 $seq = `samtools faidx  /var/www/download_seq/Salmon_3p6/Gene/Salmon_3p6_Gene_Seq.fasta $gname_1 >&1`;
 print $seq;
}

if (($type == 1) && ($GB_Version eq "S3p6CHR"))
{
	my @Temp = split('\.',$gname);
	my $gname_1 = shift @Temp;  
	$seq = `samtools faidx /var/www/download_seq/Salmon_3p6_Chr/Gene/Salmon_3p6Chr_Gene.fasta $gname_1 >&1`;
	print $seq;
}

if (($type == 1) && ($GB_Version eq "S3p6CHR_NCBI"))
{
        my @Temp = split('\.',$gname);
        my $gname_1 = shift @Temp;
        $seq = `samtools faidx /var/www/download_seq/Salmon_3p6_Chr_NCBI/Gene/Salmon_3p6Chr_Gene.fasta $gname_1 >&1`;
        print $seq;
}


################################################################################
# Downlod the exon sequences 
################################################################################
if ($type == 2)
{
# Tophat and Samtools solution for Coding region download 
# Coding seqs are stored in "/var/www/Genome_Seq/" folder 
# after processed in "Seq_Download_Test" folder
if ($GB_Version eq "S3p6")
	{ 
	$seq = `samtools faidx  /var/www/download_seq/Salmon_3p6/Exon/Sally_Seq_Exon_Feature.fasta $gname >&1`;
	print $seq; 
	}
elsif ($GB_Version eq "S3p6CHR")
	{
	$seq = `samtools faidx  /var/www/download_seq/Salmon_3p6_Chr/Exon/Salmon_3p6Chr_Exon.fasta $gname >&1`;
	print $seq; 
	}
else	
	{
        $seq = `samtools faidx  /var/www/download_seq/Salmon_3p6_Chr_NCBI/Exon/Salmon_3p6Chr_Exon.fasta $gname >&1`;
        print $seq;
	}	
}

###############################################################################
# Download Intron sequences 
###############################################################################

if ($type == 3)
{
# Tophat and Samtools solution for Coding region download
# # Coding seqs are stored in "/var/www/Genome_Seq/" folder
# # after processed in "Seq_Download_Test" folder
#
if ($GB_Version eq "S3p6")
        {
	$seq = `samtools faidx  /var/www/download_seq/Salmon_3p6/Intron/Sally_Seq_Intron_Feature.fasta $gname >&1`;
	print $seq;
	}	
elsif ($GB_Version eq "S3p6CHR")
	{
        $seq = `samtools faidx  /var/www/download_seq/Salmon_3p6_Chr/Intron/Salmon_3p6Chr_Intron.fasta $gname >&1`;
        print $seq;
	}
else
	{
        $seq = `samtools faidx  /var/www/download_seq/Salmon_3p6_Chr_NCBI/Intron/Salmon_3p6Chr_Intron.fasta $gname >&1`;
        print $seq;	
	}
}



###############################################################################
## Download Protein sequences
################################################################################
if ($type == 4)
{
if ($GB_Version eq "S3p6")
        {
        $seq = `samtools faidx  /var/www/download_seq/Salmon_3p6/Protein/Salmon_Protein_Seqs_211014.fasta $gname >&1`;
        print $seq;
        }
elsif($GB_Version eq "S3p6CHR")
        {
        #$seq = `samtools faidx  /var/www/download_seq/Salmon_3p6_Chr/Protein/Salmon_Protein_Seqs_211014.fasta $gname >&1`;
	$seq = `samtools faidx  /var/www/download_seq/Salmon_3p6_Chr/Protein/Salmon_3p6_Chr_NCBI_Protein_Seq_030615.fasta $gname >&1`;
        print $seq;
        }
else	
	{
	#$seq = `samtools faidx  /var/www/download_seq/Salmon_3p6_Chr_NCBI/Protein/Salmon_Protein_Seqs_211014.fasta $gname >&1`;
	$seq = `samtools faidx  /var/www/download_seq/Salmon_3p6_Chr_NCBI/Protein/Salmon_3p6_Chr_NCBI_Protein_Seq_030615.fasta $gname >&1`;
        print $seq;
	}
}

