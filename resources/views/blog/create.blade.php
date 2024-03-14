@extends('layouts.app')

@section('content')
    {{-- <div class="w-4/5 m-auto text-left">
        <div class="py-15">
            <h1 class="text-6xl">
                Create News
            </h1>
        </div>
    </div> --}}

    @if ($errors->any())
        <div class="w-4/5 m-auto mt-10 pl-2">
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="w-1/5 mb-4 text-gray-50 bg-red-700 rounded-2xl py-4 px-5">
                        {{ $error }}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- <div class="w-4/5 m-auto mb-20">
        <form action="/blog" method="POST" enctype="multipart/form-data">
            @csrf

            <input type="text" name="title" placeholder="Title..."
                class="px-2 bg-transparent block border-b-2 w-full h-20 titleInReadMore outline-none">

            <textarea name="subtitle" placeholder="Subtitle..."
                class="p-2 leading-7 bg-transparent block border-b-2 w-full h-20 text-gray-700 font-bold text-2xl outline-none"></textarea>

            <textarea name="description" placeholder="Description..."
                class="p-2 leading-6 bg-transparent block border-b-2 w-full h-60 text-base text-gray-700 font-light outline-none"></textarea>

            <div class="bg-grey-lighter pt-15">
                <label id="fileUploadContainer"
                    class="w-44 flex flex-col font-medium items-center px-2 py-3 bg-white-rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer">
                    <span id="fileUploadText" class="text-base leading-normal">
                        Upload Image
                    </span>
                    <input type="file" name="image" class="hidden" id="fileInput" onchange="fileUploaded()">
                </label>
            </div>

            <button type="submit"
                class="uppercase mt-12 button-color text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl">
                Submit
            </button>
        </form>
    </div> --}}

    <div class="w-4/5 m-auto about-background-color mb-20 rounded">
        <form action="/blog" method="POST" enctype="multipart/form-data" class="px-6 space-y-6 sm:px-10 sm:space-y-8">
            @csrf
            <h2 class="text-center text-3xl font-semibold text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">Create
                News</h2>
            <div class="flex flex-col">
                <input type="text" name="title" placeholder="Title..." class="form-input w-full mb-8">
                <textarea name="subtitle" placeholder="Subtitle..." class="form-textarea w-full mb-8 h-17"></textarea>
                <textarea name="description" placeholder="Description..." class="form-textarea w-full h-60"></textarea>
                <div class="bg-grey-lighter pt-15">
                    <label id="fileUploadContainer"
                        class="w-44 flex flex-col font-medium items-center px-2 py-3 bg-gray-100 rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer">
                        <span id="fileUploadText" class="text-base leading-normal">
                            Upload Image
                        </span>
                        <input type="file" name="image" class="hidden" id="fileInput" onchange="fileUploaded()">
                    </label>

                </div>
                <button type="submit"
                    class="mt-10 w-full select-none font-bold whitespace-no-wrap p-3 rounded-lg text-base leading-normal no-underline text-gray-100 button-color sm:py-4 mb-8">Submit</button>
            </div>
        </form>
    </div>


    <script>
        function fileUploaded() {
            let fileInputContainer = document.getElementById('fileUploadContainer');
            let fileInput = document.getElementById('fileInput');
            let fileUploadText = document.getElementById('fileUploadText')

            if (fileInput.files.length > 0) {
                fileInputContainer.classList.remove('bg-grey-lighter');
                fileInputContainer.classList.remove('font-medium');
                fileInputContainer.classList.add('bg-blue-500');
                fileInputContainer.classList.add('font-bold');
                fileUploadText.style.color = "white"
                fileUploadText.innerHTML = "Uploaded Image"
            }
            // else {
            //     fileInputContainer.classList.add('bg-grey-lighter');
            //     fileInputContainer.classList.remove('bg-blue-500');
            //     fileInputContainer.classList.remove('font-bold');
            //     fileInputContainer.classList.add('font-medium');
            //     fileUploadText.style.color="black"
            //     fileUploadText.innerHTML="Upload Image"
            // }
        }
    </script>

@endsection
