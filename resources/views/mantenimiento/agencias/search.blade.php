{!! Form::open(array('url'=>'mantenimiento/agencias','method'=>'GET','autocomplete'=>'off','role'=>'search'))!!}
<div class="form-group container">
    <div class="input-group">
        <input type="text" class="form-control" name="searchText" placeholder="Buscar..." value="{{$searchText}}">
        <span class="input-group-btn">
            <button type="submit" class="btn btn-primary">Buscar</button>
        </span>
    </div>
</div>
{{Form::close()}}