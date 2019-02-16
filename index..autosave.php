<!DOCTYPE html>
<html>
<head>
	<title>modificateur des liens</title>
	<meta charset="utf-8">
</head>
<body>
<form action="script.php"  enctype="multipart/form-data"  method="GET">
	<input type="hidden" name="MAX_FILE_SIZE" value="1048576" />
	<input type="file" name="newsletter" id="newsletter">
	<label for="newsletter">Newsletter Max 1 GO</label>
	<label for="titre">Nom de la newsletter</label>
	<input type="text" name="titre" value="newsletter">
	<label for="liste_liens">liste des liens</label>
	<input type="file" name="liste_liens" id="liste_liens">
	<input type="submit" name="">
</form>
</body>
</html>