<?php

namespace Tests\Unit;

use Illuminate\Http\Request;
use Juzaweb\Modules\Core\Http\Middleware\Admin;
use Tests\TestCase;

class AdminMiddlewareTest extends TestCase
{
    public function test_it_allows_guest_requests_when_public_welcome_is_enabled(): void
    {
        config()->set('app.allow_public_welcome', true);

        $request = Request::create('/admin', 'GET');
        $request->setUserResolver(fn () => null);

        $response = (new Admin)->handle($request, function ($request) {
            return response('ok');
        });

        $this->assertSame(200, $response->getStatusCode());
        $this->assertSame('ok', $response->getContent());
    }
}
