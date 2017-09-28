<?php

use Illuminate\Database\Seeder;
use App\GiftCard;
use Faker\Factory;
use App\Company;

class GiftCardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        // $count = Company::count();
        // for ($i=0; $i < 51; $i++) { 
        //     $giftcard = new GiftCard();
        //     $giftcard->name = $faker->name;
        //     $giftcard->price = $faker->randomFloat(5,0,1000);
        //     $giftcard->description = $faker->text(1000);
        //     $giftcard->image = $faker->imageUrl(400, 600);
        //     $giftcard->company_id = Company::skip($faker->numberBetween(0, $count-1))->take(1)->first()->id;
        //     $giftcard->expiration_date = null;
        //     $giftcard->basket_user_id = null;
        //     $giftcard->view = $faker->numberBetween(0,10000);
        //     $giftcard->save();
        // }

        $giftcards = GiftCard::get();
        foreach ($giftcards as $giftcard) {
            $giftcard->name = $faker->word;
            $giftcard->save();
        }
    }
}
