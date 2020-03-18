<template>
  <v-container fluid class="main-card pa-0">
    <v-card color="#3F51B5" style="height: 450px" elevation=0 tile>
      <v-list-item-content>
        <v-list-item-title  class="display-3 mb-6 text-center font-weight-light" style="color:white;height: 4rem;margin-top: 60px" v-text="title"></v-list-item-title>
        <v-list-item-subtitle class="subtitle-1 text-center font-weight-light" style="opacity: 70%;color:white;" v-html="subtitle"></v-list-item-subtitle>
      </v-list-item-content>
    </v-card>
  </v-container>
</template>

<script>
export default {
  props: {
    title: String,
    subtitle: String
  },
};
</script>