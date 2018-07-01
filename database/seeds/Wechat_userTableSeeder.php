<?php

use Illuminate\Database\Seeder;
use App\Models\WechatUser;
class Wechat_userTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		for($i=0;$i<10000;$i++){
			WechatUser::insert([
				'openid' => str_random(28),
				'nickName' => str_random(5).'@163.com',
				'province' => 'Inner Mongolia',
				'city' => 'Hohhot',
				'country' => 'China',
				'avatarUrl' => 'https://wx.qlogo.cn/mmopen/vi_32/Q0j4TwGTfTLLOciaCYd6icgToxbc42UicicZZ1icksBFDWlrmErQjUIicicIfR8tLN8PPK7mEiakVDhmd0lxYJ6vq3yXwQ/132',
				'created_at' => '2018-06-14 09:42:49',
				'updated_at' => '2018-06-14 09:42:49',
			]);
		}
    }
}
