<?php

namespace Database\Seeders;

use App\Models\Attribute;
use App\Models\Attributes;
use App\Models\Brand;
use App\Models\CountryCurrency;
use App\Models\DeliveryZone;
use App\Models\ModelProduct;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductImage;
use App\Models\Tag;
use App\Models\Term;
use App\Models\Terms;
use App\Models\Unit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
        // Asegúrate de que hay datos en las tablas relacionadas
        $brands = Brand::pluck('id')->toArray();
        $models = ModelProduct::pluck('id')->toArray();
        $categories = ProductCategory::pluck('id')->toArray();
        $tags = Tag::pluck('id')->toArray();
        $units = Unit::pluck('id')->toArray();
        $terms = Term::pluck('id')->toArray();
        $currencies = CountryCurrency::pluck('id')->toArray();
        $deliveryZones = DeliveryZone::pluck('id')->toArray();

        // Definir algunas instancias de productos
        $products = [
            [
                'name' => 'Camiseta Nike Azul',
                'sku' => 123456789,
                'description' => 'Camiseta Nike en color azul, talla M.',
                'description_small' => 'Camiseta Nike azul, talla M.',
                'outstanding_image' => '/img/upload/no-picture.jpg',
                'expiration_date' => null,
                'expiry_period_type' => null,
                'expiry_period' => null,
                'purchase_price' => 29.99,
                'sale_price' => 35.55,
                'weight' => 0.3,
                'height' => 5.0,
                'width' => 30.0,
                'length' => 40.0,
                'enable_stock' => true,
                'enable_variations' => false,
                'brand_id' => $brands[array_rand($brands)], // Asignar una marca aleatoria
                'model_id' => $models[array_rand($models)], // Asignar un modelo aleatorio
                'is_activated' => true,
                'unit_id' => $units[array_rand($units)],
                'enable_delivery' => true,
                'enable_reservation'=>true,


            ],
            [
                'name' => 'Zapatos Adidas Negros',
                'sku' => 987654321,
                'description' => 'Zapatos Adidas negros, ideales para correr.',
                'description_small' => 'Zapatos Adidas, talla 42.',
                'outstanding_image' => '/img/upload/no-picture.jpg',
                'expiration_date' => null,
                'expiry_period_type' => null,
                'expiry_period' => null,
                'purchase_price' => 75.50,
                'sale_price' => 87.02,
                'weight' => 1.0,
                'height' => 15.0,
                'width' => 20.0,
                'length' => 30.0,
                'enable_stock' => true,
                'enable_variations' => false,
                'brand_id' => $brands[array_rand($brands)], // Asignar una marca aleatoria
                'model_id' => $models[array_rand($models)], // Asignar un modelo aleatorio
                'is_activated' => true,
                'unit_id' => $units[array_rand($units)],
                'enable_delivery' => true,
                'enable_reservation'=>false,
            ],
            [
                'name' => 'Sopa Heinz de Tomate',
                'sku' => 112233445,
                'description' => 'Sopa Heinz de tomate en lata.',
                'description_small' => 'Sopa Heinz de tomate, 400g.',
                'outstanding_image' => '/img/upload/no-picture.jpg',
                'expiration_date' => '2025-12-31',
                'expiry_period_type' => 'months', // Puede ser 'years', 'months', 'days', etc.
                'expiry_period' => 24, // 24 meses
                'purchase_price' => 1.99,
                'sale_price' => 3.60,
                'discounted_price'=>2.0,
                'start_date_discounted_price'=> '2025-12-25',
                'end_date_discounted_price'=> '2025-12-31',
                'weight' => 0.4,
                'height' => 10.0,
                'width' => 5.0,
                'length' => 8.0,
                'enable_stock' => true,
                'enable_variations' => false,
                'brand_id' => $brands[array_rand($brands)], // Asignar una marca aleatoria
                'model_id' => $models[array_rand($models)], // Asignar un modelo aleatorio
                'is_activated' => true,
                'unit_id' => $units[array_rand($units)],
                'enable_delivery' => true,
                'enable_reservation'=>false,
            ],
            // Agrega más productos según necesites
        ];

        $images = [
            '/img/upload/images (2).png',
            '/img/upload/Untitled-1.jpg',
            '/img/upload/moda.webp',
            '/img/upload/MICROSOFT SURFACE.jpeg',
            '/img/upload/logotipo MERCADO PLUS.jpg',
        ];


        // Crear los productos en la base de datos
        foreach ($products as $index => $productData) {
            // Crea el producto
            $product = Product::create($productData);



            // Asociar términos con el producto
            // Suponiendo que puedes querer agregar todos los colores y tallas a ciertos productos
            if ($product['name'] == 'Camiseta de Algodón' || $product['name'] == 'Camisa Formal') {
                $product->terms()->attach([1, 2, 3]); // Rojo, Azul, Verde (Colores)
                $product->terms()->attach([4, 5, 6, 7]); // S, M, L, XL (Tallas)
            } elseif ($product['name'] == 'Reloj Inteligente' || $product['name'] == 'Laptop Gaming') {
                $product->terms()->attach([8, 9, 10]); // Almacenamiento
            }
            // Selecciona categorías aleatorias para asociar con el producto
            $randomCategories = array_rand(array_flip($categories), 1); // Cambia el número para seleccionar más o menos
            $product->categories()->attach($randomCategories);

            $randomTags = array_rand(array_flip($tags), 2); // Cambia el número para seleccionar más o menos
            $product->tags()->attach($randomTags);

            $randomTerms = array_rand(array_flip($terms), 4); // Cambia el número para seleccionar más o menos
            $product->terms()->attach($randomTerms);

            $randomCurrencies = array_rand(array_flip($currencies), 2); // Cambia el número para seleccionar más o menos
            $product->currencies()->attach($randomCurrencies);

            $randomDelivery = array_rand(array_flip($deliveryZones), 1); // Cambia el número para seleccionar más o menos
            $product->deliveryZones()->attach($randomDelivery);
        }

        foreach ($images as $image) {
            ProductImage::create([
                'product_id' => 1,
                'path_image' => $image
            ]);
        }
    }
}
