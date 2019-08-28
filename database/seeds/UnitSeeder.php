<?php

use Illuminate\Database\Seeder;
use App\Model\Unit;
use App\Libs\MonoAlpha;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ma = new MonoAlpha;

	    $apartment = [
	    	["name" => "Newton Hybird Residence" , "address" => "Buah Batu"],
	    	["name" => "The Jardin" , "address" => "Cihampelas"],
	    	["name" => "Gateway Ahmad Yani" , "address" => "Cicadas"],
	    	["name" => "Metro The Suit" , "address" => "Soekarno Hatta"],
	    ];    	
        $units = [
        	[ "apt_id" => 1, "number" => "9BJ" ] ,
        	[ "apt_id" => 1, "number" => "12BD" ] ,
        	[ "apt_id" => 1, "number" => "32BF" ] ,
        	[ "apt_id" => 1, "number" => "8BG" ] ,
        	[ "apt_id" => 1, "number" => "7BG" ] ,
        	[ "apt_id" => 1, "number" => "18BF" ] ,
        	[ "apt_id" => 1, "number" => "16BE" ] ,
        	[ "apt_id" => 1, "number" => "12BD" ] ,
        	[ "apt_id" => 2, "number" => "A123" ] ,
        	[ "apt_id" => 2, "number" => "A133" ] ,
        	[ "apt_id" => 2, "number" => "B305" ] ,
        	[ "apt_id" => 3, "number" => "SA-6-5" ] ,
        	[ "apt_id" => 3, "number" => "EC-6-21" ] ,
        	[ "apt_id" => 3, "number" => "SA-7-9" ]
        ];

        foreach ($units as $item) {
        	Unit::create([
        		'unit_number' => $ma->encrypt($item['number']),
        		'apartment_name' => $ma->encrypt($apartment[ $item['apt_id'] - 1 ]['name']),
        		'apartment_address' => $ma->encrypt($apartment[ $item['apt_id'] - 1 ]['address']),
        	]);
        }
    }
}
