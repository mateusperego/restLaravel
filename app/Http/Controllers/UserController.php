<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;


class UserController extends Controller
{

    protected $user = null;
    
    public function __construct(User $user){
        $this->user = $user;
    }
    
    public function allUsers(){
        return Response::json($this->user->allUsers(), 200);
    }

    public function getUser($id){
        $user = $this->user->getUser($id);
        if (!$user) {
            return Response::json(['response' => 'Usuario nao encontrado!'], 400);
        }
        return Response::json($user, 200);
    }
    
    public function saveUser(){
        return Response::json($this->user->saveUser(), 200);
    }

    public function updateUser($id){
     $user = $this->user->updateUser($id);
        if (!$user) {
            return Response::json(['response' => 'Usuario nao encontrado!'], 400);
        }
        return Response::json($user, 200);   
    }
    
    public function deleteUser($id){
        $user = $this->user->deleteUser($id);
        if(!$user){
            return Response::json(['response'=>'Usuario nao encontrado!'], 400);            
        }
        return Response::json(['response'=>'Usuario removido com sucesso!'], 200);
    }
}