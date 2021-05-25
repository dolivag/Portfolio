<template>
  <form v-on:submit.prevent="newPainting()">
    <div class="mb-3">
      <label for="author" class="form-label">Autor del cuadro</label>
      <input
        type="text"
        class="form-control"
        id="author"
        v-model="painting.author"
      />
    </div>
    <div class="mb-3">
      <label for="name" class="form-label">Nombre del cuadro</label>
      <input
        type="text"
        class="form-control"
        id="name"
        v-model="painting.name"
      />
    </div>
    <div class="mb-3">
      <label for="name" class="form-label">Nombre del cuadro</label>
      <input
        type="text"
        class="form-control"
        id="name"
        v-model="painting.name"
      />
    </div>
    <div class="mb-3">
      <label for="price" class="form-label">Precio</label>
      <input
        type="number"
        min="1"
        step="0.01"
        class="form-control"
        id="price"
        v-model="painting.price"
      />
    </div>
    <div class="mb-3">
      <label for="arrive_shop" class="form-label">Llegada a la tienda</label>
      <input
        type="date"
        class="form-control"
        id="arrive_shop"
        v-model="painting.arrive_shop"
      />
    </div>

    <button type="submit" class="btn btn-primary">Añadir</button>
  </form>
</template>