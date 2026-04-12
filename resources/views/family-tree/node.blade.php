<div x-data="{ open: {{ $level < 2 ? 'true' : 'false' }} }" class="{{ $level > 0 ? 'mr-6 border-r-2 border-primary/20 pr-4' : '' }}">

    {{-- NODE --}}
    <div @click="open = !open" x-show="!$root.search || '{{ $node->name }}'.includes($root.search)"
        class="flex items-center gap-2 py-2 px-3 rounded-lg cursor-pointer hover:bg-muted">

        {{-- ARROW --}}
        @if ($node->childrenRecursive->count() > 0)
            <span class="text-muted-foreground">
                <span x-show="open">▼</span>
                <span x-show="!open">◀</span>
            </span>
        @endif

        {{-- NAME --}}
        <span class="font-medium text-foreground">
            {{ $node->name }}
        </span>

    </div>

    {{-- CHILDREN --}}
    @if ($node->childrenRecursive->count() > 0)
        <div x-show="open" x-transition>
            @foreach ($node->childrenRecursive as $child)
                @include('family-tree.node', [
                    'node' => $child,
                    'level' => $level + 1,
                ])
            @endforeach
        </div>
    @endif

</div>
