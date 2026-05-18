<?php

namespace Database\Seeders;

use App\Models\Sample;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SampleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('samples')->insert([
            // [
            //     'title' => 'Global Education Awards',
            //     'body' => '本文１'
            // ],
            // [
            //     'title' => '地球祭が今年も開催！！',
            //     'body' => '本文２'
            // ],
            // [
            //     'title' => 'ハロウィン Day」でした。',
            //     'body' => '本文３'
            // ],
            Sample::factory()->count(100)->create(),
        ]);
    }
}
