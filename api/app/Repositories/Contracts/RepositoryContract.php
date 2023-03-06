<?php
namespace App\Repositories\Contracts;

/**
 * @author
 */
interface RepositoryContract {

    public function findById($id, $refresh = false);

    public function findByAll($pagination = false, $perPage = 10);

    public function create(array $data = []);

    public function update(array $data = []);

    public function deleteById($id);

}
