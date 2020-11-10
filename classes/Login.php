<?php

/**
 * Class login
 * maneja el proceso de inicio y cierre de sesión del usuario
 */
class Login
{
    /**
     * @var object La conexión de la base de datos.
     */
    private $db_connection = null;
    /**
     * @var array Colección de mensajes de error.
     */
    public $errors = array();
    /**
     * @var array Colección de mensajes de éxito / neutrales
     */
    public $messages = array();

    /**
     * 
     * la función "__construct ()" se inicia automáticamente
     * cada vez que se crea un objeto de esta clase, ya sabes, cuando haces "$ login = new Login ();"
     */
    public function __construct()
    {
        // Sesión de creación / lectura, absolutamente necesario
        session_start();

        // verifique las posibles acciones de inicio de sesión:
        // si el usuario intentó cerrar sesión (sucede cuando el usuario hace clic en el botón de cerrar sesión)
        if (isset($_GET["logout"])) {
            $this->doLogout();
        }
        // iniciar sesión a través de datos de publicación (si el usuario acaba de enviar un formulario de inicio de sesión)
        elseif (isset($_POST["login"])) {
            $this->dologinWithPostData();
        }
    }

    /**
     * iniciar sesión con datos de publicación
     */
    private function dologinWithPostData()
    {
        // verifique el contenido del formulario
        if (empty($_POST['user_name'])) {
            $this->errors[] = "Username field was empty.";
        } elseif (empty($_POST['user_password'])) {
            $this->errors[] = "Password field was empty.";
        } elseif (!empty($_POST['user_name']) && !empty($_POST['user_password'])) {

            // crear una conexión de base de datos, usando las constantes de config / db.php (que cargamos en index.php)
            $this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

            // cambie el juego de caracteres a utf8 y verifíquelo
            if (!$this->db_connection->set_charset("utf8")) {
                $this->errors[] = $this->db_connection->error;
            }

            // si no hay errores de conexión (= conexión de base de datos de trabajo)
            if (!$this->db_connection->connect_errno) {

                // escape the POST stuff
                $user_name = $this->db_connection->real_escape_string($_POST['user_name']);

                // consulta de la base de datos, obteniendo toda la información del usuario seleccionado
                // (permite el inicio de sesión a través de la dirección de correo electrónico en el campo de nombre de usuario)
                $sql = "SELECT user_id, user_name, firstname, user_email, user_password_hash
                        FROM users
                        WHERE user_name = '" . $user_name . "' OR user_email = '" . $user_name . "';";
                $result_of_login_check = $this->db_connection->query($sql);

                // Si este usuario existe
                if ($result_of_login_check->num_rows == 1) {

                    // obtener fila de resultados (como un objeto)
                    $result_row = $result_of_login_check->fetch_object();

                    // usando la función password_verify () de PHP 5.5 para verificar si la contraseña proporcionada se ajusta al
                    //hash de la contraseña de ese usuario
                    if (password_verify($_POST['user_password'], $result_row->user_password_hash)) {

                        // escribir datos de usuario en PHP SESSION (un archivo en su servidor)
                        $_SESSION['user_id'] = $result_row->user_id;
						$_SESSION['firstname'] = $result_row->firstname;
						$_SESSION['user_name'] = $result_row->user_name;
                        $_SESSION['user_email'] = $result_row->user_email;
                        $_SESSION['user_login_status'] = 1;

                    } else {
                        $this->errors[] = "Usuario y/o contraseña no coinciden.";
                    }
                } else {
                    $this->errors[] = "Usuario y/o contraseña no coinciden.";
                }
            } else {
                $this->errors[] = "Problema de conexión de base de datos.";
            }
        }
    }

    /**
     * realizar el cierre de sesión
     */
    public function doLogout()
    {
        // Eliminar la sesión del usuario
        $_SESSION = array();
        session_destroy();
        // devolver un pequeño mensaje de retroalimentación
        $this->messages[] = "Has sido desconectado.";

    }

    /**
     * simplemente devuelva el estado actual del inicio de sesión del usuario
     * @return boolean user login status
     */
    public function isUserLoggedIn()
    {
        if (isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] == 1) {
            return true;
        }
        // retorno por defecto
        return false;
    }
}
