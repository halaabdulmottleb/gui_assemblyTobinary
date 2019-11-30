<?php
  include_once('globalVariable.php');
  include_once('intoBinary.php');
   set_time_limit(1000);

   $instructions = $_GET["instructions"];
    // $instructions = 'lw $t0,2($s3)';
 // write in instruction
  $file = fopen("instructions.txt","w");
  fwrite($file,$instructions);
  fclose($file);

  $file = fopen("insTest.txt","w");
  fwrite($file,$instructions);
  fclose($file);

 // clear file text
  $file = fopen("file.txt","w");
  fwrite($file, ""  );
  fclose($file);
    
 // open file of read 
$my_file = fopen("instructions.txt", "r"); 

// prints a single line at a time until end of file is reached 
while (! feof ($my_file)) 
  { 

  // instruction
  $instruction =  fgets($my_file);
  eval("\$instruction = \"$instruction\";");

  // binary
  $binary = new intoBinary($instruction);
  $binary = $binary->binary ;


  // write full Data
  $file = fopen("file.txt","a");
  fwrite($file, "$binary\n"  );
  fclose($file);
    

  } 
 
  
fclose($my_file); 


  // run modelism
  shell_exec('vsim -c -do "run -all" C:/Modeltech_pe_edu_10.4a/examples/work.test_tb'); 
  header("Location:http://localhost/CO_project/display.php");

 // echo 'loading';

?>