<?php
namespace App\Services\Interfaces;
/*
ServiceInterface nằm cùng cấp, ko cần use
*/
interface CategoryServiceInterface extends ServiceInterface{
    public function getTrashed();
    public function restore($id);
    public function deleteforever($id);
}
