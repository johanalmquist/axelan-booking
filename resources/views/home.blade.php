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
        <div class="desks">
            <section class="col-md-3">
                <table class="table table-bordered">
                    <tr>
                        {{ place(1) }}
                        {{ place(21)}}
                    </tr>
                    <tr>
                        {{ place(2) }}
                        {{ place(22) }}
                    </tr>
                    <tr>
                        {{ place(3) }}
                        {{ place(23) }}
                    </tr>
                    <tr>
                        {{ place(4) }}
                        {{ place(24) }}
                    </tr>
                    <tr>
                        {{ place(5) }}
                        {{ place(25) }}
                    </tr>
                    <tr>
                        {{ place(6) }}
                        {{ place(26) }}
                    </tr>
                    <tr>
                        {{ place(7) }}
                        {{ place(27) }}
                    </tr>
                    <tr>
                        {{ place(8) }}
                        {{ place(28) }}
                    </tr>
                    <tr>
                        {{ place(9) }}
                        {{ place(29) }}
                    </tr>
                    <tr>
                        {{ place(10) }}
                        {{ place(30) }}
                    </tr>
                    <tr>
                        {{ place(11) }}
                        {{ place(31) }}
                    </tr>
                    <tr>
                        {{ place(12) }}
                        {{ place(32) }}
                    </tr>
                    <tr>
                        {{ place(13) }}
                        {{ place(33) }}
                    </tr>
                    <tr>
                        {{ place(14) }}
                        {{ place(34) }}
                    </tr>
                    <tr>
                        {{ place(15) }}
                        {{ place(35) }}
                    </tr>
                    <tr>
                        {{ place(16) }}
                        {{ place(36) }}
                    </tr>
                    <tr>
                        {{ place(17) }}
                        {{ place(37) }}
                    </tr>
                    <tr>
                        {{ place(18) }}
                        {{ place(38) }}
                    </tr>
                    <tr>
                        {{ place(19) }}
                        {{ place(39) }}
                    </tr>
                    <tr>
                        {{ place(20) }}
                        {{ place(40) }}
                    </tr>
                </table>
            </section>

            <section class="col-md-3">
                <table class="table table-bordered">
                    <tr>
                        {{ place(41) }}
                        {{ place(61) }}
                    </tr>
                    <tr>
                        {{ place(42) }}
                        {{ place(62) }}
                    </tr>
                    <tr>
                        {{ place(43) }}
                        {{ place(63) }}
                    </tr>
                    <tr>
                        {{ place(44) }}
                        {{ place(64) }}
                    </tr>
                    <tr>
                        {{ place(45) }}
                        {{ place(65) }}
                    </tr>
                    <tr>
                        {{ place(46) }}
                        {{ place(66) }}
                    </tr>
                    <tr>
                        {{ place(47) }}
                        {{ place(67) }}
                    </tr>
                    <tr>
                        {{ place(48) }}
                        {{ place(68) }}
                    </tr>
                    <tr>
                        {{ place(49) }}
                        {{ place(69) }}
                    </tr>
                    <tr>
                        {{ place(50) }}
                        {{ place(70) }}
                    </tr>
                    <tr>
                        {{ place(51) }}
                        {{ place(71) }}
                    </tr>
                    <tr>
                        {{ place(52) }}
                        {{ place(72) }}
                    </tr>
                    <tr>
                        {{ place(53) }}
                        {{ place(73) }}
                    </tr>
                    <tr>
                        {{ place(54) }}
                        {{ place(74) }}
                    </tr>
                    <tr>
                        {{ place(55) }}
                        {{ place(75) }}
                    </tr>
                    <tr>
                        {{ place(56) }}
                        {{ place(76) }}
                    </tr>
                    <tr>
                        {{ place(57) }}
                        {{ place(77) }}
                    </tr>
                    <tr>
                        {{ place(58) }}
                        {{ place(78) }}
                    </tr>
                    <tr>
                        {{ place(59) }}
                        {{ place(79) }}
                    </tr>
                    <tr>
                        {{ place(60) }}
                        {{ place(80) }}
                    </tr>
                </table>
            </section>
            <section class="col-md-3">
                <table class="table table-bordered">
                    <tr>
                        {{ place(81) }}
                        {{ place(101) }}
                    </tr>
                    <tr>
                        {{ place(82) }}
                        {{ place(102) }}
                    </tr>
                    <tr>
                        {{ place(83) }}
                        {{ place(103) }}
                    </tr>
                    <tr>
                        {{ place(84) }}
                        {{ place(104) }}
                    </tr>
                    <tr>
                        {{ place(85) }}
                        {{ place(105) }}
                    </tr>
                    <tr>
                        {{ place(86) }}
                        {{ place(106) }}
                    </tr>
                    <tr>
                        {{ place(87) }}
                        {{ place(107) }}
                    </tr>
                    <tr>
                        {{ place(88) }}
                        {{ place(108) }}
                    </tr>
                    <tr>
                        {{ place(89) }}
                        {{ place(109) }}
                    </tr>
                    <tr>
                        {{ place(90) }}
                        {{ place(110) }}
                    </tr>
                    <tr>
                        {{ place(91) }}
                        {{ place(111) }}
                    </tr>
                    <tr>
                        {{ place(92) }}
                        {{ place(112) }}
                    </tr>
                    <tr>
                        {{ place(93) }}
                        {{ place(113) }}
                    </tr>
                    <tr>
                        {{ place(94) }}
                        {{ place(114) }}
                    </tr>
                    <tr>
                        {{ place(95) }}
                        {{ place(115) }}
                    </tr>
                    <tr>
                        {{ place(96) }}
                        {{ place(116) }}
                    </tr>
                    <tr>
                        {{ place(97) }}
                        {{ place(117) }}
                    </tr>
                    <tr>
                        {{ place(98) }}
                        {{ place(118) }}
                    </tr>
                    <tr>
                        {{ place(99) }}
                        {{ place(119) }}
                    </tr>
                    <tr>
                        {{ place(100) }}
                        {{ place(120) }}
                    </tr>
                </table>
            </section>
        </div>

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


   
