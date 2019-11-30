<?php
// content of output

 $file = file_get_contents('file.txt');
 $file=str_replace("\n","<br />",$file);

 $instructions = file_get_contents('instructions.txt');
 $instructions=str_replace("\n","<br />",$instructions);

 $memory = file_get_contents('display/memory.txt');
 $memory=str_replace("\n","<br />",$memory);


 $regFile = file_get_contents('display/regmem.txt');
 $regFile=str_replace("\n","<br />",$regFile);


 $PC = file_get_contents('display/PC.txt');
 $PC=str_replace("\n","<br />",$PC);






?>



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
     <!-- info -->
      <div class="col-md-4 offset-md-1">
        <br><br>
        <div class="card text-center">
           <div class="card-header">
               info
           </div>
       <div class="card-body">

          <p> instruction : </p>
        <p>  <?php echo $instructions;?></p>
          <p> binary :</p>
         <p>  <?php echo $file;?></p>

      </div>
      
        </div>
      </div>
      <!-- memory -->
      <div class="col-md-4 offset-md-1">
        <br><br>
        <div class="card text-center">
           <div class="card-header">
               memory
           </div>
       <div class="card-body">
          <p>  <?php echo $memory;?></p>

      </div>
      
        </div>
      </div>

      <!-- regFile -->
       <div class="col-md-4 offset-md-1">
                <br><br>
        <div class="card text-center">
           <div class="card-header">
               regFile
           </div>
       <div class="card-body">
          <p>  <?php echo $regFile;?></p>

      </div>
      
        </div>
      </div>

      <!-- PC -->
       <div class="col-md-4 offset-md-1">
                <br><br>
        <div class="card text-center">
           <div class="card-header">
               PC
           </div>
       <div class="card-body">
          <p>  <?php echo $PC;?></p>

      </div>
      
        </div>
      </div>
     </div>
    
   </div>

   
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>