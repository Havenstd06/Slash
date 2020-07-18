<?php

namespace App\Http\Livewire;

use App\Url;
use App\User;
use Livewire\Component;
use Illuminate\Support\Str;

class Slash extends Component
{
    public $original_url;
    public $originalUrlValid;

    public function verifyUrl()
    {
        // Is not null
        if (! is_null($this->original_url)) {
            // Is valid URL
            if (filter_var($this->original_url, FILTER_VALIDATE_URL) == false) {
                $this->originalUrlValid = false;

                return;
            }

            // All good
            $this->originalUrlValid = true;
        }
    }

    public function create()
    {
        $user = (auth()->user()) ? auth()->user() : User::findOrFail(1);

        $this->validate([
            'original_url' => ['required', 'url', 'max:255'],
        ]);

        $url = new Url();
        $url->original = $this->original_url;
        $url->short = Str::random(6);
        $url->user_id = $user->id;
        $url->save();
    }

    public function render()
    {
        $this->verifyUrl();

        return view('livewire.slash');
    }
}
