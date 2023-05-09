<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    private $UserRepository;

    public function __construct(UserRepositoryInterface $UserRepository){
        return $this->UserRepository = $UserRepository;
    }


    public function store(Request $data){
        $this->UserRepository->storeUsers($data->all());
        return Response::json(['status'=>true,'message'=> 'success'],200);
    }
}
