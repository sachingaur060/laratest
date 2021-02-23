@extends('admin.layout.layout')

@section('content')


<form method="POST" action="{{ route('login') }}">
                @if(!empty($errors))
                <h2> {{ $errors }}</h2>
                @endif
              
                <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">

                <input class="form-control" name="name" type="text" placeholder="Name" required>

               <input class="form-control" name="email" type="text" placeholder="Email" required>

               <input class="form-control" name="password" type="password" placeholder="Password" required>
               <button type="submit" class="form-control">Add</button>
            </form>
        </div>

@endsection