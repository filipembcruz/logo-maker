<template>
  <v-row class="px-5">
    <v-col cols="12" md="4" sm="6" v-for="(item,key) in items" :key="key" class="pa-5">
      <v-card class="card-logo pt-8 pb-5" outlined>
        <v-img :src="item.icon" width="80" height="80" class="mx-auto" sizes></v-img>
        <v-card-subtitle class="card-logo text-center" v-text="item.name"></v-card-subtitle>
      </v-card>
    </v-col>
  </v-row>
</template>

<script>
export default {
  data() {
    return {
      items: [
        {
          icon:
            "https://icons.iconarchive.com/icons/graphicloads/100-flat/256/home-icon.png",
          name: "Coffe Shop"
        },
        {
          icon:
            "https://icons.iconarchive.com/icons/graphicloads/100-flat/256/home-icon.png",
          name: "Coffe Shop"
        },
        {
          icon:
            "https://icons.iconarchive.com/icons/graphicloads/100-flat/256/home-icon.png",
          name: "Coffe Shop"
        },
        {
          icon:
            "https://icons.iconarchive.com/icons/graphicloads/100-flat/256/home-icon.png",
          name: "Coffe Shop"
        },
        {
          icon:
            "https://icons.iconarchive.com/icons/graphicloads/100-flat/256/home-icon.png",
          name: "Coffe Shop"
        },
        {
          icon:
            "https://icons.iconarchive.com/icons/graphicloads/100-flat/256/home-icon.png",
          name: "Coffe Shop"
        }
      ]
    };
  }
};
</script>

<style>
.v-card__subtitle.card-logo {
  font-family: "Quicksand", sans-serif;
  font-weight: bold;
  font-size: 24px;
  line-height: 30px;
  color: #000000 !important;
}
</style>