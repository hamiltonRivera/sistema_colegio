<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        //creacion de rolees
        $role0 = Role::create(['name' => 'Administración']);
        $role1 = Role::create(['name' => 'Docente']);
        $role2 = Role::create(['name' => 'Docente_coordinador']);
        $role3 = Role::create(['name' => 'Estudiante']);
        $role5 = Role::create(['name' => 'Rector-Dirección']);
        $role6 = Role::create(['name' => 'Desarrollador']);
        $role7 = Role::create(['name' => 'Sin Rol']);


        //permiso alto nivel
        Permission::create(['name' => 'high_level'])->syncRoles([$role0, $role5, $role6, $role1, $role2, $role3]);
        Permission::create(['name' => 'ver_datos_sensibles-docentes'])->syncRoles($role6, $role5, $role1, $role2);


        //creacion de permisos
        Permission::create(['name'  => 'Administrador'])->syncRoles([$role0, $role5, $role6]);
        Permission::create(['name'  => 'editar_roles'])->syncRoles([$role5, $role6]);
        Permission::create(['name' => 'ver_usuarios'])->syncRoles([$role6, $role5,]);

         //docentes
         Permission::create(['name'  => 'ver_docente'])->syncRoles([$role0, $role1, $role2, $role3,$role5, $role6]);
         Permission::create(['name'  => 'crear_docente'])->syncRoles([$role2, $role5, $role6]);
         Permission::create(['name'  => 'editar_docente'])->syncRoles([$role2, $role5, $role6]);
         Permission::create(['name'  => 'eliminar_docente'])->syncRoles([$role2, $role5, $role6]);
         Permission::create(['name'  => 'subir_docente'])->syncRoles([$role2, $role5, $role6]);

         //Estudiantes
        Permission::create(['name' => 'ver_estudiante'])->syncRoles([$role2, $role3, $role1, $role5, $role6, $role0 ]);
        Permission::create(['name' => 'crear_estudiante'])->syncRoles([$role2, $role1, $role5, $role6 ]);
        Permission::create(['name' => 'editar_estudiante'])->syncRoles([$role2, $role5, $role6 ]);
        Permission::create(['name' => 'eliminar_estudiante'])->syncRoles([$role2, $role5, $role6 ]);
        Permission::create(['name' => 'subir_estudiante'])->syncRoles([$role2, $role5, $role6 ]);


        //notas
        Permission::create(['name' => 'registrar_nota'])->assignrole([$role1]);
        Permission::create(['name' => 'subir_nota'])->assignrole([$role1]);
        Permission::create(['name' => 'ver_Notas'])->syncRoles([$role1, $role2, $role3, $role5, $role6]);

         //administrativo
        //CRUD de pagos - estudiantes
        Permission::create(['name' => 'registrar_pago'])->assignrole([$role0]);
        Permission::create(['name' => 'subir_pago'])->assignrole([$role0]);
        Permission::create(['name' => 'editar_pago'])->assignrole([$role0]);
        Permission::create(['name' => 'ver_pagos'])->syncRoles([$role0, $role1, $role2, $role3, $role5, $role6]);

        //asignaturas
        Permission::create(['name' => 'ver_asignaturas'])->syncRoles([$role5, $role6, $role1, $role2, $role3]);
        Permission::create(['name' => 'crear_asignaturas'])->syncRoles([$role5, $role6]);
        Permission::create(['name' => 'editar_asignaturas'])->syncRoles([$role5, $role6]);
        Permission::create(['name' => 'eliminar_asignaturas'])->syncRoles([$role5, $role6]);

        //horarios
        Permission::create(['name' => 'crear_horario'])->syncRoles([$role5, $role6, $role2]);
        Permission::create(['name' => 'ver_horario'])->syncRoles([$role1, $role2, $role3, $role5, $role6]);
        Permission::create(['name' => 'editar_Horario'])->syncRoles([$role5, $role6, $role2]);
        Permission::create(['name' => 'eliminar_Horario'])->syncRoles([$role5, $role6, $role2]);

        //ver reportes
        Permission::create(['name' => 'Ver_Reportes'])->syncRoles([$role5, $role6, $role2]);

        //grados
        Permission::create(['name' => 'Ver_grados'])->syncRoles([$role1, $role2, $role5, $role6, $role3]);
        Permission::create(['name' => 'Crear_grados'])->syncRoles([$role2, $role5, $role6]);
        Permission::create(['name' => 'Editar_grados'])->syncRoles([$role2, $role5, $role6]);
        Permission::create(['name' => 'Eliminar_grados'])->syncRoles([$role2, $role5, $role6]);
        Permission::create(['name' => 'Subir_grados'])->syncRoles([ $role2, $role5, $role6]);

        //asignacion estudiantes - grado
        Permission::create(['name' => 'asignar_estudiante_grado'])->syncRoles([$role6, $role5, $role2]);
        Permission::create(['name' => 'ver_estudiante_grado'])->syncRoles([$role6, $role5, $role2, $role1, $role3]);

        //Asignacion grado - docente guia
        Permission::create(['name' => 'Asignar_grado_docente_guia'])->syncRoles([$role5, $role6]);
        Permission::create(['name' => 'Subir_grado_docente_guia'])->syncRoles([$role5, $role6]);
        Permission::create(['name' => 'ver_grado_docente_guia'])->syncRoles([$role5, $role6, $role1, $role2, $role3]);

         //asignacion materia - docente
         Permission::create(['name' => 'asignar_materia_docente'])->syncRoles([$role5, $role6]);
         Permission::create(['name' => 'ver_Materia_docente'])->syncRoles([$role1, $role2, $role3, $role5, $role6]);

         //evaluaciones - alumnos
        Permission::create(['name' => 'ver_evaluacion'])->syncRoles($role1, $role2, $role3, $role5, $role6);
        Permission::create(['name' => 'registrar_evaluacion'])->syncRoles($role1, $role2, $role6);
        Permission::create(['name' => 'editar_evaluacion'])->syncRoles($role1, $role2, $role6);
        Permission::create(['name' => 'eliminar_evaluacion'])->syncRoles($role1, $role2, $role6);

        //quejas
        User::create(
            [
              'name' => 'Hamilton Rivera',
              'email' => 'rivera.hamilton21@gmail.com',
              'user_name' => 'riverah',
              'password' => bcrypt('Gamaliel')
            ]
        )->assignRole('Desarrollador');

    }
}
