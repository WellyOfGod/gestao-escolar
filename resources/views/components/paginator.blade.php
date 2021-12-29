<nav>
    <ul class="pagination">
        <li @class([
                 'page-item',
                 'disabled' => $paginator->onFirstPage()
            ])>
            <a class="page-link" href="{{ $paginator->previousPageUrl() }}"
               tabindex="-1">
                Anterior
            </a>
        </li>
        @foreach($paginator->getUrlRange(1, $paginator->lastPage()) as $page => $url)
            <li @class([
                    'page-item',
                    'active' => $page === $paginator->currentPage()
                ])>
                <a class="page-link" href="{{ $url }}"
                   tabindex="{{ $page }}">
                    {{ $page }}
                </a>
            </li>
        @endforeach
        <li @class([
                'page-item',
                'disabled' => $paginator->currentPage() === $paginator->lastPage()
            ])>
            <a class="page-link" href="{{ $paginator->nextPageUrl() }}"
               tabindex="{{ $paginator->lastPage() }}">
                Próximo
            </a>
        </li>
    </ul>
</nav>
