<?php
include("../conexion.php");

define("VENDOR",'C:\xampp\htdocs\SRCB-master-gith\vendor\autoload.php');

//+++++++++++++++++++++++++++ instanciando clases ++++++++++++++++++++++++++++++++++++++++++++++++++++++
$Moderadores = new Moderadores($conn);
$Sala = new Sala($conn);
$Trabajo = new Trabajo($conn);
$Area = new Area($conn);

$Pais = new Pais($conn);
$Investigador = new Investigador($conn);

$Institucion = new Institucion($conn);
$Sesion = new Sesion($conn); 
$Ponente = new Ponente($conn);
//++++++++++++++++++++++ llamndo a los metodos +++++++++++++++++++++++++++++++++++++++++++++++++++

$Moderadores->cargaModeradores();
$Sala->cargarSala();
$Trabajo->cargaTrabajo();
$Area->cargaArea();


$Pais->cargarPais();
$Investigador->cargaInvestigador();

$Institucion->CargaInstitucion();
$Sesion->cargaUsuarios();

$Ponente->cargaPonente();

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

                $columna3 = $values[3];
                $columna5 = $values[5];
                $columna6 = $values[6]; 
                $columna7 = $values[7];
                $columna9 = $values[9];
                $columna8 = $values[8]; 
                $columna11 = $values[11];        
        
                $sql = "INSERT INTO moderador (
                    ID_Moderador, 
                    Modalidad, 
                    Nombre_Moderador, 
                    Sexo, 
                    Celular, 
                    Correo, 
                    Correo_alternativo
                ) VALUES (?, ?, ?, ?, ?, ?, ?)";

                $stmt = $this->conn->prepare($sql);

                $stmt->bind_param(
                    "sssssss", 
                    $ID_Moderador,
                    $Modalidad, 
                    $Nombre_Moderador,
                    $Sexo, 
                    $Celular, 
                    $Correo, 
                    $Correo_alternativo
                );
                
                if($columna3 !== null && $columna3 !== '')
                {
                    $Modalidad = $columna3;
                }else
                {
                    $Modalidad  = "S/D";
                }
                if ($columna5 !== null && $columna5 !== '') 
                {
                    $ID_Moderador = $columna5;
                }else 
                {
                    $idExtra = $idExtra + 1;
                    $ID_Moderador = $idExtra;
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
                    $Correo = $columna8;
                }else
                {
                    $Correo = "S/D";
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
                    $Correo_alternativo = $columna11;
                }else
                {
                    $Correo_alternativo = "S/D";
                }

                $stmt->execute();
            }
        }
        echo "bien moderadores \n";
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

                $columna14 = $values[14];
                $columna16 = $values[16]; 
                $columna17 = $values[17]; 

                $sql = "INSERT INTO Sala (
                    Sede, 
                    Bloque, 
                    Ubicacion
                ) VALUES (?, ?, ?)";

                $stmt = $this->conn->prepare($sql);

                $stmt->bind_param("sss", 
                    $Sede, 
                    $Bloque, 
                    $Ubicacion
                );
                
                if ($columna14 !== null && $columna14 !== '') 
                {
                    $Sede = $columna14;
                } else 
                {
                    $Sede = 'S/D';
                }
                if ($columna16 !== null && $columna16 !== '') 
                {
                    $Bloque = $columna16;
                } else 
                {
                    $Bloque = 'S/D';
                }
                if ($columna17 !== null && $columna17 !== '') 
                {
                    $Ubicacion = $columna17;
                } else 
                {
                    $Ubicacion = 'S/D';
                }
                $stmt->execute();
            }
        }
        echo "bien sala \n";
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
        $idTrabajo = 0;
        $idSala = 0;
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

                $columna1 = $values[1];
                $columna3 = $values[3]; 
                $columna4 = $values[4]; 
                $columna6 = $values[6];
                $columna11 = $values[11]; 
      
                $sql = "INSERT INTO Trabajo (ID_Trabajo, Fecha, Linea, Compartido, Titulo) VALUES (?, ?, ?, ?, ?)";
                $stmt = $this->conn->prepare($sql);
                $stmt->bind_param("sssss", $ID_Trabajo, $Fecha, $Linea, $Compartido, $Titulo);
                
                if ($columna1 !== null && $columna1 !== '') 
                {
                    $ID_Trabajo = $columna1;
                } else {
                    $idTrabajo = $idTrabajo +1;
                    $ID_Trabajo = $idTrabajo;
                }
                if ($columna11 !== null && $columna11 !== '') 
                {
                    $Fecha = $columna11;
                } else {
                    $Fecha = 'S/D';
                }
                if ($columna3 !== null && $columna3 !== '') 
                {
                    $Linea = $columna3;
                } else {
                    $Linea = 'S/D';
                }
                if ($columna4 !== null && $columna4 !== '') 
                {
                    $Compartido = $columna4;
                } else {
                    $Compartido = 'S/D';
                }
                if ($columna6 !== null && $columna6 !== '') 
                {
                    $Titulo = $columna6;
                } else {
                    $Titulo = 'S/D';
                }
                $stmt->execute();
            }
        }
        echo "bien Trabajo \n";
    }
}


class Area
{
    private $conn;

    public function __construct($dbConnection) 
    {
        $this->conn = $dbConnection;
    }
    
    public function cargaArea()
    {
        $idTrabajo = 10000;
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

                $columna1 = $values[1];
                $columna2 = $values[2];

      
                $sql = "INSERT INTO Area (ID_Trabajo,Nombre_Area) VALUES (?, ?)";
                $stmt = $this->conn->prepare($sql);
                $stmt->bind_param("ss", $ID_Trabajo, $Area );
                
                if ($columna1 !== null && $columna1 !== '') 
                {
                    $ID_Trabajo = $columna1;
                } else {
                    $idTrabajo = $idTrabajo +1;
                    $ID_Trabajo = $idTrabajo;
                }
                if ($columna2 !== null && $columna2 !== '') 
                {
                    $Area = $columna2;
                } else {
                    $Area = 'S/D';
                }
                $stmt->execute();
            }
        }
        echo "bien Area \n";     
    } 
}

class Sesion
{
    private $conn;

    public function __construct($dbConnection) 
    {
        $this->conn = $dbConnection;
    }
    
    public function cargaUsuarios()
    {
        $selectQuery = "SELECT correo FROM moderador";

        $result = $this->conn->query($selectQuery);
        
        if ($result->num_rows > 0) 
        {
            while ($row = $result->fetch_assoc()) 
            {
                $correo = $row['correo'];
                $passwd = "1234";
                $tipo = "mod";

                $sql = "INSERT INTO sesion (correo ,contrasenia,tipo) VALUES (?, ?, ?)";
                $stmt = $this->conn->prepare($sql);
                $stmt->bind_param("sss", $correo,$passwd,$tipo);

                $stmt->execute();
            }
        }
        echo "bien Sesion \n";
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
      
                $sql = "INSERT INTO Pais (Nombre_Pais) VALUES (?)";
                $stmt = $this->conn->prepare($sql);
                $stmt->bind_param("s",$Nombre_Pais);
                
                $Nombre_Pais = $columna1;  
                $stmt->execute();
            }
        }
        echo "bien Pais \n";
    }
}


class Institucion
{
    private $conn;

    public function __construct($dbConnection) 
    {
        $this->conn = $dbConnection;
    }

    public function CargaInstitucion()
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

                $columna0 = $values[0];
                $columna2 = $values[2];

                $sql = "INSERT INTO Institucion (ID_Pais, Nombre_Institucion) VALUES (?,?)";
                $stmt = $this->conn->prepare($sql);
                $stmt->bind_param("ss",$ID_Pais ,$Nombre_Institucion);
                    
                $ID_Pais = $columna0;
                $Nombre_Institucion = $columna2;
                $stmt->execute();
            } 
        }
        echo "bien institucion \n";     
    }
}

class Investigador
{
    private $conn;
    public function __construct($dbConnection) 
    {
        $this->conn = $dbConnection;
    }
    function cargaInvestigador()
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

                $columna10 = $values[10];

                $sql = "INSERT INTO Investigador (Nombre_Investigador) VALUES (?)";
                $stmt = $this->conn->prepare($sql);
                $stmt->bind_param("s", $Nombre_Investigador);
                
                if ($columna10 !== null && $columna10 !== '') 
                {
                    $Nombre_Investigador = $columna10;
                } else {

                    $Nombre_Investigador = "S/D";
                }

                $stmt->execute();
            }
        }
        echo "bien Investigador \n";
    }
}

class Ponente
{
    private $conn;
    public function __construct($dbConnection) 
    {
        $this->conn = $dbConnection;
    }
    function cargaPonente()
    {
        $idPonente = 100000;
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
                $columna1 = $values[1];
                $columna0 = $values[0];
                $columna8 = $values[8];

                $sql = "INSERT INTO Ponente (ID_Ponente, ID_Trabajo, ID_Investigador, ID_Institucion, Nombre_Ponente, Correo) VALUES (?,?,?,?,?,?)";
                $stmt = $this->conn->prepare($sql);
                $stmt->bind_param("ssssss", $ID_Ponente, $ID_Trabajo, $ID_Investigador, $ID_Institucion, $Nombre_Ponente, $Correo);
                
                if ($columna7 !== null && $columna7 !== '') 
                {
                    $ID_Ponente = $columna7;
                } else {

                    $idPonente = $idPonente +1;
                    $ID_Ponente = $idPonente;
                }                
                if ($columna1 !== null && $columna1 !== '') 
                {
                    $ID_Trabajo = $columna1;
                } else {

                    $ID_Trabajo = 1;
                }
                if ($columna0 !== null && $columna0 !== '') 
                {
                    $ID_Institucion = $columna0;
                    $ID_Investigador = $columna0;
                } else {
                    
                    $ID_Institucion = 1;
                    $ID_Investigador = 1;
                }
                if ($columna8 !== null && $columna8 !== '') 
                {
                    $Nombre_Ponente = $columna8;
                } else {

                    $Nombre_Ponente = "S/D";
                }
                
                $Correo = "S/D";

                $stmt->execute();
            }
        }
        echo "bien Ponente \n";
    }
}



?>