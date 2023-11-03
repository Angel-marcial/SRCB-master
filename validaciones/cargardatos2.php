<?php
include("../conexion.php");

define("VENDOR",'C:\xampp\htdocs\SRCB-master-gith\vendor\autoload.php');

//+++++++++++++++++++++++++++ instanciando clases ++++++++++++++++++++++++++++++++++++++++++++++++++++++

//$Turno = new Turno($conn);
//$Sala = new Sala($conn);
//$Area = new Area($conn);
$Fecha = new Fecha($conn);

//++++++++++++++++++++++ llamndo a los metodos +++++++++++++++++++++++++++++++++++++++++++++++++++

//$Turno -> cargarTurno();
//$Sala -> cargarSala();
//$Area -> cargarArea();
$Fecha -> cargarFecha();


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
        echo "bien Area \n";
    }
}

?>