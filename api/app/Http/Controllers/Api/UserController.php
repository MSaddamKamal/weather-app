<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Repositories\UserRepository;
use App\Http\Resources\User\UserCollection;
use App\Http\Requests\User\ListUsersRequest;




class UserController extends Controller
{
    protected $_repository;
    const   PER_PAGE = 10;
    
    public function __construct(UserRepository $repository)
    {
        $this->_repository = $repository;
    }


    public function index(ListUsersRequest $request){
    
        $per_page = self::PER_PAGE ? self::PER_PAGE : config('app.per_page');
        $per_page = !empty($request->perPage) ? $request->perPage : $per_page;
        $pagination = !empty($request->pagination) ? $request->pagination : false;
        $data = $this->_repository->findByAll($pagination, $per_page, $request->validated());
        
        return new UserCollection($data);
    }
}
