<template>
  <div>
    <!-- Desktop Menu -->
    <div style="background:#303F9F">
      <v-container class="pa-0" style="max-width:70%">
        <v-toolbar flat v-if="window.width > 800" class="toolbar-custom" color="#303F9F" dark>
          <v-toolbar-title class="logo-title pa-0">
            <img src="/storage/logo-maker.svg" />
          </v-toolbar-title>

          <v-spacer></v-spacer>

          <v-toolbar-items>
            <v-btn
              text
              :href="'#'+link.label"
              v-for="(link, key) in links"
              v-bind:key="key"
              v-text="link.label"
              style="line-height: 16px;letter-spacing: 0.046875rem;"
            ></v-btn>
          </v-toolbar-items>
        </v-toolbar>
      </v-container>
    </div>

    <!-- Mobile Menu -->
    <v-navigation-drawer v-if="window.width <= 800" v-model="drawer" app clipped>
      <v-list dense>
        <v-list-item link v-for="(link, key) in links" v-bind:key="key" :href="'#'+link.label">
          <v-list-item-action>
            <v-icon v-text="link.icon"></v-icon>
          </v-list-item-action>
          <v-list-item-content>
            <v-list-item-title v-text="link.label"></v-list-item-title>
          </v-list-item-content>
        </v-list-item>
      </v-list>
    </v-navigation-drawer>
    <v-app-bar v-if="window.width <= 800" app clipped-left color="#303F9F" dark>
      <v-app-bar-nav-icon @click.stop="drawer = !drawer" />
      <v-toolbar-title class="logo-title">
        <img src="/storage/logo-maker.svg" />
      </v-toolbar-title>
    </v-app-bar>
  </div>
</template>

<script>
export default {
  data: function() {
    return {
      window: {
        width: 0,
        height: 0
      },
      title: "Filipe Cruz",
      titleMobile: "Filipe Cruz",
      drawer: null,
      links: [
        {
          icon: "mdi-briefcase-account",
          label: "About"
        },
        {
          icon: "mdi-email",
          label: "Contact"
        }
      ]
    };
  },
  created() {
    window.addEventListener("resize", this.handleResize);
    this.handleResize();
  },
  destroyed() {
    window.removeEventListener("resize", this.handleResize);
  },
  methods: {
    handleResize() {
      this.window.width = window.innerWidth;
      this.window.height = window.innerHeight;
    }
  }
};
</script>

<style>
.v-navigation-drawer,
.v-overlay {
  z-index: 2 !important;
}
.v-navigation-drawer--clipped {
  top: 55px !important;
  z-index: 1;
}
.v-list-item__content {
  text-align: left;
}
.v-toolbar__title {
  font-size: 0;
}
</style>