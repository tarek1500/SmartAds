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
        $this->call(AdminAccountsSeeder::class);
        // $this->call(UsersTableSeeder::class);

        // factory(App\User::class, 10)->create()->each(function ($user) {
        // 	$user->Notifications()->saveMany(factory(App\Notification::class, 5)->make());
        // 	$user->Logs()->saveMany(factory(App\Log::class, 5)->make());
        // 	$user->Ads()->saveMany(factory(App\Ad::class, 5)->make());
        // });
    //
        // factory(App\Zone::class, 10)->create()->each(function ($zone) {
        // 	$zone->Screens()->saveMany(factory(App\Screen::class, 5)->make());
        // });
    //
        // $ads = App\Ad::all();
        // foreach ($ads as $ad) {
        // 	$ad->Screens()->attach(App\Screen::inRandomOrder()->limit(1)->get()[0]->id);
        // }
    //
        // $screens = App\Screen::all();
        // foreach ($screens as $screen) {
        // 	$screen->Ads()->attach(App\Ad::inRandomOrder()->limit(1)->get()[0]->id);
        // }
    }
}
