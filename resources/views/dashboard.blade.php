@extends('layouts.app')
@section('title','Home')
@section('content')
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Notícias') }}
            </h2>
        </div>
    </header>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                @can ('user')
                   Seja Bem-vindo ao nosso site de notícias {{ Auth::user()->name }}!
                @elsecan ('admin')
                   Olá Administrador, aqui você tem permissão para fazer alterações!
                @endcan
                </div>
            </div>
        </div>
    </div>

    <!--Notícias-->
    
    <div>
        @include('layouts.news')
    </div>
    @endsection