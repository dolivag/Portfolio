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
        <ul class="nav navbar-nav navbar-left">
          <li class="nav-item">
            <router-link
              tag="button"
              class="nav-item"
              :to="{ name: 'ranking' }"
              v-if="loggedIn"
            >
              Ranking
            </router-link>
          </li>
          <li class="nav-item">
            <!--Enlace de Jugar solo disponible cuando se está logueado-->
            <router-link
              class="nav-item"
              :to="{ name: 'player' }"
              v-if="$router.currentRoute.name != 'player' && loggedIn"
            >
              ¡Jugar!
            </router-link>
          </li>
          <!--Los dos enlaces de debajo se muestran solo cuando isAdmin es true, es decir, cuando el usuario logueado tiene en back rol de Administrador-->
          <li class="nav-item">
            <router-link
              class="nav-item"
              :to="{ name: 'winner' }"
              v-if="isAdmin == 'true'"
            >
              ¿Quién es el ganador?
            </router-link>
          </li>
          <li class="nav-item">
            <router-link
              class="nav-item"
              :to="{ name: 'looser' }"
              v-if="isAdmin == 'true'"
            >
              ¿Quién es el perdedor?
            </router-link>
          </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li class="nav-item">
            <!--Link para el path Register cuando no se tiene sesión iniciada-->
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
              :to="{ name: 'login' }"
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
  </div>
</template>

<script>
import PlayerComponent from "./PlayerComponent.vue";
import RankingComponent from "./RankingComponent.vue";
export default {
  components: {
    "player-component": PlayerComponent,
    "ranking-component": RankingComponent,
  },
  data() {
    return {
      loggedIn: false,
      username: "",
      isAdmin: localStorage.getItem("isAdmin"),
    };
  },
  watch: {
    $route() {
      if (localStorage.getItem("username")) {
        this.username = localStorage.getItem("username");
        this.loggedIn = true;
        this.isAdmin = localStorage.getItem("isAdmin");
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
        this.isAdmin = false;
        this.$router.push({ name: "login" });
      });
    },
  },
  mounted() {
    console.log(localStorage.getItem("token"));
    console.log(localStorage.getItem("isAdmin"), ":DDDDDDDDDDDDDDDDDDDDDDD");
    this.isAdmin = localStorage.getItem("isAdmin");
    if (localStorage.getItem("token")) {
      axios.defaults.headers.common = {
        Authorization: "Bearer " + localStorage.getItem("token"),
      };
      axios.post("api/refresh").then((response) => {
        if (response.data.success) {
          localStorage.setItem("token", response.data.token);
          this.loggedIn = true;
          this.isAdmin = localStorage.getItem("isAdmin");
          console.log(this.isAdmin);
          this.$router.push({ name: "player" });
        } else {
          localStorage.clear();
          this.loggedIn = false;
          this.isAdmin = false;
        }
      });
    } else {
      this.loggedIn = false;
    }
  },
};
</script>

