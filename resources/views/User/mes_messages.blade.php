@extends('layouts.app')
@section('title','Messages')
@section('content')

<div class="breadcrumb-area">
    <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center" style="background-image: url({{ asset('assets/img/bg-img/24.jpg') }});">
        <h2>Messages</h2>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('user.index') }}"><i class="fa fa-home"></i> Accueil</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Messages</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong> {!! session()->get('success') !!}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
            </div>
            <div class="col-md-8 mx-auto">
                <div class="row justify-content-between">
                    @if(isset($vendors))
                    @if($vendors->currentPage() > 1)
                    <a href="{{ $vendors->previousPageUrl() }}"><i class="fa fa-long-arrow-left" aria-hidden="true"></i>
                    </a>
                    @endif

                    @if($vendors->hasMorePages())
                    <a href="{{ $vendors->nextPageUrl() }}"><i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                    </a>
                    @endif
                    @endif
                </div>

                <div class="table-responsive">
                    <table class="table">
                        <thead>


                        </thead>
                        <tbody>

                            @foreach ($vendors as $chat)
                            <tr>
                                <td>
                                    <a href="{{ route('user.messages_by_id',$chat->id) }}">
                                        @if($chat->avatar)
                                        <img src="{{ asset($chat->avatar) }}" alt="" height="48px" width="48px">
                                        @else
                                        <img src="{{ asset('avatar_blanc.png') }}" alt="" height="48px" width="48px">

                                        @endif
                                    </a>

                                </td>
                                <td class="align-middle">
                                    <a href="{{ route('user.messages_by_id',$chat->id) }}">
                                        {{ $chat->first_name}} &nbsp; {{ $chat->last_name }}
                                    </a>
                                </td>
                                <td class="align-middle">
                                    {{ $chat->nbmessages()}} messages
                                </td>
                                <td class="align-middle">
                                    <a href="{{ route('user.messages_by_id',$chat->id) }}">
                                        <span class="bg-success p-1 rounded">Contacter</span>
                                        </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>


            </div>


        </div>
    </div>
</div>



@endsection
