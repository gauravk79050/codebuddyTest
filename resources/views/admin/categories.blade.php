@extends('Layout/admin/main')

@section('content')
<style>
.subcategory {
    background-color: #f9f9f9;
    padding: 10px;
    border: 1px solid #ccc; /* Optional: Add border for visual separation */
}

.category-name {
    cursor: pointer;
    display: block;
    padding: 10px;
}

.category-name:hover {
    background-color: #e8e8e8;
}
 </style>
 <h1>Category List</h1>
@include('admin/category_tree', ['categories' => $categoryTree])

<script>
    function toggleSubcategories(categoryId) {
        let subcategories = document.getElementById('subcategories-' + categoryId);
        subcategories.style.display = subcategories.style.display === 'none' || subcategories.style.display === '' ? 'block' : 'none';
    }
</script>

@endsection