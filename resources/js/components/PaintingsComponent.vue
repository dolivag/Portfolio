<template>
  <div v-if="validate">
    <div class="album py-5 bg-light">
      <div class="container">
        <div class="row">
          <div class="offset-md-3 titulo"><h2>Listado de cuadros</h2></div>
        </div>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
          <paintings-card-component
            v-for="painting in paintings"
            :painting="painting"
            :key="painting.id"
          ></paintings-card-component>
        </div>
        <div class="boton">
          <button
            type="button"
            v-on:click="burnAll"
            class="btn btn-primary btn-lg btn-block"
          >
            Quemar los cuadros
          </button>
        </div>
      </div>
    </div>
  </div>
</template>


<script>
import PaintingsCardComponent from "./PaintingsCardComponent";
import PaintingsFormComponent from "./PaintingsFormComponent";

export default {
  props: {
    isMySiblingClicked: {
      type: Boolean,
      default: false,
    },
    shopId: {
      type: Number,
      default: 0,
    },
  },
  components: {
    PaintingsCardComponent,
    PaintingsFormComponent,
  },
  watch: {
    shopId: function (val) {
      axios.defaults.headers.common = {
        Authorization: "Bearer " + localStorage.getItem("token"),
      };
      axios.get("/api/shops/" + this.shopId + "/pictures").then((response) => {
        console.log(this.paintings);
        this.paintings = response.data.paintings;
        this.validate = true;
      });
    },
    isMySiblingClicked: function (val) {
      this.validate = val;
    },
  },
  data() {
    return {
      paintings: [],
      validate: false,
    };
  },
  methods: {
    burnAll() {
      axios.defaults.headers.common = {
        Authorization: "Bearer " + localStorage.getItem("token"),
      };
      console.log(this.shopId, ":D");
      axios.delete("api/shops/" + this.shopId + "/pictures").then(() => {
        this.paintings = null;
        this.validate = false;
      });
    },
  },
  mounted() {},
};
</script>

<style>
.titulo {
  margin-bottom: 3em;
}

.boton {
  margin-top: 2em;
}

.paintings {
  background-color: #666666;
}
</style>
