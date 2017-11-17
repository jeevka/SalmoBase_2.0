#!/usr/bin/env perl 

# Input from Gbrowse
$seqid = $ARGV[0]; 
$allele = $ARGV[1];
#################################################################################
# Download the SNP Flanking regions
#################################################################################
my @temp = split('\:',$seqid);
my $r1 = $temp[1] - 100;
my $r2 = $temp[1] + 100;


my $seq = "$temp[0]".":"."$r1"."-"."$r2";

$seq = `samtools faidx  /var/www/cgi-bin/Salmon_Genome/ssal-asm3.6chr-MAPPED.fa $seq >&1`;

# Add [A/C] to the sequence 

my @temp = split('\n',$seq);
my $seq_alone =  $temp[1].$temp[2].$temp[3].$temp[4].$temp[5];
my @temp1 = split("",$seq_alone);
$temp1[100] = "[".$allele."]";
my $seq1 = join('',@temp1);
$seq1 =~ s/(.{1,60})/$1\n/gs;

print $temp[0],"\n",$seq1;
