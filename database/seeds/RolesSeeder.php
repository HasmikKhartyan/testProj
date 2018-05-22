<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $author = Role::create([
            'name' => 'Author',
            'slug' => 'author',
            'permissions' => [
                'create-note' => true,
            ]
        ]);
        $editor = Role::create([
            'name' => 'Editor',
            'slug' => 'editor',
            'permissions' => [
                'update-note' => true,
                'publish-note' => true,
            ]
        ]);
    }

}
