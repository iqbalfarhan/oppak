<?php

namespace App\Traits;
use App\Models\Setting;

trait LdapTrait
{
    public function checkLdap($credential): bool|string
    {
        $username = $credential['username'];
        $password = $credential['password'];

        $host = Setting::where('key', 'LDAP_HOST')->first()->value;
        $port = Setting::where('key', 'LDAP_PORT')->first()->value;
        $basedn = Setting::where('key', 'LDAP_BASEDN')->first()->value;
        $authrealm = Setting::where('key', 'LDAP_AUTHREALM')->first()->value;

        $result = false;

        $ldapconfig = [
            'host' => $host,
            'port' => $port,
            'basedn' => $basedn,
            'authrealm' => $authrealm,
        ];

        $ds = @ldap_connect($ldapconfig['host']);
        $r = @ldap_search($ds, $ldapconfig['basedn'], 'uid='.$username);

        $info = @ldap_get_entries($ds, $r);

        if ($info['count'] != 0) {
            if (@ldap_bind($ds, $info[0]['dn'], $password)) {
                $result = $info[0]['sn'][0];
            }
        }

        return $result;
    }

    public static function canUseLdap():bool
    {
        $existhost = Setting::where('key', 'LDAP_HOST')->first();
        if ($existhost) {
            if ($existhost->value != 0) {
                return true;
            }
        }

        return false;
    }

}
