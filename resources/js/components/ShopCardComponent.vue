<template>
  <div class="col">
    <div class="card shadow-sm">
      <svg
        class="bd-placeholder-img card-img-top"
        width="100%"
        height="225"
        xmlns="http://www.w3.org/2000/svg"
        role="img"
        aria-label="Placeholder: Thumbnail"
        preserveAspectRatio="xMidYMid slice"
        focusable="false"
      >
        <title>Placeholder</title>
        <rect width="100%" height="100%" fill="#55595c"></rect>
        <text
          x="50%"
          y="50%"
          alignment-baseline="middle"
          text-anchor="middle"
          font-size="150%"
          fill="#eceeef"
          dy=".3em"
        >
          {{ shop.name }}
        </text>
      </svg>

      <div class="card-body">
        <h3 class="card-text">{{ shop.name }}</h3>
        <div class="d-flex justify-content-between align-items-center">
          <div class="btn-group">
            <button
              disabled
              type="button"
              class="btn btn-sm btn-outline-secondary"
            >
              Edit
            </button>
            <button
              type="button"
              v-on:click="deleteShop"
              class="btn btn-sm btn-outline-secondary"
            >
              Delete
            </button>
          </div>
          <button
            type="button"
            v-on:click="buttonClicked"
            class="btn btn-sm btn-outline-secondary"
          >
            VER
          </button>
          <small class="text-muted">Capacidad: {{ shop.capacity }}</small>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    shop: {
      type: Object,
      required: true,
    },
  },
  data() {
    return {};
  },
  methods: {
    deleteShop() {
      axios.defaults.headers.common = {
        Authorization: "Bearer " + localStorage.getItem("token"),
      };
      axios.delete("/api/shops/" + this.shop.id).then(() => {
        this.$emit("delete");
      });
    },
    seePaintings() {
      this.$emit("seePaintings");
    },
    buttonClicked() {
      this.$emit("buttonClicked");
      this.$emit("giveId");
    },
  },
};
</script>
