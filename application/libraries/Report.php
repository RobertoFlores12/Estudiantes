<?php
if (!defined( 'BASEPATH')) {
   exit( 'No direct script access allowed');
}
require_once dirname(__FILE__). '/tcpdf/tcpdf.php';
class Report extends TCPDF
{
   public $titulo;
   public function _construct()
    {
       parent::__construct();
    }
   //Cabecera de pagina
   public function Header()
    {
       $this->SetFont( 'helvetica', 'B', 20);
       
       $this->Cell(0, 15, $this->titulo, 0, false, 'C'. 0, '', 0, false, 'M', 'M');
    }
   public function Footer()
    {
       // Posición a 15mm del borde inferior
       $this->SetY(-15);
       
       $this->SetFont( 'helvetica', '', 8);
       
       $this->Cell(0, 10, 'Página '.  $this->getAliasNumPage(). '/'. $this->getAliasNbPages(), 0,
       false, 'C', 0, '', false, 'T', 'M');
    }
}