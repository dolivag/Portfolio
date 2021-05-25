<template>
  <div class="album py-5 bg-light">
    <div class="container">
      <div class="row">
        <div class="offset-md-3">
          //
          <h2>Listado de cuadros de {{ shop.name }}</h2>
        </div>
      </div>
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <paintings-card-component
          v-for="(painting, index) in paintings"
          :painting="painting"
          :key="painting.id"
        ></paintings-card-component>
      </div>
    </div>
  </div>
</template>


<script>
import PaintingsCardComponent from "./PaintingsCardComponent";
import PaintingsFormComponent from "./PaintingsFormComponent";

export default {
  components: {
    PaintingsCardComponent,
    PaintingsFormComponent,
  },
  data() {
    return {
      paintings: [],
    };
  },
  methods: {
    newPainting(painting) {
      this.paintings.push(painting);
    },
  },
  mounted() {
    axios.get("/api/shops/" + shop.id + "/pictures").then((response) => {
      this.paintings = response.data.paintings;
    });
  },
};
</script>

<style>
</style>
