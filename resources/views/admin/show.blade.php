@extends('layouts.app')
@section('content')
    <div class="sidebar d-flex">
        <div class="sidebar-left bg-primary d-flex flex-column gap-4">
            <a class="nav-link d-flex align-items-center gap-4" href="{{ route('admin.dashboard') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Dashboard
            </a>
            <a class="nav-link collapsed d-flex align-items-center gap-4" href="#" data-bs-toggle="collapse"
                data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                Progetti
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="{{ route('admin.works.index') }}">Lavori</a>
                    <a class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a>
                </nav>
            </div>
        </div>
        <div class="sidebar-right bg-dark-subtle">
            <div class="container p-5 d-flex flex-column align-items-center">
                @if (session()->has('message'))
                    <div class="alert alert-success" role="alert">
                        {{ session()->get('message') }}
                    </div>
                @endif
                <div class="mb-5">
                    <a href="{{ url('/admin') }}" class="btn btn-dark me-4">Dashboard</a>
                    <a href="{{ route('admin.works.index') }}" class="btn btn-success">Torna ai Lavori</a>
                </div>
                <div class="card w-50">
                    <img src="{{ $work->image }}" alt="{{ $work->name }}">
                    <div class="card-body">
                        <p>{{ $work->name }}</p>
                        <p>{{ $work->description }}</p>
                        @if ($work->type_id)
                        <p>{{$work->type->name}}</p>
                        @endif
                        <a href="{{ $work->link }}" class="text-primary d-block">{{ $work->link }}</a>
                        <a href="{{ route('admin.works.edit', $work->slug) }}" class="text-primary"><i
                                class="fa-regular fa-pen-to-square me-2"></i></a>
                        <form action="{{ route('admin.works.destroy', $work->slug) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn fs-4 p-0 mb-2"><i class="fa-regular fa-trash-can"
                                    style="color: #e90c0c;"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
