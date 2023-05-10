<?php
namespace App\Services\Interfaces;
/*
ServiceInterface nằm cùng cấp, ko cần use
*/
interface RoomServiceInterface extends ServiceInterface{
    public function getTrashed();
    public function restore($id);
    public function deleteforever($id);
}
