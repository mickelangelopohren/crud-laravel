@extends('produtos.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>CRUD com Laravel 5.7, Eloquent e Blade</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('produtos.create') }}"> Criar novo produto</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>Detalhes</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($produtos as $produto)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $produto->nome }}</td>
            <td>{{ $produto->detalhes }}</td>
            <td>
                <form action="{{ route('produtos.destroy',$produto->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('produtos.show',$produto->id) }}">Ver</a>
    
                    <a class="btn btn-primary" href="{{ route('produtos.edit',$produto->id) }}">Editar</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Remover</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $produtos->links() !!}
      
@endsection