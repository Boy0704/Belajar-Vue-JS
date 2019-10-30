<!DOCTYPE html>
<html>
<head>
	<title>Aplikasi Vue JS</title>
	<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.0/axios.min.js"></script>
</head>
<body>

	<div id="app">

		<span v-on:click="link += 1"><b>Klik disini</b></span>

		<p>nilai <a :href="linkh">link {{link}}</a></p>

		
		<ol>
	    <!--
	      Sekarang kita sematkan masing - masing todo-item dengan todo obyek,
	      sehingga isinya bisa menjadi dinamis.
	      Kita juga perlu untuk menyematkan "key" di masing - masing komponen,
	      yang mana akan dijelaskan lebih lanjut nantinya.
	    -->
	    <todo-item
	      v-for="item in barangBelanjaan"
	      v-bind:todo="item"
	      v-bind:key="item.id"
	    ></todo-item>
	  </ol>

	  <!-- <p>{{items}}</p> -->

	  <table border="1">
	  	<tr v-for="item in items">
	  		<td>{{item.id}}</td>
            <td>{{item.firstname}}</td>
            <td>{{item.lastname}}</td>
            <td>{{item.email}}</td>
            <td>{{item.contact}}</td>
            <td>{{item.address}}</td>
	  	</tr>
	  </table>

	</div>


	<script type="text/javascript">
		Vue.component('todo-item', {
		  props: ['todo'],
		  template: '<li>{{ todo.barang }}</li>'
		})

		var vm = new Vue({
		
		  el: "#app",
		  data:{
		  	link: 0,
		  	barangBelanjaan: [
		      { id: 0, barang: 'Sayuran' },
		      { id: 1, barang: 'Keju' },
		      { id: 2, barang: 'Makanan yang lain' }
		    ],
		    items : []
		  },

		  mounted () {
		    this.tampil_data()
		  },

		  computed: {
		  	linkh : function() {
		  		return 'app/con/'+this.link;
		  	}
		  },

		  methods : {

		  	tampil_data()
		  	{
		  		axios
			      .get('http://localhost/x/civuejs/user/showAll')
			      .then(response => (this.items = response.data.users))
		  	}


		  }
			
		
		})
	</script>

</body>
</html>
