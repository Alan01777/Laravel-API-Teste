<?php

namespace Tests\Unit\Requests\Auth;

use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Tests\TestCase;

class LoginRequestTest extends TestCase
{
    use RefreshDatabase;

    public function test_authorize_method_returns_true(): void
    {
        $request = new LoginRequest();

        $this->assertTrue($request->authorize());
    }

    public function test_rules_method_returns_array_of_validation_rules(): void
    {
        $request = new LoginRequest();

        $expectedRules = [
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ];

        $this->assertEquals($expectedRules, $request->rules());
    }

    public function test_authenticate_method_throws_validation_exception_when_auth_attempt_fails(): void
    {
        $request = new LoginRequest();
        $request->merge([
            'email' => 'test@example.com',
            'password' => 'password123',
            'remember' => false,
        ]);

        Auth::shouldReceive('attempt')->once()->andReturn(false);
        RateLimiter::shouldReceive('hit')->once();
        RateLimiter::shouldReceive('tooManyAttempts')->once()->andReturn(false);
        $this->expectException(ValidationException::class);
        $this->expectExceptionMessage(__('auth.failed'));

        $request->authenticate();
    }

    public function test_authenticate_method_clears_rate_limiter_when_auth_attempt_succeeds(): void
    {
        $request = new LoginRequest();
        $request->merge([
            'email' => 'test@example.com',
            'password' => 'password123',
            'remember' => false,
        ]);

        Auth::shouldReceive('attempt')->once()->andReturn(true);
        RateLimiter::shouldReceive('clear')->once();
        RateLimiter::shouldReceive('tooManyAttempts')->once()->andReturn(false);

        $request->authenticate();
    }

    public function test_ensureIsNotRateLimited_method_throws_validation_exception_when_rate_limited(): void
    {
        $request = new LoginRequest();
        $request->merge([
            'email' => 'test@example.com',
            'password' => 'password123',
            'remember' => false,
        ]);

        RateLimiter::shouldReceive('tooManyAttempts')->once()->andReturn(true);
        RateLimiter::shouldReceive('availableIn')->once()->andReturn(60);
        $this->expectException(ValidationException::class);
        $this->expectExceptionMessage(trans('auth.throttle', [
            'seconds' => 60,
            'minutes' => 1,
        ]));

        $request->ensureIsNotRateLimited();
    }

    public function test_ensureIsNotRateLimited_method_does_not_throw_validation_exception_when_not_rate_limited(): void
    {
        $request = new LoginRequest();
        $request->merge([
            'email' => 'test@example.com',
            'password' => 'password123',
            'remember' => false,
        ]);

        RateLimiter::shouldReceive('tooManyAttempts')->once()->andReturn(false);

        $request->ensureIsNotRateLimited();
    }

    public function test_throttleKey_method_returns_expected_throttle_key(): void
    {
        $request = new LoginRequest();
        $request->merge([
            'email' => 'test@example.com',
            'password' => 'password123',
            'remember' => false,
        ]);

        $expectedThrottleKey = Str::transliterate(Str::lower('test@example.com') . '|' . $request->ip());

        $this->assertEquals($expectedThrottleKey, $request->throttleKey());
    }
}