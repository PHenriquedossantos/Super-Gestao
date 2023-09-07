<h3>Fornecedor</h3>

@php


@endphp


@isset($fornecedores)

    @forelse ($fornecedores as $indice => $fornecedor)

        Fornecedor: {{ $fornecedores[$indice]['nome'] }}
        <br>
        Status: {{ $fornecedores[$indice]['status'] }}
        <br>
        CNPJ: {{ $fornecedores[$indice]['CNPJ'] ?? 'CNPJ NÃO INFORMADO' }}
        <br>
        Telefone: {{ $fornecedores[$indice]['telefone'] ?? ''}}
        <br>
        DDD: {{$fornecedores[$indice]['ddd'] ?? ''}}
        <hr>
    @empty
        não existem fornecedores cadastrados
    @endforelse
@endisset
