<template>
  <header class="text-center mb-5 mt-5 text-white">
    <div class="row">
      <div class="col-lg-7 mx-auto">
        <h1>Manage Users</h1>

      </div>
    </div>
  </header>
  <div class="container bg-white p-5 rounded-lg shadow">
    <h2 class="mb-5">Users List</h2>

    <div class="table-responsive">
      <table class="table">
        <thead>
        <tr>
          <th>#</th>
          <th>Name</th>
          <th>Email</th>
          <th>Lattitude</th>
          <th>Longitute</th>
          <th>Weather</th>
          <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="(item,index) in users">
            <td>{{index+1}}</td>
            <td>{{item.name}}</td>
            <td class="text-danger"><strong>{{item.email}}</strong></td>
            <td><strong>{{item.latitude}}</strong></td>
            <td><strong>{{item.longitude}}</strong></td>
            <td><span class="badge badge-sm bg-warning">{{ item.weather_details.description }}</span></td>
          <td> 
              <button type="button" class="btn btn-danger" @click="viewWeahterDetail(item)">
                View Weather
      </button>
    </td>
        </tr>
        <tr v-if="users.length == 0" class="text-center"><strong>No Data Avaliable</strong></tr>
        </tbody>
      </table>
    </div>
  </div>
  <!-- Weahter Modal -->
 
  <Modal :show="showModal">
    <div class="container">
    	<div class="row">
    		<div class="col">
    			<div class="weather-card one">
    				<div class="top">
    					<div class="wrapper">
    						<div class="mynav">
    							<a href="javascript:;"><span class="lnr lnr-chevron-left" @click="showModal=!showModal"></span></a>
    						</div>
    						<h1 class="heading">{{ widget.weather }}</h1>
    						<p class="temp">
    							<span class="temp-value">{{ widget.temp }}</span>
    							<span class="deg">0</span>
    							<a href="javascript:;"><span class="temp-type">C</span></a>
    						</p>
    					</div>
    				</div>
    				<div class="bottom">
    					<div class="wrapper">
    						<ul class="forecast">
    							<a href="javascript:;"><span class="lnr lnr-chevron-up go-up"></span></a>
    							<li class="active">
    								<span class="date">Wind</span>
    								<span class="lnr lnr-sun condition">
    									<span class="temp">{{ widget.wind }}<span class="temp-type">Km/s</span></span>
    								</span>
    							</li>
    						</ul>
    					</div>
    				</div>
    			</div>
    		</div>

		
    	</div>
    </div>
  </Modal>
        

   

  

</template>
<script  >
import Modal from "@/components/Utility/Modal.vue";
export default {
  components:{Modal},
  mounted() {
    this.getUsers()
  },
  data(){
    return{
      users:[],
      showModal:false,
      widget:{
        weather:'N/A',
        wind:'N/A',
        temp:'N/A',
      }
    }
  },
  methods:{
    getWeather(){
      this.makeRequest('get','weather',{lat:45,lon:2}).then((res)=>{
        if(!res.error){
          this.users = res.response.data.data
        }
      })
    },
    viewWeahterDetail(item){
      this.widget = {
        weather:item.weather_details?.description,
        wind:item.weather_details?.wind,
        temp:item.weather_details?.temperature,
      }
      this.showModal = true
    },
    getUsers(){
      this.makeRequest('get','users',{with_weather_details:true}).then((res)=>{
        if(!res.error){
          this.users = res.response.data.data
        }
      })
    }
  }
}
</script>
<style>
@import url("https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700,800,900");
@import url("https://cdn.linearicons.com/free/1.0.0/icon-font.min.css");

.weather-card {
  /* height: 50%; */
  /* width: 100%; */
  background: #fff;
  box-shadow: 0 1px 38px rgba(0, 0, 0, 0.15), 0 5px 12px rgba(0, 0, 0, 0.25);
  /* overflow: hidden; */
}
.weather-card .top {
  position: relative;
  height: 490px;
  width: 100%;
  overflow: hidden;
  background: url("https://s-media-cache-ak0.pinimg.com/564x/cf/1e/c4/cf1ec4b0c96e59657a46867a91bb0d1e.jpg") no-repeat;
  background-size: cover;
  background-position: center center;
  text-align: center;
}
.weather-card .top .wrapper {
  padding: 30px;
  position: relative;
  z-index: 1;
}
.weather-card .top .wrapper .mynav {
  height: 20px;
}
.weather-card .top .wrapper .mynav .lnr {
  color: #fff;
  font-size: 20px;
}
.weather-card .top .wrapper .mynav .lnr-chevron-left {
  display: inline-block;
  float: left;
}
.weather-card .top .wrapper .mynav .lnr-cog {
  display: inline-block;
  float: right;
}
.weather-card .top .wrapper .heading {
  margin-top: 20px;
  font-size: 35px;
  font-weight: 400;
  color: #fff;
}
.weather-card .top .wrapper .location {
  margin-top: 20px;
  font-size: 21px;
  font-weight: 400;
  color: #fff;
}
.weather-card .top .wrapper .temp {
  margin-top: 20px;
}
.weather-card .top .wrapper .temp a {
  text-decoration: none;
  color: #fff;
}
.weather-card .top .wrapper .temp a .temp-type {
  font-size: 85px;
}
.weather-card .top .wrapper .temp .temp-value {
  display: inline-block;
  font-size: 85px;
  font-weight: 600;
  color: #fff;
}
.weather-card .top .wrapper .temp .deg {
  display: inline-block;
  font-size: 35px;
  font-weight: 600;
  color: #fff;
  vertical-align: top;
  margin-top: 10px;
}
.weather-card .top:after {
  content: "";
  height: 100%;
  width: 100%;
  display: block;
  position: absolute;
  top: 0;
  left: 0;
  background: rgba(0, 0, 0, 0.5);
}
.weather-card .bottom {
  padding: 0 30px;
  background: #fff;
}
.weather-card .bottom .wrapper .forecast {
  overflow: hidden;
  margin: 0;
  font-size: 0;
  padding: 0;
  padding-top: 20px;
  max-height: 155px;
}
.weather-card .bottom .wrapper .forecast a {
  text-decoration: none;
  color: #000;
}
.weather-card .bottom .wrapper .forecast .go-up {
  text-align: center;
  display: block;
  font-size: 25px;
  margin-bottom: 10px;
}
.weather-card .bottom .wrapper .forecast li {
  display: block;
  font-size: 25px;
  font-weight: 400;
  color: rgba(0, 0, 0, 0.25);
  line-height: 1em;
  margin-bottom: 30px;
}
.weather-card .bottom .wrapper .forecast li .date {
  display: inline-block;
}
.weather-card .bottom .wrapper .forecast li .condition {
  display: inline-block;
  vertical-align: middle;
  float: right;
  font-size: 25px;
}
.weather-card .bottom .wrapper .forecast li .condition .temp {
  display: inline-block;
  vertical-align: top;
  font-family: 'Montserrat', sans-serif;
  font-size: 20px;
  font-weight: 400;
  padding-top: 2px;
}
.weather-card .bottom .wrapper .forecast li .condition .temp .deg {
  display: inline-block;
  font-size: 10px;
  font-weight: 600;
  margin-left: 3px;
  vertical-align: top;
}
.weather-card .bottom .wrapper .forecast li .condition .temp .temp-type {
  font-size: 20px;
}
.weather-card .bottom .wrapper .forecast li.active {
  color: rgba(0, 0, 0, 0.8);
}
.weather-card.rain .top {
  background: url("http://img.freepik.com/free-vector/girl-with-umbrella_1325-5.jpg?size=338&ext=jpg") no-repeat;
  background-size: cover;
  background-position: center center;
}

</style>