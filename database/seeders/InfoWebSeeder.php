<?php

namespace Database\Seeders;

use App\Models\InfoWeb;
use Illuminate\Database\Seeder;

class InfoWebSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $infoweb = [
            [
                'title_info' => 'titulo por defecto',
                'icon_first' => 'bi bi-house',
                'icon_second' => 'fa-solid fa-building',
                'icon_thrid' => 'fa-solid fa-person-shelter',
                'icon_fourth' => 'fa-solid fa-magnifying-glass',
                'title_first' => 'Lorem ipsum',
                'title_second' => 'Lorem ipsum',
                'title_thrid' => 'Lorem ipsum',
                'title_fourth' => 'Lorem ipsum',
                'select_us' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ut nisl a erat maximus placerat. Maecenas sollicitudin ligula nec ex sodales dapibus. Mauris bibendum ac enim non ullamcorper. Quisque cursus felis tellus, et rhoncus elit dignissim id. Etiam ut odio eget metus faucibus vestibulum. Sed suscipit consequat commodo. ',
                'sell_home' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ut nisl a erat maximus placerat. Maecenas sollicitudin ligula nec ex sodales dapibus.',
                'rent_home' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ut nisl a erat maximus placerat. Maecenas sollicitudin ligula nec ex sodales dapibus.',
                'buy_home' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ut nisl a erat maximus placerat. Maecenas sollicitudin ligula nec ex sodales dapibus.',
                'marketing_free' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ut nisl a erat maximus placerat. Maecenas sollicitudin ligula nec ex sodales dapibus.',
            ],            
        ];

        foreach ($infoweb as $infowebData) {
            InfoWeb::create($infowebData);
        }
    }
}
