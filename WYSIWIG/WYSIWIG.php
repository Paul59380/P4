<?php
session_start();
?>
<!DOCTYPE html>

<html lang="en">
<title>Jean Forteroche</title>
<meta charset="UTF-8">
<link href="../public/design.css" rel="stylesheet" type="text/css">
<link href="style.css" rel="stylesheet" type="text/css">
<meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport">
<meta content="Site web de Jean Forteroche" name="description"/>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.0/css/all.css"
      integrity="sha384-Mmxa0mLqhmOeaE8vgOSbKacftZcsNYDjQzuCOm6D02luYSzBG8vpaOykv9lFQ51Y" crossorigin="anonymous">

<head>
    <title>Title</title>
    <script src="https://cloud.tinymce.com/5/tinymce.min.js?apiKey=******************************************"></script>
    <script>
        tinymce.init({
            selector: '#mytextarea'
        });
    </script>
</head>
<body>
<?= $_SESSION['name'] ?>
<form method="post">
    <label for="mytextarea"></label>
    <textarea id="mytextarea"></textarea>
</form>

<button id="event">Preview News</button>

<div id="testText">

</div>
</body>

<script src="index.js">
</script>

</html>
