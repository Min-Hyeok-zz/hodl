<?php
// include_once("./monitor.getdata.php");
// exit;
include_once('./_common.php');
$g5['title'] = '모니터링 프로';
include_once('./_head.php');
?>
<script src="https://unpkg.com/axios@0.12.0/dist/axios.min.js"></script>
<script src="https://unpkg.com/lodash@4.13.1/lodash.min.js"></script>
<script src="https://unpkg.com/react@16/umd/react.production.min.js" crossorigin></script>
<script src="https://unpkg.com/react-dom@16/umd/react-dom.production.min.js" crossorigin></script>
<script src="<?php echo G5_JS_URL ?>/vue.js"></script>
<script type="text/javascript">
  import React, { Component } from 'react';

class Monitor extends Component {
    receiverclass(url, divid){
        // let ws = new WebSocket(url);
        function wsfunc(url, output)
        {
            this.websocket = new WebSocket(url);
            this.websocket.onopen = function(evt) { onOpen(output, evt) };
            this.websocket.onclose = function(evt) { onClose(output, evt) };
            this.websocket.onmessage = function(evt) { onMessage(output, evt) };
            this.websocket.onerror = function(evt) { onError(output, evt) };
        }
        function onOpen(output, evt)
        {
            writeToScreen(output, "CONNECTED");
            doSend("{\"type\" : \"subscribe\", \"target\" : \"Upbit\"}");
        }
        function onClose(output, evt)
        {
            writeToScreen(output, "DISCONNECTED");
        }
        function onMessage(output, evt)
        {
            writeToScreen(output, '<span style="color: blue;">RESPONSE: ' + evt.data+'</span>');
        }
        function onError(output, evt)
        {
            writeToScreen(output, '<span style="color: red;">ERROR:</span> ' + evt.data);
        }
        function doSend(output, message)
        {
            writeToScreen(output, "SENT: " + message);
            this.websocket.send(message);
        }
        function writeToScreen(output, message)
        {
            let pre = document.createElement("p");
            pre.style.wordWrap = "break-word";
            pre.innerHTML = message;
            output.appendChild(pre);
        }
        let output = document.getElementById(divid);
        wsfunc(url, output);
    }
    // componentDidMount(){
    //     this.receiver = this.receiverclass("ws://127.0.0.1:8765", "Monitor");
    // }
    render() {
        // window.addEventListener("load", init, false);
        const wsurl = "ws://127.0.0.1:8765";
        const divid = "Monitor";
        return (
            <div>
                {/*<div id={""}*/}
                <button onClick={() => this.receiverclass(wsurl, divid)}>start</button>
            <div className={divid} id={divid}>
                dsfg
            </div>
            </div>
        );
    }
}

export default Monitor;

</script>
<div id="app">
	
	<pre v-text="val"></pre>
</div>
<button class="a">으dd하</button>
<script>

</script>
  <h2>WebSocket Test</h2>

  <div id="output" style="width: 100%;height: 400px;overflow: scroll;"></div>
<?php
	include_once('./_tail.php');
?>