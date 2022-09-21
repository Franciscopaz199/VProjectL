<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\file;
use App\models\name;

class cambioCode extends Controller
{
    
   
    public static function newCode($codigo){
        $parteS = new partesCodigo($codigo); 
        $parteS->main();
        return $parteS->newCodigo;
       
    }
}


	// Dividir el codigo en bloques
	class dividirbloques{
		private $algoritmo;
		public $par = [];
		private $abierta = [];
		private $block = [];

		function __construct($algoritmo)
		{
			$this->algoritmo = $algoritmo;
			$this->main();
		}

		public function main(){
			$this->getBloques();
			$this->bloques();
		}

		public function getBloques(){
			$valor = preg_match_all("/((\w+\s+)?\w+(\s+)?(\(.+\))?(\s+)?\{)|[{}]/",$this->algoritmo,$this->abierta,PREG_OFFSET_CAPTURE);
			if($valor > 0){
				$this->definirPares();					
			}
			
		}

		public function definirPares(){
			$cuenta2=0;
			for($i=0; $i<count($this->abierta[0]); $i++){
				if($this->abierta[0][$i][0] !== '}'){
					$this->par[$cuenta2] = [$this->abierta[0][$i][1], $this->obtenerPar($i)];
					$cuenta2++;
				}
			}
		}

		public function obtenerPar($i){
			$cuenta = 0;
			for($j=$i; $j<count($this->abierta[0]); $j++){
				if($this->abierta[0][$j][0] !== '}'){
					$cuenta +=1;
				}else if($this->abierta[0][$j][0] === '}' && $cuenta>0 ){
					$cuenta -= 1 ;
				}

				if($cuenta==0){
					return $this->abierta[0][$j][1];
				}
			}
		}

		public function bloques(){
			foreach ($this->par as $key) {
				$bloque = substr($this->algoritmo,$key[0],$key[1]-$key[0]+1);
				array_push($this->block,$bloque);
			}
		}

		public function getBlock(){
			return $this->block;
		}	


	}

	class newCode
	{
		public $Originalcode;
		protected $partesCode;
		public $newCodigo = "";

		public $prototipos = [];
		public $bloques = [];
		public $ifBlock = [];
		public $functionBlock = [];
		public $ciclosBlock = [];
		public $funcionesName = [];
		public $main;

		public $variablesUsadas = [];
		public $funcionesUsadas = [];



		public function __construct($codigo)
		{	
			$this->Originalcode = $codigo;
			$this->principal();
		}
		public function principal(){
			$this->obtenerBloques();
			$this->functionBlock();	
		}
		
		public function obtenerBloques(){
			$partes = new dividirbloques($this->Originalcode);
			$this->bloques = $partes->getBlock();

		}

		public function functionBlock(){
			foreach ($this->bloques as $valor){
				$condicion = preg_match("/^(\s+)?\w+\s+\w+(\s+)?\((.+)?\)/", $valor);

				if($condicion>=1){
					
					$valor = $this->cambiarCiclos($valor);
					$valor = $this->variablesDentrofunciones($valor);
					if(preg_match("/int main(\s+)?\((\s|\w)+\)/",$valor,$prototipoMain)){
						if (rand(0,1) == 1) {
							$newMain = str_replace($prototipoMain[0],"int main()",$valor);
							
						}else{
							$newMain = str_replace($prototipoMain[0],"int main(void)",$valor);
						}

						$this->main = $newMain;
					}else{
						$valor = $this->variablesFunciones($valor);
						array_push($this->functionBlock,$valor);
						$condicion = preg_match("/^(\s+)?\w+\s+\w+(\s+)?\((.+)?\)/", $valor, $prototipo);
						$this->nombreFunciones($prototipo[0]);
						array_push($this->prototipos,$prototipo[0].";");
						
					}
					
				}
			}

		}
		public function verCodigo($codigo)
		{
			echo "<code><pre>".$codigo."</code></pre>";
		}

		public function variablesFunciones($funcion)
		{
			$condicion = preg_match("/\(((\s+)?\w+\s+[*&]?\w+([,]|(\[\w+\]))?)+\)/", $funcion, $parentesis);
			if($condicion > 0){
				$condicion = preg_match_all("/(bool|char|int|float|double)\s+[*&]?\w+/", $parentesis[0], $variablesF);
				foreach ($variablesF[0] as $key) {
					preg_match_all("/\w+/",$key,$valores);
					$tipo = preg_match("/(bool|char|int|float|double)/", $key,$tipoVar);
					foreach ($valores[0] as $vaer) {
					 $funcion =  $this->reeplaceVar($tipoVar[0],$vaer,$funcion);
					}
				}
				
			}
			return $funcion;		
		}

		public function variablesDentrofunciones($funcion)
		{
			// variables  con solo una declaracion
			
			$valor = preg_match_all("/\s+(bool|char|int|float|double)\s+.+[;]/", $funcion, $coincidencias);
			//var_dump($coincidencias[0]);
			if($valor>=1)
			{
				foreach ($coincidencias[0] as $key) 
				{
					$tipo = preg_match("/(bool|char|int|float|double)/", $key,$tipoVar);
			 		// Funciones con una declaracion
			 		//var_dump($tipoVar[0]);
					if ($tipo >= 1) {
						preg_match_all("/(\w+)/", $key,$nameVariable);
					 	foreach ($nameVariable[0] as $valor) {
							$funcion = $this->reeplaceVar($tipoVar[0],$valor,$funcion); 		
					 	}
			 			
					}
					
				}
					
			}
			return $funcion;

		}

		public function reeplaceVar($tipo,$key,$funcionC)
		{

			if ($key !== 'bool' && $key !== 'char' && $key !== 'int' && $key !== 'float' && $key !== 'double' &&   !is_numeric($key) && $key !== 'true' && $key !== 'false' && strlen($key) > 3  && $key != 'long' && $key != 'vector'  ) 
			{
				do
				{
					// Seleccionar todos los registros que coinciden en la base de datos
					$nombres = name::where('tipo', $tipo)->where('campo','variable')->get();
					$reemplazo =  $nombres[rand(0,count($nombres)-1)]->name;

				}while((in_array($reemplazo, $this->variablesUsadas)));

				array_push($this->variablesUsadas ,$reemplazo);
				$funcionC =  preg_replace("/".$key."/",$reemplazo,$funcionC);

			}

			return $funcionC;
		}
		 
		 public function nombreFunciones($funcionName)
		 {
		 	$tipo = preg_match("/(bool|char|int|float|double|void)/", $funcionName,$tipofuncion);
		 	$condicion = preg_match("/\s+([*&])?\w+\(/", $funcionName, $nombre);
		 	$cuentas = preg_match("/\w+/",$nombre[0],$names);
		 	array_push($this->funcionesName,[trim($names[0],"("),$tipofuncion[0]]);
		 }

		 public function reemplazarNombreFunciones()
		 {
		 	foreach ($this->funcionesName as $key ){

				do
				{
					// Seleccionar todos los registros que coinciden en la base de datos
					$nombres = name::where('campo','funcion')->where('tipo', $key[1])->get();
					$reemplazo =  $nombres[rand(0,count($nombres)-1)]->name;
				}while((in_array($reemplazo, $this->funcionesUsadas)));

				array_push($this->funcionesUsadas,$reemplazo);
		 		$this->newCodigo = str_replace($key[0], $reemplazo,$this->newCodigo);

			 	}	
		 }



		 
		 public function cambiarCiclos($funcion){



		 	// Bloques de codigo dentro de una funcion
		 	$partesF = new dividirbloques($funcion);
			$bloquesF = $partesF->getBlock();
			foreach ($bloquesF as $valor => $key) {
				$value = preg_match("/^for(\s)?\(.+\)/", $key,$cicloFor);
				if($value>=1){
					if(rand(0,1) == 1){
						$save = $key;
						$porciones = explode(";", $cicloFor[0]);
						$inicio = preg_replace("/for(\s+)?\(/","",$porciones[0]).";".'<br>';
						$condicion = $porciones[1];
						$iteracion = preg_replace("/\)/","",$porciones[2]).";";
						$cicloWhile = $inicio.'while('.$condicion. ')';
						$key = substr_replace($key,$cicloWhile,0,strlen($cicloWhile));
						$pos = (strrpos($save, "}"));
						$contenido = substr($save, strpos($save,"{"),strrpos($save, "}") - strpos($save,"{"));
						$contenido .= $iteracion.'\n'."}";
						//var_dump($save);
						//var_dump($contenido);
						$cicloWhile .= $contenido;


						$funcion = str_replace($save, $cicloWhile, $funcion);
						//$funcion = substr_replace($funcion,$key,$partesF->par[$valor][0],strlen($key));
					}
				}	
			}
			return $funcion;
		 }

	}

	//Definir las partes del codigo,pero solo definir 
	class partesCodigo extends newCode
	{
		public $librerias = [];
		public $namespace;
		public $variablesGlobales;
		public $prototipofinal = [];
		public $definciones = [];
		public $colas = [];

		public function setlibrerias(){
			$valor = preg_match_all("/[#]\w+(\s+)?\<(.+)\>/",$this->Originalcode,$librerias);
			if($valor > 0 ){
				shuffle($librerias[0]);
				foreach ($librerias[0] as $key) {
					array_push($this->librerias, $key);
				}
			}		

		}
		public function main(){
			$this->setlibrerias();
			$this->setnamespace();
			$this->setprototipo();
			$this->imprimir();
			$this->reemplazarNombreFunciones();
			//$this->verCodigo($this->newCodigo);
		}
		
		public function setnamespace(){
			$this->namespace = "using namespace std;";
			
		}
		public function setvariablesGlobales(){
			////<*>////
		}
		public function setprototipo(){
			$numeros = [];
			for($i=0; $i<count($this->prototipos); $i++){
				$numeros[$i] = $i;
			}
			shuffle($numeros);
			foreach ($numeros as $key ) {
				$this->variablesFunciones($this->functionBlock[$key]);
				if(rand(0, 1) == 1){
					$this->setcolas($this->functionBlock[$key]);
					array_push($this->prototipofinal,$this->prototipos[$key]);
				}else{
					if(count($this->definciones)<$key && count($this->definciones) > 0 ){
						array_push($this->prototipofinal,$this->prototipos[$key]);
					}
					array_push($this->definciones,$this->functionBlock[$key]);
				}
			}

		}

		public function setcolas($funcion){
			array_push($this->colas,$funcion);
		}


		public function imprimir(){
			
			$this->newCodigo .= "// Librerias\n";

			// concatenar librerias
			foreach ($this->librerias as $key ) 
			{
				$this->newCodigo .= "\n".$key;
			}
			//concatenar namespace

			$this->newCodigo .= "\n".$this->namespace;
			$this->newCodigo .= "\n\n // Prototipos\n\n";
			foreach ($this->prototipofinal as $key )
			{
				$this->newCodigo .= "\n".$key;
			}
			foreach ($this->definciones as $key )
			{
				$this->newCodigo .= "\n".$key;
			}
			$this->newCodigo .= "\n".$this->main;
			foreach ($this->colas as $key) {
				$this->newCodigo .= "\n".$key;
			}
			//$this->verCodigo($this->Originalcode);
		}	

	}


	

