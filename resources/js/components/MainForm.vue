<template>
  <v-form class="form-welcome" v-model="valid" :lazy-validation="lazy">
    <v-text-field
      v-model="company"
      class="mb-3"
      label="Company Name"
      placeholder="Your company's name"
      style="border-radius: 0;"
      rounded
      outlined
      :rules="companyRules"
      required
    ></v-text-field>

    <v-combobox
      class="custom-combobox mb-3"
      v-model="keyword"
      label="Keywords"
      multiple
      chips
      outlined
      deletable-chips
      style="border-radius:0"
      :rules="KeywordRules"
      required
      placeholder="Enter your keywords"
    ></v-combobox>

    <v-btn
      :disabled="!valid"
      @click="generateLogos()"
      class="float-right font-weight-medium px-5"
      color="#C0CA33"
      elevation="0"
      style="color: white"
    >SUBMIT</v-btn>
  </v-form>
</template>
<script>
export default {
  props: {
    url: String,
  },  
  data() {
    return {
      company: '',
      valid: true,
      lazy: false,
      companyRules: [
        v => !!v || 'Company name is required',
        v => v.length <= 100 || 'Name must be less than 100 characters',
      ],
      KeywordRules: [
        x => x.length > 0 || 'Keyword is required',
      ],
      keyword: [],
    };
  },
  methods: {
    generateLogos() {
      localStorage.setItem("company",this.company);
      localStorage.setItem("keyword",this.keyword);
      window.location.replace(this.url);
    },
  }
};
</script>