<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\v_documentacion_tecnica_tabulador_mano_obra;
use App\Models\v_documentacion_tecnica_explosion_insumos;
use App\Models\V_documentacion_tecnica_fasar;

class documentacion_tecnica extends Controller
{
    //Funciones que traen los datos necesitados para la vista documentacion tecnica en el apartado contratos.
    public function getTabuladorContratos () {
        $data = v_documentacion_tecnica_tabulador_mano_obra::select(
            'contratos_creado as recibido',
            'proyectos_nombre as proyecto',
            'contratos_nombre_comercial as contratista',
            'contratos_razon_social as contratista_name',
            'contratos_especialidad as especialidad',
            'contratos_objeto as contratista_objeto',
            'contratos_registro_patronal as registro_patronal',
            'contratos_num_aprox_trabajadores as num_aprox_trabajadores',
            'contratos_importe as monto_obra',
            'contratos_fecha_inicio as fecha_inicio',
            'contratos_fecha_termino as fecha_termino',
            'documentacion_tecnica_subcontratacion as subcontrata',
            'documentacion_tecnica_comentarios as comentarios',
            'tabulador_mano_obra_estatus_documentacion_tecnica as estatus',
            'documentacion_tecnica_archivo_tabulador_mano_obra as archivo'
        )->get();
        return $data;
    }

    public function getFasarContratos () {
        $data = V_documentacion_tecnica_fasar::select(
            'contratos_creado as recibido',
            'proyectos_nombre as proyecto',
            'contratos_nombre_comercial as contratista',
            'contratos_razon_social as contratista_name',
            'contratos_especialidad as especialidad',
            'contratos_objeto as contratista_objeto',
            'contratos_registro_patronal as registro_patronal',
            'contratos_num_aprox_trabajadores as num_aprox_trabajadores',
            'contratos_importe as monto_obra',
            'contratos_fecha_inicio as fecha_inicio',
            'contratos_fecha_termino as fecha_termino',
            'documentacion_tecnica_subcontratacion as subcontrata',
            'documentacion_tecnica_comentarios as comentarios',
            'fasar_estatus as estatus',
            'documentacion_tecnica_archivo_fasar as archivo'
        )->get();

        return $data;
    }

    public function getExplosionContratos (){
        $data = v_documentacion_tecnica_explosion_insumos::select(
            'contratos_creado as recibido',
            'proyectos_nombre as proyecto',
            'contratos_nombre_comercial as contratista',
            'contratos_razon_social as contratista_name',
            'contratos_especialidad as especialidad',
            'contratos_objeto as contratista_objeto',
            'contratos_registro_patronal as registro_patronal',
            'contratos_num_aprox_trabajadores as num_aprox_trabajadores',
            'contratos_importe as monto_obra',
            'contratos_fecha_inicio as fecha_inicio',
            'contratos_fecha_termino as fecha_termino',
            'documentacion_tecnica_subcontratacion as subcontrata',
            'documentacion_tecnica_comentarios as comentarios',
            'explosion_insumos_estatus as estatus',
            'documentacion_tecnica_archivo_explosion_insumos as archivo'
        )->get();

        return $data;
    }

    //Funciones para obtener los datos de la vista documentacion tecnica del apartado Trabajos Extra.
    public function getTabuladorTrabajos () {
        $data = v_documentacion_tecnica_tabulador_mano_obra::select(
            'contratos_creado as recibido',
            'zonas_nombre as zona',
            'proyectos_nombre as proyecto',
            'contratos_nombre_comercial as contratista',
            'contratos_razon_social as contratista_name',
            'contratos_especialidad as especialidad',
            'tabulador_mano_obra_estatus_documentacion_tecnica as estatus',
            'documentacion_tecnica_archivo_tabulador_mano_obra as archivo'
        )->get();
        return $data;
    }

    public function getFasarTrabajos () {
        $data = V_documentacion_tecnica_fasar::select(
            'contratos_creado as recibido',
            'zonas_nombre as zona',
            'proyectos_nombre as proyecto',
            'contratos_nombre_comercial as contratista',
            'contratos_razon_social as contratista_name',
            'contratos_especialidad as especialidad',
            'fasar_estatus as estatus',
            'documentacion_tecnica_archivo_fasar as archivo'
        )->get();
        return $data;
    }

    public function getExplosionTrabajos () {
        $data = v_documentacion_tecnica_explosion_insumos::select(
            'contratos_creado as recibido',
            'zonas_nombre as zona',
            'proyectos_nombre as proyecto',
            'contratos_nombre_comercial as contratista',
            'contratos_razon_social as contratista_name',
            'contratos_especialidad as especialidad',
            'explosion_insumos_estatus as estatus',
            'documentacion_tecnica_archivo_explosion_insumos as archivo'
        )->get();
        return $data;
    }

    //Funciones necesarias para el filtrado en el apartado de Contratos.
    public function tabuladorContratosQuery ($query) {
        $queryArr = explode( ',', $query );
        $consulta = [];

        for($i = 0; $i < count($queryArr); $i++){
            switch ($queryArr[$i]){
                case 'recibido': array_push($consulta, array(['contratos_creado' => $queryArr[$i+1]]) ); 
                break;
                case 'proyecto': array_push($consulta, array( ['proyectos_nombre' => $queryArr[$i+1]] )); 
                break;
                case 'contratista': array_push($consulta, array( ['contratos_nombre_comercial' => $queryArr[$i+1]] )); 
                break;
                case 'especialidad': array_push($consulta, array( ['contratos_especialidad' => $queryArr[$i+1]] )); 
                break;
                case 'contratista_objeto': array_push($consulta, array( ['contratos_objeto' => $queryArr[$i+1]] )); 
                break;
                case 'registro_patronal': array_push($consulta, array( ['contratos_registro_patronal' => $queryArr[$i+1]] )); 
                break;
                case 'num_aprox_trabajadores': array_push($consulta, array( ['contratos_num_aprox_trabajadores' => $queryArr[$i+1]] )); 
                break;
                case 'monto_obra': array_push($consulta, array( ['contratos_importe' => $queryArr[$i+1]] )); 
                break;
                case 'fecha_inicio': array_push($consulta, array( ['contratos_fecha_inicio' => $queryArr[$i+1]] )); 
                break;
                case 'fecha_termino': array_push($consulta, array( ['contratos_fecha_termino' => $queryArr[$i+1]] )); 
                break;
                case 'subcontrata': array_push($consulta, array( ['documentacion_tecnica_subcontratacion' => $queryArr[$i+1]] )); 
                break;
                case 'comentarios': array_push($consulta, array( ['documentacion_tecnica_comentarios' => $queryArr[$i+1]] )); 
                break;
                case 'estatus': array_push($consulta, array( ['tabulador_mano_obra_estatus_documentacion_tecnica' => $queryArr[$i+1]] )); 
                break;
                case 'archivo': array_push($consulta, array( ['documentacion_tecnica_archivo_tabulador_mano_obra' => $queryArr[$i+1]] )); 
                break;
            }    
        }

        $data = v_documentacion_tecnica_tabulador_mano_obra::where($consulta)->select(
            'contratos_creado as recibido',
            'proyectos_nombre as proyecto',
            'contratos_nombre_comercial as contratista',
            'contratos_razon_social as contratista_name',
            'contratos_especialidad as especialidad',
            'contratos_objeto as contratista_objeto',
            'contratos_registro_patronal as registro_patronal',
            'contratos_num_aprox_trabajadores as num_aprox_trabajadores',
            'contratos_importe as monto_obra',
            'contratos_fecha_inicio as fecha_inicio',
            'contratos_fecha_termino as fecha_termino',
            'documentacion_tecnica_subcontratacion as subcontrata',
            'documentacion_tecnica_comentarios as comentarios',
            'tabulador_mano_obra_estatus_documentacion_tecnica as estatus',
            'documentacion_tecnica_archivo_tabulador_mano_obra as archivo'
        )->get();
        return $data;
    } 

    public function fasarContratosQuery ($query) {
        $queryArr = explode( ',', $query );
        $consulta = [];

        for($i = 0; $i < count($queryArr); $i++){
            switch ($queryArr[$i]){
                case 'recibido': array_push($consulta, array(['contratos_creado' => $queryArr[$i+1]]) ); 
                break;
                case 'proyecto': array_push($consulta, array( ['proyectos_nombre' => $queryArr[$i+1]] )); 
                break;
                case 'contratista_objeto': array_push($consulta, array( ['contratos_nombre_comercial' => $queryArr[$i+1]] )); 
                break;
                case 'especialidad': array_push($consulta, array( ['contratos_especialidad' => $queryArr[$i+1]] )); 
                break;
                case 'objeto': array_push($consulta, array( ['contratos_objeto' => $queryArr[$i+1]] )); 
                break;
                case 'registro_patronal': array_push($consulta, array( ['contratos_registro_patronal' => $queryArr[$i+1]] )); 
                break;
                case 'num_aprox_trabajadores': array_push($consulta, array( ['contratos_num_aprox_trabajadores' => $queryArr[$i+1]] )); 
                break;
                case 'monto_obra': array_push($consulta, array( ['contratos_importe' => $queryArr[$i+1]] )); 
                break;
                case 'fecha_inicio': array_push($consulta, array( ['contratos_fecha_inicio' => $queryArr[$i+1]] )); 
                break;
                case 'fecha_termino': array_push($consulta, array( ['contratos_fecha_termino' => $queryArr[$i+1]] )); 
                break;
                case 'subcontrata': array_push($consulta, array( ['documentacion_tecnica_subcontratacion' => $queryArr[$i+1]] )); 
                break;
                case 'comentarios': array_push($consulta, array( ['documentacion_tecnica_comentarios' => $queryArr[$i+1]] )); 
                break;
                case 'estatus': array_push($consulta, array( ['fasar_estatus' => $queryArr[$i+1]] )); 
                break;
                case 'archivo': array_push($consulta, array( ['documentacion_tecnica_archivo_fasar' => $queryArr[$i+1]] )); 
                break;
            }    
        }

        $data = V_documentacion_tecnica_fasar::where($consulta)->select(
            'contratos_creado as recibido',
            'proyectos_nombre as proyecto',
            'contratos_nombre_comercial as contratista',
            'contratos_razon_social as contratista_name',
            'contratos_especialidad as especialidad',
            'contratos_objeto as contratista_objeto',
            'contratos_registro_patronal as registro_patronal',
            'contratos_num_aprox_trabajadores as num_aprox_trabajadores',
            'contratos_importe as monto_obra',
            'contratos_fecha_inicio as fecha_inicio',
            'contratos_fecha_termino as fecha_termino',
            'documentacion_tecnica_subcontratacion as subcontrata',
            'documentacion_tecnica_comentarios as comentarios',
            'fasar_estatus as estatus',
            'documentacion_tecnica_archivo_fasar as archivo'
        )->get();
        return $data;
    }

    public function explosionContratosQuery ($query) {
        $queryArr = explode( ',', $query );
        $consulta = [];

        for($i = 0; $i < count($queryArr); $i++){
            switch ($queryArr[$i]){
                case 'recibido': array_push($consulta, array(['contratos_creado' => $queryArr[$i+1]]) ); 
                break;
                case 'proyecto': array_push($consulta, array( ['proyectos_nombre' => $queryArr[$i+1]] )); 
                break;
                case 'contratista': array_push($consulta, array( ['contratos_nombre_comercial' => $queryArr[$i+1]] )); 
                break;
                case 'especialidad': array_push($consulta, array( ['contratos_especialidad' => $queryArr[$i+1]] )); 
                break;
                case 'contratista_objeto': array_push($consulta, array( ['contratos_objeto' => $queryArr[$i+1]] )); 
                break;
                case 'registro_patronal': array_push($consulta, array( ['contratos_registro_patronal' => $queryArr[$i+1]] )); 
                break;
                case 'num_aprox_trabajadores': array_push($consulta, array( ['contratos_num_aprox_trabajadores' => $queryArr[$i+1]] )); 
                break;
                case 'monto_obra': array_push($consulta, array( ['contratos_importe' => $queryArr[$i+1]] )); 
                break;
                case 'fecha_inicio': array_push($consulta, array( ['contratos_fecha_inicio' => $queryArr[$i+1]] )); 
                break;
                case 'fecha_termino': array_push($consulta, array( ['contratos_fecha_termino' => $queryArr[$i+1]] )); 
                break;
                case 'subcontrata': array_push($consulta, array( ['documentacion_tecnica_subcontratacion' => $queryArr[$i+1]] )); 
                break;
                case 'comentarios': array_push($consulta, array( ['documentacion_tecnica_comentarios' => $queryArr[$i+1]] )); 
                break;
                case 'estatus': array_push($consulta, array( ['explosion_insumos_estatus' => $queryArr[$i+1]] )); 
                break;
                case 'archivo': array_push($consulta, array( ['documentacion_tecnica_archivo_explosion_insumos' => $queryArr[$i+1]] )); 
                break;
            }    
        }

        $data = v_documentacion_tecnica_explosion_insumos::where($consulta)->select(
            'contratos_creado as recibido',
            'proyectos_nombre as proyecto',
            'contratos_nombre_comercial as contratista',
            'contratos_razon_social as contratista_name',
            'contratos_especialidad as especialidad',
            'contratos_objeto as contratista_objeto',
            'contratos_registro_patronal as registro_patronal',
            'contratos_num_aprox_trabajadores as num_aprox_trabajadores',
            'contratos_importe as monto_obra',
            'contratos_fecha_inicio as fecha_inicio',
            'contratos_fecha_termino as fecha_termino',
            'documentacion_tecnica_subcontratacion as subcontrata',
            'documentacion_tecnica_comentarios as comentarios',
            'explosion_insumos_estatus as estatus',
            'documentacion_tecnica_archivo_explosion_insumos as archivo'
        )->get();
        return $data;
    }

    //Funciones necesarias para el filtrado en el apartado de Trabajos Extra.
    public function tabuladorTrabajosQuery ($query) {
        $queryArr = explode( ',', $query );
        $consulta = [];

        for($i = 0; $i < count($queryArr); $i++){
            switch ($queryArr[$i]){
                case 'recibido': array_push($consulta, array(['contratos_creado' => $queryArr[$i+1]]) ); 
                break;
                case 'zona': array_push($consulta, array( ['zonas_nombre' => $queryArr[$i+1]] )); 
                break;
                case 'proyecto': array_push($consulta, array( ['proyectos_nombre' => $queryArr[$i+1]] )); 
                break;
                case 'contratista': array_push($consulta, array( ['contratos_nombre_comercial' => $queryArr[$i+1]] )); 
                break;
                case 'especialidad': array_push($consulta, array( ['contratos_especialidad' => $queryArr[$i+1]] )); 
                break;
                case 'estatus': array_push($consulta, array( ['tabulador_mano_obra_estatus_documentacion_tecnica' => $queryArr[$i+1]] )); 
                break;
                case 'archivo': array_push($consulta, array( ['documentacion_tecnica_archivo_tabulador_mano_obra' => $queryArr[$i+1]] )); 
                break;
            }    
        }

        $data = v_documentacion_tecnica_tabulador_mano_obra::where($consulta)->select(
            'contratos_creado as recibido',
            'zonas_nombre as zona',
            'proyectos_nombre as proyecto',
            'contratos_nombre_comercial as contratista',
            'contratos_razon_social as contratista_name',
            'contratos_especialidad as especialidad',
            'tabulador_mano_obra_estatus_documentacion_tecnica as estatus',
            'documentacion_tecnica_archivo_tabulador_mano_obra as archivo'
        )->get();

        return $data;
    }
    
    public function fasarTrabajosQuery( $query ) {
        $queryArr = explode( ',', $query );
        $consulta = [];

        for($i = 0; $i < count($queryArr); $i++){
            switch ($queryArr[$i]){
                case 'recibido': array_push($consulta, array(['contratos_creado' => $queryArr[$i+1]]) ); 
                break;
                case 'zona': array_push($consulta, array( ['zonas_nombre' => $queryArr[$i+1]] )); 
                break;
                case 'proyecto': array_push($consulta, array( ['proyectos_nombre' => $queryArr[$i+1]] )); 
                break;
                case 'contratista': array_push($consulta, array( ['contratos_nombre_comercial' => $queryArr[$i+1]] )); 
                break;
                case 'especialidad': array_push($consulta, array( ['contratos_especialidad' => $queryArr[$i+1]] )); 
                break;
                case 'estatus': array_push($consulta, array( ['fasar_estatus' => $queryArr[$i+1]] )); 
                break;
                case 'archivo': array_push($consulta, array( ['documentacion_tecnica_archivo_fasar' => $queryArr[$i+1]] )); 
                break;
            }    
        }

        $data = $data = V_documentacion_tecnica_fasar::where($consulta)->select(
            'contratos_creado as recibido',
            'zonas_nombre as zona',
            'proyectos_nombre as proyecto',
            'contratos_nombre_comercial as contratista',
            'contratos_razon_social as contratista_name',
            'contratos_especialidad as especialidad',
            'fasar_estatus as estatus',
            'documentacion_tecnica_archivo_fasar as archivo'
        )->get();

        return $data;
    }

    public function explosionTrabajosQuery( $query ) {
        $queryArr = explode( ',', $query );
        $consulta = [];

        for($i = 0; $i < count($queryArr); $i++){
            switch ($queryArr[$i]){
                case 'recibido': array_push($consulta, array(['contratos_creado' => $queryArr[$i+1]]) ); 
                break;
                case 'zona': array_push($consulta, array( ['zonas_nombre' => $queryArr[$i+1]] )); 
                break;
                case 'proyecto': array_push($consulta, array( ['proyectos_nombre' => $queryArr[$i+1]] )); 
                break;
                case 'contratista': array_push($consulta, array( ['contratos_nombre_comercial' => $queryArr[$i+1]] )); 
                break;
                case 'especialidad': array_push($consulta, array( ['contratos_especialidad' => $queryArr[$i+1]] )); 
                break;
                case 'estatus': array_push($consulta, array( ['explosion_insumos_estatus' => $queryArr[$i+1]] )); 
                break;
                case 'archivo': array_push($consulta, array( ['documentacion_tecnica_archivo_explosion_insumos' => $queryArr[$i+1]] )); 
                break;
            }    
        }

        $data = v_documentacion_tecnica_explosion_insumos::where($consulta)->select(
            'contratos_creado as recibido',
            'zonas_nombre as zona',
            'proyectos_nombre as proyecto',
            'contratos_nombre_comercial as contratista',
            'contratos_razon_social as contratista_name',
            'contratos_especialidad as especialidad',
            'explosion_insumos_estatus as estatus',
            'documentacion_tecnica_archivo_explosion_insumos as archivo'
        )->get();

        return $data;
    }

    //Funciones que permiten obtener los datos necesarios para la vista de documentacion tecnica del apartado contrato
    public function getTabuladorManoObra() {
        //Se extraen los datos y se reasigna un nombre en el json, esto permitira
        //que sean congruente con los datos que se utilizaran.
        $data = v_documentacion_tecnica_tabulador_mano_obra::select(
            'contratos_creado as recibido',
            'proyectos_nombre as proyecto',
            'contratos_nombre_comercial as contratista',
            'contratos_razon_social as contratista_name',
            'contratos_especialidad as especialidad',
            'contratos_objeto as contratista_objeto',
            'contratos_registro_patronal as registro_patronal',
            'contratos_num_aprox_trabajadores as num_aprox_trabajadores',
            'contratos_importe as monto_obra',
            'contratos_fecha_inicio as fecha_inicio',
            'contratos_fecha_termino as fecha_termino',
            'documentacion_tecnica_subcontratacion as subcontrata',
            'documentacion_tecnica_comentarios as comentarios',
            'tabulador_mano_obra_estatus_documentacion_tecnica as estatus',
            'documentacion_tecnica_archivo_tabulador_mano_obra as archivo'
        )->where("documentacion_tecnica_archivo_tabulador_mano_obra", "b130a716-1ea8-49a1-8183-c63e52bc46fd.pdf")->get();
        // return response()->json(v_documentacion_tecnica_tabulador_mano_obra::all(), 200);
        return response()->json($data, 200);
    }

    public function getFasar() {
        $data = V_documentacion_tecnica_fasar::select(
            'contratos_creado as recibido',
            'proyectos_nombre as proyecto',
            'contratos_nombre_comercial as contratista',
            'contratos_razon_social as contratista_name',
            'contratos_especialidad as especialidad',
            'contratos_objeto as contratista_objeto',
            'contratos_registro_patronal as registro_patronal',
            'contratos_num_aprox_trabajadores as num_aprox_trabajadores',
            'contratos_importe as monto_obra',
            'contratos_fecha_inicio as fecha_inicio',
            'contratos_fecha_termino as fecha_termino',
            'documentacion_tecnica_subcontratacion as subcontrata',
            'documentacion_tecnica_comentarios as comentarios',
            'fasar_estatus as estatus',
            'documentacion_tecnica_archivo_fasar as archivo'
        )->get();
        return response()->json(V_documentacion_tecnica_fasar::all(), 200);
        return response()->json($data, 200);
    }

    public function getExplosionInsumos() {
        $data = v_documentacion_tecnica_explosion_insumos::select(
            'contratos_creado as recibido',
            'proyectos_nombre as proyecto',
            'contratos_nombre_comercial as contratista',
            'contratos_razon_social as contratista_name',
            'contratos_especialidad as especialidad',
            'contratos_objeto as contratista_objeto',
            'contratos_registro_patronal as registro_patronal',
            'contratos_num_aprox_trabajadores as num_aprox_trabajadores',
            'contratos_importe as monto_obra',
            'contratos_fecha_inicio as fecha_inicio',
            'contratos_fecha_termino as fecha_termino',
            'documentacion_tecnica_subcontratacion as subcontrata',
            'documentacion_tecnica_comentarios as comentarios',
            'explosion_insumos_estatus as estatus',
            'documentacion_tecnica_archivo_explosion_insumos as archivo'
        )->get();
        return response()->json(v_documentacion_tecnica_explosion_insumos::all(), 200);
        return response()->json($data, 200);
    }

    public function getAllDocumentacion () {
        $data = $this->getTabuladorContratos();
        $data2 = $this->getFasarContratos();
        $data3 = $this->getExplosionContratos();
        
        $documentacion = array_merge((array)json_decode($data), (array) json_decode($data2), (array) json_decode($data3));        
        return response()->json($documentacion, 200);
    }

    public function getAllTrabajosExtra () {
        $data = $this->getTabuladorTrabajos();
        $data2 = $this->getFasarTrabajos();
        $data3 = $this->getExplosionTrabajos();
        
        $documentacion = array_merge((array)json_decode($data), (array) json_decode($data2), (array) json_decode($data3));        
        return response()->json($documentacion, 200);
    }

    //Querys para filtros de busqueda
    public function getAllDocumentacionQuery ($query) {
        $data = $this->tabuladorContratosQuery($query);
        $data2 = $this->fasarContratosQuery($query);
        $data3 = $this->explosionContratosQuery($query);

        $documentacion = array_merge((array)json_decode($data), (array) json_decode($data2), (array) json_decode($data3));
        return response()->json($documentacion, 200);
    }

    public function getAllTrabajosExtraQuery ($query) {
        // $consulta = ['contratos_creado' => $queryArr[1]];
        $data = $this->tabuladorTrabajosQuery($query);
        $data2 = $this->fasarTrabajosQuery($query);
        $data3 = $this->explosionTrabajosQuery($query);

        $documentacion = array_merge((array)json_decode($data), (array) json_decode($data2), (array) json_decode($data3));
        return response()->json($documentacion, 200);
    }
    
}
