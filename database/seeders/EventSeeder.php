<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;

class EventSeeder extends Seeder
{
    public function run(): void
    {
        \Illuminate\Support\Facades\Schema::disableForeignKeyConstraints();
        Event::truncate();
        \Illuminate\Support\Facades\Schema::enableForeignKeyConstraints();

        $events = [
            [
                'title'       => 'Enkutatash — Ethiopian New Year',
                'description' => 'Ethiopia welcomes its New Year with family visits, flowers, music and church gatherings. In Gondar, it is a warm start to the new season and a good time to experience local hospitality.',
                'location'    => 'Gondar City & Churches',
                'start_date'  => '2026-09-11',
                'end_date'    => '2026-09-11',
                'image'       => 'https://commons.wikimedia.org/wiki/Special:FilePath/Fasilidass%20Pool%2C%20Gondar%20%285494501839%29.jpg?width=1200',
            ],
            [
                'title'       => 'Meskel — Finding of the True Cross',
                'description' => 'A late-September feast commemorating the Finding of the True Cross. Communities build and light the Demera bonfire, gathering with flowers, prayer, song and a powerful sense of shared occasion.',
                'location'    => 'Gondar City & Churches',
                'start_date'  => '2026-09-27',
                'end_date'    => '2026-09-27',
                'image'       => 'https://commons.wikimedia.org/wiki/Special:FilePath/Demera%20engulfed%20in%20flame%20Meskel%202013.JPG?width=1200',
            ],
            [
                'title'       => 'Ethiopian Christmas — Genna',
                'description' => 'Genna is observed on 7 January with church services, song and family gatherings. Visitors should expect a meaningful religious day and plan respectfully around local services.',
                'location'    => 'Gondar Churches & City',
                'start_date'  => '2027-01-07',
                'end_date'    => '2027-01-07',
                'image'       => 'https://commons.wikimedia.org/wiki/Special:FilePath/Fasilides%20Bath%2001.jpg?width=1200',
            ],
            [
                'title'       => 'Timkat — Ethiopian Epiphany',
                'description' => 'On the eve of Timkat, communities accompany the Tabot to the water for Ketera. The following day is marked by prayer, blessing of water and processions. Gondar\'s Fasilides\' Bath is a defining setting for the celebration.',
                'location'    => 'Fasilidas\'s Bath & Gondar City',
                'start_date'  => '2027-01-18',
                'end_date'    => '2027-01-19',
                'image'       => 'https://commons.wikimedia.org/wiki/Special:FilePath/Fasilides%20Bath%20Timkat%20people.JPG?width=1400',
            ],
            [
                'title'       => 'Fasika — Ethiopian Easter',
                'description' => 'Fasika follows a 55-day fast and culminates in all-night services, prayer and the breaking of the fast with family and community. The date changes each year according to the Ethiopian Orthodox calendar.',
                'location'    => 'Gondar Churches & City',
                'start_date'  => '2027-05-02',
                'end_date'    => '2027-05-02',
                'image'       => 'https://commons.wikimedia.org/wiki/Special:FilePath/Fasilides%20Castle%2C%20Gondar.jpg?width=1200',
            ],
        ];

        foreach ($events as $e) Event::create($e);
    }
}
