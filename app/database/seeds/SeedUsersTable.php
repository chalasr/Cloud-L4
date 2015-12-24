<?php

use Illuminate\Database\Migrations\Migration;

class SeedUsersTable extends Migration
{

        public function up()
        {

                DB::table('users')->insert(
                        array(
                                array(
                                        'id' => 1,
                                        'username' => 'root',
                                        'password' => Hash::make('root'),
                                        'email'    => 'root@root.fr',
                                        'role_id'  => 1
                                ),
                                array(
                                        'username' => 'max',
                                        'password' => Hash::make('max'),
                                        'email'    => 'max@max.fr',
                                        'role_id'  => 1
                                ),
                                array(
                                        'username' => 'john',
                                        'password' => Hash::make('john'),
                                        'email'    => 'john@john.fr',
                                        'role_id'  => 1
                                ),
                                array(
                                        'username' => 'mary',
                                        'password' => Hash::make('mary'),
                                        'email'    => 'mary@mary.fr',
                                        'role_id'  => 1
                                )
                        ));
        }

        public function down()
        {
                DB::table('users')->delete();
        }

}