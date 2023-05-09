<?php


namespace App\Repositories;
use App\Jobs\Uploadimage;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Models\User;
use Carbon\Carbon;

class UserRepository implements UserRepositoryInterface{

    public function storeUsers($data){
       if ($data['type'] == 0){
                $users = User::create([
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'bio' => $data['bio'],
                    'type' => $data['type']
                ]);
            }elseif ($data['type'] == 1){
           $filename = '';
           $filename = uploadImage("users",$data['certification_file']);
           Uploadimage::dispatch($filename,$data)->delay(Carbon::now()->addSecond(5));
                $users = User::create([
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'bio' => $data['bio'],
                    'type' => $data['type'],
                    'certification_name' => $data['certification_name'],
                ]);
            }else{
           $filename = '';
           $filename = uploadImage("users",$data['certification_file']);
           Uploadimage::dispatch($filename,$data)->delay(Carbon::now()->addSecond(5));
           $users = User::create([
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'bio' => $data['bio'],
                    'type' => $data['type'],
                    'certification_name' => $data['certification_name'],
                    'dateOfBirth' => $data['dateOfBirth'],
                    'mapLocation' => $data['mapLocation'],
                ]);
            }
    }
}
