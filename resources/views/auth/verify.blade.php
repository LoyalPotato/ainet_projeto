@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verificar conta') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Foi reenviado um link de ativaçao') }}
                        </div>
                    @endif
                    
                    {{ __('Se não recebeu um email') }}, <a href="{{ route('verification.resend') }}">{{ __('pode clicar aqui para pedir outro') }}</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
