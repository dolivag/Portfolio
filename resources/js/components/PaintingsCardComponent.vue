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
          {{ painting.name }}
        </text>
      </svg>

      <div class="card-body">
        <h3 class="card-text">{{ painting.name }}</h3>
        <p>Author: {{ painting.author }}</p>
        <p>Fecha de llegada: {{ painting.arrive_shop }}</p>
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
              disabled
              class="btn btn-sm btn-outline-secondary"
            >
              Delete
            </button>
          </div>

          <small class="text-muted">Precio: {{ painting.price }} €</small>
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
      required: false,
    },
    painting: {
      type: Object,
      required: false,
    },
  },
  data() {
    return {};
  },
  methods: {},
  watch: {},
};
</script>