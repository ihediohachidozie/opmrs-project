new Vue({
    el: '#consult',

    data:{
        user_id:'',
        nurse_id: '',
        name: '',
        nin: '',
        temp: '',
        bp: '',
        bsl: '',
        pulse: '',
        height: '',
        weight: '',
        bmi: '',
        id:'',
        consult: '',
        consults: [],
        getRoute: ''
    },
    created(){
        this.userID();
        this.onLoad();
       
    },
    methods:{
        getInfo() {
            this.name = "";
            axios.get('/user/' + this.nin)
            .then(({ data }) => {
                this.user_id = data[0].id;
                this.name = data[0].firstname + " " + data[0].lastname;
            });
        },
        userID() {
            axios.get('/userId')
                .then(({ data }) => this.nurse_id = data[0].id);
        },
        onBMI() {
            this.bmi = parseInt(this.weight) / parseInt(this.height);
        },
        clear() {
            this.nin = this.patient = this.temp = this.name = this.bp = this.bsl = this.pulse = this.height = this.weight = this.bmi = "";
        },
        onLoad(){  
            axios.get('/Consultancy')
            .then(({data}) => this.consults = data);
        },
        onSubmit(){
            //alert('u just clicked submit!');
            axios.post('/Consultancy', this.$data)
                .then(this.onSuccess)
                .catch(error => {
                    alert(error.response.data.message)
                });
        },
        onSuccess(response) {
            //this.message = response.data.message;
            alert(response.data.message);
            this.onLoad();
            this.clear();  
            $("#edit").modal('close');
        },
        onConsult(){
            this.id = document.getElementById("Id").value;
            alert(id);
            axios.put('/cons/'+this.id, {
                status: 1
            });
           // $("#doctor").modal('show');
        }
    }
});