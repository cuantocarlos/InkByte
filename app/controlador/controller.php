<?php
class Controller{
    public function iniciarSesion() {
        try{
            $params = array(
                'mail' =>'',
                'pass' =>''
            );
            $mail="";
            $pass="";

            if ($_SESSION['nivel_usuario'] > 0) {
                header("location:index.php?ctl=inicio");
            }

            if(isset($_REQUEST["bAceptar"])){
                $mail = recoge("mail");
                $pass = recoge("pass");

                if(!empty($errores)){
                include("../../web/templates/inicioSesion.php");
                }else{
                        $cs=new Consultas();
                        if($usuario = $cs->verificarEmail($mail)){
                            $param['mensaje']="El correo no existe";
                        }else{
                            if($cs->verificarPass($usuario['email'],$usuario['pass'])){
                                if($usuario['activo']===1){
                                    $_SESSION['id_user'] = $usuario['id_user'];
                                    $_SESSION['nombre'] = $usuario['nombre'];
                                    $_SESSION['nick'] = $usuario['nick'];
                                    $_SESSION['email'] = $usuario['email'];
                                    $_SESSION['f_nacimiento'] = $usuario['f_nacimiento'];
                                    $_SESSION['foto_perfil'] = $usuario['foto_perfil'];
                                    $_SESSION['nivel'] = $usuario['nivel'];

                                    header('Location: index.php?ctl=inicio');
                                }else{
                                    $params = array(
                                        'mail' =>$mail,
                                        'pass' =>$pass
                                    );
                                    $param["mensaje"]="No se ha completado la autentificación por correo";
                                }
                            }else{
                                $params = array(
                                    'mail' =>$mail,
                                    'pass' =>$pass
                                );
                                $param["mensaje"]="La contraseña es incorrecta";
                            }
                        }
                }
            }
        }catch (Exception $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../logs/logException.txt");
            header('Location: index.php?ctl=error');
        } catch (Error $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../logs/logError.txt");
            header('Location: index.php?ctl=error');
        }
        require __DIR__ . '/../../web/templates/template_inicioSesion.php';
    }

    public function registro() {
            $nombre="";
            $nick="";
            $mail="";
            $pass="";
            $pass2="";
            $fecha="";
            $lector="";
            $foto_perfil="";
            $descripcion="";
            $nivel=0;
            $activo=0;

            $params = array(
                'nombre' => '',
                'nick'=>'',
                'mail' =>'',
                'pass' =>'',
                'fecha' =>'',
                'foto_perfil'=>'',
                'opcion' =>''
            );

            if ($_SESSION['nivel_usuario'] > 0) {
                header("location:index.php?ctl=inicio");
            }

            if((isset($_POST["bAceptar"]))){
                //recogemos datos de los inputs
                $nombre=recoge("nombre");
                $nick=recoge("nick");
                $mail=recoge("mail");
                $pass=recoge("pass");
                $pass2=recoge("pass2");
                $fecha=recoge("fecha");
                $foto_perfil=recoge("foto_perfil");
                $descripcion=recoge("descripcion");
                $lector=recoge("opcion_usuario");


                //comenzamos las validaciones
                if(empty($nombre)){
                    $param["mensaje"]="Por favor ingrese un nombre";
                }else{
                    $nombre=sinEspacios($nombre);
                }

                if(empty($nick)){
                    $nick = "User_".uniqid();
                }else{
                    $nick=sinEspacios($nick);
                }

                cFile($foto_perfil,$params,Config::$extensionesValidas,Config::$dir_usuario,Config::$max_file_size);

                cEmail($mail,$errores,"mail",30,8);

                if(cPassword($pass,$errores) && $pass!==$pass2){
                    $param["mensaje"]="Las contraseñas no coinciden";
                }

                cFecha($fecha,$errores);

                if($lector=="lector"){
                    $nivel=1;
                }
                elseif($lector=="escritor"){
                    $nivel=2;
                }

                if (!isset($_POST["terminos"]) || $_POST["terminos"] != 1) {
                    $param["mensaje"]="Debes aceptar los términos y condiciones para poder registrarte";
                }
                    try{
                        $cs = new Consultas();
                        $hash = password_hash($pass, PASSWORD_BCRYPT);
                        if($usuario = $cs->agregarNuevoUsuario($nombre,$nick,$mail,$hash,$fecha,$foto_perfil,$descripcion,$nivel,$activo)){
                            header('Location: index.php?ctl=iniciarSesion');
                        }else{
                            $params = array(
                                'nombre' => $nombre,
                                'mail' =>$mail,
                                'pass' =>$pass,
                                'fecha' =>$fecha,
                                'opcion' =>$lector
                            );

                            $params['mensaje'] = 'No se ha podido insertar el usuario. Revisa el formulario.';
                        }
                    }catch (Exception $e){
                            // En este caso guardamos los errores en un archivo de errores log
                            error_log($e->getMessage() . "##Código: " . $e->getCode() . "  " . microtime() . PHP_EOL, 3, "../logs/logBD.txt");
                            // guardamos en ·errores el error que queremos mostrar a los usuarios
                            header('Location: index.php?ctl=error');
                    }catch (Error $e){
                        error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../logs/logError.txt");
                        header('Location: index.php?ctl=error');
                    }
                }
                require __DIR__ . '/../../web/templates/registro.php';
        }

}