<?php
    echo '
<h1>Request method</h1>
<p>' . $_SERVER['REQUEST_METHOD'] . '</p>

<h1>$_GET</h1>
<pre>' . print_r($_GET, true) . '</pre>

<h1>$_POST</h1>
<pre>' . print_r($_POST, true) . '</pre>

<h1>$_FILES</h1>
<pre>' . print_r($_FILES, true) . '</pre>

<h1>Usage (POST)</h1>
<pre>curl url -d "a=1&b=2"</pre>
';
?>