<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $insert_values = array();
        $c = 1;
        factory(App\Mo::class, 10000000)->create()->each(function ($u) {
                    $date = get_random_day();
                    $v = array('test data', 'on game', 'game news', 'stop game', 'stop all', 'on forum', 'stop forum');
                    array_push($insert_values,array("msisdn"=>"1111111","operatorid"=>"1","shortcodeid"=>"2","text"=>$v[ $c % count($v) ],"auth_token"=>"token","created_at"=>$date));
                    if ($c % 10000 === 0) {
                        $u->posts()->save($insert_values);
                    }
                    $c++;
                });
    }


    function get_random_day() 
    {
            $year = mt_rand(2010,2015);
            $month = mt_rand(1,12);
            $day = mt_rand(1, 28);
            return sprintf(
                "%s-%s-%s 00:00:00",
                $year,
                $month,
                $day
            );
    }
}
