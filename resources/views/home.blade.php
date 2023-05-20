@extends('adminlte::page')
@push('css')
    <style>
        .content-wrapper {
            background-image: linear-gradient(to right top, #343a40, #283033, #202626, #181c1a, #10110f) !important;
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
    </style>
@endpush
@section('content')
<div class="container">
    <livewire:search />
</div>
@endsection
@push('js')
    <script>
        $('#search').on('keyup', function(e) {
            if (e.keyCode === 13) {
                window.open("https://www.google.com/search?q="+this.value, '_blank');
            }
        });
    </script>
@endpush
