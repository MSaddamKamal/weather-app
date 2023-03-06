<?php

namespace App\Repositories;

use App\Repositories\Contracts\RepositoryContract;
use App\Repositories\AbstractRepository;
use App\Models\User;



class UserRepository extends AbstractRepository implements RepositoryContract
{
    /**
     * These will hold the instance of User Class.
     *
     * @var    object
     * @access public
     **/
    public $model;

    /**
     * This is the prefix of the cache key to which the
     * App\Repositories data will be stored
     * App\Repositories Auto incremented Id will be append to it
     *
     * Example: User-1
     *
     * @var    string
     * @access protected
     **/

    protected $_cacheKey = 'user';
    protected $_cacheTotalKey = 'total-user';

    public function __construct(User $model)
    {
        $this->model = $model;
        $this->builder = $model;
    }

    public function findById($id, $refresh = false, $details = false, $encode = true) {
        $data = parent::findById($id, $refresh, $details, $encode);
        
        if ($data) {
            $data->weather_details = null;
            if((isset($details['with_weather_details']) && $details['with_weather_details'] == true)) {
                if(!empty($data->id) && $data->id){
                    $data->weather_details = app('\App\Repositories\UserWeatherRepository')->findByAttribute('user_id',$data->id);
                }
            }
        }
        return $data;
    }


}
