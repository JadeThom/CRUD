@extends('layouts.app')

@push('css')
   //
@endpush

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between w-100">
                            <span>@lang('Cadastro de usuários')</span>
                            <a href="{{ url('cadastro') }}" class="btn-info btn-sm">
                                <i class="fa fa-arrow-left"></i> @lang(' Voltar')
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                                @if (session('success'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('success') }}
                                    </div>
                                @endif

                                <div>

                            <form action="{{ route('cadastro.store') }}" method="POST">
                                @csrf

                                <label for=""> Nome </label> <br>
                                <input type="text" name="nome"> <br>

                                <label for=""> Sobrenome </label> <br>
                                <input type="text" name="sobrenome"> <br>

                                <label for=""> E-mail </label> <br>
                                <input type="email" name="email"> <br>

                                <label for=""> Data de Nascimento </label> <br>
                                <input type="date" name="data_nascimento"> <br> <br>

                                <button url="" class="btn btn-success pull" type="submit"> Cadastrar </button>

                            </form>

                        </div>
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
