new Vue({
    el: '#pharm',

    data: {
        pharm: '',
        pharms: [],
        consultancy_id: '',
        doctor_id: '',
        user_id: '',
        prescription: '',
        drugs: '',
        users: [],
        user: '',
        doctor: '',
        patient: '',
        id: ''  ,
        bool: false,
        message: ''

    },
    created() {
        this.getPharms();
        this.getUsers();

    },
    methods: {
        reLoad(){
            this.getPharms();
            this.getUsers();
        },
        getPharms() {
            axios.get('/pharms')
                .then(({ data }) => this.pharms = data);
        },
        getUsers() {
            axios.get('/users')
                .then(({ data }) => this.users = data);
        },
        getName(e) {
            for (var i = 0; i < this.users.length; i++) {
                if (this.users[i].id == e) {
                    return this.users[i].firstname + ' ' + this.users[i].lastname;
                }
            }

        },
        getPharm(pharm) {
           this.patient = this.getName(pharm.user_id);
           this.doctor = this.getName(pharm.doctor_id);
            this.prescription = pharm.prescription;
            this.drugs = pharm.drugs;
            this.bool = false;
           //this.consultancy_id = pharm.consultancy_id;
            this.id = pharm.id;
            $("#drugs").modal('show');
        },
        onSubmit() {
            //alert('hello world');
            axios.put('/Pharmacy/' + this.id, {
                drugs: this.drugs
            })
            .then(this.onSuccess)
            .catch(error => {
                alert(error.response.data.message)
            });
        },
        onSuccess(response) {
            this.message = response.data.message;
            this.bool = true;
           // alert(response.data.message);
          //  $("#drugs").modal('close');
            this.getPharms();


        }
    }
});