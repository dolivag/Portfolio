<template>
  <div class="container text-center">
    <h3>El jugador que mejor porcentaje de victorias tiene es :</h3>
    <h1 class="winner">{{ user.name }}</h1>
    <h3>con un</h3>
    <h1 class="winner">{{ user.success_rate }} %</h1>
    <h3>de éxito</h3>
  </div>
</template>

<script>
export default {
  data() {
    return {
      user: {
        name: "",
        success_rate: "",
      },
    };
  },
  mounted() {
    axios.defaults.headers.common = {
      Authorization: "Bearer " + localStorage.getItem("token"),
    };
    axios.get("api/players/ranking/winner").then((response) => {
      console.log(response);
      this.user.name = response.data.podium.name;
      this.user.success_rate = response.data.podium.success_rate;
    });
  },
};
</script>

<style>
.winner {
  color: green;
  font-weight: 600;
}
</style>