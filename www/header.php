<div id="header">
<div id="header-container">
<ul>

<?php 
$IODINE_URL='http://www.magictunnel.net/downloads/iodine-0.6.0-rc1-android.tar.gz';

$IODINE_VANILLA='iodine-0.6.0-rc1';
$IODINE_VANILLA_ARCH="$IODINE_VANILLA.tar.gz";
$IODINE_VANILLA_URL="http://www.magictunnel.net/downloads/$IODINE_VANILLA";
?>


<li class="<?php  if ($SITE_TAB == "home") { print 'selected';}?>"><a href="/index.php"><span>Home</span></a></li>
<li class="<?php  if ($SITE_TAB == "download") { print 'selected';}?>"><a href="download.php"><span>Download</span></a></li>
<li class="<?php  if ($SITE_TAB == "install") { print 'selected';}?>"><a href="install.php"><span>Installation</span></a></li>
<li class="<?php  if ($SITE_TAB == "faq") { print 'selected';}?>"><a href="faq.php"><span>FAQ</span></a></li>
</ul>
</div>
</div>
