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

            'laporan.index'                             => ['admin'],
            'laporan.create'                            => ['admin'],
            'laporan.edit'                              => ['admin'],
            'laporan.delete'                            => ['admin'],
            'laporan.genset.index'                      => ['admin'],
            'laporan.genset.create'                     => ['admin'],
            'laporan.genset.edit'                       => ['admin'],
            'laporan.genset.delete'                     => ['admin'],
            'laporan.genset.bateraistarter.create'      => ['admin'],
            'laporan.genset.bateraistarter.edit'        => ['admin'],
            'laporan.genset.bateraistarter.delete'      => ['admin'],
            'laporan.amf.actions'                       => ['admin'],
            'laporan.baterai.index'                     => ['admin'],
            'laporan.baterai.create'                    => ['admin'],
            'laporan.baterai.edit'                      => ['admin'],
            'laporan.baterai.delete'                    => ['admin'],
            'laporan.rectifier.index'                   => ['admin'],
            'laporan.rectifier.create'                  => ['admin'],
            'laporan.rectifier.edit'                    => ['admin'],
            'laporan.rectifier.delete'                  => ['admin'],
            'laporan.temperatur.actions'                => ['admin'],
            'laporan.bbm.actions'                       => ['admin'],
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
