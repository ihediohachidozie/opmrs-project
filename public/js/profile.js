// profile page script..
var profile = new Vue({
    el: "#profile",

    data: {
        id: '',
        user_id: '',
        firstname: '',
        lastname: '',
        dob: '',
        gender: '',
        address: '',
        env_allergies: '',
        food_allergies: '',
        drug_allergies: '',
        relationship: '',
        emg_name: '',
        emg_phone: '',
        phone: '',
        blood_group: '',
        marital_status: '',
        religion: '',
        bloodgroup: {
            0: "O Postive",
            1: "A Postive",
            2: "B Positive",
            3: "AB Positive"
        },
        martialstatus: {
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
    created() {
        //  alert('You are in index');
        this.onLoad();
        this.getID();
    },
    methods: {
        onLoad() {
            axios.get('/userinfo')
                .then(({ data }) => {
                    this.user_id = data[0].id;
                    this.firstname = data[0].firstname;
                    this.lastname = data[0].lastname;
                });
        },
        getID() {
            axios.get('/profileid')
                .then(({ data }) => {
                    this.id = data[0].id;
                    this.dob = data[0].dob;
                    this.gender = data[0].gender;
                    this.address = data[0].address;
                    this.env_allergies = data[0].env_allergies;
                    this.food_allergies = data[0].food_allergies;
                    this.drug_allergies = data[0].drug_allergies;
                    this.relationship = data[0].relationship;
                    this.emg_name = data[0].emg_name;
                    this.emg_phone = data[0].emg_phone;
                    this.phone = data[0].phone;
                    this.blood_group = data[0].blood_group;
                    this.marital_status = data[0].marital_status;
                    this.religion = data[0].religion;
                });
        },
        onUpdate() {
            if (this.id == '') {
                axios.post('/Profile', this.$data)
                    .then(this.onSuccess)
                    .catch(error => {
                        alert(error.response.data.message)
                    });
            } else {
                axios.put('/Profile/' + this.id, this.$data)
                    .then(this.onSuccess)
                    .catch(error => {
                        alert(error.response.data.message)
                    });
            }
            this.getID();


        },
        onSuccess(response) {
            //this.message = response.data.message;
            alert(response.data.message);
        }
    }
});