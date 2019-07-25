@extends('layouts.app')

@section('content')
    <div class="flex-center">
        <form method="POST">
            @csrf
            <div>
                Hey, wanna hear more? Awesome.
            </div>
            <div>
                <label>Did you want to buy? <input type="checkbox" name="buy"></label>
            </div>
            <div>
                <label>Did you want to trade? <input type="checkbox" name="trade"></label>
            </div>
            <div>
                <label>Did you want to give? <input type="checkbox" name="give"></label>
            </div>
            <div>
                <label>How can we get in touch to help? <input type="email" name="email"></label>
            </div>
            <div>
                <button class="btn" type="submit">We'll Let You Know</button>
            </div>
        </form>
    </div>
@endsection
