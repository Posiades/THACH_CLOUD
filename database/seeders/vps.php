<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class vps extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('vps')->insert([
            'img'=>'img/vps_Eco.png',
            'name'=>'VPS Economy',
            'mo_ta'=>'CPU: 05
            RAM: 16GB
            Hệ điều hành: CentOS, Ubuntu, Debian, Windows
            Địa chỉ IPv4 tĩnh (IP Riêng): 01
            Mua thêm IPv4 (IP Riêng): Yes
            DDoS Protection: 10Gbps free
            Băng thông: Không giới hạn
            Công nghệ ảo hóa: KVM
            Công nghệ Cloud: OpenStack
            Tự cài đặt OS từ Image: Có
            Tính năng khác: Reboot, restart, Màn hình VNC',
            'GiaTien'=>990000,
            'Storage'=> 120,
            'bandwidth'=> 150,
            'slug'=>'VPS-Economy'
        ]);
        DB::table('vps')->insert([
            'img' => 'img/vps_Gold.png',
            'name'=>'VPS Premium',
            'mo_ta'=>'CPU: 06
            RAM: 24GB
            Hệ điều hành: CentOS, Ubuntu, Debian, Windows
            Địa chỉ IPv4 tĩnh (IP Riêng): 01
            Mua thêm IPv4 (IP Riêng): Yes
            DDoS Protection: 10Gbps free
            Băng thông: Không giới hạn
            Công nghệ ảo hóa: KVM
            Công nghệ Cloud: OpenStack
            Tự cài đặt OS từ Image: Có
            Tính năng khác: Reboot, restart, Màn hình VNC',
            'GiaTien'=>1250000,
            'Storage'=>180,
            'bandwidth'=>150,
            'slug'=>'VPS-Premium'
        ]);
        DB::table('vps')->insert([
            'img'=>'img/vps_Pro.png',
            'name'=>'VPS Ultimate',
            'mo_ta'=>'CPU: 12 vCPU
            RAM: 64GB
            Hệ điều hành: CentOS, Ubuntu, Debian, Windows
            Địa chỉ IPv4 tĩnh (IP Riêng): 01
            Mua thêm IPv4 (IP Riêng): Yes
            DDoS Protection: 10Gbps free
            Băng thông: Không giới hạn
            Công nghệ ảo hóa: KVM
            Công nghệ Cloud: OpenStack
            Tự cài đặt OS từ Image: Có
            Tính năng khác: Reboot, restart, Màn hình VNC',
            'GiaTien'=>1650000,
            'Storage'=>250,
            'bandwidth'=>150,
            'slug'=>'VPS-Ultimate'
        ]);
    }
}
