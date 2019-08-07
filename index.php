<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible">
    <script src="https://cdn.jsdelivr.net/npm/d3@4.13.0/build/d3.min.js" charset="utf-8"></script>
	<script src="https://cdn.jsdelivr.net/npm/taucharts@2/dist/taucharts.min.js" type="text/javascript"></script>
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/taucharts@2/dist/taucharts.min.css">
	<link rel="stylesheet" href="assets/styles/style.css">
	<script src="assets/js/script.js"></script>
    <title>Super graph constructor</title>
</head>
<body>
	<div class="container">
		<div id='graph'></div>
	</div>
	<form action="parser.php" method="post" class="fileForm">
		<input type="file" name="graphData" id="file" class="fileForm__fileInput" accept=".html" required>
		<button type="submit" class="fileForm__submit">Построить график</button>
	</form>
</body>
</html>
<?
include('./parser.php');
?>