<?php
namespace Faker\Provider;
use Illuminate\Database\Seeder;


class TestTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
    	foreach (range(1,10) as $index) {
            DB::table('tests')->insert([
                'name' => str_random(5),
                'mobile' => rand(9011111111,9999999999),
                'address' => str_random(10),
                'description' => str_random(100),
            ]);
        }
    }
}
 