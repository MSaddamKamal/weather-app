<?php

namespace App\Repositories;

use App\Repositories\Contracts\RepositoryContract;
use App\Repositories\AbstractRepository;
use App\Models\UserWeather;



class UserWeatherRepository extends AbstractRepository implements RepositoryContract
{
    /**
     * These will hold the instance of UserWeather Class.
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
     * Example: UserWeather-1
     *
     * @var    string
     * @access protected
     **/

    protected $_cacheKey = 'user-weather';
    protected $_cacheTotalKey = 'total-user-weather';

    public function __construct(UserWeather $model)
    {
        $this->model = $model;
        $this->builder = $model;
    }


}
