@extends('layouts.app')

@section('content')
    <div class="w-4/5 m-auto text-left">
        <div class="py-15">
            <h1 class="text-6xl">
                Create News
            </h1>
        </div>
    </div>

    @if ($errors->any())
        <div class="w-4/5 m-auto">
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="w-1/5 mb-4 text-gray-50 bg-red-700 rounded-2xl py-4 px-5">
                        {{ $error }}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="w-4/5 m-auto mb-20">
        <form action="/blog" method="POST" enctype="multipart/form-data">
            @csrf

            <input type="text" name="title" placeholder="Title..."
                class="px-2 bg-transparent block border-b-2 w-full h-20 text-5xl outline-none">

            <textarea name="subtitle" placeholder="Subtitle..."
                class="p-2 leading-7 bg-transparent block border-b-2 w-full h-20 text-2xl font-bold outline-none"></textarea>

            <textarea name="description" placeholder="Description..."
                class="p-2 leading-7 bg-transparent block border-b-2 w-full h-60 text-xl outline-none"></textarea>

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
