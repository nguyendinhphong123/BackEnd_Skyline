<?php
namespace App\Repositories\Interfaces;
//RepositoryInterface cùng cấp, ko cần use
interface GroupRepositoryInterface extends RepositoryInterface{
    public function showGroup($id);
    public function updateRoles($id, $request);
}
