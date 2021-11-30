<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Pages') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <!--main-container-part-->
                <div id="content">

                    <!--End-breadcrumbs-->
                    <div class="container-fluid">
                        <!--Action boxes-->
                        <div class="row-fluid">
                            <div class="widget-box">
                                <div class="widget-title"> <span class="icon"> <i class="icon-book"></i> </span>
                                    <h5>Halaman edit</h5>
                                </div>
                                @if (session('message'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{ session('message') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif
                                @include('partials.messages')
                            </div>
                        </div>
                    </div>
                </div>
                <!--end-main-container-part-->

                <div class="md:grid md:grid-cols-3 md:gap-6">
                    <div class="md:col-span-1 flex justify-between">
                        <div class="px-4 sm:px-0">
                            <h3 class="text-lg font-medium text-gray-900">Update Page Information</h3>

                            <p class="mt-1 text-sm text-gray-600">
                                Update data pages.
                            </p>
                        </div>

                        <div class="px-4 sm:px-0">

                        </div>
                    </div>

                    <div class="mt-5 md:mt-0 md:col-span-2">
                        <form method="POST" enctype="multipart/form-data" action="{{route('update.karang', $hal->id)}}" id="form" onsubmit="textEditor()" >
                            @csrf
                            <input type="hidden" name="_method" value="PUT">
                            <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
                                <div class="grid grid-cols-6 gap-6">
                                    <!-- Tipe -->
                                    <div class="col-span-6 sm:col-span-4 flex">
                                        <div class="mr-3">
                                            <label class="block font-medium text-sm text-gray-700" for="name">
                                                Tipe
                                            </label>
                                            <select name="tipe">
                                                <option {{$hal->tipe=='page'?'selected':''}} value="page">Page</option>
                                                <option {{$hal->tipe=='tour'?'selected':''}} value="tour">Package & Tour</option>
                                                <option {{$hal->tipe=='hotel'?'selected':''}} value="hotel">Hotel</option>
                                            </select>
                                        </div>
                                        <div>
                                            <label class="block font-medium text-sm text-gray-700" for="name">
                                                Status
                                            </label>
                                            <select name="status">
                                                <option {{$hal->status=='active'?'selected':''}} value="active">Active</option>
                                                <option {{$hal->status=='hidden'?'selected':''}} value="hidden">Hidden</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- Judul -->
                                    <div class="col-span-6 sm:col-span-4">
                                        <ul class="thumbnails">
                                            <li class="span2">
                                                <a> <img src="{{$hal->gambar ? cloud_image_url($hal->gambar, 'res') : url('upload/'.$hal->id.'.jpg')}}" alt="" > </a>
                                                <div class="actions">  <a class="lightbox_trigger" href="{{url('upload/'.$hal->id.'.jpg')}}"><i class="icon-search"></i></a> </div>
                                            </li>
                                        </ul>
                                        <label class="block font-medium text-sm text-gray-700" for="name">
                                            File upload input
                                        </label>
                                        <input type="file" name="image"/>
                                    </div>
                                    <!-- Judul -->
                                    <div class="col-span-6 sm:col-span-4">
                                        <label class="block font-medium text-sm text-gray-700" for="name">
                                            Judul
                                        </label>
                                        <input value="{{$hal->judul}}" type="text" name="judul"
                                            class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full"
                                            id="judul">
                                    </div>
                                    <!-- Judul -->
                                    <div class="col-span-6 sm:col-span-4">
                                        <label class="block font-medium text-sm text-gray-700" for="name">
                                            slug
                                        </label>
                                        <input type="text" name="slug" value="{{$hal->slug}}"
                                            class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full"
                                            id="slug">
                                    </div>
                                    <!-- Judul -->
                                    <div class="col-span-6 sm:col-span-4">
                                        <label class="block font-medium text-sm text-gray-700" for="name">
                                            Konten halaman
                                        </label>
                                        <textarea id="summernote" name="konten" type="text"
                                            class="hidden border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full"
                                            ></textarea>


                                        <div type="text" id="konten" name="konten"
                                            x-data
                                            x-ref="quillEditor"
                                            x-init="
                                                quill = new Quill($refs.quillEditor, {theme: 'snow'});
                                                quill.on('text-change', function () {
                                                $dispatch('input', quill.root.innerHTML);
                                                });
                                            "
                                            wire:model.debounce.2000ms="description"
                                        >
                                            {!! $hal->konten !!}
                                        </div>
                                    </div>

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
                        <button type="submit"
                                class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition"
                                wire:loading.attr="disabled" wire:target="photo">
                                Save
                            </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<script src="https://upload-widget.cloudinary.com/global/all.js" type="text/javascript">
</script>
<script>
    function textEditor() {
        document.getElementById("summernote").value = document.getElementsByClassName("ql-editor").innerHTML;
    }
</script>
