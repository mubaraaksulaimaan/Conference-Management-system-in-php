
<!DOCTYPE html>
<html>
	<head>
		<title>
			Success
		</title>
		<link href="styling.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	</head>

	<body>
    
        	<div class="col-lg-6 col-xs-offset-3 main">
                <div class="panel panel-default">
                  <div class="panel-heading">
                  	<h1 class="text-center" style="color: red;"><b>Error</b></h1>
                  </div>
                </div>
          </div>

            <?php 
              $url = $_SERVER['HTTP_REFERER'];
              //echo $url;
              echo '<meta http-equiv="refresh" content="2;URL=' . $url . '">';
            ?>
    
        <footer>
            
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        </footer>
	</body>

</html>