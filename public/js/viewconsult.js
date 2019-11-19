new Vue({
    el: '#consult',

    data: {
        id: '',
        user_id: '',
        national_id: '',
        name: '',
        nin: '',  
        temp: '',
        bp: '',
        bsl: '',
        pulse: '',
        height: '',
        weight: '',
        bmi: '',
        created: '',
        diagnosis: '',
        symptoms: '',
        complain:'',
        remarks: '',
        tests: [],
        test: '',
        consult: '',
        consults: [],
        user: '',
        users: [],
        drugs: '',
        prescriptions: ''

    },
    created() {
     //   this.getUsers();
     //   this.onLoad();
     //   this.getName();

    },
    methods: {
        getInfo() {
            this.name ="";
            axios.get('/user/' + this.national_id)
                .then(({ data }) => {
                    this.user_id = data[0].id;
                    this.name = data[0].firstname + " " + data[0].lastname;
                    this.display();
                });
           // alert(this.user_id);
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
        onLoad() {
            axios.get('/consults')
                .then(({ data }) => this.consults = data);
        },
        onSubmit() {
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
            // $("#edit").modal('close');
        },
        getMed(){
            
            this.getUsers();
            this.getInfo();
            this.getName();
           
        },
        display(){
            axios.get('/getmed/' + this.user_id)
                .then(({ data }) => this.consults = data);
            if(this.consults.length > 0)
            {
                alert('No record found')
            }

        },
        viewInfo(e){
            this.temp = e.temp;
            this.bmi = e.weight / e.height;
            this.bp = e.bp;
            this.pulse =  e.pulse;
            this.complain = e.complain
            this.symptoms = e.symptoms;
            this.diagnosis = e.diagnosis;
            this.remarks = e.remarks;
            this.id = e.id;
            this.created = e.created_at;
            this.getLab();
            this.getPham();
            
            $("#details").modal('show');

        },
        getLab() {
            axios.get('/tests/' + this.id)
                .then(({ data }) => this.tests = data);
        },
        getPham() {
            axios.get('/pham/' + this.id)
                .then(({ data }) => {
                    this.drugs = data[0].drugs,
                        this.prescriptions = data[0].prescription
                }
            );
        }
    }
});