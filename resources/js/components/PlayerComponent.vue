<template>
  <div class="container">
    <h1>Info del jugador</h1>
  </div>

  <div class="row">
    <div class="col-md-6">
      <table class="table table-dark">
        <tbody>
          <tr>
            <th scope="row">ID</th>
            <td>{{ player_id }}</td>
          </tr>
          <tr>
            <th scope="row">Nombre</th>
            <td>{{ player_name }}</td>
          </tr>
          <tr>
            <th scope="row">Número de partidas</th>
            <td>{{ rolls.length }}</td>
          </tr>
          <tr>
            <th scope="row">Número de victorias</th>
            <td>{{ victories }}</td>
          </tr>
          <tr>
            <th scope="row">Porcentaje de victorias</th>
            <td>{{ success_rate }} %</td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="col-md-6">
      <div class="row">
        <div class="buttons">
          <button class="btn btn-success m-2 btn-lg" v-on:click="newRoll">
            Lanza los dados
          </button>
          <button class="btn btn-danger" v-on:click="deleteRolls">
            Borra las jugadas
          </button>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <img v-bind:src="'/images/dado-' + dado1 + '.svg'" alt="" />
        </div>
        <div class="col-md-6">
          <img v-bind:src="'/images/dado-' + dado2 + '.svg'" alt="" />
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <table class="table table-dark">
      <thead>
        <tr>
          <th scope="col">Nº de jugada</th>
          <th scope="col">Resultado dado 1</th>
          <th scope="col">Resultado dado 2</th>
          <th scope="col">Suma</th>
          <th scope="col">¿Victoria?</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="roll in rolls" :key="roll.id">
          <th scope="row">{{ roll.id }}</th>
          <td>{{ roll.dice1 }}</td>
          <td>{{ roll.dice2 }}</td>
          <td>{{ roll.dice1 + roll.dice2 }}</td>
          <td v-if="roll.victory == 1" class="victory">¡Victoria!</td>
          <td v-else class="defeat">¡Derrota!</td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
export default {
  data() {
    return {
      dado1: "0",
      dado2: "0",
      player_id: localStorage.getItem("userId"),
      player_name: localStorage.getItem("username"),
      success_rate: "",
      rolls: [],
      victories: "",
    };
  },
  mounted() {
    axios.defaults.headers.common = {
      Authorization: "Bearer " + localStorage.getItem("token"),
    };
    axios.get("api/players/" + this.player_id + "/games").then((response) => {
      this.success_rate = response.data.user.success_rate.toFixed(2);
      this.rolls = response.data.rolls;
      var n = this.rolls.filter((val) => {
        return val.victory == 1;
      }).length;
      this.victories = n;
    });
  },
  methods: {
    newRoll() {
      axios
        .post("api/players/" + this.player_id + "/games")
        .then((response) => {
          this.dado1 = response.data.roll.dice1;
          this.dado2 = response.data.roll.dice2;
          this.success_rate = response.data.user.success_rate.toFixed(2);
          this.rolls = response.data.rolls;
          var n = this.rolls.filter((val) => {
            return val.victory == 1;
          }).length;
          this.victories = n;
        });
    },
  },
};
</script>


<style>
</style>