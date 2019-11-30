<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Home</title>
    <style type="text/css">
        input{
        	text-align: center;
        }
    </style>
  </head>
  <body>
   <div class="container">
   	 <div class="row">

   	 	<div class="col-md-6 offset-md-3">
            <div style="margin-top:150px;border:1 px bold">
                <form action="loading.php" method="get">
                	<div class="input-group">
                      <!-- <input  type="text" placeholder="Enter A new instruction" name="inst"> -->
                       <textarea class="form-control width200" name="instructions" rows="10" cols="30"></textarea>

                  </div>
                  <br>
                      <span class="input-group-btn">
                         <button class="btn btn-info" type="submit">Process</button>
                      </span>
                </form>
            	
            </div>
            <br> <br> 
            <hr>
            <br> <br>

             <div >
            	 <form>
                	<!-- <button type="button" class="btn btn-info btn-lg btn-block" onclick="window.location.href = 'https://w3docs.com';">Make AN Automatic test</button> -->

                   <a href="/CO_project/handel.php" class="button btn btn-info btn-lg btn-block ">Make AN Automatic test</a>

                </form>
            	
            </div>
        </div>
   	 	
   	 </div>
   	
   </div>

   
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>