<?php

$opt[1]  = "--vertical-label 'Status' -l0 --title \"IPSEC Tunnel status\" ";
$ds_name[1] = 'Tunnel status';
$def[1]  = "";
$def[1] .= rrd::def("established", $RRDFILE[1], $DS[1], "MAX");
$def[1] .= rrd::def("installed", $RRDFILE[2], $DS[1], "MAX");
$def[1] .= "AREA:established".rrd::color(7).":\"Established\" ";
$def[1] .= "GPRINT:established:LAST:\"%7.2lf %s LAST\" ";
$def[1] .= "GPRINT:established:MAX:\"%7.2lf %s MAX\" ";
$def[1] .= "COMMENT:\"\\n\" ";
$def[1] .= "LINE:installed".rrd::color(2).":\"Installed\" ";
$def[1] .= "GPRINT:installed:LAST:\"%7.2lf %s LAST\" ";
$def[1] .= "GPRINT:installed:MAX:\"%7.2lf %s MAX\" ";
$def[1] .= "COMMENT:\"\\n\" ";


$opt[2] = "--vertical-label \"Traffic (Bytes/s)\" -l0 -b 1024 --title \"IPSEC Tunnel in/out Traffic \" ";
$ds_name[2] = 'In/Out Bytes/second';
$def[2] = "";
$def[2] .=
  # incoming
  "DEF:inbytes=$RRDFILE[3]:$DS[3]:MAX ".
  "AREA:inbytes#00e060:\"Bytes in       \" ".
  "GPRINT:inbytes:LAST:\"%7.1lf %sB/s last\" ".
  "GPRINT:inbytes:AVERAGE:\"%7.1lf %sB/s avg\" ".
  "GPRINT:inbytes:MAX:\"%7.1lf %sB/s max\\n\" ".
  # outgoing
  "DEF:outbytes=$RRDFILE[4]:$DS[4]:MAX ".
  "CDEF:minusoutbytes=outbytes,-1,* ".
  "AREA:minusoutbytes#0080e0:\"Bytes out      \" ".
  "GPRINT:outbytes:LAST:\"%7.1lf %sB/s last\" ".
  "GPRINT:outbytes:AVERAGE:\"%7.1lf %sB/s avg\" ".
  "GPRINT:outbytes:MAX:\"%7.1lf %sB/s max\\n\" ".
  "";

$opt[3] = "--vertical-label \"Packets (seconds)\" -l0 -b 1024 --title \"IPSEC Tunnel in/out packet \" ";
$ds_name[3] = 'Packets/second';
$def[3] = "";
$def[3] .=
  # incoming
  "DEF:inpackets=$RRDFILE[5]:$DS[5]:MAX ".
  "AREA:inpackets#00e060:\"Packets in     \" ".
  "GPRINT:inpackets:LAST:\"%7.1lf %sp/s last\" ".
  "GPRINT:inpackets:AVERAGE:\"%7.1lf %sp/s avg\" ".
  "GPRINT:inpackets:MAX:\"%7.1lf %sp/s max\\n\" ".
  # outgoing
  "DEF:outpackets=$RRDFILE[5]:$DS[5]:MAX ".
  "CDEF:minusoutpackets=outpackets,-1,* ".
  "AREA:minusoutpackets#0080e0:\"Packets out    \" ".
  "GPRINT:outpackets:LAST:\"%7.1lf %sp/s last\" ".
  "GPRINT:outpackets:AVERAGE:\"%7.1lf %sp/s avg\" ".
  "GPRINT:outpackets:MAX:\"%7.1lf %sp/s max\\n\" ".
  "";
?>
