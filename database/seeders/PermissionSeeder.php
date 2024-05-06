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

            'role.index'                                => [],
            'role.create'                               => [],
            'role.edit'                                 => [],
            'role.delete'                               => [],
            'role.setpermission'                        => [],
            'permission.index'                          => [],
            'permission.create'                         => [],
            'permission.edit'                           => [],
            'permission.delete'                         => [],

            'laporan.index'                             => ['admin', 'user'],
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

            'insidensial.index'                         => ['admin'],
            'insidensial.create'                        => ['admin'],
            'insidensial.edit'                          => ['admin'],
            'insidensial.delete'                        => ['admin'],

            'ticket.index'                              => ['admin'],
            'ticket.create'                             => ['admin'],
            'ticket.edit'                               => ['admin'],
            'ticket.delete'                             => ['admin'],
            'ticket.show'                               => ['admin'],
            'ticket.setprogress'                        => ['admin'],
            'ticket.requestclose'                       => ['admin'],
            'ticket.setdone'                            => ['admin'],
            'ticket.chat'                               => ['admin'],

            'pergantian.index'                          => ['admin'],
            'pergantian.create'                         => ['admin'],
            'pergantian.edit'                           => ['admin'],
            'pergantian.delete'                         => ['admin'],

            'perangkat.index'                           => ['admin'],
            'perangkat.create'                          => ['admin'],
            'perangkat.edit'                            => ['admin'],
            'perangkat.delete'                          => ['admin'],

            'site.index'                                => ['admin'],
            'site.create'                               => ['admin'],
            'site.edit'                                 => ['admin'],
            'site.delete'                               => ['admin'],

            'tamu.dashboard'                            => ['admin'],
            'tamu.index'                                => ['admin'],
            'tamu.create'                               => ['admin'],
            'tamu.edit'                                 => ['admin'],
            'tamu.show'                                 => ['admin'],
            'tamu.delete'                               => ['admin'],
            'tamu.setkeluar'                            => ['admin'],
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
