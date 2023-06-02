@if ($paginator->lastPage() != 1)
    <div id="pagination">

        <!-- Link alla prima pagina -->
        @if (!$paginator->onFirstPage())
            <a href="{{ $paginator->url(1) }}">Torna all'inizio</a> |
        @else
            Vai all'inizio |
        @endif

        <!-- Link alla pagina precedente -->
        @if ($paginator->currentPage() != 1)
            <a href="{{ $paginator->previousPageUrl() }}">&lt; Precedente</a> |
        @else
            &lt; Precedente |
        @endif

        <!-- Link alla pagina successiva -->
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}">Successivo &gt;</a> |
        @else
            Successivo &gt; |
        @endif

        <!-- Link all'ultima pagina -->
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->url($paginator->lastPage()) }}">Vai alla fine</a>
        @else
            Vai alla fine
        @endif
    </div>
@endif
