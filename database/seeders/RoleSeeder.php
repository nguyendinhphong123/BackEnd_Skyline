<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{   private $parent_id;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $groups = ['Category', 'Group', 'Order', 'room', 'User','Customer'];
        $actions = ['','viewAny', 'view', 'create', 'update', 'delete', 'restore', 'forceDelete','trash'];
        foreach ($groups as $group) {
            foreach ($actions as $key => $action) {
                if($key == 0){
                    $parentGroup = Role::create([
                        'name' => $group,
                        'group_name' => $group,
                        'group_key' =>0,
                    ]);
                    $this->parent_id = $parentGroup->id;
                } else {
                    Role::create([
                        'name' => $group . '_' . $action,
                        'group_name' => $group,
                        'group_key' => $this->parent_id,
                    ]);
                }

            }
        }
        DB::table('roles')->insert(
            [
                'name' => 'Customer_viewAny',
                'group_name' => 'Customer',
                'group_key' => $this->parent_id,
            ]
        );

    }
}
