<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleAdm = Role::create(['name' => 'Administrador', 'description' => 'Acceso Administrativo del Sistema de Correspondencia']);
        $roleUsr = Role::create(['name' => 'Usuario', 'description' => 'Acceso Normal para Funcionario del Sistema de Correspondencia']);


        // *************************************  HOJAS DE RUTA (USUARIOS)  *************************************
        //MODULO HOJAS DE RUTA
        $permission = Permission::create(['name' => 'hojaruta_index', 'description' => 'Listado de Hojas de Ruta'])->assignRole($roleUsr);
        $permission = Permission::create(['name' => 'hojaruta_CEA', 'description' => 'Crear Editar y Actualizar Hojas de Ruta'])->assignRole($roleUsr);
        $permission = Permission::create(['name' => 'hojaruta_agrupar_archivar_derivar', 'description' => 'Archivar, Agrupar y Derivar Hojas de Ruta'])->assignRole($roleUsr);
        
        $permission = Permission::create(['name' => 'hojarutaexterna_index', 'description' => 'Hojas de Ruta Externas'])->assignRole($roleUsr);
        $permission = Permission::create(['name' => 'buzonsalida_index', 'description' => 'Listado de Hojas de Rutas Enviadas'])->assignRole($roleUsr);

        //MODULO CONSULTAS
        $permission = Permission::create(['name' => 'seguimientohojaruta_index', 'description' => 'Seguimiento a Hojas de Ruta'])->assignRole($roleUsr);
        $permission = Permission::create(['name' => 'hojarutaarchivadas_index', 'description' => 'Lista de Hojas de Ruta Archivadas'])->assignRole($roleUsr);

        //MODULO OTROS (Comisiones de Viaje)
        $permission = Permission::create(['name' => 'otros_index', 'description' => 'Otras opciones (Comisiones de Viaje)'])->assignRole($roleUsr);
       
        //MODULO REGIONALES (Hojas de Ruta)
        $permission = Permission::create(['name' => 'Regionales_HR_index', 'description' => 'Listado de Hojas de Ruta para Regionales'])->assignRole($roleUsr);
       
        

        // *************************************   SISTEMA (ADMINISTRADOR)  ***************************************
        //MODULO ASIGNAR ROLES
        $permission = Permission::create(['name' => 'asignarRole_index', 'description' => 'Listado de Roles' ])->assignRole($roleAdm); //(assignRole): otorga un solo rol a un determinado permiso
        $permission = Permission::create(['name' => 'asignarRole_crud', 'description' => 'Crear, Editar, Actualizar y Eliminar Role' ])->assignRole($roleAdm);

        //MODULO FUNCIONARIOS HABILITADOS
        $permission = Permission::create(['name' => 'funcionario_index', 'description' => 'Listado de Funcionarios' ])->syncRoles([$roleAdm, $roleUsr]);
        $permission = Permission::create(['name' => 'funcionario_crud', 'description' => 'Crear, Editar y Actualizar Funcionarios' ])->assignRole($roleAdm);
        
        //MODULO ORGANIGRAMAS
        $permission = Permission::create(['name' => 'organigramas_index', 'description' => 'Listado del Organigrama' ])->syncRoles([$roleAdm, $roleUsr]);
        $permission = Permission::create(['name' => 'organigramas_crud', 'description' => 'Crear, Editar y Actualizar Organigrama' ])->assignRole($roleAdm);

        //MODULO CARGOS
        $permission = Permission::create(['name' => 'cargos_index', 'description' => 'Listado de Cargos' ])->syncRoles([$roleAdm, $roleUsr]);
        $permission = Permission::create(['name' => 'cargos_crud', 'description' => 'Crear, Editar y Actualizar Cargos' ])->assignRole($roleAdm);

        //MODULO ELABORACIÓN DE DOCUMENTOS
        $permission = Permission::create(['name' => 'documento_index', 'description' => 'Lista de Documentos Registrados'])->assignRole($roleAdm);
        $permission = Permission::create(['name' => 'documento_crud', 'description' => 'Crear, Editar y Actualizar Documentos'])->assignRole($roleAdm);

        //MODULO REGIONALES
        //$permission = Permission::create(['name' => 'regionales_index', 'description' => 'Listado de Regionales' ])->syncRoles([$roleAdm, $roleUsr]);
        //$permission = Permission::create(['name' => 'regionales_crud', 'description' => 'Crear, Editar y Actualizar Regionales' ])->assignRole($roleAdm);
        
    }
}
