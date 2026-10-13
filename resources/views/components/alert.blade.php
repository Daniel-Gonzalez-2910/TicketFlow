<div
    @class([
        'alerta',
        'alerta-exito' => $tipo === 'exito',
        'alerta-error' => $tipo === 'error',
    ])
>
    {{ $mensaje }}
</div>