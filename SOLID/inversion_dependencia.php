<?php
#clase bajo nivel
class ReporteFPDF{
    public function exportar(){
        //code...
        return "Exportando el documento en FPDF";
    }
}

#clase alto nivel
class Inventario{

    public function procesarProductos(){
        //instancia (creando un objeto)
        $doc = new ReporteFPDF();
        $doc->exportar();
    }
}

#refactorizando el codigo
interface tipoPDF{
    public function exportarDocPDF();
}
#interfaz por el momento maneja 2 clases (FPDF, DomPDF)

#librerias
class FPDF implements tipoPDF{
    public function exportarDocPDF()
    {
        //code..
        return "Procesando el PDF con la libreria FPDF";
    }
}

class DomPDF implements tipoPDF{
    public function exportarDocPDF()
    {
        //code..
        return "Procesando el PDF con la libreria DOMPDF utilizando HTML";
    }
}


#clase de alto nivel se comunique con la abstraccion (interfaz)
class GestionInventario{

    public function procesarProductos(tipoPDF $pdf){
        return $pdf->exportarDocPDF();
    }
}

$inventario = new GestionInventario();
$inventario->procesarProductos(new FPDF); //Procesando el PDF con la libreria FPDF

$inventario->procesarProductos(new DomPDF); //Procesando el PDF con la libreria DOMPDF utilizando HTML

?>