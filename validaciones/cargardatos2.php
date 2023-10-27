<?php
include("../conexion.php");

//Moderadores

$CargarExcel1 = new CargarExcel1($conn);



$CargarExcel1->DatosExcel1();

class CargarExcel1
{
	private $conn;
    public function __construct($dbConnection)
	{
    $this->conn = $dbConnection;
    }

	public function DatosExcel1()
	{
        $idExtra= 10000;

		if (isset($_FILES['archivo_excel1']))
        {
			require 'C:\xampp\htdocs\Base\vendor\autoload.php';

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
                $columna2 = $values[2];
                $columna3 = $values[3];
                $columna4 = $values[4];
                $columna5 = $values[5];
                $columna6 = $values[6];
                $columna7 = $values[7];
                $columna8 = $values[8];
                $columna9 = $values[9];
                $columna10 = $values[10];
                $columna11 = $values[11];
                $columna12 = $values[12];
							
                
                $sql1 = "INSERT INTO moderador 
                (
                    ID_Moderador, 
                    Modalidad, 
                    Nombre_Moderador, 
                    Sexo, 
                    Celular, 
                    Correo, 
                    Correo_alternativo
                ) VALUES (?, ?, ?, ?, ?, ?, ?)";

                $stmt1 = $this->conn->prepare($sql1);

                $stmt1->bind_param("sssssss", 
                $ID_Moderador, 
                $Modalidad, 
                $Nombre_Moderador, 
                $Sexo, 
                $Celular, 
                $Correo, 
                $Correo_alternativo);

            
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


				$Nombre_Pais = $columna1;
                $Institucion = $columna2;
				
                $ID_Area = $columna4;
                

                
                 
                $Sala = $columna10;
                
                $sala2 = $columna12;
				$stmt1->execute();
			}
		}
        echo "bien Moderadores ";
	}
}

/*
class CargarExcel2
{
	function CargarExel2()
	{
		private $conn;
        	public function __construct($dbConnection)
        	{
        	$this->conn = $dbConnection;
        	}


        	if (isset($_FILES['archivo_excel2']))
        	{
            		require 'C:\xampp\htdocs\Base\vendor\autoload.php';

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
                        $columna3 = $values[3];
                        $columna4 = $values[4];
                        $columna5 = $values[5];
                        $columna6 = $values[6];
                        $columna7 = $values[7];
                        $columna8 = $values[8];
                        $columna9 = $values[9];
                        $columna10 = $values[10];
                        $columna11 = $values[11];
                        $columna12 = $values[12];
                        $columna13 = $values[13];
                        $columna14 = $values[14];
                        $columna15 = $values[15];
                        $columna16 = $values[16];
                        $columna17 = $values[17];


						
						
						


                if($columna1 !== null && $columna1 !== '') 
                {
                    $ID_Trabajo = $columna1;
                } else {
                    $idTrabajo = $idTrabajo +1;
                    $ID_Trabajo = $idTrabajo;
                }

                if($columna2 !== null && $columna2 !== '') 
                {
                    $Area = $columna2;
                }else {
                    $Area = 'S/D';
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

                if ($columna1 !== null && $columna1 !== '') 
                {
                    $ID_Trabajo = $columna1;
                } else {
                    $idTrabajo = $idTrabajo +1;
                    $ID_Trabajo = $idTrabajo;
                }

                $ID_Sala = $columna;
                if ($columna11 !== null && $columna11 !== '') 
                {
                    $Fecha = $columna11;
                } else {
                    $Fecha = 'S/D';
                }


                if ($columna10 !== null && $columna10 !== '') 
                {
                    $Nombre_Investigador = $columna10;
                } else {

                    $Nombre_Investigador = "S/D";
                }




            }
		}
	}
}

*/







?>
