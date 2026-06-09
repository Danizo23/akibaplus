<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;

    /** @use HasFactory<UserFactory> */
    use HasFactory;

    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    // Role constants
    public const ROLE_CUSTOMER = 'customer';
    public const ROLE_PROGRAMMER = 'programmer';
    public const ROLE_MANAGER = 'manager';
    public const ROLE_FINANCE_OFFICER = 'finance_officer';
    public const ROLE_CUSTOMER_SUPPORT = 'customer_support';

    public const ROLES = [
        self::ROLE_CUSTOMER,
        self::ROLE_PROGRAMMER,
        self::ROLE_MANAGER,
        self::ROLE_FINANCE_OFFICER,
        self::ROLE_CUSTOMER_SUPPORT,
    ];

    /**
     * Check if the user has a role or one of several roles.
     *
     * @param  string|array  $role
     */
    public function hasRole(string|array $role): bool
    {
        if (is_array($role)) {
            return in_array($this->role, $role, true);
        }

        return $this->role === $role;
    }

    public function isProgrammer()
    {
        return $this->role === self::ROLE_PROGRAMMER;
    }

    public function isManager()
    {
        return $this->role === self::ROLE_MANAGER;
    }

    public function isFinanceOfficer()
    {
        return $this->role === self::ROLE_FINANCE_OFFICER;
    }

    public function isCustomerSupport()
    {
        return $this->role === self::ROLE_CUSTOMER_SUPPORT;
    }

    public function isStaff()
    {
        return in_array($this->role, [
            self::ROLE_FINANCE_OFFICER,
            self::ROLE_CUSTOMER_SUPPORT,
            self::ROLE_MANAGER,
            self::ROLE_PROGRAMMER,
        ], true);
    }

    public function isCustomer()
    {
        return $this->role === self::ROLE_CUSTOMER;
    }

    public function savingsAccount()
    {
        return $this->hasOne(SavingsAccount::class);
    }
    public function savings()
    {
    return $this->hasMany(Saving::class);
    }
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
