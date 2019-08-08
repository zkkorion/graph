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
    <title>Super graph drawer</title>
</head>
<body>
	<div class="container">
		<h1 class="mainHeader">Добро пожаловать в самое лучшее приложение по построению графиков</h1>
			<div id='graph' class="graph"></div>
		<div class="fileFormCont">
			
			<form action="./parser.php" method="post" class="fileForm" enctype="multipart/form-data">
				<div class="dropArea">Выберите файл или переместите сюда</div>
				<input type="file" name="graphData" class="fileForm__fileInput" accept=".html" />
				<button type="submit" class="fileForm__submit btn">Построить график</button>
			</form>
		</div>
	</div>
</body>
</html>