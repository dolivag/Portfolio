<template>
  <h2>Regístrate <small>¡Es gratis!</small></h2>
  <form role="form" v-on:submit.prevent="register()">
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
          <input
            type="text"
            name="name"
            class="form-control input-sm"
            placeholder="Nombre de usuario"
            v-model="user.name"
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
        v-model="user.email"
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
            v-model="user.password"
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
            v-model="user.role"
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
      ¿Ya tienes una cuenta?
      <router-link
        class="nav-link"
        data-toggle="collapse"
        :to="{ name: 'login' }"
      >
        Accede
      </router-link>
    </p>
  </form>
</template>

<script>
export default {
  data() {
    return {
      user: {
        name: "",
        email: "",
        password: "",
        role: "",
      },
    };
  },
  methods: {
    register() {
      if (this.user.name == "") {
        delete this.user.name;
      }
      axios
        .post("api/players", this.user)
        .then((response) => {
          this.user.name = response.data.user.name;
          this.user.email = response.data.user.email;
          localStorage.username = this.user.name;
          localStorage.token = response.data.token;
          localStorage.userId = response.data.user.id;
          this.$router.push({ name: "player" });
        })
        .catch((e) => {
          console.log(e, ":(");
        });
    },
  },
};
</script>

<style>
</style>