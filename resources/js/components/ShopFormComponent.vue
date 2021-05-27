<template>
  <form v-on:submit.prevent="newShop()">
    <div class="mb-3">
      <label for="name" class="form-label">Nombre de la tienda</label>
      <input type="text" class="form-control" id="name" v-model="shop.name" />
    </div>
    <div class="mb-3">
      <label for="capacity" class="form-label">Capacidad</label>
      <input
        type="number"
        min="1"
        max="100"
        class="form-control"
        id="capacity"
        v-model="shop.capacity"
      />
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</template>

<script>
let defaultShop = {
  name: "",
  capacity: "",
};

export default {
  data() {
    return {
      shop: Object.assign({}, defaultShop),
    };
  },
  methods: {
    newShop() {
      axios.defaults.headers.common = {
        Authorization: "Bearer " + localStorage.getItem("token"),
      };
      axios.post("/api/shops", this.shop).then((response) => {
        this.$emit("add", response.data.shop);
      });
      this.shop = Object.assign({}, defaultShop);
    },
  },
};
</script>
