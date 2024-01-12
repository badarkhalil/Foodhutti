
@if ($paginator->hasPages())


<ul class="pagination pagination-primary">

    @if ($paginator->onFirstPage())
        <li class="page-item "><a  class="page-link" rel="prev">Previous</a></li>
    @else
        <li class="page-item"><a href="{{ $paginator->previousPageUrl() }}" class="page-link active" rel="prev">Previous</a></li>
    @endif

    @foreach ($elements as $element)

    @if (is_string($element))
        <li class="disabled"><span>{{ $element }}</span></li>
    @endif



    @if (is_array($element))
        @foreach ($element as $page => $url)
            @if ($page == $paginator->currentPage())
                <li class="page-item active "><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
            @else
                <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
            @endif
        @endforeach
    @endif
@endforeach


    @if ($paginator->hasMorePages())
    <li class="page-item"><a href="{{ $paginator->nextPageUrl() }}" class="page-link " rel="next">Next</a></li>
@else
    <li class="page-item "><a class="page-link " rel="next">Next</a></li>
@endif
</ul>
@endif
