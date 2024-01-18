<?php
require_once('bGeneral.php');

function cabecera($titulo = NULL) //el archivo actual
{
?>
<!DOCTYPE html>
		<html lang="es">
			<head>
				<title>
				<?php
				echo $titulo;
				?>

			</title>
				<meta charset="utf-8"/>
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
			</head>
		<body>
<?php
}

function pie()
{
    echo "</body>
	</html>";
}

function sinTildes($frase)
{
    $no_permitidas = array(
        "á",
        "é",
        "í",
        "ó",
        "ú",
        "Á",
        "É",
        "Í",
        "Ó",
        "Ú",
        "à",
        "è",
        "ì",
        "ò",
        "ù",
        "À",
        "È",
        "Ì",
        "Ò",
        "Ù"
    );
    $permitidas = array(
        "a",
        "e",
        "i",
        "o",
        "u",
        "A",
        "E",
        "I",
        "O",
        "U",
        "a",
        "e",
        "i",
        "o",
        "u",
        "A",
        "E",
        "I",
        "O",
        "U"
    );
    $texto = str_replace($no_permitidas, $permitidas, $frase);
    return $texto;
}

function sinEspacios($frase)
{
    $texto = trim(preg_replace('/ +/', ' ', $frase));
    return $texto;
}

function recoge($var)
{
    if (isset($_REQUEST[$var]) && (!is_array($_REQUEST[$var]))) {
        $tmp = sinEspacios($_REQUEST[$var]);
        $tmp = strip_tags($tmp);
    } else
        $tmp = "";

    return $tmp;
}

function recogeBool($val): bool
{
    return isset($_REQUEST[$val]);
}

function cTexto(string $text, string $campo, array &$errores, int $max = 30, int $min = 1, bool $espacios = TRUE, bool $case = TRUE): bool
{
    $case = ($case === TRUE) ? "i" : "";
    $espacios = ($espacios === TRUE) ? " " : "";
    if ((preg_match("/^[A-Za-zñ$espacios]{" . $min . "," . $max . "}$/u$case", sinTildes($text)))) {
        return true;
    }
    $errores[$campo] = "Error en el campo $campo";
    return false;
}

function cDireccion(string $text, array &$errores): bool
{
    if (strlen($text) > 1 && strlen($text) < 70) {
        return true;
    }
    $errores["direccion"] = "Error en el campo direccion";
    return false;

}

function cNum(int $num, string $campo, array &$errores, int $min = 0, int $max = 150): bool
{
    if (($num >= $min) && ($num <= $max)) {
        return true;
    }
    $errores[$campo] = "Error en el campo $campo";
    return false;
}

function cRadioButton(string $rb, string $campo, &$errores, string $er = "/[123]/"): bool
{
    if (preg_match($er, $rb)) {
        return true;
    }
    $errores[$campo] = "Error en el campo " . $campo;
    return false;
}

function recogeArray($var)
{
    if (!empty($_REQUEST[$var])) {
        $array = $_REQUEST[$var];
        foreach ($array as $value) {
            $tmp[] = strip_tags(sinEspacios($value));
        }
    } else
        $tmp = "";


    return $tmp;
}


function cFormatoFecha($formato, $fecha): bool
{
    if (preg_match($formato, $fecha)) {
        return true;
    } else {
        return false;
    }
}

function convertirAUNIX($fechaIntroducida, $formato)
{
    $fechaArray = date_parse_from_format($formato, $fechaIntroducida);
    if (checkdate($fechaArray["month"], $fechaArray["day"], $fechaArray["year"])) {
        return strtotime($fechaIntroducida);
    }
}

function cUNIX($fechaIntroducida): bool
{
    $fecha = date("m-d-Y", $fechaIntroducida);
    if (checkdate($fecha[1], $fecha[0], $fecha[2])) {
        return true;
    } else {
        return false;
    }
}

function cEmail($email, &$errores, $campo, $max, $min)
{
    if (preg_match("/^[\w.-]+@[a-zA-Z\d.-]+\.[a-zA-Z]{2,}$/", $email) && strlen($email) < $max && strlen($email) > $min) {
        return 1;
    } else {
        $errores[$campo] = "Error en el campo " . $campo;
        return 0;
    }
}

function cFecha($fecha, &$errores)
{
    $fechaArray = explode("-", $fecha);
    if (checkdate($fechaArray[1], $fechaArray[2], $fechaArray[0])) {
        return 1;
    } else {
        $errores["fecha"] = "Error en el campo fecha";
        return 0;
    }
}

function mayorEdad($fecha)
{
    $timestampNacimiento = strtotime($fecha);
    $timestampActual = time();
    $diferenciaSegundos = $timestampActual - $timestampNacimiento;
    $anios = floor($diferenciaSegundos / (60 * 60 * 24 * 365));
    if ($anios >= 18) {
        return 1;
    } else {
        return 0;
    }
}

//para validar checkboxMultiple
function cCheck (array $text, string $campo, array &$errores, array $valores, bool $requerido=TRUE)
{
    if (($requerido) && (count($text)===0)){
            $errores[$campo] = "Error en el campo $campo";
            return false;
    }
    foreach ($text as $valor){
        if (!in_array($valor, $valores)){
            $errores[$campo] = "Error en el campo $campo";
            return false;
        }

    }
    return true;
}

function cFile(string $nombre, array &$errores, array $extensiones_validas, string $directorio, int  $max_file_size): bool|string
{
    if (empty($_FILES[$nombre]["name"])) {
        return false; // No se ha subido ningún archivo, salir del método.
    }
if (($_FILES[$nombre]['error'] != 0)) {// se comprueban los errores del servidor
        $errores["$nombre"] = "Error al subir el archivo " . $nombre . ". Prueba de nuevo";
        return false;
    } else {

        $nombreArchivo_original = strip_tags($_FILES[$nombre]['name']);
        $filesize = $_FILES[$nombre]['size'];
        $directorioTemp = strip_tags($_FILES[$nombre]['tmp_name']);
        $arrayInfoArchivo = pathinfo($nombreArchivo_original);

        $extension = $arrayInfoArchivo['extension'];
        if (!in_array($extension, $extensiones_validas)) {
            $errores["$nombre"] = "La extensión del archivo no es válida o no se ha subido ningún archivo";
        }
        // Comprobamos el tamaño del archivo
        if ($filesize > $max_file_size) {
            $errores["$nombre"] = "La imagen debe de tener un tamaño inferior a 50 kb";
        }

        // Almacenamos el archivo en ubicación definitiva si no hay errores ( al compartir array de errores TODOS LOS ARCHIVOS tienen que poder procesarse para que sea exitoso. Si cualquiera da error, NINGUNO  se procesa)

        if (empty($errores)) {
            $nombreArchivo = $arrayInfoArchivo['filename'] . uniqid();
            $nombreCompleto = $directorio . $nombreArchivo . "." . $extension;
            // Movemos el fichero a la ubicación definitiva
            if (move_uploaded_file($directorioTemp, $nombreCompleto)) {

                return  $nombreArchivo . "." . $extension;
            } else {
                $errores["$nombre"] = "Error: No se puede mover el fichero a su destino";
                return false;
            }
        } else {
            return false;
        }
    }
}

//Cambiar la contraseña guardada
function changePass($newPass,$oldPass,array &$sesion,&$errores,$pdo){
    if(!empty($oldPass)){
        return true;
        if(empty($newPass)){
            $errores["newPass"]= "Si desea cambiar a una nueva contraseña deba ingresar una";
        }else if($oldPass != obtenerContraseña($pdo,$sesion["idUser"])){
            $errores["oldPass"]= "La contraseña actual no es correcta";
        }else{
            $oldPass= $newPass;
        }
    }
}
?>