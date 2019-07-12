@extends('layouts.index')

@section('content')
    <div class="test"></div>
    <div class="container full-height">
        <div class="row">
            <div class="links">
                @if (Route::has('login'))
                    <div class="links links-top">
                        @if (Auth::check())
                            <a href="{{ route('admin.news.index') }}">Панель управления</a>
                            <a href="{{ url('/home') }}">Домой</a>
                        @else
                            <a href="{{ url('/login') }}">Войти</a>
                            <a href="{{ url('/register') }}">Зарегестрироваться</a>
                        @endif
                    </div>
                @endif
            </div>
        </div>
        <div>
            <form action="{{ route('index') }}" class="filter" method="post">
                <div class="form-group filter-item">
                    <label for="inputDate">Выберите название:</label>
                    <select name="filterTitle" class="form-control">
                        <option class="filter-option" value="all">Все</option>
                        @forelse ($selectFilters as $selectFilter)
                            <option class="filter-option" value="{{$selectFilter->id}}"
                                @if ( $selectChoose == $selectFilter->id )
                                    selected
                                @endif
                                >{{$selectFilter->title}}</option>
                        @empty
                        @endforelse
                    </select>
                </div>
                <div class="form-group filter-item">
                    <label for="inputDate">Введите дату C:</label>
                    <input type="date" name="startDate" class="form-control" value="{{$selectFromDate}}"
                    >
                </div>
                <div class="form-group filter-item">
                    <label for="inputDate">Введите дату До:</label>
                    <input type="date" name="endDate" class="form-control" value="{{$selectUntilDate}}">
                </div>
                <div class="filter-button-block">
                    <input class="btn btn-primary filter-button" type="submit" name="apply" value="Применить">
                    <input class="btn btn-danger filter-button" type="submit" name="reset" value="Сбросить">
                    <input id="countAllNews" type="hidden" name="countAllNews" value="{{$countAllNews}}">
                </div>

                {!! csrf_field() !!}
            </form>
        </div>
        <div class="row">
            @forelse ($news as $itemNews)
                <div class="col-md-6">
                    <div class="card" data-display-id="{{$itemNews->id}}">
                        <div class="card-body">
                            <div class="card-title-wrapper">
                                <h3 class="card-title">{{str_limit($itemNews->title, 140)}}</h3>
                            </div>
                            <p>{{str_limit(strip_tags(htmlspecialchars_decode($itemNews->description)), 50)}}</p>
                            <a href="{{route('news', $itemNews->slug)}}" class="card-link">Читать</a>
                        </div>
                        <div class="card-post">
                            <div class="card-date">{{$itemNews->updated_at}}</div>
                            <div class="card-author">
                                @if (isset($_POST['startDate']) && $_POST['startDate'] != '' || isset($_POST['endDate']) && $_POST['endDate'] != '' )
                                    {{$itemNews->name}}
                                @else
                                    {{$itemNews->user->name}}
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <h3>Статью еще никто не написал</h3>
            @endforelse
        </div>
        <button id="showmore" class="btn btn-primary showmore">Показать еще</button>        
    </div>
@endsection