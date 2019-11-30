<?php
 include_once('globalVariable.php');
  include_once('intoBinary.php');

  $inst = 'add $t0,$t1,$t2';

  $file = fopen("instructions.txt","w");
  fwrite($file,$inst);
  fclose($file);


  $my_file = fopen("instructions.txt", "r"); 
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
  fwrite($file, $binary."\n"  );
  fclose($file);

  // echo $binary;
    

  } 
 
  
fclose($my_file); 

echo 'done';

