<?php 

namespace Controllers;

use MVC\Router;
use Model\Vendedor;

class VendedorController {
    public static function crear( Router $router) {
        $errores = Vendedor::getErrores();

        $vendedor = new Vendedor;

        // Ejecuta el codigo despues de que el usuario envia el formulario
        if ($_SERVER['REQUEST_METHOD'] === 'POST') { 

            $vendedor = new Vendedor($_POST['vendedor']);
  
            // Validar que no haya campos vacios
            $errores = $vendedor->validar();

            if(empty($errores) ) {
                    $vendedor->guardar();
            }
        }

        $router->render('vendedores/crear', [
            'errores' => $errores,
            'vendedor' => $vendedor
        ]);
    }

    public static function actualizar( Router $router) {
        $errores = Vendedor::getErrores();
        $id = ValidarORedireccionar('/admin');

        // Obtener datos del vendedor 
        $vendedor = Vendedor::find($id);

        // Ejecuta el codigo despues de que el usuario envia el formulario
        if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
            
            // Asignar los valores
            $args = $_POST['vendedor'];
            
            // Sincronizar objeto en memoria
            $vendedor->sincronizar($args);

            
            // Validacion
            $errores = $vendedor->validar();

            if(empty($errores)) {
                $vendedor->guardar();
            }
        }
        $router->render('vendedores/actualizar', [
            'errores' => $errores,
            'vendedor' => $vendedor
        ]);
    }

    public static function eliminar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            // Validar el id
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);

            if ($id) {
                // Validar el tipo a eliminar
                $tipo = $_POST['tipo'];

                if (validarTipoContenido($tipo)) {
                    $vendedor = Vendedor::find($id);
                    $vendedor->eliminar();
                }
            }
        }
    }
}