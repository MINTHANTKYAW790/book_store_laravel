<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Books;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{


    /**
     * List of applications to add.
     */
    // private $permissions = [
    //     //Books
    //     'book-list',
    //     'book-detail',
    //     'book-create',
    //     'book-edit',
    //     'book-delete',

    //     //Authors
    //     'author-list',
    //     'author-create',
    //     'author-edit',

    //     //Genres
    //     'genre-list',
    //     'genre-create',
    //     'genre-edit',

    //     //Publishing Houses
    //     'publishing-house-list',
    //     'publishing-house-create',
    //     'publishing-house-edit',

    //     //Backup
    //     'backup-list',
    //     'backup-detail',
    //     'backup-restore',

    //     //Role
    //     'role-list',
    //     'role-create',
    //     'role-edit',
    //     'role-delete',

    //     //Authorized
    //     'authorized-list',
    //     'authorized-detail',
    //     'authorized-create',
    //     'authorized-edit',
    //     'authorized-delete',

    //     //Unauthorized
    //     'unauthorized-list',
    //     'unauthorized-detail',
    //     'unauthorized-restore'
    // ];
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        // Books::factory()->count(20)->create();
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // foreach ($this->permissions as $permission) {
        //     Permission::create(['name' => $permission]);
        // }

        // Create admin User and assign the role to him.
        $user = User::create([
            'name' => 'MintThantKyaw',
            'email' => 'minthantkyaw7907@gmail.com',
            'phone' => '09961666503',
            'address' => 'Nay Pyi Taw',
            'image' => 'user.jpg',



            'password' => Hash::make('password')
        ]);

        $role = Role::create(['name' => 'Admin']);

        $permissions = Permission::pluck('id', 'id')->all();

        $role->syncPermissions($permissions);

        $user->assignRole([$role->id]);
    }
}
