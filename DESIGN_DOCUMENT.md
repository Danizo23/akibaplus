# Akibaplus Design Document

## 1. Overview
Akibaplus ni mfumo wa benki ya akiba mtandaoni uliojengwa kwa Laravel 12. Mfumo una watumiaji wenye hadhi tofauti: `customer`, `staff`, na `programmer`. Kila hadhi ina uwezo tofauti, lakini wote wanatumia mfumo wa usajili na uthibitishaji wa Jetstream.

## 2. Objectives
- Kutoa mfumo wa usimamizi wa akiba kwa wateja.
- Kulinda data kwa ruhusa zinazofaa kulingana na hadhi ya mtumiaji.
- Kurahisisha utoaji ripoti kwa wafanyakazi.
- Kumwezesha mwandishi wa programu kuunda watumishi na kusimamia ripoti.
- Kutumika kwa njia ya simple, kwa kutumia models, controllers, na views za Laravel.

## 3. Architecture Overview
Mfumo umejengwa kwa mtindo wa MVC (Model-View-Controller) wa Laravel.

### 3.1 Layers
- Presentation layer: Blade views (`resources/views/...`).
- Controller layer: HTTP controllers zinazoendesha biashara ya app (`app/Http/Controllers/...`).
- Data layer: Eloquent models (`app/Models/...`) na migrations (`database/migrations/...`).
- Routing: URL routing inatolewa katika `routes/web.php`.
- Authentication: Laravel Jetstream + Sanctum.

### 3.2 Teknolojia kuu
- PHP 8.2
- Laravel 12
- Blade templating
- Tailwind CSS
- Vite
- Jetstream authentication

## 4. System Components

### 4.1 Authentication
- `routes/web.php` inatumia middleware `auth:sanctum` na `verified` kwa njia zote za ndani.
- `User` model ina `role` field kwa `customer`, `staff`, `programmer`.
- `DashboardController` inaweka redirection ya mtumiaji kwa dashibodi inayofaa:
  - `programmer` -> `/programmer/dashboard`
  - `staff` -> `/staff/dashboard`
  - vinginevyo -> `/customer/dashboard`

### 4.2 Authorization
- Role-based middleware `role:customer`, `role:staff`, `role:programmer` inachuja ufikiaji.
- Routes za kila hadhi ziko kwa `prefix` tofauti na `name` space ya wazi.

### 4.3 Routing
- `routes/web.php` ina uzalishaji wa routes za watumiaji.
- `Route::middleware([...])->group(...)` hutumika kwa kuiweka middleware kwa makundi ya routes.
- `Route::resource` inatumiwa kwa sehemu ya ripoti na uundaji wa watumishi.

### 4.4 Controllers
#### 4.4.1 DashboardController
- Inarejea hadhi ya mtumiaji na kumpeleka kwenye dashibodi ya sadaka.

#### 4.4.2 Customer\SavingsController
- `index()` inaimarisha mtazamo wa amana kwa mteja.
- `deposit()` inatengeneza akaunti ya `SavingsAccount` kwa mteja ambaye hana akaunti, au kuongeza amana kwa akaunti iliyopo.
- `withdrawal()` inatoa data za amana zilizokomaa na zinazoegesha.
- `processWithdrawal()` inathibitisha uchaguzi wa amana na kutengeneza ombi la uondoaji lenye `status = pending`.

#### 4.4.3 Staff\ReportController
- `create()` huchuja wateja wapya kwa tarehe, husanidisha amana zao, na kuonyesha fomu ya ripoti.
- `store()` inahifadhi ripoti pamoja na `customer_snapshot` pamoja na muhtasari wa wateja wapya.

#### 4.4.4 Programmer\StaffController
- `create()` inaonyesha fomu ya kusajili staff mpya.
- `store()` inatengeneza mtumiaji mpya mwenye `role = staff`.

#### 4.4.5 Programmer\ReportController
- `index()` inaonyesha ripoti zote zilizotumwa.
- `show()` inaonyesha undani wa ripoti moja.

### 4.5 Models
#### 4.5.1 User
- `hasOne(SavingsAccount::class)`
- `isProgrammer()`, `isStaff()`, `isCustomer()` hutoa hadhi ya mtumiaji.

#### 4.5.2 SavingsAccount
- `belongsTo(User::class)`
- `hasMany(SavingsTransaction::class)`
- `getMatureTransactions()` inarudisha amana zilizokomaa ambazo bado ni `active`.
- `getTotalPendingWithdrawal()` inarudisha kiasi cha maandishi ya uondoaji yanayokusubiri.
- `getActiveDeposits()` inarudisha amana ambazo bado hazijakomaa.

#### 4.5.3 SavingsTransaction
- `amount`
- `type`: `deposit` au `withdrawal`
- `plan_months`
- `maturity_date`
- `status`: `active`, `withdrawn`, `pending`
- `isMatured()` inabaini kama tarehe ya kumaliza imefika.

#### 4.5.4 StaffReport
- `customer_snapshot` iko kama JSON kisha ikageuzwa kuwa array.
- `belongsTo(User::class, 'staff_id')`

## 5. Data Model Details

### 5.1 users
`role` kwenye `users` inasababisha muundo wa ruhusa wa msingi.

### 5.2 savings_accounts
- Akaunti moja kwa mtumiaji.
- `balance` ni salio la sasa la amana zote za mtumiaji.
- `period_months` inaonyesha mpango wa matumizi ya akiba.
- `mobile_number` na `provider` huwezesha mteja kutumia namba ya simu kwa malipo.

### 5.3 savings_transactions
- `deposit` hutumika kwa kuweka amana.
- `withdrawal` hutumika kwa kuomba uondoaji na inakuwa na `status = pending`.
- `maturity_date` inahifadhi lini uondoaji unafanyika bila kukatwa au kwa uundaji wa amana.
- `status` hutoa hali ya miamala.

### 5.4 staff_reports
- `customer_snapshot` inahifadhi ripoti ya data ya wateja kwenye tarehe ya ripoti.
- `status` iko `pending` kwa ripoti mpya.

## 6. Use Case Flows

### 6.1 Customer Deposit Flow
1. Mtumiaji anapitia `/customer/savings`.
2. Kutoa fomu ya deposit pamoja na `mobile_number`, `provider`, `amount`, `plan_months`.
3. Ikiwa hakuna `SavingsAccount`, mfumo unaunda akaunti mpya.
4. Mfumo unaweza tu kuongeza `SavingsTransaction` ya aina `deposit`.
5. `SavingsAccount.balance` inaongezwa kwa kiasi cha amana.
6. `SavingsTransaction.maturity_date` huwekwa kulingana na `plan_months`.

### 6.2 Customer Withdrawal Flow
1. Mtumiaji anatembelea `/customer/savings/withdrawal`.
2. Mfumo unachukua `matureTransactions` kutoka kwa `SavingsAccount`.
3. Mtumiaji anachagua `transaction_ids` za amana zilizokomaa na kuomba kiasi cha uondoaji.
4. `processWithdrawal()` inathibitisha mnada wa `transaction_ids` kwa kuwa nambari za amana zilizo kamilika.
5. Inatengeneza `withdrawal` transaction mpya ya `status = pending`.
6. Inapunguza `SavingsAccount.balance` kwa kiasi kinachotolewa.

### 6.3 Staff Report Flow
1. Staff anatembelea `/staff/reports/create`.
2. Anachagua tarehe ya ripoti au kutumia tarehe ya leo.
3. Mfumo unawasilisha wateja wapya na jumla ya amana zao.
4. Staff anaandika `work_summary`.
5. Mfumo unaruhusu kuhifadhi ripoti kwa `StaffReport`.

### 6.4 Programmer Flow
1. Programmer anaingia `/programmer/dashboard`.
2. Anaweza kuunda mtumishi mpya kupitia `/programmer/staff/create`.
3. Anaweza kuangalia ripoti za wafanyakazi kupitia `/programmer/reports`.

## 7. Sequence and Data Flow

### 7.1 Mtumiaji anapoingia
- `User` anaingia.
- `DashboardController@index()` anatazama `role`.
- Inamrudisha kwa dashibodi inayofaa.

### 7.2 Deposit transaction
- `SavingsController@deposit()` inachakata fomu.
- Inatoa validation ya `amount`, `plan_months`, na `mobile_number`.
- Ikiwa mtumiaji hana `SavingsAccount`, inaunda akaunti.
- Inatengeneza `SavingsTransaction` mpya.
- Inaboresa `SavingsAccount.balance`.

### 7.3 Withdrawal transaction
- `SavingsController@processWithdrawal()` inachakata fomu.
- Inathibitisha kuwa `transaction_ids` ni amana zilizokomaa.
- Inaunda `SavingsTransaction` mpya ya `withdrawal`.
- Inapunguza `SavingsAccount.balance`.

### 7.4 Staff report
- `ReportController@create()` inachota data za wateja wapya.
- `ReportController@store()` inaimba `StaffReport` pamoja na `customer_snapshot`.

## 8. Presentation Layer
- `resources/views/customer/dashboard.blade.php`: dashibodi ya mteja.
- `resources/views/customer/savings/index.blade.php`: fomu ya amana.
- `resources/views/customer/savings/withdrawal.blade.php`: ombi la uondoaji.
- `resources/views/staff/reports/create.blade.php`: kuunda ripoti.
- `resources/views/programmer/dashboard.blade.php`: dashibodi ya programmer.
- `resources/views/programmer/staff/create.blade.php`: kuunda staff.
- `resources/views/programmer/reports/index.blade.php`: orodha ya ripoti.
- `resources/views/programmer/reports/show.blade.php`: undani wa ripoti.

## 9. Design Decisions

### 9.1 Role-based routing
- Umeweka hadhi za mtumiaji ndani ya `users.role` kwa urahisi wa uanzishaji.
- `routes/web.php` inatumia middleware ya `role:` kwa ulinzi wa akses.

### 9.2 Model-centric business logic
- `SavingsAccount` ina mbinu za `getMatureTransactions` na `getActiveDeposits` ili kupunguza logic katika controller.
- `SavingsTransaction` inahifadhi hali ya miamala na tarehe ya kumaliza.

### 9.3 Minimal state management
- `balance` huhifadhiwa kwa `savings_accounts` badala ya kuhesabu kila wakati, kujibu kwa haraka kwa dashibodi.
- Hata hivyo, wale weka balance anaweza kuhitaji kusasishwa kwa migogoro ya muamala (transactional safety).

## 10. Limitations na Mapendekezo ya Kuboresha

### 10.1 Uondoaji wa fedha
- Hakuna workflow ya kusimamia `pending` withdrawal chini ya staff/programmer.
- Pendekezo: Unda `WithdrawalApprovalController` kuonyesha na kukubali/kuwa kinyume ombi la uondoaji.

### 10.2 Partial withdrawal
- Kiwango cha uondoaji kinapangwa kwa `transaction_ids`, lakini hakuna uandaaji wa sehemu ya kiasi kwa muamala uliochaguliwa.
- Pendekezo: Fanya muundo wa `remaining_amount` kwa kila amana na ucheke ikiwa inaendelea ili kusaidia uondoaji wa sehemu.

### 10.3 Transaction consistency
- Salio `balance` inazidishwa na kupunguzwa bila `DB::transaction()`.
- Pendekezo: Tumia `DB::transaction()` kuzuia usumbufu wa concurrency.

### 10.4 Utafiti wa use case
- Mfumo unahifadhi `customer_snapshot` kwa ripoti, lakini hakuna API ya kutafuta au kuchuja ripoti kwa hali za `status`.
- Pendekezo: Ongeza pagination na status filter kwa `programmer/reports`.

## 11. Deployment Notes
- Tumia `php artisan migrate` kwenye mazingira ya uzalishaji.
- Tumia `npm run build` kwa assets.
- Hakikisha `APP_URL`, `DB_CONNECTION`, `MAIL_MAILER`, na `SESSION_DRIVER` zimewekwa kwenye `.env`.

## 12. Further Enhancements
- Add real mobile money integration (M-Pesa, Airtel Money, Tigo Pesa).
- Create approval workflows for staff/programmer with notifications.
- Add unit tests for savings and withdrawal flows.
- Add audit logs for staff reports and programmer actions.
- Add API endpoints for mobile or external use.

## 13. Recommended Reading
- Laravel documentation: https://laravel.com/docs/12.x
- Jetstream: https://laravel.com/docs/12.x/jetstream
- Eloquent relationships: https://laravel.com/docs/12.x/eloquent-relationships

---

> Hati hii inatoa usanifu wa mfumo, mtiririko wa data, maamuzi ya kubuni, na mapendekezo ya kuboresha.