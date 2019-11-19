new Vue({
    el:'#lab',

    data:{
        test: '',
        tests: [],
        consultancy_id: '',
        doctor_id: '',
        user_id: '',
        lab_tech_id: '',
        test_result:'',
        test_sample:'',
        test_required: '',
        users: [],
        user: '',
        doctor: '',
        patient:'',
        id: '',
        bool: false,
        message: ''

    },
    created(){
        this.getLabs();
        this.getUsers();

    },
    methods:{
        reLoad(){
            this.getLabs();
            this.getUsers();
        },
        getLabs(){
            axios.get('/tests')
                .then(({ data }) => this.tests = data);            
        },
        getUsers(){
            axios.get('/users')
            .then(({data}) => this.users = data);
        },
        getName(e){
            for( var i = 0; i < this.users.length; i++){
                if(this.users[i].id == e){
                    return this.users[i].firstname + ' ' + this.users[i].lastname;
                }
            }
             
        },
        getTested(test){
            this.patient = this.getName(test.user_id);
            this.doctor = this.getName(test.doctor_id);
            this.test_sample = test.test_sample;
            this.test_required = test.test_required;
            this.id = test.id;  
            $("#test").modal('show');
        },
        onSubmit(){
            //alert('hello world');
            axios.put('/Labtest/'+this.id, {
                test_result: this.test_result
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
          //  $("#test").modal('close');
            this.getLabs();
            
            
        }

    }
});