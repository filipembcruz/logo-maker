<template>
  <v-btn
    class="float-right font-weight-medium px-5"
    color="#3F51B5"
    style="letter-spacing: 0.75px;"
    elevation="0"
    @click="moreLogos"
    dark
  ><slot></slot></v-btn>
</template>

<script>
export default {
  methods: {
    moreLogos() {
      this.$root.$emit('updateIcons')
    }
  }
};
</script>
      