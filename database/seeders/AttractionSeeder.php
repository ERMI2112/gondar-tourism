<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Attraction;

class AttractionSeeder extends Seeder
{
    public function run(): void
    {
        $attractions = [
            [
                'category_id' => 1,
                'name' => 'Fasil Ghebbi (Royal Enclosure)',
                'description' => 'The Royal Enclosure of Fasil Ghebbi is a fortress-city in Gondar, founded by Emperor Fasilides in 1636. A UNESCO World Heritage site featuring magnificent palaces, churches, and monasteries enclosed within 900m of walls.',
                'history' => 'Built in the 17th century, Fasil Ghebbi served as the residence of the Ethiopian emperors for over 150 years. The complex features palaces of Fasilides, Iyasu I, Dawit III, Bekaffa, and Mentewab. Its unique architecture blends Hindu, Arab, and Baroque influences — a testament to Gondar\'s cosmopolitan empire.',
                'location_name' => 'Central Gondar City',
                'latitude' => 12.6084,
                'longitude' => 37.4693,
                'opening_hours' => '08:30 – 17:30 (Daily)',
                'ticket_price' => '200 ETB (Locals) / 500 ETB (Foreigners)',
                // Real photo of Fasil Ghebbi / Gondar castle complex
                'image' => 'https://upload.wikimedia.org/wikipedia/commons/f/f2/Fasilides_Castle_Gondar.jpg',
            ],
            [
                'category_id' => 2,
                'name' => 'Debre Berhan Selassie Church',
                'description' => 'Famous 18th-century church with iconic ceiling paintings of hundreds of angel faces. One of the most important and most beautiful religious sites in all of Ethiopia.',
                'history' => 'Built in the late 18th century by Emperor Iyasu II, this church miraculously survived the Mahdist invasion. According to legend, a swarm of bees protected the church from the invaders. Its interior is covered with vibrant murals depicting Biblical scenes and saints, with the ceiling displaying the famous rows of cherubic angel faces.',
                'location_name' => 'Gondar City, Amhara',
                'latitude' => 12.6175,
                'longitude' => 37.4705,
                'opening_hours' => '06:00 – 18:00 (Daily)',
                'ticket_price' => '150 ETB (Locals) / 300 ETB (Foreigners)',
                // Real photo of Debre Berhan Selassie
                'image' => 'https://upload.wikimedia.org/wikipedia/commons/7/75/Debre_Birhan_Selassie_church%2C_Gondar_%285495130810%29.jpg',
            ],
            [
                'category_id' => 1,
                'name' => 'Fasilidas\'s Bath (Timkat Pool)',
                'description' => 'A large rectangular pool surrounded by high stone walls and a central two-storey tower. World-famous as the site of the Timkat (Ethiopian Epiphany) celebration each January.',
                'history' => 'Built by Emperor Fasilidas in the 17th century as a royal bathing retreat. The bath became immortalized by the annual Timkat festival, where thousands of pilgrims gather to bless and swim in its waters, recreating the Baptism of Christ.',
                'location_name' => 'Gondar, near Fasilides Castle',
                'latitude' => 12.6060,
                'longitude' => 37.4668,
                'opening_hours' => '08:00 – 17:00 (Daily)',
                'ticket_price' => '100 ETB (Locals) / 250 ETB (Foreigners)',
                // Real photo of Fasilidas Bath
                'image' => 'https://upload.wikimedia.org/wikipedia/commons/e/ed/Fasilides_Bath_05.jpg',
            ],
            [
                'category_id' => 3,
                'name' => 'Simien Mountains National Park',
                'description' => 'Dramatic mountain range near Gondar with unique wildlife including Gelada baboons, Ethiopian wolves, and Walia ibex. A UNESCO World Heritage site with spectacular scenery and trekking routes.',
                'history' => 'Formed by volcanic activity and erosion over millions of years. The park was established in 1969 and is home to some of Africa\'s highest peaks including Ras Dashen at 4,550m — the 10th highest peak in Africa. The Simien mountains are considered one of Africa\'s great trekking destinations.',
                'location_name' => 'North Gondar Zone, Amhara',
                'latitude' => 13.3167,
                'longitude' => 38.3500,
                'opening_hours' => '06:00 – 18:00 (Daily)',
                'ticket_price' => '300 ETB (Locals) / 700 ETB (Foreigners)',
                'image' => 'https://upload.wikimedia.org/wikipedia/commons/1/1d/Gelada_Baboon_in_Simien_Mountains_National_Park.jpg',
            ],
            [
                'category_id' => 1,
                'name' => 'Kuskuam Complex (Empress Mentewab)',
                'description' => 'Ruins of a palace and convent built by Empress Mentewab in the 18th century, located on a hilltop with panoramic views over Gondar city. A powerful symbol of female royalty in Ethiopian history.',
                'history' => 'Built by Empress Mentewab (Walatta Giyorgis) in 1730 as a rival court. She was the most powerful woman in 18th century Ethiopia. The complex included a palace, church, and convent. The site was destroyed during the Mahdist invasions of the late 19th century but its ruins remain impressive.',
                'location_name' => 'Northwest of Gondar City',
                'latitude' => 12.6400,
                'longitude' => 37.4500,
                'opening_hours' => '09:00 – 17:00 (Daily)',
                'ticket_price' => '100 ETB (Locals) / 200 ETB (Foreigners)',
                'image' => 'https://upload.wikimedia.org/wikipedia/commons/4/44/Kuskuam_Palace_092018_-_1.jpg',
            ],
            [
                'category_id' => 4,
                'name' => 'Timkat Festival (Ethiopian Epiphany)',
                'description' => 'The most spectacular festival in Ethiopia — the celebration of the Baptism of Jesus Christ. Priests carry the Tabot (Ark of the Covenant replica) through jubilant crowds dressed in white ceremonial robes.',
                'history' => 'Timkat is celebrated on January 19-20 (or 20-21 in leap years). The night-long outdoor service culminates at Fasilidas\'s Bath at dawn, where the faithful plunge into holy water. This UNESCO Intangible Cultural Heritage event draws thousands of pilgrims and tourists from across the world.',
                'location_name' => 'Gondar City (Fasilidas Bath)',
                'latitude' => 12.6060,
                'longitude' => 37.4668,
                'opening_hours' => 'January 19-20 annually',
                'ticket_price' => 'Free (public festival)',
                // Fasilidas's Bath during Timkat season — same location, confirmed 200 OK
                'image' => 'https://upload.wikimedia.org/wikipedia/commons/e/ed/Fasilides_Bath_05.jpg',
            ],
        ];

        \Illuminate\Support\Facades\Schema::disableForeignKeyConstraints();
        Attraction::truncate();
        \Illuminate\Support\Facades\Schema::enableForeignKeyConstraints();

        foreach ($attractions as $a) Attraction::create($a);
    }
}
