<!DOCTYPE html>
<html>
<head>
	<title>modificateur des liens</title>
	<meta charset="utf-8">
</head>
<body>
<form method="post" action="reception.php" enctype="multipart/form-data">
     <input type="hidden" name="MAX_FILE_SIZE" value="1048576" />
     <input type="file" name="html" id="html" /> 
     <label for="html">HTML</label><br />
     <input type="hidden" name="MAX_FILE_SIZE" value="1048576" />
     <input type="file" name="csv" id="csv" />
     <label for="csv">CSV</label><br />
     <input type="submit" name="submit" value="Convertir" />
</form>

</body>
</html>