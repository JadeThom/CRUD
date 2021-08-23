@extends('layouts.app')

@push('css')
    <style>
        /* Personalizar layout*/
    </style>
@endpush

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between w-100">
                            <span>@lang('Lista Usuários')</span>
                            <a href="{{ url('cadastro/create') }}" class="btn-primary btn-sm">
                                <i class="fa fa-plus"></i> @lang('Criar Novo')
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <td>ID</td>
                                <td>@lang('Nome')</td>
                                <td>@lang('Sobrenome')</td>
                                <td>@lang('E-mail')</td>
                                <td>@lang('Data de Nascimento')</td>
                                <td colspan="3" class="text-center">@lang('Ações')</td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($cadastros as $cadastro)
                                <tr>
                                    <td>{{$cadastro->id}}</td>
                                    <td>{{$cadastro->nome}}</td>
                                    <td>{{$cadastro->sobrenome}}</td>
                                    <td>{{$cadastro->email}}</td>
                                    <td>{{$cadastro->data_nascimento}}</td>
                                    <td class="text-center p-0 align-middle" width="70">
                                        <a href="{{ route('cadastro.show', $cadastro->id)}}"
                                           class="btn btn-info btn-sm">@lang('Abrir')
                                        </a>
                                    </td>
                                    <td class="text-center p-0 align-middle" width="70">
                                        <a href="{{ route('cadastro.edit', $cadastro->id)}}" method="put"
                                           class="btn btn-primary btn-sm">@lang('Editar')
                                        </a>
                                    </td>
                                    <td class="text-center p-0 align-middle" width="70">
                                        <form action="{{ route('cadastro.destroy', $cadastro->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm" type="submit">Deletar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        // Script personalizado
    </script>
@endpush
