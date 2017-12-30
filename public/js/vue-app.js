// vue js


new Vue({
    el: '#app',
    data: {
        results: [],
        message: 'start'
    },
    mounted() {
        this.fetchData()
    },
    methods: {
        fetchData: function () {
            axios.get('/data/example.json')
                .then(
                    //console.log(response.data);
                    response => {
                        this.message = "Data loaded"
                        this.results = response.data;
                    }
                )
                .catch(function (error) {
                    console.log(error);
                })
        }
    }

});