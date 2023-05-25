@extends('adminlte::page')
@push('css')
    <style>
        .content-wrapper {
            background: #454d55;
            /*background-image: linear-gradient(to right top, #343a40, #283033, #202626, #181c1a, #10110f) !important;*/
            color: whitesmoke !important;
        }
        .height{
            height: 20vh;
        }
        .form{
            position: relative;
        }
        .form .fa-search{
            position: absolute;
            top:20px;
            left: 20px;
            color: #9ca3af;
        }
        .form span {
            position: absolute;
            right: 17px;
            top: 13px;
            padding: 2px;
            border-left: 1px solid #d1d5db;
        }
        .left-pan{
            color: black;
            padding-left: 7px;
        }
        .left-pan i{
            padding-left: 10px;
        }
        .form-input{
            height: 55px;
            text-indent: 33px;
            border-radius: 10px;
        }
        .form-input:focus{
            box-shadow: none;
            border:none;
        }
        .info-box{
            background: #343a40;
        }
    </style>
    @can('isMember')
        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    @endcan
@endpush
@section('content')
<div class="container">
    <div id="toast-undo" class="hidden flex items-center w-full max-w-xs p-2 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800" role="alert">
        <div class="text-sm font-normal">
            Copied to Clipboard!!
        </div>
        <div class="flex items-center ml-auto space-x-2">
            <button type="button" id="copy-close" class="bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-undo" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
        </div>
    </div>
    @can('isMember')
        <livewire:search />
        <livewire:application />
    @endcan
</div>
@endsection
@section('plugins.Sweetalert2', true)

@section('js')
    <script>
        @if (session()->has('success'))
        swal.fire("Done!", "{{ session()->get('success') }}", "success");
        @elseif(session()->has('error'))
        swal.fire("Error!", "{{ session()->get('error') }}", "error");
        @endif
    </script>
@endsection
@push('js')
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.15.0/Sortable.min.js"></script>
    <script>
        $( function() {
            $( ".ui-sortable" ).sortable();
        } );
    </script>
    <script>
        $('#search').on('keyup', function(e) {
            if (e.keyCode === 13) {
                window.open("https://www.google.com/search?q="+this.value, '_blank');
            }
        });
    </script>
    <script>
        window.addEventListener('DOMContentLoaded', () =>{
            const menuBtn = document.querySelector('#menu-button');
            const dropdown = document.querySelector('#dropdown');
            menuBtn.addEventListener('click', () => {
                if(dropdown.classList.contains('hidden')){
                    dropdown.classList.remove('hidden')
                }else{
                    dropdown.classList.add('hidden')
                }
            })

            const user = document.querySelector('#user');
            const pass = document.querySelector('#pass');
            const cC = document.querySelector('#copy-close');
            user.addEventListener('click', () => {
                const value = document.querySelector('#user-val').textContent;
                var temp = $("<textarea>");
                $("body").append(temp);
                temp.val(value.replace(/^\s*/gm, '')).select();
                document.execCommand("copy");
                temp.remove();
                // navigator.clipboard.writeText(value);
                document.querySelector('#toast-undo').classList.remove('hidden')
            });
            pass.addEventListener('click', () => {
                const value = document.querySelector('#pass-val').textContent;
                var temp = $("<textarea>");
                $("body").append(temp);
                temp.val(value.replace(/^\s*/gm, '')).select();
                document.execCommand("copy");
                temp.remove();
                // navigator.clipboard.writeText(value);
                document.querySelector('#toast-undo').classList.remove('hidden')
            });
            cC.addEventListener('click', () => {
                document.querySelector('#toast-undo').classList.add('hidden')
            })
        })
    </script>
@endpush
