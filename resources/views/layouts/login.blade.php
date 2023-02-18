<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo asset('css/styles.css'); ?>" type="text/css">
    <link rel="stylesheet" href="{{ url('https://cdn.jsdelivr.net/npm/sweetalert2@10.3.5/dist/sweetalert2.min.css') }}">

    <title>Inicio</title>
</head>

<body>
   
    <section class="vh-100 d-flex justify-content-center align-items-center" style="background-color: #212529;">
        <div class="col-lg-3 ml-3  d-flex align-items-center justify-content-center">

            <img src="{{ asset('images/Logo.png') }}" alt="login form" class="img-fluid"
                style="border-radius: 1rem 0 0 1rem;"/>

        </div>
        <div class="card shadow col-lg-4" style="border-radius: 1rem;">
            <div class="row d-flex">

                <div class=" col-lg-12 d-flex align-items-center">
                    <div class="card-body p-4 p-lg-5 text-black">

                        <form action="/iniciar-sesion" method="POST">
                            @csrf
                            <h3 class="fw-normal mb-3 fs-3 pb-3 fw-bold" style="letter-spacing: 1px;">Ingresar a Mi
                                Cuenta</h3>

                            <div class="form-outline mb-4">
                                <label class="form-label" for="form2Example17">Usuario</label>
                                <input type="text" class="form-control form-control-lg" id="correo"
                                    name="correo" />
                            </div>

                            <div class="form-outline mb-4">
                                <label for="form2Example27">Contraseña</label>
                                <input type="password" class="form-control form-control-lg" id="contraseña"
                                    name="contraseña" spellcheck="false" autocorrect="off" autocapitalize="off" />

                            </div>
                            <div class="pt-1 mb-5">
                                <button class="btn btn-dark btn-lg btn-block" type="submit"
                                    style="background-color: #5f9d48; border-color: #5f9d48;">Ingresar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <script src="{{ url('https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js') }}"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
    <script src="{{ url('https://code.jquery.com/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ url('https://cdn.jsdelivr.net/npm/sweetalert2@10.3.5/dist/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>

    @if (session()->has('alert'))
        <script>
            Toast.fire({
                icon: "{{ session()->get('alert')['type'] }}",
                title: "{{ session()->get('alert')['message'] }}",
            });

            @php
                session()->forget('alert');
            @endphp
        </script>
    @endif
</body>

</html>
