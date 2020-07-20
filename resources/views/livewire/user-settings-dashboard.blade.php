<div>
    <form action="">
        <div class="px-4">
            <label for="domain" class="block text-sm font-medium leading-5 text-gray-700">Domain</label>
            <div class="flex items-center">
                <div class="flex-1">
                    <select wire:model="domain" name="domain" id="domain" class="block w-full py-2 pl-3 pr-10 text-base leading-6 border-gray-300 form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5">
                        @foreach (\App\Domain::all() as $domain)
                        <option value="{{ $domain->url }}" {{ $domain->url == $user->domain ? 'selected' : ''}}>
                            {{ $domain->name }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <span class="inline-flex rounded-md shadow-sm">
                        <button wire:click.prevent="submit" type="button" class="inline-flex items-center px-3 py-2 ml-2 text-sm font-medium leading-4 text-white transition duration-150 ease-in-out bg-indigo-600 border border-transparent rounded-md hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700">
                            Save
                        </button>
                    </span>
                </div>
            </div>
        </div>
    </form>
</div>
