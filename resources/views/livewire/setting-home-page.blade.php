<div>
    <div class="md:grid md:grid-cols-3 md:gap-6">
        <div class="md:col-span-1 flex justify-between">
            <div class="px-4 sm:px-0">
                <h3 class="text-lg font-medium text-gray-900">Logo</h3>

                <p class="mt-1 text-sm text-gray-600">
                    Update your logo image.
                </p>
            </div>

            <div class="px-4 sm:px-0">

            </div>
        </div>

        <div class="mt-5 md:mt-0 md:col-span-2">
            <form action="{{route('update.logo', Auth::user()->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="_method" value="PUT">
                <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
                    <div class="grid grid-cols-6 gap-6">
                        <!-- Profile Photo -->
                        @foreach ($settings as $setting)
                            @if($setting->judul=='logo')
                            <div class="col-span-6 sm:col-span-4">
                                <ul class="thumbnails">
                                    <li class="span2"> <a> <img src="{{url($setting->konten)}}" width="200" > </a>
                                        <div class="actions">  <a class="lightbox_trigger" href="{{url($setting->konten)}}"><i class="icon-search"></i></a> </div>
                                    </li>
                                </ul>
                                <label class="block font-medium text-sm text-gray-700" for="name">
                                    File upload input
                                </label>
                                <input type="file" name="image"/>
                            </div>
                            @endif
                        @endforeach
                    </div>
                </div>

                <div
                    class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md">
                    <div x-data="{ shown: false, timeout: null }"
                        x-init="window.livewire.find('JF7EXDdd1veSL9oIGiOg').on('saved', () => { clearTimeout(timeout); shown = true; timeout = setTimeout(() => { shown = false }, 2000);  })"
                        x-show.transition.out.opacity.duration.1500ms="shown"
                        x-transition:leave.opacity.duration.1500ms="" style="display: none;"
                        class="text-sm text-gray-600 mr-3">
                        Saved.
                    </div>

                    <button type="submit"
                        class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition"
                        wire:loading.attr="disabled" wire:target="photo">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>
    <div class="hidden sm:block">
        <div class="py-8">
            <div class="border-t border-gray-200"></div>
        </div>
    </div>
    <div class="md:grid md:grid-cols-3 md:gap-6">
        <div class="md:col-span-1 flex justify-between">
            <div class="px-4 sm:px-0">
                <h3 class="text-lg font-medium text-gray-900">Home Page Caption</h3>

                <p class="mt-1 text-sm text-gray-600">
                    Update your account's profile information and email address.
                </p>
            </div>

            <div class="px-4 sm:px-0">

            </div>
        </div>

        <div class="mt-5 md:mt-0 md:col-span-2">
            <div class="flex items-center justify-end">
                <x-jet-button wire:click="actionAddModal">
                    {{__('Add Caption')}}
                </x-jet-button>
                <x-jet-action-message class="mr-3" on="added">
                    {{ __('Action added.') }}
                </x-jet-action-message>
                <x-jet-action-message class="mr-3" on="updated">
                    {{ __('Action saved.') }}
                </x-jet-action-message>
            </div>
            <div >
                <div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-3">
                    @foreach ($settings as $banner)
                        @if($banner->judul=='caption')
                        <div class="p-6">
                            <div class="flex items-center">
                                <img src="{{strpos($banner->media, 'http') !== false ? cloud_image_url($banner->media, 'res') : url($banner->media)}}" />
                            </div>
                            <h1>{{$banner->konten}}</h1>
                            <div class="mt-2 text-sm text-gray-500">
                                {{$banner->deskripsi}}.
                            </div>
                            <div>
                                <div class="flex items-center">
                                    <button class="mt-3 ml-3 flex items-center text-sm font-semibold text-indigo-700" wire:click="actionUpdateModal('{{$banner->id}}')" >Ubah</button>
                                    <form method="POST" action="{{ route('delete.banner', $banner->id) }}" class="delete">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button class="mt-3 ml-3 flex items-center text-sm font-semibold text-indigo-700" type="submit">Hapus</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endif
                    @endforeach

                </div>
            </div>
        </div>
    </div>
    <div class="hidden sm:block">
        <div class="py-8">
            <div class="border-t border-gray-200"></div>
        </div>
    </div>
    <div class="md:grid md:grid-cols-3 md:gap-6">
        <div class="md:col-span-1 flex justify-between">
            <div class="px-4 sm:px-0">
                <h3 class="text-lg font-medium text-gray-900">Home Page Content</h3>

                <p class="mt-1 text-sm text-gray-600">
                    Update your account's profile information and email address.
                </p>
            </div>

            <div class="px-4 sm:px-0">

            </div>
        </div>

        <div class="mt-5 md:mt-0 md:col-span-2">
            <form action="{{route('update.caption', Auth::user()->id)}}" method="POST">
                @csrf
                <input type="hidden" name="_method" value="PUT">
                <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
                    <div class="grid grid-cols-6 gap-6">
                        <!-- Profile Photo -->

                        @foreach ($settings as $setting)
                            @if($setting->key=='frontend' && $setting->judul!='caption' && $setting->judul!='logo')
                            <!-- Name -->
                            <div class="col-span-6 sm:col-span-4">
                                <label class="block font-medium text-sm text-gray-700" for="name">
                                    {{$setting->judul}}
                                </label>
                                <input value="{{$setting->konten}}" type="{{$setting->judul!=='email'?'text':'email'}}" name="judul[{{$setting->id}}]"
                                    class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full"
                                    id="{{$setting->judul}}">
                                <textarea class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full" name="deskripsi[{{$setting->id}}]" class="{{$setting->judul}}">{{$setting->deskripsi}}</textarea>

                            </div>
                            @endif
                        @endforeach
                    </div>
                </div>

                <div
                    class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md">
                    <div x-data="{ shown: false, timeout: null }"
                        x-init="window.livewire.find('JF7EXDdd1veSL9oIGiOg').on('saved', () => { clearTimeout(timeout); shown = true; timeout = setTimeout(() => { shown = false }, 2000);  })"
                        x-show.transition.out.opacity.duration.1500ms="shown"
                        x-transition:leave.opacity.duration.1500ms="" style="display: none;"
                        class="text-sm text-gray-600 mr-3">
                        Saved.
                    </div>

                    <button type="submit"
                        class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition"
                        wire:loading.attr="disabled" wire:target="photo">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Form Action Modal -->
    <x-jet-dialog-modal wire:model="modalAddVisible">
        <x-slot name="title">
            {{ __('Add Caption') }}
        </x-slot>

        <x-slot name="content">

            <div>
                <div>
                    <x-jet-label for="caption" value="{{ __('Caption') }}" />
                    <input type="text" name="caption" x-ref="caption" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full"
                                wire:model.defer="caption" wire:model="caption">

                </div>
                <div>
                    <x-jet-label for="description" value="{{ __('Description') }}" />
                    <input type="text" name="description" x-ref="description"
                    class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full"
                                wire:model.defer="description" wire:model="description">

                </div>
                <div>
                    <x-jet-label for="photo" value="{{ __('Banner Image') }}" />
                    <input type="file" name="image" x-ref="image"
                                wire:model.defer="image" wire:model="image">

                </div>

            </div>

        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('modalAddVisible')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            <x-jet-button class="ml-2" wire:click="create" wire:loading.attr="disabled">
                {{ __('Add') }}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>

    <!-- Form Action Modal -->
    <x-jet-dialog-modal wire:model="modalUpdateVisible">
        <x-slot name="title">
            {{ __('Update Caption') }}
        </x-slot>

        <x-slot name="content">

            <div>
                @if($selected_set)
                <ul class="thumbnails">
                    <li class="span2"> <a> <img src="{{url($selected_set->media)}}" alt="" > </a>
                        <div class="actions">  <a class="lightbox_trigger" href="{{url($selected_set->media)}}"><i class="icon-search"></i></a> </div>
                    </li>
                </ul>
                @endif
                <div>
                    <x-jet-label for="caption" value="{{ __('Caption') }}" />
                    <input type="text" name="caption" x-ref="caption" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full"
                                wire:model.defer="caption" wire:model="caption">

                </div>
                <div>
                    <x-jet-label for="description" value="{{ __('Description') }}" />
                    <input type="text" name="description" x-ref="description" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full"
                                wire:model.defer="description" wire:model="description">

                </div>
                <div>
                    <x-jet-label for="photo" value="{{ __('Update Banner Image') }}" />
                    <input type="file" name="image" x-ref="image"
                                wire:model.defer="image" wire:model="image">

                </div>

            </div>

        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('modalUpdateVisible')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            <x-jet-button class="ml-2" wire:click="update" wire:loading.attr="disabled">
                {{ __('Add') }}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
