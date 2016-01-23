<!DOCTYPE HTML>

<html>
<?php
$SITE_SUBTITLE='Download for Android';
include('head.php');
?>

<body>

<?php
$SITE_TAB='download';
include('header.php');
?>

<div id="content">
    <div id="content-container">

        <div id="download">
            <div id="download-button">
                <a href="<?php print "$MT_URL"; ?>"><img src="media/download.png"/></a>
                <div id="version-info">
                    V<?php print "$MT_VER"; ?> for Android 2.2
                </div>
            </div>
            <div id="download-requirements">
                <h3>Requirements</h3>
                Your Android phone must be <em>rooted</em> and have a TUN/TAP driver installed.
                MagicTunnel installs a virtual network interface and manipulates the routing table
                to provide transparent connectivity to all applications.

                <h3>Source code</h3>
                <p>
                    MagicTunnel uses a modified <a href="http://code.kryo.se/iodine/">Iodine</a> DNS tunnel client.
                    Source code for the client and the server can be found <a href="<?php print $IODINE_URL; ?>">here</a>.
                    See below for setup instructions.
                </p>
                <p>
                    You may download MagicTunnel's <a href="https://github.com/vitalych/MagicTunnel">source code</a> on GitHub.
                    Feel free to submit improvements!
                </p>

                <h3>Installation</h3>
                <a href="install.php">Install instructions</a> for the client and the server detail how to get DNS tunneling up and running.

                <hr/>

                <h3>Change Log</h3>
                <p>
                    <b>1.0.4 (7 Dec 2013)</b><br/>
                    More robust permission setting for iodine installation
                    (<a href="https://github.com/vitalych/MagicTunnel/pull/11">more info</a>).
                </p>
            </div>
        </div>
    </div>
</div>

</body>
</html>
