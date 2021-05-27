<template>
  <div class="container shops">
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <h2 class="mb-5">Añadir tienda</h2>
        <shop-form-component @add="newShop"></shop-form-component>
      </div>
    </div>
  </div>

  <div class="album py-5 bg-light">
    <div class="container">
      <div class="row">
        <div class="offset-md-3 titulo"><h2>Listado de tiendas</h2></div>
      </div>
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <shop-card-component
          v-for="(shop, index) in shops"
          :shop="shop"
          :key="shop.id"
          @delete="deleteShop(index)"
          v-on:buttonClicked="$emit('buttonClicked')"
          @giveId="giveId(shop.id)"
        ></shop-card-component>
      </div>
    </div>
  </div>
</template>

<script>
import ShopCardComponent from "./ShopCardComponent.vue";
import ShopFormComponent from "./ShopFormComponent.vue";

export default {
  components: {
    ShopCardComponent,
    ShopFormComponent,
  },
  data() {
    return {
      shops: [
        /*{
          id: "1",
          name: "Tienda1",
          capacity: "1000",
        },
        {
          id: "2",
          name: "Tienda2",
          capacity: "500",
        },*/
      ],
    };
  },
  methods: {
    newShop(shop) {
      this.shops.push(shop);
    },
    deleteShop(index) {
      this.shops.splice(index, 1);
    },
    giveId(index) {
      console.log(index, 3);
      this.$emit("giveId", index);
    },
  },
  mounted() {
    axios.defaults.headers.common = {
      Authorization: "Bearer " + localStorage.getItem("token"),
    };

    axios.get("/api/shops").then((response) => {
      this.shops = response.data.shops;
    });
  },
};
</script>

<style>
.titulo {
  margin-bottom: 3em;
}

.shops {
  margin-top: 3rem;
}
</style>
