<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Hotel;

class HotelSeeder extends Seeder
{
    public function run(): void
    {
        \Illuminate\Support\Facades\Schema::disableForeignKeyConstraints();
        Hotel::truncate();
        \Illuminate\Support\Facades\Schema::enableForeignKeyConstraints();

        $hotels = [
            [
                'name'        => 'Goha Hotel Gondar',
                'type'        => 'hotel',
                'description' => 'Gondar\'s premier hilltop hotel with panoramic views over the royal city and distant Simien mountains. The iconic terraced swimming pool overlooking Fasil Ghebbi makes Goha one of Ethiopia\'s most photographed hotels. Features spacious rooms, an excellent restaurant serving traditional Ethiopian cuisine, and impeccable service.',
                'address'     => 'Goha Hill, Gondar City, Amhara Region',
                'phone'       => '+251 58 111 4020',
                'email'       => 'info@gohahotel.com',
                'website'     => 'https://www.gohahotel.com',
                'stars'       => 4,
                'price_range' => '2,500 – 5,000 ETB / night',
                'image'       => 'https://images.unsplash.com/photo-1566073771259-6a8506099945?auto=format&fit=crop&w=800&q=80',
                'latitude'    => 12.6115,
                'longitude'   => 37.4721,
                'amenities'   => ['WiFi', 'Swimming Pool', 'Restaurant', 'Bar', 'Parking', 'Airport Transfer', 'City View', 'Conference Room'],
                'is_active'   => true,
            ],
            [
                'name'        => 'Meri Hotel Gondar',
                'type'        => 'hotel',
                'description' => 'Centrally located in the heart of Gondar, Meri Hotel offers comfortable rooms at excellent value. Walking distance from Fasil Ghebbi, the city\'s markets, and key restaurants. The hotel restaurant serves authentic Amhara cuisine with a wide selection of traditional injera dishes and tej (honey wine).',
                'address'     => 'Piazza, Central Gondar',
                'phone'       => '+251 58 111 2310',
                'email'       => 'merihotel@ethionet.et',
                'website'     => null,
                'stars'       => 3,
                'price_range' => '800 – 1,800 ETB / night',
                'image'       => 'https://images.unsplash.com/photo-1551882547-ff40c63fe5fa?auto=format&fit=crop&w=800&q=80',
                'latitude'    => 12.6081,
                'longitude'   => 37.4688,
                'amenities'   => ['WiFi', 'Restaurant', 'Bar', 'Parking', 'Room Service'],
                'is_active'   => true,
            ],
            [
                'name'        => 'Quara Hotel',
                'type'        => 'hotel',
                'description' => 'Modern business hotel offering well-appointed rooms with all amenities. The Quara Hotel is popular with business travellers and tourists alike, featuring a rooftop terrace with views across Gondar\'s distinctive skyline. Known for its attentive staff and convenient location.',
                'address'     => 'Azezo Road, Gondar',
                'phone'       => '+251 58 111 6800',
                'email'       => null,
                'website'     => null,
                'stars'       => 3,
                'price_range' => '1,000 – 2,200 ETB / night',
                'image'       => 'https://images.unsplash.com/photo-1520250497591-112f2f40a3f4?auto=format&fit=crop&w=800&q=80',
                'latitude'    => 12.5980,
                'longitude'   => 37.4600,
                'amenities'   => ['WiFi', 'Restaurant', 'Rooftop Terrace', 'Parking', 'TV'],
                'is_active'   => true,
            ],
            [
                'name'        => 'Taye Belay Hotel',
                'type'        => 'guesthouse',
                'description' => 'A beloved budget-friendly guesthouse in the center of Gondar, known for its warm hospitality and family atmosphere. Rooms are clean and comfortable with hot showers and WiFi. The ground-floor restaurant is famous among locals for its generous portions of firfir and tibs.',
                'address'     => 'Near Fasil Ghebbi, Gondar',
                'phone'       => '+251 58 111 1560',
                'email'       => null,
                'website'     => null,
                'stars'       => 2,
                'price_range' => '350 – 700 ETB / night',
                'image'       => 'https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?auto=format&fit=crop&w=800&q=80',
                'latitude'    => 12.6075,
                'longitude'   => 37.4695,
                'amenities'   => ['WiFi', 'Restaurant', 'Hot Water', 'Breakfast Included'],
                'is_active'   => true,
            ],
            [
                'name'        => 'Belegez Pension',
                'type'        => 'guesthouse',
                'description' => 'A charming budget pension ideal for backpackers and independent travelers. Set in a quiet compound with a shaded garden, Belegez Pension is a favorite in traveler guides for its friendly owners, traditional breakfasts, and excellent location walking distance to all major sights.',
                'address'     => 'Kibur Zebelew Street, Gondar',
                'phone'       => '+251 91 105 0000',
                'email'       => null,
                'website'     => null,
                'stars'       => 2,
                'price_range' => '200 – 450 ETB / night',
                'image'       => 'https://images.unsplash.com/photo-1585544314038-a0d3769b8b6e?auto=format&fit=crop&w=800&q=80',
                'latitude'    => 12.6090,
                'longitude'   => 37.4678,
                'amenities'   => ['WiFi', 'Garden', 'Breakfast', 'Laundry'],
                'is_active'   => true,
            ],
            [
                'name'        => 'Simien Lodge (Simien Mountains)',
                'type'        => 'lodge',
                'description' => 'Africa\'s highest lodge at 3,260m altitude, perched on the rim of the Simien Mountains escarpment. Breathtaking views, cozy stone-and-glass chalets, log fires, and remarkable wildlife right at your doorstep. The perfect base for trekking, Gelada baboon watching, and Ethiopian wolf spotting.',
                'address'     => 'Simien Mountains National Park, Debark',
                'phone'       => '+251 91 100 5555',
                'email'       => 'info@simienmounta inslodge.com',
                'website'     => 'https://www.simienml.com',
                'stars'       => 4,
                'price_range' => '3,500 – 8,000 ETB / night',
                'image'       => 'https://images.unsplash.com/photo-1571896349842-33c89424de2d?auto=format&fit=crop&w=800&q=80',
                'latitude'    => 13.2580,
                'longitude'   => 38.0900,
                'amenities'   => ['Restaurant', 'Bar', 'Fireplace', 'Trekking Guides', 'Mountain Views', 'Wildlife'],
                'is_active'   => true,
            ],
        ];

        foreach ($hotels as $h) Hotel::create($h);
    }
}
