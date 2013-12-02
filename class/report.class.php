<?php
/**
 * @author  Mário Almeida  <prog.almeida@gmail.com> 
 * @file classReport.php  - Classe Padrão para relatórios em PDF
 * @copyright 2011
 */	   

// Constantes do Sistema 

  define('RAIZ_SITE', dirname(__FILE__) . DIRECTORY_SEPARATOR);
 
  $raiz=str_replace("/class","",RAIZ_SITE);
 
  
// Classe Biblioteca do PDF
  //require_once ($raiz."fpdf/fpdf.php"); 
  //require_once ("../../fpdf/fpdf.php"); 


  
  class report extends FPDF
	{ 
     
	 var $titulo   ='';                                        // Título Principal  do Relatório;
	 var $subTitulo='';                                        // SubTítulo da Relatório;
	 var $logo     ='';            // Logo da Empresa;
	 var $configHeader ='FP';                                  // Configurar Comportamento da Header - AP = ALL PAGES ; FP = FIRST PAGE; 
	 
	 var $lineFooter1='RUA PE JOAO RIBEIRO Nº 48  CONJ CANARANAS -  CIDADE NOVA - MANAUS - AM CEP.: 69087-000 Tel.: (92) 3321-4330/3321-4340 Cel: 9128-5195';  // Linha 1 do Rodapé
	 var $lineFooter2='C.N.P.J.: 08.958.784/0001-77';   // Linha 2 do Rodapé         
	 
	 var $ativaRodap=true;
	 
	 var $tamCellY = 4 ;  // Tamanho da Altura da Célula;   
	 
	 var $orientacao ='P';  // Portrait=P ou Landscape=L;
	 
	private $T128;                                             // tabela de codigos 128
    private $ABCset="";                                        // conjunto de caracteres legiveis em 128
    private $Aset="";                                          // grupo A do conjunto de de caracteres legiveis
    private $Bset="";                                          // grupo B do conjunto de caracteres legiveis
    private $Cset="";                                          // grupo C do conjunto de caracteres legiveis
    private $SetFrom;                                          // converter de 
    private $SetTo;                                            // converter para
    private $JStart = array("A"=>103, "B"=>104, "C"=>105);     // Caracteres de seleção do grupo 128
    private $JSwap = array("A"=>101, "B"=>100, "C"=>99);       // Caracteres de troca de grupo

    function __construct($orientation='P',$unit='mm',$format='A4') {
       //passar parametros para a classe principal 
       parent::FPDF($orientation,$unit,$format);
       // composição dos caracteres do barcode 128
       $this->T128[] = array(2, 1, 2, 2, 2, 2);           //0 : [ ]
       $this->T128[] = array(2, 2, 2, 1, 2, 2);           //1 : [!]
       $this->T128[] = array(2, 2, 2, 2, 2, 1);           //2 : ["]
       $this->T128[] = array(1, 2, 1, 2, 2, 3);           //3 : [#]
       $this->T128[] = array(1, 2, 1, 3, 2, 2);           //4 : [$]
       $this->T128[] = array(1, 3, 1, 2, 2, 2);           //5 : [%]
       $this->T128[] = array(1, 2, 2, 2, 1, 3);           //6 : [&]
       $this->T128[] = array(1, 2, 2, 3, 1, 2);           //7 : [']
       $this->T128[] = array(1, 3, 2, 2, 1, 2);           //8 : [(]
       $this->T128[] = array(2, 2, 1, 2, 1, 3);           //9 : [)]
       $this->T128[] = array(2, 2, 1, 3, 1, 2);           //10 : [*]
       $this->T128[] = array(2, 3, 1, 2, 1, 2);           //11 : [+]
       $this->T128[] = array(1, 1, 2, 2, 3, 2);           //12 : [,]
       $this->T128[] = array(1, 2, 2, 1, 3, 2);           //13 : [-]
       $this->T128[] = array(1, 2, 2, 2, 3, 1);           //14 : [.]
       $this->T128[] = array(1, 1, 3, 2, 2, 2);           //15 : [/]
       $this->T128[] = array(1, 2, 3, 1, 2, 2);           //16 : [0]
       $this->T128[] = array(1, 2, 3, 2, 2, 1);           //17 : [1]
       $this->T128[] = array(2, 2, 3, 2, 1, 1);           //18 : [2]
       $this->T128[] = array(2, 2, 1, 1, 3, 2);           //19 : [3]
       $this->T128[] = array(2, 2, 1, 2, 3, 1);           //20 : [4]
       $this->T128[] = array(2, 1, 3, 2, 1, 2);           //21 : [5]
       $this->T128[] = array(2, 2, 3, 1, 1, 2);           //22 : [6]
       $this->T128[] = array(3, 1, 2, 1, 3, 1);           //23 : [7]
       $this->T128[] = array(3, 1, 1, 2, 2, 2);           //24 : [8]
       $this->T128[] = array(3, 2, 1, 1, 2, 2);           //25 : [9]
       $this->T128[] = array(3, 2, 1, 2, 2, 1);           //26 : [:]
       $this->T128[] = array(3, 1, 2, 2, 1, 2);           //27 : [;]
       $this->T128[] = array(3, 2, 2, 1, 1, 2);           //28 : [<]
       $this->T128[] = array(3, 2, 2, 2, 1, 1);           //29 : [=]
       $this->T128[] = array(2, 1, 2, 1, 2, 3);           //30 : [>]
       $this->T128[] = array(2, 1, 2, 3, 2, 1);           //31 : [?]
       $this->T128[] = array(2, 3, 2, 1, 2, 1);           //32 : [@]
       $this->T128[] = array(1, 1, 1, 3, 2, 3);           //33 : [A]
       $this->T128[] = array(1, 3, 1, 1, 2, 3);           //34 : [B]
       $this->T128[] = array(1, 3, 1, 3, 2, 1);           //35 : [C]
       $this->T128[] = array(1, 1, 2, 3, 1, 3);           //36 : [D]
       $this->T128[] = array(1, 3, 2, 1, 1, 3);           //37 : [E]
       $this->T128[] = array(1, 3, 2, 3, 1, 1);           //38 : [F]
       $this->T128[] = array(2, 1, 1, 3, 1, 3);           //39 : [G]
       $this->T128[] = array(2, 3, 1, 1, 1, 3);           //40 : [H]
       $this->T128[] = array(2, 3, 1, 3, 1, 1);           //41 : [I]
       $this->T128[] = array(1, 1, 2, 1, 3, 3);           //42 : [J]
       $this->T128[] = array(1, 1, 2, 3, 3, 1);           //43 : [K]
       $this->T128[] = array(1, 3, 2, 1, 3, 1);           //44 : [L]
       $this->T128[] = array(1, 1, 3, 1, 2, 3);           //45 : [M]
       $this->T128[] = array(1, 1, 3, 3, 2, 1);           //46 : [N]
       $this->T128[] = array(1, 3, 3, 1, 2, 1);           //47 : [O]
       $this->T128[] = array(3, 1, 3, 1, 2, 1);           //48 : [P]
       $this->T128[] = array(2, 1, 1, 3, 3, 1);           //49 : [Q]
       $this->T128[] = array(2, 3, 1, 1, 3, 1);           //50 : [R]
       $this->T128[] = array(2, 1, 3, 1, 1, 3);           //51 : [S]
       $this->T128[] = array(2, 1, 3, 3, 1, 1);           //52 : [T]
       $this->T128[] = array(2, 1, 3, 1, 3, 1);           //53 : [U]
       $this->T128[] = array(3, 1, 1, 1, 2, 3);           //54 : [V]
       $this->T128[] = array(3, 1, 1, 3, 2, 1);           //55 : [W]
       $this->T128[] = array(3, 3, 1, 1, 2, 1);           //56 : [X]
       $this->T128[] = array(3, 1, 2, 1, 1, 3);           //57 : [Y]
       $this->T128[] = array(3, 1, 2, 3, 1, 1);           //58 : [Z]
       $this->T128[] = array(3, 3, 2, 1, 1, 1);           //59 : [[]
       $this->T128[] = array(3, 1, 4, 1, 1, 1);           //60 : [\]
       $this->T128[] = array(2, 2, 1, 4, 1, 1);           //61 : []]
       $this->T128[] = array(4, 3, 1, 1, 1, 1);           //62 : [^]
       $this->T128[] = array(1, 1, 1, 2, 2, 4);           //63 : [_]
       $this->T128[] = array(1, 1, 1, 4, 2, 2);           //64 : [`]
       $this->T128[] = array(1, 2, 1, 1, 2, 4);           //65 : [a]
       $this->T128[] = array(1, 2, 1, 4, 2, 1);           //66 : [b]
       $this->T128[] = array(1, 4, 1, 1, 2, 2);           //67 : [c]
       $this->T128[] = array(1, 4, 1, 2, 2, 1);           //68 : [d]
       $this->T128[] = array(1, 1, 2, 2, 1, 4);           //69 : [e]
       $this->T128[] = array(1, 1, 2, 4, 1, 2);           //70 : [f]
       $this->T128[] = array(1, 2, 2, 1, 1, 4);           //71 : [g]
       $this->T128[] = array(1, 2, 2, 4, 1, 1);           //72 : [h]
       $this->T128[] = array(1, 4, 2, 1, 1, 2);           //73 : [i]
       $this->T128[] = array(1, 4, 2, 2, 1, 1);           //74 : [j]
       $this->T128[] = array(2, 4, 1, 2, 1, 1);           //75 : [k]
       $this->T128[] = array(2, 2, 1, 1, 1, 4);           //76 : [l]
       $this->T128[] = array(4, 1, 3, 1, 1, 1);           //77 : [m]
       $this->T128[] = array(2, 4, 1, 1, 1, 2);           //78 : [n]
       $this->T128[] = array(1, 3, 4, 1, 1, 1);           //79 : [o]
       $this->T128[] = array(1, 1, 1, 2, 4, 2);           //80 : [p]
       $this->T128[] = array(1, 2, 1, 1, 4, 2);           //81 : [q]
       $this->T128[] = array(1, 2, 1, 2, 4, 1);           //82 : [r]
       $this->T128[] = array(1, 1, 4, 2, 1, 2);           //83 : [s]
       $this->T128[] = array(1, 2, 4, 1, 1, 2);           //84 : [t]
       $this->T128[] = array(1, 2, 4, 2, 1, 1);           //85 : [u]
       $this->T128[] = array(4, 1, 1, 2, 1, 2);           //86 : [v]
       $this->T128[] = array(4, 2, 1, 1, 1, 2);           //87 : [w]
       $this->T128[] = array(4, 2, 1, 2, 1, 1);           //88 : [x]
       $this->T128[] = array(2, 1, 2, 1, 4, 1);           //89 : [y]
       $this->T128[] = array(2, 1, 4, 1, 2, 1);           //90 : [z]
       $this->T128[] = array(4, 1, 2, 1, 2, 1);           //91 : [{]
       $this->T128[] = array(1, 1, 1, 1, 4, 3);           //92 : [|]
       $this->T128[] = array(1, 1, 1, 3, 4, 1);           //93 : [}]
       $this->T128[] = array(1, 3, 1, 1, 4, 1);           //94 : [~]
       $this->T128[] = array(1, 1, 4, 1, 1, 3);           //95 : [DEL]
       $this->T128[] = array(1, 1, 4, 3, 1, 1);           //96 : [FNC3]
       $this->T128[] = array(4, 1, 1, 1, 1, 3);           //97 : [FNC2]
       $this->T128[] = array(4, 1, 1, 3, 1, 1);           //98 : [SHIFT]
       $this->T128[] = array(1, 1, 3, 1, 4, 1);           //99 : [Cswap]
       $this->T128[] = array(1, 1, 4, 1, 3, 1);           //100 : [Bswap]
       $this->T128[] = array(3, 1, 1, 1, 4, 1);           //101 : [Aswap]
       $this->T128[] = array(4, 1, 1, 1, 3, 1);           //102 : [FNC1]
       $this->T128[] = array(2, 1, 1, 4, 1, 2);           //103 : [Astart]
       $this->T128[] = array(2, 1, 1, 2, 1, 4);           //104 : [Bstart]
       $this->T128[] = array(2, 1, 1, 2, 3, 2);           //105 : [Cstart]
       $this->T128[] = array(2, 3, 3, 1, 1, 1);           //106 : [STOP]
       $this->T128[] = array(2, 1);                       //107 : [END BAR]
       for ($i = 32; $i <= 95; $i++) {   // conjunto de caracteres
              $this->ABCset .= chr($i);
       }
       $this->Aset = $this->ABCset;
       $this->Bset = $this->ABCset;
       for ($i = 0; $i <= 31; $i++) {
              $this->ABCset .= chr($i);
              $this->Aset .= chr($i);
       }
       for ($i = 96; $i <= 126; $i++) {
              $this->ABCset .= chr($i);
              $this->Bset .= chr($i);
       }
       $this->Cset="0123456789";
       for ($i=0; $i<96; $i++) {  // convertendo grupos A & B  
              @$this->SetFrom["A"] .= chr($i);
              @$this->SetFrom["B"] .= chr($i + 32);
              @$this->SetTo["A"] .= chr(($i < 32) ? $i+64 : $i-32);
              @$this->SetTo["B"] .= chr($i);
       }
    }//fim __construct
	
	
	 /**
     * Code128
     * Imprime barcode 128
     * @package     FPDF
     * @name        Code128
     * @version     1.0
     * @author      Roland Gautier
     */
    public function Code128($x,$y,$code,$w,$h) {
       $Aguid=""; 
       $Bguid="";
       $Cguid="";
       for ($i=0; $i < strlen($code); $i++) {
            $needle=substr($code,$i,1);
            $Aguid .= ((strpos($this->Aset,$needle)===FALSE) ? "N" : "O"); 
            $Bguid .= ((strpos($this->Bset,$needle)===FALSE) ? "N" : "O"); 
              $Cguid .= ((strpos($this->Cset,$needle)===FALSE) ? "N" : "O");
       }
       $SminiC = "OOOO";
       $IminiC = 4;
       $crypt = "";
       while ($code > "") {
              $i = strpos($Cguid,$SminiC);
              if ($i!==FALSE) {
                     $Aguid [$i] = "N";
                     $Bguid [$i] = "N";
              }
              if (substr($Cguid,0,$IminiC) == $SminiC) { 
                     $crypt .= chr(($crypt > "") ? $this->JSwap["C"] : $this->JStart["C"]);
                     $made = strpos($Cguid,"N");
                     if ($made === FALSE) $made = strlen($Cguid);
                     if (fmod($made,2)==1) $made--;
                     for ($i=0; $i < $made; $i += 2) $crypt .= chr(strval(substr($code,$i,2)));
                     $jeu = "C";
              } else {
                     $madeA = strpos($Aguid,"N");
                     if ($madeA === FALSE) $madeA = strlen($Aguid);
                     $madeB = strpos($Bguid,"N");
                     if ($madeB === FALSE) $madeB = strlen($Bguid);
                     $made = (($madeA < $madeB) ? $madeB : $madeA );
                     $jeu = (($madeA < $madeB) ? "B" : "A" );
                     $jeuguid = $jeu . "guid";
                     $crypt .= chr(($crypt > "") ? $this->JSwap["$jeu"] : $this->JStart["$jeu"]);
                     $crypt .= strtr(substr($code, 0,$made), $this->SetFrom[$jeu], $this->SetTo[$jeu]);
              }
              $code = substr($code,$made);
              $Aguid = substr($Aguid,$made);
              $Bguid = substr($Bguid,$made);
              $Cguid = substr($Cguid,$made);
       }
       $check=ord($crypt[0]);
       for ($i=0; $i<strlen($crypt); $i++) {
              $check += (ord($crypt[$i]) * $i);
       }
       $check %= 103;
       $crypt .= chr($check) . chr(106) . chr(107);
       $i = (strlen($crypt) * 11) - 8;
       $modul = $w/$i;
       for ($i=0; $i<strlen($crypt); $i++) {
              $c = $this->T128[ord($crypt[$i])];
              for ($j=0; $j<count($c); $j++) {
                     $this->Rect($x,$y,$c[$j]*$modul,$h,"F");
                     $x += ($c[$j++]+$c[$j])*$modul;
              }
       }
    } //fim Code128
	
	
	 
	  //Funcçoes de Rotação e Marca D'agua
	 
	  var $angle=0;

	  function Rotate($angle,$x=-1,$y=-1){
		  if($x==-1)
			  $x=$this->x;
		  if($y==-1)
			  $y=$this->y;
		  if($this->angle!=0)
			  $this->_out('Q');
		  $this->angle=$angle;
		  if($angle!=0)
		  {
			  $angle*=M_PI/180;
			  $c=cos($angle);
			  $s=sin($angle);
			  $cx=$x*$this->k;
			  $cy=($this->h-$y)*$this->k;
			  $this->_out(sprintf('q %.5F %.5F %.5F %.5F %.2F %.2F cm 1 0 0 1 %.2F %.2F cm',$c,$s,-$s,$c,$cx,$cy,-$cx,-$cy));
		  }
	  }
	  
	  function _endpage(){
		  if($this->angle!=0)
		  {
			  $this->angle=0;
			  $this->_out('Q');
		  }
		  parent::_endpage();
	  }
	 
	 
	 function RotatedText($x,$y,$txt,$angle){
		  //Text rotated around its origin
		  $this->Rotate($angle,$x,$y);
		  $this->Text($x,$y,$txt);
		  $this->Rotate(0);
	  }

	  function RotatedImage($file,$x,$y,$w,$h,$angle){
		  //Image rotated around its upper-left corner
		  $this->Rotate($angle,$x,$y);
		  $this->Image($file,$x,$y,$w,$h);
		  $this->Rotate(0);
	  }
	 
	 
	 // Setar Logo
	 
	public function setLogo($src){
		 
		 
			 $this->logo=$src;
			 		 
	 }
	 
	  	   
	// Setar Título principal do Relatório.	   
		   
     public function setTitulo($val)
	  {
		  $this->titulo = $val;
	  }
	 
	// Setar Sub Título do Relatório; 
	  
	 public function setSubTitulo($val)
	  {
		  $this->subTitulo = $val;
	  } 
	 
	// Setar Configuração do comportamento da header;
	 
	 public function setConfigHeader($val)
	  {
		  $this->configHeader = $val; 
	  }
	  
	// Seta Linhas do Rodapé;
	
	 public function setLineRodape($line,$txt)
	  {
		  if($line == 1)
		   {
			   $this->lineFooter1=$txt;
		   }
		  else
		   {
			   $this->lineFooter2=$txt;  
		   }
	  }
	  
	 // Ativa e Desativa Rodapé;
	 
	 public function ativaRodape($val)
	  {
		  $this->ativaRodap=$val;
	  }
	  
	 //Cabeçalho do Relatório 
	 
	 public function Header()
	   {
		  
		 if($this->orientacao=='P')
		 { 
		   
		   if ($this->configHeader=='FP' && $this->page==1)
	        {
				$today = date("d/m/Y");
	            $hora=date("H:i:s");									
		        $this->SetLeftMargin(5);	
				$this->Cell(-3);	
				$this->Cell(35,16,'','B',0,'C');	
				//$this->Image($this->logo,8,5,20,20);
				$this->SetFont('Arial','B',10);				
				$this->Cell(125,8,($this->titulo),'',0,'C');
				$this->SetFont('Arial','',6);
				$this->Cell(35,4,('Emissão'),'',2,'');	
				$this->SetFont('Arial','B',10);	
				$this->Cell(35,4,$today,'',1,'C');
				$this->Cell(37);
				$this->SetFont('Arial','B',9);	
				$this->Cell(125,8,($this->subTitulo),'B',0,'C');	
				$this->SetFont('Arial','',6);
				$this->Cell(35,4,('    Usuário / Horário:'),'',2,'L');	
				$this->SetFont('Arial','B',8);	
				$this->Cell(35,4,$_SESSION['SISTEMAWEB']['DADOS']['LOGIN'][0].' - '.$hora,'B',1,'C');	
		   
			}
			
		    if($this->configHeader=='AP')
			{
				$today = date("d/m/Y");
	            $hora=date("H:i:s");									
		        $this->SetLeftMargin(5);
				$this->Cell(2);	
				$this->Cell(35,16,'','B',0,'C');	
				$this->Image($this->logo,8,5,20,20);
				$this->SetFont('Arial','B',10);				
				$this->Cell(125,8,($this->titulo),'',0,'C');
				$this->SetFont('Arial','',6);
				$this->Cell(35,4,('Emissão'),'',2,'');	
				$this->SetFont('Arial','B',10);	
				$this->Cell(35,4,$today,'',1,'C');
				$this->Cell(37);
				$this->SetFont('Arial','B',9);	
				$this->Cell(125,8,($this->subTitulo),'B',0,'C');	
				$this->SetFont('Arial','',6);
				$this->Cell(35,4,('    Usuário / Horário:'),'',2,'L');	
				$this->SetFont('Arial','B',8);	
				$this->Cell(35,4,$_SESSION['SISTEMAWEB']['DADOS']['LOGIN'][0].' - '.$hora,'B',1,'C');	
			   		   
		    }
		  
		  	   		  
		 } else {	
		 		 
			 if ($this->configHeader=='FP' && $this->page==1)
			 {
					$today = date("d/m/Y");
	                $hora=date("H:i:s");									
		            $this->SetLeftMargin(5);	
				    $this->Cell(-3);	
				    $this->Cell(35,16,'','B',0,'C');	
				    $this->Image($this->logo,8,5,20,20);
				    $this->SetFont('Arial','B',10);				
				    $this->Cell(215,8,($this->titulo),'',0,'C');
				    $this->SetFont('Arial','',6);
				    $this->Cell(35,4,('Emissão'),'',2,'');	
				    $this->SetFont('Arial','B',10);	
				    $this->Cell(35,4,$today,'',1,'C');
				    $this->Cell(37);
				    $this->SetFont('Arial','B',9);	
				    $this->Cell(215,8,($this->subTitulo),'B',0,'C');	
				    $this->SetFont('Arial','',6);
				    $this->Cell(35,4,('    Usuário / Horário:'),'',2,'L');	
				    $this->SetFont('Arial','B',8);	
				    $this->Cell(35,4,$_SESSION['SISTEMAWEB']['DADOS']['LOGIN'][0].' - '.$hora,'B',1,'C');	
		   
			 }
					
		     if($this->configHeader=='AP')
			 {
				   $today = date("d/m/Y");
	               $hora=date("H:i:s");									
		           $this->SetLeftMargin(5);
				   $this->Cell(2);	
				   $this->Cell(35,16,'','B',0,'C');	
				   $this->Image($this->logo,8,12,33);
				   $this->SetFont('Arial','B',10);				
				   $this->Cell(215,8,utf8_decode($this->titulo),'',0,'C');
				   $this->SetFont('Arial','',6);
				   $this->Cell(35,4,utf8_decode('Emissão'),'',2,'');	
				   $this->SetFont('Arial','B',10);	
				   $this->Cell(35,4,$today,'',1,'C');
				   $this->Cell(37);
				   $this->SetFont('Arial','B',9);	
				   $this->Cell(215,8,utf8_decode($this->subTitulo),'B',0,'C');	
				   $this->SetFont('Arial','',6);
				   $this->Cell(35,4,utf8_decode('    Usuário / Horário:'),'',2,'L');	
				   $this->SetFont('Arial','B',8);	
				   $this->Cell(35,4,$_SESSION['PEMAZAWEB']['DADOS']['USUARIO_LOGIN'][0].' - '.$hora,'B',1,'C');
			   		   
			 }
		     if($this->configHeader=='AP2')
			 {
				 $this->Image($this->logo,$this->GetX(),$this->GetY(),40,15);				
				 $today = date("d/m/Y");
	             $hora=date("H:i:s");
		         $this->SetLeftMargin(5);
				 $this->Cell(2);
				 $this->Cell(35,16,'','',0,'C');
				 $this->SetFont('Arial','B',10);
				 $this->Cell(125,8,utf8_decode($this->titulo),'',0,'C');
				 $this->SetFont('Arial','',6);
				 $this->Cell(35,4,utf8_decode('Emissão'),'',2,'');
				 $this->SetFont('Arial','B',10);
				 $this->Cell(35,4,$today,'',1,'C');
				 $this->Cell(37);
				 $this->SetFont('Arial','B',9);	
				 $this->Cell(125,8,utf8_decode($this->subTitulo),'',0,'C');	
				 $this->SetFont('Arial','',6);
				 $this->Cell(35,4,utf8_decode('    Usuário / Horário:'),'',2,'L');	
				 $this->SetFont('Arial','B',8);	
				 $this->Cell(35,4,$_SESSION['PEMAZAWEB']['DADOS']['USUARIO_LOGIN'][0].' - '.$hora,'',1,'C');
			 }
			  
		 }
		
	   }
	 //Rodapé do Relatório	
	 
	  public function Footer()
       {
		   if($this->ativaRodap == true){
			   
			    if($this->orientacao=='P'){
					
					$this->SetY(-15);
					$this->Cell(2);																				
	 	        	$this->SetFont('Arial','',6);					
		        	$this->Cell(190,3,$this->lineFooter1,0,1,'C');					
		        	$this->Cell(190,3,$this->lineFooter2,0,1,'C');					
		        	$this->SetFont('Arial','I',8);
		        	$this->Cell(0,10,('Página ').$this->PageNo().'/{nb}',0,0,'C');
					
				}else{
					
					$this->SetY(-15);
					$this->Cell(2);																				
	 	        	$this->SetFont('Arial','',6);					
		        	$this->Cell(282,3,$this->lineFooter1,0,1,'C');					
		        	$this->Cell(282,3,$this->lineFooter2,0,1,'C');					
		        	$this->SetFont('Arial','I',8);
		        	$this->Cell(0,10,('Página ').$this->PageNo().'/{nb}',0,0,'C');
				}
			}
		   
		}	
	 
	 // Criar Títulos na Body
	 
	  
	 public function writeBody($fields,$tamFields,$sizeFont,$formatFont,$border,$aligner,$lineBreak,$paintLine=array(),$url=array())
	  {
		  	  
		  $this->SetFont('Arial',$formatFont,$sizeFont);
		  $this->setX(7); 
		  
		  for($a=0 ; $a <count($fields) ; ++$a)
		   {
			   $this->Cell($tamFields[$a],$this->tamCellY,($fields[$a]),$border,$lineBreak[$a],$aligner[$a],$paintLine[$a],$url[$a]);
			
		   }
		 
	  }
		
		
	
	}
?>