<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use App\Buy;
use App\GiftCardCategory;
use App\Rating;
use App\Category;
use App\User;
use App\GiftCard;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        $usercount = User::count();
        $giftcardcount = GiftCard::count();
        // $categorycount = Category::count();

        for ($i=0; $i < 51; $i++) { 
            $buy = new Buy();
            $buy->user_id = User::skip($faker->numberBetween(0, $usercount-1))->take(1)->first();
            $buy->gift_card_id = GiftCard::skip($faker->numberBetween(0, $giftcardcount-1))->take(1)->first();

            // $rating = new Rating();
            // $rating->user_id = User::skip($faker->numberBetween(0, $usercount-1))->take(1)->first();
            // $rating->gift_card_id = GiftCard::skip($faker->numberBetween(0, $giftcardcount-1))->take(1)->first();
            // $rating->rate = random_int(0,5);

            // $gcc = new GiftCardCategory();
            // $gcc->category_id = Category::skip($faker->numberBetween(0, $categorycount-1))->take(1)->first();
            // $gcc->gift_card_id = GiftCard::skip($faker->numberBetween(0, $giftcardcount-1))->take(1)->first();

            $buy->save();
            // $rating->save();
            // $gcc->save();

        }
    }
}
