<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <title>Inicio</title>
</head>
<body>
    <section class="vh-100" style="background-color: #7566ff;">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-xl-10">
              <div class="card" style="border-radius: 1rem;">
                <div class="row g-0">
                  <div class="col-md-6 col-lg-5 d-none d-md-block">
                    <img src="https://img.freepik.com/vector-gratis/pequena-mujer-vertiendo-agua-limpia-grifo-paisaje-montana_74855-11024.jpg"
                      alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
                  </div>
                  <div class="col-md-6 col-lg-7 d-flex align-items-center">
                    <div class="card-body p-4 p-lg-5 text-black">
      
                      <form method="POST">
                        @csrf
                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Ingresar a Mi Cuenta</h5>
      
                        <div class="form-outline mb-4">
                          <input type="text" class="form-control form-control-lg" id="correo" name="correo"/>
                          <label class="form-label" for="form2Example17">Usuario</label>
                        </div>
      
                        <div class="form-outline mb-4">
                          <input type="password" class="form-control form-control-lg" id="contraseña" name="contraseña" spellcheck="false" autocorrect="off" autocapitalize="off"/>
                          <label for="form2Example27">Contraseña</label>
                        </div>
                        <div class="pt-1 mb-5">
                          <button class="btn btn-dark btn-lg btn-block" type="submit" style="background-color: #100d94;">Ingresar</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
</body>
</html>