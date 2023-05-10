<?php 
namespace App\Repositories\Interfaces;
//RepositoryInterface cùng cấp, ko cần use
interface RoomRepositoryInterface extends RepositoryInterface{
    function getTrashed();
    function restore($id);
    function deleteforever($id);
}