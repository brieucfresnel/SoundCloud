<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void.
     */
    public function run()
    {

        // Les utilisateurs

        DB::table('users')->insert([
            'name' => "utilisateur1",
            'email' => 'utilisateur1@gmail.com',
            'image' => '/img/default_profile.png',
            'password' => bcrypt('azerty'),
        ]);


        DB::table('users')->insert([
            'name' => "utilisateur2",
            'email' => 'utilisateur2@gmail.com',
            'image' => '/img/default_profile.png',
            'password' => bcrypt('azerty'),
        ]);


        // Les chansons
        DB::table('chanson')->insert([
            'nom' => "La chanson 1",
            'fichier' => "http://www.hochmuth.com/mp3/Haydn_Cello_Concerto_D-1.mp3",
            'image' => '/img/cover1.png',
            "style" => "classique",
            "utilisateur_id" => 1
        ]);

        DB::table('chanson')->insert([
            'nom' => "La chanson 2",
            'fichier' => "https://d1490khl9dq1ow.cloudfront.net/music/mp3preview/rock-and-roll-meets-metal_Gk4CsEEd.mp3",
            'image' => '/img/cover2.png',
            "style" => "rock",
            "utilisateur_id" => 1
        ]);
        
        DB::table('chanson')->insert([
            'nom' => "La chanson 3",
            'fichier' => "http://www.hochmuth.com/mp3/Haydn_Cello_Concerto_D-1.mp3",
            'image' => 'http://localhost:8000/img/cover3.png',
            "style" => "classique",
            "utilisateur_id" => 2
        ]);

        // Les suiveurs
        DB::table('connexion')->insert([
            'follower_id' => 1,
            'followed_id' => 1,
        ]);

    }
}


/*A->B->D
A->B->E
A->C->F
A->C->G
*/
