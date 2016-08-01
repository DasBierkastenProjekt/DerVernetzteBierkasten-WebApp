<html>
<head>
  <meta charset="utf-8">
  <meta name="author" content="Karsten Lehmann">
  <noscript>
    <meta http-equiv="refresh" content="1" >
  </noscript>
  <link rel="icon" href="/favicon.ico" type="image/vnd.microsoft.icon">
  <title>Der vernetzte Bierkasten</title>
  <link rel="stylesheet" href="style.css" type="text/css">
  <script src="bierkasten.js"></script>
</head>
<body onload="onload()">
<div>
<h1>Der vernetzte Bierkasten</h1>
<!-- Kasten -->
<table class='kasten'>
<?php
function img ($val, $i) {
    global $img;
    if ($val == "0") {
        echo "    <td class='kasten_inner'><img class='flasche' id='Flasche".$i."' src='leer.png'></td>\n";
    } else {
        echo "    <td class='kasten_inner'><img class='flasche' id='Flasche".$i."' src='voll.png'></td>\n";
    }
}
$stat = file_get_contents("http://localhost:6000/get_bier_data");

for ($i = 1; $i <= 20; $i++) {
    if ($i % 5 == 1) {
        echo "  <tr class='kasten_inner'>\n";
        img($stat[$i - 1], $i);
    } elseif ($i % 5 == 0) {
        img($stat[$i - 1], $i);
        echo "  </tr>\n";
    } else {
        img($stat[$i - 1], $i);
    }
}
?>
</table>
</div>
</body>
</html>
