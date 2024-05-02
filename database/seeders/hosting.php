<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class hosting extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('hosting')->insert([
            'img'=>'img/hosting_Eco.png',
            'name'=>'Persional Hosting',
            'type'=>'Persional',
            'mo_ta'=>
            '2 CPU core Intel Xeon Gold
            Tự động sao lưu mỗi ngày
            Bảng điều khiển cPanel
            LiteSpeed Webserver
            Bảo mật với Imunify360
            Chứng chỉ SSL miễn phí
            Chuyển dữ liệu miễn phí
            Hoàn tiền 30 ngày',
            'GiaTien'=>'55000',
            'data_Hosting'=>6,
            'bandwidth'=>1000,
            'slug'=>'Pro-Gold-Hosting'
        ]);
        DB::table('hosting')->insert([
            'img'=>'img/hosting_Gold.png',
            'name'=>'Business Hosting',
            'type'=>'Business',
            'mo_ta'=>
            '2 CPU core Intel Xeon Platinum Gen 2
            Đường truyền 10Gbps tốc độ cao
            Tự động sao lưu mỗi ngày
            Tối ưu WordPress tự động với AccelerateWP
            Bảng điều khiển cPanel
            Bảo mật với Imunify360
            LiteSpeed Webserver Enterprise
            Chứng chỉ SSL miễn phí
            Chuyển dữ liệu miễn phí
            Hoàn tiền 30 ngày',
            'GiaTien'=>'240000',
            'data_Hosting'=>30,
            'bandwidth'=>10000,
            'slug'=>'Premium-Business-Hosting'
        ]);
        DB::table('hosting')->insert([
            'img'=>'img/hosting_Pro.png',
            'name'=>'Extra Business Hosting',
            'type'=>'Business',
            'mo_ta'=>
            '6 CPU core Intel Xeon Platinum Gen 3
            Đường truyền 10Gbps tốc độ cao
            Tự động sao lưu mỗi ngày
            Tăng tốc WordPress tự động với AccelerateWP
            Bảng điều khiển cPanel
            Bảo mật với Imunify360
            Litespeed Webserver Elite
            Chứng chỉ SSL miễn phí
            Chuyển dữ liệu miễn phí
            Hoàn tiền 30 ngày',
            'GiaTien'=>'550000',
            'data_Hosting'=>45,
            'bandwidth'=>10000,
            'slug'=>'Turbo-Business-Hosting'
        ]);
    }
}
