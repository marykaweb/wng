@extends ('admin.layouts.app_admin')

@section('content')

<div class="container">

    <form class="form-horizontal" action="{{route('admin.news.store')}}" method="post">
        {{-- Подключение формы --}}
        @include('admin.news.partials.form')

        <input type="hidden" name="created_by" value="{{Auth::id()}}">

        {{ csrf_field() }}

    </form>

</div>
    
@endsection