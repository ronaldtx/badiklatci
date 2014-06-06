<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Selamat datang di tata persuratan dinas &amp; kearsipan</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<SCRIPT language=JavaScript>
function showdate()
{
  var aMonths=new Array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
  var aDays=new Array("Minggu","Senin","Selasa","Rabu","Kamis","Jum'at","Sabtu");
  var today=new Date();
  var currentday=today.getDay();
  var currentmonth=today.getMonth();
  var currentdate=today.getDate();

  if(navigator.userAgent.indexOf("MSIE 4.0")!=-1) version=0;
  else if(navigator.userAgent.indexOf("MSIE 3.0")!=-1) version=1;
  else if(navigator.userAgent.indexOf("MSIE 5.0")!=-1) version=0;
  else if(navigator.userAgent.indexOf("Mozilla/3.0")!=-1) version=1;
  else if(navigator.userAgent.indexOf("Mozilla/2.0")!=-1) version=1;
  else if(navigator.userAgent.indexOf("Mozilla/4.5")!=-1) version=1;
  else version=0;

  var currentyear=0;

  if (version == 0) { currentyear=today.getFullYear(); }
  if (version == 1) { currentyear=today.getYear(); }

  document.write("<font face=\"verdana\" size=1 color=\"#ffffff\">&nbsp;");
  document.write(aDays[currentday]+", ");
  document.write(currentdate+" ");
  document.write(aMonths[currentmonth]+" ");  
  document.write(currentyear+"</font>");

  return true;
}

</SCRIPT>

<SCRIPT language=Javascript>
<!--
function setFocus()
{
	document.form1.username.focus();
}

//-->
</SCRIPT>
<BODY BGCOLOR=#FFFFFF LEFTMARGIN=0 TOPMARGIN=0 MARGINWIDTH=0 MARGINHEIGHT=0 onload=setFocus()>
<TABLE WIDTH=100% BORDER=0 CELLPADDING=0 CELLSPACING=0 bgcolor="#FFFFFF">
  <TR> 
    <TD bgcolor="#011A5A"><div align="center"><img src="<?php echo base_url() ?>assets/images/header.png" width="600" height="139"></div>      
      <div align="left"></div></TD>
  </TR>
  <TR bgcolor="#000066"> 
    <TD height="30%"><div align="right">
        <table width="100%" border="1" cellpadding="0" cellspacing="0" bordercolor="#000066">
          <tr> 
            <td width="72%" valign="top"><strong></strong></td>
            <td width="28%"><div align="right"><font face=verdana size=2> 
                <script language=JavaScript>
showdate();</script>
                &nbsp;&nbsp;</font></div></td>
          </tr>
        </table>
        <font face=verdana size=2></font></div></TD>
  </TR>
</TABLE>
<p><br>
</p>
<p>&nbsp;</p>
<p>&nbsp; </p>
<table width="32%" height="126" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#000066">
  <tr>
    <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
        <form name="form1" method="post" action="signin/login">
          <tr> 
            <td width="2%" bgcolor="#000066">&nbsp;</td>
            <td height="20" colspan="2" bgcolor="#000066"><font color="#FFFFFF" size="2" face="Verdana"><strong>Login</strong></font></td>
          </tr>
          <tr> 
            <td><font face="Verdana">&nbsp;</font></td>
            <td width="34%"><font size="2" face="Verdana">&nbsp;</font></td>
            <td width="64%">&nbsp;</td>
          </tr>
          <tr> 
            <td height="25"><font face="Verdana">&nbsp;</font></td>
            <td height="25"><div align="right"><font size="2" face="Verdana">User 
                ID :</font></div></td>
            <td height="25"> <input name="username" type="text" id="username"> 
            </td>
          </tr>
          <tr> 
            <td height="25"><font face="Verdana">&nbsp;</font></td>
            <td height="25"><div align="right"><font size="2" face="Verdana">Password 
                :</font></div></td>
            <td height="25"><input name="password" type="password" id="password"></td>
          </tr>
          <tr> 
            <td height="35"><font face="Verdana">&nbsp;</font></td>
            <td height="35"><font size="2" face="Verdana">&nbsp;</font></td>
            <td height="35"> <input type="submit" name="Submit" value="Login"> 
            </td>
          </tr>
        </form>
      </table></td>
  </tr>
</table>
<p>&nbsp;</p>
</body>
</html>
