<template>
  <shop-component
    @buttonClicked="buttonClicked"
    @give-id="giveId"
  ></shop-component>
  <paintings-component
    v-bind:isMySiblingClicked="isSibling1Clicked"
    :shopId="shopId"
  ></paintings-component>
</template>

<script>
import ShopComponent from "./ShopComponent.vue";
import PaintingsComponent from "./PaintingsComponent.vue";

export default {
  components: {
    ShopComponent,
    PaintingsComponent,
    ShopComponent,
  },
  data() {
    return {
      isSibling1Clicked: false,
      shopId: 0,
    };
  },
  methods: {
    buttonClicked() {
      this.isSibling1Clicked = true;
    },
    giveId(index) {
      this.shopId = index;
      console.log(this.shopId, 5);
    },
  },
};
</script>

<style>
</style>