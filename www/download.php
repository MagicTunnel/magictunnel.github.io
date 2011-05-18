<html>
<head>
<title>MagicTunnel</title>
<style type="text/css">
  @import url(/stylesheet.css);
</style>
</head>

<body>

<?php 
$SITE_TAB='download';
include('header.php');
?>

<div id="content">
  <div id="content-container">

  <div id="download">
    <div id="download-button">
      <a href="MagicTunnel.apk"><img src="media/download.png"/></a>
      <div id="version-info">
         V1.0.0
      </div>
    </div>
    <div id="download-requirements">
    <h3>Requirements</h3>
  Your Android phone must be <em>rooted</em> and have a TUN/TAP driver installed.
  MagicTunnel installs a virtual network interface and manipulates the routing table
  to provide transparent connectivity to all applications.

      <h3>Source code</h3>
   MagicTunnel uses a modified <a href="http://code.kryo.se/iodine/">Iodine</a> DNS tunnel client. Source code for the client and the server can be found here. See below for setup instructions.

    </div>

   
  </div>

  </div>
</div>

</body>
</html>