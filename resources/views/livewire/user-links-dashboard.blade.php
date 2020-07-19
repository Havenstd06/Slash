<div wire:poll>
    <div class="relative flex-1 px-4">
        <div class="flex flex-col">
            <div class="py-2 -my-2">
            <div class="inline-block max-w-full truncate align-middle border-b border-gray-200 shadow sm:rounded-lg">
                <table>
                    <thead>
                        <tr>
                        <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                            Short URL
                        </th>
                        <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                            Original URL
                        </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        @if ($userUrls->count() > 0)
                            @foreach ($userUrls as $url)
                            <tr>
                                <td class="px-3 py-3 text-sm font-medium leading-5 text-gray-900 border-b border-gray-200 cursor-pointer" 
                                id="copy" data-clipboard-text="{{ $user->domain.'/'.$url->short_url }}"
                                title="Copy">
                                    {{ $user->domain.'/'.$url->short_url }}
                                </td>
                                <td class="px-3 py-3 text-sm leading-5 text-gray-500 border-b border-gray-200 cursor-pointer"
                                id="copy" data-clipboard-text="{{ $url->original_url }}" 
                                title="Copy">
                                    {{ $url->original_url }}
                                </td>
                            </tr>
                            @endforeach
                        @else
                            <tr>
                                <td class="py-3 pl-3 text-sm leading-5 text-gray-500 border-b border-gray-200 cursor-pointer">
                                You don't have a Slash url yet!
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
            </div>
        </div>
    </div>
</div>
