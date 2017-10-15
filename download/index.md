---
layout: default
title: Download
---

<div id="download">
    <div id="download-button">
        <a href="{{site.data.sw.mt.url}}"><img src="/media/download.png"/></a>
        <div id="version-info">
            V{{site.data.sw.mt.ver}} for Android 2.2
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
            Source code for the client and the server can be found <a href="{{site.url}}{{site.data.sw.iodine.url}}">here</a>.
            See below for setup instructions.
        </p>
        <p>
            You can find MagicTunnel's <a href="https://github.com/MagicTunnel">source code</a> on GitHub.
            Feel free to submit improvements!
        </p>

        <h3>Installation</h3>
        <a href="/install">Install instructions</a> for the client and the server detail how to get DNS tunneling up and running.

        <hr/>
    </div>
</div>
