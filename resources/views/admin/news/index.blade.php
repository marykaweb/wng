@extends ('admin.layouts.app_admin')

@section('content')

<div class="container">

    <a href="{{route('admin.news.create')}}" class="btn btn-primary pull-right"><i class="fa fa-plus-squire-o"></i>Создать новость</a>

    <table class="table table-striped">
        <thead>
            <th>Наименование</th>
            <th>Публикация</th>
            <th class="text-right">Действие</th>
        </thead>
    
        <tbody>
            @forelse ($news as $itemNews)
                <tr>
                    <td>{!!$itemNews->title!!}</td>
                    <td>{{$itemNews->is_published}}</td>
                    <td class="text-right">
                        <form onsubmit="if(confirm('Удалить?')){ return true}else {return false}" action="{{route('admin.news.destroy', $itemNews)}}" method="post">
                            <input type="hidden" name="_method" value="DELETE"> 
                            {{ csrf_field() }}
                            <a class="btn btn-default" href="{{route('admin.news.edit', $itemNews)}}"><i class="fa fa-edit"></i></a>
                            <button type="submit" class="btn"><i class="fa fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td class="text-center" colspan="3"><h2>Данные отсутствуют</h2></td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <div class="text-center">
        {{$news->links()}}
    </div>
</div>

@endsection     