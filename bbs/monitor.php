<?php
include_once('./_common.php');
$g5['title'] = '모니터링 프로';
include_once('./_head.php');
?>
<script src="https://unpkg.com/axios@0.12.0/dist/axios.min.js"></script>
<script src="https://unpkg.com/lodash@4.13.1/lodash.min.js"></script>
<script src="<?php echo G5_JS_URL ?>/vue.js"></script>
<div id="app">
	<button @click="getValue">으하</button>
	<pre v-text="val"></pre>
</div>
  <script language="javascript" type="text/javascript">


  </script>


<script>
  var wsUri = "ws://ec2-user@ec2-13-209-19-103.ap-northeast-2.compute.amazonaws.com:8765";
  var output;

  function init()
  {
    output = document.getElementById("output");
    testWebSocket();
  }

  function testWebSocket()
  {
    websocket = new WebSocket(wsUri);
    websocket.onopen = function(evt) { onOpen(evt) };
    websocket.onclose = function(evt) { onClose(evt) };
    websocket.onmessage = function(evt) { onMessage(evt) };
    websocket.onerror = function(evt) { onError(evt) };
  }

  function onOpen(evt)
  {
    writeToScreen("CONNECTED");
    doSend("{\"type\" : \"subscribe\", \"target\" : \"Upbit\"}");
  }

  function onClose(evt)
  {
    writeToScreen("DISCONNECTED");
  }

  function onMessage(evt)
  {
    writeToScreen('<span style="color: blue;">RESPONSE: ' + evt.data+'</span>');
  }

  function onError(evt)
  {
    writeToScreen('<span style="color: red;">ERROR:</span> ' + evt.data);
  }

  function doSend(message)
  {
    writeToScreen("SENT: " + message);
    websocket.send(message);
  }
  function writeToScreen(message)
  {
    var pre = document.createElement("p");
    pre.style.wordWrap = "break-word";
    pre.innerHTML = message;
    output.appendChild(pre);
  }

  window.addEventListener("load", init, false);
  var a = doSend.message;
	var app = new Vue({
		el: '#app',
		data: {
			val: a
		},
		methods: {
			getValue () {
				axios.get('ws://ec2-user@ec2-13-209-19-103.ap-northeast-2.compute.amazonaws.com:8765')
				.then((res) => {
					console.log(res)
				})
			}
		}
	})
</script>
  <h2>WebSocket Test</h2>

  <div id="output"></div>
<?php
	include_once('./_tail.php');
?>