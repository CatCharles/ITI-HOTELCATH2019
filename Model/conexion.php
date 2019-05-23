<?php
/* Autor: CATHERINE ALESSANDRA TORRES CHARLES
	*/
class Database{

	// Cadena de conexión.
	private $dsn = 'mysql:dbname=upv;host=localhost';

	// Usuario.
	private $user = 'root';

	// Contraseña.
	private $password = 'secret';

	// Variables que trabajaran con las consultas y resultados de la conexión.
	private $pdo = ""; // Guarda la conexión.
	private $sth = ""; // Guarda los resultados de las consultas.

	// Constructor para establecer la conexión.
	function __construct(){ 
		try{

			$this->pdo = new PDO( $this->dsn, $this->user, $this->password);

		}catch( PDOException $e ){

			echo 'Error en la conexión: ' . $e->getMessage();

		}
	}

	// Consultas select.
	public function select($sql){
		try{
			//echo $sql."<br>";
			$stmt = "";
			$stmt = $this->pdo->prepare($sql); // Prepara la consulta.	
			$stmt->execute(); // Ejecuta la consulta.
			$sth=$stmt->fetchAll(); // Convierte el resultado de la consulta en una array.
		} catch( PDOException $e ){ // Control de errores.
			echo 'Error en la conexión: ' . $e->getMessage();
			return;
		}
        return $sth; // Retorna los valores de la consulta.
        $sth ->close();
	}

	// Actualizar registros en la base de datos.
	public function update($sql){		
		echo "sql: " .$sql;
		try{
			$stmt = "";
			$stmt = $this->pdo->prepare($sql);
			$stmt->execute();
		} catch( PDOException $e ){
			echo 'Error al conectarnos: ' . $e->getMessage();
			return false;
		}
        return true;
        
        $stmt ->close();
	}

	// Insertar registros en la base de datos.
	public function insert($sql){	
		//echo $sql.'<br>';
		try{
			$stmt = "";
			$stmt = $this->pdo->prepare($sql); // Se prepara la consulta.
			$stmt->execute(); // Se ejecuta.
		} catch( PDOException $e ){ // Control de excepciones.
			echo 'Error al conectarnos: ' . $e->getMessage();
			return false; // Si arroja una excepción se devuelve "false".
		}
        return true; // Si todo sale bien se devuelve "true".
        
        $stmt ->close();
	}

	// Borrar registros de la base de datos.
	public function delete($sql){	
		echo $sql.'<br>';
		try{
			$stmt = "";
			$stmt = $this->pdo->prepare($sql); // Se prepara la consulta.
			$stmt->execute(); // Se ejecuta.
		} catch( PDOException $e ){ // Control de excepciones.
			echo 'Error al conectarnos: ' . $e->getMessage();
			return false; // Si arroja una excepción se devuelve "false".
		}
        return true; // Si todo sale bien se devuelve "true".
        
        $stmt ->close();
	}

}


?>