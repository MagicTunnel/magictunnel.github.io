<html>
<head>
<title>MagicTunnel</title>
<style type="text/css">
  @import url(/stylesheet.css);
</style>
</head>

<body>

<?php 
$SITE_TAB='install';
include('header.php');
?>

<div id="content">
  <div id="content-container">
  <h1>1. Setting up the phone</h1>
  <p>
  You need two things: root access rights and a TUN/TAP driver. This
  driver creates a virtual network interface on your phone through
  which applications send the data. The interface encapsulates the
  data in DNS queries and sends them over the Wifi or mobile
  interface. MagicTunnel needs root access to create the virtual
  network interface and to reroute Internet traffic through it.
  </p>

  <p>
  <em>Your phone may already have root access and a TUN/TAP driver,
  especially if you installed alternative firmwares such as
  <a href="http://www.cyanogenmod.com/">CyanogenMod</a> or a <a
  href="http://android.modaco.com/">MoDaCo custom ROM</a>.</em> In
  this case, skip to the next section.
    
  </p>

  <p>
  <b>Rooting the phone</b>
  There are as many different procedures to root the phone as there
  are phone models. There are two steps: unlocking the boot loader and
  installing a "superuser" app from the <tt>adb</tt> shell.
  Please refer to the appropriate tutorials on the Web. 
    Below are some links. Please be aware that
  rooting the phone can void your warranty or break it if something
  goes wrong. Do it at your own risk.

  <ul>
    <li><a href="http://androidandme.com/2010/01/hacks/video-how-to-unlock-and-root-a-nexus-one/">Google Nexus One</a></li>
  </ul>

  <b>Installing the TUN/TAP driver</b>
  For this, you need to download the Android <a href="http://developer.android.com/sdk/ndk/index.html">NDK</a> and the sources of
  the Linux kernel that ships with your phone. Then, pull the
  configurations settings from your phone, enable the TUN/TAP driver,
  compile the kernel, then copy the <tt>tun.ko</tt> (the compiled
  driver module) to your phone. You will have to modify your phone's
  configuration files to load the driver at startup. You will also
  have to remount the phone's system partition read/write to copy the
  driver and modify the files. Here are some useful links:

  <ul>
    <li><a
    href="http://android.modaco.com/content/htc-hero-hero-modaco-com/313133/howto-compiling-tun-tap-driver-for-htc-hero/">Compiling</a>
    the TUN/TAP driver for HTC Kernel Source 2.6.29</li>

    <li><a
  href="http://android.modaco.com/index.php?showtopic=295691&mode=threaded">Remounting</a>
  the system partition in read/write mode.
  </ul>

  You can find the kernel version that your phone uses in
  "Settings/About phone/Software information".
  </p>

  <h1>2. Setting up a DNS server</h1>

  To use MagicTunnel, you must setup a DNS server. If you already have
  one, skip to the next section. The DNS server can
  be any computer connected to the Internet and that you can
  control. Your home computer is perfectly suitable for this task.
  You must also get a domain name (or a subdomain) that you can
  control. There are many Web sites that propose them for free.

  <h3>A.Configuring domain names</h3>
  
  <ol id="list">
    <li><b>Get a domain name for your computer and set it to point to
    the IP address of your computer.</b> You can use <a href="http://www.dyndns.org">dyndns.org</a> or
    <a href="http://www.no-ip.com">no-ip.com</a> to get one for free. If you have a dynamic IP, these
    services provide you with an application that updates the domain
    whenever the IP address changes. In the following, we assume that
    your computer is identified with
    <b>mycomputer.dyndns.org</b>.</li>

    <li><b>Get a domain name for the tunnel.</b>
    Go to your registrar and create a domain (or a subdomain) for the tunnel. We
    assume that you created a subdomain <b>mytunnel.mydomain.org</b>.
    After you created it, point its NS entry to
    <b>mycomputer.dyndns.org</b> that you set up above. This means
    that all queries of the form asdfasdfasdwre.mytunnel.mydomain.org
    will be forwarded to your own computer, on which you run the DNS
    tunneling server. </li>
  </ol>

  <h3>B.Installing the DNS server</h3>
  Once you obtained a domain, download, decompress, and compile the DNS
  tunnel server iodine on your computer. We assume here that you run
  Linux. The iodine server can also run on Windows.

  <div class="console">
  $ wget <?php print $IODINE_VANILLA_URL; ?> <br/>
  $ tar xzvf  <?php print $IODINE_VANILLA_ARCH; ?> <br/>
  $ cd <?php print $IODINE_VANILLA; ?> <br/>
  $ make
  </div>

  Launch the server as follows:

  <div class="console">
  $ sudo ./bin/iodined -c -P my_password -d tap0 192.168.233.1/24 mytunnel.mydomain.org
  </div>

  This command instructs the server to give to connected
  clients an IP address in the 192.168.233.1/24 range.
  <tt>iodined</tt> creates a network interface <tt>tap0</tt> through which
  the Internet traffic will flow. To allow clients to communicate with
  the server and browse the Internet, use the following commands.
  We assume the network card connected to the Internet is <tt>eth0</tt>.

  <div class="console">
  # Allow the DNS server to send and receive queries <br/>
  $ sudo iptables -A INPUT -p udp -m multiport --dports  53 -i eth0 -j  ACCEPT <br/>
  $ sudo iptables -A OUTPUT -p udp -m multiport --dports  53 -o eth0 -j ACCEPT <br/>
    <br/>
  # Allow the connected clients to talk to the server machine <br/>
  $ sudo iptables -A INPUT -i tap0 -j ACCEPT <br/>
  $ sudo iptables -A OUPUT -o tap0 -j ACCEPT <br/>
    <br/>
  # Forward Internet traffic <br/>
  $ sudo iptables -A FORWARD -i tap0 -o eth0 --state  NEW,ESTABLISHED,RELATED -j ACCEPT <br/>
  $ sudo iptables -A FORWARD -i eth0 -o tap0 -m state --state
  ESTABLISHED,RELATED -j ACCEPT  <br/>
  $ sudo iptables -t nat -A POSTROUTING -o eth0 -j MASQUERADE <br/>
  </div>

  
  <h1>3. Installing the MagicTunnel App</h1>
<img src="media/mt_components.png" align="right" style="margin-left: 30px"/>
  <p>
  If you want to install MagicTunnel from the <a href="/download.php">download</a>
  tab, your phone must be setup to allow installation of
  non-Market applications. Go to "Settings/Applications" and tick the
  "Unknown sources" checkbox.
  </p>

  <p>
  If you see the
  screen on the right when you start MagicTunnel, some components
  are missing. Refer to the first section on how to install them, then
  start MagicTunnel again.
  </p>

  <p>
  If all components are present, you can proceed with the installation
  by tapping on the corresponding button. During this process, you
  will be requested to grant root rights for MagicTunnel. You should
  allow MagicTunnel to get root rights automatically, otherwise
  installation will fail.
  </p>

  <p>  Then, you will be taken to the list of
  available tunnels, where you have access to the following features:
  <ul>
    <li>Configuration of an unlimited number of tunnels</li>
    <li>Quick connection to any tunnel with a single tap</li>
    <li>Display of the log messages produced by the DNS client to
  troubleshoot connectivity problems</li>
  </ul>
 </p>

    <h3>Creating a tunnel profile</h3>

  <ol>
    <li>Tap on "Add new tunnel"</li>
    <li>Choose an arbitrary name for your tunnel</li>
    <li>Set the domain to <b>mytunnel.mydomain.org</b></li>
    <li>Fill in the <tt>iodined</tt> password that you chose previously</li>
    </ol>

    That's all you need.
  </div>
</div>

</body>
</html>