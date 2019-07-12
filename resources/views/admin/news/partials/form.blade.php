<label for="">Статус</label>
<select class="form-control" name="is_published">
    @if (isset($news->id))
        <option value="0" @if ($news->is_published == 0) selected="" @endif>Не опубликовано</option>
        <option value="1" @if ($news->is_published == 1) selected="" @endif>Опубликовано</option>
    @else
        <option value="0">Не опубликовано</option>
        <option value="1">Опубликовано</option>
    @endif
</select>

<label for="">Заголовок</label>
<input type="text" class="form-control" name="title" placeholder="" value="{{$news->title or ""}}" required>

<label for="">Slug</label>
<input type="text" class="form-control" name="slug" placeholder="Автоматическая генирация" value="{{$news->slug or ""}}" readonly="">

<label for="">Описание</label>
<textarea class="form-control" name="description" id="description">{{$news->description or ""}}</textarea>

<input class="btn btn-primary btn-create" type="submit" value="Создать">