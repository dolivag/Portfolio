<template>
  <h2>Inicia sesión <small>¡Y empieza a jugar!</small></h2>
  <form class="py-3" v-on:submit.prevent="login()">
    <div class="form-group py-3">
      <label for="email">Email</label>
      <input
        type="email"
        class="form-control"
        id="email"
        aria-describedby="emailHelp"
        placeholder="jugador@dedados.com"
        v-model="user.email"
      />
      <small id="emailHelp" class="form-text text-muted"
        >Nunca compartiremos tu mail con nadie sin tu permiso</small
      >
    </div>
    <div class="form-group">
      <label for="password">Contraseña</label>
      <input
        type="password"
        class="form-control"
        id="password"
        placeholder="Password"
        v-model="user.password"
      />
    </div>
    <div class="form-check">
      <input
        type="checkbox"
        class="form-check-input"
        id="remember"
        v-model="user.remember"
      />
      <label class="form-check-label" for="remember">Recuérdame</label>
    </div>
    <button type="submit" class="btn btn-primary">Enviar</button>
  </form>
</template>

<script>
export default {
  data() {
    return {
      user: {
        email: "",
        password: "",
        remember: false,
      },
      isAdmin: localStorage.getItem("isAdmin"),
    };
  },
  methods: {
    login() {
      axios.post("/api/login", this.user).then((response) => {
        localStorage.username = response.data.user.name;
        localStorage.token = response.data.token;
        localStorage.setItem("isAdmin", response.data.user.isAdmin);
        this.isAdmin = localStorage.getItem("isAdmin");
        console.log(localStorage.getItem("isAdmin"), "PRUEBA");
        localStorage.userId = response.data.user.id;
        this.$router.push({ name: "player" });
      });
    },
  },
};
</script>

<style>
</style>