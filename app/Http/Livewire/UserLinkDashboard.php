<?php

namespace App\Http\Livewire;

use App\Url;
use Livewire\Component;

class UserLinkDashboard extends Component
{
    public function render()
    {
        $userUrls = Url::where('user_id', auth()->user()->id)->orderBy('created_at', 'DESC')->paginate(5);

        return view('livewire.user-link-dashboard', [
            'userUrls' => $userUrls
        ]);
    }
}
