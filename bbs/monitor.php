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
<div id="app">
    <p v-text="res"></p>
    <button onclick="test();">값변경</button>
    <button onclick="aa();">출력</button>
</div>
  <script language="javascript" type="text/javascript">

  //  var wsUri = "ws://fin.iptime.org:8765";
  //   var output;
  //  
  // function init()
  // {
  //   output = document.getElementById("output");
  //   testWebSocket();
  // }

  // function testWebSocket()
  // {
  //   websocket = new WebSocket(wsUri);
  //   websocket.onopen = function(evt) { onOpen(evt) };
  //   websocket.onclose = function(evt) { onClose(evt) };
  //   websocket.onmessage = function(evt) { onMessage(evt) };
  //   websocket.onerror = function(evt) { onError(evt) };
  // }

  // function onOpen(evt)
  // {
  //   writeToScreen("CONNECTED");
  //   doSend("{\"type\" : \"subscribe\", \"target\" : \"Upbit\"}");
  // }

  // function onClose(evt)
  // {
  //   writeToScreen("DISCONNECTED");
  // }

  // function onMessage(evt)
  // {
  //   writeToScreen('<span style="color: blue;">RESPONSE: ' + evt.data+'</span>');
  // }

  // function onError(evt)
  // {
  //   writeToScreen('<span style="color: red;">ERROR:</span> ' + evt.data);
  // }

  // function doSend(message)
  // {
  //   writeToScreen("SENT: " + message);
  //   websocket.send(message);
  // }

  // function writeToScreen(message)
  // {
  //   var pre = document.createElement("p");
  //   pre.style.wordWrap = "break-word";
  //   pre.innerHTML = message;
  //   output.appendChild(pre);
  // }

  // window.addEventListener("load", init, false);

  var a = "hello";

  function test () {
    this.a = "asd";
  }

  function aa () {
    alert(this.a);
  }

  var app = new Vue({
    el: '#app',
    data: {
        res: a
    }
  })

  </script>

  <h2>WebSocket Test</h2>

  <div id="output"></div>
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