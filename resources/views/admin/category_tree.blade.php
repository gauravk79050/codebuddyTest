<div class="category-tree">
    @foreach ($categories as $category)
        <div class="category">
            @php
                $hasSubcategories = !empty($category['subcategories']);
            @endphp
            <span class="category-name" data-toggle="{{ $hasSubcategories ? 'collapse' : '' }}" href="{{ $hasSubcategories ? '#subcategories-'.$category['id'] : '' }}" role="button" aria-expanded="{{ $hasSubcategories ? 'true' : 'false' }}">
                <i class="fas {{ $hasSubcategories ? 'fa-caret-down' : 'fa-caret-right' }}"></i>
                {{ $category['name'] }}
            </span>
        </div>
        @if ($hasSubcategories)
            <div id="subcategories-{{ $category['id'] }}" class="collapse subcategory" style="background-color: #f9f9f9; padding: 10px;">
                @include('admin/category_tree', ['categories' => $category['subcategories']])
            </div>
        @endif
    @endforeach
</div>
