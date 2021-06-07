<template>
  <h1>Ranking de la liga de Dados</h1>
  <div class="row">
    <div class="table table-dark text-center">
      <thead>
        <tr>
          <th>ESTADÍSTICAS DEL TORNEO</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th>Número de jugadores</th>
          <td>
            {{ this.users.length }}
          </td>
        </tr>
        <tr>
          <th>Porcentaje medio de victorias</th>
          <td>{{ this.avg }} %</td>
        </tr>
      </tbody>
    </div>
  </div>

  <div class="row">
    <table class="table table-dark text-center">
      <thead>
        <tr>
          <th scope="col">Posición</th>
          <th scope="col">ID de jugador</th>
          <th scope="col">Nombre del jugador</th>
          <th scope="col">Porcentaje victorias</th>
          <th scope="col">Medalla</th>
        </tr>
      </thead>
      <tbody>
        <!--Se recorre el array de users obtenido en el mounted-->
        <tr v-for="(user, index) in users" :key="user.id">
          <th scope="row">{{ index }}</th>
          <td>{{ user.id }}</td>
          <td>{{ user.name }}</td>
          <td>{{ user.success_rate }} %</td>
          <!--Dependiendo del index, se devuelve medalla de oro, plata, o bronce-->
          <td class="golden" v-if="index == 0">¡Medalla de oro!</td>
          <td class="silver" v-else-if="index == 1">Medalla de plata</td>
          <td class="bronze" v-else-if="index == 2">Medalla de bronce</td>
          <td v-else class="wooden">
            ¡Gracias por participar!<small>¡Sigue intentándolo!</small>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
export default {
  data() {
    return {
      users: [],
      avg: "",
    };
  },
  mounted() {
    axios.defaults.headers.common = {
      Authorization: "Bearer " + localStorage.getItem("token"),
    };
    axios.get("api/players/ranking").then((response) => {
      //Se parsea el json_encode (string) en un objeto de javascript
      var obj = JSON.parse(response.data.podium);
      //Se transforma el objeto en array de objetos
      for (var i in obj) {
        this.users.push(obj[i]);
      }
      //Se ordena el array de objetos por el ratio de éxito
      this.users.sort(function (a, b) {
        return b.success_rate - a.success_rate;
      });

      this.avg = response.data.avg.toFixed(2);
    });
  },
};
</script>

<style>
.golden {
  font-size: 2em;
  font-weight: 600;
  color: #ceaf01;
}

.silver {
  font-size: 1.8rem;
  font-weight: 600;
  color: #2e2e2e;
}

.bronze {
  font-size: 1.6rem;
  font-weight: 600;
  color: #99603f;
}
</style>