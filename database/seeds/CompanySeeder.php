<?php

use Illuminate\Database\Seeder;
use App\Company;
use Faker\Factory;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        for ($i=0; $i < 51; $i++) { 
            $company = new Company();
            $company->name = $faker->company;
            $company->description = $faker->text(1000);
            $company->logo = $faker->imageUrl(100, 100);
            $company->address = $faker->address;
            $company->link = $faker->url;
            $company->save();
        }
    }
}
