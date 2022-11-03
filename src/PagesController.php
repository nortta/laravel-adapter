<?php

namespace Nortta\Laravel;

use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;

class PagesController
{
    protected $nortta;

    public function __construct(Nortta $nortta)
    {
        $this->nortta = $nortta;
    }

    public function update(Request $request)
    {
        $payload = $this->decrypt($request->get('payload'));

        Page::updateOrCreate(
            ['uuid' => $payload['uuid']],
            $payload
        );

        return response('OK', 200);
    }

    public function destroy(Request $request)
    {
        $payload = $this->decrypt($request->get('payload'));

        Page::where('uuid', $payload['uuid'])->delete();

        return response('OK', 200);
    }

    public function ping()
    {
        return response('OK', 200);
    }

    protected function decrypt($payload)
    {
        try {
            return $this->nortta->decrypt($payload);
        } catch (DecryptException $exception) {
            abort(422, 'Could not decrypt message.');
        }
    }
}
