@extends('layouts.app')

@section('content')
<div class="container">
    <p class="d-inline-flex gap-1">
        <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample" onclick="init();">
            เปิดแผนที่
        </a>
        <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample2" role="button" aria-expanded="false" aria-controls="collapseExample">
            เปิดรายการไฟล์
        </a>
    </p>
</div>



<div class="collapse" id="collapseExample">
    <main class="app-main">
        <div class="app-content">
            <div class="container-fluid">

            </div>
    </main>

</div>

<div class="collapse" id="collapseExample2">
    <file-component :file-name='{!! json_encode($files) !!}'></file-component>
</div>

@endsection