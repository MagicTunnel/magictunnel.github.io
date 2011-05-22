<html>
<head>
<title>MagicTunnel</title>
<style type="text/css">
  @import url(/stylesheet.css);
</style>
</head>

<body>

<?php
$SITE_TAB='faq';
include('header.php');
?>

<div id="content">
  <div id="content-container">

  Here is a list of frequently asked questions. Feel free to send any suggestions to
  support (at) magictunnel.net. While we cannot answer to all the e-mails we get, we will do our best to apply your feedback and make MagicTunnel better. If you submit a bug report, attach the output of the MagicTunnel log, as well as a detailed description on how to reproduce it.

  <h3>How fast is DNS tunneling?</h3>
  You can expect a throughput anywhere from 0 to 10 KB/s on typical DNS servers. The latency can be up to several seconds. Do not expect to be able to browse heavy web sites or place VoIP calls.

  <h3>What can I use DNS tunneling for?</h3>
  Mostly to send and receive e-mails and for other lightweight activities. See previous point.

  <h3>Does MagicTunnel use encryption?</h3>
  No, it does not. It is up to you to encrypt your traffic or use services that provide encryption (SSL-enabled Web sites, IMAP, POP, or SMTP). Keep in mind that most DNS servers keep a log of the DNS queries, making it possible to know the contents of the Web pages your visit for a long time.

  <h3>Does MagicTunnel always work?</h3>
  Yes, provided that the ISP's DNS server allows queries to external DNS servers and does not filter unusual DNS queries. If the ISP does not allow such queries or filters them, MagicTunnel cannot help you in any way.

   <h3>Do I need to configure the firewall on my phone?</h3>
   It depends on your firewall. MagicTunnel has been tested to work ok without any specific configuration when <a href="https://code.google.com/p/droidwall/">Droidwall</a> is active. If in doubt, disable your firewall.

<h3>MagicTunnel reports "Connected" but I can't browse the Internet</h3>  
<p>
  This may  happen when the ISP resets your IP address or the Wifi drops the connection. In this case,  disconnect the tunnel (long press on the tunnel name), disable your network connection, enable it again, then establish the tunnel.
</p>

<p>
       If it does not help, check that your domain name is setup properly and your DNS server is properly configured. You can check this by running the <tt>iodine</tt> client on a PC connected to the Internet. If it works, check the connection log in the MagicTunnel client.
</p>

  
  </div>
</div>

</body>
</html>