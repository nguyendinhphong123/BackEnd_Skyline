<?php
namespace App\Repositories\Interfaces;
//RepositoryInterface cùng cấp, ko cần use
interface CategoryRepositoryInterface extends RepositoryInterface{
    function getTrashed();
    function restore($id);
    function deleteforever($id);
}
