<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Modules\Location\Models\Location;
use Modules\Media\Models\MediaFile;
use Illuminate\Support\Facades\DB;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tripIdea1 = MediaFile::findMediaByName("trip-idea-1")->id;
        $tripIdea2 = MediaFile::findMediaByName("trip-idea-2")->id;
        $banner_image = DB::table('media_files')->insertGetId(['file_name' => 'london', 'file_path' => 'demo/general/london.png', 'file_type' => 'image/png', 'file_extension' => 'png']);


        $locations = [
            [
                'name' => 'London',
                'sub_title' => 'is gothic grandeur by the river',
                'content'=>'<h4 class="font-size-21 font-weight-semi-bold text-gray-6 pb-1">Time Travel</h4><p>Immersed in history, London\'s rich seams of eye-opening antiquity are everywhere. The city\'s buildings are striking milestones in a unique and beguiling biography, and a great many of them &ndash; the Tower of London, Westminster Abbey, Big Ben &ndash; are instantly recognisable landmarks. There&rsquo;s more than enough innovation (the Shard, the Tate Modern extension, the Sky Garden) to put a crackle in the air, but it never drowns out London&rsquo;s seasoned, centuries-old narrative. Architectural grandeur rises up all around you in the West End, ancient remains dot the City and charming pubs punctuate the historic quarters, leafy suburbs and river banks. Take your pick.</p><p>Once inside the historic palace located on the Right Bank of the Seine, see unmissable and iconic sights such as the Mona Lisa and Venus de Milo. Discover masterpieces of the Renaissance and ancient Egyptian relics, along with paintings from the 13th to 20th centuries, prints from the Royal Collection, and much more.</p>',
                'banner_image_id' => $banner_image,
                'trip_ideas'=>'',
                'map_lat' => '48.856613',
                'map_lng' => '2.352222',
                'map_zoom' => '12',
                'image_id' => MediaFile::findMediaByName("location-6")->id,
                'status' => 'publish',
                'create_user' => '1',
                'created_at' =>  date("Y-m-d H:i:s")
            ],
            [
                'name' => 'Paris',
                'content'=>'New York, a city that doesnt sleep, as Frank Sinatra sang. The Big Apple is one of the largest cities in the United States and one of the most popular in the whole country and the world. Millions of tourists visit it every year attracted by its various iconic symbols and its wide range of leisure and cultural offer. New York is the birth place of new trends and developments in many fields such as art, gastronomy, technology,...',
                'banner_image_id' => MediaFile::findMediaByName("banner-location-1")->id,
                'trip_ideas'=>'[{"title":"Experiencing the best jazz in Harlem, birthplace of bebop","link":"#","content":"New Orleans might be the home of jazz, but New York City is where many of the genre’s greats became stars – and Harlem was at the heart of it.The neighborhood experienced a rebirth during the...","image_id":"'.$tripIdea1.'"},{"title":"Reflections from the road: transformative ‘Big Trip’ experiences","link":"#","content":"Whether it’s a gap year after finishing school, a well-earned sabbatical from work or an overseas adventure in celebration of your retirement, a big trip is a rite of passage for every traveller, with myriad life lessons to be ...","image_id":"'.$tripIdea2.'"}]',
                'map_lat' => '48.856613',
                'map_lng' => '2.352222',
                'map_zoom' => '12',
                'image_id' => MediaFile::findMediaByName("location-2")->id,
                'status' => 'publish',
                'create_user' => '1',
                'created_at' =>  date("Y-m-d H:i:s")
            ],
            [
                'name' => 'New York, United States',
                'content'=>'New York, a city that doesnt sleep, as Frank Sinatra sang. The Big Apple is one of the largest cities in the United States and one of the most popular in the whole country and the world. Millions of tourists visit it every year attracted by its various iconic symbols and its wide range of leisure and cultural offer. New York is the birth place of new trends and developments in many fields such as art, gastronomy, technology,...',
                'banner_image_id' => MediaFile::findMediaByName("banner-location-1")->id,
                'map_lat' => '40.712776',
                'map_lng' => '-74.005974',
                'map_zoom' => '12',
                'image_id' => MediaFile::findMediaByName("location-5")->id,
                'status' => 'publish',
                'create_user' => '1',
                'created_at' =>  date("Y-m-d H:i:s")
            ],
            [
                'name' => 'California',
                'content'=>'New York, a city that doesnt sleep, as Frank Sinatra sang. The Big Apple is one of the largest cities in the United States and one of the most popular in the whole country and the world. Millions of tourists visit it every year attracted by its various iconic symbols and its wide range of leisure and cultural offer. New York is the birth place of new trends and developments in many fields such as art, gastronomy, technology,...',
                'banner_image_id' => MediaFile::findMediaByName("banner-location-1")->id,
                'map_lat' => '36.778259',
                'map_lng' => '-119.417931',
                'map_zoom' => '12',
                'image_id' => MediaFile::findMediaByName("location-3")->id,
                'status' => 'publish',
                'create_user' => '1',
                'created_at' =>  date("Y-m-d H:i:s")
            ],
            [
                'name' => 'United States',
                'content'=>'New York, a city that doesnt sleep, as Frank Sinatra sang. The Big Apple is one of the largest cities in the United States and one of the most popular in the whole country and the world. Millions of tourists visit it every year attracted by its various iconic symbols and its wide range of leisure and cultural offer. New York is the birth place of new trends and developments in many fields such as art, gastronomy, technology,...',
                'banner_image_id' => MediaFile::findMediaByName("banner-location-1")->id,
                'map_lat' => '37.090240',
                'map_lng' => '-95.712891',
                'map_zoom' => '12',
                'image_id' => MediaFile::findMediaByName("location-4")->id,
                'status' => 'publish',
                'create_user' => '1',
                'created_at' =>  date("Y-m-d H:i:s")
            ],
            [
                'name' => 'Los Angeles',
                'content'=>'New York, a city that doesnt sleep, as Frank Sinatra sang. The Big Apple is one of the largest cities in the United States and one of the most popular in the whole country and the world. Millions of tourists visit it every year attracted by its various iconic symbols and its wide range of leisure and cultural offer. New York is the birth place of new trends and developments in many fields such as art, gastronomy, technology,...',
                'banner_image_id' => MediaFile::findMediaByName("banner-location-1")->id,
                'map_lat' => '34.052235',
                'map_lng' => '-118.243683',
                'map_zoom' => '12',
                'image_id' => MediaFile::findMediaByName("location-1")->id,
                'status' => 'publish',
                'create_user' => '1',
                'created_at' =>  date("Y-m-d H:i:s")
            ],
            [
                'name' => 'New Jersey',
                'content'=>'New York, a city that doesnt sleep, as Frank Sinatra sang. The Big Apple is one of the largest cities in the United States and one of the most popular in the whole country and the world. Millions of tourists visit it every year attracted by its various iconic symbols and its wide range of leisure and cultural offer. New York is the birth place of new trends and developments in many fields such as art, gastronomy, technology,...',
                'banner_image_id' => MediaFile::findMediaByName("banner-location-1")->id,
                'map_lat' => '40.058323',
                'map_lng' => '-74.405663',
                'map_zoom' => '12',
                'image_id' => MediaFile::findMediaByName("location-7")->id,
                'status' => 'publish',
                'create_user' => '1',
                'created_at' =>  date("Y-m-d H:i:s")
            ],
            [
                'name' => 'San Francisco',
                'content'=>'New York, a city that doesnt sleep, as Frank Sinatra sang. The Big Apple is one of the largest cities in the United States and one of the most popular in the whole country and the world. Millions of tourists visit it every year attracted by its various iconic symbols and its wide range of leisure and cultural offer. New York is the birth place of new trends and developments in many fields such as art, gastronomy, technology,...',
                'banner_image_id' => MediaFile::findMediaByName("banner-location-1")->id,
                'map_lat' => '37.774929',
                'map_lng' => '-122.419418',
                'map_zoom' => '12',
                'image_id' => MediaFile::findMediaByName("location-9")->id,
                'status' => 'publish',
                'create_user' => '1',
                'created_at' =>  date("Y-m-d H:i:s")
            ],
            [
                'name' => 'Virginia',
                'content'=>'New York, a city that doesnt sleep, as Frank Sinatra sang. The Big Apple is one of the largest cities in the United States and one of the most popular in the whole country and the world. Millions of tourists visit it every year attracted by its various iconic symbols and its wide range of leisure and cultural offer. New York is the birth place of new trends and developments in many fields such as art, gastronomy, technology,...',
                'banner_image_id' => MediaFile::findMediaByName("banner-location-1")->id,
                'map_lat' => '37.431572',
                'map_lng' => '-78.656891',
                'map_zoom' => '12',
                'image_id' => MediaFile::findMediaByName("location-8")->id,
                'status' => 'publish',
                'create_user' => '1',
                'created_at' =>  date("Y-m-d H:i:s")
            ],
            [
                'name' => 'Germany',
                'content'=>'New York, a city that doesnt sleep, as Frank Sinatra sang. The Big Apple is one of the largest cities in the United States and one of the most popular in the whole country and the world. Millions of tourists visit it every year attracted by its various iconic symbols and its wide range of leisure and cultural offer. New York is the birth place of new trends and developments in many fields such as art, gastronomy, technology,...',
                'banner_image_id' => MediaFile::findMediaByName("banner-location-1")->id,
                'map_lat' => '37.431572',
                'map_lng' => '-78.656891',
                'map_zoom' => '12',
                'image_id' => MediaFile::findMediaByName("location-10")->id,
                'status' => 'publish',
                'create_user' => '1',
                'created_at' =>  date("Y-m-d H:i:s")
            ]
        ];

        foreach ($locations as $location){
            $row = new Location( $location );
            $row->save();
        }
    }
}
