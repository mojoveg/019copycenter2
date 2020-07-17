<?php

use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $i =1;
        // DB::table('types')->insert([
        $items = [
            [
                'name' => 'payment_type',
                'sort_order' => $i++
            ],
            [
                'name' => 'ink_type',
                'sort_order' => $i++
            ],
            [
                'name' => 'paper_type',
                'sort_order' => $i++
            ],
            [
                'name' => 'paper_size',
                'sort_order' => $i++
            ],
            [
                'name' => 'duplex',
                'sort_order' => $i++
            ],
            [
                'name' => 'white_paper_options',
                'sort_order' => $i++
            ],
            [
                'name' => 'color_paper_color',
                'sort_order' => $i++
            ],
            [
                'name' => 'cover_stock_color',
                'sort_order' => $i++
            ],
            [
                'name' => 'color_copies',
                'sort_order' => $i++
            ],
            [
                'name' => 'color_copies',
                'sort_order' => $i++
            ],
            [
                'name' => 'binding', // Sded
                'sort_order' => $i++
            ],
            [
                'name' => 'folding',
                'sort_order' => $i++
            ],
            [
                'name' => 'cutting',
                'sort_order' => $i++
            ],
            [
                'name' => 'post_copy_options',
                'sort_order' => $i++,
                'multi_select' => 1
            ],
        // ]);
        ];
        foreach ($items as $item) {
            App\Type::updateOrCreate(
                [
                    'sort_order' => $item['sort_order'],
                    'name' => $item['name']
                ],
                $item);
        }
    }
}


