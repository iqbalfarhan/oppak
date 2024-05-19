<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = [
            'home'                                      => "*",
            'about'                                     => ["admin"],
            'profile'                                   => "*",
            'dokumentasi'                               => "*",
            'database'                                  => [],

            'user.index'                                => ['admin'],
            'user.create'                               => ['admin'],
            'user.edit'                                 => ['admin'],
            'user.delete'                               => ['admin'],
            'user.resetpassword'                        => ['admin'],
            'user.setactive'                            => ['admin'],

            'role.index'                                => [],
            'role.create'                               => [],
            'role.edit'                                 => [],
            'role.delete'                               => [],
            'role.setpermission'                        => [],

            'permission.index'                          => [],
            'permission.create'                         => [],
            'permission.edit'                           => [],
            'permission.delete'                         => [],

            'parameter.index'                           => [],
            'parameter.create'                          => [],
            'parameter.edit'                            => [],
            'parameter.delete'                          => [],

            'laporan.chat'                              => ['admin', 'helpdesk'],
            'laporan.index'                             => ['admin', 'guest'],
            'laporan.mine'                              => ['user'],
            'laporan.create'                            => ['admin', 'user'],
            'laporan.edit'                              => ['admin', 'user'],
            'laporan.delete'                            => ['admin', 'user'],
            'laporan.genset.index'                      => ['admin', 'user'],
            'laporan.genset.create'                     => ['admin', 'user'],
            'laporan.genset.edit'                       => ['admin', 'user'],
            'laporan.genset.delete'                     => ['admin', 'user'],
            'laporan.genset.bateraistarter.create'      => ['admin', 'user'],
            'laporan.genset.bateraistarter.edit'        => ['admin', 'user'],
            'laporan.genset.bateraistarter.delete'      => ['admin', 'user'],
            'laporan.amf.actions'                       => ['admin', 'user'],
            'laporan.baterai.index'                     => ['admin', 'user'],
            'laporan.baterai.create'                    => ['admin', 'user'],
            'laporan.baterai.edit'                      => ['admin', 'user'],
            'laporan.baterai.delete'                    => ['admin', 'user'],
            'laporan.rectifier.index'                   => ['admin', 'user'],
            'laporan.rectifier.create'                  => ['admin', 'user'],
            'laporan.rectifier.edit'                    => ['admin', 'user'],
            'laporan.rectifier.delete'                  => ['admin', 'user'],
            'laporan.temperatur.actions'                => ['admin', 'user'],
            'laporan.bbm.actions'                       => ['admin', 'user'],
            'laporan.show'                              => ['admin', 'user'],
            'laporan.download'                          => ['admin'],

            'insidensial.index'                         => ['admin', 'user', 'insidensial'],
            'insidensial.create'                        => ['admin', 'user', 'insidensial'],
            'insidensial.edit'                          => ['admin', 'user', 'insidensial'],
            'insidensial.delete'                        => ['admin', 'user', 'insidensial'],
            'insidensial.show'                          => ['admin', 'user', 'insidensial'],

            'ticket.index'                              => ['admin', 'helpdesk'],
            'ticket.create'                             => ['admin'],
            'ticket.edit'                               => ['admin'],
            'ticket.delete'                             => ['admin'],
            'ticket.show'                               => ['admin', 'helpdesk'],
            'ticket.setprogress'                        => ['helpdesk'],
            'ticket.requestclose'                       => ['helpdesk'],
            'ticket.setdone'                            => ['admin'],
            'ticket.log'                               => ['admin', 'helpdesk'],

            'pergantian.index'                          => ['admin', 'user'],
            'pergantian.create'                         => ['admin', 'user'],
            'pergantian.edit'                           => ['admin', 'user'],
            'pergantian.show'                           => ['admin', 'user'],
            'pergantian.delete'                         => ['admin', 'user'],

            'perangkat.index'                           => ['admin'],
            'perangkat.create'                          => ['admin'],
            'perangkat.edit'                            => ['admin'],
            'perangkat.show'                            => ['admin'],
            'perangkat.delete'                          => ['admin'],

            'site.index'                                => ['admin'],
            'site.create'                               => ['admin'],
            'site.edit'                                 => ['admin'],
            'site.show'                                 => ['admin'],
            'site.delete'                               => ['admin'],

            'setting.index'                             => ['admin'],
            'setting.create'                            => ['admin'],
            'setting.edit'                              => ['admin'],
            'setting.show'                              => ['admin'],
            'setting.delete'                            => [],

            'tamu.dashboard'                            => ['admin', 'user'],
            'tamu.index'                                => ['admin', 'user'],
            'tamu.create'                               => ['admin', 'user'],
            'tamu.edit'                                 => ['admin', 'user'],
            'tamu.show'                                 => ['admin', 'user'],
            'tamu.delete'                               => ['admin', 'user'],
            'tamu.setkeluar'                            => ['admin', 'user'],
        ];

        foreach ($datas as $data => $roles) {
            $permission = Permission::updateOrCreate(['name' => $data]);

            if ($roles == "*") {
                foreach (Role::pluck('name') as $role) {
                    $permission->assignRole($role);
                }
            }
            elseif(gettype($roles) == "array") {
                foreach ($roles as $role) {
                    $permission->assignRole($role);
                }
            }
        }
    }
}
