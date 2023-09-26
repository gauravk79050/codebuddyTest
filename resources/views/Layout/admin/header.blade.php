<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Laravel App</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<style>
      
       .sidebar {
      height: 100%;
      width: 250px;
      position: fixed;
      top: 0;
      left: 0;
      background-color: #111;
      padding-top: 60px;
    }

    .sidebar a {
      padding: 15px 25px;
      text-decoration: none;
      font-size: 20px;
      color: white;
      display: block;
      transition: 0.3s;
    }

    .sidebar a:hover {
      background-color: #00bcd4;
      color: black;
    }

    .content {
      margin-left: 250px;
      padding: 20px;
    }
</style>
</head> 
<body>
<div class="sidebar">
  <a href="{{url('admin')}}">Home</a>
  <a href="{{url('admin/customers')}}">Customers</a>
  <a href="{{url('admin/categories')}}">Category</a>
  <a href="{{url('admin/addCategories')}}">Add Category</a>
  <a href="{{url('logout')}}">Logout</a>
  
</div>
