<?php

use Illuminate\Database\Seeder;

class OptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('options')->insert([
        $items = [
            [
                'type_id' => DB::table('types')->where('name', 'payment_type')->value('id'),
                'name' => 'Cash'
            ],
            [
                'type_id' => DB::table('types')->where('name', 'payment_type')->value('id'),
                'name' => 'Check'
            ],
            [
                'type_id' => DB::table('types')->where('name', 'payment_type')->value('id'),
                'name' => 'KFS'
            ],
            [
                'type_id' => DB::table('types')->where('name', 'ink_type')->value('id'),
                'name' => 'Black Ink'
            ],
            [
                'type_id' => DB::table('types')->where('name', 'ink_type')->value('id'),
                'name' => 'Color Ink'
            ],
            [
                'type_id' => DB::table('types')->where('name', 'paper_type')->value('id'),
                'name' => 'White Paper Black Ink'
            ],
            [
                'type_id' => DB::table('types')->where('name', 'paper_type')->value('id'),
                'name' => 'White Paper Color Ink'
            ],
            [
                'type_id' => DB::table('types')->where('name', 'paper_type')->value('id'),
                'name' => 'Color Paper'
            ],
            [
                'type_id' => DB::table('types')->where('name', 'paper_type')->value('id'),
                'name' => 'Transparencie',
                'van' => 0, 'union' => 0
            ],
            [
                'type_id' => DB::table('types')->where('name', 'paper_type')->value('id'),
                'name' => 'Labels',
                'van' => 0, 'union' => 0
            ],
            [
                'type_id' => DB::table('types')->where('name', 'paper_type')->value('id'),
                'name' => 'NCR (Carbonless) Forms',
                'van' => 0, 'union' => 0
            ],
            [
                'type_id' => DB::table('types')->where('name', 'paper_type')->value('id'),
                'name' => 'Customer Supplied Paper'
            ],
            [
                'type_id' => DB::table('types')->where('name', 'paper_size')->value('id'),
                'name' => '8 1/2 x 11'
            ],
            [
                'type_id' => DB::table('types')->where('name', 'paper_size')->value('id'),
                'name' => '8 1/2 x 14'
            ],
            [
                'type_id' => DB::table('types')->where('name', 'paper_size')->value('id'),
                'name' => '11 x 17',
                'van' => 0, 'union' => 0
            ],
            [
                'type_id' => DB::table('types')->where('name', 'duplex')->value('id'),
                'name' => 'One-Sided'
            ],
            [
                'type_id' => DB::table('types')->where('name', 'duplex')->value('id'),
                'name' => 'Two-Sided'
            ],
            [
                'type_id' => DB::table('types')->where('name', 'white_paper_options')->value('id'),
                'name' => 'Standard 20 lb. Bond'
            ],
            [
                'type_id' => DB::table('types')->where('name', 'white_paper_options')->value('id'),
                'name' => '3-Hole Pre Drill 20 lb. Bond'
            ],
            [
                'type_id' => DB::table('types')->where('name', 'white_paper_options')->value('id'),
                'name' => 'Index 110 lb. Bond'
            ],
            [
                'type_id' => DB::table('types')->where('name', 'color_paper_color')->value('id'),
                'name' => 'Blue'
            ],
            [
                'type_id' => DB::table('types')->where('name', 'color_paper_color')->value('id'),
                'name' => 'Red'
            ],
            [
                'type_id' => DB::table('types')->where('name', 'color_paper_color')->value('id'),
                'name' => 'Green'
            ],
            [
                'type_id' => DB::table('types')->where('name', 'cover_stock_color')->value('id'),
                'name' => 'Blue'
            ],
            [
                'type_id' => DB::table('types')->where('name', 'cover_stock_color')->value('id'),
                'name' => 'Red'
            ],
            [
                'type_id' => DB::table('types')->where('name', 'cover_stock_color')->value('id'),
                'name' => 'Green'
            ],
            [
                'type_id' => DB::table('types')->where('name', 'binding')->value('id'),
                'name' => 'Half'
            ],
            [
                'type_id' => DB::table('types')->where('name', 'binding')->value('id'),
                'name' => 'Half'
            ],
            [
                'type_id' => DB::table('types')->where('name', 'binding')->value('id'),
                'name' => 'Half'
            ],
            [
                'type_id' => DB::table('types')->where('name', 'binding')->value('id'),
                'name' => 'Half'
            ],
            [
                'type_id' => DB::table('types')->where('name', 'folding')->value('id'),
                'name' => 'Half'
            ],
            [
                'type_id' => DB::table('types')->where('name', 'folding')->value('id'),
                'name' => 'Letter Thirds'
            ],
            [
                'type_id' => DB::table('types')->where('name', 'folding')->value('id'),
                'name' => 'Z Thirds'
            ],
            [
                'type_id' => DB::table('types')->where('name', 'folding')->value('id'),
                'name' => 'Other'
            ],
            [
                'type_id' => DB::table('types')->where('name', 'cutting')->value('id'),
                'name' => 'Half'
            ],
            [
                'type_id' => DB::table('types')->where('name', 'cutting')->value('id'),
                'name' => 'Thirds'
            ],
            [
                'type_id' => DB::table('types')->where('name', 'cutting')->value('id'),
                'name' => 'Quarters'
            ],
            [
                'type_id' => DB::table('types')->where('name', 'cutting')->value('id'),
                'name' => 'Other'
            ],
            [
                'type_id' => DB::table('types')->where('name', 'post_copy_options')->value('id'),
                'name' => 'Collated'
            ],
            [
                'type_id' => DB::table('types')->where('name', 'post_copy_options')->value('id'),
                'name' => 'Stapled'
            ],
            [
                'type_id' => DB::table('types')->where('name', 'post_copy_options')->value('id'),
                'name' => 'Lamination'
            ]

        ];
        // ]);


        foreach ($items as $item) {
            App\Option::updateOrCreate(
                [
                    'type_id' => $item['type_id'],
                    'name' => $item['name']
                ],
                $item);
        }

    }
}

