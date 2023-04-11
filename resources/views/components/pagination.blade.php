@if ($paginator->hasPages())

    <!-- Pagination -->
    <ul class="actions pagination">
        <li><a href="{{ $paginator->previousPageUrl() }}"><i class="fa-solid fa-arrow-left"></i></a></li>
        <li><a href="{{ $paginator->nextPageUrl() }}"><i class="fa-solid fa-arrow-right"></i></a></li>
    </ul>

@endif
