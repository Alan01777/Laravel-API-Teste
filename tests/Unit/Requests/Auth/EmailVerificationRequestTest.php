<?php
namespace Tests\Unit\Requests\Auth;

use App\Models\User;
use App\Http\Requests\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class EmailVerificationRequestTest extends TestCase
{
    public function test_authorize_method_returns_true_for_valid_user_and_hash()
    {
        $user = User::factory()->create();
        $hash = hash('sha512', $user->getEmailForVerification());

        $request = new EmailVerificationRequest();

        $route = new \Illuminate\Routing\Route('GET', 'email/verify/{id}/{hash}', function () {});
        $route->bind(new \Illuminate\Http\Request());

        $request->setRouteResolver(function () use ($route) {
            return $route;
        });

        $request->setUserResolver(function () use ($user) {
            return $user;
        });

        $request->route()->setParameter('id', $user->getKey());
        $request->route()->setParameter('hash', $hash);

        $this->assertTrue($request->authorize());
    }

    public function test_authorize_method_returns_false_for_invalid_user()
    {
        $user = User::factory()->create();
        $hash = Hash::make($user->getEmailForVerification());

        $request = new EmailVerificationRequest();

        $request->merge(['id' => 9999, 'hash' => $hash]); // Invalid user id

        $request->setUserResolver(function () use ($user) {
            return $user;
        });

        $this->assertFalse($request->authorize());
    }

    public function test_authorize_method_returns_false_for_invalid_hash()
    {
        $user = User::factory()->create();
        $hash = Hash::make($user->getEmailForVerification());

        $request = new EmailVerificationRequest();

        $request->merge(['id' => $user->getKey(), 'hash' => 'invalid_hash']); // Invalid hash

        $request->setUserResolver(function () use ($user) {
            return $user;
        });

        $this->assertFalse($request->authorize());
    }

    public function test_rules_method_returns_empty_array()
    {
        $request = new EmailVerificationRequest();

        $this->assertEquals([], $request->rules());
    }
}