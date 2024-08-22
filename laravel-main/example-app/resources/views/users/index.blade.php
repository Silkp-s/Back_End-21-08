@extends('users.layout')
 
@section('content')
<div class="container-fluid mt-5">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Ejemplo basico</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('users.create') }}"> Crear Usuario</a>
            </div>
            <br>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No.</th>
            <th>Nombre</th>
            <th>Email</th>
            <th width="280px">Opciones</th>
        </tr>
        @foreach ($users as $user)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>
                <form action="{{ route('users.destroy',$user->id) }}" method="POST">
   
                    <a class="btn btn-secondary" href="{{ route('users.show',$user->id) }}">Ver</a>
    
                    <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Editar</a>
   
                    @csrf
                    @method('DELETE')
      

                    <!--trigger-->
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                     Eliminar
                    </button>


<!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                  <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar Usuario</h1>
                                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                          <div class="modal-body">
                                 <span>Seguro que desea eliminar al usuario?</span>
                        </div>
                         <div class="modal-footer">
                         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                         <button type="submit" class="btn btn-danger">Eliminar</button>
                         </div>
                     </div>
                    </div>
                    </div>

                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
    {!! $users->links() !!}
      
@endsection