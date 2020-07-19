<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;
use App\Rules\ValidDomainRule;

class UserSettingsDashboard extends Component
{
    public $domain;

    public function submit(Request $request)
    {
        $user = auth()->user();
        $user->domain = $this->domain;

        $v = validator($user->toArray(), [
            'domain' => ['required', new ValidDomainRule],
        ]);

        if ($v->fails()) {
            return;
        }
        $user->save();

        return;
    }

    public function render()
    {
        $user = auth()->user();
        return view('livewire.user-settings-dashboard', [
            'user' => $user
        ]);
    }
}
