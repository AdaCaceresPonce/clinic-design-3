<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [

            //Sección Administrar Página
            'Servicios' => [
                [
                    'name' => 'services.view',
                    'display_name' => 'Ver Servicios',
                ],
                [
                    'name' => 'services.create',
                    'display_name' => 'Crear Servicio',
                ],
                [
                    'name' => 'services.update',
                    'display_name' => 'Editar Servicio',
                ],
                [
                    'name' => 'services.delete',
                    'display_name' => 'Eliminar Servicio',
                ],
            ],

            'Profesionales' => [
                [
                    'name' => 'professionals.view',
                    'display_name' => 'Ver Profesionales',
                ],
                [
                    'name' => 'professionals.create',
                    'display_name' => 'Crear Profesional',
                ],
                [
                    'name' => 'professionals.update',
                    'display_name' => 'Editar Profesional',
                ],
                [
                    'name' => 'professionals.delete',
                    'display_name' => 'Eliminar Profesional',
                ],
            ],

            'Especialidades' => [
                [
                    'name' => 'specialties.view',
                    'display_name' => 'Ver Especialidades',
                ],
                [
                    'name' => 'specialties.create',
                    'display_name' => 'Crear Especialidad',
                ],
                [
                    'name' => 'specialties.update',
                    'display_name' => 'Editar Especialidad',
                ],
                [
                    'name' => 'specialties.delete',
                    'display_name' => 'Eliminar Especialidad',
                ],
            ],

            'Páginas Web' => [
                //Página Inicio
                [
                    'name' => 'welcome_page.view',
                    'display_name' => 'Ver Página Inicio',
                ],
                [
                    'name' => 'welcome_page.edit',
                    'display_name' => 'Editar Página Inicio',
                ],

                //Página Nosotros
                [
                    'name' => 'about_us_page.view',
                    'display_name' => 'Ver Página Nosotros',
                ],
                [
                    'name' => 'about_us_page.edit',
                    'display_name' => 'Editar Página Nosotros',
                ],

                //Página Nuestros Servicios
                [
                    'name' => 'our_services_page.view',
                    'display_name' => 'Ver Página Nuestros Servicios',
                ],
                [
                    'name' => 'our_services_page.edit',
                    'display_name' => 'Editar Página Nuestros Servicios',
                ],

                //Página Nuestros Profesionales
                [
                    'name' => 'our_professionals_page.view',
                    'display_name' => 'Ver Página Nuestros Profesionales',
                ],
                [
                    'name' => 'our_professionals_page.edit',
                    'display_name' => 'Editar Página Nuestros Profesionales',
                ],

                //Página Contáctanos
                [
                    'name' => 'contact_us_page.view',
                    'display_name' => 'Ver Página Contáctanos',
                ],
                [
                    'name' => 'contact_us_page.edit',
                    'display_name' => 'Editar Página Contáctanos',
                ],


            ],

            //Buzón
            'Consultas' => [
                [
                    'name' => 'inquiries.view',
                    'display_name' => 'Ver Consultas',
                ],
                [
                    'name' => 'inquiries.update',
                    'display_name' => 'Actualizar Consulta',
                ],
                [
                    'name' => 'inquiries.delete',
                    'display_name' => 'Eliminar Consulta',
                ],
            ],

            'Opiniones' => [
                [
                    'name' => 'opinions.view',
                    'display_name' => 'Ver Opiniones',
                ],
                [
                    'name' => 'opinions.update',
                    'display_name' => 'Actualizar Opinión',
                ],
                [
                    'name' => 'opinions.delete',
                    'display_name' => 'Eliminar Opinión',
                ],
            ],

            //Sección configuración
            'Usuarios' => [
                [
                    'name' => 'users.view',
                    'display_name' => 'Ver Usuarios',
                ],
                [
                    'name' => 'users.create',
                    'display_name' => 'Crear Usuario',
                ],
                [
                    'name' => 'users.update',
                    'display_name' => 'Editar Usuario',
                ],
                [
                    'name' => 'users.delete',
                    'display_name' => 'Eliminar Usuario',
                ],
            ],

            'Roles' => [
                [
                    'name' => 'roles.view',
                    'display_name' => 'Ver Roles',
                ],
                [
                    'name' => 'roles.create',
                    'display_name' => 'Crear Rol',
                ],
                [
                    'name' => 'roles.update',
                    'display_name' => 'Editar Rol',
                ],
                [
                    'name' => 'roles.delete',
                    'display_name' => 'Eliminar Rol',
                ],
            ],

            'Ajustes' => [
                [
                    'name' => 'settings.view',
                    'display_name' => 'Ver Ajustes',
                ],
                [
                    'name' => 'settings.update',
                    'display_name' => 'Editar Ajustes',
                ],
            ],
        ];

        //Crear los permisos
        foreach ($permissions as $module => $modulePermissions) {

            foreach ($modulePermissions as $permission) {
                // Permission::firstOrCreate(
                //     ['name' => $permission['name']],
                //     [
                //         'module' => $module,
                //         'display_name' => $permission['display_name'],
                //     ]
                // );

                Permission::create([
                    'name' => $permission['name'],
                    'module' => $module,
                    'display_name' => $permission['display_name'],
                ]);
            }
        }

        //Roles
        Role::create([
            'name' => 'admin',
            'display_name' => 'Admin',
        ])->givePermissionTo(Permission::all());

        Role::create([
            'name' => 'editor',
            'display_name' => 'Editor',
        ])->givePermissionTo([
            'services.view',
            'services.create',
            'services.update',
            'services.delete',

            'professionals.view',
            'professionals.create',
            'professionals.update',
            'professionals.delete',

            'specialties.view',
            'specialties.create',
            'specialties.update',
            'specialties.delete',
        ]);

        Role::create([
            'name' => 'viewer',
            'display_name' => 'Visitante',
        ])->givePermissionTo([
            'services.view',
            'professionals.view',
            'specialties.view',
            'welcome_page.view',
            'about_us_page.view',
            'our_services_page.view',
            'our_professionals_page.view',
            'contact_us_page.view',
            'inquiries.view',
            'opinions.view',
            'users.view',
            'roles.view',
            'settings.view',
        ]);

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@mail.com',
            'password' => bcrypt('12345678'),
        ])->assignRole('admin');

        User::factory()->create([
            'name' => 'Editor',
            'email' => 'editor@mail.com',
            'password' => bcrypt('12345678'),
        ])->assignRole('editor');

        User::factory()->create([
            'name' => 'Visitante',
            'email' => 'visitante@mail.com',
            'password' => bcrypt('12345678'),
        ])->assignRole('viewer');
    }
}
