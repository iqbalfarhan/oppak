<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = [
            'user.index'                                => ['admin'],
            'user.create'                               => ['admin'],
            'user.edit'                                 => ['admin'],
            'user.delete'                               => ['admin'],
            'user.resetpassword'                        => ['admin'],
            'user.setactive'                            => ['admin'],
            'home'                                      => ['user', 'guest', 'admin'],
            'about'                                     => ['user', 'guest', 'admin'],
            'profile'                                   => ['user', 'guest', 'admin'],
            'database'                                  => [],
            'role.index'                                => [],
            'role.create'                               => [],
            'role.edit'                                 => [],
            'role.delete'                               => [],
            'role.setpermission'                        => [],
            'permission.index'                          => [],
            'permission.create'                         => [],
            'permission.edit'                           => [],
            'permission.delete'                         => [],

            'laporan.index'                             => [],
            'laporan.create'                            => [],
            'laporan.edit'                              => [],
            'laporan.delete'                            => [],
            'laporan.genset.index'                      => [],
            'laporan.genset.create'                     => [],
            'laporan.genset.edit'                       => [],
            'laporan.genset.delete'                     => [],
            'laporan.genset.bateraistarter.create'      => [],
            'laporan.genset.bateraistarter.edit'        => [],
            'laporan.genset.bateraistarter.delete'      => [],
            'laporan.amf.actions'                       => [],
            'laporan.baterai.index'                     => [],
            'laporan.baterai.create'                    => [],
            'laporan.baterai.edit'                      => [],
            'laporan.baterai.delete'                    => [],
            'laporan.rectifier.index'                   => [],
            'laporan.rectifier.create'                  => [],
            'laporan.rectifier.edit'                    => [],
            'laporan.rectifier.delete'                  => [],
            'laporan.temperatur.actions'                => [],
            'laporan.bbm.actions'                       => [],
            'laporan.download'                          => [],

            'insidensial.index'                         => [],
            'insidensial.create'                        => [],
            'insidensial.edit'                          => [],
            'insidensial.delete'                        => [],

            'ticket.index'                              => [],
            'ticket.create'                             => [],
            'ticket.edit'                               => [],
            'ticket.delete'                             => [],
            'ticket.show'                               => [],
            'ticket.setprogress'                        => [],
            'ticket.requestclose'                       => [],
            'ticket.setdone'                            => [],
            'ticket.chat'                               => [],

            'pergantian.index'                          => [],
            'pergantian.create'                         => [],
            'pergantian.edit'                           => [],
            'pergantian.delete'                         => [],

            'perangkat.index'                           => [],
            'perangkat.create'                          => [],
            'perangkat.edit'                            => [],
            'perangkat.delete'                          => [],

            'site.index'                                => [],
            'site.create'                               => [],
            'site.edit'                                 => [],
            'site.delete'                               => [],

            'tamu.dashboard'                            => [],
            'tamu.index'                                => [],
            'tamu.create'                               => [],
            'tamu.edit'                                 => [],
            'tamu.delete'                               => [],
            'tamu.setkeluar'                            => [],
        ];

        foreach ($datas as $data => $roles) {
            $permission = Permission::updateOrCreate(['name' => $data]);

            if (count($roles) > 0) {
                foreach ($roles as $role) {
                    $permission->assignRole($role);
                }
            }
        }
    }
}
