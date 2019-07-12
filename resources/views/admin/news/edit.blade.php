@extends ('admin.layouts.app_admin')

@section('content')

<div class="container">

    <form class="form-horizontal" action="{{route('admin.news.update', $news)}}" method="post">
        {{-- Подключение формы --}}
        @include('admin.news.partials.form')

        <input type="hidden" name="created_by" value="{{Auth::id()}}">
        <input type="hidden" name="_method" value="put">
        {{ csrf_field() }}

    </form>

</div>
    
@endsection