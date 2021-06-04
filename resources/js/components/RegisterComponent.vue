<template>
  <form role="form" action="{{ route('register') }}" method="post">
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
          <input
            type="text"
            name="name"
            id="name"
            class="form-control input-sm"
            placeholder="Nombre de usuario"
          />
        </div>
      </div>
    </div>

    <div class="form-group">
      <input
        type="email"
        name="email"
        id="email"
        class="form-control input-sm"
        placeholder="Correo electrónico"
      />
    </div>

    <div class="row">
      <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
          <input
            type="password"
            name="password"
            id="password"
            class="form-control input-sm"
            placeholder="Contraseña"
          />
        </div>
      </div>
      <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
          <input
            type="password"
            name="password_confirmation"
            id="password_confirmation"
            class="form-control input-sm"
            placeholder="Confirma tu contraseña"
          />
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
          <label for="role">Rol</label>
          <select
            class="form-select form-control imput-sm"
            id="role"
            name="role"
            required
          >
            <option value="administrador">Administrador</option>
            <option value="usuario">Usuario</option>
          </select>
        </div>
      </div>
    </div>

    <input type="submit" value="Registro" class="btn btn-info btn-block" />
    <br />
    <p class="text-center">
      ¿Ya tienes una cuenta? <a href="/login">Accede</a>
    </p>
  </form>
</template>

<script>
export default {};
</script>

<style>
</style>