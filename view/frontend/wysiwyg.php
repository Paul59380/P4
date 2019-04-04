<!DOCTYPE html>

<html lang="en">
<title>Jean Forteroche</title>
<meta charset="UTF-8">
<link href="../public/design.css" rel="stylesheet" type="text/css">
<link href="../../WYSIWIG/style.css" rel="stylesheet" type="text/css">
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
<form method="post">
    <p id="titleNewsRedaction">
        <label>Titre : <input type="text" name="titleNews" value="
           <?php
            if (isset($_GET['news'])) {
                if ($_SESSION['name'] == "Jean Frtrch") {
                    echo htmlspecialchars($news->getNews($_GET['news'])->getTitleNews());
                }
            }
            ?>">
        </label>
    </p>
    <label for="mytextarea"></label>
    <textarea name="newsText" id="mytextarea">
        <?php
        if (isset($_GET['news'])) {
            if ($_SESSION['name'] == "Jean Frtrch") {
                echo htmlspecialchars($news->getNews($_GET['news'])->getContainsNews());
            }
        }
        ?>
    </textarea>
    <input id="sendNews" type="submit" value="sendNews" name="sendNews">
</form>

</body>
</html>

