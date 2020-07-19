<?php

namespace App\Http\Livewire;

use App\Url;
use Livewire\Component;

class UserLinksDashboard extends Component
{
    public function render()
    {
        $user = auth()->user();
        $userUrls = Url::where('user_id', $user->id)->orderBy('created_at', 'DESC')->paginate(5);

        return view('livewire.user-links-dashboard', [
            'user' => $user,
            'userUrls' => $userUrls
        ]);
    }
}
