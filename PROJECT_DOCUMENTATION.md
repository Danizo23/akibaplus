# Akibaplus Project Documentation

## 1. Muhtasari wa Mradi
Akibaplus ni mfumo wa benki ya akiba mtandaoni uliotengenezwa kwa Laravel 12. Mfumo una watumiaji wenye hadhi tofauti: `customer`, `staff`, na `programmer`.

### Lengo
- Wateja waongeze fedha kwenye akaunti zao za akiba kwa mipango ya miezi 6 au 12.
- Wateja waweze kutazama salio, malipo ya mpango, na ombi la kutoa fedha kwa akiba iliyokomaa.
- Wafanyakazi waandike ripoti za kila siku kuhusu wateja wapya na amana zao.
- Mwandishi wa programu (programmer) aunde watumishi wapya na aone ripoti za wafanyakazi.

## 2. Teknolojia
- PHP 8.2
- Laravel 12
- Jetstream (kwa uthibitishaji na usanifu wa msimamizi)
- Sanctum
- Livewire
- Tailwind CSS
- Vite

## 3. Muundo wa Data

### 3.1 `users`
- `id`
- `name`
- `email`
- `password`
- `role` (default `customer`)
- `email_verified_at`
- `remember_token`

### 3.2 `savings_accounts`
- `id`
- `user_id` (one-to-one kwa mtumiaji)
- `balance`
- `period_months`
- `mobile_number`
- `provider` (tigo, voda, airtel, halotel)

### 3.3 `savings_transactions`
- `id`
- `savings_account_id`
- `amount`
- `type` (`deposit` au `withdrawal`)
- `plan_months`
- `maturity_date`
- `status` (`active`, `withdrawn`, `pending`)

### 3.4 `staff_reports`
- `id`
- `staff_id`
- `report_date`
- `work_summary`
- `customer_snapshot` (JSON)
- `new_customers_count`
- `new_customers_total_deposit`
- `status`

## 4. Uthibitishaji na Ruhusa

### Hadhi za watumiaji
- `customer`: anaweza kuweka amana na kuomba uondoaji.
- `staff`: anaweza kuunda ripoti za kila siku na kuona wateja wapya wa siku husika.
- `programmer`: anaweza kuunda watumishi wapya (`staff`) na kuona ripoti za wafanyakazi.

### Middleware za njia
- `auth:sanctum`
- `verified`
- `role:customer`
- `role:staff`
- `role:programmer`

## 5. Njia Muhimu za Programu

### Umma
- `/`: ukurasa wa `landing` (landing page)
- `/welcome`: ukurasa wa `welcome`

### Baada ya kuingia
- `/dashboard`: inampeleka mtumiaji kwa dashibodi ya hadhi yake
- `/customer/dashboard`
- `/customer/savings`
- `/customer/savings/deposit`
- `/customer/savings/withdrawal`
- `/staff/dashboard`
- `/staff/reports/create`
- `/programmer/dashboard`
- `/programmer/staff/create`
- `/programmer/reports`
- `/programmer/reports/{report}`

## 6. Tabaka Muhimu za Code

### 6.1 Controllers
- `app/Http/Controllers/DashboardController.php`
  - Inamkadiria mtumiaji kwa hadhi yake.
- `app/Http/Controllers/Customer/DashboardController.php`
  - Inakusanya salio na ripoti fupi za amana.
- `app/Http/Controllers/Customer/SavingsController.php`
  - Inasimamia amana za wateja.
  - Inaunda `SavingsAccount` mpya kwa mteja anayehifadhi mara ya kwanza.
  - Inasimamia ombi la uondoaji kutoa fedha ili kuruhusu uondoaji wa chaguo lililo kamilika.
- `app/Http/Controllers/Staff/ReportController.php`
  - Inasimamia uandishi wa ripoti.
  - Inakusanya wateja wapya na jumla ya amana zao kwa tarehe ya ripoti.
- `app/Http/Controllers/Programmer/StaffController.php`
  - Inaunda watumishi wapya (`staff`).
- `app/Http/Controllers/Programmer/ReportController.php`
  - Inatazama ripoti zilizotumwa na wafanyakazi.

### 6.2 Models
- `app/Models/User.php`
  - Ina utambuzi wa hadhi na mahusiano ya `savingsAccount()`.
- `app/Models/SavingsAccount.php`
  - Ina mahusiano ya `transactions()`.
  - Ina mbinu za kupata `matureTransactions`, `getTotalMatureAmount`, `getPendingWithdrawals`, `getActiveDeposits`.
- `app/Models/SavingsTransaction.php`
  - Ina `isMatured()`, `daysUntilMaturity()`, `getMaturityDateFormatted()`.
- `app/Models/StaffReport.php`
  - Ina mahusiano ya `staff()` na inachoma `customer_snapshot` kama `array`.

### 6.3 Migrations
- `database/migrations/2026_05_19_154404_add_role_to_users_table.php`
- `database/migrations/2026_05_19_160507_create_savings_accounts_table.php`
- `database/migrations/2026_05_19_160517_create_savings_transactions_table.php`
- `database/migrations/2026_05_26_000001_add_maturity_date_to_savings_transactions.php`
- `database/migrations/2026_06_06_000100_create_staff_reports_table.php`

## 7. Mitiririko ya Kazi (User Flows)

### 7.1 Mtumiaji (Customer)
1. Mtumiaji anasajili au kuingia.
2. Anaweza kuona `customer.dashboard` na salio la sasa.
3. Anaweza kufanya `deposit` kwa chaguzi za `6` au `12` miezi.
4. Akaunti itaundwa mara ya kwanza anapoweka amana.
5. Amana inaweza kuwa `active` au `withdrawn`.
6. Kuna ukurasa wa `withdrawal` kwa amana zilizokomaa.
7. Ombi la `withdrawal` linaundwa kama `pending`.

### 7.2 Mfanyakazi (Staff)
1. Wafanyakazi wanaweza kuingia kwenye dashibodi yao.
2. Wanaweza kuchuja tarehe ya ripoti.
3. Wanaweza kuandika sura ya kazi yao ya siku hiyo.
4. Wanapowasilisha, ripoti inahifadhiwa kwenye `staff_reports`.

### 7.3 Programmer
1. Programmer anaingia kwenye dashibodi ya `programmer`.
2. Anaweza kuunda watumishi wapya na kuzipa hadhi `staff`.
3. Anaweza kuona ripoti zote za staff.

## 8. Faili za Muonekano
- `resources/views/landing.blade.php`
- `resources/views/customer/dashboard.blade.php`
- `resources/views/customer/savings/index.blade.php`
- `resources/views/customer/savings/withdrawal.blade.php`
- `resources/views/staff/dashboard.blade.php`
- `resources/views/staff/reports/create.blade.php`
- `resources/views/programmer/dashboard.blade.php`
- `resources/views/programmer/staff/create.blade.php`
- `resources/views/programmer/reports/index.blade.php`
- `resources/views/programmer/reports/show.blade.php`

## 9. Jinsi ya Kuanzisha Mradi

Katika saraka ya mradi, endelea na

```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
npm install
npm run dev
```

Kwa uzalishaji:

```bash
npm run build
```

### Vidokezo
- Ikiwa unatumia Windows, unaweza kutumia `copy .env.example .env` badala ya `cp`.
- Hakikisha `php` imewekwa na `composer` inafanya kazi.
- `php artisan migrate` inaunda meza za `users`, `savings_accounts`, `savings_transactions`, `staff_reports`, na zingine za Jetstream.

## 10. Vidokezo vya Kupanua au Kuboresha

1. `SavingsController::deposit()` inatumia mpango wa simu kwa simu ya mteja. Unahitaji huduma halisi ya M-Pesa/TT/airtel ili kufanya malipo ya kweli.
2. Uondoaji unaunda `withdrawal` yenye `status = pending`; hakuna utaratibu wa kukubali au kumaliza uondoaji.
3. Uamuzi wa `partial withdrawal` haushughuliki kwa uwazi kwa sehemu za msaada wa kiasi; inaweza kuboreshwa.
4. `programmer.dashboard` haionyeshi hesabu ya watumishi kwa sasa; unaweza kuleta idadi ya watumishi.
5. `landing page` ni ukurasa wa kwanza kwa wageni, lakini hakuna API ya wateja waliojiandikisha bila kuingia.

## 11. Mambo Muhimu ya Kujua Kama Programmer
- Huduma ya usalama ya Jetstream inasimamia usajili, login, uthibitisho wa email, na profile.
- Hadhi ya mtumiaji inatumika kwa `role` katika meza `users`.
- Uthibitishaji wa `role` umetekelezwa kupitia middleware ya `role:` kwenye `routes/web.php`.
- Salio la amana linahifadhiwa moja kwa moja ndani ya `savings_accounts.balance`.
- Transactions hutunzwa kwa `savings_transactions` badala ya kuhesabu kwa kila ombi.

## 12. Mahali pa Kuanzia Kusoma Code
1. `routes/web.php`
2. `app/Http/Controllers/DashboardController.php`
3. `app/Http/Controllers/Customer/SavingsController.php`
4. `app/Models/SavingsAccount.php`
5. `app/Models/SavingsTransaction.php`
6. `database/migrations/2026_05_19_160507_create_savings_accounts_table.php`
7. `database/migrations/2026_05_19_160517_create_savings_transactions_table.php`

---

> Hati hii inalenga kutoa muhtasari wa mradi, mtiririko wa matumizi, na muundo wa data. Ikiwa unataka, ninaweza pia kuandaa sehemu ya `design document` au `architecture diagram` kwa hatua zaidi.
