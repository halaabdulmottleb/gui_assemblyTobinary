<?php
  include_once('globalVariable.php');

  class intoBinary
  {
  	
  	public $inst;
  	public $sub_inst;
  	public $sub_binary;
  	public $op;
  	public $rs;
  	public $rd;
  	public $sham;
  	public $func;
  	public $immediate;
    public $label;
  	public $binary;


  
  	
  	
  	function __construct($inst)
  	{
          

  		$this->inst = $inst;
       if (strpos($this->inst, ':') !== false) {

          $this->inst =  substr($this->inst,strpos($inst, ':') +1 );
          $this->label = substr($this->inst,0,strpos($inst, ':') );

        }
  		$this->sub_inst = substr($this->inst,strrpos($this->inst," " ));
  		$inst = $this->sub_inst;
  		$this->sub_binary = explode(',' ,$inst);
  		$op = substr($this->inst,0, strrpos($this->inst," " ));
        // add
       switch ($op) {
        // rArthmetic
           case "add":
               $this->func = sprintf( "%06d", decbin( 32 ));
               $this->rArthmetic($this->sub_binary);

               break;
           case "and":
              $this->func = sprintf( "%06d", decbin( 36 ));
              $this->rArthmetic($this->sub_binary);
               break;
           case "or":
                $this->func = sprintf( "%06d", decbin( 37 ));
                $this->rArthmetic($this->sub_binary);
               break;

         case "sll":
              $this->op = sprintf( "%06d", decbin( 0 ));
              $this->func =sprintf( "%06d", decbin( 0 ));
              $this->rs =sprintf( "%05d", decbin( 0 ));
              $this->rt = sprintf( "%05d", decbin( $this->sub_binary[1]));
              $this->rd =sprintf( "%05d", decbin( $this->sub_binary[0]));
              $this->sham =sprintf( "%05d", decbin( $this->sub_binary[2]));
              $this->binary = $this->op . $this->rs . $this->rt . $this->rd. $this->sham .  $this->func ;
               break;

         case "jr":
            $this->op = sprintf( "%05d", decbin( 0 ));
            $this->sham = sprintf( "%05d", decbin( 0 ));
            $this->op = sprintf( "%06d", decbin( 0 ));
            $this->rd =  sprintf( "%05d", decbin(0));
              $rs = substr( $this->inst, strpos($this->inst," "));
            $this->rs =  sprintf( "%05d", decbin($rs));
            $this->rt =  sprintf( "%05d", decbin(0));
            $this->func = sprintf( "%06d", decbin(8));
    
      $this->binary = $this->op . $this->rs . $this->rt . $this->rd. $this->sham .  $this->func ;
           
               break;

         case "addi":
            $this->op = sprintf( "%06d", decbin( 8 ));
            $this->iAArthmetic();
               break;
         case "ori":
            $this->op = sprintf( "%06d", decbin( 13 ));
             $this->iAArthmetic();
               break;
               // na2saa 

         case "beq":
             $this->op = sprintf( "%06d", decbin( 4 ));

             $this->iAArthmetic();
               break;

         case "j":
              // operation code
             $this->op = sprintf( "%06d", decbin( 2 ));

             // address of label 

             $my_file = fopen("insTest.txt", "r"); 
             $lineNumber = 0;
             while (! feof ($my_file)) 
               {
                  $line = fgets( $my_file);

                  // search for label 
                   if (strpos($line,'L1:') !== false) {

                    break;

                         }
                         else {
                           $lineNumber++;
                         }
                }
                fclose($my_file);

                // immediate in binary
                $immediate = sprintf( "%026d", decbin( $lineNumber )) ;

                $this->binary = $this->op .$immediate ; 

               break;
         case "jal":


             // operation code
             $this->op = sprintf( "%06d", decbin( 3 ));

             // address of label 

             $my_file = fopen("insTest.txt", "r"); 
             $lineNumber = 0;
             while (! feof ($my_file)) 
               {
                  $line = fgets( $my_file);

                  // search for label 
                   if (strpos($line,'L1:') !== false) {

                    break;

                         }
                         else {
                           $lineNumber++;
                         }
                }
                fclose($my_file);

                // immediate in binary
                $immediate = sprintf( "%026d", decbin( $lineNumber )) ;

                $this->binary = $this->op .$immediate ; 






               break;
        
         case "lw":
            $this->op = sprintf( "%06d", decbin( 35 ));
            $this->loadStore();

               break;
         case "sw":
            $this->op = sprintf( "%06d", decbin( 34 ));
             $this->loadStore();
               break;
         
        }
      
  	}

  	function rArthmetic()
  	{
  		$inst = $this->sub_binary;
  		$this->sham = sprintf( "%05d", decbin( 0 ));
  		$this->op = sprintf( "%06d", decbin( 0 ));
  		$this->rd =  sprintf( "%05d", decbin( $inst[0]));
  		$this->rs =  sprintf( "%05d", decbin( $inst[1]));
  		$this->rt =  sprintf( "%05d", decbin( $inst[2]));
  	
  		$this->binary = $this->op . $this->rs . $this->rt . $this->rd. $this->sham .  $this->func ;

  	}

  	function iAArthmetic() 
  	{  
  		$inst = $this->sub_binary;
  		$this->rt =  sprintf( "%05d", decbin( $inst[0]));
  		$this->rs =  sprintf( "%05d", decbin( $inst[1]));
      
      if(is_numeric($inst[2])) {

  		$this->immediate =  sprintf( "%016d", decbin( $inst[2]));

      }else {
             // search for number of instruction  

         $my_file = fopen("insTest.txt", "r"); 
             $linerOfinst = 0;
             while (! feof ($my_file)) 
               {
                  $line = fgets( $my_file);

                  // search for label 
                   if (strpos($line, $this->inst) !== false) {

                    break;

                         }
                         else {
                           $linerOfinst++;
                         }
                }
          // search for number of label  

             $lineOfLabel = 0;
             fclose($my_file);
             $my_file = fopen("insTest.txt", "r"); 

             while (! feof ($my_file)) 
               {
                  $line = fgets( $my_file);

                  // search for label 
                   if (strpos($line, $this->label.':') !== false) {

                    break;

                         }
                         else {
                           $lineOfLabel++;
                         }
                }

            fclose($my_file);
            
            $immediate =  $linerOfinst-$lineOfLabel -1 ;
            $this->immediate =  sprintf( "%016d", decbin(abs($immediate)));



      }
  		$this->binary = $this->op . $this->rs . $this->rt .$this->immediate;

  	}

  	function loadStore() 
  	{
      $inst = $this->sub_binary;
  		$this->rt =  sprintf( "%05d", decbin( $inst[0]));
  		$rs = substr($inst[1] ,strpos($inst[1], '(')+1 ,  strpos($inst[1], ')')- (strpos($inst[1], '(')+1));
        $immediate = substr($inst[1] ,0,strpos($inst[1], '(')) ;
  		$this->rs =  sprintf( "%05d",decbin($rs));
  		$this->immediate =  sprintf( "%016d", decbin($immediate));
  		$this->binary = $this->op . $this->rs . $this->rt .$this->immediate;

  	}


     
  }

