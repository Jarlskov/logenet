@foreach ($messages as $severity => $list)
    @if (!empty($severity))
        @foreach ($list as $message)
            <div class="alert alert-{{ $severity }}">
                {{ $message }}
            </div>
        @endforeach
    @endif
@endforeach
