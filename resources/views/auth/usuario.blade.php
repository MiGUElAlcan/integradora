@extends('layouts.app')

@section('title','Inicio de Sesión')

@section('content')
    <header>
        <div class="div-logo">
            <img src="icons/logo.svg" alt="Logo a">
            <h1>SiTE</h1>
        </div>

        <div class="div-user">
            <a class="div-icon-user" href="{{url('/search')}}">
                <img src="icons/search-while.svg" alt="">
            </a>

            <a class="div-icon-user" href="{{url('/')}}">
                <img src="icons/home.svg" alt="">
            </a>


            <a class="div-icon-user" href="{{route('register.index')}}">
            <img src="icons/add-user.svg" alt="">
            </a>

            <button class="div-icon-not"  id="btn-notification">
                <img src="icons/notification.svg" alt="">
            </button>

            <a class="div-icon-user" href="{{route('login.destroy')}}">
                <img src="icons/exit.svg" alt="">
            </a>

        </div>

    </header>

    <main>
        
            <div class="container">
                <h2>Gestion de usuarios</h2>
                <div class="form-search">
                    <form action="{{route('usuario.index')}}" method="get" >
                        <input type="text" required name="texto" value="{{$texto}}" placeholder="Nombre de usuario...">
                        <button type="submit">
                            <img src="icons/search-while.svg" alt="">
                        </button>
                    </form>
                </div>

                @if (count($usuarios)<=0)
                    <tr>
                        <td colspan="9">No hay resultados</td>
                    </tr>
                @else
                    <div class="content-cards">
                        @foreach ($usuarios as $usuario )
                            <div class="Card">
                                <div class="img-content">
                                    <img src="img/user.png" alt="" srcset="">
                                </div>
                                <h3>{{$usuario->name}}</h3>
                                <h4>{{$usuario->email}}</h4>
                                <p>Creado el: <span>{{$usuario->created_at}}</span></p>
                                <div class="content-buttons">
                                    
                                    <button type="button" class="btn-delete" data-bs-toggle="modal" data-bs-target="#modal-delete-{{$usuario->id}}">
                                        Eliminar
                                    </button>
                                    <a href="{{route('usuario.edit',$usuario->id)}}" class="btn-update"> Editar</a>
                                    
                                </div>
                            </div>
                        @include('auth.delete')
                        @endforeach
                    </div>
                @endif

                {{$usuarios->links()}}
            
        
{{--                     <div class="col-xl-12">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Opciones</th>
                                        <th>id</th>
                                        <th>name</th>
                                        <th>email</th>
                                        <th>email_verified_at</th>
                                        <th>password</th>
                                        <th>remember_token</th>
                                        <th>created_at</th>
                                        <th>update_at</th>
                                    </tr>
                                </thead>
                                <tbody>
        
                                    @if (count($usuarios)<=0)
                                        <tr>
                                            <td colspan="9">No hay resultados</td>
                                        </tr>
                                    @else
                                    @foreach ($usuarios as $usuario )
                                    <tr>
                                        <td>
                                            <a href="{{route('usuario.edit',$usuario->id)}}" class="btn btn-warning btn-sm"> Editar</a>
                                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modal-delete-{{$usuario->id}}">
                                            Eliminar
                                            </button>
                                        </td>
                                        <th>{{$usuario->id}}</th>
                                        <th>{{$usuario->name}}</th>
                                        <th>{{$usuario->email}}</th>
                                        <th>{{$usuario->email_verified_at}}</th>
                                        <th>{{$usuario->password}}</th>
                                        <th>{{$usuario->remember_token}}</th>
                                        <th>{{$usuario->created_at}}</th>
                                        <th>{{$usuario->updated_at}}</th>
                                    </tr>
                                    @include('auth.delete')
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                            {{$usuarios->links()}}
                        </div>
                    </div> --}}
                
            </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
@endsection



</html>
