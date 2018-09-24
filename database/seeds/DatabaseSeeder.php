<?php

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\Storage::deleteDirectory('courses');
        \Illuminate\Support\Facades\Storage::deleteDirectory('users');

        \Illuminate\Support\Facades\Storage::makeDirectory('courses');
        \Illuminate\Support\Facades\Storage::makeDirectory('users');

        factory(\App\Role::class,1)->create(['name' => 'admin']);
        factory(\App\Role::class,1)->create(['name' => 'teacher']);
        factory(\App\Role::class,1)->create(['name' => 'student']);

        factory(\App\User::class,1)->create([
            'name' => 'admin',
            'email' => 'admin@mail.com',
            'password' => bcrypt('secret'),
            'role_id' => \App\Role::ADMIN
        ])
            ->each(function (\App\User $u){
                factory(\App\Student::class,1)->create(['user_id' => $u->id]);
            });

        //se crean 50 usuarios, no se le pasa ningun dato,
        //se recorren los 50, y para cada uno de ellos con la factory studen se convierten en estudiantes
        factory(\App\User::class,50)->create()
            ->each(function (\App\User $u){
                factory(\App\Student::class,1)->create(['user_id' => $u->id]);
            });

        //Aqui pasa lo mismo, solo que ahora se crearan profesores que a la vez seran estudiantes
        factory(\App\User::class,10)->create()
            ->each(function (\App\User $u){
                factory(\App\Student::class,1)->create(['user_id' => $u->id]);
                factory(\App\Teacher::class,1)->create(['user_id' => $u->id]);
            });

        factory(\App\Level::class,1)->create(['name' => ' Beginner']);
        factory(\App\Level::class,1)->create(['name' => ' Intermediate']);
        factory(\App\Level::class,1)->create(['name' => ' Advanced']);
        factory(\App\Category::class,5)->create();
    }
}
