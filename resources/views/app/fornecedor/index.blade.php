<h3>Fornecedor</h3>

@php


@endphp


@isset($fornecedores)

    @forelse ($fornecedores as $indice => $fornecedor)

        Fornecedor: {{ $fornecedores[$i]['nome'] }}
        <br>
        Status: {{ $fornecedores[$i]['status'] }}
        <br>
        CNPJ: {{ $fornecedores[$i]['CNPJ'] ?? 'CNPJ NÃO INFORMADO' }}
        <br>
        Telefone: {{ $fornecedores[$i]['telefone'] ?? ''}}
        <br>
        DDD: {{$fornecedores[$i]['ddd'] ?? ''}}
        <hr>
    @empty
        não existem fornecedores cadastrados
    @endforelse
@endisset
