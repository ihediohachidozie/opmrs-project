new Vue({
    el: "#doctoredit",

    data:{
        id: '',
        user_id: '',
        doctor_id: '',
        xcase: '',
        diagnosis: '',
        complain: '',
        symptoms: '',
        remarks: '',
        tests: [],
        test: '',
        test_sample: '',
        test_required: '',
        prescription: '',
        drugs: '',
        name: '',
        address: '',
        dob: '',
        users: [],
        gender:'',
        phone: '',
        relationship: '',
        emg_name: '',
        emg_phone: '',
        genders: {
            0 : "Male", 
            1 : "Female"
        },
        env_allergies: '',
        food_allergies: '',
        drug_allergies: '',
        blood_group: '',
        marital_status: '',
        religion: '',
        bloodgroup: {
            0: "O Postive",
            1: "A Postive",
            2: "B Positive",
            3: "AB Positive"
        },
        maritalstatus: {
            0: "Single",
            1: "Married",
            2: "Divorced",
            3: "Windowed",
            4: "Separated",
            5: "Registered Partnershiper"
        },
        religions: {
            0: "Christianity",
            1: "Islam",
            2: "Non-religious",
            3: "Buddhism",
            4: "Hinduism"
        },
        relationships: {
            0: "Spouse",
            1: "Parent",
            2: "Sibling",
            3: "Uncle",
            4: "Aunty"
        }


    },
    created(){
        this.id = document.getElementById("Id").value;
        this.doctor_id = document.getElementById("docId").value;
        this.user_id = document.getElementById("userId").value;
        this.getUsers();
        this.onLoad();
        this.getLab();
        this.getPham();
        
    },
    methods:{ 
        onLoad(){
            axios.get('/Consultancy/'+this.id)
            .then(({data}) =>
            {
                this.complain = data[0].complain,
                this.symptoms = data[0].symptoms,
                this.diagnosis = data[0].diagnosis,
                this.remarks = data[0].remarks
                this.xcase = data[0].xcase

            });

        },
        onSubmit(){
            axios.put('/Consultancy/' + this.id, {
                complain: this.complain,
                symptoms: this.symptoms,
                xcase: this.xcase,
                remarks: this.remarks,
                diagnosis: this.diagnosis
            })
            .then(this.onSuccess)
            .catch(error => {
                alert(error.response.data.message)
            });
        },
        onSuccess(response) {
            //this.message = response.data.message;
            alert(response.data.message);
            this.onLoad();
            //this.clear();
            //$("#edit").modal('close');  
        },
        onLab(){
            //alert('hello world');
            axios.post('/Labtest',{
                consultancy_id: this.id,
                test_sample: this.test_sample,
                test_required: this.test_required,
                doctor_id: this.doctor_id,
                user_id: this.user_id
            });
            alert('Data saved!');
            this.getLab();
        },
        getLab(){
            axios.get('/tests/'+ this.id)
                .then(({ data }) => this.tests = data);
            
        },
        onPham(){
            //alert('Prescriptions!!!');
            axios.post('/Pharmacy', {
                consultancy_id: this.id,
                prescription: this.prescription,
                doctor_id: this.doctor_id,
                user_id: this.user_id
            });
            alert('Data saved!');
            this.getPham();
        },
        getPham(){
            axios.get('/pham/' + this.id)
                .then(({ data }) =>  
                {
                    if(data.length > 0){
                        this.drugs = data[0].drugs,
                        this.prescription = data[0].prescription
                    }
                    
                }
            );
        },
        getProfile(){
            
            axios.get('/Profile/'+this.user_id)
            .then(({data}) => {
                this.name = data[0].user.firstname + ' ' + data[0].user.lastname;
                this.dob = data[0].dob;
                this.phone = data[0].phone;
                this.gender = this.genders[data[0].gender];
                this.blood_group = this.bloodgroup[data[0].blood_group];
                this.marital_status = this.maritalstatus[data[0].marital_status];
                this.food_allergies = data[0].food_allergies;
                this.drug_allergies = data[0].drug_allergies;
                this.env_allergies = data[0].env_allergies;
                this.emg_phone = data[0].emg_phone;
                this.emg_name = data[0].emg_name;
                this.relationship = this.relationships[data[0].relationship];
                this.religion = this.religions[data[0].religion];
            });
            $("#profile").modal('show'); 
        },
        getUsers() {
            axios.get('/users')
                .then(({ data }) => this.users = data);
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

        }


    },
});