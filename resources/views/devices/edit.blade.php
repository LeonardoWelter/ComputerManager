@extends('layouts.app')

@section('title', 'Edit device')

@section('content')
<div class="antialiased" onclick="document.getElementById('dropdown').hidden = true">
    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="d-flex card-login justify-content-center">
                <div class="card">
                    <div class="card-header text-center">
                        Editar computador
                    </div>
                    <div class="card-body">
                        <form action='/api/device/3' method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="serial">Serial</label>
                                <input class="form-control" type="number" name="serial" placeholder="000001" id="serial" required>
                            </div>
                            <div class="form-group">
                                <label for="oem">Marca</label>
                                <input class="form-control" type="text" name="oem" placeholder="Lenovo" id="oem" required>
                            </div>
                            <div class="form-group">
                                <label for="model">Modelo</label>
                                <input class="form-control" type="text" name="model" placeholder="M92p" id="model" required>
                            </div>
                            <div class="form-group">
                                <label for="cpu">CPU</label>
                                <input class="form-control" type="text" name="cpu" placeholder="i7 3700" id="cpu" required>
                            </div>
                            <div class="form-group">
                                <label for="ram">RAM</label>
                                <input class="form-control" type="text" name="ram" placeholder="16GB DDR3 1333MHz" id="ram" required>
                            </div>
                            <div class="form-group">
                                <label for="storage">Armazenamento</label>
                                <input class="form-control" type="text" name="storage" placeholder="1TB 7200RPM" id="storage" required>
                            </div>
                            <div class="form-group">
                                <label for="psu">Fonte</label>
                                <input class="form-control" type="text" name="psu" placeholder="400W" id="psu" required>
                            </div>
                            <div class="form-group">
                                <label for="mac">MAC</label>
                                <input class="form-control" type="text" name="mac" placeholder="0000:0000:0000:0000" id="mac" required>
                            </div>
                            <div class="form-group">
                                <label for="name">Nome</label>
                                <input class="form-control" type="text" name="name" placeholder="PC-REI-18872" id="name" required>
                            </div>
                            <div class="form-group">
                                <label for="os">OS</label>
                                <input class="form-control" type="text" name="os" placeholder="Windows 10" id="os" required>
                            </div>
                            <input class="btn btn-block btn-primary" type="submit" value="Criar">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection