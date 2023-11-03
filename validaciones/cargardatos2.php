<?php

use PhpOffice\PhpSpreadsheet\Worksheet\AutoFilter\Column;

include("../conexion.php");

define("VENDOR",'C:\xampp\htdocs\SRCB-master-gith\vendor\autoload.php');

//+++++++++++++++++++++++++++ instanciando clases ++++++++++++++++++++++++++++++++++++++++++++++++++++++
/*
$Turno = new Turno($conn);
$Sala = new Sala($conn);
$Area = new Area($conn);
$Fecha = new Fecha($conn);
$Pais = new Pais($conn); 
$Ponentes = new Ponentes($conn);
$Trabajo = new Trabajo($conn);
$Moderadores = new Moderadores($conn);
*/

$Moderadores = new Moderadores($conn);
$Moderadores->cargaModeradores();

//++++++++++++++++++++++ llamando a los metodos +++++++++++++++++++++++++++++++++++++++++++++++++++
/*
$Turno -> cargarTurno();
$Sala -> cargarSala();
$Area -> cargarArea();
$Fecha -> cargarFecha();
$Pais ->cargarPais();
$Ponentes -> cargarPonentes();
$Trabajo -> cargaTrabajo();
$Moderadores->cargaModeradores();
*/



class Turno 
{
    private $conn;
    public function __construct($dbConnection) 
    {
        $this->conn = $dbConnection;
    }

    public function cargarTurno()
    {
        if (isset($_FILES['archivo_excel2'])) {
            require VENDOR;

            $excel2 = $_FILES['archivo_excel2']['tmp_name'];
            $spread1excel2 = \PhpOffice\PhpSpreadsheet\IOFactory::load($excel2);
            $hojaexcel2 = $spread1excel2->getActiveSheet();

            $firstRowSkipped2 = false;

            foreach ($hojaexcel2->getRowIterator() as $fila) 
            {
                if (!$firstRowSkipped2) 
                {
                    $firstRowSkipped2 = true;
                    continue; 
                }

                $data = $fila->getCellIterator();
                $values = [];

                foreach ($data as $celda) 
                {
                    $values[] = $celda->getValue();
                }

                $columna13 = $values[13];

                if ($columna13 !== null && $columna13 !== '') 
                {
                    $Nombre_Turno = $columna13;

                    $stmt = $this->conn->prepare("SELECT Nombre_Turno FROM Turno WHERE Nombre_Turno = ?");
                    $stmt->bind_param("s", $Nombre_Turno);
                    $stmt->execute();
                    $stmt->store_result();

                    if ($stmt->num_rows == 0) 
                    {
                        $stmt = $this->conn->prepare("INSERT INTO Turno (Nombre_Turno) VALUES (?)");
                        $stmt->bind_param("s", $Nombre_Turno);
                        $stmt->execute();
                    }
                }
            }
        }
        echo "bien Turno \n";
    }
}

class Sala
{
    private $conn;
    public function __construct($dbConnection) 
    {
        $this->conn = $dbConnection;
    }

    public function cargarSala() 
    {

        if (isset($_FILES['archivo_excel1']))
        {
            require VENDOR;

            $excel1 = $_FILES['archivo_excel1']['tmp_name'];
            $spread1excel1 = \PhpOffice\PhpSpreadsheet\IOFactory::load($excel1);
            $hojaexcel1 = $spread1excel1->getActiveSheet();

            $firstRowSkipped1 = false;

            foreach ($hojaexcel1->getRowIterator() as $fila)
            {
                if (!$firstRowSkipped1) 
                {
                    $firstRowSkipped1 = true;
                    continue; 
                }

                $data = $fila->getCellIterator();
                $values = [];

                foreach ($data as $celda) 
                {
                    $values[] = $celda->getValue();
                }

                $columna10 = $values[10];
        
        
                if ($columna10 !== null && $columna10 !== '') 
                {
                    $Nombre_Sala = $columna10; 

                    $stmt = $this->conn->prepare("SELECT Nombre_Sala FROM Sala WHERE Nombre_Sala = ?");
                    $stmt->bind_param("s", $Nombre_Sala);
                    $stmt->execute();
                    $stmt->store_result();

                    if ($stmt->num_rows == 0) 
                    {
                        $stmt = $this->conn->prepare("INSERT INTO Sala (Nombre_Sala) VALUES (?)");
                        $stmt->bind_param("s", $Nombre_Sala);
                        $stmt->execute();
                    }
                }else
                {
                    $Nombre_Sala = "S/D";
                }
            }
        }
        echo "bien sala \n";
    }
}


class Area
{
    private $conn;
    public function __construct($dbConnection) 
    {
        $this->conn = $dbConnection;
    }

    public function cargarArea() 
    {

        if (isset($_FILES['archivo_excel2']))
        {
            require VENDOR;

            $excel2 = $_FILES['archivo_excel2']['tmp_name'];
            $spread1excel2 = \PhpOffice\PhpSpreadsheet\IOFactory::load($excel2);
            $hojaexcel2 = $spread1excel2->getActiveSheet();

            $firstRowSkipped2 = false;

            foreach ($hojaexcel2->getRowIterator() as $fila)
            {
                if (!$firstRowSkipped2) 
                {
                    $firstRowSkipped2 = true;
                    continue; 
                }

                $data = $fila->getCellIterator();
                $values = [];

                foreach ($data as $celda) 
                {
                    $values[] = $celda->getValue();
                }

                $columna2 = $values[2];
        
                if ($columna2 !== null && $columna2 !== '') 
                {
                    $Nombre_Area = $columna2; 

                    $stmt = $this->conn->prepare("SELECT Nombre_Area FROM Area WHERE Nombre_Area = ?");
                    $stmt->bind_param("s", $Nombre_Area);
                    $stmt->execute();
                    $stmt->store_result();

                    if ($stmt->num_rows == 0) 
                    {
                        $stmt = $this->conn->prepare("INSERT INTO Area (Nombre_Area) VALUES (?)");
                        $stmt->bind_param("s", $Nombre_Area);
                        $stmt->execute();
                    }
                }
            }
        }
        echo "bien Area \n";
    }
}



class Fecha
{
    private $conn;
    public function __construct($dbConnection) 
    {
        $this->conn = $dbConnection;
    }

    public function cargarFecha() 
    {

        if (isset($_FILES['archivo_excel2']))
        {
            require VENDOR;

            $excel2 = $_FILES['archivo_excel2']['tmp_name'];
            $spread1excel2 = \PhpOffice\PhpSpreadsheet\IOFactory::load($excel2);
            $hojaexcel2 = $spread1excel2->getActiveSheet();

            $firstRowSkipped2 = false;

            foreach ($hojaexcel2->getRowIterator() as $fila)
            {
                if (!$firstRowSkipped2) 
                {
                    $firstRowSkipped2 = true;
                    continue; 
                }

                $data = $fila->getCellIterator();
                $values = [];

                foreach ($data as $celda) 
                {
                    $values[] = $celda->getValue();
                }


                $columna11 = $values[11];
                $columna12 = $values[12];
        
                if ($columna11 !== null && $columna11 !== '') 
                {
                    $Fecha_Completa = $columna11; 
                    $Dia = $columna12;

                    $stmt = $this->conn->prepare("SELECT Fecha_Completa FROM Fecha WHERE Fecha_Completa = ?");
                    $stmt->bind_param("s", $Fecha_Completa);
                    $stmt->execute();
                    $stmt->store_result();

                    if ($stmt->num_rows == 0) 
                    {
                        $stmt = $this->conn->prepare("INSERT INTO Fecha (Fecha_Completa ,Dia) VALUES (?,?)");
                        $stmt->bind_param("ss", $Fecha_Completa, $Dia);
                        $stmt->execute();
                    }
                }
            }
        }
        echo "bien Fecha \n";
    }
}

class Pais
{
    private $conn;
    public function __construct($dbConnection) 
    {
        $this->conn = $dbConnection;
    }

    public function cargarPais() 
    {

        if (isset($_FILES['archivo_excel1']))
        {
            require VENDOR;

            $excel1 = $_FILES['archivo_excel1']['tmp_name'];
            $spread1excel1 = \PhpOffice\PhpSpreadsheet\IOFactory::load($excel1);
            $hojaexcel1 = $spread1excel1->getActiveSheet();

            $firstRowSkipped1 = false;

            foreach ($hojaexcel1->getRowIterator() as $fila)
            {
                if (!$firstRowSkipped1) 
                {
                    $firstRowSkipped1 = true;
                    continue; 
                }

                $data = $fila->getCellIterator();
                $values = [];

                foreach ($data as $celda) 
                {
                    $values[] = $celda->getValue();
                }

                $columna1 = $values[1];
        
                if ($columna1 !== null && $columna1 !== '') 
                {
                    $Nombre_Pais = $columna1; 

                    $stmt = $this->conn->prepare("SELECT Nombre_Pais FROM Pais WHERE Nombre_Pais = ?");
                    $stmt->bind_param("s", $Nombre_Pais);
                    $stmt->execute();
                    $stmt->store_result();

                    if ($stmt->num_rows == 0) 
                    {
                        $stmt = $this->conn->prepare("INSERT INTO Pais (Nombre_Pais) VALUES (?)");
                        $stmt->bind_param("s", $Nombre_Pais);
                        $stmt->execute();
                    }
                }
            }
        }
        echo "bien Pais \n";
    }
}

class Ponentes
{
    private $conn;
    public function __construct($dbConnection) 
    {
        $this->conn = $dbConnection;
    }

    public function cargarPonentes() 
    {
        $idtem = 49999;
        $idequipo = 0;
        if (isset($_FILES['archivo_excel2']))
        {
            require VENDOR;

            $excel2 = $_FILES['archivo_excel2']['tmp_name'];
            $spread1excel2 = \PhpOffice\PhpSpreadsheet\IOFactory::load($excel2);
            $hojaexcel2 = $spread1excel2->getActiveSheet();

            $firstRowSkipped2 = false;

        
            foreach ($hojaexcel2->getRowIterator() as $fila)
            {
                if (!$firstRowSkipped2) 
                {
                    $firstRowSkipped2 = true;
                    continue; 
                }

                $data = $fila->getCellIterator();
                $values = [];

                foreach ($data as $celda) 
                {
                    $values[] = $celda->getValue();
                }

                $columna7 = $values[7];
                $columna8 = $values[8];
           
                $sql = "INSERT INTO Ponente (ID_Ponente, ID_Equipo, Nombre_Ponente) VALUES (?, ?, ?)";
                $stmt = $this->conn->prepare($sql);
                
                $ids = explode(",", $columna7);
                $nombres = explode(",", $columna8);

                if (count($ids) === count($nombres)) 
                {
                    $idequipo = $idequipo + 1;
                    for ($i = 0; $i < count($ids); $i++) 
                    {
                        $ID_Ponente = $ids[$i];
                        $Nombre_Ponente = $nombres[$i];
                        
                        if($columna7 == '')
                        {
                            $idtem = $idtem + 1;
                            $ID_Ponente = $idtem;
                        }
                        if($columna8 == '')
                        {
                            $Nombre_Ponente = "S/D";
                        }
                        $ID_Equipo = $idequipo;
                        $stmt->bind_param("sss", $ID_Ponente, $ID_Equipo, $Nombre_Ponente);
                        $stmt->execute();
                    }
                }
            }
        }
        echo "bien ponentes \n";
    }
}

class Trabajo
{
    private $conn;
    public function __construct($dbConnection) 
    {
        $this->conn = $dbConnection;
    }

    public function cargaTrabajo()
    {
        $idTrabajo = 49999;
        if (isset($_FILES['archivo_excel2']))
        {
            require VENDOR;

            $excel2 = $_FILES['archivo_excel2']['tmp_name'];
            $spread1excel2 = \PhpOffice\PhpSpreadsheet\IOFactory::load($excel2);
            $hojaexcel2 = $spread1excel2->getActiveSheet();

            $firstRowSkipped2 = false;

            $queryFecha = "SELECT ID_Fecha, Fecha_Completa FROM fecha";
            $resultFecha = $this->conn->query($queryFecha);
            $datosFecha = array();

            while ($rowFecha = $resultFecha->fetch_assoc()) 
            {
                $datosFecha[] = $rowFecha;
            }

            $queryTurno = "SELECT ID_Turno, Nombre_Turno FROM Turno";
            $resultTurno = $this->conn->query($queryTurno);
            $datosTurno = array();

            while ($rowTurno = $resultTurno->fetch_assoc()) 
            {
                $datosTurno[] = $rowTurno;
            }

            foreach ($hojaexcel2->getRowIterator() as $fila)
            {
                if (!$firstRowSkipped2) 
                {
                    $firstRowSkipped2 = true;
                    continue; 
                }

                $data = $fila->getCellIterator();
                $values = array();

                foreach ($data as $celda) 
                {
                    $values[] = $celda->getValue();
                }

                $columna1 = $values[1];
                $columna11 = $values[11];
                $columna13 = $values[13];
                $columna3 = $values[3];
                $columna6 = $values[6];
                $columna4 = $values[4];

                $sql = "INSERT INTO Trabajo (ID_Trabajo, ID_Fecha, ID_Turno, Linea, Titulo, Compartido) VALUES (?, ?, ? ,? ,? ,?)";
                $stmt = $this->conn->prepare($sql);
                $stmt->bind_param("ssssss", $ID_Trabajo, $ID_Fecha, $ID_Turno, $Linea, $Titulo, $Compartido);

                foreach($datosFecha as $filaFecha)
                {
                    if($columna11 == $filaFecha["Fecha_Completa"])
                    {
                        $ID_Fecha = $filaFecha["ID_Fecha"];
                    }
                    else if($columna11 == null && $columna11 == '')
                    {
                        $ID_Fecha = 1;
                    }
                }
                foreach($datosTurno as $filaTurno)
                {
                    if($columna13 == $filaTurno["Nombre_Turno"])
                    {
                        $ID_Turno = $filaTurno["ID_Turno"];
                    }
                    else
                    {
                        $ID_Turno = 1;
                    }
                }
                if($columna1 !== null && $columna1 !== '')
                {
                    $ID_Trabajo = $columna1;
                }
                else
                {
                    $idTrabajo = $idTrabajo + 1;
                    $ID_Trabajo = $idTrabajo;
                }
                if ($columna3 !== null && $columna3 !== '') 
                {
                    $Linea = $columna3;
                } else 
                {
                    $Linea = "S/D";
                }
                if ($columna6 !== null && $columna6 !== '') 
                {
                    $Titulo = $columna6;
                } else 
                {
                    $Titulo = "S/D";
                }
                if ($columna4 !== null && $columna4 !== '') 
                {
                    $Compartido = $columna4;
                } else 
                {
                    $Compartido = "S/D";
                }

                $stmt->execute();
            }
        }
        echo "bien Trabajo \n";
    }
}

class Moderadores 
{
    private $conn;
    public function __construct($dbConnection) 
    {
        $this->conn = $dbConnection;
    }

    public function CargaModeradores() 
    {
        $idExtra= 10000;

        if (isset($_FILES['archivo_excel1']))
        {
            require VENDOR;

            $excel1 = $_FILES['archivo_excel1']['tmp_name'];
            $spread1excel1 = \PhpOffice\PhpSpreadsheet\IOFactory::load($excel1);
            $hojaexcel1 = $spread1excel1->getActiveSheet();

            $firstRowSkipped1 = false;

            $querySala = "SELECT ID_Sala, Nombre_Sala FROM Sala";
            $resultSala = $this->conn->query($querySala);
            $datosSala = array();

            while ($rowSala = $resultSala->fetch_assoc()) 
            {
                $datosSala[] = $rowSala;
            }

            $queryPais = "SELECT ID_Pais, Nombre_Pais FROM Pais";
            $resultPais = $this->conn->query($queryPais);
            $datosPais = array();

            while ($rowPais = $resultPais->fetch_assoc()) 
            {
                $datosPais[] = $rowPais;
            }

            $queryArea = "SELECT ID_Area, Nombre_Area FROM Area";
            $resultArea = $this->conn->query($queryArea);
            $datosArea = array();

            while ($rowArea = $resultArea->fetch_assoc()) 
            {
                $datosArea[] = $rowArea;
            }

            foreach ($hojaexcel1->getRowIterator() as $fila)
            {
                if (!$firstRowSkipped1) 
                {
                    $firstRowSkipped1 = true;
                    continue; 
                }

                $data = $fila->getCellIterator();
                $values = [];

                foreach ($data as $celda) 
                {
                    $values[] = $celda->getValue();
                }

                $columna1 = $values[1];
                $columna4 = $values[4];
                $columna5 = $values[5];
                $columna6 = $values[6];
                $columna7 = $values[7];
                $columna8 = $values[8];
                $columna9 = $values[9];
                $columna10 = $values[10];
                $columna11 = $values[11];
                $columna12 = $values[12];
                
                $sql = "INSERT INTO Moderador (ID_Moderador, ID_Sala, Nombre_SalaAlternativa, ID_Pais, ID_Area, Correo_Electronico, Correo_Electronico_Alternativo, Nombre_Moderador, Sexo, Celular ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                $stmt = $this->conn->prepare($sql);
                $stmt->bind_param("ssssssssss", $ID_Moderador, $ID_Sala, $Nombre_SalaAlternativa, $ID_Pais, $ID_Area, $Correo_Electronico, $Correo_Electronico_Alternativo, $Nombre_Moderador, $Sexo, $Celular );

                if($columna5 !== null && $columna5 != '')
                {
                    $ID_Moderador = $columna5; 
                }
                else
                {
                    $idExtra = $idExtra + 1;
                    $ID_Moderador = $idExtra;
                }
                foreach($datosSala as $filaSala)
                {
                    if($columna10 == $filaSala["Nombre_Sala"])
                    {
                        $ID_Sala = $filaSala["ID_Sala"];
                    }
                    else if($columna10 == null && $columna10 == '')
                    {
                        $ID_Sala = 1;
                    }
                }
                if($columna12 !== null && $columna12 != '')
                {
                    $Nombre_SalaAlternativa = $columna12; 
                }
                else
                {
                    $Nombre_SalaAlternativa = "S/D";
                }
                foreach($datosPais as $filaPais)
                {
                    if($columna1 == $filaPais["Nombre_Pais"])
                    {
                        $ID_Pais = $filaPais["ID_Pais"];
                    }
                    else if($columna10 == null && $columna10 == '')
                    {
                        $ID_Pais = 1;
                    }
                }
                foreach($datosArea as $filaArea)
                {
                    if($columna4 == $filaArea["Nombre_Area"])
                    {
                        $ID_Area = $filaArea["ID_Area"];
                    }
                    else if($columna4 == null && $columna4 == '')
                    {
                        $ID_Area = 1;
                    }
                }
                if($columna6 !== null && $columna6 !== '')
                {
                    $Nombre_Moderador = $columna6;
                }else
                {
                    $Nombre_Moderador = "S/D";
                }
                if($columna7 !== null && $columna7 !== '')
                {
                    $Sexo = $columna7;
                }else
                {
                    $Sexo = "S/D";
                }
                if($columna8 !== null && $columna8 !== '')
                {
                    $Correo_Electronico = $columna8;
                }else
                {
                    $Correo_Electronico = "S/D";
                }
                if($columna9 !== null && $columna9 !== '')
                {
                    $Celular = $columna9;
                }else
                {
                    $Celular = "S/D";
                }
                if($columna11 !== null && $columna11 !== '')
                {
                    $Correo_Electronico_Alternativo = $columna11;
                }else
                {
                    $Correo_Electronico_Alternativo = "S/D";
                }



            
                $stmt->execute();
            }
        }
        echo "bien moderadores \n";
    }
}







?>