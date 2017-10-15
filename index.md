---
layout: default
title: Home
---

<div id="punchline">
Need to send an urgent e-mail but ran out of credit?<br/>
MagicTunnel may save your day.
</div>

<div id="schema">
  <div id="left-schema">
    <b><i>MagicTunnel uses DNS tunneling</i></b>.

    The Internet relies on the Domain Name System (DNS) to convert user-friendly addresses
    like <em>www.magictunnel.net</em> to addresses that the Internet can handle
    (e.g., 151.101.113.147). Your phone sends DNS queries to a DNS server,
    which sends in return the corresponding numerical addresses.

    <ol>
      <li>Connect your phone to a Wifi hotspot or to a mobile network and start MagicTunnel.</li>
      <li>
          MagicTunnel encapsulates your data (e-mail, web browsing, etc.)
          into DNS queries that the network provider's computers send to a DNS server that you control.
          For DNS tunneling to work, the network provider must not filter DNS queries to external servers.
      </li>

      <li>
          Your DNS server extracts the encoded data, forwards it to the internet,
          gets the reply, encapsulates it into a DNS response,
          and sends the response back to the network provider's server.
      </li>

      <li>Your phone receives the response and extracts the data. <i>Your e-mail is sent!</i></li>
    </ol>
  </div>

  <div id="main-schema">
    <div id="schema-1-pda">
        <h3>Android Phone</h3>
        MagicTunnel wraps Internet traffic into DNS queries
    </div>
    <div id="schema-2-ispserver">
        <h3>Network Provider</h3>
        Blocks all communication except DNS queries
    </div>
    <div id="schema-3-server">
        <h3>DNS Server</h3>
        Extracts the data from the DNS queries and forwards it to the Internet
    </div>
  </div>
</div>
