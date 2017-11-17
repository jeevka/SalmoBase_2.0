#!/usr/bin/env perl 

# Input from Gbrowse
$seqid = $ARGV[0]; 

#################################################################################
# Download the SNP Flanking regions
#################################################################################
my @temp = split('\:',$seqid);
my $r1 = $temp[1] - 100;
my $r2 = $temp[1] + 100;
my $seq = "$temp[0]".":"."$r1"."-"."$r2";

$seq = `samtools faidx  /var/www/cgi-bin/Salmon_Genome/ssal-asm3.6chr-MAPPED.fa $seq >&1`;
print $seq;


