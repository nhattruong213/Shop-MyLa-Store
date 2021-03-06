<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        DB::table('users')->insert([
            [
                'id' => 1,
                'first_name' => 'Nguyễn',
                'last_name' => 'Trường',
                'email' => 'truong@gmail.com',
                'password' => Hash::make('123456'),
                'company_name' => null,
                'street_address' => null,
                'postcode_zip' => null,
                'town_city' => null,
                'phone' => null,
                'avatar' => null,
                'level' => 0,
                'description' => null,
                'birthday' => '2010-10-21'
            ],
            [
                'id' => 2,
                'first_name' => 'Nguyễn',
                'last_name' => 'Trường',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('123456'),
                'company_name' => null,
                'street_address' => null,
                'postcode_zip' => null,
                'town_city' => null,
                'phone' => null,
                'avatar' => null,
                'level' => 0,
                'description' => null,
                'birthday' => '2010-10-21'
            ],
            [
                'id' => 3,
                'first_name' => 'Nguyễn',
                'last_name' => 'Trường',
                'email' => 'ShaneLynch@gmail.com',
                'password' => Hash::make('123456'),
                'company_name' => null,
                'street_address' => null,
                'postcode_zip' => null,
                'town_city' => null,
                'phone' => null,
                'avatar' => 'avatar-0.png',
                'level' => 1,
                'description' => 'Aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum bore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud amodo',
                'birthday' => '2010-10-21',
            ],
            [
                'id' => 4,
                'first_name' => 'Nguyễn',
                'last_name' => 'Trường',
                'email' => 'BrandonKelley@gmail.com',
                'password' => Hash::make('123456'),
                'company_name' => null,
                'street_address' => null,
                'postcode_zip' => null,
                'town_city' => null,
                'phone' => null,
                'avatar' => 'avatar-1.png',
                'level' => 1,
                'description' => null,
                'birthday' => '2010-10-21',
            ],
            [
                'id' => 5,
                'first_name' => 'Nguyễn',
                'last_name' => 'Trường',
                'email' => 'RoyBanks@gmail.com',
                'password' => Hash::make('123456'),
                'company_name' => null,
                'street_address' => null,
                'postcode_zip' => null,
                'town_city' => null,
                'phone' => null,
                'avatar' => 'avatar-2.png',
                'level' => 1,
                'description' => null,
                'birthday' => '2010-10-21',
            ],
        ]);

        DB::table('blogs')->insert([
            [
                'title' => 'Cách phối đồ đẹp cho màu thu',
                'subtitle' => 'Cách phối đồ đẹp cho nữ mùa đông Với bốt cổ ngắn, trông bạn trẻ trung và năng động hơn. Bạn có thể khoác thêm áo dạ hoặc áo da.',
                'image' => 'blog-1.jpg',
                'category' => 'DU LỊCH',
                'content' => '',
            ],
            [
   
                'title' => 'Tuần lễ thời trang nam.',
                'subtitle' => 'Cách phối đồ đẹp cho nữ mùa đông Với bốt cổ ngắn, trông bạn trẻ trung và năng động hơn. Bạn có thể khoác thêm áo dạ hoặc áo da.',
                'image' => 'blog-2.jpg',
                'category' => 'THỜI TRANG',
                'content' => '',
            ],
            [
       
                'title' => 'Các cách phối đồ tôn chiều cao',
                'subtitle' => 'Cách phối đồ đẹp cho nữ mùa đông Với bốt cổ ngắn, trông bạn trẻ trung và năng động hơn. Bạn có thể khoác thêm áo dạ hoặc áo da.',
                'image' => 'blog-3.jpg',
                'category' => 'THỜI TRANG',
                'content' => '',
            ],
            [
      
                'title' => 'Happppppy New Year!',
                'subtitle' => 'Cách phối đồ đẹp cho nữ mùa đông Với bốt cổ ngắn, trông bạn trẻ trung và năng động hơn. Bạn có thể khoác thêm áo dạ hoặc áo da.',
                'image' => 'blog-4.jpg',
                'category' => 'THỜI TRANG',
                'content' => '',
            ],
            [

                'title' => 'Nguyễn Nhật trường',
                'subtitle' => 'Cách phối đồ đẹp cho nữ mùa đông Với bốt cổ ngắn, trông bạn trẻ trung và năng động hơn. Bạn có thể khoác thêm áo dạ hoặc áo da.',
                'image' => 'blog-5.jpg',
                'category' => 'THỜI TRANG',
                'content' => '',
            ],
            [
               
                'title' => 'Cách phối đồ đón xuân 2022',
                'subtitle' => 'Cách phối đồ đẹp cho nữ mùa đông Với bốt cổ ngắn, trông bạn trẻ trung và năng động hơn. Bạn có thể khoác thêm áo dạ hoặc áo da.',
                'image' => 'blog-6.jpg',
                'category' => 'THỜI TRANG',
                'content' => '',
            ],
        ]);

        DB::table('brands')->insert([
            [
                'name' => 'Calvin Klein',
                'status' => 1,
            ],
            [
                'name' => 'Chà neo',
                'status' => 1,
            ],
            [
                'name' => 'Gu chì',
                'status' => 1,
            ], 
            [
                'name' => 'Hơ mặc',
                'status' => 1,
            ],
        ]);

        DB::table('admins')->insert([
            [
                'email' => 'nguyennhattruong11223344@gmail.com',
                'password' => '0121949',
                'name' => 'Nhật Trường',
                'phone' => '0397320011',
            ],
        ]);

        DB::table('product_categories')->insert([
            [
                'name' => 'Đồ Nam',
                'status' => 1,
            ],
            [
                'name' => 'Đồ nữ',
                'status' => 1,
            ],
            [
                'name' => 'Đồ trẻ em',
                'status' => 1,
            ],
        ]);

        DB::table('products')->insert([
            [
                'id' => 1,
                'brand_id' => 1,
                'product_category_id' => 2,
                'name' => 'Áo len gu chì',
                'description' => 'Lorem ipsum dolor sit amet, consectetur ing elit, sed do eiusmod tempor sum dolor sit amet, consectetur adipisicing elit, sed do mod tempor',
                'content' => '',
                'price' => 450000,
                'qty' => 20,
                'discount' => 250000,
                'weight' => 1.3,
                'sku' => '00012',
                'featured' => true,
                'tag' => 'Đồ đông',
                'status' => 1,
            ],
            [
                'id' => 2,
                'brand_id' => 2,
                'product_category_id' => 2,
                'name' => 'Áo len hơ mặc',
                'description' => 'Quần áo được chúng ta lựa chọn và sử dụng mỗi ngày. Mỗi người đều có những sở thích và phong cách riêng về quần áo của bản thân',
                'content' => null,
                'price' => 600000,
                'qty' => 20,
                'discount' => 300000,
                'weight' => null,
                'sku' => null,
                'featured' => true,
                'tag' => 'Đồ đông',
                'status' => 1,
            ],
            [
                'id' => 3,
                'brand_id' => 3,
                'product_category_id' => 2,
                'name' => 'Áo sơ mi',
                'description' => 'adasasjdhashdaaaaaaaaaaaaaaaaaaaaaaahjsdjasdjasdhajsgdhjagsdhjgasjhdagshjdgahjsgdjagsdjgajshdgjad',
                'content' => null,
                'price' => 400000,
                'qty' => 20,
                'discount' => 200000,
                'weight' => null,
                'sku' => null,
                'featured' => true,
                'tag' => 'Sơ mi',
                'status' => 1,
            ],
            [
                'id' => 4,
                'brand_id' => 4,
                'product_category_id' => 1,
                'name' => 'Khen quàng cổ',
                'description' => 'Quần áo được chúng ta lựa chọn và sử dụng mỗi ngày. Mỗi người đều có những sở thích và phong cách riêng về quần áo của bản thân',
                'content' => null,
                'price' => 150000,
                'qty' => 20,
                'discount' => 100000,
                'weight' => null,
                'sku' => null,
                'featured' => true,
                'tag' => 'Đồ đông',
                'status' => 1,
            ],
            [
                'id' => 5,
                'brand_id' => 1,
                'product_category_id' => 3,
                'name' => "Mũ",
                'description' => 'Quần áo được chúng ta lựa chọn và sử dụng mỗi ngày. Mỗi người đều có những sở thích và phong cách riêng về quần áo của bản thân',
                'content' => null,
                'price' => 250000,
                'qty' => 20,
                'discount' => 150000,
                'weight' => null,
                'sku' => null,
                'featured' => false,
                'tag' => 'Mũ nón',
                'status' => 1,
            ],
            [
                'id' => 6,
                'brand_id' => 1,
                'product_category_id' => 2,
                'name' => 'Áo len luôn vui tươi',
                'description' => 'anh có vợ con rồi nha mấy đứa',
                'content' => null,
                'price' => 650000,
                'qty' => 20,
                'discount' => 400000,
                'weight' => null,
                'sku' => null,
                'featured' => true,
                'tag' => 'Đồ đông',
                'status' => 1,
            ],
            [
                'id' => 7,
                'brand_id' => 1,
                'product_category_id' => 1,
                'name' => 'Ba lô nam',
                'description' => '43 chào anh nhé',
                'content' => null,
                'price' => 640000,
                'qty' => 200,
                'discount' => 350000,
                'weight' => null,
                'sku' => null,
                'featured' => true,
                'tag' => 'Ba lô',
                'status' => 1,
            ],
            [
                'id' => 8,
                'brand_id' => 1,
                'product_category_id' => 1,
                'name' => 'Áo khoác gió',
                'description' => 'ádhashdkjashdkjahsdjkahsdkjhaskjdhaksjdhakjshdjkahsd',
                'content' => null,
                'price' => 440000,
                'qty' => 20,
                'discount' => 350000,
                'weight' => null,
                'sku' => null,
                'featured' => true,
                'tag' => 'Áo khoác',
                'status' => 1,
            ],
            [
                'id' => 9,
                'brand_id' => 1,
                'product_category_id' => 1,
                'name' => 'Giày gu chì',
                'description' => 'Quần áo được chúng ta lựa chọn và sử dụng mỗi ngày. Mỗi người đều có những sở thích và phong cách riêng về quần áo của bản thân',
                'content' => null,
                'price' => 350000,
                'qty' => 20,
                'discount' => 250000,
                'weight' => null,
                'sku' => null,
                'featured' => true,
                'tag' => 'Giày',
                'status' => 1,
            ],
        ]);

        DB::table('product_images')->insert([
            [
                'product_id' => 1,
                'path' => 'product-1.jpg',
            ],
            [
                'product_id' => 1,
                'path' => 'product-1-1.jpg',
            ],
            [
                'product_id' => 1,
                'path' => 'product-1-2.jpg',
            ],
            [
                'product_id' => 2,
                'path' => 'product-2.jpg',
            ],
            [
                'product_id' => 3,
                'path' => 'product-3.jpg',
            ],
            [
                'product_id' => 4,
                'path' => 'product-4.jpg',
            ],
            [
                'product_id' => 5,
                'path' => 'product-5.jpg',
            ],
            [
                'product_id' => 6,
                'path' => 'product-6.jpg',
            ],
            [
                'product_id' => 7,
                'path' => 'product-7.jpg',
            ],
            [
                'product_id' => 8,
                'path' => 'product-8.jpg',
            ],
            [
                'product_id' => 9,
                'path' => 'product-9.jpg',
            ],
        ]);

        DB::table('product_details')->insert([
            [
                'product_id' => 1,
                'color' => 'blue',
                'size' => 'S',
                'qty' => 5,
            ],
            [
                'product_id' => 1,
                'color' => 'blue',
                'size' => 'M',
                'qty' => 5,
            ],
            [
                'product_id' => 1,
                'color' => 'blue',
                'size' => 'L',
                'qty' => 5,
            ],
            [
                'product_id' => 1,
                'color' => 'blue',
                'size' => 'XS',
                'qty' => 5,
            ],
            [
                'product_id' => 1,
                'color' => 'yellow',
                'size' => 'S',
                'qty' => 0,
            ],
            [
                'product_id' => 1,
                'color' => 'violet',
                'size' => 'S',
                'qty' => 0,
            ],
        ]);

        DB::table('product_comments')->insert([
            [
                'product_id' => 1,
                'user_id' => 4,
                'email' => 'BrandonKelley@gmail.com',
                'name' => 'Mỹ hà',
                'messages' => 'Nice !',
                'rating' => 4,
            ],
            [
                'product_id' => 1,
                'user_id' => 5,
                'email' => 'RoyBanks@gmail.com',
                'name' => 'Vũ siro',
                'messages' => 'Nice !',
                'rating' => 4,
            ],
        ]);
    }
}

