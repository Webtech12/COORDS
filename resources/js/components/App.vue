<template>
  <div>
    <div class="col-md-9">
      <!-- The map goes here -->
      <div id="map" class="map"></div>
    </div>
    <div class="col-md-3">
      <!-- The layer checkboxes go here -->
    </div>
  </div>
</template>



<script>
export default {
  // name: 'google-map',
  props: ["name"],
  data: function() {
    return {
      ds: null,
      map: null,
      tileLayer: null,
      greenIcon: null,
      coords: [],
      coordinates: [],
      info:{
      TargetId: null,
      // SSR: null,
      // FlightLevel: null,
      // TrackNumber: null,
      },
    };
  },
  

  mounted() {
    this.initMap();
    this.fetchCoordinates();
    this.listen();
    // setTimeout(this.fetchCoordinates, 4000);
    // this.interval = setInterval(() => this.fetchCoordinates(), 1000);
  },

  methods: {
    initMap() {
      this.map = L.map("map").setView([25.252777, 55.364445], 12);
      this.tileLayer = L.tileLayer(
        "https://cartodb-basemaps-{s}.global.ssl.fastly.net/rastertiles/voyager/{z}/{x}/{y}.png",
        {
          maxZoom: 18,
          attribution:
            '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>, &copy; <a href="https://carto.com/attribution">CARTO</a>'
        }
      );
      this.tileLayer.addTo(this.map);
      this.greenIcon = L.icon({
        iconUrl:
          "https://img.icons8.com/ios-glyphs/344/airport.png",
        iconSize: [27, 25], // size of the icon
        iconAnchor: [22, 94], // point of the icon which will correspond to marker's location
        popupAnchor: [-3, -76] // point from which the popup should open relative to the iconAnchor
      });
    },

    fetchCoordinates() {

      // setInterval(() => {
        axios
        .get("api/getCoordinates")
        .then(res => {
          this.coordinates = res.data;
          console.log(res);
          this.coordinates.forEach(layer => {
            this.info.TargetId = layer.targetId;
            // this.info.SSR = layer.SSR;
            // this.info.FlightLevel = layer.FlightLevel;
            // this.info.TrackNumber = layer.TrackNumber;
            this.coords[0] = `${layer.WGSLat}`;
            this.coords[1] = `${layer.WGSLong}`;
            // console.log(layer);

            layer.leafletObject = L.marker(this.coords, {icon: this.greenIcon})
              .addTo(this.map)
              .bindPopup(`${this.info.TargetId}`);
          });
        })
        .catch(err => {
          console.log(err);
        });
      // }, 4000);

          // setTimeout(this.fetchCoordinates, 4000);
    },
    listen(){
      // return false;
      // console.log('this');
      Echo.channel('chat')
      // console.log('this');
          // .listen('StatusLiked', (data) => {
          //   console.log('data');
          //   //  this.coordinates.push(data);
          // })
      }


  },


};


 // Enable pusher logging - don't include this in production
    // Pusher.logToConsole = true;

    // var pusher = new Pusher('2f580a3f594883d20477', {
    //   cluster: 'ap1',
    //   forceTLS: true
    // });


    // var channel = pusher.subscribe('chat');
    // channel.bind('my-event', function(data) {
    //   alert(JSON.stringify(data));
    // });

</script>


<style scoped>
.map {
  height: 600px;
}
</style>