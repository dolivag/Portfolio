<template>
  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <button
          type="button"
          class="navbar-toggle"
          data-toggle="collapse"
          data-target="#myNavbar"
        >
          <span class="icon-bar"> </span>
          <span class="icon-bar"> </span>
          <span class="icon-bar"> </span>
        </button>
        <a class="navbar-brand" href="#">{{ username }}</a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
          <li><a href="/">Portada</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li class="nav-item">
            <router-link
              class="nav-link"
              :to="{ name: 'register' }"
              v-if="!loggedIn"
            >
              Regístrate
            </router-link>
          </li>
          <li class="nav-item">
            <router-link
              v-if="!loggedIn"
              class="nav-link"
              data-toggle="collapse"
              :to="{ name: 'login' }"
              @loggedIn="logIn"
            >
              Inicia sesión
            </router-link>
          </li>
        </ul>

        <!--Botón de Log Out cuando hay sesión iniciada-->
        <ul class="nav navbar-nav navbar-right">
          <div class="d-flex">
            <button
              v-if="loggedIn"
              class="btn btn-outline-light mt-4"
              type="submit"
              v-on:click="logout"
            >
              Log Out
            </button>
          </div>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container">
    <router-view></router-view>
    <player-component v-if="loggedIn"></player-component>
  </div>
</template>

<script>
import PlayerComponent from "./PlayerComponent.vue";
export default {
  components: {
    "player-component": PlayerComponent,
  },
  data() {
    return {
      loggedIn: false,
      username: "",
    };
  },
  watch: {
    $route() {
      if (localStorage.getItem("username")) {
        this.username = localStorage.getItem("username");
        this.loggedIn = true;
      } else {
        this.username = "";
      }
    },
  },
  methods: {
    logout() {
      axios.defaults.headers.common = {
        Authorization: "Bearer " + localStorage.getItem("token"),
      };
      localStorage.clear();
      axios.post("api/logout").then(() => {
        localStorage.clear();
        this.loggedIn = false;
        this.username = "";
        this.$router.push({ name: "player" });
      });
    },
    logIn() {
      this.loggedIn = true;
    },
  },
  mounted() {
    if (localStorage.getItem("token")) {
      //colocamos el bearer token
      axios.defaults.headers.common = {
        Authorization: "Bearer " + localStorage.getItem("player_token"),
      };
      //refresca el token
      axios.post("api/refresh/").then((response) => {
        console.log(response.data.token, "RETOKENNNN");
        if (response.data.success) {
          localStorage.setItem("token", response.data.token);
        } else {
          localStorage.clear();
          this.loggedIn = false;
        }
      });
    } else {
      this.loggedIn = false;
    }
  },
};
</script>

