# Roadmap

In this step we will send an email verification link before activating the user account.

## Implement the MustVerifyEmail contract

- Open `App/User.php` and implement the contract `MustVerifyEmail`.

## Routing

### The Email Verification Notice

- Open `app/routes/web.php` and insert the content below:

```php
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');
```

### The Email Verification Handler

- Open `app/routes/web.php` and insert the content below:

```php
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');
```

### Resending The Verification Email

- ...

## References

- https://laravel.com/docs/8.x/verification

