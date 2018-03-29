<?php

use Illuminate\Database\Seeder;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $user_list = [
        ['id' => (string) Uuid::generate(), 'name' => 'Martijn Totte', 'email' => 'mar3ddd3ddddst6tijsn@live.nl', 'password' => bcrypt('martijn123')],
        ['id' => (string) Uuid::generate(), 'name' => 'Timo Timmies', 'email' => 'ttidm3d3dsddLdss6eeft@gmail.nl', 'password' => bcrypt('timmietiert')],
        ['id' => (string) Uuid::generate(), 'name' => 'Dodo Littles', 'email' => 'doddo33dssdId6dstdsDood@life.nl', 'password' => bcrypt('dodeDodo')],
      ];
      foreach($user_list as $user){
        DB::table('users')->insert($user);
      }
    }
}
