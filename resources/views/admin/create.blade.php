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
            <h1 class="text-center py-4">Inscerisci un nuovo lavoro</h1>
            <div class="container bg-success p-5 rounded-5 mb-5">
                <form action="{{ route('admin.works.store') }}" method="POST" class="text-white">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nome</label>
                        <input type="text" class="form-control" name="name" id="name">
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Immagine</label>
                        <input type="text" class="form-control" name="image" id="image">
                    </div>
                    <div class="mb-3">
                        <label for="link" class="form-label">Link</label>
                        <input type="text" class="form-control" name="link" id="link">
                    </div>
                    <div class="mb-3">
                        <label for="type_id" class="form-label">Tipo</label>
                        <select class="form-select" name="type_id" id="type_id">
                            <option value="" selected>Seleziona</option>
                            @foreach ($types as $type)
                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-floating mb-3">
                        <textarea class="form-control" placeholder="Leave a comment here" name="description" id="description"
                            style="height: 100px"></textarea>
                        <label for="description">Descrizione</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Invio</button>
                    <button type="reset" class="btn btn-primary">Reset</button>
                </form>
            </div>
        </div>
    </div>
@endsection
