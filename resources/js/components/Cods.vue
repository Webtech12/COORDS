<template>
  <div>
    <h1>LISTS</h1>

    <div class="" v-for="(cords, index) in coordinates" :key="index">
      <h3>{{ [cords.TrackNumber, cords.WGSLat, cords.WGSLong]}}</h3>
      <hr />
     
    </div>
  </div>
</template>


<script>
export default {
  data() {
    return {
      coordinates: [],
      cords: {
        WGSLat: "",
        WGSLong: "",
        TrackNumber: ""
      }
    };
  },

  created() {
    console.log("created");

    this.fetchCoordinates();
  },

  methods: {
    fetchCoordinates() {
      axios
        .get("api/getCoordinates")
        .then(res => {
          this.coordinates = res.data;
          console.log(this.coordinates);
        })
        .catch(err => {
          console.log(err);
        });
    }
  }
};
</script>


<style>
</style>