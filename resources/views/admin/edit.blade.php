@extends('layouts.app')

@push('css')
    <style>
        /* Personalizar layout*/
    </style>
@endpush

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between w-100">
                            <span>@lang('Editar Usuário')</span>
                            <a href="{{ url('coronas') }}" class="btn-info btn-sm">
                                <i class="fa fa-arrow-left"></i> @lang('Voltar')
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                            <form action="{{ route('cadastro.update', ['cadastro'=>$cadastros->id]) }}" method="POST">
                                @csrf
                                @method('put')

                                <label for=""> Nome </label> <br>
                                <input type="text" name="nome" value="{{ $cadastros->nome }}"> <br>

                                <label for=""> Sobrenome </label> <br>
                                <input type="text" name="sobrenome" value="{{ $cadastros->sobrenome }}"> <br>

                                <label for=""> E-mail </label> <br>
                                <input type="email" name="email" value="{{ $cadastros->email }}"> <br>

                                <label for=""> Data de Nascimento </label> <br>
                                <input type="date" name="data_nascimento" value="{{ $cadastros->data_nascimento }}"> <br> <br>

                                <button class="btn btn-success pull" type="submit"> Atualizar </button>

                            </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script language='JavaScript'>
        $(".mmss").focusout(function () {
            var id = $(this).attr('id');
            var vall = $(this).val();
            var regex = /[^0-9]/gm;
            const result = vall.replace(regex, ``);
            $('#' + id).val(result);
        });
    </script>
@endpush
