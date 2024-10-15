<?php

namespace Controllers;

use Exception;
use Model\Novedad;
use MVC\Router;

class NovedadController
{
    public static function index(Router $router)
    {

        $router->render('novedad/index', []);
    }

    public static function guardarAPI()
    {
        $_POST['novedad_descripcion'] = htmlspecialchars($_POST['novedad_descripcion']);

        try {
            $novedad = new Novedad($_POST);
            $resultado = $novedad->crear();
            http_response_code(200);
            echo json_encode([
                'codigo' => 1,
                'mensaje' => 'Novedad registrada exitosamente',
            ]);
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode([
                'codigo' => 0,
                'mensaje' => 'Error al guardar Novedad',
                'detalle' => $e->getMessage(),
            ]);
        }
    }

    public static function buscarAPI()
     {
         try {
             $novedad = Novedad::obtenerNovedad();
             http_response_code(200);
             echo json_encode([
                 'codigo' => 1,
                 'mensaje' => 'Datos encontrados',
                 'detalle' => '',
                 'datos' => $novedad
             ]);
         } catch (Exception $e) {
             http_response_code(500);
             echo json_encode([
                 'codigo' => 0,
                 'mensaje' => 'Error al buscar Novedades',
                 'detalle' => $e->getMessage(),
             ]);
         }
     }

     public static function modificarAPI()
     {
         $_POST['novedad_descripcion'] = htmlspecialchars($_POST['novedad_descripcion']);
         $id = filter_var($_POST['novedad_id'], FILTER_SANITIZE_NUMBER_INT);
         try {

             $novedad = Novedad::find($id);
             $novedad->sincronizar($_POST);
             $novedad->actualizar();
             http_response_code(200);
             echo json_encode([
                 'codigo' => 1,
                 'mensaje' => 'Novedad modificada exitosamente',
             ]);
         } catch (Exception $e) {
             http_response_code(500);
             echo json_encode([
                 'codigo' => 0,
                 'mensaje' => 'Error al modificar esta Novedad',
                 'detalle' => $e->getMessage(),
             ]);
         }
     }

     public static function eliminarAPI()
     {

         $id = filter_var($_POST['novedad_id'], FILTER_SANITIZE_NUMBER_INT);
         try {

             $novedad = Novedad::find($id);
             // $producto->sincronizar([
             //     'situacion' => 0
             // ]);
             // $producto->actualizar();
             $novedad->eliminar();
             http_response_code(200);
             echo json_encode([
                 'codigo' => 1,
                 'mensaje' => 'Novedad eliminada exitosamente',
             ]);
         } catch (Exception $e) {
             http_response_code(500);
             echo json_encode([
                 'codigo' => 0,
                 'mensaje' => 'Error al eliminar esta Novedad',
                 'detalle' => $e->getMessage(),
             ]);
         }
     }
}
