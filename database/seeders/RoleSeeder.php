<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Author;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder

// php artisan db:seed --class=RoleSeeder

{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { {
            // Role
            // Admin
            // Role::create(['name' => 'Super Admin', 'guard_name' => 'admin', 'created_at' => now(), 'updated_at' => now()]);
            // Role::create(['name' => 'Sub Admin', 'guard_name' => 'admin', 'created_at' => now(), 'updated_at' => now()]);
            Role::create(['name' => 'Admin C', 'guard_name' => 'admin', 'created_at' => now(), 'updated_at' => now()]);

            // Author
            Role::create(['name' => 'Author A', 'guard_name' => 'author', 'created_at' => now(), 'updated_at' => now()]);
            Role::create(['name' => 'Author C', 'guard_name' => 'author', 'created_at' => now(), 'updated_at' => now()]);
            Role::create(['name' => 'Author B', 'guard_name' => 'author', 'created_at' => now(), 'updated_at' => now()]);


            // Permission

            // Admin :
            //Country
            Permission::create(['name' => 'Create Country', 'guard_name' => 'admin', 'created_at' => now(), 'updated_at' => now()]);
            Permission::create(['name' => 'Index Country', 'guard_name' => 'admin', 'created_at' => now(), 'updated_at' => now()]);
            Permission::create(['name' => 'Edit Country', 'guard_name' => 'admin', 'created_at' => now(), 'updated_at' => now()]);
            Permission::create(['name' => 'Delete Country', 'guard_name' => 'admin', 'created_at' => now(), 'updated_at' => now()]);

            //City
            Permission::create(['name' => 'Create City', 'guard_name' => 'admin', 'created_at' => now(), 'updated_at' => now()]);
            Permission::create(['name' => 'Index City', 'guard_name' => 'admin', 'created_at' => now(), 'updated_at' => now()]);
            Permission::create(['name' => 'Edit City', 'guard_name' => 'admin', 'created_at' => now(), 'updated_at' => now()]);
            Permission::create(['name' => 'Delete City', 'guard_name' => 'admin', 'created_at' => now(), 'updated_at' => now()]);

            //Admin
            Permission::create(['name' => 'Create Admin', 'guard_name' => 'admin', 'created_at' => now(), 'updated_at' => now()]);
            Permission::create(['name' => 'Index Admin', 'guard_name' => 'admin', 'created_at' => now(), 'updated_at' => now()]);
            Permission::create(['name' => 'Edit Admin', 'guard_name' => 'admin', 'created_at' => now(), 'updated_at' => now()]);
            Permission::create(['name' => 'Delete Admin', 'guard_name' => 'admin', 'created_at' => now(), 'updated_at' => now()]);

            //Author
            Permission::create(['name' => 'Create Author', 'guard_name' => 'admin', 'created_at' => now(), 'updated_at' => now()]);
            Permission::create(['name' => 'Index Author', 'guard_name' => 'admin', 'created_at' => now(), 'updated_at' => now()]);
            Permission::create(['name' => 'Edit Author', 'guard_name' => 'admin', 'created_at' => now(), 'updated_at' => now()]);
            Permission::create(['name' => 'Delete Author', 'guard_name' => 'admin', 'created_at' => now(), 'updated_at' => now()]);

            //Article
            Permission::create(['name' => 'Create Article', 'guard_name' => 'admin', 'created_at' => now(), 'updated_at' => now()]);
            Permission::create(['name' => 'Index Article', 'guard_name' => 'admin', 'created_at' => now(), 'updated_at' => now()]);
            Permission::create(['name' => 'Edit Article', 'guard_name' => 'admin', 'created_at' => now(), 'updated_at' => now()]);
            Permission::create(['name' => 'Delete Article', 'guard_name' => 'admin', 'created_at' => now(), 'updated_at' => now()]);

            //Category
            Permission::create(['name' => 'Create Category', 'guard_name' => 'admin', 'created_at' => now(), 'updated_at' => now()]);
            Permission::create(['name' => 'Index Category', 'guard_name' => 'admin', 'created_at' => now(), 'updated_at' => now()]);
            Permission::create(['name' => 'Edit Category', 'guard_name' => 'admin', 'created_at' => now(), 'updated_at' => now()]);
            Permission::create(['name' => 'Delete Category', 'guard_name' => 'admin', 'created_at' => now(), 'updated_at' => now()]);

            //Role
            Permission::create(['name' => 'Create Role', 'guard_name' => 'admin', 'created_at' => now(), 'updated_at' => now()]);
            Permission::create(['name' => 'Index Role', 'guard_name' => 'admin', 'created_at' => now(), 'updated_at' => now()]);
            Permission::create(['name' => 'Edit Role', 'guard_name' => 'admin', 'created_at' => now(), 'updated_at' => now()]);
            Permission::create(['name' => 'Delete Role', 'guard_name' => 'admin', 'created_at' => now(), 'updated_at' => now()]);

            //Permission
            Permission::create(['name' => 'Create Permission', 'guard_name' => 'admin', 'created_at' => now(), 'updated_at' => now()]);
            Permission::create(['name' => 'Index Permission', 'guard_name' => 'admin', 'created_at' => now(), 'updated_at' => now()]);
            Permission::create(['name' => 'Edit Permission', 'guard_name' => 'admin', 'created_at' => now(), 'updated_at' => now()]);
            Permission::create(['name' => 'Delete Permission', 'guard_name' => 'admin', 'created_at' => now(), 'updated_at' => now()]);


            // Author:
            //Country
            Permission::create(['name' => 'Create Country', 'guard_name' => 'Author', 'created_at' => now(), 'updated_at' => now()]);
            Permission::create(['name' => 'Index Country', 'guard_name' => 'Author', 'created_at' => now(), 'updated_at' => now()]);
            Permission::create(['name' => 'Edit Country', 'guard_name' => 'Author', 'created_at' => now(), 'updated_at' => now()]);
            Permission::create(['name' => 'Delete Country', 'guard_name' => 'Author', 'created_at' => now(), 'updated_at' => now()]);

            //City
            Permission::create(['name' => 'Create City', 'guard_name' => 'Author', 'created_at' => now(), 'updated_at' => now()]);
            Permission::create(['name' => 'Index City', 'guard_name' => 'Author', 'created_at' => now(), 'updated_at' => now()]);
            Permission::create(['name' => 'Edit City', 'guard_name' => 'Author', 'created_at' => now(), 'updated_at' => now()]);
            Permission::create(['name' => 'Delete City', 'guard_name' => 'Author', 'created_at' => now(), 'updated_at' => now()]);

            //Admin
            Permission::create(['name' => 'Create Admin', 'guard_name' => 'Author', 'created_at' => now(), 'updated_at' => now()]);
            Permission::create(['name' => 'Index Admin', 'guard_name' => 'Author', 'created_at' => now(), 'updated_at' => now()]);
            Permission::create(['name' => 'Edit Admin', 'guard_name' => 'Author', 'created_at' => now(), 'updated_at' => now()]);
            Permission::create(['name' => 'Delete Admin', 'guard_name' => 'Author', 'created_at' => now(), 'updated_at' => now()]);

            //Author
            Permission::create(['name' => 'Create Author', 'guard_name' => 'Author', 'created_at' => now(), 'updated_at' => now()]);
            Permission::create(['name' => 'Index Author', 'guard_name' => 'Author', 'created_at' => now(), 'updated_at' => now()]);
            Permission::create(['name' => 'Edit Author', 'guard_name' => 'Author', 'created_at' => now(), 'updated_at' => now()]);
            Permission::create(['name' => 'Delete Author', 'guard_name' => 'Author', 'created_at' => now(), 'updated_at' => now()]);

            //Article
            Permission::create(['name' => 'Create Article', 'guard_name' => 'Author', 'created_at' => now(), 'updated_at' => now()]);
            Permission::create(['name' => 'Index Article', 'guard_name' => 'Author', 'created_at' => now(), 'updated_at' => now()]);
            Permission::create(['name' => 'Edit Article', 'guard_name' => 'Author', 'created_at' => now(), 'updated_at' => now()]);
            Permission::create(['name' => 'Delete Article', 'guard_name' => 'Author', 'created_at' => now(), 'updated_at' => now()]);

            //Category
            Permission::create(['name' => 'Create Category', 'guard_name' => 'Author', 'created_at' => now(), 'updated_at' => now()]);
            Permission::create(['name' => 'Index Category', 'guard_name' => 'Author', 'created_at' => now(), 'updated_at' => now()]);
            Permission::create(['name' => 'Edit Category', 'guard_name' => 'Author', 'created_at' => now(), 'updated_at' => now()]);
            Permission::create(['name' => 'Delete Category', 'guard_name' => 'Author', 'created_at' => now(), 'updated_at' => now()]);

            //Role
            Permission::create(['name' => 'Create Role', 'guard_name' => 'Author', 'created_at' => now(), 'updated_at' => now()]);
            Permission::create(['name' => 'Index Role', 'guard_name' => 'Author', 'created_at' => now(), 'updated_at' => now()]);
            Permission::create(['name' => 'Edit Role', 'guard_name' => 'Author', 'created_at' => now(), 'updated_at' => now()]);
            Permission::create(['name' => 'Delete Role', 'guard_name' => 'Author', 'created_at' => now(), 'updated_at' => now()]);

            //Permission
            Permission::create(['name' => 'Create Permission', 'guard_name' => 'Author', 'created_at' => now(), 'updated_at' => now()]);
            Permission::create(['name' => 'Index Permission', 'guard_name' => 'Author', 'created_at' => now(), 'updated_at' => now()]);
            Permission::create(['name' => 'Edit Permission', 'guard_name' => 'Author', 'created_at' => now(), 'updated_at' => now()]);
            Permission::create(['name' => 'Delete Permission', 'guard_name' => 'Author', 'created_at' => now(), 'updated_at' => now()]);
        }
    }
}
