@extends('layout')

@section('content')
<form method="POST" action="{{url('addFinalStepRole')}}">
    @csrf

    {{$modelHasRolesInTable}}

    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">выберите роль</label>
        <select class="form-select" aria-label="Default select example" name="role_id" id="role_id">
            @foreach ($roleModel as $itemRoles)
            <option value="{{$itemRoles->id}}" name="{{$itemRoles->id}}" id="{{$itemRoles->id}}">{{$itemRoles->name}} </option>
            @endforeach
        </select>

      </div>
      <div class="mb-3">
        <select class="form-select" aria-label="Default select example" name="model_type" id="model_type">

            <option value="{{$modelHasRoles[0]->model_type}} " name="model_type" id="model_type">{{$modelHasRoles[0]->model_type}} </option>

        </select>
    </div>


    <div class="mb-3">
        <select class="form-select" aria-label="Default select example" name="model_id" id="model_id">
            <option value="{{$item}}" name="model_id" id="model_id">{{$item}} </option>
        </select>
    </div>

      <button type="submit" class="btn btn-primary">Добавить</button>
    </form>

</div>

</form>
@endsection
