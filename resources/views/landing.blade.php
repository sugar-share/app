@extends('layouts.app')

@section('content')
    <div class="flex-center" style="padding-top: 3rem;">
        <form method="POST">
            @csrf
            <div style="font-size: large; padding-bottom: 1.5rem;">
                Hey, wanna hear more? Awesome.<br>
                Join the SugarShare BETA Testers.
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
                <label>Give us your email and we'll get in touch: <input type="email" name="email"></label>
            </div>
            <div>
                <button class="btn" type="submit">We'll Let You Know</button>
            </div>
        </form>
    </div>
@endsection
