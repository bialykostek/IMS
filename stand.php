<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="styles.css" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="shortcut icon" href="favicon.ico" />
        <script src="jquery.js"></script>
        <title>Stand <?php echo($_GET['id']); ?></title>
        <script>
            $(document).ready(function() {
			$("#loader").load("standInfo.php?id=" + <?php echo($_GET['id']); ?>);
			var refresh = setInterval(function() {
			$("#loader").load("standInfo.php?id=" + <?php echo($_GET['id']); ?>);
			}, 1000);
			});
        </script>
    </head>
    <body>
        <div id="loader"></div>
    </body>
</html>
