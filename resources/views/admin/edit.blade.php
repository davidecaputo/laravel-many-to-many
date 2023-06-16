@extends('layouts.app')
@section('content')
<div class="sidebar d-flex">
    <div class="sidebar-left bg-primary d-flex flex-column gap-4">
        <a class="nav-link d-flex align-items-center gap-4" href="{{route('admin.dashboard')}}">
            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
            Dashboard
        </a>
        <a class="nav-link collapsed d-flex align-items-center gap-4" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts"
            aria-expanded="false" aria-controls="collapseLayouts">
            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
            Progetti
            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
        </a>
        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
            <nav class="sb-sidenav-menu-nested nav">
                <a class="nav-link" href="{{route('admin.works.index')}}">Lavori</a>
                <a class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a>
            </nav>
        </div>
    </div>
    <div class="sidebar-right bg-dark-subtle">
        <div class="container">
            <div class="container bg-info p-5 rounded-5 my-5">
                <form action="{{ route(('admin.works.update'), $work->slug) }}" method="POST" class="text-white">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                      <label for="title" class="form-label">Titolo</label>
                      <input type="text" class="form-control" name="name" id="name" value="{{$work->name}}">
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Immagine</label>
                        <input type="text" class="form-control" name="image" id="image" value="{{$work->image}}">
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Link</label>
                        <input type="text" class="form-control" name="link" id="link" value="{{$work->link}}">
                    </div>
                    <div class="mb-3">
                        <label for="type_id" class="form-label">Tipo</label>
                        <select class="form-select" name="type_id" id="type_id">
                            <option value="">Seleziona</option>
                            @foreach ($types as $type)
                                <option value="{{ $type->id }}" @if($type->id == $work->type_id) selected @endif>{{ $type->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-floating mb-3">
                        <textarea class="form-control" placeholder="Leave a comment here" name="description" id="description" style="height: 100px">{{$work->description}}</textarea>
                        <label for="description">Descrizione</label>
                    </div>
                    <div class="mb-3">
                        <p>Linguaggi:</p>
                        <div class="d-flex flex-wrap gap-4">
                            @foreach ($languages as $language)
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" name="languages[]" id="language" value="{{$language->id}}" {{ $work->languages->contains($language) ? 'checked' : '' }}>
                                <label class="form-check-label" for="language">
                                    {{ $language->name }}
                                </label>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Invio</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
