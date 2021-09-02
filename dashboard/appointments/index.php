
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>jQuery popupWindow.js Examples</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">
<link href="src/popupwindow.css" rel="stylesheet" type="text/css">
<style>
body { background-color:#333;}
.container { margin:70px auto; max-width:728px; color:#fff;}
.example_content {
    display : none;
}
element.style {
    box-sizing: border-box;
    position: fixed;
    inset: 0px;
    display: flex;
    place-content: flex-start;
    pointer-events: none;
    flex-flow: row wrap-reverse;
    z-index: 1200;
}
div.popupwindow_container{
  z-index: 1052!important;
}
</style>
</head>


<body>
<div class="container">
<h1>jQuery popupWindow.js Examples</h1>
</script></div>
<button id="basic-demo_button" class="btn btn-primary">Basic Demo</button>
<div id="basic-demo" class="example_content">  <iframe src="../donate/rapidtest.php" width="100%" height="520px"></iframe></div>
<button id="demo-2_button1" class="btn btn-danger">Multiple Dialogs</button>
<div id="demo-2_first" class="example_content">
    <p>I am a <b>modal</b> window.</p>
    <p>You can open other PopupWindows on top of this! Use the buttons down here:</p>
    <button id="demo-2_button2" class="btn btn-primary">Popup 2</button>
    <button id="demo-2_button3" class="btn btn-primary">Popup 3</button>
</div>
<div id="demo-2_second" class="example_content">
  <iframe src="../donate/rapidtest.php" width="100%" height="520px"></iframe>
</div>
<div id="demo-2_third" class="example_content">I'm a PopupWindow shown on top of a modal one</div>
</div>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="src/popupwindow.js"></script>
<script>

var Demo = (function($, undefined){

  $(function(){
        QuickDemo();
    example2();
    });
  function QuickDemo(){
        $("#basic-demo").PopupWindow({
            autoOpen    : false,
            nativeDrag: false,
              title: "iDonate | Rapid Pass"
        });
        $(".test").on("click", function(event){
            $("#basic-demo").PopupWindow("open");
        });
    }
  function example2(){
        $("#demo-2_first").PopupWindow({
            title       : "Example 2 - Modal window",
            modal       : true,
            autoOpen    : false,
            height      : 250,
            width       : 400,
            top         : 100,
            left        : 300
        });
        $("#demo-2_second").PopupWindow({
            title       : "Other window",
            modal       : false,
            autoOpen    : false,
            top         : 400,
            left        : 100
        });
        $("#demo-2_third").PopupWindow({
            title       : "Yet another one",
            modal       : false,
            autoOpen    : false,
            top         : 400,
            left        : 600
        });

        $("#demo-2_first").on("close.popupwindow", function(event){
            $("#demo-2_second").PopupWindow("close");
            $("#demo-2_third").PopupWindow("close");
        });

        $("#demo-2_button1").on("click", function(event){
            $("#demo-2_first").PopupWindow("open");
        });
        $("#demo-2_button2").on("click", function(event){
            $("#demo-2_second").PopupWindow("open");
        });
        $("#demo-2_button3").on("click", function(event){
            $("#demo-2_third").PopupWindow("open");
        });
    }
  })(jQuery);
</script>
</body>
</html>
