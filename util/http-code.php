<?php
    if(isset($_GET['code'])) {
        http_response_code($_GET['code']);
        die();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Http Response Code Util</title>
</head>
<body>
    <form method="get">
        <label for="code">Response code</label>
        <input type="number" name="code" id="code">
        <input type="submit">Submit
    </form>
</body>
</html>