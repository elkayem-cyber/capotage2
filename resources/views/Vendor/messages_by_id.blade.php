@extends('layouts.app')
@section('title','Contact Vendeur')
@section('content')

<div class="breadcrumb-area">
    <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center" style="background-image: url({{ asset('assets/img/bg-img/24.jpg') }});">
        <h2>Contact Vendeur</h2>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('user.index') }}"><i class="fa fa-home"></i> Accueil</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Contact Vendeur</li>
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
            <div class="col-12">
                <div class="col-12 mb-15">
                    <form action="{{ route('Vendor.send_message',$id) }}" class="convertation" method="post">
                        @csrf
                        <textarea name="message" id="" cols="30" rows="2" class=" form-control shaow" placeholder="ecrire votre message ...."></textarea>
                        <button type="submit"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                    </form>
                </div>


                <div class="comment_area clearfix">

                    @foreach ($chats as $chat)
                    @if($chat->sender=='u')
                    <ol class="children">
                        <li class="single_comment_area">

                            <div class="comment-wrapper d-flex">
                                <!-- Comment Meta -->
                                <div class="comment-author">

                                    <span class="comment-date">{{ $chat->created_at }}</span>
                                </div>
                                <!-- Comment Content -->
                                <div class="comment-content">
                                    <div class=" ">
                                        <h5>{{ $chat->user->first_name }} &nbsp;{{ $chat->user->last_name }}</h5>


                                    </div>
                                    <p>{{ $chat->message }}</p>

                                </div>
                            </div>

                        </li>
                    </ol>
                    @else
                    <ol class="children">
                        <li class="">

                            <div class=" text-right">
                                <hr>


                                <p>{{ $chat->message }}</p>


                                <div class="d-flex justify-content-end">
                                    envoyé le:{{ $chat->created_at }}
                                    <form action="{{ route('Vendor.delete_message',$chat->id) }}" method="post">
                                        @csrf
                                        <button type="submit" title="supprimer" class="btn btn-sm"><i class="fa fa-trash"></i></button>
                                    </form>
                                </div>





                            </div>
                        </li>
                    </ol>
                    @endif

                    @endforeach



                </div>
                <div class="row justify-content-between">
                    @if(isset($chats))
                    @if($chats->currentPage() > 1)
                    <a href="{{ $chats->previousPageUrl() }}"><i class="fa fa-long-arrow-left" aria-hidden="true"></i>
                    </a>
                    @endif

                    @if($chats->hasMorePages())
                    <a href="{{ $chats->nextPageUrl() }}"><i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                    </a>
                    @endif
                    @endif
                </div>

            </div>


        </div>
    </div>
</div>

<style>
    .convertation {
        display: flex;
        flex-direction: row;
    }

    .convertation textarea {
        background-color: rgb(245, 241, 241);
        resize: none;
        color: #000000;
        border-radius: 8px 0px 0px 8px;
        border: solid 1px rgb(245, 241, 241);
        box-shadow: none;
    }

    .convertation textarea:focus {
        background-color: rgb(245, 241, 241);
        resize: none;
        color: #000000;
        border-radius: 8px 0px 0px 8px;
        box-shadow: none;
        border: solid 1px rgb(245, 241, 241);
        border: solid 1px rgb(245, 241, 241);
    }

    .convertation button {
        background-color: rgb(245, 241, 241);
        resize: none;
        color: #000000;
        border-radius: 0px 8px 8px 0px;
        box-shadow: none;
        cursor: pointer;
        border: solid 1px rgb(245, 241, 241);
        border: solid 1px rgb(245, 241, 241);
    }

    .convertation button:active {
        outline: none;
    }

    .convertation button i {
        padding-right: 10px;
    }

</style>

@endsection
