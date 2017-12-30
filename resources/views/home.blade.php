@extends('layouts.app')
@section('content')
    <div class="col-md-9">
        <div class="alert alert-info alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <strong>Vem sitter vart?</strong> Klicka på en plats som är mörk så ser du vem som sitter där.
        </div>
        <div class="alert alert-info alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <strong>Nuvarande deltagare på data linjen är grönmarkerade.</strong>
            <br>
            <strong>Gammla deltagare på data linjen är ljusgrönmarkerade.</strong>

        </div>
        @include('includes.desks')
    </div>
    <section class="col-md-3">
        @if(Auth::check() && $user->book)
            <div class="panel panel-default">
                <div class="panel-heading">Din bokning</div>
                <div class="panel-body">
                    <p><strong>Plats</strong> {{ $user->book->place }}</p>
                    <p><strong>Bokad</strong> {{ $user->book->created_at->toDateString() }}</p>
                </div>
            </div>
        @else
            @include('includes.book_form')
        @endif
    </section>
@endsection


   
