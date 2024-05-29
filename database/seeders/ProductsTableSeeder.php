<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    $description="Espressolab tasarimi dokulu siyah seramik kupa, kendiniz veya sevdikleriniz için tercih edebileceğiniz harika bir seçenek.

    375 Ml hacmi vardir.
    
    Elde yikama için uygundur.
    
    Bulaşik makinesine atilmamalidir.
    
    Mikrodalga firinda kullanabilir.";

        $productsRecords = [
            [
                'id' => 2,
                'title' => 'Tutacakli Kirmizi Termos 350 ml No:34',
                'company' => 'espressolab',
                'publication_date' => '2024-05-20',
                'description' =>$description ,
                'price' => 19.69,
                'cover_image' => 'https://espressolab.s3.eu-central-1.amazonaws.com/Upload/Urun/Buyuk/1592023-tutacakli-kirmizi-termos-350-ml-no34-png-184423.png'
            ],
            [
                'id' => 3,
                'title' => 'Kanvas Tote Çanta',
                'company' => 'espressolab',
                'publication_date' => '2024-05-20',
                'description' =>$description ,
                'price' => 19.69,
                'cover_image' => 'https://espressolab.s3.eu-central-1.amazonaws.com/Upload/Urun/Buyuk/1652024-kanvas3-png-112319.png'
            ],
            [
                'id' => 4,
                'title' => 'Dünya Kahveleri Deneme Seti - 5 Paket (250 g)',
                'company' => 'coffee shop',
                'publication_date' => '2024-05-20',
                'description' =>$description ,
                'price' => 24.97,
                'cover_image' => 'https://espressolab.s3.eu-central-1.amazonaws.com/Upload/Urun/Buyuk/542024-web-sitesi-dunya-kahveleri-seti-min-png-165348.png'
            ],
        ];

        Product::insert($productsRecords);
    }
}
