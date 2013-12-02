<?php
/**
 * @author  Mário Almeida  <prog.almeida@gmail.com> 
 * @file parkcar.impressao.ticket.php
 * @copyright 2013
 */	   
 
		require_once ('../../configs/config.inc.php');
        $objSessao = new sessao(DB_DNS, DB_USER, DB_PASS, array(PDO::ATTR_PERSISTENT => DB_PERSISTENT));
        $objSistema = new sistema(DB_DNS, DB_USER, DB_PASS, array(PDO::ATTR_PERSISTENT => DB_PERSISTENT));
        $objDataset = new dataset(DB_DNS, DB_USER, DB_PASS, array(PDO::ATTR_PERSISTENT => DB_PERSISTENT)); 
        $objSessao->montaSessao();
	    $log_user = $_SESSION['SISTEMAWEB']['DADOS']['LOGIN'][0];
        $log_data = date('Y-m-d H:i:s');
			
	    class Report extends FPDF{
	  
	    var $razao='';
	    var $endereco1='';
	    var $endereco2='';
	    var $cnpj='';
	    var $ie='';
		var $logo='';
		
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
    }//fim __construtor
	
	
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
	  
		public function Header(){
			 
			$this->Image($this->logo,0.1,1,8,8);
			$this->setY(3);
			$this->setX(7);
			$this->tamCellY=1.3;
			$this->writeBody(array($this->razao),array("20"),3.5,'B','',array('L'),array(1));
			$this->tamCellY=1.2;
			$this->setX(7);
			$this->writeBody(array($this->endereco1),array("20"),2.5,'B','',array('L'),array(1));
			$this->setX(7);
			$this->writeBody(array($this->endereco2),array("20"),2.5,'B','',array('L'),array(1));
			$this->setX(7);
			$this->writeBody(array('CNPJ : '.$this->cnpj),array("20"),2.5,'B','',array('L'),array(1));
			$this->setX(7);
			$this->writeBody(array('INSCRICAO ESTADUAL : '.$this->ie),array("20"),2.5,'B','',array('L'),array(1));
  
		}
	  
	   public function writeBody($fields,$tamFields,$sizeFont,$formatFont,$border,$aligner,$lineBreak,$paintLine=array(),$url=array())
		{
				
			$this->SetFont('Arial',$formatFont,$sizeFont);
				
			for($a=0 ; $a <count($fields) ; ++$a)
			 {
				 $this->Cell($tamFields[$a],$this->tamCellY,($fields[$a]),$border,$lineBreak[$a],$aligner[$a],$paintLine[$a],$url[$a]);
			  
			 }
		   
		}
	  
	  
    }
	
  

    	
  $entrada=$_REQUEST["entrada"]; 
  $saida=$_REQUEST["saida"];	
  $placa=strtoupper($_REQUEST["placa"]);
  $cor   = strtoupper($_REQUEST["cor"]);	
  $tipo  =$_REQUEST["tipo"];
  

		
  $pdf= new Report('L','mm','cupom');
  $pdf->logo=APP_ROOT."/img/logo.jpeg";
  $pdf->ativaRodap=false;
  $pdf->razao="CENTRO COMERCIAL ALMEIDA";
  $pdf->endereco1="RUA 25 DE DEZEMBRO, 375";
  $pdf->endereco2="JAPIIM, MANAUS AMAZONAS";
  $pdf->cnpj='99.999.999/0001-25';
  $pdf->ie='999.999-14'; 
  $pdf->SetLeftMargin(0);
  $pdf->SetAutoPageBreak(7);
  $pdf->addPage();
  $pdf->setY(10);
  $pdf->setX(0); 
  
  if($tipo=='E'){
	  
	  $entrada=date("H:i:s");
	  $pdf->writeBody(array('DATA   : '.date("d/m/Y"),'HORA ENTRADA: '.$entrada),array(14.5,14.5),2.5,'B','',array('L','R'),array(0,1));
	  $msg='COMPROVANTE DE ENTRADA';
	  
  }else{
	  $pdf->writeBody(array('DATA   : '.date("d/m/Y"),'HORA ENTRADA: '.$entrada),array(14.5,14.5),2.5,'B','',array('L','R'),array(0,1));
	  $pdf->writeBody(array('TEMPO: '.$_REQUEST["tempo"],'HORA SAIDA      : '.$saida),array(14.5,14.5),2.5,'B','',array('L','R'),array(0,1));
	  $msg='COMPROVANTE DE SAIDA';
	  
  }
  $pdf->setX(0);
  $pdf->writeBody(array("PLACA : ".$placa),array(29),2.5,'B','',array('L'),array(1));
  
  if($tipo=='E'){
	  
	    $pdf->writeBody(array("COR     : ".$cor),array(29),2.5,'B','',array('L'),array(1));
	  
  }else{
	  
	  $pdf->writeBody(array("COR     : ".$cor,'TOTAL : R$ '.$_REQUEST["valor"]),array(14.5,14.5),2.5,'B','',array('L','R'),array(0,1));
	  
  }
  
  
  
  
  $pdf->setX(0);
  $pdf->writeBody(array("-----------------------------------------------------------------------------------------"),array(29),2.5,'B','',array('L'),array(1));
  $pdf->setX(0);
  $pdf->writeBody(array($msg),array(29),4,'B','',array('C'),array(1));
  $pdf->writeBody(array("-----------------------------------------------------------------------------------------"),array(29),2.5,'B','',array('L'),array(1)); 
  
  $pdf->setY($pdf->getY()+1);
  $pdf->setX(4);
  $pdf->Code128($pdf->getX(),$pdf->getY(),$placa,20.5,5);
  $pdf->Output();
        

    
 
   
?>