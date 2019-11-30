<?php
  include_once('globalVariable.php');
  include_once('intoBinary.php');
   set_time_limit(10);

// clear Old Test
// $my_file = fopen("C:\Users/Muhammad/Desktop/veilog/file.txt", "w"); 
// fwrite($my_file,""  );
//  fclose($my_file);
  
// clear file text
  $file = fopen("file.txt","w");
  fwrite($file, ""  );
  fclose($file);
    
    /////////
 $my_file = fopen("automaticTest/instructions.txt", "r"); 
// copy to instTest
 $content = file_get_contents('automaticTest/instructions.txt');
 fclose($my_file);

 $file = fopen("insTest.txt","w");
  fwrite($file, $content );
  fclose($file);

 $my_file = fopen("automaticTest/instructions.txt", "r"); 

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
  // $file = fopen("C:\Users/Muhammad/Desktop/verilog/file.txt","a");
  // fwrite($file, "$binary\n"  );
  // fclose($file);
    //
  $file = fopen("file.txt","a");
  fwrite($file, "$binary\n"  );
  fclose($file);

  // echo "string";
    

  } 
   // run modelism
   //shell_exec('vsim -c -do "run -all" C:/Modeltech_pe_edu_10.4a/examples/work.test_tb'); 
  
  
// file is closed using fclose() function 
fclose($my_file); 
$output = shell_exec('vsim -c -do "run -all" D:/Modeltech_pe_edu_10.4a/examples/work.mips_testbench'); 
//echo $output;
 header("Location:http://localhost/CO_project/automaticTest/displyTest.php");

