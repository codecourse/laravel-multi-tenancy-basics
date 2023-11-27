<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Stancl\Tenancy\Contracts\TenantWithDatabase;
use Stancl\Tenancy\Database\Concerns\HasDatabase;
use Stancl\Tenancy\Database\Concerns\HasDomains;
use Stancl\Tenancy\Database\Models\Tenant as ModelsTenant;

class Tenant extends ModelsTenant implements TenantWithDatabase
{
    use HasFactory;
    use HasDatabase;
    use HasDomains;

    public static function booted()
    {
        static::creating(function ($tenant) {
            $tenant->password = bcrypt($tenant->password);
        });
    }
}
